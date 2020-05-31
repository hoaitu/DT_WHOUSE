
<?php 

require_once('connection.php');

// lay du lieu chi tiet bai viet 
 $id = $_GET['id']; // id blog
 






//cate
//gọi phần này để biet ManiNav : menu dk goi ra ngoai
$query_category = "SELECT * FROM  categoris ";
$result_category = $connection->query($query_category);
$categories = array();
while ($row = $result_category -> fetch_assoc() ) {
 	$categories[] = $row ;
 } 


 

 
 
 //dau cham de noi chuoi:::
  
  $query_post = "SELECT
	p.*,
	c.title AS 'category',
	a.name as 'auth_name'
FROM
	posts p
	LEFT JOIN categoris c ON p.category_id = c.id
	LEFT JOIN `authors` a ON p.author_id = a.id 
WHERE
	p.id =".$id ;
	// die($query_post);

 $result_posts =  $connection->query($query_post);

 // chi 1 bản ghi nên ko cần hàm while 
 $post = $result_posts->fetch_assoc(); // lay ban ghi dau tien::



 



						 //** LOAD  cùng danh mục (category) : 5 BÀI CÙNG LOẠI MỚI NHẤT:  ***


$id_cate= $_GET ['id_category']; // lay id category (bên index.php)

$query_mostRead  = "SELECT p.*, c.id as 'id_cate' , c.title as 'category'	FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.category_id=	".$id_cate." AND  p.status = 1  ORDER BY P.created_at DESC LIMIT 5";
// die($query_mostRead);
	
	$result_mostRead = $connection->query($query_mostRead);
	var_dump($result_mostRead);
	$mostRead = array(); 
	while ($row = $result_mostRead-> fetch_assoc()) {
	$mostRead[] = $row ;
}
// FEATURED POTS 
$query_featured  = "SELECT p.*, c.id as 'id_cate' , c.title as 'category'	FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.category_id=	".$id_cate." AND  p.status = 1  ORDER BY P.created_at DESC LIMIT 3";
// die($query_mostRead);
	
	$result_query_featured = $connection->query($query_featured);
	$result_featured = array(); 
	while ($row = $result_query_featured-> fetch_assoc()) {
	$result_featured[] = $row ;
}


  ?>

<!-- ///CHI TIẾT BÀI VIẾT -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
	<body>
		
		<!-- Header -->
		<header id="header">
							<!-- //SHOW MENU <--></-->
			<!-- Nav -->
					<?php require_once('mainNav.php'); ?>
			<!-- /Nav -->

										<!-- **** -->




			<!-- Page Header -->
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('./img/<?=$post['thumbnail']?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">

												<!-- LOAD N.DUNG BAI VIET-->

								<a class="post-category cat-2" href="category.html"> <?=$post['category']?></a>
								<span class="post-date"> <?=$post['created_at']?> </span>
							</div>
							<h1> <?=$post['title']?> </h1>
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
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">

								<h3> <?=$post['title']?> </h3>
								<p><b><em> <?=$post['desciption']?> </b></em></em> </p> <!-- //mo ta -->
								<p> <?=$post['contents']?> </p><!-- noi dung -->
								<p><b><em> Reviewer: <?=$post['auth_name']?>  </em></b></p> <!-- nguoi dang -->

													<!-- <END> -->

							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/author.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3>John Doe</h3>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>3 Comments</h2>
							</div>

							<div class="post-comments">
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

										<!-- comment -->
										<div class="media">
											<div class="media-left">
												<img class="media-object" src="./img/avatar.png" alt="">
											</div>
											<div class="media-body">
												<div class="media-heading">
													<h4>John Doe</h4>
													<span class="time">March 27, 2018 at 8:00 am</span>
													<a href="#" class="reply">Reply</a>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div>
										</div>
										<!-- /comment -->
									</div>
								</div>
								<!-- /comment -->

								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
								<!-- /comment -->
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>
							<form class="post-reply">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="name">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" type="email" name="email">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Website</span>
											<input class="input" type="text" name="website">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
										</div>
										<button class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
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

										<!-- <LOAD MUC CUNG LOAI MOI NHAT> -->
							</div>

						
							<?php foreach ($mostRead as $read_same_cate) {
								
							?>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?=$read_same_cate['id']?>&id_category=<?=$read_same_cate['id_cate']?>"><img src="img/<?php echo $read_same_cate['thumbnail'] ?>" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?=$read_same_cate['id']?>&id_category=<?=$read_same_cate['id_cate']?>"><?=$read_same_cate['title']?></a></h3>
								</div>
							</div>
						<?php } ?>


													<!-- <END> -->

						</div>
						<!-- /post widget -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>

							<?php foreach ($result_featured as $read_same_cate) {
								
							?>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.php?id=<?=$read_same_cate['id']?>&id_category=<?=$read_same_cate['id_cate']?>"><img src="img/<?php echo $read_same_cate['thumbnail'] ?>" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="#"><?=$read_same_cate['category']?></a>
										<span class="post-date"><?=$read_same_cate['created_at']?></span>
									</div>
									<h3 class="post-title"><a href="blog-post.php"> <?=$read_same_cate['title']?> </a></h3>
								</div>
							</div>

							<!-- <div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="#">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div> -->
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
					<!-- /aside -->
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

	</body>
</html>
