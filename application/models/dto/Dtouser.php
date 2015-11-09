<?php
	class Dtouser{
		private $id;
		private $code;
		private $username;
		private $password;
		private $email;
		private $ipAddress;
		private $salt;
		private $activationCode;
		private $fogottenPasswordCode;
		private $forgottenPasswordTime;
		private $rememberCode;
		private $createdOn;
		private $createdDate;
		private $createdBy;
		private $updateddDate;
		private $updatedBy;
		private $active;
		private $firstName;
		private $lastName;
		private $phone;
		private $remark;
		private $startingDate;
		private $parentId;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getCode(){
			return $this->code;
		}

		public function setCode($code){
			$this->code = $code;
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

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getIpAddress(){
			return $this->ipAddress;
		}

		public function setIpAddress($ipAddress){
			$this->ipAddress = $ipAddress;
		}

		public function getSalt(){
			return $this->salt;
		}

		public function setSalt($salt){
			$this->salt = $salt;
		}

		public function getActivationCode(){
			return $this->activationCode;
		}

		public function setActivationCode($activationCode){
			$this->activationCode = $activationCode;
		}

		public function getFogottenPasswordCode(){
			return $this->fogottenPasswordCode;
		}

		public function setFogottenPasswordCode($fogottenPasswordCode){
			$this->fogottenPasswordCode = $fogottenPasswordCode;
		}

		public function getForgottenPasswordTime(){
			return $this->forgottenPasswordTime;
		}

		public function setForgottenPasswordTime($forgottenPasswordTime){
			$this->forgottenPasswordTime = $forgottenPasswordTime;
		}

		public function getRememberCode(){
			return $this->rememberCode;
		}

		public function setRememberCode($rememberCode){
			$this->rememberCode = $rememberCode;
		}

		public function getCreatedOn(){
			return $this->createdOn;
		}

		public function setCreatedOn($createdOn){
			$this->createdOn = $createdOn;
		}

		public function getCreatedDate(){
			return $this->createdDate;
		}

		public function setCreatedDate($createdDate){
			$this->createdDate = $createdDate;
		}

		public function getCreatedBy(){
			return $this->createdBy;
		}

		public function setCreatedBy($createdBy){
			$this->createdBy = $createdBy;
		}

		public function getUpdateddDate(){
			return $this->updateddDate;
		}

		public function setUpdateddDate($updateddDate){
			$this->updateddDate = $updateddDate;
		}

		public function getUpdatedBy(){
			return $this->updatedBy;
		}

		public function setUpdatedBy($updatedBy){
			$this->updatedBy = $updatedBy;
		}

		public function getActive(){
			return $this->active;
		}

		public function setActive($active){
			$this->active = $active;
		}

		public function getFirstName(){
			return $this->firstName;
		}

		public function setFirstName($firstName){
			$this->firstName = $firstName;
		}

		public function getLastName(){
			return $this->lastName;
		}

		public function setLastName($lastName){
			$this->lastName = $lastName;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function setPhone($phone){
			$this->phone = $phone;
		}

		public function getRemark(){
			return $this->remark;
		}

		public function setRemark($remark){
			$this->remark = $remark;
		}

		public function getStartingDate(){
			return $this->startingDate;
		}

		public function setStartingDate($startingDate){
			$this->startingDate = $startingDate;
		}

		public function getParentId(){
			return $this->parentId;
		}

		public function setParentId($parentId){
			$this->parentId = $parentId;
		}
	}
?>
