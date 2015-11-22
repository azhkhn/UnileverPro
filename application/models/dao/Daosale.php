<?php
	class Daosale extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtosale");
		}		

		public function getSellerInformation(Dtosale $Dtosale){
			$this->db->select ("A.id
								, A.first_name
								, A.last_name
								, (SELECT CONCAT(last_name, ' ', first_name) AS supervisor 
								   FROM users where id = A.parent_id) AS supervisor
								, (SELECT CONCAT(last_name, ' ', first_name) 
								   FROM users AS E
								   WHERE E.id = (
								   		SELECT S.parent_id 
								   		FROM users AS S 
								   		WHERE S.id = A.parent_id)) AS executive
								, B.dms_code
								, B.address AS outlet_address
								, B.name AS outlet_name 
								, B.id AS outlet_id
								, C.name AS distributor
								, D.name AS channel
								, E.name AS customer_type
								, A.photo
								, DATE_FORMAT(F.start_date,'%d-%M-%Y') As start_date
								, DATE_FORMAT(F.end_date,'%d-%M-%Y') As end_date
								, F.target_achievement
								, (F.target_achievement / TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY))) As monthly_target,
								, TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY)) As number_of_months" 
								, FALSE);
			$this->db->from('users A');
			$this->db->from('outlets B', 'A.id=B.ba_id', 'LEFT');
			$this->db->from('distributors C', 'B.distributor=C.id', 'LEFT');
			$this->db->from('channels D', 'B.channel_id=D.id', 'LEFT');
			$this->db->from('outlet_types E', 'B.outlet_type_id=E.outlet_type.id', 'LEFT');
			$this->db->from('sale_targets F', 'F.ba_id = A.id');
			$this->db->where ('A.active', 1);
			$this->db->where('A.id', $Dtosale->getBaId());
			$query = $this->db->get ();
			return $query->row();
		}

		public function getAllProducts(){
			$this->db->select ('id
								, code
								, name
								, description
								, size
								, unit
								, brand
								, price
								, promotion' );
			$this->db->from ('products');
			$this->db->where ('status', 1);
			$this->db->order_by ("name");
			$query = $this->db->get ();
			return $query->result ();
		}

		public function getAllSales(Dtosale $Dtosale, $limit=15){
			$this->db->select ("sales.id
							  , sale_items.product_id
							  , products.code 
							  , products.name As product_name
							  , sale_items.quantity
							  , sale_items.price
							  , (sale_items.price*sale_items.quantity) AS amount
							  , sale_items.promotion_id
							  , sale_promotions.name As promotion_name
							  , promotion_types.name As promotion_type
							  , DATE_FORMAT(sales.sale_date,'%H:%i:%s') As sale_time
 							");
			$this->db->from('sales');
			$this->db->join('sale_items', 'sales.id=sale_items.sale_id', 'LEFT');
			$this->db->join('products', 'sale_items.product_id=products.id', 'LEFT');
			$this->db->join('users', 'sales.ba_id = users.id', 'LEFT');
			$this->db->join('sale_promotions', 'sale_items.promotion_id=sale_promotions.id', "LEFT");
			$this->db->join('promotion_types', 'sale_items.promotion_type_id=promotion_types.id',"LEFT");
			$this->db->where('sales.status', 1);
			$this->db->where('sales.ba_id', $Dtosale->getBaId());
			$this->db->where('sales.outlet_id', $Dtosale->getOutletId());
			$this->db->where("DATE(sales.sale_date)='".$Dtosale->getSaleDate()."'");
			$this->db->order_by ("sales.sale_date",'DESC');
			$offset = $this->uri->segment(3);
			$this->db->limit($limit, $offset);
			$query = $this->db->get ();
			return $query->result ();	
		}

		public function count(Dtosale $Dtosale){
			$this->db->from('sales');
			$this->db->where('sales.status', 1);
			$this->db->where('sales.ba_id', $Dtosale->getBaId());
			$this->db->where('sales.outlet_id', $Dtosale->getOutletId());
			$this->db->where("DATE(sales.sale_date)='".$Dtosale->getSaleDate()."'");
			return $this->db->count_all_results();
		}

		public function getSaleArchievement(Dtosale $Dtosale,$status="0"){
			$this->db->select ('sales.id
							  , SUM(sale_items.price*sale_items.quantity) AS amount
 							');
			$this->db->from('sales');
			$this->db->join('sale_items', 'sales.id=sale_items.sale_id', 'LEFT');
			$this->db->where('sales.status', 1);
			$this->db->where('sales.ba_id', $Dtosale->getBaId());
			$this->db->where('sales.outlet_id', $Dtosale->getOutletId());
			if($status==0){
				$this->db->where("DATE(sales.sale_date)=DATE_FORMAT(NOW(),'%Y-%m-%d')");
			}else if($status==1){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )");
			}else if($status==2){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-01-01') AND NOW() )");
			}
			$query = $this->db->get ();
			return $query->row();	
		}
	}
?>
