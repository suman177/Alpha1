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
            
		if(isset($_POST['submit1']))
		{
			$vn=$_POST['VN1'];
			$code=$_POST['code'];
            //$result1 = mysqli_query($conn, "SELECT code FROM info WHERE vehicle = '".$vn."'");
            //print $result1;
            //if($vn == $result2 && $code == $result1)
          $result2 = mysqli_query($conn,"SELECT vehicle, code FROM info WHERE vehicle = '".$vn."' AND  code = '".$code."'");
           
            //if($vn == $result2 && $code == $result1)
           if($result2->num_rows > 0) 
            { 
            $date0=date("Y-m-d");
        $time0=date("h:i:s");
        $date1="0000-00-00";
        $time1="00:00:00";

            $name=mysqli_query($conn,"SELECT name FROM info WHERE code = '".$code."'");
            $id=mysqli_query($conn,"SELECT id FROM info WHERE code = '".$code."'");
            $res2=mysqli_fetch_row($id);
            $res=mysqli_fetch_row($name);
            $uid=implode($res2);
            $name1=implode($res);
           $new= mysqli_query($conn,"INSERT Into routine(cusid, enttime, entdate, exitime, exidate) values('".$uid."','".$time1."','".$date1."','".$time0."','".$date0."')");

            session_start(); 

              $_SESSION["uname"] = $name1;
              $_SESSION["uid"] = $uid;
              header("Location: page5.php");
            }
           
            echo "<script>alert('Sorry, Vehicle-Number or Code is incorrect!!!'); window.location = './page1.php';</script>";
    } 
  
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Park your car</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="page1.css">
</head>
<body>
	
	<a href="page2.php">
		Park In
	</a>
	
	<a href="#" id="buttons1">
		Summon
	</a>

<div class="pop_up" id="pop_up">
	
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
<script type="text/javascript" src="js_p1.js"></script>
</html>