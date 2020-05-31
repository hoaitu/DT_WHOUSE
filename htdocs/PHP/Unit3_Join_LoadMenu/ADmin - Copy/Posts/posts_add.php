

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

	<h1>ZENT-EDUCATION TECHNOLOGY GROUP CATEGORY LIST</h1>
	<!-- /BUTTON THEM MOI/ -->
	<div class="container-fluid">
		<div class="row">

			<h2 align="center">EDIT POSTS</h2>

		</div>
    <form action="post_add_description.php" method="POST" role="form" enctype="multipart/form-data"> <!-- enctype : để upload file -->



      <legend>ZENT-EDUCATION TECHNOLOGY GROUP CATEGORY LIST</legend>

      <!-- Thong bao thanh cong  -->
      <?php 
      if(isset($_COOKIE['msg']))
      	// can print mess trong cookie
      {?>

      	<div class="alert alert-warning" role="alert">
      		<!-- Vui long thu cap nhat lai -->
 <strong> That bai!!!!</strong> <?=$_COOKIE['msg']?>
</div>


  <?php }  ?>

		 		<!-- end -->
    

      <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" id="" name="Title">
              <!-- </div> -->

    <!-- <div class="form-group"> -->
        <label for="">Description</label>
        <input type="text" class="form-control" id="" name="Description">
        <!--  -->
     
         <label for="">Contents</label>
        <textarea rows="4" cols="50" class="form-control" id="" name="Contents" value="<?=$posts['contents']?>"> </textarea>

  <!--  <textarea rows="4" cols="50" name="comment" form="usrform">
Enter text here...</textarea>
 -->

			 <label for="">Thumbnail</label>
        
        <!-- file: để có thể láy đk ảnh :D  -->
         <input type="file" class="form-control" id="" name="thumbnail" >
         <!-- file ảnh : bc1: đưa ảnh lên server ; láy tên ảnh inser vào csdl -->

      <label for="">Show post</label>
      <!-- Check hien thi bai viet -->

 <input type="checkbox" class="form-control float_left" id="" name="sttus"  value="1">
<em>(Check to show post)</em><br>

<!-- select category -->
<label for="" >Category</label>
    <select name = "choose_cate" class="form-control">
<option disabled="disabled" >CHOOSE CATEGORY</option>
<?php foreach ($categories as $cate) {
 ?>
<option value="<?=$cate['id']?>">  <?=$cate['title']?>  </option>
<?php } ?>

    </select>
      


      </div>

    
      
    
      <button type="submit" class="btn btn-primary">Add</button>
    </form>

   

	
	</div>


</body>
</html>
