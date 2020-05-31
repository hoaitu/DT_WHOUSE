<!-- //lay du lieu tu form post_edit -->

<?php 




require_once ('../../connection.php');
// $Status = $_POST['checkbox1'] ;;

// type hide : post_edit
$id = $_POST['id'] ;
// die($id);
$Name = $_POST['Name'] ;
$Email = $_POST['Email'] ;
$PassWord = $_POST['PassWord'] ;
// 
	$Status = $_POST['status'] ; //mặc định
	// die($Status);

	// if ( isset($_GET['action'] ) && $_GET['$action'] == 'edit' {
	// 	echo "edting"; exit() ;

	// }else {
	// 	echo "stop"; exit();

	// }




$query = "UPDATE authors SET name = '".$Name."' , email = '".$Email."' ,password= md5('".$PassWord."') ,stattus =  '".$Status."'  WHERE id =".$id ;
// die($query);

$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu

if($status == true){
	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
	header('Location: author.php');

} else {
	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	//dua toi dau
	header('Location: author_edit.php?id='.$id);

}


?>