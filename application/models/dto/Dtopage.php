<?php
class DtoPage {

	private $pageid;
	private $userid;
	private $seotitle;
	private $seodescription;
	private $pageDetail = array();
	
	public function getPageid(){
		return $this->pageid;
	}
	
	public function setPageid($pageid){
		$this->pageid = $pageid;
	}
	
	public function getUserid(){
		return $this->userid;
	}
	
	public function setUserid($userid){
		$this->userid = $userid;
	}
	
	public function getSeotitle(){
		return $this->seotitle;
	}
	
	public function setSeotitle($seotitle){
		$this->seotitle = $seotitle;
	}
	
	public function getSeodescription(){
		return $this->seodescription;
	}
	
	public function setSeodescription($seodescription){
		$this->seodescription = $seodescription;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getLanguageid(){
		return $this->languageid;
	}
	
	public function setLanguageid($languageid){
		$this->languageid = $languageid;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setDescription($description){
		$this->description = $description;
	}

	public function getPagedetail(){
		return $this->pageDetail;
	}

	public function setPagedetail($pageDetail){
		$this->pageDetail = $pageDetail;
	}
	
}