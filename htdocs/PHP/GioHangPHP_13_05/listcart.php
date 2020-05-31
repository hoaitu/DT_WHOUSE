<?php 
	session_start();
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
			<th>Ten</th>
			<th>So luong</th>
			<th>Gia</th>
			<th>Remove</th>
			<th>Thanh Tien</th>
		</tr>
	</thead>
	
			

	<!--  -->
<?php 
$tongtien = 0;
foreach ($_SESSION['cart'] as $value) {


 ?>
 <tbody>
		<tr>
			<td><?=$value['ten']?></td>
			<td><?=$value['soluong']?></td>
			<td><?=$value['gia']?></td>
			<td><a href="removecart.php?id=<?=$value['id']?>">remove cart</a></td>
			<td>Thanh tien: <?=$thanhtien = $value['soluong']*$value['gia']?></td>
			</tr>
	</tbody>
<?php
$tongtien = $tongtien+$thanhtien ;
 } ?>
</table>

<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>Tong tien = <?=$tongtien?></td>

	<br/>
	<a href="updatecart.php">Cap nhat gio hang</a>
	<a href="thanhtoan.php">Thanh toan gio hang</a>
</body>
</html>