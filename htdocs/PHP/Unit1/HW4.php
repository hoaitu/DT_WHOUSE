<?php 
$arr =  array(1,4,2,6,9,100,45,8,20 );
//tìm phần tử lớn nhất trong mảng
$max = null ;//
$position = null;//vị trí
// đếm tổng số phần tử thì ta dùng hàm count.
for ($i=0; $i < count($arr); $i++) { 
	
	//
	if($max==null){
		$max = $arr[$i];
		// $position =  $i;
	}else {
		if ($arr[$i] > $max){
			$max = $arr[$i] ;
			// $position = $i ;
		}
	}
}
echo "<p>";
	print_r($arr);
	# code...
	echo "<p/>";

echo "<br/> Số lớn nhất trong mảng là: " .$max ;
 ?>