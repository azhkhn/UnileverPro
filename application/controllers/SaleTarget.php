<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SaleTarget extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoSaleTarget");
			$this->load->model("dao/DaoSaleTarget");
		}	

		public function index(){
			$data["saletarget"] = $this->DaoSaleTarget->listSaleTarget();
			$this->load->view('saletarget' , $data);
		}
		
		public function add(){
			$this->load->view('addsaletarget');
		}
	
		public function addSaleTarget(){
			$this->DtoSaleTarget->setName($this->input->post('name'));
			$this->DtoSaleTarget->setDescription($this->input->post('description'));
			$this->DtoSaleTarget->setBa_id($this->input->post('ba_id'));
			$this->DtoSaleTarget->setStart_date($this->input->post('start_date'));
			$this->DtoSaleTarget->setEnd_date($this->input->post('end_date'));
			$this->DtoSaleTarget->setTarget_achievement($this->input->post('target_achievement'));
			$this->DtoSaleTarget->setCreated_by(1);
			
			if($this->DaoSaleTarget->checkIfNameExist($this->input->post('name'))>0){
				$data["ERROR"] = true;
				$data["ERR_MSG"] = "SaleTarget name has already existed.";
			}else{
				$this->DaoSaleTarget->addSaleTarget($this->DtoSaleTarget);
				$data["ERROR"] = false;
				$data["ERR_MSG"] = "SaleTarget has inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function delete($id){
			$this->DaoSaleTarget->deleteSaleTarget($id);
			redirect("saletarget");
		}
		
		public function update($id){
			$data["saletarget"] = $this->DaoSaleTarget->getSaleTarget($id);
			$this->load->view('addsaletarget',$data);
		}
		
		public function updateSaleTarget(){
			$this->DtoSaleTarget->setId($this->input->post('id'));
			$this->DtoSaleTarget->setName($this->input->post('name'));
			$this->DtoSaleTarget->setDescription($this->input->post('description'));
			$this->DtoSaleTarget->setBa_id($this->input->post('ba_id'));
			$this->DtoSaleTarget->setStart_date($this->input->post('start_date'));
			$this->DtoSaleTarget->setEnd_date($this->input->post('end_date'));
			$this->DtoSaleTarget->setTarget_achievement($this->input->post('target_achievement'));
			$this->DtoSaleTarget->setUpdated_by(2);
				
			// If SaleTarget name is changed
			if($this->input->post('oldname') != $this->input->post('name')){
				if($this->DaoSaleTarget->checkIfNameExist($this->input->post('name'))>0){
					$data["ERROR"] = true;
					$data["CHANGE"] = "EXISTED";
					$data["ERR_MSG"] = "Update | SaleTarget name has already existed.";
				}else{
					$this->DaoSaleTarget->updateSaleTarget($this->DtoSaleTarget);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED";
					$data["ERR_MSG"] = "SaleTarget was updated sucessfully.";
				}
			}else{
				// If SaleTarget namme is not changed
				$this->DaoSaleTarget->updateSaleTarget($this->DtoSaleTarget);
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGE";
				$data["ERR_MSG"] = "SaleTarget name was updated sucessfully.";
			
			}
			
			echo json_encode($data);
		}
	}
	
	
?>