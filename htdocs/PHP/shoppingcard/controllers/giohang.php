<?php	
class giohang{	
	public $id,$tensanpham,$gia,$soluong;	
	public function __construct($pid,$ptensanpham,$pgia) {
	$this->idmt = $pid;
	$this->ten_mt = $ptensanpham;
	$this->gia = $pgia;
	$this->soluong = null;
   }
}
	
?>