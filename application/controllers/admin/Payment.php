<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Payment extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->model('Payment_model');

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function add_payment()
	{
		$this->global['pageTitle'] = 'Benslist : Add Payment'; 

		$result['payment_details']	= $this->Payment_model->show_your_payment_plans();
		
		$this->loadViews('admin/payment/add',$this->global,$result,NULL);			
		
	}

	function payment_insert()
	{ 	
		$this->form_validation->set_rules('offer_name', 'Offer name', 'required');	
		$this->form_validation->set_rules('price', 'Price', 'required|numeric'); 	
		$this->form_validation->set_rules('ads_no', 'Number of ads', 'required|numeric'); 
		$this->form_validation->set_rules('month', 'Month', 'required|numeric'); 	 
 
		if($this->form_validation->run()) {
			$result = $this->Payment_model->insert_your_payment_plans($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','Plan added successfully!');
 
				redirect(base_url('admin/payment/add-payment'));

			}else {
				$this->session->set_flashdata('message','Plan not added');
				redirect(base_url('admin/payment/add-payment'));
			}
		}else {
			
			$this->add_payment();
		}	  
	}

	function payment_delete()
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
 

		$result = $this->Payment_model->delete_payment($id);

		if($result){
				
				$this->session->set_flashdata('delete','Plan delete successfully!');
 
				redirect(base_url('admin/payment/add-payment'));

			}else {
				$this->session->set_flashdata('delete','Plan not deleted');
				redirect(base_url('admin/payment/add-payment'));
			}
		 			
		$this->add_payment();
	}

	public function paypal_payment_show()
	{
		$this->global['pageTitle'] = 'Benslist : Show Payments';

		$result['payments'] = $this->Payment_model->show_paypal_payment();
		
		$this->loadViews('admin/payment/show-paypal',$this->global,$result,NULL);	
	}

	public function stripe_payment_show()
	{
		$this->global['pageTitle'] = 'Benslist : Show Payments';

		$result['payments'] = $this->Payment_model->show_stripe_payment();	
		
		$this->loadViews('admin/payment/show-stripe',$this->global,$result,NULL);	
	}

// PAYMENT SETTINGS 

	public function payment_settings()
	{
		$this->global['pageTitle'] = 'Benslist : Payment Settings';

		$result['admin_payment_details'] = $this->Payment_model->show_admin_payment_details();	
		
		$this->loadViews('admin/payment/payment-setting',$this->global,$result,NULL);	
	}

	

	public function insert_payment_status()
	{  
		$result = $this->Payment_model->payment_status_insert($_POST); 
		print_r($result);
	}

	public function insert_paypal_key()  
	{		 
		$paypal_array = array();

		parse_str($_POST['paypal_data'],$paypal_array);


		$json_data = array('paypal_client' => $paypal_array['paypal_client'] ,'paypal_secret'=>$paypal_array['paypal_secret']);

		$data = json_encode($json_data);	 
 
		$result = $this->Payment_model->paypal_key_insert($paypal_array['id'],$data);


			 
	  }

	  public function insert_stripe_key()  
	{	
	 	$stripe_array = array();

	 	parse_str($_POST['stripe_data'],$stripe_array);		
		 

		$json_data = array('stripe_client' => $stripe_array['stripe_client'] ,'stripe_secret'=>$stripe_array['stripe_secret']);

		$data = json_encode($json_data);	 
 
		$result = $this->Payment_model->paypal_key_insert($stripe_array['id'],$data);

	  }







}



?>
