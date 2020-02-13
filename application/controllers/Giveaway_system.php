<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/FrontBaseController.php';

class Giveaway_system extends FrontBaseController {

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
		$this->load->model('Giveaway_model');
		$this->load->library('form_validation'); 	
	}

	public function giveaway_index()
	{	
		$user_id = $this->session->userdata('userId');

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$countries = $this->Location_model->show_your_countries();
		
		if ($countries == '') {
			$result['countries'] = array();			
		}else{
			$result['countries'] = $countries;  
		}

		$giveaway_listings = $this->Giveaway_model->show_your_giveaway_site_listings($user_id='');

		if ($giveaway_listings == '') {
			$result['giveaway_listings'] = array();			
		}else{
			$result['giveaway_listings'] = $giveaway_listings;  
		}

		$favourites = $this->Listing_model->show_your_favourites($user_id); 

		if ($favourites == '') {
			$result['favourites'] = array();			
		}else{
			$result['favourites'] = $favourites;  
		}

		$this->global['pageTitle'] = 'Benslist : Give Away'; 

		$this->FrontLoadViews('site/giveaway-home',$result,$this->global,NULL);
	}	 

	public function create_giveaway_listing($giveaway_lists='')
	{	
		if(!$this->session->userdata('userId'))
		{
		 	redirect(base_url('login')); 
		}

		$result['giveaway_lists'] = $giveaway_lists;

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$countries = $this->Location_model->show_your_countries();


		if ($countries == '') {
			$result['countries'] = array();			
		}else{
			$result['countries'] = $countries;  
		}

		$this->global['pageTitle'] = 'Benslist : Give away'; 

		$this->FrontLoadViews('site/create-giveaway-post',$result,$this->global,NULL);	
	} 
 
	public function insert_giveaway_post()
	{	
		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}  

		$this->form_validation->set_rules('title','Title','required|trim|max_length[40]'); 
		$this->form_validation->set_rules('img_1','Image','required|trim|max_length[40]'); 
		$this->form_validation->set_rules('giveaway_cate','Food category','required'); 
		$this->form_validation->set_rules('pick_time','Pickup time','required');
		$this->form_validation->set_rules('location','Location','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('phone_number','Phone number','required');


		if($this->form_validation->run())
		{
			$this->load->library('upload');

			for ($i=1 ; $i<=6; $i++)
			{
				if($_FILES['img_'.$i]['name'] != '')
				{
					$config['upload_path']          = './site-assets/images/giveaway-listings/';
					$config['allowed_types']        = 'gif|jpg|png';

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
						 
						redirect(base_url('giveaway/create-giveaway-listing'));
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
			}
			else
			{
				$other_info = $_POST['other_info']; 
			}

			$_POST['user_id'] = $this->session->userdata('userId');

			$giveaway = $this->Giveaway_model->giveaway_post_insert($_POST); 

			$this->load->library('image_lib');
	    	$config['image_library'] = 'gd2';
	    	$config['source_image'] = './site-assets/images/giveaway-listings/'.$giveaway['image_1'];
	    	$config['new_image'] = './site-assets/images/giveaway-listings/271-161-'.$giveaway['image_1'];		    	
	    	$config['create_thumb'] = FALSE;
	    	$config['maintain_ratio'] = true;
		    $config['width']     = 275;
		    $config['height']   = 165;		    	
		    $this->image_lib->clear();
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize(); 

		    for ($i=1; $i <=6; $i++)
			{ 
				if($giveaway['image_'.$i] != ""){

		    	$config['image_library'] = 'gd2';
		    	$config['source_image'] = './site-assets/images/giveaway-listings/'.$giveaway['image_'.$i];
		    	$config['new_image'] = './site-assets/images/giveaway-listings/750-500-'.$giveaway['image_'.$i];		    	
		    	$config['create_thumb'] = FALSE;
		    	$config['maintain_ratio'] = true;
			    $config['width']     = 750;
			    $config['height']   = 500;		    	
			    $this->image_lib->clear();
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

		    	$config['image_library'] = 'gd2';
		    	$config['source_image'] = './site-assets/images/giveaway-listings/'.$giveaway['image_'.$i];
		    	$config['new_image'] = './site-assets/images/giveaway-listings/190-130-'.$giveaway['image_'.$i];		    	
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
		    	$config['source_image'] = './site-assets/images/giveaway-listings/'.$giveaway['image_1'];
		    	$config['new_image'] = './site-assets/images/giveaway-listings/80-80-'.$giveaway['image_1'];		    	
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
				
				if($giveaway)
				{
					$this->session->set_flashdata('message','Your listing is inserted');
					redirect(base_url('giveaway/create-giveaway-listing'));
				}
				else
				{
					// $this->session->set_flashdata('message','Your listing is not inserted');
					redirect(base_url('giveaway/create-giveaway-listing'));
				}
		}
		else
		{
			$giveaway_lists['giveaway_lists'] = $_POST;

			$this->create_giveaway_listing($giveaway_lists);
		}		

			
	} 

	public function single_page_giveaway()
	{
		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$last = $this->uri->total_segments();
		$gid =  $this->uri->segment($last);
		preg_match_all('!\d+!', $gid, $giveaway_listings);
		$giveaway_listing_id =  $giveaway_listings[0][0]/7523; 

		$giveaway_listings_data = $this->Giveaway_model->giveaway_post_show_by_id($giveaway_listing_id); 
		  
		$this->session->set_userdata('buyer_id',$giveaway_listings_data['user_id']);  

		if ($giveaway_listings_data == '') {
			$result['giveaway_listings_data'] = array();			
		}else{
			$result['giveaway_listings_data'] = $giveaway_listings_data;  
		}

		$this->Giveaway_model->increase_view_giveaway_listings_by_id($giveaway_listing_id);



		$ratings_data = $this->Listing_model->show_giveaway_reviews($giveaway_listing_id);

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
		
		$rating_check = $this->Listing_model->reviews_check($rater_id,$listing_i='',$giveaway_listing_id); 

		if ($rating_check == '') {
			$result['rating_check'] = array(); 	
		}else{
			$result['rating_check'] = $rating_check;
		}



		$user_id = $giveaway_listings_data['user_id'];
 		
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

		$giveaway_cate = $giveaway_listings_data['giveaway_cate'];  

		$giveaway_listings_data_by_category = $this->Giveaway_model->get_giveaway_site_listings_by_cat_id($giveaway_cate,$giveaway_listing_id); 

		if ($giveaway_listings_data_by_category == '') {
			$result['giveaway_listings_data_by_category'] = array();			
		}else{
			$result['giveaway_listings_data_by_category'] = $giveaway_listings_data_by_category;  
		}		

		$this->global['pageTitle'] = 'Benslist : Give Away Single Page'; 

		$this->FrontLoadViews('site/giveaway-single',$result,$this->global,NULL);	
	}

	public function giveaway_requests_insert()
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url('login'));
		}

		$last = $this->uri->total_segments();
		$last_url =  $this->uri->segment($last);

		$buyer_id = $this->session->userdata('userId');   
		
		$giveaway_item_id = $_POST['giveaway_item_id']/7523;

		$giveaway_listings_data = $this->Giveaway_model->giveaway_post_show_by_id($giveaway_item_id); 
		$seller_id = $giveaway_listings_data['user_id']; 
		$giveaway_request = $this->Giveaway_model->insert_giveaway_requests($seller_id,$buyer_id,$giveaway_item_id);

		if($giveaway_request)
		{
			$this->session->set_flashdata('request','Your request has submitted');
			redirect(base_url('giveaway/single/'.$last_url));
		}
		else
		{
			// $this->session->set_flashdata('no-request','Your request has not submitted');
			redirect(base_url('giveaway/single/'.$last_url));
		} 
	}

	public function giveaway_ads()
	{
		$categories = $this->Category_model->show_your_categories();

		if ($categories == '') {
			$result['categories'] = array();			
		}else{
			$result['categories'] = $categories;  
		}

		$user_id = $this->session->userdata('userId'); 

		$users = $this->User_model->get_setting_profile($user_id);

		if ($users == '') {
			$result['user'] = array();			
		}else{
			$result['user'] = $users;  
		}

		$user_meta = $this->User_model->get_users($user_id);

		if ($user_meta == '') {
			$result['user_meta'] = array();			
		}else{
			$result['user_meta'] = $user_meta;  
		}

		$giveaway_listings = $this->Giveaway_model->show_your_giveaway_site_listings($user_id);

		if ($giveaway_listings == '') {
			$result['giveaway_listings'] = array();			
		}else{
			$result['giveaway_listings'] = $giveaway_listings;  
		}

		$this->global['pageTitle'] = 'Benslist : Give Away Ads'; 

		$this->FrontLoadViews('site/giveaway-ads',$result,$this->global,NULL);
	}

	public function delete_user_giveaway_site_listing()
	{
		$last = $this->uri->total_segments();
		$gid =  $this->uri->segment($last);
		preg_match_all('!\d+!', $gid, $giveaway_listings);
		$giveaway_listing_id =  $giveaway_listings[0][0]/7523; 

		$giveaway_listing_delete = $this->Giveaway_model->user_giveaway_site_listing_delete($giveaway_listing_id);
 
		if($giveaway_listing_delete)
		{	 
			$this->session->set_flashdata('delete_item','Your giveaway listing is deleted');
			redirect('giveaway/giveaway-requests');
		}
		else
		{
			$this->session->set_flashdata('not_delete_item','Your giveaway listing is not deleted');
			redirect('giveaway/giveaway-requests');
		}
	}

	public function update_giveaway_post()
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
		$gid =  $this->uri->segment($last);
		preg_match_all('!\d+!', $gid, $giveaway_listings);
		$giveaway_listing_id =  $giveaway_listings[0][0]/7523;

		$giveaway_listings_data = $this->Giveaway_model->giveaway_post_show_by_id($giveaway_listing_id); 
		 
		if ($giveaway_listings_data == '') {
			$result['giveaway_listings'] = array();			
		}else{
			$result['giveaway_listings'] = $giveaway_listings_data;  
		}  

		$this->global['pageTitle'] = 'Benslist : Give Away Update'; 

		$this->FrontLoadViews('site/update-giveaway-post',$result,$this->global,NULL);
	}

	public function edit_giveaway_post()
	{
		if(!$this->session->userdata('userId'))
		{
			redirect(base_url('login'));
		}

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '')
		{
			$result['categories'] = array();			
		}
		else
		{
			$result['categories'] = $categories;  
		}

		$last = $this->uri->total_segments();
		$gid =  $this->uri->segment($last);
		preg_match_all('!\d+!', $gid, $giveaway_listings);
		$giveaway_listing_id =  $giveaway_listings[0][0]/7523; 

		$this->form_validation->set_rules('title','Title','required|trim|max_length[40]'); 
		$this->form_validation->set_rules('giveaway_cate','Food category','required'); 
		$this->form_validation->set_rules('pick_time','Pickup time','required');
		$this->form_validation->set_rules('location','Location','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('phone_number','Phone number','required');

		if($this->form_validation->run())
		{
			$giveaway_listings_data = $this->Giveaway_model->giveaway_post_edit($giveaway_listing_id,$_POST); 

			if ($giveaway_listings_data) 
			{
				$this->session->set_flashdata('message','Your listing is updated');
				redirect(base_url('giveaway/giveaway-post-update/'.$gid));
			}
			else
			{
				redirect(base_url('giveaway/giveaway-post-update/'.$gid));
			} 
		}
		else{
			$this->update_giveaway_post();
		}  
	}

	public function giveaway_requests_page()
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

		$users = $this->User_model->get_setting_profile($user_id);

		if ($users == '') {
			$result['user'] = array();			
		}else{
			$result['user'] = $users;  
		}

		$user_meta = $this->User_model->get_users($user_id);

		if ($user_meta == '') {
			$result['user_meta'] = array();			
		}else{
			$result['user_meta'] = $user_meta;  
		}

		$requests_seller = $this->Giveaway_model->show_giveaway_requests_seller($user_id);

		if ($requests_seller == '') {
			$result['requests_seller'] = array();			
		}else{
			$result['requests_seller'] = $requests_seller;  
		}

		$requests_buyer = $this->Giveaway_model->show_giveaway_requests_buyer($user_id);

		if ($requests_buyer == '') {
			$result['requests_buyer'] = array();			
		}else{
			$result['requests_buyer'] = $requests_buyer;  
		}

		$this->global['pageTitle'] = 'Benslist : Requests'; 

		$this->FrontLoadViews('site/giveaway-request',$result,$this->global,NULL);
	}

	public function giveaway_requests_status()
	{
		$last = $this->uri->total_segments();
		$bid =  $this->uri->segment($last);
		preg_match_all('!\d+!', $bid, $buyer_id);
		preg_match_all('/^[a-zA-Z]+/', $bid, $requests_status);

		$buyer_id =  $buyer_id[0][0]/7523; 
		$requests_status =  $requests_status[0][0]; 
		
		if($requests_status == 'disapproved')
		{
			$request_status = 'disapproved';
		}
		else if($requests_status == 'approved')
		{
			$request_status = 'approved';
		}
		
		if($request_status != '')
		{	
			$request_status = $this->Giveaway_model->status_giveaway_requests($buyer_id,$request_status);

			$this->session->set_flashdata('message','You answered a listing');
			redirect(base_url('giveaway/giveaway-requests'));
		}
		else
		{
			redirect(base_url('giveaway/giveaway-requests'));
		}
 

	}

	public function search_filter_giveaway()
	{
		$data = array();
		parse_str($_POST['data'], $data);

		$giveaway_listing = $this->Giveaway_model->giveaway_search_filter($data);

		if($giveaway_listing == '')
		{
			$result['giveaway_listing'] = array();
		}
		else
		{
			$result['giveaway_listing'] = $giveaway_listing;
		}

		print_r(json_encode($result));
	}

















 
}

?>