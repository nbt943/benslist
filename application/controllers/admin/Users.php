<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Users extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->library('encrypt');
		$this->load->model('user_model');

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function index() {
		$result['users'] = $this->user_model->get_users();
	
		$this->global['pageTitle'] = 'Benslist : All Users';
		
		$this->loadViews('admin/users/users',$this->global,$result , NULL);			
		
	}
	function add() {


		$this->global['pageTitle'] = 'Benslist : Add New User';
		
		$this->loadViews('admin/users/add',$this->global,NULL , NULL);	
		
	}
	
	function edit() {
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);		
		$result['single_user'] = $this->user_model->user_edit($id);				
		$this->global['pageTitle'] = 'Benslist : Edit';
		
		$this->loadViews('admin/users/edit',$this->global,$result, NULL);	
		
	}	
    public function create_new_user() {
		
			
		$this->form_validation->set_rules('user_login', 'Username', 'required');	
		$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('user_pass', 'Password', 'required');	
		$this->form_validation->set_rules('user_role', 'Role', 'required');	

		if($this->form_validation->run()) {

			$user_login = $this->input->post('user_login');
			$user_email = $this->input->post('user_email');
			$user_pass = $this->input->post('user_pass');
			$user_role = $this->input->post('user_role');	
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$user_phone = $this->input->post('user_phone');
			
			$result = $this->user_model->insert_user($user_login,$user_email,$user_pass,$user_role,$first_name,$last_name,$user_phone);
			if($result == ''){

				$this->session->set_flashdata('message','User created successhully!');

				redirect(base_url('admin/user/new-user/'));
			}else {
				$this->session->set_flashdata('message',$result);
				redirect('admin/user/new-user');
			}
		}else {
			
			$this->add();
		}	
		
    }	

	    public function update() {

		
		$this->form_validation->set_rules('user_pass', 'Password', 'required');	
		$this->form_validation->set_rules('user_role', 'Role', 'required');	

		if($this->form_validation->run()) {
			
			$last = $this->uri->total_segments();
			$id = $this->uri->segment($last);
			$user_pass = $this->input->post('user_pass');
			$user_role = $this->input->post('user_role');	
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$user_phone = $this->input->post('user_phone');
			
			$result = $this->user_model->update_user($id,$user_pass,$user_role,$first_name,$last_name,$user_phone);
			if($result == ''){
				$this->session->set_flashdata('message','User updated successhully!');

				redirect(base_url('admin/user/edit/'.$id));
			}else {
				$this->session->set_flashdata('message',$result);
				redirect(base_url('admin/users'));
			}
		}else {
			
			$this->edit();
		}	
		
    }	
	
	function delete_user() {
		
	$last = $this->uri->total_segments();
	$id = $this->uri->segment($last);		
	$result = $this->user_model->user_delete($id);
		if($result) {
			redirect(base_url('admin/users'));
		}
	
	}	
	function profile() {
		$this->load->view('Users/profile');
	}
	function logout() {
		$data = $this->session->all_userdata();
		foreach($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
		redirect(base_url('admin'));
	}
 function ajax_username_validate() {
	 	
	$user_login = $this->input->post('user_login');
	
	$result = $this->user_model->validate_username($user_login);
	 
	 echo $result; 
	 
 }
 
 function ajax_email_validate() {
	 	
	$user_email = $this->input->post('user_email');
	
	$result = $this->user_model->validate_email($user_email);
	 
	 echo $result; 
	 
 } 
 
 
}


 function validation()
 {
  $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
  $this->form_validation->set_rules('user_password', 'Password', 'required');
  if($this->form_validation->run())
  {
   $result = $this->login_model->can_login($this->input->post('user_email'), $this->input->post('user_password'));
   if($result == '')
   {
    redirect('dashboard');
   }
   else
   {
    $this->session->set_flashdata('message',$result);
    redirect('login');
   }
  }
  else
  {
   $this->index();
  }
 }
?>
