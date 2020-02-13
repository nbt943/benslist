<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Giveaway extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Listing_model'); 
		$this->load->model('Category_model');
		$this->load->model('Location_model');
		$this->load->model('Giveaway_model');
		$this->load->model('User_model');				
        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	} 

	function giveaway_listing_show()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Give Away Listing';

		$result['giveway_listings'] = $this->Giveaway_model->show_your_giveaway_site_listings($user_id='');
		
		$this->loadViews('admin/giveaway/show',$this->global,$result,NULL);		
	} 
	
	 

	public function approve_giveaway_listing()
	{
		$last = $this->uri->total_segments();
		$str = $this->uri->segment($last); 

		preg_match_all('!\d+!', $str, $id);

		$rurl = preg_replace("/[^a-z]+/", "", $str); 

		$result = $this->Giveaway_model->giveaway_listing_approve($id[0][0]);
 
		if($rurl == 'DIS'){
 
			redirect(base_url('admin/giveaway/show-giveaway-approve-listing')); 


		}elseif ($rurl == 'APP') {
 
			redirect(base_url('admin/giveaway/show-giveaway-disapprove-listing')); 

		}else{
			redirect(base_url('admin/giveaway/show-giveaway-listing')); 

		}

	}

	public function disapprove_giveaway_listing()
	{
		$last = $this->uri->total_segments();
		$str = $this->uri->segment($last); 
		preg_match_all('!\d+!', $str, $id);

		$rurl = preg_replace("/[^A-Z]+/", "", $str);
		$result = $this->Giveaway_model->giveaway_listing_disapprove($id[0][0]);


		if($rurl == 'DIS'){
 
			redirect(base_url('admin/giveaway/show-giveaway-approve-listing')); 


		}elseif ($rurl == 'APP') {
 
			redirect(base_url('admin/giveaway/show-giveaway-disapprove-listing')); 

		}else{
			redirect(base_url('admin/giveaway/show-giveaway-listing')); 

		}
 
	}

	function show_giveaway_disapprove_listing()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Disapproved Give Away Listing';

		$result['giveway_disapprove_listings'] = $this->Giveaway_model->giveaway_disapprove_listing_show();
		
		$this->loadViews('admin/giveaway/disapproved',$this->global,$result,NULL);		
	}

	function show_giveaway_approve_listing()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Approved Give Away Listing';

		$result['giveway_approve_listings'] = $this->Giveaway_model->giveaway_approve_listing_show();
		
		$this->loadViews('admin/giveaway/approved',$this->global,$result,NULL);		
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
