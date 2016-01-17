<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Saletarget extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtosaletarget");
			$this->load->model("dao/Daosaletarget");
			$this->load->library('ion_auth');
		}	

		public function index(){
			$this->load->model('dao/Daouser');
			$data["lstBA"] = $this->Daouser->getAllUsersByGroupName('BEAUTY_AGENT');
			$data["saletarget"] = $this->Daosaletarget->listSaleTarget();
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
			
			if($this->Daosaletarget->checkIfNameExist($this->input->post('name'))>0){
				$data["ERROR"] = true;
				$data["MSG"] = "SaleTarget name has already existed.";
			}else{
				$this->Daosaletarget->addSaleTarget($this->Dtosaletarget);
				$data["ERROR"] = false;
				$data["MSG"] = "SaleTarget has inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function delete($id){
			$this->Daosaletarget->deleteSaleTarget($id , $this->ion_auth->get_user_id());
			redirect("saletarget");
		}
		
		public function update($id){
			echo json_encode($this->Daosaletarget->getSaleTarget($id));
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
				if($this->Daosaletarget->checkIfNameExist($this->input->post('name'))>0){
					$data["ERROR"] = true;
					$data["CHANGE"] = "EXISTED";
					$data["MSG"] = "SaleTarget name has already existed.";
				}else{
					$this->Daosaletarget->updateSaleTarget($this->Dtosaletarget);
					$data["ERROR"] = false;
					$data["CHANGE"] = "CHANGED";
					$data["MSG"] = "SaleTarget was updated sucessfully.";
				}
			}else{
				// If SaleTarget name is not changed
				$this->Daosaletarget->updateSaleTarget($this->Dtosaletarget);
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGE";
				$data["MSG"] = "SaleTarget was updated sucessfully.";
			
			}
			
			echo json_encode($data);
		}

		public function all(){
			$this->data["saletargets"] = $this->Daosaletarget->getAllSaleTargets();
			echo json_encode($this->data["saletargets"]);			
		}

		public function ba_all(){
			$this->load->model('dao/Daouser');
			$this->data["users"] = $this->Daouser->getAllUserBsyGroupId();
			echo json_encode($this->data["users"]);				
		}

		public function create(){
			$this->models = json_decode($this->input->post('models'), true);
			$this->Daosaletarget->createNewSaleTargets($this->models);
		}

		public function update_rows(){
			$this->models = json_decode($this->input->post('models'), true);
			if($this->Daosaletarget->updateRowsSaleTarget($this->models)){
				$data["ERROR"] = false;
				$data["CHANGE"] = "CHANGED";
				$data["MSG"] = "SaleTarget was updated sucessfully.";
			}else{
				$data["ERROR"] = false;
				$data["CHANGE"] = "NOT_CHANGE";
				$data["MSG"] = "SaleTarget was updated sucessfully.";
			}	

			echo json_encode($data);

		}

		public function outlets_all(){
			$this->load->model('dao/Outletsdao');
			$this->data = $this->Outletsdao->getAllOutlets();
			echo json_encode($this->data);
		}
	}
	
	
?>