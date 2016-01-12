<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class PromotionType extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtopromotiontype");
			$this->load->model("dao/Promotiontypedao");
		}

		public function index(){
			//$this->load->view('promotionType');
			$this->listpro();
		}
		
		public function add(){
			$this->load->model("dao/Daosalepromotion");
			$this->data["sale_promotions"] = $this->Daosalepromotion->listSalePromotion();
			$this->load->view('addpromotiontype', $this->data);
		}
		
		public function addingpro(){
			$this->Dtopromotiontype->setCode($this->input->post('code'));
			$this->Dtopromotiontype->setName($this->input->post('name'));
			$this->Dtopromotiontype->setSize($this->input->post('size'));
			$this->Dtopromotiontype->setSalePromotion($this->input->post('sale_promotion_id'));
			$this->Dtopromotiontype->setCreated_by($this->ion_auth->get_user_id());
			$this->Promotiontypedao->addPromotiontype($this->Dtopromotiontype);
			redirect("promotiontype");
		}
		
		public function listpro(){
			$data['lists'] = $this->Promotiontypedao->listPromotiontypes();
			$this->load->view('promotiontype', $data);
		}
		
		public function deletepro($id){
			$this->Promotiontypedao->deletePromotiontype($id);
			redirect('promotiontype');
		}

		public function getpro($id){
			$this->load->model("dao/Daosalepromotion");
			$this->data['getpro'] = $this->Promotiontypedao->getPromotiontype($id);
			$this->data["sale_promotions"] = $this->Daosalepromotion->listSalePromotion();
			$this->load->view('addpromotiontype', $this->data);
		}

		public function updatepro($id){
			$this->Dtopromotiontype->setId($id);
			$this->Dtopromotiontype->setCode($this->input->post('code'));
			$this->Dtopromotiontype->setName($this->input->post('name'));
			$this->Dtopromotiontype->setSize($this->input->post('size'));
			$this->Dtopromotiontype->setSalePromotion($this->input->post('sale_promotion_id'));
			$this->Dtopromotiontype->setUpdated_by($this->ion_auth->get_user_id());
			
			$this->Promotiontypedao->updatePromotiontype($this->Dtopromotiontype);
			redirect('promotiontype');
			
		}
	
	}
?>