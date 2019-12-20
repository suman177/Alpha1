<?php
session_start();
$comment=$_POST['comment'];
$uname=$_SESSION['uname'];


	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="test";

	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else{
		$INSERT =mysqli_query($conn,"INSERT Into comments(uname, comment) values(".$uname.",".$comment.");");							
		}
		$conn->close();
		die();


?>