<?php
	class DtoProduct{
		
		private $productid;
		private $categoryid;
		private $thumbnailurl;
		private $userid;
		private $seotitle;
		private $seodescription;
		private $recommend;
		private $price;
		private $productDetail = array();
		
		public function getRecommend(){
			return $this->recommend;
		}
		
		public function setRecommend($recommend){
			$this->recommend = $recommend;
		}
		
		public function getPrice(){
			return $this->price;
		}
		
		public function setPrice($price){
			$this->price = $price;
		}
		
		public function getProductid(){
			return $this->productid;
		}
		
		public function setProductid($productid){
			$this->productid = $productid;
		}
		
		public function getCategoryid(){
			return $this->categoryid;
		}
		
		public function setCategoryid($categoryid){
			$this->categoryid = $categoryid;
		}
		
		public function getThumbnailurl(){
			return $this->thumbnailurl;
		}
		
		public function setThumbnailurl($thumbnailurl){
			$this->thumbnailurl = $thumbnailurl;
		}
		
		public function getUserid(){
			return $this->userid;
		}
		
		public function setUserid($userid){
			$this->userid = $userid;
		}
		
		public function getSeotitle(){
			return $this->seotitle;
		}
		
		public function setSeotitle($seotitle){
			$this->seotitle = $seotitle;
		}
		
		public function getSeodescription(){
			return $this->seodescription;
		}
		
		public function setSeodescription($seodescription){
			$this->seodescription = $seodescription;
		}

		public function getProductDetails(){
			return $this->productDetail;
		}

		public function setProductDetails($productDetail){
			$this->productDetail = $productDetail;
		}
		
		
	}

