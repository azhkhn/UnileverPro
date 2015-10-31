<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('outlet');
	}

	public function add(){
		$this->load->view('addoutlet');
	}
}
?>