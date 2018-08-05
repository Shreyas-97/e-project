<?php


	include 'conn.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password =$_POST['password'];
	$role =$_POST['role'];
$password =password_hash($password, PASSWORD_BCRYPT);

	
	
	$query="INSERT INTO `register`(`name`,`email`, `password`,`role`) VALUES ('$name','$email','$password','$role')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: index.php");
	}
	else{
		echo "Error";
	}
?>