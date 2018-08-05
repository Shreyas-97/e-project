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
<body>
	<nav class="navbar navbar-default">
 <div class="container-fluid">
 <!-- Brand and toggle get grouped for better mobile display -->
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" datatoggle="collapse"
data-target="#bs-example-navbar-collapse-1" ariaexpanded="false">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="index.php">Home</a>
 </div>
 <!-- Collect the nav links, forms, and other content for toggling -->
 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <ul class="nav navbar-nav">
 
 <li class="dropdown">
 <a href="#" class="dropdown-toggle" data-toggle="dropdown"
role="button" aria-haspopup="true" aria-expanded="false">Categories<span
class="caret"></span></a>
 <ul class="dropdown-menu">
 <li><a href="laptop.php">Laptops</a></li>
 <li><a href="phone.php">Phones</a></li>
 <li><a href="shoe.php">Shoes</a></li>
 <li role="separator" class="divider"></li>
 <li><a href="tv.php">TV's</a></li>
 <li role="separator" class="divider"></li>
 <li><a href="pendrive.php">Pen Drives</a></li>
 </ul>
 </li>
 <li class="dropdown">
 <a href="#" class="dropdown-toggle" data-toggle="dropdown"
role="button" aria-haspopup="true" aria-expanded="false">Brands <span
class="caret"></span></a>
 <ul class="dropdown-menu">
 <li><a href="#">Dell</a></li>
 <li><a href="#">iphone</a></li>
 <li><a href="#">Hp</a></li>
 <li><a href="#">Sony</a></li>
 <li><a href="#">Puma</a></li>
 <li><a href="#">Sandisk</a></li>
 </ul>
 </li>
 </ul>

 </div><!-- /.navbar-collapse -->
 </div><!-- /.container-fluid -->
</nav>
	<button id="button">Click me</button><br>
<input type="text" name="search" id="search" placeholder="Enter Name to search">
<button id="searchbtn">Search</button>
<table class="table" id="history_display">
    <thead>
     <th>ID</th>
      <th>desc</th>
      <th>price</th>
      <th>Name</th>
      <th>img</th>
    </thead>
</table>

<script type="text/javascript">
	$(function(){
		$('#searchbtn').click(function(){
			var a=document.getElementById('search').value;
			alert(a);
			$.ajax({
				url:'hpsearch.php',
				type:'post',
				data:{
					"hp_name":a
				},
				success:function(response){
					
					var obj=JSON.parse(response);
					
                        var table_content=""
                        $('#history_display').find('tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                        	alert(value.hp_id)
                            table_content+="<tr>";
                            table_content+="<td>"+value.hp_id+"</td>";
                           
                            //table_content+="<td>"+value.hp_brand+"</td>";
                            table_content+="<td>"+value.hp_desc+"</td>";
                            table_content+="<td>"+value.hp_price+"</td>";
                            table_content+="<td>"+value.hp_name+"</td>";
                            table_content+="<td>"+value.hp_img+"</td>";
  
                            table_content+="</tr>";
                        });
                        $("#history_display").append(table_content);
				},
				error:function(){
					alert('something went wrong')
				}
			})
		})
	})
	function delet(id){
		alert(id);
		$.ajax({
				url:'hpdelete.php',
				type:'post',
				data:{
					"hp_id":id
				},
				success: function(response){
					alert(response);
				},
				error:function(){
					alert('not right')
				}
			})
	}
	$(function(){
		$('#button').click(function(){
			$.ajax({
				url:'hpindex.php',
				type:'get',
				data:{

				},
				success: function(response){
					
					var obj=JSON.parse(response);

                        var table_content=""
                        $('#history_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.hp_id+"</td>";
                            
                            //table_content+="<td>"+value.hp_brand+"</td>";
                            table_content+="<td>"+value.hp_desc+"</td>";
                            table_content+="<td>"+value.hp_price+"</td>";
                            table_content+="<td>"+value.hp_name+"</td>";
                            table_content+="<td>"+value.hp_img+"</td>";
  
                            table_content+="</tr>";
                        });
                        $("#history_display").append(table_content);
				},
				error: function(){
					alert('Something went wrong');
				}
			})
		})
		
	})

</script>
</body>
</html>