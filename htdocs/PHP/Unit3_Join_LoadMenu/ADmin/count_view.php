<?php 


require_once ('connection.php');
$id = $_GET['id'] ;
$id_cte = $_GET['catery'];


 $update_view_count = "UPDATE posts SET view_count= view_count+1 WHERE id =".$id ;
 die( $update_view_count);

$status = $connection->query($update_view_count); //true : neu nhan dk 


// \\\

//chọn những bài nào có trạng thái = 1;
// $query_recent_posts = 'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.created_at DESC LIMIT 6' ; 
// die($query_recent_posts);

//LEFT JOIN : nối 2 bảng vs nhau::

// sort new time , limit 6 
// $result_recent_posts = $connection-> query($query_recent_posts);
// $recent_posts = array(); 
// while ($row = $result_recent_posts-> fetch_assoc()) {
// 	$recent_posts[] = $row ;
// }


if($status == true){
	// setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
// 	header('Location: blog-post.php?id='.$id.'&'.id_category='.$id_cte');
// 	die($header('Location: blog-post.php?id='.$id.'&'.id_category='.$id_cte'););

// } else {
// 	// setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
// 	//dua toi dau
// 	header('Location: index.php?id='.$id);

	header('Location: index.php');
}

 ?>