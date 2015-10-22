<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class ERROR_404 extends CI_Controller 
    {
        public function __construct() 
        {
            parent::__construct(); 
        } 

        public function index() 
        { 
            $this->output->set_status_header('404'); 
            $data['title'] = 'ERROR 404';
            $data['page'] = '';
            $this->load->view('404',$data);
        } 
    } 
?> 