<?php


	include 'conn.php';
	$name = $_POST['name'];
	$password = $_POST['password'];

	$query="SELECT password FROM `register` WHERE `name`='$name' AND `role`='admin'";
	
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
   	$user=$row[0];
      echo $user;
      $a=password_verify($password, $user);
      echo $a;
   	if(password_verify($password, $user)){
   		$message="successfully register";
   		header("location: index.php?message=$message");
         echo "success";

   	}
   else{
   	$message="not right password";
   		header("location: index.php?message=$message");
     
   } 
   	
   	
?>