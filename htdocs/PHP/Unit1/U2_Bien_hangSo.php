<?php
//cách khai báo biến , hằng trong PHP dùng $Tên biến ;
$number = 19 ;
$point = 9.5; 
$name = "Hoài Tú" ;
echo "Xin chào".$name. "<br/>";
$class = 'Zent';
echo "Bạn đang hoc lơp ".$class."<br>"; //=== echo "Bạn đang hoc lơp .$class";
//nếu dùn dấu  ' ' //sẽ show: Bạn đang hoc lơp .$class // là 1 string
//Khai bao hang so
 define('Pi', 3.14);
 echo "<br/> Pi = ".Pi;
echo "<br>";
//\\\\\\\\\\\\\\
//Cấu trúc điều khiển :
//đk rẽ nhánh : if else
if ($number %2 == 0){
	 echo "đay là số chẵn";
}
else {
	 echo "Đay là số lẽ";
}
//Dùng switch case::
$day = 7;
switch ($day) {
	case 2:
	echo "Hom nay thu 2";
		break;
		case 3:
	echo "<br> Hom nay thu 3";
		break;
		case 4:
	echo "Hom nay thu 4";
		break;
	
	default:
	echo "Nghĩ";
		break;
}
//Điều kiện lặp
for ($i=0; $i <= 10 ; $i++) { 
	echo "<br>".$i."<hr/>";
}
//While 
$j = 0; 
while ($j  <= 10) {
		echo "<br>".$j;
	$j++;
}
echo "<hr/>";
echo "Do while ";
//do while
$k = 0;
do {
	echo "<br> $k" ;
	$k++ ;
} while ($k <= 10);

?>

<!-- ////// Chu y : bien phai co $ ; hang so khai bao mac dinh tu dau ' '-->