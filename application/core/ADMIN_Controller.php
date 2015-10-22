<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ADMIN_Controller extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library("session");
		//	$this->isLoggedIn();
		}

		public function isLoggedIn(){
			$isLoggedIn = $this->session->userdata('logged_in');			
			if(!isset($isLoggedIn) || $isLoggedIn!=true){
				redirect("admin/auth");
			}
		}
	}

?>