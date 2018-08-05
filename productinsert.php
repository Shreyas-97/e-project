<?php


	include 'conn.php';
	$prd_cat = $_POST['prd_cat'];
	$prd_brand = $_POST['prd_brand'];
	$prd_desc =$_POST['prd_desc'];
	$prd_price =$_POST['prd_price'];
	$prd_name =$_POST['prd_name'];
	$prd_img =$_POST['prd_img'];
	
	$query="INSERT INTO `product`(`prd_cat`,`prd_brand`,`prd_desc`,`prd_price`,`prd_name`,`prd_img`) VALUES ('$prd_cat','$prd_brand','$prd_desc','$prd_price','$prd_name','$prd_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: product.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>