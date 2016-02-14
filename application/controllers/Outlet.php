<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoOutlets");
			$this->load->model("dao/OutletsDAO");
		}
	
		public function index(){
			//$this->load->view('outlet');
			$this->listpro();
		}
	
		public function add(){
			$this->data["distributors"] = $this->OutletsDAO->listdistributors();
			$this->data["channels"] = $this->OutletsDAO->listchannels();
			$this->data["outlettypes"] = $this->OutletsDAO->listoutlettypes();
			$this->data["bas"] = $this->OutletsDAO->listbas();
			$this->load->view('addoutlet', $this->data);
		}
	
		public function addingpro(){
			$this->DtoOutlets->setDms_code($this->input->post('dms_code'));
			$this->DtoOutlets->setDistributor($this->input->post('distributor'));
			$this->DtoOutlets->setChannel_id($this->input->post('channel_id'));
			$this->DtoOutlets->setOutlet_type_id($this->input->post('outlet_type_id'));
			$this->DtoOutlets->setName($this->input->post('name'));
			$this->DtoOutlets->setAddress($this->input->post('address'));
			$this->DtoOutlets->setBa_id(($this->input->post('ba_id')=="") ? NULL : $this->input->post('ba_id'));
			$this->DtoOutlets->setCreated_by($this->ion_auth->get_user_id());
			
			$this->OutletsDAO->addOutlet($this->DtoOutlets);
			redirect("outlet");
		}
		
		public function listpro(){
			$this->data['lists'] = $this->OutletsDAO->listOutlets();
			$this->data["distributors"] = $this->OutletsDAO->listdistributors();
			$this->data["channels"] = $this->OutletsDAO->listchannels();
			$this->data["outlettypes"] = $this->OutletsDAO->listoutlettypes();
			$this->data["bas"] = $this->OutletsDAO->listbas();
			$this->load->view('outlet', $this->data);
		}
		
		public function deletepro($id){
			$this->OutletsDAO->deleteOutlet($id);
			redirect('outlet');
		}

		public function getpro($id){
			$this->data['getpro'] = $this->OutletsDAO->getOutlets($id);
			$this->data["distributors"] = $this->OutletsDAO->listdistributors();
			$this->data["channels"] = $this->OutletsDAO->listchannels();
			$this->data["outlettypes"] = $this->OutletsDAO->listoutlettypes();
			$this->data["bas"] = $this->OutletsDAO->listbas();
			$this->load->view('addoutlet', $this->data);
		}

		public function updatepro($id){
			$this->DtoOutlets->setId($id);
			$this->DtoOutlets->setDms_code($this->input->post('dms_code'));
			$this->DtoOutlets->setDistributor($this->input->post('distributor'));
			$this->DtoOutlets->setChannel_id($this->input->post('channel_id'));
			$this->DtoOutlets->setOutlet_type_id($this->input->post('outlet_type_id'));
			$this->DtoOutlets->setName($this->input->post('name'));
			$this->DtoOutlets->setAddress($this->input->post('address'));
			$this->DtoOutlets->setBa_id(($this->input->post('ba_id')=="") ? NULL : $this->input->post('ba_id'));
			$this->DtoOutlets->setUpdated_by($this->ion_auth->get_user_id());
			
			$this->OutletsDAO->updateOutlet($this->DtoOutlets);
			redirect('outlet');
			
		}

		public function listdistributorjson(){
			$result = $this->OutletsDAO->listdistributors();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}

		public function listchanneljson(){
			$result = $this->OutletsDAO->listchannels();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}

		public function listoutlettypejson(){
			$result = $this->OutletsDAO->listoutlettypes();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		public function listbajson(){
			$result = $this->OutletsDAO->listbas();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
}
?>