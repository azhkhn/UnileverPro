<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SaleTarget extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtosaletarget");
			$this->load->model("dao/DaoSaleTarget");
			$this->load->library('ion_auth');
		}	

		public function index(){
			$this->load->model('dao/Daouser');
			$data["lstBA"] = $this->Daouser->getAllUsersByGroupName('BEAUTY_AGENT');
			$data["saletarget"] = $this->DaoSaleTarget->listSaleTarget();
			$this->load->view('saletarget' , $data);
		}
		
		public function add(){
			$this->load->view('addsaletarget');
		}
	
		public function addSaleTarget(){
			$this->Dtosaletarget->setName($this->input->post('name'));
			$this->Dtosaletarget->setDescription($this->input->post('description'));
			$this->Dtosaletarget->setBa_id($this->input->post('ba_id'));
			$this->Dtosaletarget->setStart_date($this->input->post('start_date'));
			$this->Dtosaletarget->setEnd_date($this->input->post('end_date'));
			$this->Dtosaletarget->setTarget_achievement($this->input->post('target_achievement'));
			$this->Dtosaletarget->setCreated_by($this->ion_auth->get_user_id());
			
			if($this->DaoSaleTarget->checkIfNameExist($this->input->post('name'))>0){
				$data["ERROR"] = true;
				$data["MSG"] = "SaleTarget name has already existed.";
			}else{
				$this->DaoSaleTarget->addSaleTarget($this->Dtosaletarget);
				$data["ERROR"] = false;
				$data["MSG"] = "SaleTarget has inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function delete($id){
			$this->DaoSaleTarget->deleteSaleTarget($id , $this->ion_auth->get_user_id());
			redirect("saletarget");
		}
		
		public function update($id){
			echo json_encode($this->DaoSaleTarget->getSaleTarget($id));
		}
		
		public function updateSaleTarget($id){
			$this->Dtosaletarget->setId($this->ion_auth->get_user_id());
			$this->Dtosaletarget->setName($this->input->post('name'));
			$this->Dtosaletarget->setDescription($this->input->post('description'));
			$this->Dtosaletarget->setBa_id($this->input->post('ba_id'));
			$this->Dtosaletarget->setStart_date($this->input->post('start_date'));
			$this->Dtosaletarget->setEnd_date($this->input->post('end_date'));
			$this->Dtosaletarget->setTarget_achievement($this->input->post('target_achievement'));
			$this->Dtosaletarget->setUpdated_by(2);
				
			// If SaleTarget name is changed
			if($this->input->post('oldname') != $this->input->post('name')){
				if($this->DaoSaleTarget->checkIfNameExist($this->input->post('name'))>0){
					$data["ERROR"] = true;
					$data["CHANGE"] = "EXISTED";
					$data["MSG"] = "SaleTarget name has already existed.";
				}else{
					$this->DaoSaleTarget->updateSaleTarget($this->Dtosaletarget);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED";
					$data["MSG"] = "SaleTarget was updated sucessfully.";
				}
			}else{
				// If SaleTarget name is not changed
				$this->DaoSaleTarget->updateSaleTarget($this->Dtosaletarget);
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGE";
				$data["MSG"] = "SaleTarget was updated sucessfully.";
			
			}
			
			echo json_encode($data);
		}
	}
	
	
?>