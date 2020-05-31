
<?php 
session_start();
  // session_start($_SESSION['cart']) ;
// session_destroy();




require_once('connection.php');

///////////////

//load category : load dmuc menu
$query_category = "SELECT * FROM  categoris ";
$result_category = $connection->query($query_category);

// $id_ctgry = $result_category->fetch_assoc() ;  //lay du lieu dau tien : ;ay muc menu dau tien la JS

$categories = array();
while ($row = $result_category -> fetch_assoc() ) {
 	# code...
 	$categories[] = $row ;
 } 

 // 






 // 
// End load category
// tăng lượt view khi bấm coi

// function capnhatsolanxemtin($id){

//cập nhật số lượt xem ; lượt xem nào nhiều nhất::
// $update_view_count = "UPDATE posts SET view_count= view_count+1 WHERE id =".$id ;
// die($update_view_count) ;
// mysql_query($update_view_count);
// }
// $status_update_view_count = $connection->query($update_view_count); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
// var_dump($status) ;


// if($status_update_view_count == true){
	// setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
	// header('Location: posts.php');

// } else {
	// setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	//dua toi dau
	// header('Location: post_edit.php?id='.$id);

// }


 // 

// 2 post lớn nằm đầu
 $query_2post =  'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.view_count DESC LIMIT 2' ; 
// die($query_2post);

$result_2post = $connection->query($query_2post); 
$two_post = array();
while ($row = $result_2post-> fetch_assoc()) {
	$two_post[] = $row ;
}




		//chọn những bài nào có trạng thái = 1;
$query_recent_posts = 'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.created_at DESC LIMIT 6' ; 
// die($query_recent_posts);

//LEFT JOIN : nối 2 bảng vs nhau::

// sort new time , limit 6 
$result_recent_posts = $connection-> query($query_recent_posts);
$recent_posts = array(); 
while ($row = $result_recent_posts-> fetch_assoc()) {
	$recent_posts[] = $row ;
}

		// SESSTION : 6 bài đầu :



/*load 6 posts next from post next index 6 =7, because no repeat posts*/

// $query_posts = 'SELECT * FROM `posts` ORDER BY created_at DESC LIMIT 7, 6' ;
$query_posts = 'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.created_at DESC LIMIT 7, 6' ; 
// sort new time , from sau vtri so 7 , limit 6( num 6 phia sau)
$result_posts = $connection-> query($query_posts);
$posts = array(); 
while ($row = $result_posts-> fetch_assoc()) {
	$posts[] = $row ;
}

/* 1 posts big */

$query_one_posts = 'SELECT p.* , c.id as "id_c" , c.title as "category" , c.id as "id_cate" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.created_at DESC LIMIT 6, 1' ;
// sort new time , from index 6 (bat dau tu vtri so 7( sau so 6) sort Desc) , limit 1
$result_one_posts = $connection-> query($query_one_posts);
$posts_one = array(); 
while ($row = $result_one_posts-> fetch_assoc()) {
	$posts_one[] = $row ;
}
					// LOAD 4 POSTS MOST READ :://

$query_4_most_read = 'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.created_at DESC LIMIT 4' ;  
// die ($query_4_most_read );
$result_4most_read = $connection->query($query_4_most_read); 
$most_read = array();
while ($row = $result_4most_read-> fetch_assoc()) {
	$most_read[] = $row ;
}

// những bài posts đk đọc nhiều nhất. 4 bai phia duoi:::

// 'SELECT * FROM posts ORDER BY view_count DESC LIMIT 4  '
$query_4most_read_under =  'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.view_count DESC LIMIT 4' ; 
// die($query_4most_read_under);

$result_4most_read_under = $connection->query($query_4most_read_under); 
$most_read_under = array();
while ($row = $result_4most_read_under-> fetch_assoc()) {
	$most_read_under[] = $row ;
}


// 3 bài giữa : đọc nhiều nhất của tác giả số 3

$read_authour3 = 'SELECT p.* , c.id as "id_c" , c.title as "category" , a.name as "name_authour" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id LEFT JOIN `authors` a ON p.author_id = a.id WHERE p.status = 1 AND p.author_id = 3 ORDER BY p.view_count DESC LIMIT 4'  ;
// die($read_authour3);

$result_authour3 = $connection-> query($read_authour3);
// $authour = $result_authour3->fetch_assoc() ;


$authour3 = array(); 

while ($row = $result_authour3-> fetch_assoc()) {
	$authour3[] = $row ;
}

 ?>

