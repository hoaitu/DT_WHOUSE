<?php 
	$n =2;
	$result = 0;
	$num = 1;
	$mau = 1;


	for ($i=1 ; $i <= $n ; $i++ ){
		
		$num = ($num*$i) ; //mau
		$result += $i/$num ;

	}
	echo "<hr/>";
	echo "Tổng S = 1 /1! + 2 /2! + ....+ n / n! với n=  " .$n ." là : " .$result ."<br>";
	
 ?>