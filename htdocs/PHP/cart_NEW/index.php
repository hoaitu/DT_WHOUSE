
<?php 

require_once('connection.php');
session_start();



// \
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
 ?>
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
			

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
					<!-- MENNU -->
		<!-- GIO HANG -->
				<a href="list_cart.php">GIO HANG</a>
				

			<!-- /Nav -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				
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
								<a href="add.php?id=<?=$post['id']?>">Mua hang</a>
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

				
				
							

							
								
								

								 

							<!--  -->
						
									
							
						</div>
					</div>

					
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->


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