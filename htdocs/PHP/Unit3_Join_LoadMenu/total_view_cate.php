<?php 

require_once ('connection.php');
$id = $_GET['id'] ; //id post 

$id_cte = $_GET['id_category']; //id cate
 ///Hien tong so luot xem cho 1 loai category
 $total_view_same_cate = "UPDATE categoris SET totalview = (SELECT SUM(view_count)
FROM posts
WHERE category_id =".$id_cte.") WHERE id =".$id_cte ;

// die($total_view_same_cate);

$status = $connection->query($total_view_same_cate); //true : neu nhan dk 

header('Location: blog-post.php?id='.$id.'&id_category='.$id_cte);


// \\\
 ?>