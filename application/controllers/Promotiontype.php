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
			$this->load->view('addpromotiontype');
		}
		
		public function addingpro(){
			$this->DtoPromotionType->setCode($this->input->post('code'));
			$this->DtoPromotionType->setName($this->input->post('name'));
			$this->DtoPromotionType->setSize($this->input->post('size'));
			$this->DtoPromotionType->setCreated_by($this->ion_auth->get_user_id());
			$this->PromotionTypeDAO->addPromotiontype($this->DtoPromotionType);
			redirect("promotiontype");
		}
		
		public function listpro(){
			$data['lists'] = $this->PromotionTypeDAO->listPromotiontypes();
			$this->load->view('promotiontype', $data);
		}
		
		public function deletepro($id){
			$this->PromotionTypeDAO->deletePromotiontype($id);
			redirect('promotiontype');
		}

		public function getpro($id){
			$data['getpro'] = $this->PromotionTypeDAO->getPromotiontype($id);
			$this->load->view('addpromotiontype', $data);
		}

		public function updatepro($id){
			$this->DtoPromotionType->setId($id);
			$this->DtoPromotionType->setCode($this->input->post('code'));
			$this->DtoPromotionType->setName($this->input->post('name'));
			$this->DtoPromotionType->setSize($this->input->post('size'));
			$this->DtoPromotionType->setUpdated_by($this->ion_auth->get_user_id());
			
			$this->PromotionTypeDAO->updatePromotiontype($this->DtoPromotionType);
			redirect('promotiontype');
			
		}
	
	}
?>