
<?php 


require_once ('../../connection.php');
///////////////
//load du lieu
$id = $_GET['id'] ;
//load category : load dmuc menu
$query_author = "SELECT * FROM  authors where id =".$id;
//vi chi lay dau tien gia tri bang ghi
$author = $connection->query($query_author)-> fetch_assoc();

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
		<link rel="stylesheet" href="../../css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../../css/style.css"/>

    </head>
<body>

  <h1>ZENT-EDUCATION TECHNOLOGY GROUP POSTS</h1>
  <!-- /BUTTON THEM MOI/ -->
  <div class="container-fluid">
    <h3>Author detail</h3>
    <hr>
    <h2>Name: <?=$author['name']?></h2>
    <h2>id: <?=$author['id']?></h2>
    <h2>Email: <?=$author['email']?></h2>
    <h2>PassW:<?=$author['stattus']?></h2>
  
     <h2>Status: <?=$author['stattus']?></h2>
    <!-- src= ../../img/<> -->

  </div>

</body>
</html>
