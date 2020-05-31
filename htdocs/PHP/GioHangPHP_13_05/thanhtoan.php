<?php 
	session_start() ;
	require ("db.php");
	$thanhtoan = mysqli_query($con , "INSERT INTO cart values (NULL , 'Tu' , NULL)");
	// header('Location: index.php');
	// 
	if ($thanhtoan){

		$max =  mysqli_query($con , "SELECT max(id) FROM cart");
		$row_max =  mysqli_fetch_array($max) ;
		$cart_id = $row_max[0] ;
	
		foreach ($_SESSION['cart'] as $value) {
		
		$product_id = $value['id'];

		$quantity =  $value['soluong'];

		$price =  $value['gia'];
		
		 mysqli_query($con , "INSERT INTO cart_detail VALUES (NULL , '$cart_id' , '$product_id' , '$quantity', '$price')");
		 // 
		 unset ($_SESSION['cart']) ;
		 header('Location: index.php');
	
		}
	}

 ?>