<!-- //lay du lieu tu form post_edit -->

<?php 
 session_start();
// Neu chua ton tai hoac sai thi ko vao ddk 
    if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: ../login.php');
    }

require_once ('../../connection.php');



// upload file
	$target_dir = "../../img/";  // thư mục chứa file upload; t.muc luu trữ ảnh
	$thumbnail=""; //để lưu tên của ảnh
	$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên

$status =  move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

if ($status==true) { // nếu upload file không có lỗi 
		// if ($status == true);
	    $thumbnail =      " ,thumbnail = '". basename( $_FILES["thumbnail"]["name"]. "'"); 
	    // die ($thumbnail);
	    // láy tên ảnh
	   
	}
















	

// type hide : post_edit
$id = $_POST['id'] ;
$title = $_POST['Title'] ;
$description = $_POST['Description'] ;
$content = $_POST['Contents'] ;
$category = $_POST['cate_id'] ;
$statuss= 0; //giá trị mặc định nếu ko check
if(isset($_POST['sttus'])) $statuss = $_POST['sttus'];//láy giá trị mặc định của name : status




$query = "UPDATE posts SET title = '".$title."' , desciption = '".$description."' ,contents='".$content."'  ,  status = '".$statuss."' , category_id =  ".$category.$thumbnail."   WHERE id =".$id ;
// die ($query);


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


// CACH2


// require_once ('../../connection.php');

// 	$thumbnail= $_FILES["thumbnail"]["name"]; //để lưu tên của ảnh

// // type hide : post_edit
// $id = $_POST['id'] ;
// $title = $_POST['Title'] ;
// $description = $_POST['Description'] ;
// $content = $_POST['Contents'] ;
// $category = $_POST['cate_id'] ;
// // $status = $_POST['sttus'];





// $statuss= 0; //giá trị mặc định nếu ko check
// if(isset($_POST['sttus'])) $statuss = $_POST['sttus'];//láy giá trị mặc định của name : status


// // $Thumbnail = $_POST['thumbnail'];


// if($thumbnail!= null){
// 		$target_dir = "../../img/";  // thư mục chứa file upload; t.muc luu trữ ảnh
// 		$tmp_name = $_FILES["thumbnail"]["tmp_name"] ;


// 		$thumbnail= $_FILES["thumbnail"]["name"];
// 		$target_file = $target_dir . basename($thumbnail);
// 		move_uploaded_file($tmp_name , $target_file);
// 		$query = "UPDATE posts SET  thumbnail='".$thumbnail."' WHERE id =".$id ;
// 		$status = $connection->query($query); 
// 	}

// $query = "UPDATE posts SET title = '".$title."' , desciption = '".$description."' ,contents='".$content."'  ,

//   status = '".$statuss."' , category_id =  '".$category."' WHERE id =".$id ;

// die($query) ;

// //ko phai cau lenh lay du lieu nen ko can fetch-assoc:
// $status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
// // var_dump($status) ;


// if($status == true){
// 	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
// 	//dua toi dau
// 	header('Location: posts.php');

// } else {
// 	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
// 	//dua toi dau
// 	header('Location: post_edit.php?id='.$id);

// }


?>