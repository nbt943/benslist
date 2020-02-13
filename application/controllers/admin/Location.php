<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Location extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->library('encrypt');
		$this->load->model('Location_model'); 

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function add_new_country()
	{	 		
		$this->global['pageTitle'] = 'Benslist: Add Country';
		
		$this->loadViews('admin/location/add-country',$this->global,NULL,NULL);			
		
	}

	public function insert_country()  
	{		
		$this->form_validation->set_rules('country_name', 'Country Name', 'required');	
		$this->form_validation->set_rules('country_phone_code', 'Phone Code', 'required|numeric');
		$this->form_validation->set_rules('country_currency', 'Country Currency', 'required');	
		$this->form_validation->set_rules('country_currency_code', 'Country Currency Code', 'required');	
		$this->form_validation->set_rules('country_currency_symbol', 'Country Currency Symbol', 'required');	
		// $this->form_validation->set_rules('status', 'Status', 'required');	 

		if($this->form_validation->run()) {

			$result = $this->Location_model->insert_your_country($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','Country added successfully!');

				redirect(base_url('admin/country/add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				$this->add_new_country();
			}
		}else {
			
			$this->add_new_country();
		}		
		
	}

	function show_country()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Country';

		$result['countries'] = $this->Location_model->show_your_countries();
		
		$this->loadViews('admin/location/show-country',$this->global,$result,NULL);		
	}

	function edit_country() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);		
		$result['single_country'] = $this->Location_model->country_edit($id); 

		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/location/edit-country',$this->global,$result, NULL);			
	}	 

	public function update_country()
	{
		$this->form_validation->set_rules('country_name', 'Country Name', 'required');	
		$this->form_validation->set_rules('country_phone_code', 'Phone Code', 'required|numeric');
		$this->form_validation->set_rules('country_currency', 'Country Currency', 'required');	
		$this->form_validation->set_rules('country_currency_code', 'Country Currency Code', 'required');	
		$this->form_validation->set_rules('country_currency_symbol', 'Country Currency Symbol', 'required');	 

		if($this->form_validation->run()) {

			$result = $this->Location_model->country_update($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','Country Not Update successfully!');

				redirect(base_url('admin/location/show-country'));

			}else {
				$this->session->set_flashdata('message','Country Update successfully!');
				$this->show_country();
			}
		}else {
			
			$this->edit_country();
		}	


	}



//STATE

	function add_new_state()
	{
		$this->global['pageTitle'] = 'Benslist : Add State';

		$result['countries'] = $this->Location_model->show_your_countries();
		
		$this->loadViews('admin/location/add-state',$this->global,$result,NULL);			
		
	}

	public function insert_state()  
	{
		
		$this->form_validation->set_rules('state_name', 'State', 'required');	
		$this->form_validation->set_rules('country_id', 'Country Name', 'required');   

		if($this->form_validation->run()) {

			$result = $this->Location_model->insert_your_state($_POST);
			

			if($result == ''){
				
				$this->session->set_flashdata('message','State added successfully!');

				redirect(base_url('admin/state/add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				redirect('admin/user/new-user');
			}
		}else {
			
			$this->add_new_state();
		}		
		
	} 	

	function show_state()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show State';

		$result['states'] = $this->Location_model->show_your_states();
		
		$this->loadViews('admin/location/show-state',$this->global,$result,NULL);		
	}

	function edit_state() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);		
		$result['single_state'] = $this->Location_model->state_edit($id);
		
		$result['countries'] = $this->Location_model->show_your_countries(); 

		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/location/edit-state',$this->global,$result, NULL);			
	}	

	function update_state()
	 {

	 	$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		$_POST['id'] = $id;
	 	
	 	$this->form_validation->set_rules('state_name', 'State', 'required');	
		$this->form_validation->set_rules('country_id', 'Country Name', 'required');

		if($this->form_validation->run()) {

			//print_r($_POST); die();

			$result = $this->Location_model->update_your_state($_POST);

			if($result == true){
				
				$this->session->set_flashdata('message','State updated successhully!');

				redirect(base_url('admin/state/show-state'));

			}else {
				$this->session->set_flashdata('message','State not updated');
				$this->update_state();
			}
		}else {
			//echo "string"; die();
			$this->edit_state();
		}
	} 


//CITY

	function add_new_city()
	{ 	 		
		$this->global['pageTitle'] = 'Benslist : Add City';

		$result['states'] = $this->Location_model->show_your_states();
		
		$this->loadViews('admin/location/add-city',$this->global,$result,NULL);			
		
	}

	public function insert_city()  
	{
		
		$this->form_validation->set_rules('state_id', 'State', 'required');	
		$this->form_validation->set_rules('city_name', 'City Name', 'required');  
		if($this->form_validation->run()) {

			$result = $this->Location_model->insert_your_city($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','City added successfully!');

				redirect(base_url('admin/city/add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				$this->add_new_city();
			}
		}else {
			
			$this->add_new_city();
		}		
		
	}

	function show_city()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show City';

		$result['cities'] = $this->Location_model->show_your_cities();
		
		$this->loadViews('admin/location/show-city',$this->global,$result,NULL);		
	}

	function edit_city() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);		
		$result['single_city'] = $this->Location_model->city_edit($id);
		$result['states'] = $this->Location_model->show_your_states(); 

		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/location/edit-city',$this->global,$result, NULL);			
	}

	function update_city()
	 {

	 	$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		$_POST['id'] = $id;
	 	
		$this->form_validation->set_rules('state_id', 'State', 'required');	
		$this->form_validation->set_rules('city_name', 'City Name', 'required');  

		if($this->form_validation->run()) { 

			$result = $this->Location_model->update_your_city($_POST);

			if($result == true){
				
				$this->session->set_flashdata('message','City updated successhully!');

				redirect(base_url('admin/city/show-city'));

			}else {
				$this->session->set_flashdata('message','City not updated');
				$this->update_city();
			}
		}else { 
			$this->edit_city();
		}
	}

	

	

 
	
 }
?>
