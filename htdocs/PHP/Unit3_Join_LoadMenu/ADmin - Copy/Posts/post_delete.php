
<?php 
require_once ('../../connection.php');
///////////////
$id = $_GET['id'] ;
//load category : load dmuc menu
$query_posts = "DELETE FROM posts WHERE id =".$id;
//xoa ptu: ko can tra gia trij ko can fecth-asscos
$status_posts = $connection->query($query_posts);
// : true: nhan dk kq; false: ko nhan dk kqua
//
if($status_posts == true){
	//name , value , time y want
	setcookie('msg', 'da xoa du lieu thanh cong!!!' ,time()+2);

}else{
	setcookie('msg', 'Xoa du lieu ko thanh cong, vlong ktra lai!!!' ,time()+2);
}
//location dua toi
header('Location: posts.php');

 ?>


