<?php 
	session_start();
	if (isset($_POST['capnhat']))
	{
		unset($_POST['capnhat']);
		foreach ($_POST  as $k => $v) {

			$_SESSION['cart'][$k]['soluong']= $v ;
		
		}
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
			<th>Ten</th>
			<th>So luong</th>
			<th>Gia</th>
			<th>Remove</th>
			<th>Thanh Tien</th>
		</tr>
	</thead>
	
			<form method="post" action="updatecart.php">

	<!--  -->
<?php 
$tongtien = 0;
foreach ($_SESSION['cart'] as $value) {


 ?>
 <tbody>
		<tr>
			<td><?=$value['ten']?></td>
			<td><input type="text" name="<?=$value['id']?>" value = "<?=$value['soluong']?>"/></td>
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
	 <input type="submit" name="capnhat" value="capnhat"> 
 </form>
</body>
</html>