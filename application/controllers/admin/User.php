<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends ADMIN_Controller{

		public function __construct(){
			parent::__construct();
		}
		
		public function index(){
			$this->load->view('admin-kh4it/user');
		}
		
		public function add(){
			$this->load->view('admin-kh4it/adduser');
		}
		
	}