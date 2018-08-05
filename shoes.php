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
	<button id="button">Click me</button><br>
<input type="text" name="search" id="search" placeholder="Enter Name to search">
<button id="searchbtn">Search</button>
<table class="table" id="history_display">
    <thead>
     <th>ID</th>
      <th>brand</th>
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
				url:'shoesearch.php',
				type:'post',
				data:{
					"shoe_name":a
				},
				success:function(response){
					
					var obj=JSON.parse(response);
					
                        var table_content=""
                        $('#history_display').find('tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                        	alert(value.shoe_id)
                            table_content+="<tr>";
                            table_content+="<td>"+value.shoe_id+"</td>";
                           
                            table_content+="<td>"+value.shoe_brand+"</td>";
                            table_content+="<td>"+value.shoe_desc+"</td>";
                            table_content+="<td>"+value.shoe_price+"</td>";
                            table_content+="<td>"+value.shoe_name+"</td>";
                            table_content+="<td>"+value.shoe_img+"</td>";
  
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
	$(function(){
		$('#button').click(function(){
			$.ajax({
				url:'shoeindex.php',
				type:'get',
				data:{

				},
				success: function(response){
					
					var obj=JSON.parse(response);

                        var table_content=""
                        $('#history_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.shoe_id+"</td>";
                            
                            table_content+="<td>"+value.shoe_brand+"</td>";
                            table_content+="<td>"+value.shoe_desc+"</td>";
                            table_content+="<td>"+value.shoe_price+"</td>";
                            table_content+="<td>"+value.shoe_name+"</td>";
                            table_content+="<td>"+value.shoe_img+"</td>";
  
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