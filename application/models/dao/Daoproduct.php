<?php
class DaoProduct extends CI_Model {
	public function DaoBrand() {
		parent::__construct ();
		$this->load->model ( "dto/Dtoproduct" );
	}
	public function addProduct(DtoProduct $v) {
		$dto = array (
				"code" => $v->getCode (),
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
		$this->db->join ( 'sale_promotions pro', 'p.promotion = pro.id AND pro.status=1', 'LEFT' );
		$this->db->where ( 'p.status', 1 );
		$this->db->order_by ( "p.id", "asc" );
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
		$this->db->where('status', 1);
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

	public function getAllProductsOnSale($date='NOW()'){
		$this->db->select("products.id AS product_id
						, products.code
						, products.name
						, price
						, 0 AS quantity
						, 0 AS amount
						, buy
						, product_promotion.id AS promotion
						, product_promotion.id AS promotion_id
						, CONCAT('BUY ', product_promotion.buy, ' FREE ', product_promotion.free) AS promotion_name
						, CONCAT('BUY ', product_promotion.buy, ' FREE ', product_promotion.free) AS remark
						", FALSE);
		$this->db->from('products');
		$this->db->join('product_promotion',"product_promotion.product_id = products.id AND product_promotion.start_date <='".$date."' AND product_promotion.end_date>='".$date."'
									AND product_promotion.status =1",'LEFT');
		//$this->db->join('sale_promotions', 'product_promotion.promotion_id = sale_promotions.id AND sale_promotions.status=1', 'LEFT');
		$this->db->join('promotion_types', "product_promotion.promotion_id = promotion_types.id AND product_promotion.start_date <='".$date."' AND product_promotion.end_date>='".$date."' AND promotion_types.status=1",'LEFT');
		$this->db->group_by('products.name');
		$this->db->order_by("products.code");
		$this->db->where('products.status', 1);
		$query = $this->db->get();
		return $query->result();
	}

	public function count($date=''){
		$this->db->from('products');
		$this->db->where("status", 1);
		if($date!=""){
			$this->db->where("created_date <='".$date."'");	
		}
		return $this->db->count_all_results();
	}
	
	public function getAllSalesPromotions(){
		$this->db->select("id, name");
		$this->db->from('promotion_types');
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getAllPromotionsById($id){
		$this->db->select("
							product_promotion.id,
							product_promotion.product_id,
							product_promotion.promotion_id,
							product_promotion.free,
							product_promotion.buy,
							DATE_FORMAT(product_promotion.start_date,'%d-%m-%Y') AS start_date,
							DATE_FORMAT(product_promotion.end_date,'%d-%m-%Y') AS end_date,
							promotion_types.name
						",FALSE);
		$this->db->from("product_promotion");
		$this->db->join("promotion_types","product_promotion.promotion_id = promotion_types.id AND promotion_types.status =1");
		$this->db->where("product_promotion.status", 1);
		$this->db->where("product_id", $id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function addNewProductPromotion($data){
		$this->db->set ('created_date', 'NOW()', FALSE);
		$this->db->set('created_by', $this->ion_auth->get_user_id());
		$this->db->set("free", $data["free"]);
		$this->db->set("buy", $data["buy"]);
		$start_date = DateTime::createFromFormat('d-m-Y', $data["start_date"]);
		$end_date = DateTime::createFromFormat('d-m-Y', $data["end_date"]);
		$this->db->set("start_date", $start_date->format('Y-m-d'));
		$this->db->set("end_date", $end_date->format('Y-m-d'));
		$this->db->set("product_id", $data["product_id"]);
		$this->db->set("promotion_id", $data["promotion_id"]);
		$this->db->set ('status', TRUE);
		$this->db->insert ("product_promotion");
		if ($this->db->affected_rows () == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function deleteProductPromotion($data){
		$this->db->set ('updated_date', 'NOW()', FALSE);
		$this->db->set('updated_by', $this->ion_auth->get_user_id());
		$this->db->set ('status', FALSE);
		$this->db->where("product_id", $data["product_id"]);
		$this->db->where("promotion_id", $data["promotion_id"]);
		$this->db->where("id", $data["id"]);
		$this->db->update("product_promotion");
		if ($this->db->affected_rows () == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getProductPromotion($data){
		$this->db->select("
							product_promotion.product_id,
							product_promotion.promotion_id,
							product_promotion.free,
							product_promotion.buy,
							DATE_FORMAT(product_promotion.start_date,'%d-%m-%Y') AS start_date,
							DATE_FORMAT(product_promotion.end_date,'%d-%m-%Y') AS end_date,
							promotion_types.name
						",FALSE);
		$this->db->from("product_promotion");
		$this->db->join("promotion_types","product_promotion.promotion_id = promotion_types.id AND promotion_types.status =1");
		$this->db->where('product_promotion.status', 1);
		$this->db->where("product_id", $data["product_id"]);
		$this->db->where("promotion_id", $data["promotion_id"]);
		$this->db->where("product_promotion.id", $data["id"]);
		return $this->db->get()->row();
	}
	
	public function updateProductPromotion($data){
		$this->db->set ('updated_date', 'NOW()', FALSE);
		$this->db->set('updated_by', $this->ion_auth->get_user_id());
		$this->db->set("free", $data["free"]);
		$this->db->set("buy", $data["buy"]);
		$start_date = DateTime::createFromFormat('d-m-Y', $data["start_date"]);
		$end_date = DateTime::createFromFormat('d-m-Y', $data["end_date"]);
		$this->db->set("start_date", $start_date->format('Y-m-d'));
		$this->db->set("end_date", $end_date->format('Y-m-d'));
		$this->db->where("product_id", $data["product_id"]);
		$this->db->where("promotion_id", $data["promotion_id"]);
		$this->db->where("id", $data["id"]);
		$this->db->update("product_promotion");
		if ($this->db->affected_rows () == 1) {
			return true;
		} else {
			return false;
		}
	}
}
	