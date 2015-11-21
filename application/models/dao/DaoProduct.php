<?php
class DaoProduct extends CI_Model {
	public function DaoBrand() {
		parent::__construct ();
		$this->load->model ( "dto/DtoProduct" );
	}
	public function addProduct(DtoProduct $v) {
		$dto = array (
				"code" => $v->getName (),
				"name" => $v->getName (),
				"description" => $v->getDescription (),
				"size" => $v->getSize (),
				"unit" => $v->getUnit (),
				"brand" => $v->getBrand (),
				"price" => $v->getPrice (),
				"promotion" => $v->getPromotion () 
		);
		$this->db->set ( 'created_date', 'NOW()', FALSE );
		$this->db->set ( 'status', TRUE );
		$this->db->insert ( "PRODUCTS", $dto );
		if ($this->db->affected_rows () == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function updateProduct(DtoProduct $v) {
		$dto = array (
				"code" => $v->getName (),
				"name" => $v->getName (),
				"description" => $v->getDescription (),
				"size" => $v->getSize (),
				"unit" => $v->getUnit (),
				"brand" => $v->getBrand (),
				"price" => $v->getPrice (),
				"promotion" => $v->getPromotion (),
				"updated_by" => $v->getUpdated_by () 
		);
		$this->db->set ( 'updated_date', 'NOW()', FALSE );
		$this->db->set ( 'status', TRUE );
		$this->db->where ( 'id', $v->getId () );
		$this->db->update ( 'PRODUCTS', $dto );
		if ($this->db->affected_rows () == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function listProduct() {
		$this->db->select ( 'id,code,name,description,size,unit,brand,price,promotion,created_by,created_date,updated_date,updated_by,status,deleted_at' );
		$this->db->from ( 'PRODUCTS' );
		$this->db->where ( 'status', 1 );
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	public function listBrand() {
		$this->db->select ( 'id ,name' );
		$this->db->from ( 'BRANDS' );
		$this->db->where ( 'status', 1 );
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	public function listPromotiontypes() {
		$this->db->select ( 'id,  name' );
		$this->db->from ( 'sale_promotions' );
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	public function deleteProduct($id) {
		$this->db->set ( 'status', FALSE );
		$this->db->set ( 'deleted_at', 'NOW()', FALSE );
		$this->db->where ( 'id', $id );
		$this->db->update ( 'PRODUCTS' );
	}
	public function getProduct($id) {
		$this->db->select ( 'id,code,name,description,size,unit,brand,price,promotion,created_by,created_date,updated_date,updated_by,status,deleted_at' );
		$this->db->from ( 'PRODUCTS' );
		$this->db->where ( 'id', $id );
		$this->db->where ( 'status', 1 );
		$query = $this->db->get ();
		return $query->result ();
	}
}
	