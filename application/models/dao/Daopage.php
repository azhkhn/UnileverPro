<?php

class DaoPage extends CI_Model{
	
	public function DaoPage(){
		parent::__construct();
	}
		
	public function addPage(DtoPage $pages){
		$this->load->model("dto/Dtopage");
		$this->db->trans_begin();
		$page = array(
				'userid'             =>     $pages->getUserid(),
				'seotitle'           =>    	$pages->getSeotitle(),
				//'seodescription'     =>	   	str_replace(array("\r", "\n"), " ", $pages->getSeodescription())
				'seodescription'     =>	   	$pages->getSeodescription()
				);
		$this->db->insert('PAGES',$page);
		$pageid = $this->db->insert_id();

		foreach ($pages->getPagedetail() as $page) {
			$page["pageid"] = $pageid;
			$this->db->insert("PAGEDETAIL", $page);
		}
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	
	public function listPage(){
		$this->db->select('p.pageid , pd1.title , u.userid , u.username');
		$this->db->from('PAGES p');
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->join('PAGEDETAIL pd1', 'p.pageid = pd1.pageid');
		$this->db->where('pd1.languageid', 2);
		$this->db->order_by("pageid", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getPage($id){
		$this->db->select('p.pageid, p.seotitle, p.seodescription, pd.title, pd.description');
		$this->db->from('PAGES p');
		$this->db->join('PAGEDETAIL pd','p.pageid = pd.pageid');
		$this->db->where('p.pageid',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getPageByName($pageName){
		$sql = "SELECT A.pageid, A.userid, A.seotitle, A.seodescription, B.title, B.description, C.username
				FROM PAGES A
				JOIN PAGEDETAIL B ON A.pageid=B.pageid
				JOIN USERS C ON A.userid=C.userid
				WHERE B.languageid = ?
				AND A.pageid = (SELECT pageid FROM PAGEDETAIL WHERE replace(LOWER(title),' ','_') = ? LIMIT 1)
				LIMIT 1"; 
		$query = $this->db->query($sql, array(lang('lang_id'), str_replace(" ","_",strtolower($pageName))));
		return $query->row();
	}

	public function getPageById($pageid){
		$sql = "SELECT A.pageid, A.userid, A.seotitle, A.seodescription, B.title, B.description, C.username
				FROM PAGES A
				JOIN PAGEDETAIL B ON A.pageid=B.pageid
				JOIN USERS C ON A.userid=C.userid
				WHERE B.languageid =?
				AND A.pageid =? LIMIT 1"; 
		$query = $this->db->query($sql, array(lang('lang_id'), $pageid ));
		return $query->row();
	}
	
	public function deletePage(DtoPage $p){
		$this->db->trans_begin();
		$this->db->where('pageid',$p->getPageid());
		$this->db->delete('PAGEDETAIL');
		$this->db->where('pageid',$p->getPageid());
		$this->db->delete('PAGES');
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	public function updatePage(DtoPage $p){
		$this->db->trans_begin();
			$page = array(
					"seotitle"			=>	$p->getSeotitle(),
					"seodescription"	=>	$p->getSeodescription()
				);
			$this->db->where('pageid', $p->getPageid());
			$this->db->update('PAGES', $page);
			$pid = $p->getPageid();
			foreach($p->getPagedetail() as $pa){
				$this->db->where('pageid',$pid);
				$this->db->where('languageid', $pa['languageid']);
				$this->db->update('PAGEDETAIL', $pa);
			}
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return FALSE;
			}else{
				$this->db->trans_commit();
				return TRUE;
			}
	}
		
	public function countPages(){
		return $this->db->count_all('PAGES');
	}
	
}