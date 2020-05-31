<?php 
// $PassWord = $_POST['PassWord'] ;
// echo md5("$PassWord");
// echo sha1($_POST['PassWord']);
// die();
$Status = 0 ; //mặc định
	
	if(isset($_POST['checkbox1']))  $Status = $_POST['checkbox1'] ;
		
	

require_once ('../../connection.php');
// type hide : authour: lay tu form 
$id = $_POST['id'] ;
$Name = $_POST['Name'] ;
$Email = $_POST['Email'] ;
$PassWord = md5($_POST['PassWord']) ;
// $Status = $_POST['Status'];
$query = "INSERT INTO authors (name,email,password,stattus) VALUES ('".$Name."', '".$Email."' , '".$PassWord."','".$Status."'  ); ";


//ko phai cau lenh lay du lieu nen ko can fetch-assoc:
$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
// var_dump($status) ;


if($status == true){
	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
	header('Location: author.php');

} else {
	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	//dua toi dau
	header('Location: author_add_description.php?id='.$id);

}


?>
<!-- 202cb962ac59075b964b07152d234b70 -->
<!-- 40bd001563085fc35165329ea1ff5c5ecbdbbeef -->
<!-- 40bd001563085fc35165329ea1ff5c5ecbdbbeef -->