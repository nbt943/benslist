<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Home extends BASEController {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');  
		$this->load->library('session'); 
		$this->load->model('Listing_model'); 
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->load->model('Brand_model');
		$this->load->model('Post_ad_form_model');
		$this->load->model('Location_model'); 
	}

	public function index()
	{     


		$result = $this->Category_model->show_your_categories(); 

		if ($result == '') {
			
			$result['categories'] = array();			

		}else{
			$result['categories'] = $result;  
		}

		$result['listings'] = $this->Listing_model->show_your_listings();

		if ($result == '') {
			
			$result['listings'] = array();			

		}else{
			$result['listings'] = $result;			
		}


		$this->load->view('index',$result);		
		 	
	}

	public function selected_subcategory()
	{ 
		$last = $this->uri->total_segments();
		$cat_slug = $this->uri->segment($last);		
		$result['categories'] = $this->Category_model->show_limit_categories();
		$result['show_sub_categories_by_cat_slug'] = $this->Subcategory_model->show_sub_categories_by_cat_slug($cat_slug);		
		$result['listings'] = $this->Listing_model->show_your_listings();
		$this->load->view('listing-subcategories',$result);   
	}
	public function selected_brand()
	{ 


		$result['categories'] = $this->Category_model->show_limit_categories();
		$result['listings'] = $this->Listing_model->show_your_listings();

		$this->load->view('item',$result);   
	}

	public function item_show()
	{ 


		$result['categories'] = $this->Category_model->show_limit_categories();
		$result['listings'] = $this->Listing_model->show_your_listings();

		$this->load->view('item',$result);   
	}

	public function ad_an_post()
	{  

		$last = $this->uri->total_segments();
		$sub_cat_slug = $this->uri->segment($last);		
		$categories = $this->Category_model->show_your_categories();
		$sub_categories = $this->Subcategory_model->show_your_subcategories();
		$countries = $this->Location_model->show_your_countries();
		$states = $this->Location_model->show_your_states();
		$cities = $this->Location_model->show_your_cities();
 		$brands = $this->Brand_model->show_your_brands_by_sub_cat($sub_cat_slug);
 
		if ($brands == '') {
			
			$result['brands'] = "";			

		}else{
			$result['brands'] = $brands;
		}

		if ($categories == '') {
			
			$result['categories'] = array();			

		}else{
			$result['categories'] = $categories;
		}

		if ($sub_categories == '') {
			
			$result['sub_categories'] = array();			

		}else{
			$result['sub_categories'] = $sub_categories;
		}

		if ($countries == '') {
			
			$result['countries'] = array();			

		}else{
			$result['countries'] = $countries;
		}

		if ($states == '') {
			
			$result['states'] = array();			

		}else{
			$result['states'] = $states;
		}

		if ($cities == '') {
			
			$result['cities'] = array();			

		}else{
			$result['cities'] = $cities;
		}


		$this->load->view('post-ad-form',$result);   
	}

	public function ad_post()
	{ 

		$categories = $this->Category_model->show_your_categories();
		$sub_categories = $this->Subcategory_model->show_your_subcategories();
 		$brands = $this->Brand_model->show_your_brands();
 
		if ($brands == '') {
			
			$result['brands'] = array();			

		}else{
			$result['brands'] = $brands;
		}

		if ($categories == '') {
			
			$result['categories'] = array();			

		}else{
			$result['categories'] = $categories;
		}

		if ($sub_categories == '') {
			
			$result['sub_categories'] = array();			

		}else{
			$result['sub_categories'] = $sub_categories;
		}


		$this->load->view('post-ad',$result);   
	}
 
	public function insert_site_listing()
	{ 


		print_r($_POST); die();
		for ($i=1 ; $i<=6; $i++)
		{

			if($_FILES['img_'.$i]['name'] != '')
			{
				$config['upload_path']          = './assets/images/site-listings/';
				$config['allowed_types']        = 'gif|jpg|png';
				$new_name = time().$i.'-'.preg_replace('/\s+/', '', $_FILES['img_'.$i]['name']);
				$config['file_name'] = $i;
	            $this->load->library('upload', $config);
				$this->upload->do_upload();
					if ( ! $this->upload->do_upload('img_'.$i))
					{
						$error = array('error' => $this->upload->display_errors());
						$_POST['image_'.$i] = "";
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$_POST['image_'.$i] = $new_name;
				}
	   	    }
		}
		$other_info = $_POST['other_info'];
		unset($_POST['other_info']);

		$vehical_data  = json_encode($other_info);
		$_POST['other_info'] = $vehical_data;

		$listing_result = $this->Post_ad_form_model->site_listing_insert($_POST);

		if ($listing_result == '') {
			
			$result['listing_data'] = array();			

		}else{
			$result['listing_data'] = $listing_result;			


		}

		redirect(base_url('submit-post')); 

	}  

 	public function listing_categories()
	{ 

		$result['categories'] = $this->Category_model->show_your_categories();

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			
			$result['categories'] = array();			

		}else{
			$result['categories'] = $categories;			
		}


		$this->load->view('listing-categories',$result);   
	}
	

	public function benslist_help()
	{

		$result['categories'] = $this->Category_model->show_your_categories();

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {

			$result['categories'] = array();

		}else{
			$result['categories'] = $categories;


		}


		$this->load->view('benslist-help',$result);
	}

	public function benslist_setting()
	{

		$result['categories'] = $this->Category_model->show_your_categories();

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {

			$result['categories'] = array();

		}else{
			$result['categories'] = $categories;
		}

		$this->load->view('benslist-setting',$result);
	}

	public function my_ads()
	{

		$result['categories'] = $this->Category_model->show_your_categories();

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {

			$result['categories'] = array();

		}else{
			$result['categories'] = $categories;


		}


		$this->load->view('my-ads',$result);
	}

	public function post_submit()
	{
		$result['categories'] = $this->Category_model->show_your_categories();

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {

			$result['categories'] = array();

		}else{
			$result['categories'] = $categories;
		}


		$this->load->view('post-submit',$result);
	}

}
