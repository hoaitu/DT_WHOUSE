<?php 
session_start() ;
// session_destroy();
require('db.php') ;
$id = $_GET['id'] ;



$query_ct = mysqli_query($con , "SELECT * FROM book WHERE id =".$id) ;

$data = mysqli_fetch_array($query_ct) ;
$cart = array();
// 
if (empty($_SESSION['cart'])) {
	$cart[$id] = array(
		"id"=>$data['id'] ,
		"ten"=>$data['title'] ,
		"soluong"=> 1 ,
		"gia"=>$data['price'] 
	) ;

	$_SESSION['cart'][$id] = $cart[$id]  ;
}
else {
// đã tồn tại
if(array_key_exists($id , $_SESSION['cart'])) {
	$cart[$id] = array(
		"id"=>$data['id'] ,
		"ten"=>$data['title'] ,
		"soluong"=> $_SESSION['cart'][$id]['soluong']+1,
		"gia"=>$data['price'] 
	) ;

}
else {

$cart[$id] = array(
		"id"=>$data['id'] ,
		"ten"=>$data['title'] ,
		"soluong"=> 1,
		"gia"=>$data['price'] 
	) ;
$_SESSION['cart'][$id] = $cart[$id]  ;

}
}

	$_SESSION['cart'][$id] = $cart[$id]  ;
	
	
 ?>