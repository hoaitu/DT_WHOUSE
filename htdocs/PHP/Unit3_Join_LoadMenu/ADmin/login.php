<?php 
// var_dump($_POST);
if ( isset($_POST['Email']) && isset ($_POST ['pass'] )  ) {
    if ( isset ($_POST['remember'])){
        setcookie("msg" , $_POST['Email'], time()+10 , "/");
    }


}else {
    $error = "you have to enter username and password" ;
}
 ?>


 <!--  -->

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
            <aside class="col-sm-3"></aside>
            <aside class="col-sm-6">    
                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title mb-4 mt-1">Sign in</h4>

<?php 
      if(isset($_COOKIE['msg']))
        // can print mess trong cookie
      {?>

        <div class="alert alert-warning" role="alert">
            <!-- Vui long thu cap nhat lai -->
 <strong> That bai!!!!</strong> <?=$_COOKIE['msg']?>
</div>


  <?php }  ?>


                        <hr>
                        <form action="login_action.php" method="POST" role="form" enctype="multipart/form-data">
                             <!-- <form method="POST" > -->

                            
        
                            <div class="form-group">
                                <input name="Email" class="form-control" placeholder="Email" type="email">
                            </div>
                            <div class="form-group">
                                <input  name = "pass" class="form-control" placeholder="*****" type="password">
                            </div>          
                            <div>
                                <input type="checkbox" name="remember" value="1"> Remember pass? 
                                <!-- 1: giá trị mặc định nếu ko check -->
                            </div>                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block"> Login  </button>
                                    </div> 
                                  
                                   
                                    <div>
                                        <?php echo (isset ($error) ? $error : "ko lỗi" ); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="small" href="#">Forgot password?</a>
                                </div>     
                                 <div class="col-md-6 text-right">
                                    <a class="small" href="../register.php"> Register <em>you haven't account</em></a>
                                </div>                                          
                            </div>
                        </form>
                    </article>
                </div>
            </aside>
        </div>
    </div> 
</body>
</html>