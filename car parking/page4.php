<?php
session_start();
	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="test";
	$conn = mysqli_connect("$host","$dbUsername","$dbPassword","$dbname");

if(isset($_POST['submit12']))
{
	$comment=$_POST['comment'];
	$uname=$_SESSION['uname'];
	 $result2 = mysqli_query($conn,"SELECT comment FROM comments WHERE uname = '".$uname."' ");
	 if($result2->num_rows > 0)
	 {
	$sql="UPDATE comments set comment=? where uname='".$uname."'";
	$query = $conn->prepare($sql);
	$query->bind_Param("s",$comment);
	$query->execute();
	if($query)
	{
		echo "<script>alert('Sucessfully upadted comments.');</script>";
	}}
	else{
		$sql="INSERT INTO  comments(uname,comment) VALUES(?,?)";
	$query = $conn->prepare($sql);
	$query->bind_Param("ss",$uname,$comment);
	$query->execute();
	if($query)
	{
		echo "<script>alert('Sucessfully loaded comments.');</script>";
	}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Progress</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="page4.css">
</head>
<body>

<div id="myProgress">
  <div id="myBar">  
  </div>
</div>
<br>
<body onload='move()'>
	<div class="notice">Hello, <?php $uname=$_SESSION["uname"]; echo "".$uname.""; ?> your car will be parked in few seconds, Please Wait, :D</div>

	<a href="page1.php" >
		GOT IT
	</a>
	<a class="button" href="#" id="buttons" >
		COMMENT
	</a>

	<div class="pop_up" id="pop_up">
	<div class="pop_up_content">
		<div class="close" id="close">+</div>
		<form method="POST">
			
			<textarea class="input" type="text" placeholder="Type your comment here!!" required="" name="comment"></textarea> 
			
			<button class="button1" type="Submit" name="submit12">Submit</button>

			<span id="errorname"></span>

		</form>
	</div>
</div>

</body>
<script type="text/javascript" src="js_p3.js"></script>
</html>
