<?php


	include 'conn.php';
	$prd_cat = $_POST['prd_cat'];
	$prd_brand = $_POST['prd_brand'];
	$prd_desc = $_POST['prd_desc'];
	$prd_price = $_POST['prd_price'];
	$prd_name = $_POST['prd_name'];
	$prd_img = $_POST['prd_img'];

	$prd_id = $_POST['prd_id'];
	$query="UPDATE `product` SET `prd_cat`='$prd_cat',`prd_brand`='$prd_brand',`prd_desc`='$prd_desc',`prd_price`='$prd_price',`prd_name`='$prd_name',`prd_img`='$prd_img' WHERE `prd_id`='$prd_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Updated";
	}
	else{
		echo "Error..........................";
	}
?>