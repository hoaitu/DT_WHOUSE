<?php 

require_once ('../../connection.php');
date_default_timezone_set('Asia/Ho_Chi_Minh'); //láy đúng time phải set


	// upload file
	$target_dir = "../../img/";  // thư mục chứa file upload; t.muc luu trữ ảnh
	$thumbnail=""; //để lưu tên của ảnh

// target : ảnh sẽ đk upload lên đâu:
	// thumbnail: tên bên posts_add: name
	$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên
// ex: ../../img/zent.png;

	// echo "<pre>";
	// 	print_r($_FILES);

	// echo "</pre>";
	// die;

	$status =  move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
	 // die( $status); true
	// 
	// $status_upload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
	// move : đưa file lên; 
	// tmp_name: đường dẫn ảnh tạm thời

	if ($status==true) { // nếu upload file không có lỗi 
		// if ($status == true);
	    $thumbnail = basename( $_FILES["thumbnail"]["name"]); 
	    // láy tên ảnh
	   
	}


// 

// type hide : post_edit: lay tu form 
$id = $_POST['id'] ;
$title = $_POST['Title'] ;
$description = $_POST['Description'] ;
$content = $_POST['Contents'] ;
// sttus : check ==1 ; ko check == eror 

$statuss= 0; //giá trị mặc định nếu ko check
if(isset($_POST['sttus'])) $statuss = $_POST['sttus'];//láy giá trị mặc định của name : status
// 
$cate_choose = $_POST['choose_cate'];
// time()
$creat_time = date('Y-m-d H:i:s');



// $Thumbnail = $_POST['thumbnail'];
// lays thumbnail : ở trên :))
$query = "INSERT INTO posts (title,desciption,contents,thumbnail,status, category_id, created_at) VALUES ('".$title."', '".$description."' , '".$content."','".$thumbnail."' , '".$statuss."', '".$cate_choose."', '".$creat_time."' ); ";


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
	header('Location: post_add_description.php?id='.$id);

}


?>

<!-- Array
(
    [Thumbnail] => Array
        (
            [name] => spa.jpg
            [type] => image/jpeg
            [tmp_name] => E:\PHP_ZENT\Xampp\tmp\phpD872.tmp
            [error] => 0
            [size] => 120054
        )

) -->