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
		<div class="row">

			<h2 align="center">Add new category</h2>

		</div>
    <form action="category_add_description.php" method="POST" role="form" enctype="multipart/form-data"> <!-- enctype : để upload file -->
      <legend>ZENT-EDUCATION TECHNOLOGY GROUP CATEGORY LIST</legend>

      <!-- Thong bao thanh cong  -->
      <?php 
      if(isset($_COOKIE['msg']))
      {?>

      	<div class="alert alert-warning" role="alert">
 <strong> That bai!!!!</strong> Vui long thu lai
</div>


  <?php }  ?>

		 		<!-- end -->
    

      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="" name="Title">
              </div>

    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" id="" name="Description">
      </div>
    
      
    
      <button type="submit" class="btn btn-primary">Creat</button>
    </form>

   

	
	</div>


</body>
</html>
