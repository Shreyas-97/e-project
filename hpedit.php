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
	<?php $hp_id=$_GET['hp_id'];
		
		include 'conn.php';

	$query="SELECT * FROM `hp` where hp_id='$hp_id'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		
		$hp_brand=$row['hp_brand'];
		$hp_desc=$row['hp_desc'];
		$hp_price=$row['hp_price'];
    $hp_name=$row['hp_name'];
    $hp_img=$row['hp_img'];
	}
	
	?>
		   <form name="register" action="hpinsert.php" method="post" class="container" style="height: 700px;width: 500px;margin-top: 100px;">
        <input type="hidden" name="hp_id" value="<?php echo $hp_id?>" id="hp_id">
    <div class="form-group">
       <h1 style="font-family: cursive;">Edit The hp</h1>
    </div>
    <div class="form-group">
      <label>hp Brand</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Brand" name="hp_brand" placeholder="hp Brand" class="form-control" required="" value="<?php echo $hp_brand?>">
    </div>
    </div>
     <div class="form-group">
    <label>hp Description</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Description" name="hp_desc" placeholder="hp Description" class="form-control" required="" value="<?php echo $hp_desc?>">
    </div>
    </div>
     <div class="form-group">
    <label>hp Price</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="price" name="hp_price" placeholder="hp Price" class="form-control" required="" value="<?php echo $hp_price?>">
    </div>
    </div>
    <div class="form-group">
      <label>hp Name</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="text" name="hp_name" placeholder="hp name" class="form-control" required="" value="<?php echo $hp_name?>">
    </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-success" id="btn">Submit</button>
  </form>
	<img src="<?php echo $hp_img?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%;margin-left: 500px;margin-bottom: 100px;">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $hp_id?>" readonly>

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
                               	"hp_id":eid,
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
			var hp_name=document.getElementById('hp_name').value;
                var hp_id=document.getElementById('hp_id').value;
               
                var hp_brand = document.getElementById('hp_brand').value;
                var hp_desc = document.getElementById('hp_desc').value;
                var hp_price = document.getElementById('hp_price').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "hp_name":name,
                        
                        "hp_brand":brand,
                        "hp_desc":desc,
                        "hp_price":price,
                        "hp_id":id
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