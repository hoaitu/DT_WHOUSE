<?php
     session_start();
     ob_start();
?>
<html>
  <head>
         <title>Bài tập 6</title>
         <meta charset=”utf-8″ />
  </head>
  <body>




         <h1>Trang basket</h1>
         <table border=”1″>
             <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
             </tr>
             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
              </tr>
         </table>
         <a href=”muahoa.php”>Quay lại</a>

         <!--  -->

         <?php
if(!$_SESSION['arMuaHoa']){
header('location: muahoa.php');
}
// Nếu chưa có hoa nào thì chúng ta sẽ quay về trang muahoa.php
$tongTien = 0;
foreach($_SESSION[‘arMuaHoa’] as $hoa){
$thanhTien = $hoa[‘gia’] * $hoa[‘soluong’];
$tongTien += $thanhTien;
?>
<!-- //Vòng lặp mảng session arMuaHoa ra biến hoa -->
<tr>
<td><?php echo “<a href=”>$hoa[tenhoa]</a>”;?></td>
<td><?php echo $hoa['soluong'];?></td>
<td><?php echo number_format($hoa[‘gia’], 0, ",",".");?> VND</td>
<td><?php echo number_format($thanhTien, 0, ",",".");?> VND</td>
</tr>
<?php
}
?>
// Tính ra tổng tiền
<tr>
<td colspan=”4″ align=”right”>Tổng tiền: <?php echo number_format($tongTien, 0, “,”,”.”);?> VND</td>
</tr>
   </body>
</html>
<?php
     ob_end_flush();
?>