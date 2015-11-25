<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Group extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoGroup");
			$this->load->model("dao/DaoGroup");
		}

		public function index(){
			$data["group"] = $this->DaoGroup->listGroup();
			$this->load->view('group',$data);
		}
		
		public function add(){
			$this->load->view('addgroup');
		}
		
		public function addGroup(){
			$this->DtoGroup->setName($this->input->post('name'));
			$this->DtoGroup->setDescription($this->input->post('description'));
			
			if($this->DaoGroup->addGroup($this->DtoGroup)){
				$data["ERROR"] = false;
				$data["MSG"] = "Group has been inserted sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Group has not been inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function update($id){
			echo json_encode( $this->DaoGroup->getGroup($id) );
		}
		
		public function updateGroup($id){
			
			$this->DtoGroup->setId($id);
			$this->DtoGroup->setName($this->input->post('name'));
			$this->DtoGroup->setDescription($this->input->post('description'));
			
			if($this->DaoGroup->updateGroup($this->DtoGroup)){
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