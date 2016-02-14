<?php
class DaoProduct extends CI_Model {
	public function DaoBrand() {
		parent::__construct ();
		$this->load->model ( "dto/Dtoproduct" );
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
		$this->db->insert ( "products", $dto );
		if ($this->db->affected_rows () == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function updateProduct(DtoProduct $v) {
		$dto = array (
				"code" => $v->getCode (),
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
		$this->db->update ( 'products', $dto );
		if ($this->db->affected_rows () == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function listProduct() {
		$this->db->select ( 'p.id,p.code,p.name,p.description,p.size,p.unit,b.name as brand,p.price,pro.name as promotion,p.created_by,p.created_date,p.updated_date,p.updated_by,p.status,p.deleted_at' );
		$this->db->from ( 'products p' );
		$this->db->join ( 'brands b', 'p.brand = b.id', 'LEFT' );
		$this->db->join ( 'sale_promotions pro', 'p.promotion = pro.id', 'LEFT' );
		$this->db->where ( 'p.status', 1 );
		$this->db->order_by ( "p.id", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	public function listBrand() {
		$this->db->select ( 'id ,name' );
		$this->db->from ( 'brands' );
		$this->db->where ( 'status', 1 );
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	public function listSalePromotion() {
		$this->db->select ( 'id,  name' );
		$this->db->from ( 'sale_promotions' );
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	public function deleteProduct($id, $updated_by) {
		$this->db->set ( 'updated_by', $updated_by );
		$this->db->set ( 'status', FALSE );
		$this->db->set ( 'deleted_at', 'NOW()', FALSE );
		$this->db->where ( 'id', $id );
		$this->db->update ( 'products' );
	}
	public function getProduct($id) {
		$this->db->select ( 'id,code,name,description,size,unit,brand,price,promotion,created_by,created_date,updated_date,updated_by,status,deleted_at' );
		$this->db->from ( 'products' );
		$this->db->where ( 'id', $id );
		$this->db->where ( 'status', 1 );
		$query = $this->db->get ();
		return $query->row ();
	}
	public function getProductDetail($id) {
		$this->db->select ( 'p.id,p.code,p.name,p.description,p.size,p.unit,b.name as brand,p.price,pro.name as promotion,u.first_name as created_by,p.created_date,p.updated_date,p.updated_by,p.status,p.deleted_at' );
		$this->db->from ( 'products p' );
		$this->db->join ( 'brands b', 'p.brand = b.id', 'LEFT' );
		$this->db->join ( 'sale_promotions pro', 'p.promotion = pro.id', 'LEFT' );
		$this->db->join('users u' , 'u.id = p.created_by' , 'LEFT');
		$this->db->where ( 'p.id', $id );
		$this->db->where ( 'p.status', 1 );
		$query = $this->db->get ();
		return $query->row ();
	}

	public function getAllProductsOnSale(){
		$this->db->select("products.id AS product_id
						, products.code
						, products.name
						, price
						, 0 AS quantity
						, 0 AS amount
						, sale_promotions.id
						, sale_promotions.name AS promotion_name
						, GROUP_CONCAT(CONCAT('{\"id\":\"', promotion_types.id, '\", \"name\":\"',promotion_types.name,'\"}')) promotiontype", FALSE);
		$this->db->from('products');
		$this->db->join('sale_promotions', 'products.promotion = sale_promotions.id AND sale_promotions.end_date>=NOW()', 'LEFT');
		$this->db->join('promotion_types', 'sale_promotions.id = promotion_types.sale_promotion_id AND sale_promotions.end_date>=NOW()','LEFT');
		$this->db->group_by('products.name');
		$this->db->order_by("products.name");
		$this->db->where('products.status', 1);
		$query = $this->db->get();
		return $query->result();
	}

	public function count(){
		$this->db->from('products');
		$this->db->where("status", 1);
		return $this->db->count_all_results();
	}
}
	