<!-- //tạo file index.php -->
<?php

require 'controllers/controller.php';
ob_start();
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta https-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Shoping cart</title>
</head> 
<body>  
<?php
if(isset($_GET['action'])=='cart'){ 
    include_once 'view/viewCart-template.php';  
}   
else{
    $checkcart = 1; 
    if (isset($_SESSION['cart'])){  
        foreach ($_SESSION['cart'] as $k => $v) {   
            if (isset($v)){
                $checkcart = 2;
            
            }
        }   
    }
    if ($checkcart != 2){   
        echo "Giỏ hàng của bạn: <strong>0 Sản Phẩm</strong>";   
    }
    else{
        echo "Giỏ hàng của bạn: <strong>".count($_SESSION['cart'])." Sản Phẩm</strong><a href='".$_SERVER['PHP_SELF']."?action=cart'>Giỏ Hàng</a>";
    }   
}
    include_once 'view/cart-template.php';
?>

    
<?php
    
if (isset($_GET['addcart'])){
    
    $cart_sp->addCart($_GET['addcart']);
        
    echo "<script>window.history.back();</script>";
    
}

    
if (isset($_GET['xoa'])){
    $cart_sp->xoaCart($_GET['xoa']);    
    echo "<script>window.history.back();</script>";
    
}
    
if (isset($_GET['xoahet'])){

    unset($_SESSION['cart']);
    echo "<script>window.history.back();</script>";
    
}
    
if (isset($_POST['update'])){
    $cart_sp->capnhatCart();
    
}

?>
</body>
</html>