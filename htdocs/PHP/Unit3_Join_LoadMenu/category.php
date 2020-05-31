

<!-- LOAD theo danh mục -->
<?php 

require_once('connection.php');
///////////////

//load category : load dmuc menu
$query_category = "SELECT * FROM  categoris ";
$result_category = $connection->query($query_category);
$categories = array();
while ($row = $result_category -> fetch_assoc() ) {
 	# code...
 	$categories[] = $row ;
 } 
///end load cate

 //\\ láy id của danh mục đang đk chọn: from mainNav:
 $id = $_GET['id'];
 

//lay id cua category: from index.html:
// $id_category = $_GET['id_category'];

 // lay ra 3 bai viet ::
 //cau lenh truy van // nối chuỗi chỗ só 1= $id nối DẤU '.''

 $query_posts = "SELECT p.* , c.title as 'cate' ,  c.id as 'id_c'  FROM posts p LEFT JOIN categoris c ON  p.category_id = c.id WHERE p.status =1 AND  p.category_id =".$id."   ORDER BY p.created_at DESC LIMIT 3";

 	// die($query_posts);

 //thuc thi cau lenh
 $result_posts = $connection-> query($query_posts);
 $post_in_3posts = $result_posts->fetch_assoc() ;
$posts = array(); 
while ($row = $result_posts-> fetch_assoc()) {
	$posts[] = $row ;
}

//lay 5 bai ::: 5 bài nên bỏ câu post_in_3posts ở trên đi
 $query_5posts = "SELECT p.* , c.title as 'cate'  ,  c.id as 'id_c'  FROM posts p LEFT JOIN categoris c ON  p.category_id = c.id WHERE p.`status`=1 AND p.category_id =".$id."  ORDER BY p.created_at DESC LIMIT 3, 5";
 // die($query_5posts);

 $result_5posts = $connection-> query($query_5posts);

 //tao mang dlieu
$posts5 = array(); 
while ($row = $result_5posts-> fetch_assoc()) {
	$posts5[] = $row ;
}

 $cate_name = $_GET['catery'];
 // --------------------------
 // những bài posts đk đọc nhiều nhất. 4 bai phia duoi:::

// 'SELECT * FROM posts ORDER BY view_count DESC LIMIT 4  '
$query_4most_read_under =  'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.view_count DESC LIMIT 4' ; 
// die($query_4most_read_under);

$result_4most_read_under = $connection->query($query_4most_read_under); 
$most_read_under = array();
while ($row = $result_4most_read_under-> fetch_assoc()) {
	$most_read_under[] = $row ;
}

// most read : đọc nhiều nhất ko cùng thể loại 
$query_4post =  'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.view_count DESC LIMIT 4' ; 
// die($query_2post);

$result_4post = $connection->query($query_4post); 
$two_post = array();
while ($row = $result_4post-> fetch_assoc()) {
	$four_post[] = $row ;
}

 
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		 <style type="text/css">
        .page-header{
            background-image: url(img/bgr.png);
        }
    </style>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<!--  -->
			<!-- <link type="text/css" rel="stylesheet" href="css/style_pagination.css"/> -->

		
    </head>
	<body>
		
		<!-- Header -->
		<header id="header">
			<!-- Nav -->
					
					<!-- //CHEN MENU -->
					<?php require_once('mainNav.php'); ?>

			<!-- /Nav -->
			
			<!-- Page Header -->
			<div class="page-header">

					


				<div class="container">
					





					<div class="row">
						<div class="background">
  
								<!-- <a class="post-img"  href="">
									<img src="img/BACKGROUND.png">
								</a>
 -->
							<ul class="page-header-breadcrumb">
								<li><a href="index.php">Home</a></li>

										<!-- DƯỜNG DẪN HOME./... -->
								
								<li><?php echo $cate_name ; ?></li>
							</ul>
							<h1><?=$cate_name?></h1>


						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
		</header>
		<!-- /Header -->
		
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->

							<div class="col-md-12">
								<div class="post post-thumb">

													<!-- ĐIỀN N.DUNG POST LỚN-->

									<a class="post-img" href="count_view.php?id=<?=$post_in_3posts['id']?> & id_category=<?=$post_in_3posts['id_c']?>"><img src="img/<?=$post_in_3posts['thumbnail'];?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<!-- //cate : tieuu đề -->
											<a class="post-category cat-2" href="#"><?=$post_in_3posts['cate']; ?></a>
											<!--created_at: ngày giờ  -->
											<span class="post-date"><?=$post_in_3posts['created_at']; ?></span>
										</div>
										<!-- Nọi dung trong posts -->
										<h3 class="post-title"><a href="count_view.php?id=<?=$post_in_3posts['id']?> & id_category=<?=$post_in_3posts['id_c']?> "><?=$post_in_3posts['title'];?></a></h3>
									</div>

								</div>
							</div>
													<!-- <END BIG POST> -->
						
							<!-- /post -->
										
							<!-- post -->

										<!-- 2 POST TIẾP -->
							<?php foreach ($posts as $post) {
								# code...
							?>

							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?>"><img src="img/<?=$post['thumbnail'];?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#"><?=$post['cate'];?></a>
											<span class="post-date"><?=$post['created_at'];?></span>
										</div>
										<h3 class="post-title"><a href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?>"><?=$post['title'];?></a></h3>
									</div>
								</div>
							</div>
						<?php } ?>
														<!-- <END 2 POST> -->
							
							<div class="clearfix visible-md visible-lg"></div>
							
							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
							
							<!-- post -->

											<!-- 5 POST DƯỚI TIẾP -->
								<?php foreach ($posts5 as $post) {
								
							?>

							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><img src="img/<?=$post['thumbnail'];?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#"><?=$post['cate'];?></a>
											<span class="post-date"><?=$post['created_at'];?></span>
										</div>
										<h3 class="post-title"><a href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><?=$post['title'];?></a></h3>
										<p><?=$post['desciption'];?></p>
									</div>
								</div>
							</div>
						<?php } ?>
													<!-- <END 5 POSTS> -->
							
							<!-- <div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div> -->
						</div>
					</div>
					
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
						





						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
							<?php foreach ($four_post as $post) {
								# code...
							?>

							<div class="post post-widget">
								<a class="post-img" href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><img src="img/<?=$post['thumbnail'];?>" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><?=$post['title'];?></a></h3>
								</div>
							</div>
						<?php } ?>

							
						</div>







						<!-- /post widget -->
						
						<!-- catagories -->
						<?php require_once('categories_right.php') ?>
						<!-- /catagories -->
						
						<!-- tags -->
						
						<!-- /tags -->
						
						<!-- archive -->
					
						<!-- /archive -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
	
					<?php require_once('footer.php'); ?>
					

		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/slideshow.js"> </script>

	</body>
</html>

