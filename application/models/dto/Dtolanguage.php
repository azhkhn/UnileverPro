<?php
class DtoCategory{

	private $languageid;
	private $languagename;
	private $logo;
	
	public function getLanguageid(){
		return $this->languageid;
	}
	
	public function setLanguageid($languageid){
		$this->languageid = $languageid;
	}
	
	public function getLanguagename(){
		return $this->languagename;
	}
	
	public function setLanguagename($languagename){
		$this->languagename = $languagename;
	}
	
	public function getLogo(){
		return $this->logo;
	}
	
	public function setLogo($logo){
		$this->logo = $logo;
	}
	
	
	
	
	
	
	
	
}