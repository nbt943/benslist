<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller {

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


	}
	function chat_img(){

        $this->load->library('upload');


 		$config['upload_path']          = './assets/uploads/chat-img/';
        $config['allowed_types']        = '*';
        $_FILES['file']['name'] = time().'-'.$_FILES['file']['name'];

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('img-resize');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
        }
        echo $_FILES['file']['name']; 

 	}
	public function show_sub_cat_by_cat_id()
 	{
 		//	echo "string"; die();
 		$cat_id = $_POST['cat_id'];

		$cat_subcategories= $this->Subcategory_model->show_sub_cat_by_cat_id_model($cat_id);
		if($cat_subcategories != "") {

		foreach ($cat_subcategories as $key => $cat_subcategory) { ?>

	       	<option value="<?php echo $cat_subcategory['ID'] ?>"><?php echo $cat_subcategory['name'] ?></option>     

	    <?php  }
	    }	
		

 	}


 	public function fav()
 	{
	
		$user_id = $this->session->userdata('userId');

		$data['listing_id'] = $_POST['l_id'];
		$data['user_id'] = $user_id;

		$this->Listing_model->insert_fav($data); 	

 	}


 	public function un_fav()
 	{

		$user_id = $this->session->userdata('userId');
		$l_id = $_POST['l_id'];
		$this->Listing_model->delete_fav($l_id,$user_id); 	

 	}


 	public function show_state_by_country()
 	{
 		//	echo "string"; die();
 		$country_id = $_POST['country_id'];

		$country_states= $this->Location_model->get_your_states_ajax($country_id);
		if($country_states != "") {

		foreach ($country_states as $key => $country_state) { ?>

	       	<option value="<?php echo $country_state['ID'] ?>"><?php echo $country_state['state_name'] ?></option>     

	    <?php  } }	
		

 	}

 	public function show_city_by_state()
 	{
 		//	echo "string"; die();
 		$state_id = $_POST['state_id'];
		$states_cities= $this->Location_model->get_your_cities_ajax($state_id);
		if($states_cities != "") {

		foreach ($states_cities as $key => $states_city) { ?>

	       	<option value="<?php echo $states_city['ID'] ?>"><?php echo $states_city['city_name'] ?></option>     

	    <?php  } }	
		

 	}

 	public function load_more_listings()
 	{
		$listings = $this->Listing_model->show_your_site_listings($user_id='',$offset='',$_POST['listing_count']); 
		$user_id = $this->session->userdata('userId');
		$favourites = $this->Listing_model->show_your_favourites($user_id); 



		if($listings != ''){
		foreach ($listings as $key => $listing) { ?>

	     <div class="item col-md-3 item-margin">
	        <div class="item-ads-grid icon-blue"> 
	              <?php
	                 $listing_id= $listing['ID']*5359;
	                 $listing_id = 'BENS'.$listing_id.'LIST';
	              ?>     
	       <a href="<?php echo base_url('single/'.$listing_id) ?>">
	           <div class="item-img-grid">
	              <img alt="" src="<?php echo base_url('assets/images/site-listings/271-161-'.$listing['image_1']); ?>" class="img-responsive img-center">
	              <div class="item-title">
	           
	                 <h3>$<?php echo $listing['price'] ?></h3>
	              </div>
	           </div>
	        </a>
	           <div class="item-meta">
	              <ul>
	                 <li class="item-date"><i class="fa fa-clock-o"></i><?php echo $listing['title']; ?></li>
	                 <li class="item-cat"><i class="fa fa-glass"></i> <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><?php echo $listing['cat_name'] ?></a> , <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"> <?php echo ucfirst($listing['sub_cat_name']) ?></a></li>
	                 <li class="item-location"><a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><i class="fa fa-map-marker"></i> <?php echo $listing['country_name'] ?> </a></li>

	            <?php 
	              	$fav_list_id = '';
	              	if($this->session->userdata('userId') )
	              	{
	             	foreach ($favourites as $key => $favourite)
	             	{ 
	                	if($favourite['listing_id'] == $listing['ID'])
	                	{
	                        $fav_list_id = $listing['ID'];
	                	}
	                }
	                if(isset($fav_list_id) && $fav_list_id != '')
	                { ?>
	                <li class="item-type"><a href="javascript:void(0)" id="unfav" data-tab="<?php echo $listing['ID'] ?>"><i style="color: red" class="fa fa-heart"></i> Favourite </a></li>
	           		<?php }
	           		else
	           		{ ?>
	                <li class="item-type"><a href="javascript:void(0)" id="fav" data-tab="<?php echo $listing['ID'] ?>"><i class="fa fa-heart"></i> Favourite </a></li>
	          		<?php } ?>

	           		<?php $fav_list_id = ''; }
	           		else
	           		{ ?>
	                <li class="item-type"><a href="<?php echo base_url('login'); ?>"><i class="fa fa-heart"></i> Favourite </a></li>
	           		<?php }  ?>
	              </ul>
	           </div>
	        </div>
	    </div>	
			<?php } 
		
	  }		

 	}

 	public function cate_load_more_listings()
 	{		 	

 		$listings = $this->Listing_model->get_category_id_by_slug($_POST['cat_slug'],$_POST['listing_count']); 
 		$user_id = $this->session->userdata('userId');
		$favourites = $this->Listing_model->show_your_favourites($user_id);

		if($listings != ''){
		foreach ($listings as $key => $listing) {
		 

		?>

		 <div class="col-md-3">
            <div class="item">
               <div class="item-ads-grid icon-blue"> 
                  <div class="item-img-grid">
                     <img alt="" src="<?php echo base_url('assets/images/site-listings/'.$listing['image_1']); ?>" class="img-responsive img-center">
                     <div class="item-title">

                        <?php

                        $listing_id= $listing['ID']*5359;
                        $listing_id = 'benlsidi'.$listing_id.'bnelsls';


                        ?>                                 
                        <a href="<?php echo base_url('single/'.$listing_id) ?>"> 
                        </a>
                        <h3>$<?php echo $listing['price'] ?></h3>
                     </div>
                  </div>
                  <div class="item-meta">
                     <ul>
                        <li class="item-date"><i class="fa fa-clock-o"></i><?php echo $listing['title']; ?></li>
                        <li class="item-cat"><i class="fa fa-glass"></i> <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><?php echo $listing['cat_name'] ?></a> , <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><?php echo $listing['sub_cat_name'] ?></a></li>
                        <li class="item-location"><a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><i class="fa fa-map-marker"></i> <?php echo $listing['country_name']; ?> </a></li>

                     <?php 

                     if($this->session->userdata('userId') ) {
                     foreach ($favourites as $key => $favourite) {
                        if($favourite['listing_id'] == $listing['ID']){
                                $fav_list_id = $listing['ID'];

                        } }
                        if(isset($fav_list_id) && $fav_list_id != ''){
                        ?>
                        <li class="item-type"><a href="javascript:void(0)" id="unfav" data-tab="<?php echo $listing['ID'] ?>"><i style="color: red" class="fa fa-heart"></i> Favourite </a></li>
                  <?php }else{ ?>
                        <li class="item-type"><a href="javascript:void(0)" id="fav" data-tab="<?php echo $listing['ID'] ?>"><i class="fa fa-heart"></i> Favourite </a></li>
                  <?php    } ?>
                 <?php $fav_list_id = ''; }else{ ?>
                        <li class="item-type"><a href="<?php echo base_url('login'); ?>"><i class="fa fa-heart"></i> Favourite </a></li>
                  <?php }  ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>





<?php 
	 		}
	 	}
	}


	public function show_brand_by_sub_cat_id()
 	{
 		//	echo "string"; die();
 		$sub_cat_id = $_POST['sub_cat_id'];

		$sub_cat_brands= $this->Brand_model->show_brand_by_sub_cat_id_model($sub_cat_id);

		if($sub_cat_brands != "") {

		foreach ($sub_cat_brands as $key => $sub_cat_brand) { ?>

	       	<option value="<?php echo $sub_cat_brand['ID'] ?>"><?php echo $sub_cat_brand['name'] ?></option>     

	    <?php  }	

		}

		

 	}

 	function insert_chat_message(){


 		$result = $this->Chat_model->insertMsg($_POST['msg']);



 	}

}

