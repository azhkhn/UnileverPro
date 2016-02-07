<?php
	class Daoexcelreport extends CI_Model{
		public function Daoexcelreport(){
			parent::__construct();
		}

		public function getOutletWithItems($year, $option=1){
			$query = $this->db->query("CALL ITEM_TO_OUTLET(?)", $year);
       		if($option==1){
				$result =  $query->result_array();
			}else{
				$result =  $query->result();
			}
			$query->next_result(); // Dump the extra resultset.
       		$query->free_result(); // Does what it says.

       		return $result;
			
		}

		public function getoutletsaleAmountPerYear($year, $option=1){
			$this->db->query("SET @no=0;");
			$query = $this->db->query("
				SELECT @no := @no+1 AS No
					 , O.name outlet_name
					 , P.name product_name
  					 , SUM(IF(month(S.sale_date)=1, SI.quantity*SI.price, 0)) jan_total
  					 , SUM(IF(month(S.sale_date)=2, SI.quantity*SI.price, 0)) feb_total
  					 , SUM(IF(month(S.sale_date)=3, SI.quantity*SI.price, 0)) mar_total
  					 , SUM(IF(month(S.sale_date)=4, SI.quantity*SI.price, 0)) apr_total
  					 , SUM(IF(month(S.sale_date)=5, SI.quantity*SI.price, 0)) may_total
  					 , SUM(IF(month(S.sale_date)=6, SI.quantity*SI.price, 0)) jun_total
  					 , SUM(IF(month(S.sale_date)=7, SI.quantity*SI.price, 0)) jul_total
  					 , SUM(IF(month(S.sale_date)=8, SI.quantity*SI.price, 0)) aug_total
  					 , SUM(IF(month(S.sale_date)=9, SI.quantity*SI.price, 0)) sep_total
  					 , SUM(IF(month(S.sale_date)=10, SI.quantity*SI.price, 0)) oct_total
  					 , SUM(IF(month(S.sale_date)=11, SI.quantity*SI.price, 0)) nov_total
  					 , SUM(IF(month(S.sale_date)=12, SI.quantity*SI.price, 0)) dec_total
				FROM outlets O LEFT JOIN sales S ON O.id=S.outlet_id 
				LEFT JOIN sale_items SI ON S.id=SI.sale_id
				LEFT JOIN products P ON SI.product_id=P.id
				WHERE YEAR(S.sale_date)=".$year."
				GROUP BY outlet_name, SI.product_id");
			if($option==1){
				return $query->result_array();
			}else{
				return $query->result();
			}
		}

		public function getoutletsaleQtyAmountPerYear($year, $option=1){
			$this->db->query("SET @no=0;");
			$query = $this->db->query("
				SELECT @no := @no+1 AS No
						  , O.Name outlet_name
						  , P.name product_name
						  , SUM(IF(month(S.sale_date)=1, SI.quantity, 0)) jan_total
						  , SUM(IF(month(S.sale_date)=2, SI.quantity, 0)) feb_total
						  , SUM(IF(month(S.sale_date)=3, SI.quantity, 0)) mar_total
						  , SUM(IF(month(S.sale_date)=4, SI.quantity, 0)) apr_total
						  , SUM(IF(month(S.sale_date)=5, SI.quantity, 0)) may_total
						  , SUM(IF(month(S.sale_date)=6, SI.quantity, 0)) jun_total
						  , SUM(IF(month(S.sale_date)=7, SI.quantity, 0)) jul_total
						  , SUM(IF(month(S.sale_date)=8, SI.quantity, 0)) aug_total
						  , SUM(IF(month(S.sale_date)=9, SI.quantity, 0)) sep_total
						  , SUM(IF(month(S.sale_date)=10, SI.quantity, 0)) oct_total
						  , SUM(IF(month(S.sale_date)=11, SI.quantity, 0)) nov_total
						  , SUM(IF(month(S.sale_date)=12, SI.quantity, 0)) dec_total
					FROM outlets O LEFT JOIN sales S ON O.id=S.outlet_id 
					LEFT JOIN sale_items SI ON S.id=SI.sale_id
					LEFT JOIN products P ON SI.product_id=P.id
					WHERE YEAR(S.sale_date)=".$year."
					GROUP BY outlet_name, SI.product_id
				");
			if($option==1){
				return $query->result_array();
			}else{
				return $query->result();
			}
		}

		public function getAllProductsSalesByOutlets($data, $option=1){
			$str = "";
			foreach($data["duration"] as $duration){
				$str .= ", COALESCE(fnGetTotalQuantity('".$duration["date"]."',sales.outlet_id,products.id),0) AS ". strtoupper($duration["name"]);
				$str .= ", COALESCE(fnGetTotalAmount('".$duration["date"]."',sales.outlet_id,products.id),0) AS ". strtoupper($duration["name"]."_AMOUNT");
			}
			$this->db->query("SET @no=0;");
			$query = $this->db->query("
				SELECT @no := @no+1 AS No
					  /*, id*/
					  , code
					  , name
					  , size
					  , unit
					  , price
					  , TARGET
					  , MONDAY
					  , TUESDAY
					  , WEDNESDAY
					  , THURSDAY
					  , FRIDAY
					  , SATURDAY
					  , SUNDAY
					  , (MONDAY_AMOUNT + TUESDAY_AMOUNT + WEDNESDAY_AMOUNT + THURSDAY_AMOUNT + FRIDAY_AMOUNT + SATURDAY_AMOUNT + SUNDAY_AMOUNT) AS TOTAL_AMT  
					  , (MONDAY + TUESDAY + WEDNESDAY + THURSDAY + FRIDAY + SATURDAY + SUNDAY) AS TOTAL_QTY
					  , 0 ACH_PERCENT
				FROM (SELECT products.id
						   , products.`code`
						   , products.`name`
						   , products.size
						   , products.unit
						   , products.price
						   , 0 AS TARGET
						   ". $str ."
					  FROM products
					  LEFT JOIN sale_items ON products.id = sale_items.product_id
					  LEFT JOIN sales ON sales.id = sale_items.sale_id AND sales.outlet_id =". $data["outlet_id"] ."
					  GROUP BY 1,2,3,4,5) AS A");
			if($option==1){
				return $query->result_array();
			}else{
				return $query->result();
			}
		}

		public function getAllOutlets(){
			$this->db->select('id, dms_code, distributor, channel_id, outlet_type_id, name, address, ba_id, created_date, created_by, updated_date, updated_by, status, deleted_at');
			$this->db->from('outlets');
			$this->db->order_by("id", "desc");
			$this->db->where("status", 1);
			$query = $this->db->get();
			return $query->result();
		}
	}
?>
