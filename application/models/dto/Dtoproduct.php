<?php

class DtoProduct{

	private $id;
	private $code;
	private $name;
	private $description;
	private $size;
	private $unit;
	private $brand;
	private $price;
	private $promotion;
	private $created_date;
	private $created_by;
	private $updated_date;
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

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getSize(){
		return $this->size;
	}

	public function setSize($size){
		$this->size = $size;
	}

	public function getUnit(){
		return $this->unit;
	}

	public function setUnit($unit){
		$this->unit = $unit;
	}

	public function getBrand(){
		return $this->brand;
	}

	public function setBrand($brand){
		$this->brand = $brand;
	}

	public function getPrice(){
		return $this->price;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function getPromotion(){
		return $this->promotion;
	}

	public function setPromotion($promotion){
		$this->promotion = $promotion;
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

	public function getUpdated_date(){
		return $this->updated_date;
	}

	public function setUpdated_date($updated_date){
		$this->updated_date = $updated_date;
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
	
}
	