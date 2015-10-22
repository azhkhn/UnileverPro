<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper('security');
		}

		private function isLoggedIn(){
			$this->session->userdata('logged_in');			
			$isLoggedIn = $this->session->userdata('logged_in');			
			if(isset($isLoggedIn) || $isLoggedIn){
				return true;
			}else{
				return false;
			}
		}

		public function index(){
			
			
			
			if($this->isLoggedIn()){
				redirect('admin/dashboard');
			}else{
				$this->login();
			}
		}
		
		private function login(){
			$this->load->view('admin-kh4it/index','refresh');
		}

		public function logout(){
			$this->session->unset_userdata("logged_in");
			session_destroy();
			redirect('admin/auth');
		}

		public function authenticate(){
			log_message('debug', "AUTHENTICATION");

		   //This method will have the credentials validation
		   	$this->load->library('form_validation');
			 
		   	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		   	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_authentication_user');

			if ($this->form_validation->run() == FALSE){
				log_message('debug', "FALSE");
				$this->load->view('admin-kh4it/index','refresh');
			}else{
     			redirect("admin/dashboard");
			}			
		}

		function authentication_user($password){
			try{
				log_message('debug',"AUTHENTICATION");		
				$this->load->model('dto/DtoUser');
				$this->load->model('dao/DaoUser');
				$user = new DtoUser();
				$userDao = new DaoUser();

				$user->setUsername($this->input->post('username',TRUE));
				$user->setPassword(md5($this->input->post('password',TRUE)));
			   	$result = $userDao->login($user);
			   	if($result){
			   		foreach($result as $row){
	       				$user->setUsername($row->username);
	         			$user->setUserid($row->userid);
	         			$user->setUsertype($row->usertype);
						$this->session->set_userdata('logged_in', $user);
						$this->session->set_userdata('username', $this->encryption->encrypt($user->getUsername()));
						$this->session->set_userdata('userid', $this->encryption->encrypt($user->getUserid()));
						$this->session->set_userdata('usertype', $user->getUsertype());
						
			     		return TRUE;
	     			}
			   }else{
			   		$this->form_validation->set_message('authentication_user', 'Invalid username or password. Please try again.');
			     	return false;
			   }
			 }catch(Exception $ex){

			 	log_message('debug',$ex->getMessage());
			 }
		 }
	}
?>