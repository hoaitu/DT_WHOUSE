
<?php 


require_once ('../../connection.php');
///////////////
$id = $_GET['id'] ;
//load category : load dmuc menu
$query_category = "SELECT * FROM  categoris where id =".$id;
//vi chi lay dau tien gia tri bang ghi
$categories = $connection->query($query_category)-> fetch_assoc();

 ?>


<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" -->
<link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css"
		/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

    </head>
<body>

	<h1>ZENT-EDUCATION TECHNOLOGY GROUP CATEGORY LIST</h1>
	<!-- /BUTTON THEM MOI/ -->
	<div class="container-fluid">
		<h3>Category detail</h3>
		<hr>
		<h2>Title: <?=$categories['title']?></h2>
		<h2>Description: <?=$categories['description']?></h2>
	</div>

</body>
</html>
