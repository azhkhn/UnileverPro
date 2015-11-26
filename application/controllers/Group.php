<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Group extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtogroup");
			$this->load->model("dao/Daogroup");
		}

		public function index(){
			$data["group"] = $this->Daogroup->listGroup();
			$this->load->view('group',$data);
		}
		
		public function add(){
			$this->load->view('addgroup');
		}
		
		public function addGroup(){
			$this->Dtogroup->setName($this->input->post('name'));
			$this->Dtogroup->setDescription($this->input->post('description'));
			
			if($this->Daogroup->addGroup($this->Dtogroup)){
				$data["ERROR"] = false;
				$data["MSG"] = "Group has been inserted sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Group has not been inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function update($id){
			echo json_encode( $this->Daogroup->getGroup($id) );
		}
		
		public function updateGroup($id){
			
			$this->Dtogroup->setId($id);
			$this->Dtogroup->setName($this->input->post('name'));
			$this->Dtogroup->setDescription($this->input->post('description'));
			
			if($this->Daogroup->updateGroup($this->Dtogroup)){
				$data["ERROR"] = false;
				$data["MSG"] = "Group has been updated sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Group has not been updated sucessfully.";
			}
			echo json_encode($data);
		}
		
	}
?>