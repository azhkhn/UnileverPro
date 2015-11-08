<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Brand extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("BrandDto");
			$this->load->model("BrandDao");
		}

		public function index(){
			$this->load->view('brand');
		}
		
		public function add(){
			$this->load->view('addbrand');
		}
		
		public function listBrandJson(){
			$result = $this->BrandDao->listBrand();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function addBrand(){
			$this->BrandDto->setName($this->input->post('name'));
			$this->BrandDto->setDescription($this->input->post('description'));
			if($this->input->post("parent_brand") == ""){
				$this->BrandDto->setParent_brand(null);
			}else{
				$this->BrandDto->setParent_brand($this->input->post("parent_brand"));
			}
			$this->BrandDto->setCreated_by(1);
			$data["a"] = "123";
			if($this->BrandDao->addBrand($this->BrandDto)){
				$data["ERROR"] = false;
			}else{
				$data["ERROR"] = true;
				$data["ERR_MSG"] = "Error! Cannot insert brand!.";
			}
// 			echo json_encode($data);
			json_encode($data);
		}
	
	}
?>