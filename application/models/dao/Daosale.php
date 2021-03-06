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
								, SUM(F.target_achievement) AS target_achievement
								, IFNUlL(SUM(F.target_achievement),'0') As monthly_target,
								, IFNULL(SUM(F.target_achievement/26),'0') AS today_target
								, TIMESTAMPDIFF(MONTH, F.start_date, DATE_ADD(F.end_date, INTERVAL 1 DAY)) As number_of_months" 
								, FALSE);
			$this->db->from('users A');
			$this->db->join('outlets B', 'A.id=B.ba_id', 'LEFT');
			$this->db->join('distributors C', 'B.distributor=C.id', 'LEFT');
			$this->db->join('channels D', 'B.channel_id=D.id', 'LEFT');
			$this->db->join('outlet_types E', 'B.outlet_type_id=E.id', 'LEFT');
			$this->db->join('sale_targets F', "F.ba_id = A.id AND F.status=1 
										   AND F.end_date >= '". $Dtosale->getStartDate() . "' 
										   AND F.start_date <= '". $Dtosale->getEndDate() ."' ", 'LEFT');
			$this->db->where('A.active', 1);
			$this->db->group_by('A.id');
			if($dmsCode==0){
				$this->db->where('A.id', $Dtosale->getBaId());
			}else{
				$this->db->where('B.dms_code', $Dtosale->getDMSCode());
			}
			if($this->ion_auth->in_group('SUPERVISOR')){
				$this->db->where('A.parent_id', $this->ion_auth->get_user_id());
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

		public function getAllsales(Dtosale $Dtosale, $limit=15){
			$this->db->select ("sales.id
							  , sale_items.product_id
							  , products.code 
							  , products.name As product_name
							  , sale_items.quantity
							  , sale_items.price
							  , (sale_items.price*sale_items.quantity) AS amount
							  , sale_items.promotion_id
							  , CONCAT('BUY ', product_promotion.buy, ' FREE ', product_promotion.free) AS promotion_name
							  , DATE_FORMAT(sales.sale_date,'%H:%i:%s') As sale_time
 							", FALSE);
			$this->db->from('sales');
			$this->db->join('sale_items', 'sales.id=sale_items.sale_id', 'LEFT');
			$this->db->join('products', 'sale_items.product_id=products.id', 'LEFT');
			$this->db->join('users', 'sales.ba_id = users.id', 'LEFT');
			$this->db->join("product_promotion", "sale_items.promotion_id=product_promotion.id", "LEFT");
			$this->db->join('promotion_types', 'product_promotion.promotion_id=promotion_types.id',"LEFT");
			$this->db->where('sales.status', 1);
			$this->db->where('sale_items.status', 1);
			$this->db->where('sales.ba_id', $Dtosale->getBaId());
			$this->db->where('sales.outlet_id', $Dtosale->getOutletId());
			$this->db->where("DATE(sales.sale_date)='".$Dtosale->getSaleDate()."'");
			$this->db->order_by ("sales.sale_date",'DESC');
			$offset = $this->uri->segment(3);
			$this->db->limit($limit, $offset);
			$query = $this->db->get ();
			return $query->result ();	
			//$this->db->join('sale_promotions', 'sale_items.promotion_id=sale_promotions.id', "LEFT");
		}

		public function count(Dtosale $Dtosale){
			$this->db->from('sales');
			$this->db->join('sale_items', 'sales.id = sale_items.sale_id');
			$this->db->where('sale_items.status', 1);
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
			$this->db->join('users A', 'A.id = sales.ba_id','LEFT');
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
			if($this->ion_auth->in_group('SUPERVISOR')){
				$this->db->where('A.parent_id', $this->ion_auth->get_user_id());
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
												  		WHER Eusers.active = 1 AND users_groups.group_id = 1)))') ;
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
							"sale_date" => $sale->getSaleDate()
					);
			$this->db->insert("sales",$data);
			$saleId = $this->db->insert_id();
			
			foreach($sale->getSaleItems() as $saleItem){
				$item["sale_id"] = $saleId;
				$item["product_id"] = $saleItem["product_id"];
				$item["promotion_id"] = NULL;
				$item["promotion_type_id"] = NULL;
				$item["quantity"] = $saleItem["quantity"];
				$item["price"] = $saleItem["price"];
				$item["created_by"] = $sale->getSaleBy();
				$item["created_date"] = date('Y-m-d H:i:s');
				$item["status"] = 1;
				//$saleItem["sale_id"] = $saleId;
				//$saleItem["status"] = 1;
				if(!isset($saleItem["promotion"])){
					$item["promotion_id"] = NULL;
				}else{
					$item["promotion_id"] = $saleItem["promotion"];
					if($item["promotion_id"]==""){
						$item["promotion_id"] = NULL;	
					}
				}
				if($saleItem["promotion_type_id"]==""){
					$item["promotion_type_id"] = NULL;
				}else{
					$item["promotion_type_id"] = $saleItem["promotion_type_id"];
					if($item["promotion_type_id"]==""){
						$item["promotion_type_id"] = NULL;	
					}
				}
				/*$saleItem["created_by"] = $sale->getSaleBy();
				$saleItem["created_date"] = date('Y-m-d H:i:s');*/
				$this->db->insert("sale_items",$item);
			}
			if($this->db->trans_status()===FALSE){
				$this->db->trans_rollback();
				return FALSE;
			}else{
				$this->db->trans_commit();
				return TRUE;
			}
		}

		public function getBAReport(Dtosale $sale){
			$where = '';
			if($sale->getDMSCode()){
				$where = "O.dms_code = '".$sale->getDMSCode()."'";
			}else{
				$where = "U.id=".$sale->getBaId();
				if($sale->getOutletId()){
					$where = " O.id = ".$sale->getOutletId()."";
				}
			}
			$query = $this->db->query("
				SELECT U.id
					 , U.photo
					 , CONCAT(U.last_name,' ', U.first_name) username
					 , CONCAT(U1.last_name,' ', U1.first_name) supervisor
					 , CONCAT(U2.last_name,' ', U2.first_name) executive
					 , O.address outlet_address
					 , O.name outlet_name
					 , O.dms_code
					 , O.id outlet_id
					 , D.name distributor
					 , C.name channel
					 , OT.name customer_type
					 , FORMAT(COALESCE(S1.sumachievement,0),4) sumachievement
					 , FORMAT(COALESCE(S1.sumtarget,0),4) sumtarget
					 , FORMAT(COALESCE(S1.sumtodaytarget,0),4) sumtodaytarget
					 , FORMAT(COALESCE(S.dayachievement,0),4) today_achievement
					 , FORMAT(COALESCE(S.monthachievement,0),4) month_achievement 
					 , FORMAT(COALESCE(S.yearachievement,0),4) year_achievement
					 , FORMAT(COALESCE((S.dayachievement / S1.sumtodaytarget) * 100 ,0),4) AS today_achievement_percent
					 , FORMAT(COALESCE((S.monthachievement / S1.sumtarget) * 100 ,0),4) AS month_achievement_percent 
					 , FORMAT(COALESCE((S.yearachievement / S.yeartarget ) * 100 ,0),4) AS year_achievement_percent
					 , FORMAT(COALESCE(S.yeartarget,0),4) yeartarget
				FROM users U 
				LEFT JOIN users U1 ON U.parent_id=U1.id 
				LEFT JOIN users U2 ON U1.parent_id=U2.id
 				LEFT JOIN outlets O ON U.id=O.ba_id
 				LEFT JOIN outlet_types OT ON OT.id = O.outlet_type_id
 				LEFT JOIN distributors D ON O.distributor=D.id 
 				LEFT JOIN channels C ON C.id=O.channel_id
   				LEFT JOIN 
  				(
    				SELECT _ST.ba_id, SUM(_SI.quantity*_SI.price) sumachievement, sumtarget, sumtodaytarget
    				FROM sales _S 
    				RIGHT JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1 AND (DATE(_S.sale_date) BETWEEN '".$sale->getStartDate()."' AND '".$sale->getEndDate()."')
					RIGHT JOIN (
        				SELECT ba_id, SUM(target_achievement) sumtarget , SUM(target_achievement/26) AS sumtodaytarget 
        				FROM sale_targets 
						WHERE (DATE(end_date)>='".$sale->getStartDate()."' AND DATE(start_date)<= '".$sale->getEndDate()."') 
						GROUP BY ba_id
      				) _ST ON _S.ba_id=_ST.ba_id
    				GROUP BY _ST.ba_id
  				) S1 ON U.id=S1.ba_id
  				LEFT JOIN 
  				(
    				SELECT YS.ba_id, yearachievement, monthachievement, dayachievement, yeartarget
    				FROM(
      					SELECT _S.ba_id, SUM(_SI.quantity*_SI.price) yearachievement
      					FROM sales _S 
      					INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1 
      					WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') 
      					GROUP BY _S.ba_id
    				) YS
    				LEFT JOIN(
      					SELECT _S.ba_id, SUM(_SI.quantity*_SI.price) monthachievement
      					FROM sales _S 
      					INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
      					WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00')
      					GROUP BY _S.ba_id
    				) MS ON YS.ba_id=MS.ba_id
    				LEFT JOIN(
      					SELECT _S.ba_id, SUM(_SI.quantity*_SI.price) dayachievement
      					FROM sales _S 
      					INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1 
      					WHERE (DATE(_S.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d'))
      					GROUP BY _S.ba_id
    				) DS ON YS.ba_id=DS.ba_id
    				LEFT JOIN (
        				SELECT ba_id, SUM(target_achievement) yeartarget 
        				FROM sale_targets 
        				WHERE (YEAR(end_date)>=YEAR('".$sale->getStartDate()."') AND YEAR(start_date)<= YEAR('".$sale->getEndDate()."'))
        				GROUP BY ba_id
    				) _ST ON YS.ba_id=_ST.ba_id
  				) S ON U.id=S.ba_id
			WHERE ".$where."
			GROUP BY U.id");
			return $query->row();
		}

		public function getSupervisorReport(Dtosale $sale){
			$query = $this->db->query("
				SELECT U1. id
					 , U1.photo
					 , CONCAT(U1.last_name , ' ', U1.first_name) AS supervisor
					 , CONCAT(U2.last_name , ' ', U2.first_name) AS executive
					 , FORMAT(COALESCE(sumachievement,0),4) AS sumachievement
					 , FORMAT(COALESCE(sumtodaytarget,0),4) AS sumtodaytarget
					 , FORMAT(COALESCE(sumtarget,0),4) AS sumtarget
					 , FORMAT(COALESCE(today_achievement,0),4) AS today_achievement
					 , FORMAT(COALESCE(month_achievement,0),4) AS month_achievement
					 , FORMAT(COALESCE(year_achievement,0),4) AS year_achievement
					 , FORMAT(COALESCE((S.today_achievement / ST.sumtodaytarget) * 100,0),4) AS today_achievement_percent
					 , FORMAT(COALESCE((S.month_achievement/ ST.sumtarget) * 100,0),4) AS month_achievement_percent
					 , FORMAT(COALESCE((S.year_achievement / yeartarget ) * 100,0),4) AS year_achievement_percent
					 , FORMAT(COALESCE(yeartarget,0),4) AS yeartarget
				FROM
					 users U1 LEFT JOIN users U2 ON U1.parent_id=U2.id
					   LEFT JOIN 
					  (
					    SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) sumachievement
					    FROM sales _S 
					    INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1 
						LEFT JOIN users _U ON _U.id=_S.ba_id
					    WHERE (DATE(_S.sale_date) BETWEEN '".$sale->getStartDate()."' AND '".$sale->getEndDate()."')
					    GROUP BY _U.parent_id
					  ) S1 ON U1.id=S1.parent_id
						LEFT JOIN (
							SELECT _U.parent_id, SUM(target_achievement) sumtarget , SUM(target_achievement/26) AS sumtodaytarget
					    	FROM sale_targets _ST
							LEFT JOIN users _U ON _U.id=_ST.ba_id
							WHERE (DATE(end_date)>='".$sale->getStartDate()."' AND DATE(start_date)<= '".$sale->getEndDate()."') 
							GROUP BY parent_id
					  ) ST ON U1.id=ST.parent_id
					  LEFT JOIN 
					  (
					    SELECT YS.parent_id, yearachievement AS year_achievement, monthachievement As month_achievement, dayachievement AS today_achievement, yeartarget
					    FROM(
					      SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) yearachievement
					      FROM sales _S 
					      INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
						  LEFT JOIN users _U ON _U.id=_S.ba_id
					      WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') 
					      GROUP BY _U.parent_id
					    ) YS
					    LEFT JOIN(
					      SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) monthachievement
					      FROM sales _S 
					      INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
						  LEFT JOIN users _U ON _U.id=_S.ba_id
					      WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') 
					      GROUP BY _U.parent_id
					    ) MS ON YS.parent_id=MS.parent_id
					    LEFT JOIN(
					      SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) dayachievement
					      FROM sales _S 
					      INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
						  LEFT JOIN users _U ON _U.id=_S.ba_id
					      WHERE (DATE(_S.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d'))
					      GROUP BY _U.parent_id
					    ) DS ON YS.parent_id=DS.parent_id
					    LEFT JOIN (
					        SELECT _U.parent_id, SUM(target_achievement) yeartarget 
					        FROM sale_targets _S
						LEFT JOIN users _U ON _U.id=_S.ba_id
						WHERE (YEAR(end_date)>=YEAR('".$sale->getStartDate()."') AND YEAR(start_date)<= YEAR('".$sale->getEndDate()."'))
						GROUP BY _U.parent_id
					    ) _ST ON YS.parent_id=_ST.parent_id
					  ) S ON U1.id=S.parent_id
					WHERE U2.parent_id IS NULL
					AND U1.id=".$sale->getBaId()."
					GROUP BY U1.id");
			return $query->row();
		}

		public function getBAExecutiveReport(Dtosale $sale){
			$query = $this->db->query("
				SELECT id
					 , photo
					 , executive
					 , FORMAT(SUM(sumachievement),4) sumachievement
					 , FORMAT(SUM(sumtodaytarget),4) sumtodaytarget
					 , FORMAT(SUM(sumtodaytarget),4) sumtodaytarget
					 , FORMAT(SUM(sumtarget),4) sumtarget
					 , FORMAT(SUM(today_achievement),4) today_achievement
					 , FORMAT(SUM(month_achievement),4) month_achievement
					 , FORMAT(SUM(year_achievement),4) year_achievement
					 , FORMAT(SUM(today_achievement_percent),4) today_achievement_percent
					 , FORMAT(SUM(month_achievement_percent),4) month_achievement_percent
					 , FORMAT(SUM(year_achievement_percent),4) year_achievement_percent
					 , FORMAT(SUM(yeartarget),4) yeartarget
				FROM(
					SELECT U2. id
					 , U2.photo
					 , CONCAT(U2.last_name , ' ', U2.first_name) AS executive
					 , COALESCE(sumachievement,0) AS sumachievement
					 , COALESCE(sumtodaytarget,0) AS sumtodaytarget
					 , COALESCE(sumtarget,0) AS sumtarget
					 , COALESCE(today_achievement,0) AS today_achievement
					 , COALESCE(month_achievement,0) AS month_achievement
					 , COALESCE(year_achievement,0) AS year_achievement
					 , COALESCE((S.today_achievement / ST.sumtodaytarget) * 100,0) AS today_achievement_percent
					 , COALESCE((S.month_achievement/ ST.sumtarget) * 100,0) AS month_achievement_percent
					 , COALESCE((S.year_achievement / yeartarget ) * 100,0) AS year_achievement_percent
					 , COALESCE(yeartarget,0) AS yeartarget
					FROM
						 users U1 LEFT JOIN users U2 ON U1.parent_id=U2.id
						  LEFT JOIN 
						  (
						    SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) sumachievement
						    FROM sales _S 
						    INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
							LEFT JOIN users _U ON _U.id=_S.ba_id
						    WHERE (DATE(_S.sale_date) BETWEEN '".$sale->getStartDate()."' AND '".$sale->getEndDate()."')
						    GROUP BY _U.parent_id
						  ) S1 ON U1.id=S1.parent_id
							LEFT JOIN (
								SELECT _U.parent_id, SUM(target_achievement) sumtarget , SUM(target_achievement/26) AS sumtodaytarget
						    	FROM sale_targets _ST
								LEFT JOIN users _U ON _U.id=_ST.ba_id
								WHERE (DATE(end_date)>='".$sale->getStartDate()."' AND DATE(start_date)<= '".$sale->getEndDate()."') 
								GROUP BY parent_id
						  ) ST ON U1.id=ST.parent_id
						  LEFT JOIN 
						  (
						    SELECT YS.parent_id, yearachievement AS year_achievement
						    	 , monthachievement As month_achievement
						    	 , dayachievement AS today_achievement
						    	 , yeartarget
						    FROM(
						      SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) yearachievement
						      FROM sales _S 
						      INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
							  LEFT JOIN users _U ON _U.id=_S.ba_id
						      WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') 
						      GROUP BY _U.parent_id
						    ) YS
						    LEFT JOIN(
						      SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) monthachievement
						      FROM sales _S 
						      INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
						  	  LEFT JOIN users _U ON _U.id=_S.ba_id
						      WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') 
						      GROUP BY _U.parent_id
						    ) MS ON YS.parent_id=MS.parent_id
						    LEFT JOIN(
						      SELECT _U.parent_id, SUM(_SI.quantity*_SI.price) dayachievement
						      FROM sales _S 
						      INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
							  LEFT JOIN users _U ON _U.id=_S.ba_id
						      WHERE (DATE(_S.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d'))
						      GROUP BY _U.parent_id
						    ) DS ON YS.parent_id=DS.parent_id
						    LEFT JOIN (
						        SELECT _U.parent_id, SUM(target_achievement) yeartarget 
						        FROM sale_targets _S
								LEFT JOIN users _U ON _U.id=_S.ba_id
								WHERE (YEAR(end_date)>=YEAR('".$sale->getStartDate()."') AND YEAR(start_date)<= YEAR('".$sale->getEndDate()."'))
								GROUP BY _U.parent_id
						    ) _ST ON YS.parent_id=_ST.parent_id
						  ) S ON U1.id=S.parent_id
						WHERE U2.parent_id IS NULL
						AND U2.id = ".$sale->getBaId()."
						) V
					GROUP BY V.id");
			return $query->row();
		}

		public function getProjectHolderReport(Dtosale $sale){
			$query = $this->db->query("
					SELECT *
						, COALESCE(((A.dayachievement / A.todaytarget) * 100),0) dayachievement_percent 
						, COALESCE(((A.monthachievement / A.sumtarget) * 100),0) monthachievement_percent 
						, COALESCE(((A.yearachievement / A.yeartarget) * 100),0) yearachievement_percent 
					FROM (SELECT 
						users.id id,
						CONCAT(users.last_name, ' ', users.first_name) username,
						(SELECT  COALESCE(SUM(target_achievement),0)
						 FROM sale_targets
						WHERE (DATE(end_date)>='".$sale->getStartDate()."' AND DATE(start_date)<= '".$sale->getEndDate()."') AND status = 1
						) sumtarget,
						(	SELECT COALESCE(SUM(target_achievement/26),0)
							FROM users
							LEFT JOIN sale_targets ON users.id = sale_targets.ba_id
							WHERE (DATE(end_date)>='".$sale->getStartDate()."' AND DATE(start_date)<= '".$sale->getEndDate()."') AND status = 1
						) todaytarget,
						(	SELECT COALESCE(SUM(target_achievement),0)
							FROM users
							LEFT JOIN sale_targets ON users.id = sale_targets.ba_id
							WHERE (DATE(end_date)>='".$sale->getStartDate()."' AND DATE(start_date)<= '".$sale->getEndDate()."') AND status = 1
						) yeartarget,
						(SELECT  COALESCE(SUM(_SI.quantity*_SI.price),0)
					        FROM sales _S 
					        INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
							LEFT JOIN users _U ON _U.id=_S.ba_id
							WHERE (DATE(_S.sale_date)=DATE_FORMAT(CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),'%Y-%m-%d'))
						)  dayachievement,
						(SELECT  COALESCE(SUM(_SI.quantity*_SI.price),0)
					        FROM sales _S 
					        INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
							LEFT JOIN users _U ON _U.id=_S.ba_id
					       WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-%m-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') 
						)  monthachievement,
						( 	SELECT SUM(_SI.quantity*_SI.price)
						 	FROM sales _S 
						 	INNER JOIN sale_items _SI ON _S.id=_SI.sale_id AND _SI.status = 1
						 	LEFT JOIN users _U ON _U.id=_S.ba_id
					  	 	WHERE _S.sale_date between DATE_FORMAT(NOW() ,'%Y-01-01') AND CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') )  yearachievement
					FROM users
					LEFT JOIN users_groups ON users.id = users_groups.user_id
					WHERE users_groups.group_id = 4
					) A");
			return $query->row();
		}

		public function addProductsSale($model){
			$this->db->trans_begin();
			$data = array(
							"ba_id" => $sale->getBaId(),
							"sale_by" => $sale->getSaleBy(),
							"outlet_id" => $sale->getOutletId(),
							"status" => 1,
							"sale_date" => $sale->getSaleDate()
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
		
		public function deleteSale($saleId, $productId){
			$this->db->set('updated_date', date('Y-m-d H:i:s'));
			$this->db->set('updated_by', $this->ion_auth->get_user_id());
			$this->db->set('status', 0);
			$this->db->where('sale_id', $saleId);
			$this->db->where('product_id', $productId);
			return $this->db->update('sale_items');
		}
		
		public function check($productId, $quantity){
			$query = $this->db->query("
					SELECT * 
					FROM product_promotion
					WHERE product_id = ".$productId."
					AND buy <= ".$quantity."
					AND start_date<=NOW() 
					AND end_date>=NOW()
					AND status = 1;");
			return $query->row();
			$this->db->from("product_promotion");
			$this->db->where("product_id",$productId);
			$this->db->where("start_date");
			return $query->row();
		}
		
		public function updateSale($saleId, $productId, $quantity, $promotionId){
			if($promotionId==""){
				$promotionId = NULL;
			}
			$this->db->set('promotion_id', $promotionId);
			$this->db->set("quantity", $quantity);
			$this->db->set('updated_date', date('Y-m-d H:i:s'));
			$this->db->set('updated_by', $this->ion_auth->get_user_id());
			$this->db->where('sale_id', $saleId);
			$this->db->where('product_id', $productId);
			return $this->db->update('sale_items');
		}
	}
?>