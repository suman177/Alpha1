<?php
session_start();
	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="test";
	$conn = mysqli_connect("$host","$dbUsername","$dbPassword","$dbname");

if(isset($_POST['submitdel']))
{	
	$uid=$_SESSION['uid'];
	 $result2 = mysqli_query($conn,"DELETE FROM info WHERE  id= '".$uid."'");
	if($result2)
	{
		//echo"<script>if(alert('Your info is Deleted!!')){";
			
		//echo "}</script>";
		  //  header("location:page1.php");

		    echo "<script>alert('Your info is Sucessfully Deleted!!!'); window.location = './page1.php';</script>";
		//$sucess = echo "<script>alert('Your info is Deleted.');</script>";
		//if($sucess)
		//{
		//	header(location:page1.php);
		//}

	}

}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Progress</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="page5.css">
</head>
<body>


<div id="myProgress">
  <div id="myBar">  
  </div>
</div>
<br>
<body onload='move()'>
	<div class="notice">Hello, <?php $uname=$_SESSION["uname"]; echo "".$uname.""; ?> your car will be in front of gate in few seconds, Please Wait, :D</div>
<form method="POST">
	<button type="submit" class="button1" name="submitdel" >DELETE MY INFO</button>
</form>
<button class="button12" onclick="window.location.href='page1.php';">GOT IT</button>
</body>
<script type="text/javascript" src="js_p3.js"></script>
</html>
