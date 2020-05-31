<?php 
//Mang
//Mang 1 chieu 
$arr_name = array('Truong' ,  'nam' , 'viet' , 'ahiii');
echo "<pre>";
print_r($arr_name) ;
echo "</pre>";
//lay tung phan tu ra ngoai
echo "Hello  " .$arr_name[1];
//them phan tu vao mag 1 chieu
$arr_name[] = 'zent'; // tu dong them vao cuoi 
echo "<pre>";
print_r($arr_name) ;
echo "</pre>";

// ctr+shift+D
$subject =  array();
$subject[] = 'toan';
$subject[] = 'li';
$subject[] = 'hoa';

echo "<pre>";
print_r($subject) ;
echo "</pre>";
// Mang 2 chieu 

$two_arr =  array();
$two_arr[] = array('toan' , 10);
$two_arr[] = 'li';

echo "<pre>";
print_r($two_arr) ;
// echo "Mon: " .$two_arr[0];//ko chay dk: vi la 1 mang

echo "Mon: " .$two_arr[1];//chay dk vi la 1 mon dang String
//
echo "<br>";
echo "Mon: " .$two_arr[0][0];

echo "</pre>";
 ?>