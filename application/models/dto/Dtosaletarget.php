<?php

class DtoSaleTarget {
	
	private $id;
	private $name;
	private $description;
	private $ba_id;
	private $start_date;
	private $end_date;
	private $target_achievement;
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
	
	public function getBa_id(){
		return $this->ba_id;
	}
	
	public function setBa_id($ba_id){
		$this->ba_id = $ba_id;
	}
	
	public function getStart_date(){
		return $this->start_date;
	}
	
	public function setStart_date($start_date){
		$this->start_date = $start_date;
	}
	
	public function getEnd_date(){
		return $this->end_date;
	}
	
	public function setEnd_date($end_date){
		$this->end_date = $end_date;
	}
	
	public function getTarget_achievement(){
		return $this->target_achievement;
	}
	
	public function setTarget_achievement($target_achievement){
		$this->target_achievement = $target_achievement;
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