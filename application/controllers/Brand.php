<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Brand extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoBrand");
			$this->load->model("dao/DaoBrand");
			$this->load->library('ion_auth');
		}

		public function index(){
			$data["brand"] = $this->DaoBrand->listBrand();
			$data["lstBrand"] = $this->DaoBrand->listBrand();
			$this->load->view('brand',$data);
		}
		
		public function add(){
			$data["lstBrand"] = $this->DaoBrand->listBrand();
			$this->load->view('addbrand',$data);
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
			$this->DtoBrand->setCreated_by($this->ion_auth->get_user_id());
			if($this->DaoBrand->checkIfBrandExist($this->input->post('name'))>0){
				$data["ERROR"] = true;
				$data["ERR_MSG"] = "Brand already exist.";
			}else{
				$this->DaoBrand->addBrand($this->DtoBrand);
				$data["ERROR"] = false;
				$data["ERR_MSG"] = "Brand has been inserted sucessfully.";
			}
			echo json_encode($data);
		}
	
		
		public function delete($id){
			$this->DaoBrand->deleteBrand($id , $this->ion_auth->get_user_id());
			redirect("brand");
		}
		
		public function update($id){
			echo json_encode( $this->DaoBrand->getBrand($id));
		}
		
		
		public function updateBrand($id){
			$this->DtoBrand->setId($id);
			$this->DtoBrand->setName($this->input->post('name'));
			$this->DtoBrand->setDescription($this->input->post('description'));
			if($this->input->post("parent_brand") == ""){
				$this->DtoBrand->setParent_brand(null);
			}else{
				$this->DtoBrand->setParent_brand($this->input->post("parent_brand"));
			}
			$this->DtoBrand->setUpdated_by($this->ion_auth->get_user_id());
			
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