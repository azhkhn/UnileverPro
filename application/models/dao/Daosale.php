<?php
	class Daosale extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->model("dto/Dtosale");
		}		

		public function getSellerInformation(Dtosale $Dtosale, $dmsCode=0){
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
								, B.id As outlet_id
								, B.name AS outlet_name 
								, B.id AS outlet_id
								, C.name AS distributor
								, D.name AS channel
								, E.name AS customer_type
								, A.photo
								, DATE_FORMAT(F.start_date,'%d-%M-%Y') As start_date
								, DATE_FORMAT(F.end_date,'%d-%M-%Y') As end_date
								, F.target_achievement
								, IFNUlL((F.target_achievement / TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY))),'0') As monthly_target,
								, TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY)) As number_of_months" 
								, FALSE);
			$this->db->from('users A');
			$this->db->join('outlets B', 'A.id=B.ba_id', 'LEFT');
			$this->db->join('distributors C', 'B.distributor=C.id', 'LEFT');
			$this->db->join('channels D', 'B.channel_id=D.id', 'LEFT');
			$this->db->join('outlet_types E', 'B.outlet_type_id=E.id', 'LEFT');
			$this->db->join('sale_targets F', 'F.ba_id = A.id AND F.status=1 AND F.end_date > NOW()', 'LEFT');
			$this->db->where ('A.active', 1);
			if($dmsCode==0){
				$this->db->where('A.id', $Dtosale->getBaId());
			}else{
				$this->db->where('B.dms_code', $Dtosale->getDMSCode());
			}

			$query = $this->db->get ();
			return $query->row();
		}

		public function getSupervisorSaleTarget(Dtouser $user){
			$this->db->select ("
								IFNULL(SUM(F.target_achievement),0) AS target_achievement,
								IFNUlL(SUM((F.target_achievement / TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY)))),'0') As monthly_target"
								, FALSE);
			$this->db->from('users A');
			$this->db->join('sale_targets F', 'F.ba_id = A.id AND F.status=1 AND F.end_date > NOW()', 'LEFT');
			$this->db->where ('A.active', 1);
			$this->db->where('A.parent_id', $user->getId());
			$query = $this->db->get ();
			return $query->row();
		}

		public function getBAExecutiveSaleTarget(Dtouser $user){
			$this->db->select ("
								IFNULL(SUM(F.target_achievement),0) AS target_achievement,
								IFNUlL(SUM((F.target_achievement / TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY)))),'0') As monthly_target"
								, FALSE);
			$this->db->from('users A');
			$this->db->join('sale_targets F', 'F.ba_id = A.id AND F.status=1 AND F.end_date > NOW()', 'LEFT');
			$this->db->where ('A.active', 1);
			$this->db->where('A.parent_id IN (SELECT id FROM users where parent_id = '.$user->getId().')');
			$query = $this->db->get ();
			return $query->row();
		}

		public function getProjectHolderSaleTarget(Dtouser $user){
			$this->db->select ("
								IFNULL(SUM(F.target_achievement),0) AS target_achievement,
								IFNUlL(SUM((F.target_achievement / TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY)))),'0') As monthly_target"
								, FALSE);
			$this->db->from('users A');
			$this->db->join('sale_targets F', 'F.ba_id = A.id AND F.status=1 AND F.end_date > NOW()', 'LEFT');
			$this->db->where ('A.active', 1);
			$this->db->where('A.parent_id IN ((SELECT users.id 
									  FROM users
									  WHERE active = 1 AND users.parent_id IN (SELECT users.id 
												  		FROM users 
												  		INNER JOIN users_groups ON users.id = users_groups.user_id 
												  		WHERE users.active = 1 AND users_groups.group_id = 1)))') ;
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

		public function getSaleArchievement(Dtosale $Dtosale,$status=0){
			/*$this->db->select ("
							  (SELECT IFNULL(SUM(sale_items.price*sale_items.quantity),0) 
							  	FROM  sales 
							  	WHERE (sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-%m-%d') AND NOW() )
							  	) AS amount_daily,
							  (SELECT IFNULL(SUM(sale_items.price*sale_items.quantity),0) 
							  	FROM  sales 
							  	WHERE (sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )
							  	) AS amount_monthly,
				    		  (SELECT IFNULL(SUM(sale_items.price*sale_items.quantity),0) 
							  	FROM  sales 
							  	WHERE (sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-01-01') AND NOW() )
							  	) AS amount_yearly*
 							");*/
			$this->db->select("
								IFNULL(SUM(sale_items.price*sale_items.quantity),0) AS amount
				",FALSE);
			$this->db->from('sales');
			$this->db->join('sale_items', 'sales.id=sale_items.sale_id', 'LEFT');
			$this->db->where('sales.status', 1);
			$this->db->where('sales.ba_id', $Dtosale->getBaId());
			$this->db->where('sales.outlet_id', $Dtosale->getOutletId());
			if($status==0){
				$this->db->where("DATE(sales.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d')");
			}else if($status==1){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}else if($status==2){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}
			$query = $this->db->get ();
			return $query->row();	
		}

		public function getSaleOfSupervisorArchievement(Dtouser $Dtouser,$status=0){
			$this->db->select("
							IFNULL(SUM(sale_items.price*sale_items.quantity),0) AS amount
							",FALSE);
			$this->db->from('sales');
			$this->db->join('users', 'sales.ba_id = users.id AND users.active = 1', 'LEFT');
			$this->db->join('sale_items', 'sales.id=sale_items.sale_id', 'LEFT');
			$this->db->where('sales.status', 1);
			$this->db->where('users.parent_id', $Dtouser->getId());
			if($status==0){
				$this->db->where("DATE(sales.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d')");
			}else if($status==1){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}else if($status==2){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}
			$query = $this->db->get ();
			return $query->row();	
		}

		public function getSaleOfBAExecutiveArchievement(Dtouser $Dtouser,$status=0){
			$this->db->select("
							IFNULL(SUM(sale_items.price*sale_items.quantity),0) AS amount
							",FALSE);
			$this->db->from('sales');
			$this->db->join('users', 'sales.ba_id = users.id AND users.active = 1', 'LEFT');
			$this->db->join('sale_items', 'sales.id=sale_items.sale_id', 'LEFT');
			$this->db->where('sales.status', 1);
			$this->db->where('users.parent_id IN (SELECT id FROM users where parent_id = '.$Dtouser->getId().')');
			if($status==0){
				$this->db->where("DATE(sales.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d')");
			}else if($status==1){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}else if($status==2){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}
			$query = $this->db->get ();
			return $query->row();	
		}

		public function getSaleOfProjectHolderArchievement($status=0){
			$this->db->select("
							IFNULL(SUM(sale_items.price*sale_items.quantity),0) AS amount
							",FALSE);
			$this->db->from('sales');
			$this->db->join('users', 'sales.ba_id = users.id AND users.active = 1', 'LEFT');
			$this->db->join('sale_items', 'sales.id=sale_items.sale_id', 'LEFT');
			$this->db->where('sales.status', 1);
			$this->db->where('users.parent_id IN ((SELECT users.id 
												  FROM users
												  WHERE active = 1 AND users.parent_id IN (SELECT users.id 
												  		FROM users 
												  		INNER JOIN users_groups ON users.id = users_groups.user_id 
												  		WHERE users.active = 1 AND users_groups.group_id = 1)))') ;
			if($status==0){
				$this->db->where("DATE(sales.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d')");
			}else if($status==1){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}else if($status==2){
				$this->db->where("(sales.sale_date between  DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )");
			}
			$query = $this->db->get ();
			return $query->row();	
		}

		public function addNewsale(Dtosale $sale){
			$this->db->trans_begin();
			$data = array(
							"ba_id" => $sale->getBaId(),
							"sale_by" => $sale->getSaleBy(),
							"outlet_id" => $sale->getOutletId(),
							"status" => 1,
							"sale_date" => date('Y-m-d H:i:s')
					);
			$this->db->insert("sales",$data);
			$saleId = $this->db->insert_id();
			
			foreach($sale->getSaleItems() as $saleItem){
				$saleItem["sale_id"] = $saleId;
				$saleItem["status"] = 1;
				if($saleItem["promotion_id"]==""){
					$saleItem["promotion_id"] = NULL;
				}
				if($saleItem["promotion_type_id"]==""){
					$saleItem["promotion_type_id"] = NULL;
				}
				$saleItem["created_by"] = $sale->getSaleBy();
				$saleItem["created_date"] = date('Y-m-d H:i:s');
				$this->db->insert("sale_items",$saleItem);
			}
			if($this->db->trans_status()===FALSE){
				$this->db->trans_rollback();
				return FALSE;
			}else{
				
				$this->db->trans_commit();
				return TRUE;
			}
		}
	}
?>
