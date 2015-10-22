<?php

class DtoSlide{

	private $slideid;
	private $userid;
	private $ordering;
	private $type;
	private $linkto;

	private $languageid;
	private $title;
	private $caption;
	private $imageurl;
	private $createddate;
	private $description;
	private $sliderdetail = array();

	public function getLinkto(){
		return $this->linkto;
	}
	public function setLinkto($linkto){
		$this->linkto = $linkto;
	}

	public function getSliderdetail(){
		return $this->sliderdetail;
	}
	
	public function setSliderdetail($detail){
		$this->sliderdetail = $detail;
	}

	public function getSlideid(){
		return $this->slideid;
	}
	
	public function setSlideid($slideid){
		$this->slideid = $slideid;
	}
	
	public function getUserid(){
		return $this->userid;
	}
	
	public function setUserid($userid){
		$this->userid = $userid;
	}
	
	public function getOrdering(){
		return $this->ordering;
	}
	
	public function setOrdering($ordering){
		$this->ordering = $ordering;
	}
	
	public function getType(){
		return $this->type;
	}
	
	public function setType($type){
		$this->type = $type;
	}
	
	public function getLanguageid(){
		return $this->languageid;
	}
	
	public function setLanguageid($languageid){
		$this->languageid = $languageid;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getCaption(){
		return $this->caption;
	}
	
	public function setCaption($caption){
		$this->caption = $caption;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setDescription($description){
		$this->description = $description;
	}
	
	public function getCreateddate(){
		return $this->createddate;
	}
	
	public function setCreateddate($createddate){
		$this->createddate = $createddate;
	}
	
	public function getImageurl(){
		return $this->imageurl;
	}
	
	public function setImageurl($imageurl){
		$this->imageurl = $imageurl;
	}
	
	
}