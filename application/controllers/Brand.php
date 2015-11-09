<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Brand extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoBrand");
			$this->load->model("dao/DaoBrand");
		}

		public function index(){
			$data["brand"] = $this->DaoBrand->listBrand();
			$this->load->view('brand',$data);
		}
		
		public function add(){
			$this->load->view('addbrand');
		}
		
		public function listBrandJson(){
			$result = $this->DaoBrand->listBrand();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function addBrand(){
			$this->DtoBrand->setName($this->input->post('name'));
			$this->DtoBrand->setDescription($this->input->post('description'));
			if($this->input->post("parent_brand") == ""){
				$this->DtoBrand->setParent_brand(null);
			}else{
				$this->DtoBrand->setParent_brand($this->input->post("parent_brand"));
			}
			$this->DtoBrand->setCreated_by(1);
			if($this->DaoBrand->checkIfBrandExist($this->input->post('name'))>0){
				$data["ERROR"] = true;
				$data["ERR_MSG"] = "Brand already exist.";
			}else{
				$this->DaoBrand->addBrand($this->DtoBrand);
				$data["ERROR"] = false;
				$data["ERR_MSG"] = "Brand inserted sucessfully.";
			}
			echo json_encode($data);
		}
	
		
		public function delete($id){
			$this->DaoBrand->deleteBrand($id);
			redirect("brand");
		}
		
		public function update($id){
			$data["brand"] = $this->DaoBrand->getBrand($id);
			$this->load->view('updatebrand',$data);
		}
		
		
		public function updateBrand(){
			$this->DtoBrand->setId($this->input->post('id'));
			$this->DtoBrand->setName($this->input->post('name'));
			$this->DtoBrand->setDescription($this->input->post('description'));
			if($this->input->post("parent_brand") == ""){
				$this->DtoBrand->setParent_brand(null);
			}else{
				$this->DtoBrand->setParent_brand($this->input->post("parent_brand"));
			}
			$this->DtoBrand->setUpdated_by(2);
			
			// If brand name is changed
			if($this->input->post('oldname') != $this->input->post('name')){
				if($this->DaoBrand->checkIfBrandExist($this->input->post('name'))>0){
					$data["ERROR"] = true;
					$data["CHANGE"] = "EXISTED";
					$data["ERR_MSG"] = "Update | Brand name has already existed.";
				}else{
					$this->DaoBrand->updateBrand($this->DtoBrand);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED";
					$data["ERR_MSG"] = "Brand was updated sucessfully.";
				}	
			}else{
				// If brand namme is not changed
				$this->DaoBrand->updateBrand($this->DtoBrand);
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGE";
				$data["ERR_MSG"] = "Brand was updated sucessfully.";
				
			}
			echo json_encode($data);
		}
		
	}
?>