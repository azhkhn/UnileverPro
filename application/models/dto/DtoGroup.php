<?php

class Group {
	
	private $id;
	private $supervisor;
	private $beauty_agent;
	private $project_holder;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getSupervisor(){
		return $this->supervisor;
	}
	
	public function setSupervisor($supervisor){
		$this->supervisor = $supervisor;
	}
	
	public function getBeauty_agent(){
		return $this->beauty_agent;
	}
	
	public function setBeauty_agent($beauty_agent){
		$this->beauty_agent = $beauty_agent;
	}
	
	public function getProject_holder(){
		return $this->project_holder;
	}
	
	public function setProject_holder($project_holder){
		$this->project_holder = $project_holder;
	}
}