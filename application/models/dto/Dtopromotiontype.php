<?php
	class Dtopromotiontype{

		private $id;
		private $code;
		private $name;
		private $size;
		private $sale_promotion;
		private $created_date;
		private $created_by;
		private $updated_by;
		private $status;
		private $deleted_at;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCode(){
		return $this->code;
	}

	public function setCode($code){
		$this->code = $code;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getSize(){
		return $this->size;
	}

	public function setSize($size){
		$this->size = $size;
	}

	public function getCreated_date(){
		return $this->created_date;
	}

	public function setCreated_date($created_date){
		$this->created_date = $created_date;
	}

	public function getCreated_by(){
		return $this->created_by;
	}

	public function setCreated_by($created_by){
		$this->created_by = $created_by;
	}

	public function getUpdated_by(){
		return $this->updated_by;
	}

	public function setUpdated_by($updated_by){
		$this->updated_by = $updated_by;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getDeleted_at(){
		return $this->deleted_at;
	}

	public function setDeleted_at($deleted_at){
		$this->deleted_at = $deleted_at;
	}

	public function getSalePromotion(){
		return $this->sale_promotion;
	}

	public function setSalePromotion($sale_promotion){
		$this->sale_promotion = $sale_promotion;
	}
		
}



?>