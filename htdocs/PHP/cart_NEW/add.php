<?php 
session_start() ;
// session_destroy();
	
require_once('connection.php');
// san pham se được update lên bảng
$id = isset($_GET ['id']) ? (int)$_GET['id'] : '' ;

// láy id sản phẩm kiểm tra xem hàng này có tồn tại trong giỏ hàng my sql ko ::
// $product =  $connection->fetchOne("posts" , $id) ;
$quer = 'SELECT * FROM  posts WHERE id='.$id;
// die($quer );

$prt =  $connection-> query($quer)  ;
$product = $prt->fetch_assoc();

// die($id);
echo "<pre/>";
var_dump($product);
if ($product) {
 // Bc 2: tạo sesion chua , chua tạo, có rồi tăng 1 ;

// nếu sesion đã tồn tại
if (isset ($_SESSION['cart']) ){

	// var_dump("Da ton tai gio hang");
// nếu đã tồn tại session có cái id đó thì số lượng cộng thêm 1
	if(isset($_SESSION['cart'][$id])) {
		$_SESSION ['cart'][$id]['qty'] +=1 ;
		   // header('Location: index.php');exit();

	}
	// nếu như id đó chua có thì tạo mới:
	else {
		$_SESSION ['cart'][$id]['qty']=1 ;
	}
	// // xong rồi đưa về trang chủ
		$_SESSION ['cart'][$id]['title']=$product['title'] ;
		$_SESSION ['success'] = 'ton tai gio hang ! Cap nhat thanh cong';
		header ('Location: index.php'); exit();

} 
		else {

	$_SESSION ['cart'][$id]['qty']=1 ;
	// lưu name
	$_SESSION ['cart'][$id]['title']=$product['title'] ;
	$_SESSION ['success'] = 'tao moi gio hang thanh cong';
	header ('Location: index.php'); exit();
	// sesstion chua ton tai
}
}else {

$_SESSION ['success'] = 'Ko ton tai spham';
	header ('Location: index.php'); exit();
}



 ?>