
<?php 

require_once ('../../connection.php');
///////////////

//load posts : load dmuc post
$query_posts = "SELECT * FROM  posts";
$result_posts = $connection->query($query_posts);
$posts = array();
while ($row = $result_posts-> fetch_assoc() ) {
  $posts[] = $row ;
 } 
 ?>
    <!-- <END> -->

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
		<link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css"/>

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
			<a href="posts_add.php" 
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
        <th>Category</th>
        <!-- <th>Contents</th> -->
        <th>thumbnail</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($posts as $post){ ?>
       


      <tr>
        <td><?=$post['id']?></td>
        <td><?=$post['title']?></td>
        <td><?=$post['desciption']?></td>
        <td><?=$post['category_id']?></td>

        <!-- ko hien thi noi dung -->
        <!-- <td><?=$post['contents']?></td> -->

<!-- //img -->
        <!-- <td><img src="<?=$post['thumbnail']?>" width=200></td> -->

     <!-- link img in computer -->
     <td><img src="../../img/<?=$post['thumbnail']?>" width=200></td>
        <!-- <td> -->
          <td>
          <a href="post_detail.php?id=<?=$post['id']?>">  <button type="button" class="btn btn-primary">Xem</button></a>
          
        	<a href="post_edit.php?id=<?=$post['id']?>">
          <button type="button" class="btn btn-success">Sửa</button></a>

        <a href="post_delete.php?id=<?=$post['id']?>">	<button type="button" class="btn btn-warning">Xóa</button></a>
        </td>

      </tr>
          <?php }  ?>
    </tbody>
  </table>
	</div>


</body>
</html>

<!--  -->
