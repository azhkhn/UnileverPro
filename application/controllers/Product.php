<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Product extends CI_Controller{

	public function __construct(){
			parent::__construct();
			$this->load->model("dto/DtoProduct");
			$this->load->model("dao/DaoProduct");
			$this->load->library('ion_auth');
		}

		public function index(){
			$data["lstBrand"] = $this->DaoProduct->listBrand();
			$data["lstPromotion"] = $this->DaoProduct->listSalePromotiont();
			$data["product"] = $this->DaoProduct->listProduct();
			$this->load->view('product',$data);
		}
		
		public function add(){
			$this->load->view('addproduct');
		}
		
		public function listBrandJson(){
			$result = $this->DaoProduct->listBrand();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function listPromotionJson(){
			$result = $this->DaoProduct->listPromotiontypes();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function addProduct(){
			$this->DtoProduct->setCode($this->input->post('code'));
			$this->DtoProduct->setName($this->input->post('name'));
			$this->DtoProduct->setDescription($this->input->post('description'));
			$this->DtoProduct->setSize($this->input->post('size'));
			$this->DtoProduct->setUnit($this->input->post('unit'));
			$this->DtoProduct->setBrand($this->input->post('brand'));
			$this->DtoProduct->setPrice($this->input->post('price'));
			$this->DtoProduct->setPromotion($this->input->post('promotion'));
			$this->DtoProduct->setCreated_by($this->ion_auth->get_user_id());
			if($this->DaoProduct->addProduct($this->DtoProduct)){
				$data["ERROR"] = false;
				$data["MSG"] = "Product has been inserted sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Product has not been inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function update($id){
			echo json_encode( $this->DaoProduct->getProduct($id) );
		}
		
		public function updateProduct($id){
			$this->DtoProduct->setId($id);
			$this->DtoProduct->setCode($this->input->post('code'));
			$this->DtoProduct->setName($this->input->post('name'));
			$this->DtoProduct->setDescription($this->input->post('description'));
			$this->DtoProduct->setSize($this->input->post('size'));
			$this->DtoProduct->setUnit($this->input->post('unit'));
			$this->DtoProduct->setBrand($this->input->post('brand'));
			$this->DtoProduct->setPrice($this->input->post('price'));
			$this->DtoProduct->setPromotion($this->input->post('promotion'));
			$this->DtoProduct->setUpdated_by($this->ion_auth->get_user_id());
			if($this->DaoProduct->updateProduct($this->DtoProduct)){
				$data["NO_ERROR"] = false;
				$data["MSG"] = "Product has been updated sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Product has not been updated sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function delete($id){
			$this->DaoProduct->deleteProduct($id,$this->ion_auth->get_user_id());
			redirect('product');
		}
	
		public function getProductDetail($id){
			echo json_encode( $this->DaoProduct->getProductDetail($id) );
		}
		
	}
?>