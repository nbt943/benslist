<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/FrontBaseController.php';

class Site_pages extends FrontBaseController {

	public function __construct()
	{
		parent::__construct();
		//$this->load->helper('url');  
		$this->load->library('session'); 
		$this->load->model('Listing_model'); 
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->load->model('Brand_model');
		$this->load->model('Faq_model');
		$this->load->model('Location_model');

		$this->load->model('User_model');
		$this->load->library('form_validation'); 
		$this->load->model('Payment_model');
		$this->load->helper('string');
		

 
	}

	public function forgot_password()
	{   
		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		} 

		$this->global['pageTitle'] = 'Benslist : Forgot Password'; 

		$this->FrontLoadViews('site/forgot-password',$result,$this->global,NULL);
	}


	public function forgot_password_insert()
	{     
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');

		if($this->form_validation->run()) 
		{	 	
			$user_email = $this->input->post('email');  

			// $to = "trailerlover1@gmail.com";
			// $subject = "My subject";
			// $txt = "Hello world!";
			// $headers = "From: testph13@gmail.com";

			// $email = mail($to,$subject,$txt,$headers);
			// print_r(error_get_last());

			$string = random_string('alnum', 35); 


			$link = '<a href="'.base_url("password-reset/".$string).'">'.base_url($string).'</a>';print_r($link);
 

			// if($email)
			// {
			// 	echo 's';die;
			// }
			// else
			// {
			// 	echo "n";die;
			// }
	 
			$result = $this->User_model->insert_forgot_password($user_email,$string); 
die;
			if(count($result) >0){ 
					$this->session->set_flashdata('message','A link is send to your email id');

				redirect(base_url('forgot-password')); 
			}else { 
				$this->session->set_flashdata('message','This email id not registered');
				redirect('forgot-password'); 
			}
		}else {
			
			$this->forgot_password(); 
		}	
		 
	}


	public function password_reset()
	{   
		if($this->session->userdata('userId'))
		{
		 	redirect(base_url('login')); 
		}

		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$last = $this->uri->total_segments();
		$result['string'] = $this->uri->segment($last);

		$this->global['pageTitle'] = 'Benslist : Password Reset'; 

		$this->FrontLoadViews('site/password-reset',$result,$this->global,NULL); 
	}

	 

	public function password_reset_insert()
	{ 
		$last = $this->uri->total_segments();
		$string = $this->uri->segment($last);
		// $categories = $this->Category_model->show_your_categories();

		// if ($categories == '') {
		// 	$result['categories'] = array();			
		// }else{
		// 	$result['categories'] = $categories;  
		// }

		$this->form_validation->set_rules('password', 'Password', 'required');	
		$this->form_validation->set_rules('c_pass', 'Confirm password', 'required|matches[password]');  

		if($this->form_validation->run())
		{
			$password = $this->input->post('password');
			$string = $this->input->post('string');   
 
			$result = $this->User_model->insert_password_reset($password,$string);

			if($result != ''){ 

				redirect(base_url('login'));

			}else { 
				$this->password_reset();
			}
		}else {
			
			$this->password_reset();
		}	
 
	}
 

	public function paypal_payment_package()
	{ 
		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}
		$payment_plans = $this->Payment_model->show_your_payment_plans(); 

		if ($payment_plans == '') {
			$result['payment_plans'] = array();			
		}else{
			$result['payment_plans'] = $payment_plans;  
		}

		$this->global['pageTitle'] = 'Benslist : Payment Package'; 

		$this->FrontLoadViews('site/payment-package',$result,$this->global,NULL);   
	}

	public function plan_payment()
	{  
		if(!$this->session->userdata('userId')){ 

		 	redirect(base_url('login')); 

		}
		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		} 

		$last = $this->uri->total_segments();
		$plan_id = $this->uri->segment($last); 
 

		$plan = $this->Payment_model->show_your_payment_plans($plan_id);

		if ($plan == '') {
			$result['plan'] = array();			
		}else{
			$result['plan'] = $plan;  
		}  

		$paypal_keys = $this->Payment_model->show_admin_payment_details(); 

		 // echo '<pre>';print_r($paypal_keys[0][$payment_keys]);die;

		$paypal_key = json_decode($paypal_keys[0]['payment_keys']); 

		$client_id = $paypal_key->paypal_client;
		$secret = $paypal_key->paypal_secret;  
		$token = $this->get_token($client_id,$secret);
		$_SESSION['token_api'] = $token;

		if($token){

			$payments = $this->paypal_create_payment($token, $plan);

			redirect($payments->links[1]->href);
 
		}

		// $this->load->view('site/header',$result);		
		// $this->load->view('site/payment-option');		
		// $this->load->view('site/footer');	 
	}


	public function get_token($client_id='',$secret='')
	{


		$client_credentials = array('username' =>$client_id,'password'=>$secret);

		// print_r($client_credentials); die();

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "grant_type=client_credentials",
		  CURLOPT_USERPWD=>json_encode($client_credentials),
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/x-www-form-urlencoded",
		    "Authorization: Basic ".base64_encode($client_id.':'.$secret),
		    // .$client_id.':'.$secret,
		  ),
		));

		$response = curl_exec($curl);
		$error_msg = curl_error($curl);	
