<?php
	class DtoRate{
		private $rateid;
		private $ratenumber;
		private $ipaddress;
		private $productid;

		public function setRateid($rateid){
			$this->rateid = $rateid;
		}

		public function getRateid(){
			return $this->rateid;
		}

		public function setRatenumber($ratenumber){
			$this->ratenumber = $ratenumber;
		}

		public function getRatenumber(){
			return $this->ratenumber;
		}

		public function setIpaddress($ipaddress){
			$this->ipaddress = $ipaddress;
		}

		public function getIpaddress(){
			return $this->ipaddress;
		}

		public function setProductid($productid){
			$this->productid = $productid;
		}

		public function getProductid(){
			return $this->productid;
		}
	}