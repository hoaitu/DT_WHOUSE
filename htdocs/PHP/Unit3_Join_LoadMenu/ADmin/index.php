<?php 

// Trang chu ko dang nhap ko dk vaof
    session_start();
// Neu chua ton tai hoac sai thi ko vao ddk 
    if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: login.php');

    }

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


    // ktra vao session chua
    // echo $_SESSION['isLogin'];
    // isLogin === isLogin trong trang login_action ;
require_once ('../connection.php');
date_default_timezone_set('Asia/Ho_Chi_Minh'); //láy đúng time phải se


 ?>


<!DOCTYPE html>
<html>
<head>
    <title>PHP - Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>  
    <br><br>
    <div class="container">
        <div class="row">
            <aside class="col-sm-12">  
                <div class="card">
                    <article class="card-body">
                        <a href="logOut.php" class="float-right btn btn-outline-primary">Logout</a>
                         <a href="../index.php" class="float-right btn btn-outline-primary">User</a>

<?php 
      if(isset($_COOKIE['msg']))
        // can print mess trong cookie
      {?>

        <div class="alert alert-warning" role="alert">
            <!-- Vui long thu cap nhat lai -->
 <strong> Thanh cong !!!!</strong> <?=$_COOKIE['msg']?>
</div>


  <?php }  ?>

                        <h4 class="card-title mb-4 mt-1">Admin Site</h4>

                        <hr>
                        <h5>Xin chào <?=$_SESSION['authour']['name']?></h5>
                        <ul>
                            <li><a href="author/author.php">Quản lý người dùng</a></li>
                            <li><a href="category/ADMIN.php">Quản lý danh mục</a></li>
                            <li><a href="Posts/posts.php">Quản lý bài viết</a></li>
                        </ul>
                    </article>
                </div>
            </aside>
        </div>
    </div> 
</body>
</html>
<!-- Array
(
    [isLogin] => 1
    [authour] => Array
        (
            [id] => 19
            [name] => hoaitu
            [email] => hoaitugl@gmail.com
            [password] => 202cb962ac59075b964b07152d234b70
            [stattus] => 1
        )

)
 -->