<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Product extends CI_Controller{

	public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtoproduct");
			$this->load->model("dao/Daoproduct");
			$this->load->library('ion_auth');
		}

		public function index(){
			$data["lstBrand"] = $this->Daoproduct->listBrand();
			$data["lstPromotion"] = $this->Daoproduct->listSalePromotion();
			$data["product"] = $this->Daoproduct->listProduct();
			$this->load->view('product',$data);
		}
		
		public function add(){
			$this->load->view('addproduct');
		}
		
		public function listBrandJson(){
			$result = $this->Daoproduct->listBrand();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function listPromotionJson(){
			$result = $this->Daoproduct->listPromotiontypes();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function addProduct(){
			$this->Dtoproduct->setCode($this->input->post('code'));
			$this->Dtoproduct->setName($this->input->post('name'));
			$this->Dtoproduct->setDescription($this->input->post('description'));
			$this->Dtoproduct->setSize($this->input->post('size'));
			$this->Dtoproduct->setUnit($this->input->post('unit'));
			$this->Dtoproduct->setBrand($this->input->post('brand'));
			$this->Dtoproduct->setPrice($this->input->post('price'));
			$this->Dtoproduct->setPromotion($this->input->post('promotion'));
			$this->Dtoproduct->setCreated_by($this->ion_auth->get_user_id());
			if($this->Daoproduct->addProduct($this->Dtoproduct)){
				$data["ERROR"] = false;
				$data["MSG"] = "Product has been inserted sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Product has not been inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function update($id){
			echo json_encode( $this->Daoproduct->getProduct($id) );
		}
		
		public function updateProduct($id){
			$this->Dtoproduct->setId($id);
			$this->Dtoproduct->setCode($this->input->post('code'));
			$this->Dtoproduct->setName($this->input->post('name'));
			$this->Dtoproduct->setDescription($this->input->post('description'));
			$this->Dtoproduct->setSize($this->input->post('size'));
			$this->Dtoproduct->setUnit($this->input->post('unit'));
			$this->Dtoproduct->setBrand($this->input->post('brand'));
			$this->Dtoproduct->setPrice($this->input->post('price'));
			$this->Dtoproduct->setPromotion($this->input->post('promotion'));
			$this->Dtoproduct->setUpdated_by($this->ion_auth->get_user_id());
			if($this->Daoproduct->updateProduct($this->Dtoproduct)){
				$data["NO_ERROR"] = false;
				$data["MSG"] = "Product has been updated sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Product has not been updated sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function delete($id){
			$this->Daoproduct->deleteProduct($id,$this->ion_auth->get_user_id());
			redirect('product');
		}
	
		public function getProductDetail($id){
			echo json_encode( $this->Daoproduct->getProductDetail($id) );
		}
		
	}
?>