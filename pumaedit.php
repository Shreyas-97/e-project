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
  <?php $puma_id=$_GET['puma_id'];
    
    include 'conn.php';

  $query="SELECT * FROM `puma` where puma_id='$puma_id'";
  $result=mysqli_query($con,$query);
  $json_data=array();
  while($row=mysqli_fetch_assoc($result)){
    
   // $puma_brand=$row['puma_brand'];
    $puma_desc=$row['puma_desc'];
    $puma_price=$row['puma_price'];
    $puma_name=$row['puma_name'];
    $puma_img=$row['puma_img'];
  }
  
  ?>
       <form name="register" action="pumainsert.php" method="post" class="container" style="height: 700px;width: 500px;margin-top: 100px;">
        <input type="hidden" name="puma_id" value="<?php echo $puma_id?>" id="puma_id">
    <div class="form-group">
       <h1 style="font-family: cursive;">Edit The puma</h1>
    </div>
   <!-- <div class="form-group">
      <label>puma Brand</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Brand" name="puma_brand" placeholder="puma Brand" class="form-control" required="" value="<?php echo $puma_brand?>">
    </div>
    </div>-->
     <div class="form-group">
    <label>puma Description</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="Description" name="puma_desc" placeholder="puma Description" class="form-control" required="" value="<?php echo $puma_desc?>">
    </div>
    </div>
     <div class="form-group">
    <label>puma Price</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="price" name="puma_price" placeholder="puma Price" class="form-control" required="" value="<?php echo $puma_price?>">
    </div>
    </div>
    <div class="form-group">
      <label>puma Name</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-forward"></i></span>
      <input type="text" name="puma_name" placeholder="puma name" class="form-control" required="" value="<?php echo $puma_name?>">
    </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-success" id="btn">Submit</button>
  </form>
  <img src="<?php echo $puma_img?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%;margin-left: 500px;margin-bottom: 100px;">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $puma_id?>" readonly>

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
                                "puma_id":eid,
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
      var puma_name=document.getElementById('puma_name').value;
                var puma_id=document.getElementById('puma_id').value;
               
                var puma_desc = document.getElementById('puma_desc').value;
                var puma_price = document.getElementById('puma_price').value;
                var puma_img=document.getElementById('puma_img').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "puma_name":name,
                        
                        //"puma_brand":brand,
                        "puma_desc":desc,
                        "puma_price":price,
                        "puma_img":image,
                        "puma_id":id
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