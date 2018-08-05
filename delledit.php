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
  <?php $dell_id=$_GET['dell_id'];
    
    include 'conn.php';

  $query="SELECT * FROM `dell` where dell_id='$dell_id'";
  $result=mysqli_query($con,$query);
  $json_data=array();
  while($row=mysqli_fetch_assoc($result)){
    
   // $dell_brand=$row['dell_brand'];
    $dell_desc=$row['dell_desc'];
    $dell_price=$row['dell_price'];
    $dell_name=$row['dell_name'];
    $dell_img=$row['dell_img'];
  }
  
  ?>
       <form name="register" action="dellinsert.php" method="post" class="container" style="height: 700px;width: 500px;margin-top: 100px;">
        <input type="hidden" name="dell_id" value="<?php echo $dell_id?>" id="dell_id">
    <div class="form-group">
       <h1 style="font-family: cursive;">Edit The dell</h1>
    </div>
   <!-- <div class="form-group">
      <label>dell Brand</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Brand" name="dell_brand" placeholder="dell Brand" class="form-control" required="" value="<?php echo $dell_brand?>">
    </div>
    </div>-->
     <div class="form-group">
    <label>dell Description</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Description" name="dell_desc" placeholder="dell Description" class="form-control" required="" value="<?php echo $dell_desc?>">
    </div>
    </div>
     <div class="form-group">
    <label>dell Price</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="price" name="dell_price" placeholder="dell Price" class="form-control" required="" value="<?php echo $dell_price?>">
    </div>
    </div>
    <div class="form-group">
      <label>dell Name</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="text" name="dell_name" placeholder="dell name" class="form-control" required="" value="<?php echo $dell_name?>">
    </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-success" id="btn">Submit</button>
  </form>
  <img src="<?php echo $dell_img?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%;margin-left: 500px;margin-bottom: 100px;">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $dell_id?>" readonly>

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
                                "dell_id":eid,
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
      var dell_name=document.getElementById('dell_name').value;
                var dell_id=document.getElementById('dell_id').value;
               
                var dell_desc = document.getElementById('dell_desc').value;
                var dell_price = document.getElementById('dell_price').value;
                var dell_img=document.getElementById('dell_img').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "dell_name":name,
                        
                        //"dell_brand":brand,
                        "dell_desc":desc,
                        "dell_price":price,
                        "dell_img":image,
                        "dell_id":id
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