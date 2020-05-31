
<!-- tạo session lưu phiên đăng nhập -->

<?php  
// lam gio hang
//cu 1 san pham click thi no se tang len 1 cho sp do sau khi dang nhap moi dk
session_start();
session_destroy();
$Price = 199;
// session_destroy();
if (isset($_GET ['id']) && !empty($_GET ['id'])){
	 $id_WL = $_GET ['id'];
	  @$_SESSION['cart_'.$id_WL]+=1;
	 // echo @$_SESSION['cart_'.$id_WL]+=1; //in ra
}
// Tong san pham
if (isset($_GET['them'])){
	$_SESSION ('cart_'.$_GET['them']+=1);
	header('Location :WishList.php?xem=giohang') ;

}
// index.php?xem=giohang&id=....
// tru
if (isset($_GET['tru'])){
	$_SESSION ('cart_'.$_GET['tru']--);
	header('Location :WishList.php') ;

}
// Delete
if (isset($_GET['xoa'])){
	$_SESSION ('cart_'.$_GET['xoa']= 0);
	header('Location :WishList.php') ;

}

//Hien thi danh sach san pham da them
foreach ($_SESSION as $name => $value) { //value =1 : số lần thêm vào
	

	// echo "<pre>";
	// 	print_r($name.'   '.$value.'<br/>');
	// 	echo "<pre/>";
		 //.. để nói chuổi , ở đay là để nối khoảng trống
	# code...

		//h láy id của gàng đó::
	if ($value > 0 ){
		// biến name tên SESSION ; 0: bắt t\đầu từ vị trí số 0, 5: length : độ dài kí tự = 5
		if (substr($name, 0, 5) =='cart_'){
			$id_WL = substr($name,5, strlen($name-5));
			// echo $id_WL; //lay ra id
			$sql =  "SELECT * FROM posts WHERE id = '".$id_WL."' ";
			// echo $sql ;
			$query = mysql_query($sql);
			 // echo $query ;
			// 
			while ($dong = mysql_fetch_array($query)) {
				$tongtien = $Price* $value ;
				echo $dong['title'].' x ' .$value. '@'.$Price.'='
				.$tongtien.'<a href = "WishList.php?them='.$id_WL.'">TTHEM</a>' ;
				# code...
			}

		}

	}
}







?>


<!-- 



authour (cart id của cart đó)  Array
cart_107   7
cart_102   37
cart_75   4
cart_74   4
cart_71   12
cart_70   4

 -->
