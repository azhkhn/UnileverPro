<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class PromotionType extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoPromotionType");
			$this->load->model("dao/PromotionTypeDAO");
		}

		public function index(){
			//$this->load->view('promotionType');
			$this->listpro();
		}
		
		public function add(){
			$this->load->view('addpromotionType');
		}
		
		public function addingpro(){
			$this->DtoPromotionType->setCode($this->input->post('code'));
			$this->DtoPromotionType->setName($this->input->post('name'));
			$this->DtoPromotionType->setSize($this->input->post('size'));
			$this->DtoPromotionType->setCreated_by(1);
			$this->PromotionTypeDAO->addPromotiontype($this->DtoPromotionType);
			redirect("promotionType");
		}
		
		public function listpro(){
			$data['lists'] = $this->PromotionTypeDAO->listPromotiontypes();
			$this->load->view('promotionType', $data);
		}
		
		public function deletepro($id){
			$this->PromotionTypeDAO->deletePromotiontype($id);
			redirect('promotionType');
		}

		public function getpro($id){
			$data['getpro'] = $this->PromotionTypeDAO->getPromotiontype($id);
			$this->load->view('addpromotionType', $data);
		}

		public function updatepro($id){
			$this->DtoPromotionType->setId($id);
			$this->DtoPromotionType->setCode($this->input->post('code'));
			$this->DtoPromotionType->setName($this->input->post('name'));
			$this->DtoPromotionType->setSize($this->input->post('size'));
			$this->DtoPromotionType->setUpdated_by(1);
			
			$this->PromotionTypeDAO->updatePromotiontype($this->DtoPromotionType);
			redirect('promotionType');
			
		}
	
	}
?>