<?php
class DtoMenu {

	private $menuid;
	private $linkto;
	private $ordering;
	private $subof;
	private $level;
	
	private $menuDetails;
/*	private $languageid;
	private $title;
	private $description;*/
	
	
	public function getMenuid(){
		return $this->menuid;
	}
	
	public function setMenuid($menuid){
		$this->menuid = $menuid;
	}
	
	public function getLinkto(){
		return $this->linkto;
	}
	
	public function setLinkto($linkto){
		$this->linkto = $linkto;
	}
	
	public function getOrdering(){
		return $this->ordering;
	}
	
	public function setOrdering($ordering){
		$this->ordering = $ordering;
	}
	
	public function getSubof(){
		return $this->subof;
	}
	
	public function setSubof($subof){
		$this->subof = $subof;
	}

	public function setLevel($level){
		$this->level = $level;
	}

	public function getLevel(){
		return $this->level;
	}
	
	public function setMenuDetails($menuDetails){
		$this->menuDetails = $menuDetails;
	}
	
	public function getMenuDetails(){
		return $this->menuDetails;
	}
	
}