
<?php 

require_once ('../../connection.php');
///////////////

//load posts : load dmuc post
$query_authors = "SELECT * FROM  authors";
$result_authors = $connection->query($query_authors);
$authors = array();
while ($row = $result_authors-> fetch_assoc() ) {
  $authors[] = $row ;
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
			<a href="author_add.php" 
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
        <th>Name</th>
        <th>Email</th>
        
        <!-- <th>Contents</th> -->
        <th>PassWord</th>
        <th>Status</th>
         <th>#</th>
      </tr>
    </thead>
    <tbody>


     <?php 
         


        foreach ($authors as $author){ 
        
        ?>
      <tr>
        <td><?=$author['id']?></td>
        <td><?=$author['name']?></td>
        <td><?=$author['email']?></td>
        <td> <input type= "password" value="<?=$author['password']?>" disabled="disabled"></td>
        <!-- Trabg thai ::  --><!-- 
 <input type="checkbox" class="form-control float_left" id="" name="sttus"  value="1"> -->
       <!--  <td> <input type="button" class="btn btn-success" id="" name="sttus"  value="Action"></td> -->
    <!-- 
      <td> <input type="button" class="btn btn-danger" id="" name="sttus"  value="<?=$author['stattus']?>"></td> -->
      <td>
        <?=$author['stattus'] ==1 ? "Action" : "Block "?>

      </td>
              

         
      
        
        

      
        <td>
          <a href="author_detail.php?id=<?=$author['id']?>">  <button type="button" class="btn btn-primary">Xem</button></a>
          
        	<a href="author_edit.php?id=<?=$author['id']?>">
          <button type="button" class="btn btn-success">Sửa</button></a>

        <a href="author_delete.php?id=<?=$author['id']?>">	<button type="button" class="btn btn-warning">Xóa</button></a>
        </td>

      </tr>
          <?php }  ?>
    </tbody>
  </table>
	</div>


</body>
</html>

