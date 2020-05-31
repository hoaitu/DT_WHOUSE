<?php

include_once('model/model.php');

include_once('product.php');

include_once('giohang.php');
	
class cart{
	
public $id,$tensanpham,$gia;
	
private $soluong=null;

public $model;
	
public $product;

public function __construct(){	
	$this->model = new model();
 }

	
public function viewAllsanpham(){

	$sql="select * from maytinh";

	$this->model->select($sql);
	
	$a_data=$this->model->fetchArray();

	$mangsplist=array();

	foreach ($a_data as $value) {
		
		$sp=new product($value['idmt'],$value['ten_mt'],$value['gia']);
			
		$mangsplist[]=$sp;
		
	}

	return $mangsplist;
}

	
public function viewAllproduct($idsp){
	//hien tat ca san pham

	$sql="select * from maytinh where idmt=$idsp";

		
	$this->model->select($sql);

		
	$a_data2=$this->model->fetchArray();

		
	$mangsp=array();

	
	foreach ($a_data2 as $row) {	
		$cart2=new giohang($idsp,$row['ten_mt'],$row['gia']);
			
		$mangsp[]=$cart2;
	}

	return $mangsp;
}

	
public function addCart($id_sp){
	
	$mangCart=array();
		
	$mangCart=$this->viewAllproduct($id_sp);

	$idchonsp=$mangCart[0]->idmt;

	$cart=new giohang($idchonsp,$mangCart[0]->ten_mt,$mangCart[0]->gia);


	if($_SESSION['cart'][$idchonsp]){
		$_SESSION['cart'][$idchonsp]->soluong=+1;	
	}

	else{

		
		$_SESSION['cart'][$idchonsp]=$cart;

			
		$_SESSION['cart'][$idchonsp]->soluong=1;

		
	}

	
}

	
	public function xoaCart($pid){
		unset($_SESSION['cart'][$pid]);
	}
	public function capnhatCart(){
		foreach ($_POST['soluong'] as $idmt => $soluong) {
				if ($soluong==0){
					unset($_SESSION['cart'][$idmt]);
				}

			
			else{
				 $_SESSION['cart'][$idmt]->soluong = $soluong;

			}

			
		}

	} 
}

	
?>