<?php 
//thông số kết nối với csdl
$serverName = "localhost";//255.123.45.21: đc IP máy chứa csdl
$userName = "root" ;// tên đăng nhập
$passWord = "" ; //MK truy cập
$dbName = "blogphp" ; // tên bảng của dữ liệu
//Tạo KNoi vs csdl
$connection = new mysqli ($serverName , $userName, $passWord , $dbName) ;
// câu lệnh truy vấn
$query = "Select * From authors" ;
//Thực thi câu lệnh
$result = $connection-> query($query);//1 bộ sưu tập hàng trả về kích thước

//$resultsArray = $results->fetch_assoc();: Dòng này tìm nạp phần tử đầu tiên từ bộ sưu tập. Nếu bộ sưu tập trống, bộ sưu tập sẽ trả về NULL.

//tạo 1 mảng để chứa DL 
$categoris = array(); // tọa mảng chứa
// echo "<pre>";
// print_r($result ); // cho biết số hàng cột điền vào
// echo "<pre/>";

//
while ($row = $result-> fetch_assoc()) {
	// FETCH_ASSOC: trả về dữ liệu dạng mảng với key là tên cột của bảng trong CSDL

	$categoris[] = $row ; //có hay ko đều đk

	/*
	1:Tính $row = $results->fetch_assoc() và trở mảng với các yếu tố hoặc NULL.
	2:Thay thế $row = $results->fetch_assoc() trong while với giá trị nhận được và nhận các câu sau: while(array(with elements)) hoặc while(NULL).
	3:Nếu đó là while(array(with elements)), nó sẽ giải quyết tình trạng trong khi ở True và cho phép thực hiện lặp lại.
	4:Nếu đó là while(NULL), nó sẽ giải quyết tình trạng trong khi ở False và thoát khỏi vòng lặp.*/

	# code...
	// echo "<pre>";
	// print_r($row);
	// echo "<pre/>";
}
//để hiện ra
foreach ($categoris as $cate ) {
	# code...
	echo "<pre>";
		print_r($cate);
	echo "<pre/>";
}



 ?>
 <!-- /////////////////////////////////////////////// -->

 <?php 
$serverName = "localhost";
$userName = "root" ;
$passWord = "" ; 
$dbName = "blogphp" ; 
$connection = new mysqli ($serverName , $userName, $passWord , $dbName) ;

$query = "Select * From authors" ;
$result = $connection-> query($query);
$categoris = array(); 
while ($row = $result-> fetch_assoc()) {
	$categoris[] = $row ;
}
foreach ($categoris as $cate ) {
	echo "<pre>";
		print_r($cate);
	echo "<pre/>";
}
 ?>