<?php
	class Daoexcelreport extends CI_Model{
		public function Daoexcelreport(){
			parent::__construct();
		}

		public function getOutletWithItems(){
			$this->db->query("SET @sql = NULL;");
			$this->db->query("
					(SELECT
					  GROUP_CONCAT(DISTINCT
					    CONCAT(
								'SUM(CASE WHEN O.name = ''',
					      O.name,
					      ''' then SI.Quantity end) AS ''',
					      O.name,''''
					   
					  ) INTO @sql
					FROM
					  OUTLETS O LEFT JOIN SALES S ON O.id=S.outlet_id LEFT JOIN SALE_ITEMS SI ON S.id=SI.sale_id;


					SET @sql = CONCAT('
					SELECT P.Name PRODUCT_NAME,
					', @sql, '
					FROM PRODUCTS P LEFT JOIN SALE_ITEMS SI ON P.id=SI.product_id 
					INNER JOIN SALES S ON S.id=SI.sale_id 
					INNER JOIN OUTLETS O ON S.outlet_id=O.id 
					GROUP BY PRODUCT_NAME
					')");
			$query = $this->db->query("
					PREPARE stmt FROM @sql;
					EXECUTE stmt;
					DEALLOCATE PREPARE stmt");
			return $query->result();
		}
	}
?>
