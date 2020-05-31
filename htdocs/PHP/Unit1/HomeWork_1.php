<?php 
echo "Giải phương trình bậc 2::";
$a = 2;
$b= 4;
$c=-4;
// Tinh Denta
$Delta = $b*$b-4*$a*$c ;
$CanDelta = sqrt($Delta);
$nghiemKep = -$b/(2*$a) ;
$nghiem_Add = (-$b + $CanDelta ) / (2*$a);
$nghiem_Sub = (-$b - $CanDelta ) / (2*$a);

echo "<hr>";
echo "ket qua Delta ".$Delta."<br/>";
echo "ket qua căn Delta ".$CanDelta ."<br/";
if ($Delta < 0 ) {
	echo "PT vô nghiệm"."<br/>";
}
else if($Delta == 0) {
echo "PT nghiệm kép"."<br/>";
echo $nghiemKep;
}
 if($Delta >  0) {
echo "PT có 2 nghiệm"."<br/>";
echo $nghiem_Add."<br/>";

echo $nghiem_Sub;
}
 ?>
<!--  https://github.com/hoaitu/PHP_MySqlZent/commit/c803961de590da8929c7e14b99cd49cb1966011b -->
