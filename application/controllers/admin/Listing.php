<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Listing extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Listing_model'); 
		$this->load->model('Category_model');
		$this->load->model('Location_model');
		$this->load->model('User_model');				
        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function add_new_listing()
	{		
		$result['categories'] = $this->Category_model->show_your_categories();
		$result['countries'] = $this->Location_model->show_your_countries();					
		$result['states'] = $this->Location_model->show_your_states();					
		$result['cities'] = $this->Location_model->show_your_cities();					
		$result['sellers'] = $this->User_model->get_sellers();

//		print_r($result); die();

		$this->global['pageTitle'] = 'Benslist : Add Listing';
		
		$this->loadViews('admin/listing/add',$this->global,$result,NULL);			
		
	}
	function insert_listing()
	{

		$this->form_validation->set_rules('user_id', 'User', 'required');					
		$this->form_validation->set_rules('category_id', 'Category', 'required');			
		$this->form_validation->set_rules('trade', 'Trade', 'required');	
		$this->form_validation->set_rules('title', 'Title', 'required');	
		$this->form_validation->set_rules('description', 'Description', 'required');	
		$this->form_validation->set_rules('country_id', 'Country', 'required');	
		$this->form_validation->set_rules('state_id', 'State', 'required');	
		$this->form_validation->set_rules('city_id', 'City', 'required');	
		$this->form_validation->set_rules('price', 'Price', 'required');	
		$this->form_validation->set_rules('currency', 'Currency', 'required');	

		if($this->form_validation->run()) {

			$result = $this->Listing_model->insert_your_listing($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','Listing created successhully!');

				redirect(base_url('admin/listing/add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				redirect('admin/user/new-user');
			}
		}else {
			
			$this->add_new_listing();
		}		
		
	}


	function show_listing()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Listing';

		$result['listings'] = $this->Listing_model->show_your_listings();
		
		$this->loadViews('admin/listing/show',$this->global,$result,NULL);		
	}

	function edit_listing() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		$result['single_listing'] = $this->Listing_model->listing_edit($id);
		$result['categories'] = $this->Category_model->show_your_categories();
		$result['countries'] = $this->Location_model->show_your_countries();					
		$result['states'] = $this->Location_model->show_your_states();					
		$result['cities'] = $this->Location_model->show_your_cities();					
		$result['users'] = $this->User_model->get_users();					
		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/listing/edit',$this->global,$result, NULL);			
	}
	
	function update_listing()
	 {

	 	$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		$_POST['id'] = $id;
	 	$this->form_validation->set_rules('trade', 'Trade', 'required');	
		$this->form_validation->set_rules('title', 'Title', 'required');	
		$this->form_validation->set_rules('description', 'Description', 'required');	
		$this->form_validation->set_rules('country_id', 'Country', 'required');	
		$this->form_validation->set_rules('state_id', 'State', 'required');	
		$this->form_validation->set_rules('city_id', 'City', 'required');	
		$this->form_validation->set_rules('price', 'Price', 'required');	
		$this->form_validation->set_rules('currency', 'Currency', 'required');	

		if($this->form_validation->run()) {

			//print_r($_POST); die();

			$result = $this->Listing_model->update_your_listing($_POST);

			if($result == true){
				
				$this->session->set_flashdata('message','Listing updated successhully!');

				redirect(base_url('admin/listing/show-listing'));

			}else {
				$this->session->set_flashdata('message','Listing not updated');
				$this->update_listing();
			}
		}else {
			//echo "string"; die();
			$this->edit_listing();
		}
	}

	public function approve_listing()
	{
		$last = $this->uri->total_segments();
		$str = $this->uri->segment($last); 
		preg_match_all('!\d+!', $str, $id);

		$rurl = preg_replace("/[^A-Z]+/", "", $str);
		$result = $this->Listing_model->listing_approve($id[0][0]);
 
		if($rurl == 'DIS'){
 
			redirect(base_url('admin/listing/show-approve-listing')); 


		}elseif ($rurl == 'APP') {
 
			redirect(base_url('admin/listing/show-disapprove-listing')); 

		}else{
			redirect(base_url('admin/listing/show-listing')); 

		}

	}

	public function disapprove_listing()
	{
		$last = $this->uri->total_segments();
		$str = $this->uri->segment($last); 
		preg_match_all('!\d+!', $str, $id);

		$rurl = preg_replace("/[^A-Z]+/", "", $str);
		$result = $this->Listing_model->listing_disapprove($id[0][0]);


		if($rurl == 'DIS'){
 
			redirect(base_url('admin/listing/show-approve-listing')); 


		}elseif ($rurl == 'APP') {
 
			redirect(base_url('admin/listing/show-disapprove-listing')); 

		}else{
			redirect(base_url('admin/listing/show-listing')); 

		}
 
	}

	function show_disapprove_listing()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Disapproved Listing';

		$result['listings'] = $this->Listing_model->disapprove_listing_show(); 
		
		$this->loadViews('admin/listing/disapproved',$this->global,$result,NULL);		
	}

	function show_approve_listing()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Approved Listing';

		$result['listings'] = $this->Listing_model->approve_listing_show();
		
		$this->loadViews('admin/listing/approved',$this->global,$result,NULL);		
	}

	function delete_listing()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);

		$this->global['pageTitle'] = 'Benslist : Deleted Listing';

		$result = $this->Listing_model->listing_delete($id);

		redirect(base_url('admin/listing/show-disapprove-listing'));
	}
 
 

	
 }


?>
