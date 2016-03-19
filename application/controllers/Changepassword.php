<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		if(!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

	}

	public function index(){
		$this->form_validation->set_rules('txtPasswordChangePassword', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[txtPasswordChangePassword]');
        $this->form_validation->set_rules('txtConfirmationPasswordChangePassword', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
        if ($this->form_validation->run() === TRUE)
		{
			$data["password"] = $this->input->post('txtPasswordChangePassword');
			if ($this->ion_auth->logged_in() || ($this->ion_auth->is_admin() && ($this->ion_auth->user()->row()->id == $this->ion_auth->get_user_id()))){
				 if($this->ion_auth->update($this->ion_auth->get_user_id(), $data)){
				 	echo json_encode(array(
						'status'  => TRUE,
						'message' => $this->ion_auth->messages()
					));
				 }else{
				 	echo json_encode(array(
						'status'  => TRUE,
						'message' => $this->ion_auth->errors()
					));
				 }
			}else{
				echo json_encode(array(
					'status'  => false,
					'message' => 'Your have not yet login or not the admin or not the own user.'
				));
			}
		}else{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['txtPasswordChangePassword'] = array(
                'name'  => 'txtPasswordChangePassword',
                'id'    => 'txtPasswordChangePassword',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('txtPasswordChangePassword'),
            );
            $this->data['txtConfirmationPasswordChangePassword'] = array(
                'name'  => 'txtConfirmationPasswordChangePassword',
                'id'    => 'txtConfirmationPasswordChangePassword',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('txtConfirmationPasswordChangePassword'),
            );
            echo json_encode($this->data);
		}
	}
		
}
