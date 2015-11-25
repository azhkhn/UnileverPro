<?php

class Dtosale{

	private $id;
	private $ba_id;
	private $sale_date;
	private $sale_by;
	private $outletId;
	private $promotionId;
	private $saleItems = array();
	private $updated_date;
	private $updated_by;
	private $status;
	private $deleted_at;
	private $dmsCode;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}

	public function getBaId(){
		return $this->ba_id;
	}

	public function setBaId($baId){
		$this->ba_id = $baId;
	}

	public function setSaleBy($sale_by){
		$this->sale_by = $sale_by;
	}
	public function getSaleBy(){
		return $this->sale_by;
	}

	public function setSaleDate($sale_date){
		$this->sale_date = $sale_date;
	}
	
	public function getSaleDate(){
		return $this->sale_date;
	}

	public function setOutletId($outletId){
		$this->outletId = $outletId;
	}

	public function getOutletId(){
		return $this->outletId;
	}

	public function setSaleItems($saleItems){
		$this->saleItems = $saleItems;
	}

	public function getSaleItems(){
		return $this->saleItems;
	}

	public function getUpdatedDate(){
		return $this->updated_date;
	}
	
	public function setUpdatedDate($updated_date){
		$this->updated_date = $updated_date;
	}
	
	public function getUpdatedBy(){
		return $this->updated_by;
	}
	
	public function setUpdatedBy($updated_by){
		$this->updated_by = $updated_by;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getDeletedAt(){
		return $this->deleted_at;
	}
	
	public function setDeletedAt($deleted_at){
		$this->deleted_at = $deleted_at;
	}

	public function setPromotionId($promotionId){
		$this->promotionId = $promotionId;
	}

	public function getPromotionId(){
		return $this->promotionId;
	}

	public function setDMSCode($dmsCode){
		$this->dmsCode = $dmsCode;
	}

	public function getDMSCode(){
		return $this->dmsCode;
	}
	
}
	