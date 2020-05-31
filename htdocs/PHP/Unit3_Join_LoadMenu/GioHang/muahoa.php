

<?php
session_start();  //Session có thể sử dụng sau khi chèn đoạn này
ob_start();  //Sử dụng được hàm header();
?>

<html>
<head>
<title>Bài tập 6</title>
<meta charset=”utf-8″ />
<style>
body{
width: 500px;
margin: 20px auto;
}
h4{
background-color: #00A19C;
padding: 10px;
margin-bottom: 0px;
color: white;
}
div{
background-color: #C7EEEB;
padding: 5px;
}
</style>
</head>
<body>

<?php
if(isset($_POST['submit'])){
$id = $_POST['id'];
$tenhoa = $_POST['ten'];
$soluong = $_POST['soluong'];
$gia = $_POST['gia'];
if(!isset($_SESSION['arMuaHoa'][$id])){
$_SESSION['arMuaHoa'][$id] = array(
'tenhoa'=> $tenhoa,
'soluong' => $soluong,
'gi' => $gia
);
}else{
$_SESSION[‘arMuaHoa’][$id][‘soluong’] += $soluong;
}
header('Location: basket.php');
}
?>

<form action=”” method=”post”>
<h4>Mua hoa</h4>
<div>
<p><label>ID hoa: </label><input type="text" name="id" value=""></input></p>
<p><label>Tên hoa: </label><input type="text" name="ten" value=""></input></p>
<p><label>Số lượng: </label><input type="number" name="soluong" value=""></input></p>
<p><label>Giá:</label><input type="number" name="gia" value=""></input></p>
<input type="submit" name="submit" value="Mua hoa"></input>
</div>
</form>
</body>
</html>
<!--  -->

<?php
ob_end_flush();
?>