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
  <?php $iphone_id=$_GET['iphone_id'];
    
    include 'conn.php';

  $query="SELECT * FROM `iphone` where iphone_id='$iphone_id'";
  $result=mysqli_query($con,$query);
  $json_data=array();
  while($row=mysqli_fetch_assoc($result)){
    
   // $iphone_brand=$row['iphone_brand'];
    $iphone_desc=$row['iphone_desc'];
    $iphone_price=$row['iphone_price'];
    $iphone_name=$row['iphone_name'];
    $iphone_img=$row['iphone_img'];
  }
  
  ?>
       <form name="register" action="iphoneinsert.php" method="post" class="container" style="height: 700px;width: 500px;margin-top: 100px;">
        <input type="hidden" name="iphone_id" value="<?php echo $iphone_id?>" id="iphone_id">
    <div class="form-group">
       <h1 style="font-family: cursive;">Edit The iphone</h1>
    </div>
   <!-- <div class="form-group">
      <label>iphone Brand</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Brand" name="iphone_brand" placeholder="iphone Brand" class="form-control" required="" value="<?php echo $iphone_brand?>">
    </div>
    </div>-->
     <div class="form-group">
    <label>iphone Description</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Description" name="iphone_desc" placeholder="iphone Description" class="form-control" required="" value="<?php echo $iphone_desc?>">
    </div>
    </div>
     <div class="form-group">
    <label>iphone Price</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="price" name="iphone_price" placeholder="iphone Price" class="form-control" required="" value="<?php echo $iphone_price?>">
    </div>
    </div>
    <div class="form-group">
      <label>iphone Name</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="text" name="iphone_name" placeholder="iphone name" class="form-control" required="" value="<?php echo $iphone_name?>">
    </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-success" id="btn">Submit</button>
  </form>
  <img src="<?php echo $iphone_img?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%;margin-left: 500px;margin-bottom: 100px;">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $iphone_id?>" readonly>

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
                                "iphone_id":eid,
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
      var iphone_name=document.getElementById('iphone_name').value;
                var iphone_id=document.getElementById('iphone_id').value;
               
                var iphone_desc = document.getElementById('iphone_desc').value;
                var iphone_price = document.getElementById('iphone_price').value;
                var iphone_img=document.getElementById('iphone_img').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "iphone_name":name,
                        
                        //"iphone_brand":brand,
                        "iphone_desc":desc,
                        "iphone_price":price,
                        "iphone_img":image,
                        "iphone_id":id
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