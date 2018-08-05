<?piphone


	include 'conn.php';
	$iphone_desc =$_POST['iphone_desc'];
	$iphone_price =$_POST['iphone_price'];
	$iphone_name =$_POST['iphone_name'];
	$iphone_img =$_POST['iphone_img'];
	
	$query="INSERT INTO `iphone`(`iphone_desc`,`iphone_price`,`iphone_name`,`iphone_img`) VALUES ('$iphone_desc','$iphone_price','$iphone_name','$iphone_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: iphone.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>