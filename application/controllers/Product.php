<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Product extends ADMIN_Controller{

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
			$data["promotions"] = $this->Daoproduct->getAllSalesPromotions();
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
			$this->Dtoproduct->setPromotion(($this->input->post('promotion')=="") ? NULL : $this->input->post('promotion'));
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
			$this->Dtoproduct->setPromotion(($this->input->post('promotion')=="") ? NULL : $this->input->post('promotion'));
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
		
		public function promotions(){
			$id = $this->input->post("product_id");
			echo json_encode($this->Daoproduct->getAllSalesPromotions());
		}
		
		public function getallpromotions($id){
			echo json_encode($this->Daoproduct->getAllPromotionsById($id));
		}
		
		public function addpromotion(){
			$data = array(
				"buy"=> $this->input->post("buy"),
				"free"=> $this->input->post("free"),
				"product_id"=> $this->input->post("product_id"),
				"promotion_id"=> $this->input->post("promotion_id"),
				"start_date"=> $this->input->post("start_date"),
				"end_date"=> $this->input->post("end_date")
			);
			if($this->Daoproduct->addNewProductPromotion($data)){
				$data["ERROR"] = false;
				$data["MSG"] = "Product Promotion has been inserted sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Product Promotion has not been inserted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function deletepromotion(){
			$data = array(
				"product_id"=> $this->input->post("product_id"),
				"promotion_id"=> $this->input->post("promotion_id"),
				"id" => $this->input->post("id")
			);
			if($this->Daoproduct->deleteProductPromotion($data)){
				$data["ERROR"] = false;
				$data["MSG"] = "Product Promotion has been deleted sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Product Promotion has not been deleted sucessfully.";
			}
			echo json_encode($data);
		}
		
		public function getpromotion(){
			$data = array(
				"product_id"=> $this->input->post("product_id"),
				"promotion_id"=> $this->input->post("promotion_id"),
				"id"=> $this->input->post('id')
			);
			echo json_encode($this->Daoproduct->getProductPromotion($data));
		}
		
		public function updatepromotion(){
			$data = array(
				"buy"=> $this->input->post("buy"),
				"free"=> $this->input->post("free"),
				"product_id"=> $this->input->post("product_id"),
				"promotion_id"=> $this->input->post("promotion_id"),
				"start_date"=> $this->input->post("start_date"),
				"end_date"=> $this->input->post("end_date"),
				"id" => $this->input->post("id")
			);
			if($this->Daoproduct->updateProductPromotion($data)){
				$data["ERROR"] = false;
				$data["MSG"] = "Product Promotion has been updated sucessfully.";
			}else{
				$data["ERROR"] = true;
				$data["MSG"] = "Product Promotion has not been updated sucessfully.";
			}
			echo json_encode($data);
		}
		
	}
?>