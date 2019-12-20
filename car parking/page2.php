<?php


	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="test";

	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else{
		if(isset($_POST['submit']))
	{
	$username=$_POST['Name'];
	$address=$_POST['Address'];
	$email=$_POST['E-Mail'];
	$number1=$_POST['number'];
	$vn=$_POST['VN'];
		$SELECT = "SELECT email From info where email = ? Limit 1 ";
		$INSERT = "INSERT Into info(name, address, email, phone, vehicle, code) values(?,?,?,?,?,?)";
		//$INSERT1 = "INSERT Into routine(cusid, enttime, entdate, exitime, exidate) values(?,?,?,?,?)";


		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$date=date("Y-m-d");
        $time=date("h:i:s");
        $date2="0000-00-00";
        $time2="00:00:00";

		if($rnum==0){
			$number=rand(9999,100000);
			$stmt->close();
			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("sssisi",$username,$address,$email,$number1,$vn,$number);
			$stmt->execute();
			$stmt->close();

			$un=mysqli_query($conn,"SELECT id From info where email='".$email."'");
			$res=mysqli_fetch_row($un);
            $uid=implode($res);
        
            
           
			$new= mysqli_query($conn,"INSERT Into routine(cusid, enttime, entdate, exitime, exidate) values('".$uid."','".$time."','".$date."','".$time2."','".$date2."')");
			
			
			session_start();
			$_SESSION['uname'] = $username;
			$_SESSION['rand']=$number;
			header("Location: page3.php");
			
		}else{
	
		echo "<script>alert('E-Mail already exist Please try again!!!'); window.location = './page2.php';</script>";	//try not showing an alert box.


		}
		
		
	}
		if(isset($_POST['submit1']))
		{   
			$vn=$_POST['VN1'];
			$code=$_POST['code'];

			$date0=date("Y-m-d");
        $time0=date("h:i:s");
        $date1="0000-00-00";
        $time1="00:00:00";


            //$result1 = mysqli_query($conn, "SELECT code FROM info WHERE vehicle = '".$vn."'");
            //print $result1;
            //$result2 = mysqli_query($conn, "SELECT vehicle FROM info WHERE code = '".$code."'");
            $result2 = mysqli_query($conn,"SELECT vehicle, code FROM info WHERE vehicle = '".$vn."' AND  code = '".$code."'");
            //if($vn == $result2 && $code == $result1)
           if($result2->num_rows > 0) 
            { 
            $name=mysqli_query($conn,"SELECT name FROM info WHERE code = '".$code."'");
            $res=mysqli_fetch_row($name);
            $name1=implode($res);

            $un=mysqli_query($conn,"SELECT id From info where code='".$code."'");
			$res1=mysqli_fetch_row($un);
            $uid=implode($res1);
        
            
            $new= mysqli_query($conn,"INSERT Into routine(cusid, enttime, entdate, exitime, exidate) values('".$uid."','".$time0."','".$date0."','".$time1."','".$date1."')");

            session_start(); 
              $_SESSION["uname"] = $name1;
              header("Location: page4.php");
            }
           
             echo "<script language='javascript'>";
    			echo 'alert("Username or Code is incorrect!!!");';
   			 echo "</script>";
    }
    } 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="page2.css">
	
</head>

<body>
	

	<a href="#" id="buttons" >
		New user
	</a>
	<a href="#" id="buttons1">
		Existing user
	</a>


	
<div class="pop_up" id="pop_up">
	<div class="pop_up_content">
		<div class="close" id="close">+</div>
		<form method="POST">
			
			<input class="input" type="text" placeholder="Name" required="" name="Name"/>

			<input class="input" type="text"  placeholder="Address" required="" name="Address"/>
			
			<input class="input" type="email" placeholder="E-Mail" required="" name="E-Mail"/>
			
			<input class="input" type="number" placeholder="Phone Number" required="" name="number"/>
			
			<input class="input" type="text" placeholder="Vehicle-Number" required="" name="VN"/>
			
			<button class="button" type="Submit" name="submit">Submit</button>

			<span id="errorname"></span>

		</form>

	</div>
</div>

<div class="pop_up" id="pop_up_ex">
	<div class="pop_up_content">
		
		<div class="close" id="close1">+</div>

		<form method="POST">
			
			<input class="input1" type="text" placeholder="Vehicle-Number" required="" name="VN1"/>

			<input class="input1" type="text" placeholder="Code" required="" name="code"/>
				
			<button class="button1" type="Submit" name="submit1">Submit</button>

			<span id="errorname1"></span>
		</form>

	</div>
</div>
</body>
<script type="text/javascript" src="js_p2.js"></script>
</html>