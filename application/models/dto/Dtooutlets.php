<?php 
	class DtoOutlets{
		private $id;
		private $dms_code;
		private $distributor;
		private $channel_id;
		private $outlet_type_id;
		private $name;
		private $address;
		private $ba_id;
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

	public function getDms_code(){
		return $this->dms_code;
	}

	public function setDms_code($dms_code){
		$this->dms_code = $dms_code;
	}

	public function getDistributor(){
		return $this->distributor;
	}

	public function setDistributor($distributor){
		$this->distributor = $distributor;
	}

	public function getChannel_id(){
		return $this->channel_id;
	}

	public function setChannel_id($channel_id){
		$this->channel_id = $channel_id;
	}

	public function getOutlet_type_id(){
		return $this->outlet_type_id;
	}

	public function setOutlet_type_id($outlet_type_id){
		$this->outlet_type_id = $outlet_type_id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getAddress(){
		return $this->address;
	}

	public function setAddress($address){
		$this->address = $address;
	}

	public function getBa_id(){
		return $this->ba_id;
	}

	public function setBa_id($ba_id){
		$this->ba_id = $ba_id;
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


?>