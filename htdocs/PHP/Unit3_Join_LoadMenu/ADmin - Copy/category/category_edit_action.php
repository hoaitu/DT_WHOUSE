<?php 

require_once ('../../connection.php');
$id = $_POST['id'] ;
$title = $_POST['Title'] ;
$description = $_POST['Description'] ;
$query = "UPDATE categoris SET title = '".$title."' , description = '".$description."' WHERE id =".$id ;


//ko phai cau lenh lay du lieu nen ko can fetch-assoc:
$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
// var_dump($status) ;


if($status == true){
	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
	header('Location: ADMIN.php');

} else {
	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	//dua toi dau
	header('Location: category_edit.php?id='.$id);

}


?>