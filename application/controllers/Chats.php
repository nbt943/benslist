<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 require APPPATH . '/libraries/FrontBaseController.php';

class Chats extends FrontBaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session'); 		
		$this->load->helper('url');  
		$this->load->model('Listing_model'); 
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->load->model('Brand_model');
		$this->load->model('Faq_model');
		$this->load->model('Location_model');
		$this->load->model('User_model');
		$this->load->library('form_validation'); 
		$this->load->model('Payment_model');
		$this->load->model('Chat_model'); 

		if(!$this->session->userdata('userId')){
			redirect(base_url('login'));
		}
 
	}

	public function chat_page()
	{

  		$lid = $this->uri->segment('2');

  		if(isset($lid) && $lid !=''){

	  		preg_match_all('!\d+!', $lid, $listings_id);
			$listings_id =  $listings_id[0][0]/5359;  

			$listings_data = $this->Listing_model->show_your_site_listings_by_id($listings_id);
			$user_id = $listings_data['user_id'] ;

			$categories = $this->Category_model->show_your_categories(); 

			if ($categories == '') {
				$result['categories'] = array();			
			}else{
				$result['categories'] = $categories;  
			}

			if($user_id)
			{
	    		$create_chat = $this->Chat_model->insertMsg($user_id);
	    	}
  		}

		
		$result['users'] = $this->Chat_model->show_all_chat_users();

		$this->global['pageTitle'] = 'Benslist : Chat'; 

		if($result['users']){

		  $this->FrontLoadViews('site/chat',$result,$this->global,NULL);

		}else{
		  $this->FrontLoadViews('site/no-chat',$result,$this->global,NULL);
		}
	}

	public function block(){

		$chat_id = $this->uri->segment('3');
		//echo $chat_id; die();
		if(isset($chat_id) && $chat_id != ''){

			$reason = $this->input->post('reason');

			$result = $this->Chat_model->block_chat($chat_id,$reason);

			if($result){

				redirect('chat-page/'.$chat_id);
			}


		}

	}
}