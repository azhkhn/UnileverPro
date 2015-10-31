<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SaleTarget extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->load->view('saletarget');
		}
		
		public function add(){
			$this->load->view('addsaletarget');
		}
	
	}
?>