<?php 
	class DaoRate extends CI_Model{
		
		public function DaoRate(){
			parent::__construct();
			$this->load->model('dto/DtoRate');
		}

		public function checkRate($id){
			$result = $this->db->query('SELECT (SUM(ratenum)/COUNT(rateid)) AS totalrate FROM RATES WHERE productid = '.$id.';')->result_array();
			$totalrate = 0;
			foreach($result as $r){
				$totalrate = $r['totalrate'];
			}
			return round(intval($totalrate));
		}

		public function rate(DtoRate $rate){
			$this->db->select('rateid');
			$this->db->where('ipaddress', $rate->getIpaddress());
			$this->db->where('productid', $rate->getProductid());
			$record = $this->db->get('RATES');
			print_r($record->result());
			if($record->result() == null){
				$data = array('ratenum'		=>	$rate->getRatenumber(),
							  'ipaddress'	=>	$rate->getIpaddress(),
							  'productid'	=>	$rate->getProductid()
				);
				echo 1;
				return $this->db->insert('RATES', $data);
			}else{
				$data = array('ratenum'		=>	$rate->getRatenumber(),
							  'ipaddress'	=>	$rate->getIpaddress(),
							  'productid'	=>	$rate->getProductid()
				);
				$this->db->where('ipaddress', $rate->getIpaddress());
				$this->db->where('productid', $rate->getProductid());
				echo 2;
				return $this->db->update('RATES', $data);
			}
		}
	}
