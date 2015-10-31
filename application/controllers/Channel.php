<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Channel extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->load->view('channel');
		}
		
		public function add(){
			$this->load->view('addchannel');
		}
	
	}
?>