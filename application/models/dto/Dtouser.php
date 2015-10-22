<?php

class DtoUser{

	private $userid;
	private $username;
	private $password;
	private $usertype;
	private $active;
	
	
	public function getUserid(){
		return $this->userid;
	}

	public function setUserid($userid){
		$this->userid = $userid;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getUsertype(){
		return $this->usertype;
	}

	public function setUsertype($usertype){
		$this->usertype = $usertype;
	}

	public function getActive(){
		return $this->active;
	}

	public function setActive($active){
		$this->active = $active;
	}
}