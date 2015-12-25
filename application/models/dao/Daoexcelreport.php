<?php
	class Daoexcelreport extends CI_Model{
		public function Daoexcelreport(){
			parent::__construct();
		}

		public function getOutletWithItems(){
			$this->db->query("SET @sql = NULL;");
			$this->db->query("
					SELECT
					  GROUP_CONCAT(DISTINCT
					    CONCAT(
								'SUM(CASE WHEN O.name = ''',
					      O.name,
					      ''' then SI.Quantity end) AS ''',
					      O.name,''''
					    )
					  ) INTO @sql
					FROM
					  outlets O 
					  LEFT JOIN sales S ON O.id=S.outlet_id 
					  LEFT JOIN sale_items SI ON S.id=SI.sale_id;");
			$this->db->query("
					SET @sql = CONCAT('
					SELECT P.Name product_name,
					', @sql, '
					FROM products P LEFT JOIN sale_items SI ON P.id=SI.product_id 
					INNER JOIN sales S ON S.id=SI.sale_id 
					INNER JOIN outlets O ON S.outlet_id=O.id 
					GROUP BY product_name');");
			$query = $this->db->query("PREPARE stmt FROM @sql;EXECUTE stmt;DEALLOCATE PREPARE stmt;");
			return $query->result_array();
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
				SELECT @no := @no+1 AS No, O.Name outlet_name
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
	}
?>
