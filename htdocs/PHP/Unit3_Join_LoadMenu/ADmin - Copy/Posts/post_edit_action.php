<!-- //lay du lieu tu form post_edit -->

<?php 

require_once ('../../connection.php');

	$thumbnail= $_FILES["thumbnail"]["name"]; //để lưu tên của ảnh

// type hide : post_edit
$id = $_POST['id'] ;
$title = $_POST['Title'] ;
$description = $_POST['Description'] ;
$content = $_POST['Contents'] ;
// $Thumbnail = $_POST['thumbnail'];


if($thumbnail!= null){
		$target_dir = "../../img/";  // thư mục chứa file upload; t.muc luu trữ ảnh
		$tmp_name = $_FILES["thumbnail"]["tmp_name"] ;


		$thumbnail= $_FILES["thumbnail"]["name"];
		$target_file = $target_dir . basename($thumbnail);
		move_uploaded_file($tmp_name , $target_file);
		$query = "UPDATE posts SET  thumbnail='".$thumbnail."' WHERE id =".$id ;
		$status = $connection->query($query); 
	}

$query = "UPDATE posts SET title = '".$title."' , desciption = '".$description."' ,contents='".$content."'  WHERE id =".$id ;


//ko phai cau lenh lay du lieu nen ko can fetch-assoc:
$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
// var_dump($status) ;


if($status == true){
	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
	header('Location: posts.php');

} else {
	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	//dua toi dau
	header('Location: post_edit.php?id='.$id);

}


?>