<!-- /// -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--  -->
<style>
         
        </style>

		<!--  -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
				<!-- <link type="text/css" rel="stylesheet" href="css/style_pagination.css"/> -->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
					<!-- MENNU -->
		
				<?php require_once('mainNav.php'); ?>

			<!-- /Nav -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">	
					<!-- post -->

						<?php foreach ($two_post as $post) {
							# code...
						 ?>
					<div class="col-md-6">
					
						<div class="post post-thumb">
							<a class="post-img" href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><img src="./img/<?php echo $post['thumbnail'] ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-<?=$color?>" href="category.php?id=<?=$post['id_c']?>&catery= <?php echo $post['category']; ?>"><?php echo $post['category']; ?></a>
									<span class="post-date"><?php echo $post['created_at'] ;?></span>
								</div>
								<h3 class="post-title"><a href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> ">
															<!--  -->

										<?php echo $post['title']; ?></a></h3>
							</div>
						</div>
					
					</div>
					<?php } ?>
					<!-- /post -->

					<!-- post -->
					<!-- <div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.html"><img src="./img/post-2.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div> -->
					<!-- /post -->
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							
							<h2>Recent Posts</h2>
						</div>

					<!-- Nếu thêm gio hàng thành công -->
							<?php if (isset($_SESSION['success'])){?>
							<p class="text-danger"> <?=$_SESSION['success'] ?></p>
							<?php } ;  unset($_SESSION['success']) ?>

								<!-- Recent Posts : giao dien ngoai -->

					</div>
										<!-- <LOAD 6 BAI ĐẦU> -->
									
							<?php 
							//i: change color for category
							$color = 1; 
								foreach ($recent_posts as $post ) {
							 ?>

					<div class="col-md-4">
						<div class="post">
							<!-- IMG DUA TOI TRANG BLOG-POST.PHP -->
							<a class="post-img" href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> ">
<!-- <img src="../../img/ -->
								<!-- thumbnail -->
								<img src="./img/<?php echo $post['thumbnail'] ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<!-- //category_id -->


									<!-- LINK DUA TOI CUNG CATEGORY -->

									<a class="post-category cat-<?=$color?>" href="category.php?id=<?=$post['id_c']?>&catery= <?php echo $post['category']; ?>"><?php echo $post['category']; ?></a>



									<!-- //Day and time March 27, 2018 -->
									<span class="post-date"><?php echo $post['created_at'] ;?></span>
								</div>
								<!-- //title -->
								<!-- /doc noi dung chi tiet bai doc blog post/ -->
								<h3 class="post-title">

										<!-- show ID POST ; ID CATEGORY id_category : DÙNG CHO BAI 3: SHOW MỤC ĐỌC CÓ THỂ LOẠI LIÊN QUAN  -->


										<!-- <a href="blog-post.php?id -->

											<!-- //chuyen trang : qua trang dem so luot coi ow bai post ==> den dem tong so luot coi cung loai ==> den trang noi dung blog-post.php -->

									<a href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> ">
															<!--  -->

										<?php echo $post['title']; ?></a>
								
								</h3>


								<div class="post-meta">
								<h4><span><em>Visitted:<?php echo $post['view_count']; ?> </em></span></h4>
									<!-- <a href="index.php?page=products&action=add&id=<?=$post['id']?>">Mua hang</a> -->
								<a href="cart_update.php?id=<?=$post['id']?>">Mua hang</a>
							</div>



								<div class="post-meta">
						<a class="post-category cat-1" style="float: right;" href="WishList.php?id=<?=$post['id'] ?>">WISH LIST</a>
					</div>

							</div>
						</div>
					</div>

					
				<?php 	
						$color++;
						if($color==5) $color = 1;

							} ?>

					<div class="clearfix visible-md visible-lg"></div>
				</div>
											<!-- <END  -->

				
				<div class="row">
					<div class="col-md-8">
						<div class="row">
						
											<!-- LOAD 7 BAI TIẾP TRONG INDEX.PHP (lesson2)  -->

								<!-- load 1 bài lớn -->
							<?php 
									foreach ($posts_one as $post ) {
										//tung 1 bai post
										// print_r($post);
									
						 		?>
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><img src="./img/<?php echo $post['thumbnail'] ?>" alt="" ></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-3" href="category.php?id=<?=$post['id_c']?>&catery=<?=$post['category']?>"><?php echo $post['category']; ?></a>
											<span class="post-date"><?php echo $post['created_at'] ;?></span>
										</div>
										<!-- title -->
										<!-- deteil -->
										<h3 class="post-title"><a href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><?php echo 			$post['title'] ; ?></a></h3>

									</div>
								</div>
							</div>
						<?php } ?>


																<!-- load 6 bài -->
								<?php 
										$color = 1;
										foreach ($posts as $post ) {
								?>
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><img src="./img/<?php echo $post['thumbnail'] ?>" alt="" width= "400" height= "250"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?=$color?>" href="category.php?id=<?=$post['id_c']?>&catery=<?=$post['category']?>"><?php echo $post['category']; ?></a>
											<span class="post-date"><?php echo $post['created_at'] ;?></span>
										</div>
										<h3 class="post-title"><a href="count_view.php?id=<?=$post['id']?> & id_category=<?=$post['id_c']?> "><?php  echo $post['title'] ; ?></a></h3>
									</div>
								</div>
							</div>
							
									<?php
										$color++;
										if ($color==5) $color =1;
											 } ?>

																	<!-- END  -->


						</div>
					</div>

					<div class="col-md-4">
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">

											<!-- <MOST READ IN INDEX.PHP: POSTS MOI NHAT>: 4 posts -->
								
								<h2>NEW POSTS</h2>
							</div>

								<?php foreach ($most_read as $most_4read ){
								 ?>
								
								

							<div class="post post-widget">
								<a class="post-img" href="count_view.php?id=<?=$most_4read['id']?> & id_category=<?=$most_4read['id_c']?> "><img src="./img/<?=$most_4read['thumbnail']?>" alt=""></a>
								<div class="post-body">
									<h3 class="post-title">	<a href="count_view.php?id=<?=$most_4read['id']?> & id_category=<?=$most_4read['id_c']?> ">	<?php  echo $most_4read['title'] ; ?></a></h3>
								</div>
							</div>
								<?php } ?>


						</div>
						<!-- /post widget -->

									<!-- <FEATURED READ> 2 bai ben phai -->
						<!-- post widget -->
						
						<!-- /post widget -->
									<!-- <END> -->
						
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
		
		<!-- section -->
		<div class="section section-grey">
			<!-- container -->
			<div class="container">
				<!-- row -->
										<!-- <FEATURED POST IN CENTER> -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							
							<h2>Reviewer by: <em>Thu Minh </em>  </h2>
						
						</div>
					</div>

					<!-- post -->
					<?php foreach ($authour3 as $most_3read ){
								 ?>

					<div class="col-md-4">
								
								
						<div class="post">
							<a class="post-img" href="count_view.php?id=<?=$most_3read['id']?> & id_category=<?=$most_3read['id_c']?> "><img src="./img/<?=$most_3read['thumbnail']?>" alt=""></a>

							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.php?id=<?=$most_3read['id_c']?>&catery=<?=$most_3read['category']?>"><?php echo $most_3read['category']; ?></a>
									<span class="post-date"><?php echo $most_3read['created_at'] ;?></span>
								</div>
								<h3 class="post-title">	<a href="count_view.php?id=<?=$most_3read['id']?> & id_category=<?=$most_3read['id_c']?> ">	<?php  echo $most_3read['title'] ; ?></a></h3>
							</div>
						</div>
				
					</div>
						<?php } ?>
					<!-- /post -->

					<!-- post -->
					<!-- <div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="./img/3.png" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div> -->
					<!-- /post -->

					<!-- post -->
					<!-- <div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="./img/4.png" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html">Web Design</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>
					</div> -->
					<!-- /post -->
				</div>
												<!-- <END> -->
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">

							<!--  -->

							<div class="col-md-12">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
							<!-- post -->
							<!--  -->

							

								<?php foreach ($most_read_under as $most_read) { ?>
								
								

								 

							<!--  -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="count_view.php?id=<?=$most_read['id']?> & id_category=<?=$most_read['id_c']?> "><img src="./img/<?=$most_read['thumbnail']?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.php?id=<?=$most_read['id_c']?>&catery=<?=$most_read['category']?>"><?=$most_read['category']?></a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="count_view.php?id=<?=$most_read['id']?> & id_category=<?=$most_read['id_c']?> "><?=$most_read['title']?></a></h3>
										<p><?=$most_read['desciption']?></p>
									</div>
								</div>
							</div>

									<?php } ?>
									
							<!-- /post -->

							<!-- post -->
							<!-- <div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./img/post-6.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div> -->
							<!-- /post -->

							<!-- post -->
							<!-- <div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-4" href="category.html">Css</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">CSS Float: A Tutorial</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div> -->
							<!-- /post -->
							
							<!-- post -->
							<!-- <div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./img/post-2.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-3" href="category.html">Jquery</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div> -->
							<!-- /post -->
							
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
						
						<!-- catagories -->
									<?php require_once('categories_right.php') ?>
						<!-- /catagories -->
						
						<!-- tags -->
						
						
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<?php require_once('footer.php') ?>
			<!-- container -->

			
			<!-- SLIDE SHOW -->


			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<!--  -->
		<!-- <script src="js/slideshow.js"> </script> -->
      
   

		<!--  -->
</body>

		
	

 
    

</html>