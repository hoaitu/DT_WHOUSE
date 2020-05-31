
	
<?php 
session_start();
session_destroy();
if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true ){
       
  $id = isset($_GET ['id']) ? $_GET['id'] : '' ;



require_once('connection.php');
//chọn những bài nào có trạng thái = 1;
$query_3gach = 'SELECT p.* , c.id as "id_c" , c.title as "category" FROM posts p LEFT JOIN categoris c ON p.category_id = c.id WHERE p.status = 1 ORDER BY p.created_at DESC LIMIT 3' ; 
// die($query_recent_posts);

//LEFT JOIN : nối 2 bảng vs nhau::

// sort new time , limit 6 
$result_3gach = $connection-> query($query_3gach);
$recent_3gach = array(); 
while ($row = $result_3gach-> fetch_assoc()) {
	$recent_3gach[] = $row ;
}
}
 ?>

	<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="index.php" class="logo"><img src="./img/logo.png" alt=""></a>

						</div>
						<!-- /logo -->

						<!-- nav -->

						<ul class="nav-menu nav navbar-nav">

										<!-- MENU -->

										<!-- SHOW N.D KHI CHỌN MENU -->

							<?php
							//5 màu cat-5 max; IF = 5 thì quay lại từ đầu ::
								$i = 1; 
							 foreach ($categories as $cate ) {
							 
							  ?>
								
							<li class="cat-<?=$i?>" >

								<!-- //thanh URL : hien thi : id va catery -->
								<a 
								href="category.php?id=<?php echo $cate['id'];?>&catery=<?=$cate['title']?>"><?php echo  $cate['title'];?> </a></li>
						<?php  
							$i++;
							if($i==5) $i = 1;
							}

						?>
												<!-- <END> -->

						</ul>
						<!-- /nav -->

						<!-- search & aside toggle -->
						<div class="nav-btns">
							<button class="aside-btn"><i class="fa fa-bars"></i></button>


							<a href=<?=(isset($_SESSION['isLogin'] )==1 ) ? "./ADmin./logOut.php" : "register.php"  ?>><button class="aside-btn" type="submit" class="btn btn-primary btn-block"> <?=(isset($_SESSION['isLogin'] )==1 ) ? 'Logout' :  'Register' ?>  </button></a>


							<span> <h5> <?=(isset($_SESSION['isLogin'] )==1 ) ? $_SESSION['authour']['name'] : ''?> </h5></span>
							<a href="list_cart.php">GIO HANG</a><h6>
							
<!--  --> 
 	<?php if (isset($_SESSION['cart'])) {
 		   $total = 0;
 		   foreach ($_SESSION['cart'] as $key => $value ) { 		  
 		   	 			$total = $total+$value['qty'] ;
 		   	 			
			 		
                            // <!-- // $total = $total +  $value['qty'] ;      -->
			 	
			 	}
			 	 echo "$total";
                 }?>        
						

						 	

						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">


					<?php
							//5 màu cat-5 max; IF = 5 thì quay lại từ đầu ::
								$i = 1; 
							 foreach ($categories as $cate ) {
							 
							  ?>
								
							<li class="cat-<?=$i?>" >

								<!-- //thanh URL : hien thi : id va catery -->
								<a 
								href="category.php?id=<?php echo $cate['id'];?>&catery=<?=$cate['title']?>"><?php echo  $cate['title'];?> </a></li>
						<?php  
							$i++;
							if($i==5) $i = 1;
							}

						?>


					</div>
					<!-- /nav -->

					<!-- widget posts -->
					<div class="section-row">
						<h3>Recent Posts</h3>

		
							<?php 
							//i: change color for category
							
								foreach ($recent_3gach as $post3 ) {
							 ?>

						<!-- // Dau 3 gach //-->
						

						<div class="post post-widget">
							<a class="post-img" href="count_view.php?id=<?=$post3['id']?> & id_category=<?=$post3['id_c']?> ">
<!-- <img src="../../img/ -->
								<!-- thumbnail -->
								<img src="./img/<?php echo $post3['thumbnail'] ?>" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="count_view.php?id=<?=$post3['id']?> & id_category=<?=$post3['id_c']?> ">
									<?=$_SESSION['authour']['name']?>
									
															<!--  -->

										<?php echo $post3['title']; ?></a></h3>
							</div>
						</div>

						<?php } ?>
					</div>
					<!-- /widget posts -->

					<!-- social links -->
					
					<!-- /social links -->

					<!-- aside nav close -->
				
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					 <a href= <?=(isset($_SESSION['isLogin'] )==1 ) ? "./ADmin./logOut.php" :     "./ADmin./login.php"?>><button type="submit" class="btn btn-primary btn-block"> <?=(isset($_SESSION['isLogin'] )==1 ) ? 'Logout' :  'Login' ?>  </button></a> 






					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>

 