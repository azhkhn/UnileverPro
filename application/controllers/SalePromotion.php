<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SalePromotion extends CI_Controller{

	public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoSalePromotion");
			$this->load->model("dao/DaoSalePromotion");
		}	
		public function index(){
			$data["salepromotion"] = $this->DaoSalePromotion->listSalePromotion();
			$this->load->view('salepromotion',$data);
		}
		
		public function add(){
			$this->load->view('addsalepromotion');
		}
		
		public function addSalePromotion(){
			$this->DtoSalePromotion->setName($this->input->post('name'));
			$this->DtoSalePromotion->setCode($this->input->post('code'));
			$this->DtoSalePromotion->setDescription($this->input->post('description'));
			$this->DtoSalePromotion->setType($this->input->post('type'));
			$this->DtoSalePromotion->setStart_date($this->input->post('start_date'));
			$this->DtoSalePromotion->setEnd_date($this->input->post('end_date'));
			$this->DtoSalePromotion->setCreated_by(1);
				
			if($this->DaoSalePromotion->checkIfNameExist($this->input->post('name'))>0 && $this->DaoSalePromotion->checkIfCodeExist($this->input->post('code'))>0 ){
				$data["ERROR"] = true;
				$data["ERR_MSG"] = "Name and Code have already existed.";
			}else if($this->DaoSalePromotion->checkIfNameExist($this->input->post('name'))>0 ){
				$data["ERROR"] = true;
				$data["FIELD"] = "NAME";
				$data["ERR_MSG"] = "Name have already existed.";
			}else if($this->DaoSalePromotion->checkIfCodeExist($this->input->post('code'))){
				$data["ERROR"] = true;
				$data["FIELD"] = "CODE";
				$data["ERR_MSG"] = "Code have already existed.";
			}else{
				$this->DaoSalePromotion->addSalePromotion($this->DtoSalePromotion);
				$data["ERROR"] = false;
				$data["ERR_MSG"] = "SalePromotion has inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function update($id){
			$data["salepromotion"] = $this->DaoSalePromotion->listSalePromotion();
			$this->load->view('addsalepromotion',$data);
		}
		
		public function updateSalePromotion(){
			$this->DtoSalePromotion->setId($this->input->post('id'));
			$this->DtoSalePromotion->setName($this->input->post('name'));
			$this->DtoSalePromotion->setCode($this->input->post('code'));
			$this->DtoSalePromotion->setDescription($this->input->post('description'));
			$this->DtoSalePromotion->setType($this->input->post('type'));
			$this->DtoSalePromotion->setStart_date($this->input->post('start_date'));
			$this->DtoSalePromotion->setEnd_date($this->input->post('end_date'));
			$this->DtoSalePromotion->setCreated_by(1);
			$this->DtoSalePromotion->setUpdated_by(2);
		
			// If SalePromotion name and code are changed
			if(  $this->input->post('oldcode') != $this->input->post('code')    &&     $this->input->post('oldname') != $this->input->post('name')   ){
				if($this->DaoSalePromotion->checkIfNameExist($this->input->post('name'))>0 && $this->DaoSalePromotion->checkIfCodeExist($this->input->post('code'))>0 ){
					$data["ERROR"] = true;
					$data["ERR_MSG"] = "Name and Code have already existed.";
				}else{
					$this->DaoSalePromotion->updateSalePromotion($this->DtoSalePromotion);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED_NAME_CODE";
					$data["ERR_MSG"] = "SalePromotion was updated sucessfully.";
				}
			}else if($this->input->post('oldcode') != $this->input->post('code')){
				// If SalePromotion code is changed
				if($this->DaoSalePromotion->checkIfCodeExist($this->input->post('code'))>0 ){
					$data["ERROR"] = true;
					$data["ERR_MSG"] = "Code have already existed.";
				}else{
					$this->DaoSalePromotion->updateSalePromotion($this->DtoSalePromotion);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED_CODE";
					$data["ERR_MSG"] = "SalePromotion was updated sucessfully.";
				}
			}else if($this->input->post('oldname') != $this->input->post('name')){
				// If SalePromotion name is changed
				if($this->DaoSalePromotion->checkIfNameExist($this->input->post('name'))>0 ){
					$data["ERROR"] = true;
					$data["ERR_MSG"] = "Name have already existed.";
				}else{
					$this->DaoSalePromotion->updateSalePromotion($this->DtoSalePromotion);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED_NAME";
					$data["ERR_MSG"] = "SalePromotion was updated sucessfully.";
				}
			}else{
				// If SalePromotion name and code are not changed
				$this->DaoSalePromotion->updateSalePromotion($this->DtoSalePromotion);
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGED";
				$data["ERR_MSG"] = "SalePromotion was updated sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function delete($id){
			$this->DaoSalePromotion->deleteSalePromotion($id);
			redirect("salepromotion");
		}
	
	}
?>