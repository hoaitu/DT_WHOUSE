<?php session_start();
if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){header('Location: ../login.php');}
require_once('../../connection.php');
$id=$_POST['id'];
$Nam =$_POST['Name'];
$Email=$_POST['Email'];
$PassWord=$_POST['PassWord'];
$query="UPDATE authors SET name = '".$Name."',email='".$Email."',password=md5('".$PassWord."'),stattus='".$Status."'WHERE id=".$id;
$status=$connection->query($query);
if($status==true){
setcookie('msg','Cap nhat thanh cong',time()+5);
header('Location: author.php');
}else{
setcookie('msg','Cap nhat khong thanh cong',time()+5);
header('Location: author_edit.php?id='.$id);}?>

<!-- 
 -->

 <!-- //lay du lieu tu form post_edit -->

<?php 

 session_start();
// Neu chua ton tai hoac sai thi ko vao ddk 
    if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: ../login.php');
    }


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
<!-- /////////// -->
<!-- ADD DESSCRIPTION --> --> --> -->

<?php 
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
header('Location: ../login.php');}
$Status=0;
if(isset($_POST['checkbox1']))  $Status = $_POST['checkbox1'];
require_once ('../../connection.php');
$id=$_POST['id'] ;
$Name=$_POST['Name'] ;
$Email=$_POST['Email'] ;
$PassWord=md5($_POST['PassWord']);
$query="INSERT INTO authors (name,email,password,stattus) VALUES('".$Name."','".$Email."','".$PassWord."','".$Status."');";
$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
if($status==true){setcookie('msg', 'Cap nhat thanh cong' , time()+5);
header('Location: author.php');
}else{
setcookie('msg','Cap nhat khong thanh cong',time()+5);
header('Location: author_add_description.php?id='.$id);}?>
<!--  -->

<?php 
// $PassWord = $_POST['PassWord'] ;
// echo md5("$PassWord");
// echo sha1($_POST['PassWord']);
// die();
// Trang chu ko dang nhap ko dk vaof
    session_start();
// Neu chua ton tai hoac sai thi ko vao ddk 
    if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: ../login.php');
    }

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
