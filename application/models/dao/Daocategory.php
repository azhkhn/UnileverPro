<?php

class Daocategory extends CI_Model{

	public function Daocategory(){
		parent::__construct();
		$this->load->model("dto/Dtocategory");
	}

	public function addCategory(Dtocategory $cat){
		$this->db->trans_begin();
		$category = array(
						"ordering" => $cat->getOrdering(),
						"subof" 	=> ($cat->getSubof()=="") ? null : $cat->getSubof()
					);

		$this->db->insert("CATEGORIES",$category);
		$catID = $this->db->insert_id();
		
		foreach($cat->getCategorydetail() as $cats){
			$cats["categoryid"] = $catID;
			$this->db->insert("CATEGORYDETAIL",$cats);
		}
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	public function showcategories(){
		
		$this->db->select('c.categoryid , c.title');
			$this->db->from('CATEGORYDETAIL c');
			$this->db->where('c.languageid',lang('lang_id'));
			$this->db->order_by('c.categoryid', 'desc');
			$query = $this->db->get();
			return $query->result();
	}

	public function listcategories(){
		$this->db->select('d.categoryid, d.title, c.ordering, c.subof');
		$this->db->from('CATEGORYDETAIL d');
		$this->db->join('CATEGORIES c', 'd.categoryid = c.categoryid');
		$this->db->where('d.languageid',lang('lang_id'));
		$this->db->order_by('d.categoryid', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function deletecategory(Dtocategory $c){
		$this->db->where('categoryid', $c->getCategoryid());
		$this->db->delete('CATEGORYDETAIL');
		
		$this->db->where('categoryid', $c->getCategoryid());
		$this->db->delete('CATEGORIES');

		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}

	}


	public function getcategory($id){
		$this->db->select('d.categoryid, d.title, d.languageid,d.description, c.ordering, c.subof');
		$this->db->from('CATEGORYDETAIL d');
		$this->db->join('CATEGORIES c', 'd.categoryid = c.categoryid');
		$this->db->where('d.categoryid', $id);
		$this->db->where('d.languageid',lang('lang_id'));
		$query = $this->db->get();
		return $query->result();
	}

	public function getcategoryupdate($id){
		$this->db->select('d.categoryid, d.title, d.languageid,d.description, c.ordering, c.subof');
		$this->db->from('CATEGORYDETAIL d');
		$this->db->join('CATEGORIES c', 'd.categoryid = c.categoryid');
		$this->db->where('d.categoryid', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function updatecategory(Dtocategory $cat){
		$this->db->trans_begin();
		$category = array(
						"ordering" => $cat->getOrdering(),
						"subof" 	=> ($cat->getSubof()=="") ? null : $cat->getSubof()
					);
		$this->db->where('categoryid', $cat->getCategoryid());
		$this->db->update("CATEGORIES",$category);
		$catID = $cat->getCategoryid();
		
		foreach($cat->getCategorydetail() as $cats){
		
			$this->db->where('categoryid', $catID);
			$this->db->where('languageid', $cats['languageid']);
			$this->db->update("CATEGORYDETAIL",$cats);
		}
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	
	public function lstCategory($langid){
		$this->db->select('c.categoryid , c.title');
		$this->db->from('CATEGORYDETAIL c');
		$this->db->where('c.languageid',$langid);
		$this->db->order_by('c.categoryid', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function countCategories(){
		return $this->db->count_all('CATEGORIES');
	}
	
}

?>