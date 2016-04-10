<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Projectsupervisor extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			if(!$this->ion_auth->in_group('PROJECT_HOLDER')){
				return show_error('You must be an Project Holder to view this page.');
			}
		}
				
		public function index(){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->data["ba_users"] = $this->Daouser->getAllUsersByGroupId(3);
			$this->load->view('project/sale/beauty_agent_daily_report', $this->data);
		}

		public function changeStatus($id){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->Dtouser->setId($id);
			$this->Dtouser->setActive($this->input->post('active'));
			echo json_encode($this->Daouser->changeStatus($this->Dtouser));
		}

		public function dailyBAReport(){
			$this->load->model('dao/Daouser');
			$this->load->model('dto/Dtouser');
			$this->data["ba_users"] = $this->Daouser->getAllUsersByGroupId(3);
			$this->load->view('supervisor/beauty_agent_daily_report', $this->data);
		}

		public function changeBA(){
			$this->load->model('dao/Outletsdao');
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->load->model('dao/Daoproduct');
			$this->Dtosale->setBaId($this->input->post("ba_id"));
			$this->Dtosale->setOutletId($this->input->post("outlet_id"));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getBAReport($this->Dtosale);
			$this->data["products"] = $this->Daoproduct->getAllProductsOnSale();
			echo json_encode($this->data);
		}

		public function selectedBA(){
			$this->load->model('dao/Outletsdao');
			$this->data["outlets"] = $this->Outletsdao->getAllOutletsByBA($this->input->post("ba_id"));
			echo json_encode($this->data);
		}

		public function changeDMSCode(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setDMSCode($this->input->post("dms_code"));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getBAReport($this->Dtosale);
			echo json_encode($this->data);	
		}

		public function products(){
			$this->load->model('dao/Daoproduct');
			$this->data = $this->Daoproduct->getAllProductsOnSale();
			echo json_encode($this->data);
		}

		public function products_update(){
			$this->models = json_decode($this->input->post('models'), true);
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');	            
			$this->Dtosale->setBaId($this->input->post('ba_id'));
            $this->Dtosale->setSaleBy($this->ion_auth->get_user_id());
            $this->Dtosale->setSaleDate($this->input->post('sale_date'));
            $this->Dtosale->setOutletId($this->input->post('outlet_id'));
            $this->Dtosale->setSaleItems($this->models);
			if($this->Daosale->addNewSale($this->Dtosale)){
	            echo json_encode(array(
	            		'message' => 'You have been inserted successfully.',
	            		'status'  => TRUE
	            	));
            }else{
            	echo json_encode(array(
	            		'message' => 'You have failed when inserted new sale please try again!',
	            		'status'  => FALSE
	            	));
            }
		}

		public function outlet($id){
			$this->load->model('dao/Outletsdao');
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->load->model('dao/Daoproduct');
			$this->Dtosale->setBaId($this->input->post("ba_id"));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getBAReport($this->Dtosale);
			$this->data["products"] = $this->Daoproduct->getAllProductsOnSale();
			$this->data["outlet"] = $this->Outletsdao->getOutletById($id);
			echo json_encode($this->data);
		}

		public function ajax(){
			$user = $this->ion_auth->user()->row();
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setBaId($this->input->post('ba_id'));
			$this->Dtosale->setOutletId($this->input->post('outlet_id'));
			$this->Dtosale->setSaleDate($this->input->post('sale_date'));
			$total_rows = $this->Daosale->count($this->Dtosale); 
			$this->load->helper('app');
			$this->data["page_links"] = pagination($total_rows, 15);
			$this->data["count"] = $total_rows;
			$this->data["sales"] = $this->Daosale->getAllSales($this->Dtosale, 15,'sale/ajax', 3);
			echo json_encode($this->data);
		}
		
		public function deleteSale(){
			$this->load->model('dao/Daosale');
			$saleId = $this->input->post("sale_id");
			$productId = $this->input->post("product_id");
			if($this->Daosale->deleteSale($saleId, $productId)){
	            echo json_encode(array(
	            		'message' => 'You have been deleted successfully.',
	            		'status'  => TRUE
	            	));
            }else{
            	echo json_encode(array(
	            		'message' => 'You have failed when deleted new sale please try again!',
	            		'status'  => FALSE
	            	));
            }
		}
		
		public function checkpromotion(){
			$this->load->model('dao/Daosale');
			$productId= $this->input->post("product_id");
			$quantity= $this->input->post("quantity");
			$this->data["promotion"] = $this->Daosale->check($productId, $quantity);
			echo json_encode($this->data);
		}
		
		public function updatesale(){
			$this->load->model('dao/Daosale');
			$saleId = $this->input->post("sale_id");
			$productId = $this->input->post("product_id");
			$quantity = $this->input->post("quantity");
			$promotionId = $this->input->post("promotion_id");
			if($this->Daosale->updateSale($saleId, $productId, $quantity, $promotionId)){
	            echo json_encode(array(
	            		'message' => 'You have been updated successfully.',
	            		'status'  => TRUE
	            	));
            }else{
            	echo json_encode(array(
	            		'message' => 'You have failed when update sale please try again!',
	            		'status'  => FALSE
	            	));
            }
				
		}
		
		
	}

?>