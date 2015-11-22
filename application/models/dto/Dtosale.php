<?php

class Dtosale{

	private $id;
	private $ba_id;
	private $sale_date;
	private $sale_by;
	private $outletId;
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

	public function getBaId(){
		return $this->ba_id;
	}

	public function setBaId($baId){
		$this->ba_id = $baId;
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
	