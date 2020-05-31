
<?php 


// $target_dir = "../../img/";  // thư mục chứa file upload; t.muc luu trữ ảnh


// // target : ảnh sẽ đk upload lên đâu:
//   // thumbnail: tên bên posts_add: name
//   $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên
// // ex: ../../img/zent.png;

//   // echo "<pre>";
//   //  print_r($_FILES);

//   // echo "</pre>";
//   // die;

//   $status =  move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
//    // die( $status); true
//   // 
//   // $status_upload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
//   // move : đưa file lên; 
//   // tmp_name: đường dẫn ảnh tạm thời

//   if ($status==true) { // nếu upload file không có lỗi 
//     // if ($status == true);
//       $thumbnail = basename( $_FILES["thumbnail"]["name"]); 
//       // láy tên ảnh
     
//   }





require_once ('../../connection.php');
///////////////
//load du lieu
$id = $_GET['id'] ;
//load category : load dmuc menu
$query_posts = "SELECT * FROM  posts where id =".$id;
//vi chi lay dau tien gia tri bang ghi
$posts = $connection->query($query_posts)-> fetch_assoc();
// 
// 
 // $thumbnail=<?=$posts['thumbnail']?>; /
 <!-- /để lưu tên của ảnh -->
    <!-- echo($thumbnail); -->

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
		<div class="row">

			<h2 align="center">EDIT POSTS</h2>

		</div>
    <form action="post_edit_action.php" method="POST" role="form" enctype="multipart/form-data"> <!-- enctype : để upload file -->

<input type="hidden" name="id" value="<?=$posts['id']?>">
<!--  -->

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
        <input type="text" class="form-control" id="" name="Title" value="<?=$posts['title']?>">
              <!-- </div> -->

    <!-- <div class="form-group"> -->
        <label for="">Description</label>
        <input type="text" class="form-control" id="" name="Description" value="<?=$posts['desciption']?>">
        <!--  -->
     
         <label for="">Contents</label>
        <input type="text" class="form-control" id="" name="Contents" value="<?=$posts['contents']?>">

  <!--  <textarea rows="4" cols="50" name="comment" form="usrform">
Enter text here...</textarea>
 -->
 <div >
    <label for="">Thumbnail</label>
 </div>

    
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" text-align= "center">
      <input type="file" class="form-control" id="file" name="thumbnail" >
      <!-- multiple : có thể chọn nhiều hình -->
        <!-- <input multiple  type="file" class="form-control" id="file" name="thumbnail" > -->
    </div>
   
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <h2><img src="../../img/<?=$posts['thumbnail']?>" style= "max-width: 150px;"> </h2>

    </div>
			
        

      </div>

    
      <button type="submit"   class="btn btn-primary" value="Update" name="process">Update</button>
    </form>

   

	
	</div>


</body>
</html>