// echo $response;
		curl_close($curl); 
		if($response)
		{
			$result = json_decode($response);				
			return $result->access_token;
		}

	}



	public function execute_payment($pay_id,$token,$payer_id){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.sandbox.paypal.com/v1/payments/payment/".$pay_id."/execute",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>"{\r\n  \"payer_id\": \"".$payer_id."\"\r\n}",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Bearer ".$token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		return json_decode($response); 
	}

	public function paypal_create_payment($token, $plan)
	{
		$order_array = 	array (
			  'intent' => 'sale',
			  'payer' => 
			  array (
			    'payment_method' => 'paypal',
			  ),
			  'transactions' => 
			  array ( 
			    array (
			      'amount' => 
			      array (
			        'total' => $plan[0]['price'],
			        'currency' => 'USD',
			        'details' => 
			        array (
			          'subtotal' => $plan[0]['price'],
			        ),
			      ),
			      'description' => 'The payment transaction description.',
			      'custom' => 'EBAY_EMS_90048630024435',
			      'invoice_number' => '48787589673',
			      'payment_options' => 
			      array (
			        'allowed_payment_method' => 'INSTANT_FUNDING_SOURCE',
			      ),
			      'item_list' => 
			      array (
			        'items' => 
			        array (
			          array (
			            'name' => $plan[0]['offer_name'],
			            'description' => $plan[0]['ID'],
			            'quantity' => '1',
			            'price' => $plan[0]['price'],
			            'currency' => 'USD',
			          ),
			        ),
			      ),
			    ),
			  ),
			  'note_to_payer' => 'Contact us for any questions on your order.',
			  'redirect_urls' => 
			  array (
			    'return_url' => base_url('thank-you'),
			    'cancel_url' => base_url('pricing'),
			  ),
			);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.sandbox.paypal.com/v1/payments/payment",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>json_encode($order_array),
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Bearer ".$token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$result = json_decode($response);
		return $result; 
	}


	public function thanks()
	{  
		if(!$this->session->userdata('userId'))
		{ 
		 	redirect(base_url('login')); 
		}

		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		} 
 		 
 		$user_id = $this->session->userdata('userId');

		$token = $_SESSION['token_api'];
		$pay_id = $_GET['paymentId'];
		$payer_id = $_GET['PayerID'];
		$payer_info =  $this->execute_payment($pay_id,$token,$payer_id);

		// echo '<pre>';print_r($payer_info);
		$user_payment = $this->Payment_model->payment_plan_user($user_id,$payer_info);

		$this->global['pageTitle'] = 'Benslist : Thanks'; 

		$this->FrontLoadViews('site/thanks',$result,$this->global,NULL);  
	} 

	public function payment_option()
	{ 
		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$result['admin_payment_details'] = $this->Payment_model->show_admin_payment_details();	

		$last = $this->uri->total_segments();
		$plan_id = $this->uri->segment($last); 

		$plan = $this->Payment_model->show_your_payment_plans($plan_id); 

		if ($plan == '') {
			$result['plan'] = array();			
		}else{
			$result['plan'] = $plan;  
		} 

		$paypal_keys = $this->Payment_model->show_admin_payment_details(); 
		if ($paypal_keys == '') {
			$result['paypal_keys'] = array();			
		}else{
			$result['paypal_keys'] = $paypal_keys;  
		} 

		$this->global['pageTitle'] = 'Benslist : Payment Options'; 

		$this->FrontLoadViews('site/payment-option',$result,$this->global,NULL); 
	}

// STRIPE
 
	public function stripe_plan_payment()
	{  
		if(!$this->session->userdata('userId')){ 

		 	redirect(base_url('login')); 
		}

		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		} 

		$last = $this->uri->total_segments();
		$plan_id = $this->uri->segment($last); 

		$result['user_id'] =$this->session->userdata('userId');

		$plan = $this->Payment_model->show_your_payment_plans($plan_id); 

		if ($plan == '') {
			$result['stripe_plan'] = array();			
		}else{
			$result['stripe_plan'] = $plan;  
		}

		$this->global['pageTitle'] = 'Benslist : Stripe'; 

		$this->FrontLoadViews('site/stripe/stripe-payment',$result,$this->global,NULL); 
	} 

	public function create()
	{
		$this->load->view('site/stripe/create_payment');
	}
	
	public function thank()
	{           
		if(!$this->session->userdata('userId')){ 

		 	redirect(base_url('login')); 
		}

 		require_once('stripe-config.php'); 
		$user_payment = \Stripe\PaymentIntent::retrieve($_SESSION['payment_intent_id']);

		if ($user_payment->status !== 'succeeded') 
		{
		    die("Final order step reached, but PaymentIntent status is '{$user_payment->status}'");
		}
		// TODO: update your database now that the PaymentIntent is complete and your customer has paid

		// TODO: demo only: reset the session
		$_SESSION['customer_id'] = null;
		$_SESSION['payment_intent_id'] = null;

		$user_id = $this->session->userdata('userId');

		$result = $this->Payment_model->stripe_plan_user($user_id,$user_payment); 
 
		$this->global['pageTitle'] = 'Benslist : Thanks'; 

		$this->FrontLoadViews('site/thanks',$result,$this->global,NULL); 
	}
 	
	// public function strip_response(){

	//   	print_r($this->input->get());

	// }

	

	  

 
 

}
?>