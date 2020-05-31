<?php 
//neu ko ton tai sesion['cart ']
@ob_start();
session_start() ;

if (!isset($_SESSION['cart'])) 
{

header('Location: index.php'); exit();

}

	$key = isset($_GET['key']) ?  $_GET['key'] : '' ;

	if($key) {

		if(array_key_exists($key, $_SESSION['cart'])){

			// unset ==destroy::
			unset($_SESSION['cart'][$key]);
			// session_destroy($_SESSION['cart'][$key]);

			$_SESSION['success'] = 'Xoa thanh cong' ;
		}
	}
header('Location: list_cart.php'); exit();


// neu ton tai gio hang

 ?>