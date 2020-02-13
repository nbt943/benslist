<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Listing_model'); 
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->load->model('Brand_model');
		$this->load->model('Faq_model');
		$this->load->model('Location_model');
		$this->load->model('Chat_model');
	}

	public function get_all_listing()
 	{
		$listings = $this->Listing_model->show_your_site_listings($user_id='', $offset='',$listing_count=''); 

		if ($listings == '') 
		{
			echo json_encode(array('status'=>'unsuccess','message'=>'listings are not available'));
		}
		else
		{
			$data = array('listings'=>$listings);
			echo json_encode(array('status'=>'success','data'=>$data));			
		}
 	}


 	public function get_all_cat_sub_brands()
 	{
		$categories = $this->Category_model->show_your_categories();

		$sub_categories = $this->Category_model->show_your_subcategory(); 

 		$brands = $this->Brand_model->show_your_brands();


		if ($categories == '') {

			$categories = "";

		}else{

			$categories = $categories;

		}
		if ($sub_categories == '') {

			$sub_categories = "";

		}else{

			$sub_categories = $sub_categories;

		}
		if ($brands == '') {

			$brands = "";

		}else{

			$brands = $brands;

		}



		$data = array('categories'=>$categories,'sub_categories'=>$sub_categories,'brands'=>$brands);

		if(count($categories) > 0){

			echo json_encode(array('status'=>'success','data'=>$data));		

		}else {

			echo json_encode(array('status'=>'unsuccess','message'=>'data is not available to show'));

		}





 	}


 	public function get_all_listing_sub_categories()
 	{


		$sub_categories = $this->Category_model->show_your_subcategory(); 

		if ($sub_categories == '') {




			echo json_encode(array('status'=>'unsuccess','message'=>'Subcategories are not available'));


		}else{


			$data = array('sub_categories'=>$sub_categories);

			echo json_encode(array('status'=>'success','data'=>$data));			

		}	

 	}

 	public function get_all_listing_brand()
 	{


 		$brands = $this->Brand_model->show_your_brands();

		if ($brands == '') {




			echo json_encode(array('status'=>'unsuccess','message'=>'brands are not available'));


		}else{


			$data = array('sub_categories'=>$brands);

			echo json_encode(array('status'=>'success','data'=>$data));			

		}	

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
	              if($this->session->userdata('userId') ) {
	              foreach ($favourites as $key => $favourite) {
	                 if($favourite['listing_id'] == $listing['ID']){
	                         $fav_list_id = $listing['ID'];

	                 } }
	                 if($fav_list_id != ''){
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
	<?php } 
		
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

