<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Users extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('user_model');
        $this->isLoggedIn();   
		
	}

	// function index() {
		// $result['users'] = $this->user_model->get_users();
		
		// $this->load->view('users',$result);
	// }
    public function index()
    {
		$result['users'] = $this->user_model->get_users();		
        $this->global['pageTitle'] = 'Benslist : Users';
        
        $this->loadViews("admin/users", $this->global,$result , NULL);
    }
	
	function add() {

		$this->global['pageTitle'] = 'Benslist : Add User';
		
		$this->loadViews('admin/users/add',$this->global,NULL , NULL);
	}
	
	function edit() {
		$id = $this->uri->segment(3);
		
		$result['single_user'] = $this->user_model->user_edit($id);	
			
		
		$this->load->view('Users/edit',$result);
	}	
    public function insert() {

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
				redirect('Users/add');
			}else {
				$this->session->set_flashdata('message',$result);
				redirect('add');
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
				redirect('Users');
			}else {
				$this->session->set_flashdata('message',$result);
				redirect('Users');
			}
		}else {
			
			$this->add();
		}	
		
    }	
	
	function deleteuser() {
		
	$id = $this->uri->segment(3);
		
	$result = $this->user_model->user_delete($id);
		if($result) {
			redirect('users');
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
		redirect('login');
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
