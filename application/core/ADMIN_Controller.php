<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ADMIN_Controller extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library("ion_auth");
			$this->isLoggedIn();
		}

		public function isLoggedIn(){
			if(!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			if($this->ion_auth->in_group(array('SUPERVISOR','BEAUTY_AGENT'))){
				return show_error("You must be an BA's Executive to view this page.");
			}
		}
	}

?>