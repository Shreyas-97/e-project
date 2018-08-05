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
  <?php $sony_id=$_GET['sony_id'];
    
    include 'conn.php';

  $query="SELECT * FROM `sony` where sony_id='$sony_id'";
  $result=mysqli_query($con,$query);
  $json_data=array();
  while($row=mysqli_fetch_assoc($result)){
    
   // $sony_brand=$row['sony_brand'];
    $sony_desc=$row['sony_desc'];
    $sony_price=$row['sony_price'];
    $sony_name=$row['sony_name'];
    $sony_img=$row['sony_img'];
  }
  
  ?>
       <form name="register" action="sonyinsert.php" method="post" class="container" style="height: 700px;width: 500px;margin-top: 100px;">
        <input type="hidden" name="sony_id" value="<?php echo $sony_id?>" id="sony_id">
    <div class="form-group">
       <h1 style="font-family: cursive;">Edit The sony</h1>
    </div>
   <!-- <div class="form-group">
      <label>sony Brand</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Brand" name="sony_brand" placeholder="sony Brand" class="form-control" required="" value="<?php echo $sony_brand?>">
    </div>
    </div>-->
     <div class="form-group">
    <label>sony Description</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Description" name="sony_desc" placeholder="sony Description" class="form-control" required="" value="<?php echo $sony_desc?>">
    </div>
    </div>
     <div class="form-group">
    <label>sony Price</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="price" name="sony_price" placeholder="sony Price" class="form-control" required="" value="<?php echo $sony_price?>">
    </div>
    </div>
    <div class="form-group">
      <label>sony Name</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="text" name="sony_name" placeholder="sony name" class="form-control" required="" value="<?php echo $sony_name?>">
    </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-success" id="btn">Submit</button>
  </form>
  <img src="<?php echo $sony_img?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%;margin-left: 500px;margin-bottom: 100px;">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $sony_id?>" readonly>

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
                                "sony_id":eid,
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
      var sony_name=document.getElementById('sony_name').value;
                var sony_id=document.getElementById('sony_id').value;
               
                var sony_desc = document.getElementById('sony_desc').value;
                var sony_price = document.getElementById('sony_price').value;
                var sony_img=document.getElementById('sony_img').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "sony_name":name,
                        
                        //"sony_brand":brand,
                        "sony_desc":desc,
                        "sony_price":price,
                        "sony_img":image,
                        "sony_id":id
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