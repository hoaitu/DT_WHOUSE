

<?php 
	session_start();
	// session_destroy();
	if (!empty($_SESSION['cart'])) {
		$soluonggiohang = 0 ;
		foreach ($_SESSION['cart'] as  $value) {
			$soluonggiohang = $soluonggiohang+$value['soluong'];

// $soluonggiohang = $soluonggiohang+1; : chỉ tăng khi khác id
	}

}else {
	$soluonggiohang = 0 ;
}

 ?>

<!--  -->
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	
<table class="table table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Ten</th>
			<th>Tac gia</th>
			<th>Gia</th>
			<th></th>
		</tr>
	</thead>
	
			

	<!--  -->
<?php 

require('db.php') ;
	$query_list = mysqli_query ($con , "SELECT * FROM book" ) ;
	// 
	while ($row_list = mysqli_fetch_array($query_list)) {
 ?>
 <tbody>
		<tr>

			<td><?=$row_list['id']?></td>
			<td><?=$row_list['title']?></td>
			<td><?=$row_list['authour']?></td>
			<td><?=$row_list['price']?></td>
			<td><a href="addcart.php?id=<?=$row_list['id']?>">Add cart</a></td>
				</tr>
	</tbody>
<?php } ?>

</table>

<a href="delcart.php">Xoa gio hang</a> <br/>
<a href="listcart.php">Xem <?=$soluonggiohang ;?> san pham trong gio hang</a>

	<br/>
</body>
</html>