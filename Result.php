<!DOCTYPE html> 
<html> 
	<head> 
		<title>Result page</title> 
		
<style type="text/css">
.results {
	margin-left:12%;
	 margin-right:12%;
	  margin-top:10px;
	}
img{
	padding:7px 2px;
}	
.c1{
	height:40px;
}
.c1:hover{
	color:steelblue;
}
</style>
	</head> 
	
	
<body> 

<form action="result.php" method="post">
		<img src="images/logo2.png" width="100px">
		<input class="c1" type="text" name="user_query" size="80"/> 
		<input class="c1" type="submit" name="search" value="Search Now"/>
</form>
	
	
	
<?php 
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = '';
	$mysqli = new mysqli("localhost", "root", "", "search");
	
	if(isset($_POST['search'])){
	
	$post_value = $_POST['user_query'];
	
	if($post_value==''){
	
	echo "<center><b>Please go back, and write something in the search box!</b></center>";
	exit();
	}
	
	$result_query = "select * from sites where site_keywords like '%$post_value%'";
	
	$run_result = mysqli_query($mysqli,$result_query);
	
	if(mysqli_num_rows($run_result)<1){
	
	echo "<center><b>Oops! sorry, nothing was found in the database!</b></center>";
	exit();
	
	}
	
	while($row_result=mysqli_fetch_array($run_result)){
		
		$site_title=$row_result['site_title'];
		$site_link=$row_result['site_link'];
		$site_desc=$row_result['site_desc'];
		$site_image=$row_result['site_image'];
	
	echo "<div class='results'>
		
		<h2>$site_title</h2></br>
		<img src='images/$site_image' width='100' height='100' /></br>
		<a href='$site_link' target='_blank'>$site_link</a>
		
		
		<p align='justify'>$site_desc</p> 
		
		</div>";

		}
}


?>
<a href="search.html"><button>Go Back</button></a>

</body> 
</html>