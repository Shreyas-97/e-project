<!DOCTYPE html>
<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="background-image: url(pier-407252_1920.jpg);background-repeat: no-repeat;background-size: cover;">
	<?php $laptop_id=$_GET['laptop_id'];
		
		include 'conn.php';

	$query="SELECT * FROM `laptops` where laptop_id='$laptop_id'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		
		$laptop_brand=$row['laptop_brand'];
		$laptop_desc=$row['laptop_desc'];
		$laptop_price=$row['laptop_price'];
    $laptop_name=$row['laptop_name'];
    $laptop_img=$row['laptop_img'];
	}
	
	?>
		   <form name="register" action="laptopinsert.php" method="post" class="container" style="height: 700px;width: 500px;margin-top: 100px;">
        <input type="hidden" name="laptop_id" value="<?php echo $laptop_id?>" id="laptop_id">
    <div class="form-group">
       <h1 style="font-family: cursive;">Edit The laptop</h1>
    </div>
    <div class="form-group">
      <label>laptop Brand</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Brand" name="laptop_brand" placeholder="laptop Brand" class="form-control" required="" value="<?php echo $laptop_brand?>">
    </div>
    </div>
     <div class="form-group">
    <label>laptop Description</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Description" name="laptop_desc" placeholder="laptop Description" class="form-control" required="" value="<?php echo $laptop_desc?>">
    </div>
    </div>
     <div class="form-group">
    <label>laptop Price</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="price" name="laptop_price" placeholder="laptop Price" class="form-control" required="" value="<?php echo $laptop_price?>">
    </div>
    </div>
    <div class="form-group">
      <label>laptop Name</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="text" name="laptop_name" placeholder="laptop name" class="form-control" required="" value="<?php echo $laptop_name?>">
    </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-success" id="btn">Submit</button>
  </form>
	<img src="<?php echo $laptop_img?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%;margin-left: 500px;margin-bottom: 100px;">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $laptop_id?>" readonly>

    <input type="file" name="files[]" id="file" accept="" required/>
    <br>
     <button type="button" id="upload_profile_pic" class="btn btn-primary ">Update Pic</button>
<script type="text/javascript">

	$(function(){

		  		     $('#file').on('change', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        
                            alert(response)
                            document.getElementById("profile_pic").src=response;
                            x=response;

                           
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
               });
  	$('#upload_profile_pic').on('click', function () {

               
                  var eid=$("#eid").val();
                  var profile=x;
                   alert(profile);
                        $.ajax({
                            url:"update_profile_pic.php",
                            type:"post",
                            data:{
                               	"laptop_id":eid,
                                "profile":profile
                            },
                            success:function(data){
                              alert(data);
                             // window.reload();   
                              },
                              error:function(){
                              	alert(';hi');
                              }
                });
           
      });
		$('#btn').click(function(){
			var laptop_name=document.getElementById('laptop_name').value;
                var laptop_id=document.getElementById('laptop_id').value;
               
                var laptop_brand = document.getElementById('laptop_brand').value;
                var laptop_desc = document.getElementById('laptop_desc').value;
                var laptop_price = document.getElementById('laptop_price').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "laptop_name":name,
                        
                        "laptop_brand":brand,
                        "laptop_desc":desc,
                        "laptop_price":price,
                        "laptop_id":id
                    },
                    success:function(data){
                       alert(data);   
                        
                    },
                    error:function(data){
                    	alert('not right');
                    }
                });
		})
  			
	})
        		
              
        
</script>
</body>
</html>