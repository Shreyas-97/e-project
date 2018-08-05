<?piphone

	include 'conn.php';
	$iphone_name= $_POST['iphone_name'];
	$query="SELECT * FROM `iphone` WHERE `iphone_name`='$iphone_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>