
<?php 
require_once ('../../connection.php');

///////////////
$id = $_GET['id'] ;
//load category : load dmuc menu
$query_posts = "SELECT * FROM  posts where id =".$id;
//vi chi lay dau tien gia tri bang ghi
$posts = $connection->query($query_posts)-> fetch_assoc();

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

	<h1>ZENT-EDUCATION TECHNOLOGY GROUP POSTS</h1>
	<!-- /BUTTON THEM MOI/ -->
	<div class="container-fluid">
		<h3>Post detail</h3>
		<hr>
		<h2>Title: <?=$posts['title']?></h2>
		<h2>id: <?=$posts['id']?></h2>
		<h2>Description: <?=$posts['desciption']?></h2>
		<h2>Contents:</h2>
		<p> <?=$posts['contents']?></p>
		<h2>Thumbnail: <img src="../../img/<?=$posts['thumbnail']?>" width=200> </h2>
		<h2>Name img:<?=$posts['thumbnail']?> </h2>
		<!-- src= ../../img/<> -->
		<h2>Creat at: <?=$posts['created_at']?></h2>
	</div>

</body>
</html>
