<?php
session_start();
if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){header('Location: ../login.php');}
require_once('../../connection.php');
$id=$_POST['id'];
$Nam =$_POST['Name'];
$Email=$_POST['Email'];
$PassWord=$_POST['PassWord'];
$Status = $_POST['status'] ;
$query="UPDATE authors SET name = '".$Name."',email='".$Email."',password=md5('".$PassWord."'),stattus='".$Status."'WHERE id=".$id;
$status=$connection->query($query);
if($status==true){
setcookie('msg','Cap nhat thanh cong',time()+5);
header('Location: author.php');
}else{
setcookie('msg','Cap nhat khong thanh cong',time()+5);
header('Location: author_edit.php?id='.$id);}?>