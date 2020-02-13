<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	// public function __construct() {
		// parent::__construct();

	// }
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->library('encrypt');
		$this->load->model('user_model');

		$this->load->model('order_model');

	}
	function index() {
		$this->load->view('dashboard');
	}

	function products() {
		//echo "asdas"; die;
		$this->load->view('site/plans');
	}
	
	function partner_regis(){
		
		$this->load->view('site/partner-regis');
		
		
	}
	function add_partner(){
		

		$this->form_validation->set_rules('p_firm_name', 'Firm Name', 'required');	
		$this->form_validation->set_rules('p_individual_name', 'Indivisual Name', 'required');	
		$this->form_validation->set_rules('address_1', 'Address', 'required');	
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');	
		$this->form_validation->set_rules('pin_code', 'PIN Code', 'required');			
		$this->form_validation->set_rules('gstin', 'GSTIN', 'required');
		$this->form_validation->set_rules('mobile_1', 'Mobile', 'required');	
		$this->form_validation->set_rules('email_1', 'Email Address', 'required');
		
		if($this->form_validation->run()) {	
			$this->user_model->insert_parnter($_POST);
//					print_r($_POST); die;
				
		}else{
			
			$this->partner_regis();
		}
	}
}

?>
