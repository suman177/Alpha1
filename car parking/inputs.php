<?php
$username=$_POST['Name'];
$address=$_POST['Address'];
$email=$_POST['E-Mail'];
$number1=$_POST['number'];
$vn=$_POST['VN'];

	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="test";

	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else{
		$SELECT = "SELECT email From info where email = ? Limit 1 ";
		$INSERT = "INSERT Into info(name, address, email, phone, vehicle, code) values(?,?,?,?,?,?)";


		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum==0){
			$number=rand(9999,100000);
			$stmt->close();
			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("sssisi",$username,$address,$email,$number1,$vn,$number);
			$stmt->execute();
			session_start();
			$_SESSION['uname'] = $username;
			$_SESSION['rand']=$number;
			header("Location: page3.php");
			
			
		}else{
	
			
			date_default_timezone_set('Asia/Kolkata');// change according timezone
			$currentTime = date( 'd-m-Y h:i:s A', time () );
			
		echo "<script language='javascript'>";
		echo 'alert("Email already exist!!");';
		echo "</script>";	//try not showing an alert box.

	
		}
		$stmt->close();
		$conn->close();
		die();
	}

?>