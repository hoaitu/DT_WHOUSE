
<?php 
// Trang chu ko dang nhap ko dk vaof
    session_start();
// Neu chua ton tai hoac sai thi ko vao ddk 
    if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: ../login.php');
        // 
}
// require_once ('../../connection.php');
 $conn = mysqli_connect('localhost', 'root', '', 'blogphp');

///////////////s

//load posts : load dmuc post
// $query_posts = 'SELECT * FROM posts';
// die($query_posts);
// $result_posts = $connection->query($query_posts);
// $posts = array();
// while ($row = $result_posts-> fetch_assoc() ) {
//   $posts[] = $row ;
//  } 
 // ----------------
 //phan trang trogn php
  // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from posts'); //dem trong bang co bao nhiu id ( phan tu)::
        $row = mysqli_fetch_assoc($result); //lay ra gia tri cua tung record
        $total_records = $row['total']; //totall tren result
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit); //ceil : tinh lam tron len vd 3.2 = 4 ( so trang)
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $sql = 'SELECT p.*,c.title as  "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id LIMIT '.$start.', '.$limit ;
        // die ($sql) ;
        $result = mysqli_query($conn, $sql);

        $posts = array();
         while ($row = mysqli_fetch_assoc($result)){
              $posts[]= $row;

                }

 ?>
    <!-- <END> -->

<!--  -->
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../../css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../../css/style.css"/>
    <!--  -->


    </head>
<body>

	<h1>ZENT-EDUCATION TECHNOLOGY GROUP CATEGORY LIST</h1>
	<!-- /BUTTON THEM MOI/ -->
	<div class="container-fluid">
		<div class="row">
			<a href="posts_add.php" 
		 type="button" class="btn btn-primary"> Them moi </a>
		</div>
 

<!--  -->

		<table class="table">
    <thead>
      <tr>
        <th >ID</th>
        <th >Title</th>
        <th >Description</th>
        <th >Category</th>

        <th >Contents</th>

        <th >thumbnail</th>
        <th >#</th>
      </tr>
     
    </thead>
    <tbody>
     <?php 
    

// PHẦN HIỂN THỊ TIN TỨC
            // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC

                $i = 1 ;
     foreach ($posts as $post){    ?>
       


      <tr>
        <td ><?=$i?></td>
        <td ><?=$post['title']?></td>
        <td ><?=$post['desciption']?></td>
        <td ><?=$post['category']?></td>

        <!-- ko hien thi noi dung -->
       
            
                <td><?=$post['contents']?></td>
              
           
                
            

            

<!-- //img -->
        <!-- <td><img src="<?=$post['thumbnail']?>" width=200></td> -->

     <!-- link img in computer -->
     <td><img src="../../img/<?=$post['thumbnail']?>" width=200></td>
        <!-- <td> -->
         
          <td>
          <a href="post_detail.php?id=<?=$post['id']?>">  <button type="button" class="btn btn-primary">Xem</button></a>
          
        	<a href="post_edit.php?id=<?=$post['id']?>">
          <button type="button" class="btn btn-success">Sửa</button></a>

        <a href="post_delete.php?id=<?=$post['id']?>">	<button type="button" class="btn btn-warning">Xóa</button></a>
        </td>

      </tr>
          <?php $i++ ;
                         }  ?>
    </tbody>
  </table>
<!-- PHANTRANG -->
<div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="posts.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="posts.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="posts.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>


	</div>


</body>
</html>


