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
	<?php $prd_id=$_GET['prd_id'];
		
		include 'conn.php';

	$query="SELECT * FROM `product` where prd_id='$prd_id'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$prd_cat=$row['prd_cat'];
		$prd_brand=$row['prd_brand'];
		$prd_desc=$row['prd_desc'];
		$prd_price=$row['prd_price'];
    $prd_name=$row['prd_name'];
    $prd_img=$row['prd_img'];
	}
	
	?>
		   <form name="register" action="productinsert.php" method="post" class="container" style="height: 700px;width: 500px;margin-top: 100px;">
        <input type="hidden" name="prd_id" value="<?php echo $prd_id?>" id="prd_id">
    <div class="form-group">
       <h1 style="font-family: cursive;">Edit The Product</h1>
      <label>Product Category</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="category" name="prd_cat" placeholder="Product Category" class="form-control" value="<?php echo $prd_cat?>">
    </div>
    </div>
    <div class="form-group">
      <label>Product Brand</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Brand" name="prd_brand" placeholder="Product Brand" class="form-control" required="" value="<?php echo $prd_brand?>">
    </div>
    </div>
     <div class="form-group">
    <label>Product Description</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Description" name="prd_desc" placeholder="Product Description" class="form-control" required="" value="<?php echo $prd_desc?>">
    </div>
    </div>
     <div class="form-group">
    <label>Product Price</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="price" name="prd_price" placeholder="Product Price" class="form-control" required="" value="<?php echo $prd_price?>">
    </div>
    </div>
    <div class="form-group">
      <label>Product Name</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="text" name="prd_name" placeholder="Product name" class="form-control" required="" value="<?php echo $prd_name?>">
    </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-success" id="btn">Submit</button>
  </form>
	<img src="<?php echo $prd_img?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%;margin-left: 500px;margin-bottom: 100px;">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $prd_id?>" readonly>

    <input type="file" name="files[]" id="file" accept=".jpg" required/>
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
                               	"prd_id":eid,
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
			var prd_name=document.getElementById('prd_name').value;
                var prd_id=document.getElementById('prd_id').value;
                var prd_cat = document.getElementById('prd_cat').value;
                var prd_brand = document.getElementById('prd_brand').value;
                var prd_desc = document.getElementById('prd_desc').value;
                var prd_price = document.getElementById('prd_price').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "prd_name":name,
                        "prd_cat":cat,
                        "prd_brand":brand,
                        "prd_desc":desc,
                        "prd_price":price,
                        "prd_id":id
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