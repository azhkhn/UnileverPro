<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Brand extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtobrand");
			$this->load->model("dao/Daobrand");
			$this->load->library('ion_auth');
		}

		public function index(){
			$data["brand"] = $this->Daobrand->listBrand();
			$data["lstBrand"] = $this->Daobrand->listBrand();
			$this->load->view('brand',$data);
		}
		
		public function add(){
			$data["lstBrand"] = $this->Daobrand->listBrand();
			$this->load->view('addbrand',$data);
		}
		
		public function listBrandJson(){
			$result = $this->Daobrand->listBrand();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function addBrand(){
			
			
			$this->Dtobrand->setName($this->input->post('name'));
			$this->Dtobrand->setDescription($this->input->post('description'));
			if($this->input->post("parent_brand") == ""){
				$this->Dtobrand->setParent_brand(null);
			}else{
				$this->Dtobrand->setParent_brand($this->input->post("parent_brand"));
			}
			$this->Dtobrand->setCreated_by($this->ion_auth->get_user_id());
			if($this->Daobrand->checkIfBrandExist($this->input->post('name'))>0){
				$data["ERROR"] = true;
				$data["ERR_MSG"] = "Brand already exist.";
			}else{
				$this->Daobrand->addBrand($this->Dtobrand);
				$data["ERROR"] = false;
				$data["ERR_MSG"] = "Brand has been inserted sucessfully.";
			}
			echo json_encode($data);
		}
	
		
		public function delete($id){
			$this->Daobrand->deleteBrand($id , $this->ion_auth->get_user_id());
			redirect("brand");
		}
		
		public function update($id){
			echo json_encode( $this->Daobrand->getBrand($id));
		}
		
		
		public function updateBrand($id){
			$this->Dtobrand->setId($id);
			$this->Dtobrand->setName($this->input->post('name'));
			$this->Dtobrand->setDescription($this->input->post('description'));
			if($this->input->post("parent_brand") == ""){
				$this->Dtobrand->setParent_brand(null);
			}else{
				$this->Dtobrand->setParent_brand($this->input->post("parent_brand"));
			}
			$this->Dtobrand->setUpdated_by($this->ion_auth->get_user_id());
			
			// If brand name is changed
			if($this->input->post('oldname') != $this->input->post('name')){
				if($this->Daobrand->checkIfBrandExist($this->input->post('name'))>0){
					$data["ERROR"] = true;
					$data["CHANGE"] = "EXISTED";
					$data["ERR_MSG"] = "Update | Brand name has already existed.";
				}else{
					$this->Daobrand->updateBrand($this->Dtobrand);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED";
					$data["ERR_MSG"] = "Brand was updated sucessfully.";
				}	
			}else{
				// If brand namme is not changed
				$this->Daobrand->updateBrand($this->Dtobrand);
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGE";
				$data["ERR_MSG"] = "Brand was updated sucessfully.";
				
			}
			echo json_encode($data);
		}
		
	}
?>