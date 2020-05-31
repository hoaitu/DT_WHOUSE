


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
                        <h4 class="card-title mb-4 mt-1">Register</h4>



                        <hr>
                        <form action="register_submit.php" method="POST" role="form" enctype="multipart/form-data">
                             <!-- <form method="POST" > -->

                           <!--  <div class="form-group">
                                <input name="name" class="form-control" placeholder="name" type="text">
                            </div> -->

                            <div class="form-group">
                                <input name="Email" class="form-control" placeholder="Email" type="email">
                            </div>
                            <div class="form-group">
                                <input  name = "pass" class="form-control" placeholder="*****" type="password">
                            </div> 
                             <div class="form-group">
                                <input  name = "repass" class="form-control" placeholder="*****" type="password">
                            </div>         
                            <div>
                                <input type="checkbox" name="remember" value="1"> Remember pass? 
                                <!-- 1: giá trị mặc định nếu ko check -->
                            </div>                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" name = "submit" class="btn btn-primary btn-block"> Register  </button>
                                    </div> 
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-primary btn-block"> Reset  </button>
                                    </div> 
                                    
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="small" href="ADmin/login.php">Login <em>you have acount</em></a>
                                </div>   
                                <div class="col-md-6 text-right">
                                    <a class="small" href="#">Forgot password?</a>
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