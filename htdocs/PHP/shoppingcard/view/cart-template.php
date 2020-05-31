<table border='1'>
	<tr>
		<td>TÊN SP</td>
		<td>GIÁ</td>
		<td>MUA SP</td>
	</tr>
	<?php
	$cart_sp=new cart();
	$manglist_sp=$cart_sp->viewAllsanpham();
	foreach ($manglist_sp as $value) {
	?>
		<tr>
		<td><?php echo $value->ten_mt;?></td>
		<td><?php echo $value->gia;?></td>
		<td>
		<?php echo "<p><input type='submit' value='Mua' onclick=\"window.location='".$_SERVER['PHP_SELF']."?addcart=$value->idmt'\"></input>";?>
		</td>
			
		</tr>

		
	<?php }?>
</table>