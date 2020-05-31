

<?php 

 session_start();
// Neu chua ton tai hoac sai thi ko vao ddk 
    if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: ../login.php');
    }

require_once ('../../connection.php');
///////////////
//load du lieu
$id = $_GET['id'] ;
//load category : load dmuc menu
$query_author = "SELECT * FROM  authors WHERE id =".$id;

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
    <form action="author_edit_action.php" method="POST" role="form" enctype="multipart/form-data"> <!-- enctype : để upload file -->

      <input type="hidden" name="id" value="<?=$author['id']?>">



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
        <label for="">Name</label>
        <input type="text" class="form-control" id="" name="Name" value="<?=$author['name']?>">
              <!-- </div> -->

    <!-- <div class="form-group"> -->
        <label for="">Email</label>
        <input type="text" class="form-control" id="" name="Email" value="<?=$author['email']?>">
        <!--  -->
     
         <label for="">PassWord</label>
       <input type="password" class="form-control" id="" name="PassWord" value="<?=$author['password']?>">

  <!--  <textarea rows="4" cols="50" name="comment" form="usrform">
Enter text here...</textarea>
 -->

			 <label for="">Status</label>
       <select name= "status">

        
                  <option  <?php  if ( !empty($author['stattus']) ) { ?>

                                selected
                   
                           <?php } ?>  
                           value="1">
                                    Active
                  </option>




                  <option   <?php  if (empty($author['stattus']) )  { ?>

                                  selected
                   
                           <?php } ?>  

                          value="0">Block </option>

       
       

       </select>
        
        
       


      </div>

    
      
    
      <button type="submit" class="btn btn-primary">Update</button>
    </form>

   

	
	</div>


</body>
</html>
