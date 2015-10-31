<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutletType extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('outletType');
	}

	public function add(){
		$this->load->view('addoutlettype');
	}
}
?>