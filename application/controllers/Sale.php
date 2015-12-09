<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sale extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			if(!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			if(!$this->ion_auth->in_group('BEAUTY_AGENT')){
				return show_error('You must be an beauty agent to view this page.');
			}
		}

		public function index(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->data["products"] = $this->Daosale->getAllProducts();
			$this->load->view('sale', $this->data);

		}

		public function onChange(){
			$user = $this->ion_auth->user()->row();
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setStartDate($this->input->post("start_date"));
			$this->Dtosale->setEndDate($this->input->post("end_date"));
			$this->Dtosale->setBaId($user->id);
			$this->Dtosale->setOutletId($this->input->post('outlet_id'));
			$this->Dtosale->setSaleDate(date('Y-m-d'));
			$this->data["user"] = $this->Daosale->getSellerInformation($this->Dtosale);
			$this->Dtosale->setOutletId($this->data["user"]->outlet_id);
			$this->data["sale_archievement"] = $this->Daosale->getSaleArchievement($this->Dtosale);
			$this->data["sale_archievement_month_to_date"] = $this->Daosale->getSaleArchievement($this->Dtosale,1);
			$this->data["sale_archievement_year_to_date"] = $this->Daosale->getSaleArchievement($this->Dtosale,2);
			$total_rows = $this->Daosale->count($this->Dtosale); 
			$this->load->helper('app');
			$this->data["page_links"] = pagination($total_rows, 15);
			$this->data["sales"] = $this->Daosale->getAllSales($this->Dtosale, 15,'sale/ajax', 3);
			echo json_encode($this->data);
		}

		public function ajax(){
			$user = $this->ion_auth->user()->row();
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setBaId($user->id);
			$this->Dtosale->setOutletId($this->input->post('outlet_id'));
			$this->Dtosale->setSaleDate($this->input->post('sale_date'));
			$total_rows = $this->Daosale->count($this->Dtosale); 
			$this->load->helper('app');
			$this->data["page_links"] = pagination($total_rows, 15);
			$this->data["sales"] = $this->Daosale->getAllSales($this->Dtosale, 15,'sale/ajax', 3);
			echo json_encode($this->data);
		}

		public function changeBA(){
			$this->load->model('dao/Daosale');
			$this->load->model('dto/Dtosale');
			$this->Dtosale->setBaId($this->ion_auth->get_user_id());
			$this->Dtosale->setOutletId($this->input->post('outlet_id'));
			$this->Dtosale->setStartDate($this->input->post('start_date'));
			$this->Dtosale->setEndDate($this->input->post('end_date'));
			$this->data["user"] = $this->Daosale->getBAReport($this->Dtosale);
			echo json_encode($this->data);
		}

		public function add(){
			$this->form_validation->set_rules('product_id', 'Product is required.', 'trim|numeric|required');
	        $this->form_validation->set_rules('quantity', 'Quantity is required.', 'trim|numeric|required');
	        $this->form_validation->set_rules('price', 'Price is required.','required');
	        $this->form_validation->set_rules('outlet_id', 'Oulet is required.', 'required|numeric');

	        if ($this->form_validation->run() == true)
	        {
	        	$this->load->model('dao/Daosale');
				$this->load->model('dto/Dtosale');	            
				$this->Dtosale->setBaId($this->ion_auth->get_user_id());
	            $this->Dtosale->setSaleBy($this->ion_auth->get_user_id());
	            $this->Dtosale->setOutletId($this->input->post('outlet_id'));
	            $this->Dtosale->setSaleItems($this->input->post('saleItems'));
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
	        else
	        {
	            // display the create user form
	            // set the flash data error message if there is one
	            $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
	            echo json_encode($this->data);
	        }
		}

	}
?>