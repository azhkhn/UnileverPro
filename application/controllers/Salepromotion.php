<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SalePromotion extends ADMIN_Controller{

	public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtosalepromotion");
			$this->load->model("dao/Daosalepromotion");
			$this->load->library('ion_auth');
		}	
		public function index(){
			$this->load->model("dao/PromotionTypeDAO");
			$data['lstType'] = $this->PromotionTypeDAO->listPromotiontypes();
			$data["salepromotion"] = $this->Daosalepromotion->listSalePromotion();
			$this->load->view('salepromotion',$data);
		}
		
		public function add(){
			$this->load->view('addsalepromotion');
		}
		
		public function addSalePromotion(){
			$this->Dtosalepromotion->setName($this->input->post('name'));
			$this->Dtosalepromotion->setCode($this->input->post('code'));
			$this->Dtosalepromotion->setDescription($this->input->post('description'));
			$this->Dtosalepromotion->setType($this->input->post('type'));
			$this->Dtosalepromotion->setStart_date($this->input->post('start_date'));
			$this->Dtosalepromotion->setEnd_date($this->input->post('end_date'));
			$this->Dtosalepromotion->setCreated_by($this->ion_auth->get_user_id());
				
			if($this->Daosalepromotion->checkIfNameExist($this->input->post('name'))>0 && $this->Daosalepromotion->checkIfCodeExist($this->input->post('code'))>0 ){
				$data["ERROR"] = true;
				$data["MSG"] = "Name and Code have already existed.";
			}else if($this->Daosalepromotion->checkIfNameExist($this->input->post('name'))>0 ){
				$data["ERROR"] = true;
				$data["FIELD"] = "NAME";
				$data["MSG"] = "Name have already existed.";
			}else if($this->Daosalepromotion->checkIfCodeExist($this->input->post('code'))){
				$data["ERROR"] = true;
				$data["FIELD"] = "CODE";
				$data["MSG"] = "Code have already existed.";
			}else{
				$this->Daosalepromotion->addSalePromotion($this->Dtosalepromotion);
				$data["ERROR"] = false;
				$data["MSG"] = "SalePromotion has inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function update($id){
			echo json_encode($this->Daosalepromotion->getSalePromotion($id));
		}
		
		public function updateSalePromotion($id){
			$this->Dtosalepromotion->setId($id);
			$this->Dtosalepromotion->setName($this->input->post('name'));
			$this->Dtosalepromotion->setCode($this->input->post('code'));
			$this->Dtosalepromotion->setDescription($this->input->post('description'));
			$this->Dtosalepromotion->setType($this->input->post('type'));
			$this->Dtosalepromotion->setStart_date($this->input->post('start_date'));
			$this->Dtosalepromotion->setEnd_date($this->input->post('end_date'));
			$this->Dtosalepromotion->setUpdated_by($this->ion_auth->get_user_id());
		
			// If SalePromotion name and code are changed
			if(  $this->input->post('oldcode') != $this->input->post('code')    &&     $this->input->post('oldname') != $this->input->post('name')   ){
				if($this->Daosalepromotion->checkIfNameExist($this->input->post('name'))>0 && $this->Daosalepromotion->checkIfCodeExist($this->input->post('code'))>0 ){
					$data["ERROR"] = true;
					$data["MSG"] = "Name and Code have already existed.";
				}else{
					$this->Daosalepromotion->updateSalePromotion($this->Dtosalepromotion);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED_NAME_CODE";
					$data["MSG"] = "SalePromotion was updated sucessfully.";
				}
			}else if($this->input->post('oldcode') != $this->input->post('code')){
				// If SalePromotion code is changed
				if($this->Daosalepromotion->checkIfCodeExist($this->input->post('code'))>0 ){
					$data["ERROR"] = true;
					$data["MSG"] = "Code have already existed.";
				}else{
					$this->Daosalepromotion->updateSalePromotion($this->Dtosalepromotion);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED_CODE";
					$data["MSG"] = "SalePromotion was updated sucessfully.";
				}
			}else if($this->input->post('oldname') != $this->input->post('name')){
				// If SalePromotion name is changed
				if($this->Daosalepromotion->checkIfNameExist($this->input->post('name'))>0 ){
					$data["ERROR"] = true;
					$data["MSG"] = "Name have already existed.";
				}else{
					$this->Daosalepromotion->updateSalePromotion($this->Dtosalepromotion);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED_NAME";
					$data["MSG"] = "SalePromotion was updated sucessfully.";
				}
			}else{
				// If SalePromotion name and code are not changed
				$this->Daosalepromotion->updateSalePromotion($this->Dtosalepromotion);
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGED";
				$data["MSG"] = "SalePromotion was updated sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function delete($id){
			$this->Daosalepromotion->deleteSalePromotion($id,$this->ion_auth->get_user_id());
			redirect("salepromotion");
		}
	
	}
?>