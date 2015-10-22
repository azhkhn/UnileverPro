<?php
	class DtoProductDetail{
		
		private $productid;
		private $languageid;
		private $title;
		private $cation;
		private $descritption;
		private $createdate;
		
		public function getProductid(){
			return $this->productid;
		}
		
		public function setProductid($productid){
			$this->productid = $productid;
		}
		
		public function getLanguageid(){
			return $this->languageid;
		}
		
		public function setLanguageid($languageid){
			$this->languageid = $languageid;
		}
		
		public function getTitle(){
			return $this->title;
		}
		
		public function setTitle($title){
			$this->title = $title;
		}
		
		public function getCation(){
			return $this->cation;
		}
		
		public function setCation($cation){
			$this->cation = $cation;
		}
		
		public function getDescritption(){
			return $this->descritption;
		}
		
		public function setDescritption($descritption){
			$this->descritption = $descritption;
		}
		
		public function getCreatedate(){
			return $this->createdate;
		}
		
		public function setCreatedate($createdate){
			$this->createdate = $createdate;
		}
		
		
		

	
	}

