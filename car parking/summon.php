<?php
	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="test";
	
	$vn=$_POST['VN1'];
	$code=$_POST['code'];

	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else{
            

            //$result1 = mysqli_query($conn, "SELECT code FROM info WHERE vehicle = '".$vn."'");
            //print $result1;
            //$result2 = mysqli_query($conn, "SELECT vehicle FROM info WHERE code = '".$code."'");
            $result2 = mysqli_query($conn,"SELECT vehicle, code FROM info WHERE vehicle = '".$vn."' AND  code = '".$code."'");


            //if($vn == $result2 && $code == $result1)
           if($result2->num_rows > 0) 
            { 
            $name=mysqli_query($conn,"SELECT name FROM info WHERE code = '".$code."'");
            
            $res=mysqli_fetch_row($name);
              //  $_SESSION["logged_in"] = true; 
              // $_SESSION["naam"] = $name;
              echo $res[0];
              header("Location: page3.html");
            }
           

    } 
     echo'The username or password are incorrect!';
	

?>