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
		
		public function addBrand(){
			$this->BrandDto->setName($this->input->post('name'));
			$this->BrandDto->setDescription($this->input->post('description'));
			$this->BrandDto->setParent_brand($this->input->post("parent_brand"));
			$this->BrandDto->setCreated_by(1);
			$this->BrandDao->addBrand($this->BrandDto);
			redirect("brand");
		}
	
	}
?>