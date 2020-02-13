<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/FrontBaseController.php';

class Site extends FrontBaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');  
		$this->load->library('session'); 
		$this->load->model('Listing_model'); 
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->load->model('Brand_model');
		$this->load->model('Faq_model');
		$this->load->model('Location_model');
		$this->load->model('Chat_model');
		$this->load->model('User_model');
		$this->load->library('form_validation'); 
	}

	public function index()
	{     
		$listings = $this->Listing_model->show_your_site_listings($user_id='', $offset='',$listing_count=''); 

		if ($listings == '') {
			$result['listings'] = array();			
		}else{
			$result['listings'] = $listings;  
		}

		$user_id = $this->session->userdata('userId');
		$favourites = $this->Listing_model->show_your_favourites($user_id); 

		if ($favourites == '') {
			$result['favourites'] = array();			
		}else{
			$result['favourites'] = $favourites;  
		}


		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$sub_categories = $this->Category_model->show_your_subcategory(); 

		if ($sub_categories == '') {
			
			$result['sub_categories'] = array();			

		}else{
			$result['sub_categories'] = $sub_categories;  
		}

		$countries = $this->Location_model->show_your_countries();

		if ($countries == '') {
			$result['countries'] = array();			
		}else{
			$result['countries'] = $countries;  
		}		
		
		$this->global['pageTitle'] = 'Benslist : Home';

		$this->FrontLoadViews('site/home',$result,$this->global,NULL);						 	
	} 

	public function signup()
	{ 
		if($this->session->userdata('userId'))
		{
		 	redirect(base_url());
		}

		$categories = $this->Category_model->show_your_categories(); 
		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}
		$this->global['pageTitle'] = 'Benslist : Home'; 

		$this->FrontLoadViews('site/signup',$result,$this->global,NULL);						 	 		 
	}
	public function login()
	{ 
		if($this->session->userdata('userId'))
		{
		 	redirect(base_url()); 
		}

		$categories = $this->Category_model->show_your_categories(); 
		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}
		$this->global['pageTitle'] = 'Benslist : Home'; 

		$this->FrontLoadViews('site/login',$result,$this->global,NULL);						 				 
	}

	public function faq()
	{ 
		$faqs = $this->Faq_model->show_your_faq();
		if ($faqs == '') {
			$result['faqs'] = array();			
		}else{
			$result['faqs'] = $faqs;  
		}

		$categories = $this->Category_model->show_your_categories(); 
		
		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}
		$this->global['pageTitle'] = 'Benslist : Home'; 

		$this->FrontLoadViews('site/faq',$result,$this->global,NULL);						 		 
	}

	public function contact()
	{ 
		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$this->global['pageTitle'] = 'Benslist : Contact'; 

		$this->FrontLoadViews('site/contact',$result,$this->global,NULL); 
	}
 
	public function create_post($lists='')
	{ 
		if(!$this->session->userdata('userId'))
		{
		 	redirect(base_url('login')); 
		}

		$categories = $this->Category_model->show_your_categories(); 
		$countries = $this->Location_model->show_your_countries();
		$states = $this->Location_model->show_your_states();
		$cities = $this->Location_model->show_your_cities();

		$result['lists'] = $lists;
		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
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
		$this->global['pageTitle'] = 'Benslist : Home'; 

		$this->FrontLoadViews('site/create-post',$result,$this->global,NULL);		 
	}

	public function insert_site_listing()
	{  
		$this->form_validation->set_rules('img_1','Image','required|trim'); 
		$this->form_validation->set_rules('title','Title','required|trim|max_length[40]');
		$this->form_validation->set_rules('cat_id','Category','required');

		if(isset($_POST['sub_cat_id'])){

			$this->form_validation->set_rules('sub_cat_id','Sub Category','required');			
		}

		if (isset($_POST['brand_id'])) {
			$this->form_validation->set_rules('brand_id','Brand','required');
		}

		$this->form_validation->set_rules('product_type','Product Type','required');
		$this->form_validation->set_rules('price','Price','required|trim');
		$this->form_validation->set_rules('year','Year','required|trim|max_length[4]'); 
		$this->form_validation->set_rules('country_id','Country','required');
		$this->form_validation->set_rules('state_id','State','required');
		$this->form_validation->set_rules('city_id','City','required');
		$this->form_validation->set_rules('description','Description','required|trim');
		$this->form_validation->set_rules('name','Name','required|trim|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('phone_number','Phone Number','required|trim'); 

		if($this->form_validation->run())
		{  
		    $this->load->library('upload');

			for ($i=1 ; $i<=6; $i++)
			{
				if($_FILES['img_'.$i]['name'] != '')
				{
					$config['upload_path']          = './assets/images/site-listings/';
					$config['allowed_types']        = 'gif|jpg|png';
					 // $config['max_size']             = 100;					
					$new_name = time().$i.'-'.preg_replace('/\s+/', '', $_FILES['img_'.$i]['name']);
					$config['file_name'] = $new_name; 
 
 					$this->upload->initialize($config);
					$this->upload->do_upload();

					if ( ! $this->upload->do_upload('img_'.$i))
					{ 
						$error = array('error' => $this->upload->display_errors());
						$_POST['image_'.$i] = "";
						if($error)
						{
							$this->session->set_flashdata('image_error',$error['error']);
						}
						 
						redirect(base_url('create-post'));
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$_POST['image_'.$i] = $new_name;
					}
		   	    }
			}
 
			if(!isset($_POST['other_info']))
			{
				$other_info = '';

			}else{

				$other_info = $_POST['other_info']; 
			}

			$vehical_data  = json_encode($other_info);
			$_POST['other_info'] = $vehical_data;
			$_POST['user_id'] = $this->session->userdata('userId');
			 
			$list = $this->Listing_model->site_listing_insert($_POST); 

 				$this->load->library('image_lib');
		    	$config['image_library'] = 'gd2';
		    	$config['source_image'] = './assets/images/site-listings/'.$list['image_1'];
		    	$config['new_image'] = './assets/images/site-listings/271-161-'.$list['image_1'];		    	
		    	$config['create_thumb'] = FALSE;
		    	$config['maintain_ratio'] = true;
			    $config['width']     = 275;
			    $config['height']   = 165;		    	
			    $this->image_lib->clear();
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
			
			for ($i=1; $i <=6; $i++) { 

				if($list['image_'.$i] != ""){

		    	$config['image_library'] = 'gd2';
		    	$config['source_image'] = './assets/images/site-listings/'.$list['image_'.$i];
		    	$config['new_image'] = './assets/images/site-listings/750-500-'.$list['image_'.$i];		    	
		    	$config['create_thumb'] = FALSE;
		    	$config['maintain_ratio'] = true;
			    $config['width']     = 750;
			    $config['height']   = 500;		    	
			    $this->image_lib->clear();
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

		    	$config['image_library'] = 'gd2';
		    	$config['source_image'] = './assets/images/site-listings/'.$list['image_'.$i];
		    	$config['new_image'] = './assets/images/site-listings/190-130-'.$list['image_'.$i];		    	
		    	$config['create_thumb'] = FALSE;
		    	$config['maintain_ratio'] = true;
			    $config['width']     = 190;
			    $config['height']   = 130;		    	
			    $this->image_lib->clear();
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
				}

			}


		    	$config['image_library'] = 'gd2';
		    	$config['source_image'] = './assets/images/site-listings/'.$list['image_1'];
		    	$config['new_image'] = './assets/images/site-listings/80-80-'.$list['image_1'];		    	
		    	$config['create_thumb'] = FALSE;
		    	$config['maintain_ratio'] = true;
			    $config['width']     = 80;
			    $config['height']   = 80;		    	
			    $this->image_lib->clear();
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
			    if ( ! $this->image_lib->resize())
				{
				        echo $this->image_lib->display_errors();  
				}
 

			if ($listing_result == '') {
				$this->session->set_flashdata('message','Your post is created');
				redirect(base_url('create-post')); 

			}

		}
		else
		{
			$lists['lists'] = $_POST;

			$this->create_post($lists);
		}

	}  

	 public function favourite()
	{

		$last = $this->uri->total_segments();
		$offset = $this->uri->segment($last);


  	 	$user_id  = $this->session->userdata('userId');

		$categories = $this->Category_model->show_your_categories(); 
		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		
		$listings = $this->Listing_model->show_your_site_listings(); 

		if ($listings == '') {
			$result['listings'] = array();			
		}else{
			$result['listings'] = $listings;  
		}
 		
 		$user_meta = $this->User_model->get_users($user_id);
    	$users = $this->User_model->get_setting_profile($user_id);

    	if ($user_meta == '') {
			
			$result['user_meta'] = "";			

		}else{
			$result['user_meta'] = $user_meta;
		}

		if ($users == '') {
			
			$result['user'] = "";			

		}else{
			$result['user'] = $users;

		}


		if($offset=="favourite"){

			$offset = 0;

		}else{

			$offset = $offset;

		}

		//echo $offset; die(); 
		$favourites = $this->Listing_model->show_your_favourites($user_id,$offset); 

		$favourites_count = $this->Listing_model->count_favourites_by_user($user_id); 

		if(isset($favourites_count->fav_count)){

			$fav_count =  $favourites_count->fav_count;


		}else{

			$fav_count = 0;

		}
		if ($favourites == '') {
			$result['favourites'] = array();			
		}else{
			$result['favourites'] = $favourites;  
		}


		$this->load->library('pagination');
		$config['base_url'] = base_url('favourite');
		$config['total_rows'] = $fav_count;
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$this->global['pageTitle'] = 'Benslist : Home'; 

		$this->FrontLoadViews('site/favourite',$result,$this->global,NULL);		 

	}

	public function category_vise()
	{  
		$last = $this->uri->total_segments();
		$cat_slug = $this->uri->segment($last);
		
		$listings = $this->Listing_model->get_category_id_by_slug($cat_slug,$listing_count=''); 

		if ($listings == '') {
			$result['listings'] = array();			
		}else{
			$result['listings'] = $listings;  
		}


		$user_id = $this->session->userdata('userId');
		$favourites = $this->Listing_model->show_your_favourites($user_id); 

		if ($favourites == '') {
			$result['favourites'] = array();			
		}else{
			$result['favourites'] = $favourites;  
		}



		$categories = $this->Category_model->show_your_categories(); 
		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$sub_categories = $this->Subcategory_model->show_your_subcategories();

		if ($sub_categories == '') {
			
			$result['sub_categories'] = array();			

		}else{
			$result['sub_categories'] = $sub_categories;
		}

		$this->global['pageTitle'] = 'Benslist : Categories';  

		$this->FrontLoadViews('site/categories',$result,$this->global,NULL);
	}


	public function single_page()
	{ 
		$last = $this->uri->total_segments();
		$lid = $this->uri->segment($last);	
		preg_match_all('!\d+!', $lid, $listing_id);
		$listing_id =  $listing_id[0][0]/5359; 
		$this->Listing_model->increase_view_listings_by_id($listing_id); 
		$listings_data = $this->Listing_model->show_your_site_listings_by_id($listing_id);
	    //$this->session->set_userdata('receiver_id',$listings_data['user_id']); 
		$get_fav_count = $this->Listing_model->get_fav_count($listing_id);
		//print_r($this->session->userdata('receiver_id'));die;
 
		if ($listings_data == '') {
			$result['listings_data'] = array();			
		}else{
			$result['listings_data'] = $listings_data;  
		}

		if ($get_fav_count == '') {
			$result['get_fav_count'] = array();			
		}else{
			$result['get_fav_count'] = $get_fav_count;  
		}

		$ratings_data = $this->Listing_model->show_single_reviews($listing_id); 

		if ($ratings_data == '') { 
			$result['ratings_data'] = array(); 	
		}else{
			$result['ratings_data'] = $ratings_data['user_rating']; 
		} 

		if ($ratings_data == '') {
			$result['avg_ratings'] = array(); 	
		}else{
			$result['avg_rating'] = $ratings_data['avg_rating']; 			
		} 

		$rater_id = $this->session->userdata('userId');

		$rating_check = $this->Listing_model->reviews_check($rater_id,$listing_id,$giveaway_listing_id=''); 

		if ($rating_check == '') {
			$result['rating_check'] = array(); 	
		}else{
			$result['rating_check'] = $rating_check;
		}

		$cat_id = $listings_data['cat_id'];
		//print_r($cat_id); die();
		$listings_data_by_category = $this->Listing_model->get_site_listings_by_cat_id($cat_id,$listing_id); 
		//print_r($listings_data_by_category); die();
		if ($listings_data_by_category == '') {
			$result['listings_data_by_category'] = array();			
		}else{
			$result['listings_data_by_category'] = $listings_data_by_category;  
		}
		//print_r($listings_data_by_category); die();
		$categories = $this->Category_model->show_your_categories(); 

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$user_id = $listings_data['user_id'];

		$users = $this->User_model->get_setting_profile($user_id);

		if ($users == '') {
			$result['users'] = array();			
		}else{
			$result['users'] = $users;  
		}

		$user_meta = $this->User_model->get_users($user_id);

		if ($user_meta == '') {
			$result['user_meta'] = array();			
		}else{
			$result['user_meta'] = $user_meta;  
		}
 
		$this->global['pageTitle'] = 'Benslist : Single';  

		$this->FrontLoadViews('site/single',$result,$this->global,NULL);		 
	}

	public function my_ads()
	{ 

		if(!$this->session->userdata('userId'))
		{
			redirect(base_url('login'));
		}

		$last = $this->uri->total_segments();
		$offset = $this->uri->segment($last);

		$user_id  = $this->session->userdata('userId'); 

		$categories = $this->Category_model->show_your_categories();  

		if ($categories == '')
		{
			$result['categories'] = array();			
		}
		else{
			$result['categories'] = $categories;  
		}

		$user_meta = $this->User_model->get_users($user_id);
    	$users = $this->User_model->get_setting_profile($user_id);

    	if ($user_meta == '') {
			
			$result['user_meta'] = "";			

		}else{
			$result['user_meta'] = $user_meta;
		}

		if ($users == '') {
			
			$result['user'] = "";			

		}else{
			$result['user'] = $users;

		}

		if($offset=="my-ads")
		{
			$offset = 0;

		}
		else
		{
			$offset = $offset;
		}

		$listings = $this->Listing_model->show_your_site_listings($user_id,$offset); 

		$ads_count = $this->Listing_model->count_ads_by_user($user_id); 


		if(isset($ads_count->ad_count))
		{
			$ad_count =  $ads_count->ad_count;
		}
		else
		{
			$ad_count = 0;
		}
  
		if ($listings == '') {
			$result['listings'] = array();			
		}else{
			$result['listings'] = $listings;  
		}

		$this->load->library('pagination');
		$config['base_url'] = base_url('my-ads');
		$config['total_rows'] = $ad_count;
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		
		$this->global['pageTitle'] = 'Benslist : My Ads';  
 
 		$this->FrontLoadViews('site/my-ads',$result,$this->global,NULL);		 

		 
	}

	// public function selected_brand()
	// { 


	// 	$result['categories'] = $this->Category_model->show_limit_categories();
	// 	$result['listings'] = $this->Listing_model->show_your_listings();

	// 	$this->load->view('item',$result);   
	// }

	// public function item_show()
	// { 


	// 	$result['categories'] = $this->Category_model->show_limit_categories();
	// 	$result['listings'] = $this->Listing_model->show_your_listings();

	// 	$this->load->view('item',$result);   
	// }

	// public function ad_an_post()
	// {  

	// 	$last = $this->uri->total_segments();
	// 	$sub_cat_slug = $this->uri->segment($last);		
	// 	$categories = $this->Category_model->show_your_categories();
	// 	$sub_categories = $this->Subcategory_model->show_your_subcategories();
 // 		$brands = $this->Brand_model->show_your_brands_by_sub_cat($sub_cat_slug);
 
	// 	if ($brands == '') {
			
	// 		$result['brands'] = "";			

	// 	}else{
	// 		$result['brands'] = $brands;
	// 	}

	// 	if ($categories == '') {
			
	// 		$result['categories'] = array();			

	// 	}else{
	// 		$result['categories'] = $categories;
	// 	}

	// 	if ($sub_categories == '') {
			
	// 		$result['sub_categories'] = array();			

	// 	}else{
	// 		$result['sub_categories'] = $sub_categories;
	// 	}


	// 	$this->load->view('post-ad-form',$result);   
	// }

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
 
	// public function insert_site_listing()
	//   {

	//   	//print_r($_FILES); die();
	// 	for ($i=1 ; $i<=6; $i++) {

	// 		if($_FILES['img_'.$i]['name'] != ''){

	// 		$config['upload_path']          = './assets/images/site-listings/';
	// 		$config['allowed_types']        = 'gif|jpg|png';
	// 		$new_name = time().$i.'-'.preg_replace('/\s+/', '', $_FILES['img_'.$i]['name']);
	// 		$config['file_name'] = $i;
 	//            $this->load->library('upload', $config);
	// 		$this->upload->do_upload();
	// 			if ( ! $this->upload->do_upload('img_'.$i))
	// 			{
	// 				$error = array('error' => $this->upload->display_errors());
	// 				$_POST['image_'.$i] = "";
	// 			}
	// 			else
	// 			{
	// 				$data = array('upload_data' => $this->upload->data());
	// 				$_POST['image_'.$i] = $new_name;

	// 			}
	//    	    }
	// 	}


	// 	$this->Listing_model->site_listing_submit($_POST);

	// }  

 // 	public function listing_categories()
	// { 

	// 	$result['categories'] = $this->Category_model->show_your_categories();

	// 	$categories = $this->Category_model->show_your_categories();

	// 	if ($categories == '') {
			
	// 		$result['categories'] = array();			

	// 	}else{
	// 		$result['categories'] = $categories;			


	// 	}


	// 	$this->load->view('listing-categories',$result);   
	// }


	public function signup_new_user() 
	{			
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('user_nicename', 'Nicename', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');	//min_length[5]
		$this->form_validation->set_rules('c_pass', 'Confirm Password', 'required|matches[password]'); 
		$this->form_validation->set_rules('agree', 'Terms and Conditions', 'required'); 	
 
		if($this->form_validation->run()) 
		{	 	
			$user_email = $this->input->post('email');
			$user_password = $this->input->post('password'); 
			$user_nicename = $this->input->post('user_nicename'); 

			$result = $this->User_model->new_user_signup($user_email,$user_password,$user_nicename);

			if(count($result) >0){
               $this->session->set_userdata($result);
				redirect(base_url());
			}else {
				$this->session->set_flashdata('login',$result); 
				redirect('signup');
			}
		}else {
			
			$this->signup();
		}	
		
    }

    public function user_login_check()
    {
    	$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()) 
		{	 	
			$user_email = $this->input->post('email');
			$user_password = $this->input->post('password'); 
 
			$result = $this->User_model->check_user_login($user_email,$user_password);
			if(count($result) > 0)
            {
                foreach ($result as $res)
                {  
                    $sessionArray = array('userId'=>$res->ID,                    
	                                       'role'=>$res->user_status,
	                                       'user_email'=>$res->user_email,
	                                       'isLoggedIn' => TRUE
                                    );
                                    
			
                    $this->session->set_userdata($sessionArray);
                    
                    redirect('/');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Username or password mismatch ');
                
                redirect('/login');
            }  

		}else {
			
			$this->login();
		}		
    }

    public function user_logout()
    {
    	$this->session->sess_destroy(); 
   		redirect(base_url());
    }

 public function profile_setting()
    {
    	if(!$this->session->userdata('userId'))
    	{ 
		 	redirect(base_url('login')); 
		}

		$id = $this->session->userdata('userId');	

    	$categories = $this->Category_model->show_your_categories();
    	$user_meta = $this->User_model->get_users($id);
    	$users = $this->User_model->get_setting_profile($id);
    	// print_r($id);die; 

    	if ($categories == '') {
			
			$result['categories'] = array();			

		}else{
			$result['categories'] = $categories;
		}

    	if ($user_meta == '') {
			
			$result['user_meta'] = array();			

		}else{
			$result['user_meta'] = $user_meta;
		}

		if ($users == '') {
			
			$result['user'] = "";			

		}else{
			$result['user'] = $users;

		}
 
    	$this->load->view('site/header',$result);		
		$this->load->view('site/settings',$result);		
		$this->load->view('site/footer');
    }
    

     public function profile_setting_update()
    {  
    	if(!$this->session->userdata('userId'))
    	{ 
		 	redirect(base_url('login')); 
		} 

		$this->form_validation->set_rules('user_login', 'Username', 'required');  
		// $this->form_validation->set_rules('c_pass', 'Confirm Password', 'matches[user_pass]'); 

 
		if($this->form_validation->run())
		{	 	
			if($_FILES["profile_img"]['name'] == '')
			{
			  	$new_name = '';
			}
			else
			{
			  	$new_name = preg_replace('/\s+/', '', time().'-'.$_FILES["profile_img"]['name']);
			    $config['upload_path']          = './site-assets/images/users';
			    $config['allowed_types']        = '*';
				$config['file_name'] = $new_name;   
			    $this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('profile_img'))
				{ 
					$error = array('error' => $this->upload->display_errors()); 
					$image = '';
				}
				else
				{ 
					unlink('./site-assets/images/users/'.$_POST['profile_img_old']);
					$data = array('upload_data' => $this->upload->data());
					$image = $new_name;
				} 
			}
  
			$id = $this->session->userdata('userId'); 

			unset($_POST['profile_img_old']);

			$user_info = array('id' => $id,'info' => $_POST,'image_name' => $new_name); 
			  
			$result = $this->User_model->update_profile_setting($user_info);
			 
			if(count($result) > 0)
			{
				$this->session->set_flashdata('message','Your profile has been updated');
				redirect(base_url('settings'));

			}else {
				 $this->profile_setting();
			}

		}else {
			
			$this->profile_setting();
		} 
    }

    public function delete_account($value='')
    {
    	if(!$this->session->userdata('userId'))
    	{ 
		 	redirect(base_url('login')); 
		}	
		$id = $this->session->userdata('userId'); 

		$result = $this->User_model->account_delete($id);

		if(count($result) >0)
		{
        	$this->session->sess_destroy(); 
   			redirect(base_url());      

		}
		else
		{
			redirect(base_url('settings'));
		}

    }

    
    public function enquiries_save(){

		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'required');	//min_length[5]
		$this->form_validation->set_rules('subject', 'Subject', 'required'); 
		$this->form_validation->set_rules('message', 'Message', 'required'); 

		if($this->form_validation->run()) 
		{	 

	    	$this->Listing_model->save_your_enquiries($_POST);
			$this->load->library('email');
			$this->email->from('testph13@gmail.com', 'Benslist');
			$this->email->to($_POST['email']);
			$this->email->subject($_POST['subject']);
			$this->email->message($_POST['message']);
			$this->email->send();	    	
			$this->session->set_flashdata('contact_message', 'Thank you for getting in touch! <p>We appreciate you contacting Benslist. One of our colleagues will get back in touch with you soon! </p>');

	    	redirect(base_url('contact'));

    	}
    	else
    	{
    		$this->contact();
    	}

    }

    public function update_post()
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
		$last = $this->uri->total_segments();
		$list_id = $this->uri->segment($last);	
		preg_match_all('!\d+!', $list_id, $listing_id);
		$listing_id = $listing_id[0][0]; 
		$listing_id = $listing_id/5359; 

		$listings = $this->Listing_model->show_your_site_listings_by_id($listing_id); 

		if ($listings == '') {
			$result['listings'] = array();			
		}else{
			$result['listings'] = $listings;  
		} 

    	$this->load->view('site/header',$result);		
		$this->load->view('site/update-post');		
		$this->load->view('site/footer');
    }

    public function edit_your_post()
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

		$last = $this->uri->total_segments();
		$list_id = $this->uri->segment($last);	
		preg_match_all('!\d+!', $list_id, $listing_id);
		$listing_id = $listing_id[0][0]; 
		$listing_id = $listing_id/5359; 
		  
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('price','Price','required');
		$this->form_validation->set_rules('year','Year','required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('name','Name','required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('phone_number','Phone number','required');

		if($this->form_validation->run())
		{
			$result = $this->Listing_model->your_post_edit($listing_id,$_POST); 

			if($result)
			{
				$this->session->set_flashdata('message','Your post has been updated');
				redirect(base_url('post-update/'.$list_id));

			}else { 
				redirect(base_url('post-update/'.$list_id));
			}

		}else
		{  
			$this->update_post();
		}
	}

	public function delete_user_site_listing()
	{
		$last = $this->uri->total_segments();
		$list_id = $this->uri->segment($last); 

		$result = $this->Listing_model->user_site_listing_delete($list_id);

		if($result)
		{
			$this->session->set_flashdata('message','Your listing is deleted!');
			redirect('my-ads');
		}
	}

	public function search_filter($value='')
	{
		$new_array = array();
		parse_str($_POST['data'], $new_array);
		
		$listing = $this->Listing_model->search_filter_model($new_array);
		if($listing != '')
		{
			$result['listing'] = $listing;
		}
		else
		{
			$result['listing'] = array();
		}

		$user_id = $this->session->userdata('userId');
		$favourites = $this->Listing_model->show_your_favourites($user_id);
		if($favourites != '')
		{
			$result['favourites'] = $favourites;
		}
		else
		{
			$result['favourites'] = array();
		}
		print_r(json_encode($result));
	}

	public function reviews_insert()
	{	
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url('login')); 
		}

		$last = $this->uri->total_segments();
		$lid = $this->uri->segment($last);
 
		$url = $this->uri->segment(2);

		preg_match_all('/\d+/', $lid, $listings_id);
		
		if($url == 'single')
		{
			$listing_id =  $listings_id[0][0]/5359;
			$giveaway_listing_id = '';
		}
		if($url == 'giveaway')
		{
			$giveaway_listing_id =  $listings_id[0][0]/7523; 
			$listing_id = '';
		}
		 
		$rater_id = $this->session->userdata('userId');

		$this->load->library('upload');

		$_POST['rating_img'] ='';

		if($_FILES['rating_img']['name'] != '')
		{
			$config['upload_path']          = './site-assets/images/reviews/';
			$config['allowed_types']        = 'gif|jpg|png'; 				
			$new_name = time().'-'.preg_replace('/\s+/', '', $_FILES['rating_img']['name']); 

			$this->upload->initialize($config); 

			if ( ! $this->upload->do_upload('rating_img'))
			{ 
				$error = array('error' => $this->upload->display_errors()); 
				if($error)
				{
					$this->session->set_flashdata('image_error',$error['error']);
				}
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$_POST['rating_img'] = $new_name;
			}
   	    } 

		$rating = $this->Listing_model->insert_reviews($rater_id,$listing_id,$giveaway_listing_id,$_POST);
		if($rating == 'single')
		{
			$this->session->set_flashdata('rating','Thanks for your reviews.');
			redirect(base_url('single/'.$lid));
		}
		elseif($rating == 'false_single')
		{
			$this->session->set_flashdata('rating-error','An error is occured in review submission.');
			redirect(base_url('single/'.$lid));
		}

		elseif($rating == 'giveaway')
		{
			$this->session->set_flashdata('rating','Thanks for your reviews.');
			redirect(base_url('giveaway/single/'.$lid));
		}
		elseif($rating == 'false_giveaway')
		{
			$this->session->set_flashdata('rating-error','An error is occured in review submission.');
			redirect(base_url('giveaway/single/'.$lid));
		}
	}  


		 





 








}
