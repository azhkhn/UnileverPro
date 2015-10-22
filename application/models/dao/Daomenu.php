<?php

class DaoMenu extends CI_Model{

	public function DaoMenu(){
		parent::__construct();
		$this->load->model('dto/DtoMenu');
	}
	
	public function addNewMenu(DtoMenu $menus){
		$this->db->trans_begin();
		$this->db->insert("MENUS",array("ordering" 	=> $menus->getOrdering(),
										"linkto" 	=> $menus->getLinkto(),
										"level"		=> ($menus->getLevel()=="") ? '0' : $menus->getLevel(),
										"subof" 	=> ($menus->getSubof()=="") ? null : $menus->getSubof()
										));
		$menuID = $this->db->insert_id();
		
		foreach($menus->getMenuDetails() as $menu){
			$menu["menuid"] = $menuID;
			$this->db->insert("MENUDETAIL",$menu);
		}
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	public function getAllMenus(){
		$this->db->select('DISTINCT(A.menuid), A.level, A.subof, A.ordering, A.linkto, C.title, C.description, C.languageid, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle');
		$this->db->from('MENUS A');
		$this->db->join('MENUS B', 'A.subof=B.menuid', 'left');
		$this->db->join('MENUDETAIL C', 'A.menuid=C.menuid');
		//$this->db->group_by('A.subof,A.ordering');
		$this->db->where('C.languageid',2);
		//$this->db->order_by('A.subof,A.ordering');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function updateMenu(DtoMenu $menus){
		$this->db->trans_begin();

		$menuid = $menus->getMenuid();
		// UPDATE MENU
		$menu = array(
					"ordering"	=> $menus->getOrdering(),
					"linkto"	=> $menus->getLinkto(),
					"level"		=> ($menus->getLevel()=="") ? '0' : $menus->getLevel(),
					"subof" 	=> ($menus->getSubof()=="") ? null : $menus->getSubof());
		$this->db->where('menuid', $menuid);
		$this->db->update('MENUS', $menu);
		// UDPDATE MAIN MENU
		foreach($menus->getMenuDetails() as $menuDetails){
			$this->db->where('menuid', $menuid);
			$this->db->where('languageid', $menuDetails['languageid']);
			$this->db->update('MENUDETAIL', $menuDetails);
		}
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	public function updateOrderMenu(DtoMenu $menus){
		$data = array(
				'ordering'	=> $menus->getOrdering()
		);
		$this->db->where('menuid', $menus->getMenuid());
		return $this->db->update('MENUS', $data);
	}

	public function deleteMenu($menuid){
		try{
			$this->db->trans_begin();

			// DELETE ALL DETAILS
			$this->db->where('menuid', $menuid);
			$this->db->delete('MENUDETAIL');

			// DELETE MAIN
			$this->db->where('menuid', $menuid);
			$this->db->delete('MENUS');
			if($this->db->trans_status()===FALSE){
				$this->db->trans_rollback();
				return FALSE;
			}else{
				$this->db->trans_commit();
				return TRUE;
			}
		}catch(Exception $e){
			log_message($e->getMessage());
			return FALSE;
		}
	}

	public function listTopMenu($languageid=2){
		$this->db->select('A.menuid, B.title, A.level');
		$this->db->from('MENUS A');
		$this->db->join('MENUDETAIL B','A.menuid = B.menuid');
		//$this->db->where('A.subof', null);
		$this->db->where('B.languageid', $languageid);
		$this->db->where('A.level<',"2");
		$query = $this->db->get();
		return $query->result();
	}

	public function getMenuById($id){
		$this->db->select('A.menuid,A.subof, A.level, A.ordering, A.linkto, C.title, C.description, C.languageid,D.languagename');
		$this->db->from('MENUS A');
		$this->db->join('MENUS B', 'A.subof=B.menuid', 'left');
		$this->db->join('MENUDETAIL C', 'A.menuid=C.menuid');
		$this->db->join("LANGUAGES D", 'C.languageid = D.languageid');
		$this->db->where('A.menuid',$id);
		$query = $this->db->get();
		return $query->result();	
	}

}

?>