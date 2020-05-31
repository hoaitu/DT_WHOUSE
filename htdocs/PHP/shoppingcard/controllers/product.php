<?php

class product {
	public $id,$tensanpham,$gia;
	function __construct($pid,$ptensanpham,$pgia) {
		$this->idmt = $pid;	
		$this->ten_mt = $ptensanpham;
		$this->gia = $pgia;
	}
}

?>