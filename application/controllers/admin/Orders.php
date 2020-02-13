<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Orders extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('order_model');
        $this->isLoggedIn();   
		
	}

    public function index()
    {

        $this->global['pageTitle'] = 'Benslist : Listings';
        
        $this->loadViews("dashboard", $this->global,NULL , NULL);
    }
	
 }
?>
