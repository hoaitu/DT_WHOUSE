<?php 
	
 session_start() ;
 // session_destroy();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: login.php');
         }


 // session_destroy();
require_once('connection.php');
	 // require_once('mainNav.php'); 
// san pham se được update lên bảng
$id = isset($_GET ['id']) ? $_GET['id'] : '' ;

 // Bc 2: tạo sesion chua , chua tạo, có rồi tăng 1 ;
$quer = 'SELECT * FROM  posts WHERE id='.$id;

$prt =  $connection-> query($quer)  
;
$product = $prt->fetch_assoc();
// echo "<pre/>";
// var_dump($product) ;

// nếu sesion đã tồn tạis
if ($product) {
// 

echo "product ton tai";

// 
$_SESSION['isLogin'] = true;



// $_SESSION['cart'] = $product; 


	if (isset ($_SESSION['cart']) ){


	if(isset($_SESSION['cart'][$id])) {
				

		$_SESSION ['cart'][$id]['qty']+=1 ;
	
	}else {
		$_SESSION ['cart'][$id]['qty'] =1 ;
			
	}
	$_SESSION ['cart'][$id]['title']=$product['title'] ;
	$_SESSION ['success'] = 'ton tai gio hang ! Cap nhat thanh cong';
		header ('Location: index.php'); exit();
	}else {

		$_SESSION ['cart'][$id]['qty']=1 ;
		$_SESSION ['cart'][$id]['title']=$product['title'] ;
	$_SESSION ['success'] = 'tao moi gio hang thanh cong';

	}


}else {
	$_SESSION ['success'] = 'Ko ton tai spham';
	header ('Location: index.php'); exit();
}
// sesstion chua ton tai

 ?>