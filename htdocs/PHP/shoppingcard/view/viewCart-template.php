<center>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <table cellspacing='0' border="1" style="text-align: center">
    <tr>
        <th>Tên sp</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng giá</th>
        <th>Xóa</th>
    </tr>
    <?php
    $total = 0;
 if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $value) {
        ?>

        <tr>
       <td><?php echo $value->ten_mt;?></td>      
       <td><?php echo $value->gia;?>đ</td>
       <td><input type='text' name='soluong[<?php echo $value->idmt;?>]' id='soluong' value='<?php echo $value->soluong;?>' /></td>
       <td><?php echo number_format($value->gia*$value->soluong,3);?>000 đ</td>
       <td><a href='<?php echo $_SERVER['PHP_SELF']."?xoa=".$value->idmt;?>'>Xóa</a></td>
       </tr>

       <?php 
        $tong = number_format($value->soluong*$value->gia,3);
        $total += $tong;
    }//dong foreach
}
?>
    <tr>
    <td colspan="4"><strong>Tổng tiền: <?php echo number_format($total,3);?>.000 đ</strong></td>
    <td><a href='<?php echo $_SERVER['PHP_SELF']."?xoahet";?>'>Xóa hết</a></td>
    </tr>
     
    
</table>
    <?php
    echo "<a href='".$_SERVER['PHP_SELF']."'>Quay lại mua hàng</a>";
    echo "<input type='submit' name='update' value='Cập Nhật Giỏ Hàng' />";
    ?>
    </form>
</center>