<?php 
$arr = array (1,4,2,6,9,100,4) ;
echo "Mảng đảo ngược của [ ";
for ($j=0; $j < count($arr) ; $j++) { 
echo "   $arr[$j]  ";	
}


echo " ] là : [ ";
for ($i=(count($arr)-1) ; $i>=0 ; $i--) { 
echo "  $arr[$i]   ";


}
echo " ]";
 ?>