<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends ADMIN_CONTROLLER{

		private $limit = 5;

		public function __construct(){

			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
		}

		public function index(){
			//list the users
			$this->data['users'] = $this->ion_auth->users('BEAUTY_AGENT')->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->load->view('users/beauty_agent_list', $this->data);
		}

		public function BAInformation(){
			$this->load->model('Dao/Daouser');
            $total_rows = $this->Daouser->count('BEAUTY_AGENT');

            $this->load->helper('app');
			$this->data["page_links"] = pagination($total_rows, $this->limit,'user/ajax', 3);

            //$this->pagination->initialize($config);
			$this->data["users"] = $this->Daouser->all('BEAUTY_AGENT', $this->limit);//$this->Daouser->getAllUsersByGroupName('BEAUTY_AGENT');
			$this->load->view('users/beauty_agent_list', $this->data);
		}

		public function ajax(){
			$this->load->model('Dao/Daouser');
            $total_rows = $this->Daouser->count('BEAUTY_AGENT');

            $this->load->helper('app');
			$this->data["page_links"] = pagination($total_rows, $this->limit);

            //$this->pagination->initialize($config);
			$this->data["users"] = $this->Daouser->all('BEAUTY_AGENT', $this->limit, 'user/ajax', 3);//$this->Daouser->getAllUsersByGroupName('BEAUTY_AGENT');
			//$this->data["supervisors"] = $this->Daouser->getAllUsersByGroupName('SUPERVISOR');
			//$this->load->view('users/beauty_agent_list', $this->data);
			echo json_encode($this->data);
		}

		/*public function index()
		{
			$this->load->model('contact_model', 'contact');
			$query = $this->contact->all($this->limit);
			$total_rows = $this->contact->count();		
			$this->load->helper('app');
			$pagination_links = pagination($total_rows, $this->limit);
			$this->load->view('header');
			$this->load->view('index', compact('query', 'pagination_links'));
			$this->load->view('footer');
		}*/
		/*public function ajax()
		{
			$this->load->model('contact_model', 'contact');
			$query = $this->contact->all($this->limit);
			$total_rows = $this->contact->count();
			$this->load->helper('app');
			$pagination_links = pagination($total_rows, $this->limit);
			if ( ! $this->input->is_ajax_request()) $this->load->view('header');
			$this->load->view('ajax', compact('query', 'pagination_links'));
			if ( ! $this->input->is_ajax_request()) $this->load->view('footer');
		}	*/

		public function supervisorInformation(){
			$this->data['users'] = $this->ion_auth->users('SUPERVISOR')->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->load->view('users/supervisor_list', $this->data);
		}

		public function BAExecutiveInformation(){
			$this->data['users'] = $this->ion_auth->users('ADMIN')->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->load->view('users/beauty_agent_executive_list', $this->data);
		}

		public function projectHolderInformation(){
			$this->data['users'] = $this->ion_auth->users('PROJECT_HOLDER')->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->load->view('users/project_holder_list', $this->data);	
		}

		public function registerNewBA(){
			$this->data['title'] = "Create User";

	        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
	        {
	            redirect('auth', 'refresh');
	        }

	        $tables = $this->config->item('tables','ion_auth');
	        $identity_column = $this->config->item('identity','ion_auth');
	        $this->data['identity_column'] = $identity_column;

	        // validate form input
	        $this->form_validation->set_rules('firstname', $this->lang->line('create_user_validation_fname_label'), 'required');
	        $this->form_validation->set_rules('lastname', $this->lang->line('create_user_validation_lname_label'), 'required');
	        if($identity_column!=='email')
	        {
	            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
	            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
	        }
	        else
	        {
	            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
	        }
	        $this->form_validation->set_rules('code', 'Code is required and cannot duplicate with other.', 'trim|required|is_unique[' . $tables['users'] . '.code]');
	        $this->form_validation->set_rules('gender', 'Gender is required.', 'required');
	        $this->form_validation->set_rules('supervisor', 'Supervisor is required.', 'required');
	        $this->form_validation->set_rules('startworking', 'Start working is required.', 'required');
	        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
	        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
	        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirmpassword]');
	        $this->form_validation->set_rules('confirmpassword', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

	        if ($this->form_validation->run() == true)
	        {
	            $email    = strtolower($this->input->post('email'));
	            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
	            $password = $this->input->post('password');

	            $additional_data = array(
	            	'code'         => $this->input->post('code'),
	            	'gender'       => $this->input->post('gender'),
	            	'parent_id'    => $this->input->post('supervisor'),
	            	'starting_date'=> $this->input->post('startworking'),
	                'first_name'   => $this->input->post('firstname'),
	                'last_name'    => $this->input->post('lastname'),
	                'company'      => $this->input->post('company'),
	                'phone'        => $this->input->post('phone'),
	                'created_by'   => $this->ion_auth->get_user_id(),
	                'photo'		   => $this->input->post('photo'),
	                'remark'	   => $this->input->post('remark')
	            );
	        }
	        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
	        {
	            echo json_encode(array(
	            		'message' => 'You have been inserted successfully.',
	            		'status'  => TRUE
	            	));
	        }
	        else
	        {
	            // display the create user form
	            // set the flash data error message if there is one
	            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

	            $this->data['first_name'] = array(
	                'name'  => 'first_name',
	                'id'    => 'first_name',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('first_name'),
	            );
	            $this->data['last_name'] = array(
	                'name'  => 'last_name',
	                'id'    => 'last_name',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('last_name'),
	            );
	            $this->data['identity'] = array(
	                'name'  => 'identity',
	                'id'    => 'identity',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('identity
	                '),
	            );
	            $this->data['email'] = array(
	                'name'  => 'email',
	                'id'    => 'email',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('email'),
	            );
	            $this->data['company'] = array(
	                'name'  => 'company',
	                'id'    => 'company',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('company'),
	            );
	            $this->data['phone'] = array(
	                'name'  => 'phone',
	                'id'    => 'phone',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('phone'),
	            );
	            $this->data['password'] = array(
	                'name'  => 'password',
	                'id'    => 'password',
	                'type'  => 'password',
	                'value' => $this->form_validation->set_value('password'),
	            );
	            $this->data['password_confirm'] = array(
	                'name'  => 'password_confirm',
	                'id'    => 'password_confirm',
	                'type'  => 'password',
	                'value' => $this->form_validation->set_value('password_confirm'),
	            );
	            echo json_encode($this->data);
	        }
		}

		public function updateUser($id){
			$this->data['title'] = "Edit User";
			$tables = $this->config->item('tables','ion_auth');
			if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
			{
				echo json_encode(array(
						'status'  => false,
						'message' => 'Your have not yet login or not the admin.'
					));
			}

			$user = $this->ion_auth->user($id)->row();
			$groups=$this->ion_auth->groups()->result_array();
			$currentGroups = $this->ion_auth->get_users_groups($id)->result();

			// validate form input
			//$this->form_validation->set_rules('code', 'Code is required and cannot duplicate with other.', 'trim|required|is_unique[' . $tables['users'] . '.code]');
	        $this->form_validation->set_rules('gender', 'Gender is required.', 'required');
	        $this->form_validation->set_rules('supervisor', 'Supervisor is required.', 'required');
	        $this->form_validation->set_rules('startworking', 'Start working is required.', 'required');
	        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
	        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');

			if (isset($_POST) && !empty($_POST))
			{
				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
				}

				if ($this->form_validation->run() === TRUE)
				{
					$data = array(
						//'code'         => $this->input->post('code'),
		            	'gender'       => $this->input->post('gender'),
		            	'parent_id'    => $this->input->post('supervisor'),
		            	'starting_date'=> $this->input->post('startworking'),
		                'first_name'   => $this->input->post('firstname'),
		                'last_name'    => $this->input->post('lastname'),
		                'company'      => $this->input->post('company'),
		                'phone'        => $this->input->post('phone'),
		                'updated_by'   => $this->ion_auth->get_user_id(),
		                'updated_date' => date('Y-m-d H:i:s'),
		                'photo'		   => $this->input->post('photo'),
		                'remark'	   => $this->input->post('remark')
					);

					// update the password if it was posted
					if ($this->input->post('password'))
					{
						$data['password'] = $this->input->post('password');
					}

					// check to see if we are updating the user
				   if($this->ion_auth->update($user->id, $data))
				    {
				    	// redirect them back to the admin page if admin, or to the base url if non admin
					    //$this->session->set_flashdata('message', $this->ion_auth->messages() );
						echo json_encode(array(
							'status'  => TRUE,
							'message' => $this->ion_auth->messages()
						));
				    }
				    else
				    {
				    	// redirect them back to the admin page if admin, or to the base url if non admin
					    //$this->session->set_flashdata('message', $this->ion_auth->errors() );
					    echo json_encode(array(
							'status'  => TRUE,
							'message' => $this->ion_auth->errors()
						));
				    }

				}
			}
		}

		public function getUser($id){
			$this->load->model('Dao/Daouser');
			echo json_encode($this->Daouser->getUserById($id));
		}

		public function changeStatus($id){
			$this->load->model('Dao/Daouser');
			$this->load->model('Dto/Dtouser');
			$this->Dtouser->setId($id);
			$this->Dtouser->setActive($this->input->post('active'));
			echo json_encode($this->Daouser->changeStatus($this->Dtouser));
		}

	}
?>