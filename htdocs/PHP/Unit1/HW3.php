<?php 
//in bảng cửu chương 1-> 9
$max = 10 ;
$nine = 9 ;
$result=1;

echo "BẢNG CỬU CHƯƠNG <hr/>";

for ($i=2; $i <= $nine ; $i++) { 
	echo "Bảng nhân $i " ;
	# code...
for ($j=1; $j <= $max ; $j++) {

		$result = $i*$j ;
		echo "<br/>" .$i." x ".$j." = ". $result;
}
echo "<hr/>";

}
 
 ?>