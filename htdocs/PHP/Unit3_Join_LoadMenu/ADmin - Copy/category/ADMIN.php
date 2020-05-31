


<?php 


require_once ('../../connection.php');
///////////////

//load category : load dmuc menu
$query_category = "SELECT * FROM  categoris ";
$result_category = $connection->query($query_category);
$categories = array();
while ($row = $result_category -> fetch_assoc() ) {
  $categories[] = $row ;
 } 
 ?>

<!--  -->
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
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

    </head>
<body>

	<h1>ZENT-EDUCATION TECHNOLOGY GROUP CATEGORY LIST</h1>
	<!-- /BUTTON THEM MOI/ -->
	<div class="container-fluid">
		<div class="row">
			<a href="category_add1.php" 
		 type="button" class="btn btn-primary"> Them moi </a>
		</div>
 <?php 
      if(isset($_COOKIE['msg']))
      {?>

        <div class="alert alert-success" role="alert">
 <strong> !!!!</strong> <?=$_COOKIE['msg']?>!!
</div>


  <?php }  ?>

		<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($categories as $cate){ ?>
       


      <tr>
        <td><?=$cate['id']?></td>
        <td><?=$cate['title']?></td>
        <td><?=$cate['description']?></td>
        <td>
          
          <a href="category_detail.php?id=<?=$cate['id']?>">  <button type="button" class="btn btn-primary">Xem</button></a>
          
        	<a href="category_edit.php?id=<?=$cate['id']?>">
          <button type="button" class="btn btn-success">Sửa</button></a>

        <a href="category_delete.php?id=<?=$cate['id']?>">	<button type="button" class="btn btn-warning">Xóa</button></a>
        </td>

      </tr>
          <?php }  ?>
    </tbody>
  </table>
	</div>


</body>
</html>

