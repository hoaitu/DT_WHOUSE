<?php 
require_once ('connection.php');
// lay name = submit
if (isset($_POST['submit'] ) && $_POST ['Email']!= '' && $_POST ['pass']!= '' && $_POST ['repass']!= '' ) {
	// thux hien xli nguowi dung khi nhan nut submit va phai dien day du thong tin
	$username = $_POST['Email'];
	$name = $_POST['name'];
	$pass= $_POST['pass'];
	$repass= $_POST['repass'];
	$role = 0;
	$status = 1 ;
	$password = md5($pass) ;
	if( $pass != $repass){
		header ('Location: register.php');
	}
	$sql = "SELECT * FROM authors WHERE email = '".$username."' ";
	// var_dum ($sql) ;

	$result_sql = $connection->query($sql) ; //0: ko trung sql ; con lai trung vs sql
	
	if ( mysqli_num_rows($result_sql) > 0){
		header ('Location: register.php');

	}

$query = "INSERT INTO `authors` (email , `password` ) VALUES ('".$username."' , '".$password."' , '".$role."' ,  '".$status."')";

$result_sql = $connection->query($sql) ;
echo "Da dki thanh cong";
 header('Location: ADmin/login.php'); 



}else {
	// neu sai chay loi thi 
	header('Location: register.php');
}



 ?>