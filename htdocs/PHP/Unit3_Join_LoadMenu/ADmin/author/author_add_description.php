<?php
session_start();
if(!isset($_SESSION['isLogin'])&&$_SESSION['isLogin']!=true){
header('Location: ../login.php');}
require_once('../../connection.php');
$Status=0;
if(isset($_POST['checkbox1']))$Status=$_POST['checkbox1'];
$id=$_POST['id'];
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$PassWord=md5($_POST['PassWord']);
$query="INSERT INTO authors(name,email,password,stattus)VALUES('".$Name."','".$Email."','".$PassWord."','".$Status."');";
$status=$connection->query($query);
if($status==true){setcookie('msg','Cap nhat thanh cong',time()+5);
header('Location: author.php');
}else{setcookie('msg','Cap nhat khong thanh cong',time()+5);
header('Location: author_add_description.php?id='.$id);}?>