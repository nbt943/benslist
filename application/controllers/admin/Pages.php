<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Pages extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}
	function contacts()
	{
		//$result['users'] = $this->Listing_model->get_users();		
		 		
		$this->global['pageTitle'] = 'Benslist : Add Faq';
		
		$this->loadViews('admin/pages/contacts',$this->global,NULL,NULL);			
		
	}
}

?>