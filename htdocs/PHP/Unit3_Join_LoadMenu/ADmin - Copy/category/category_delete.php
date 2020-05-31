<?php 

require_once ('../../connection.php');
// DELETE:::
$id = $_GET['id'] ;
//id : ở trang ADMIN

$query = "DELETE FROM categoris WHERE id =".$id;
var_dump($query) ;

//ko phai cau lenh lay du lieu nen ko can fetch-assoc:
$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
// var_dump($status) ;


if($status == true){
	setcookie('msg', 'Xoa thanh cong' , time()+5);
	//dua toi dau
} else {
	setcookie('msg', 'Xoa khong thanh cong' , time()+5);
}
//dua toi dau: giống nhau 
	header('Location: ADMIN.php');

?>