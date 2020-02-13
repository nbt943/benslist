<?php 
   // echo '<pre>' ;print_r($listings);die;
 ?><!-- Search Box -->
<section class="search-box">
   <div class="container">
      <div class="row">
         <div class="main-search-box text-center">
            <h1 class="intro-title">Sell or Advertise anything online</h1>
            <p class="sub-title">Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more</p>
            <form id="search-form" method="POST">
               <div class="col-md-4 col-sm-4 search-input">
                  <input placeholder="What are you looking for...?" name="title" class="form-control input-lg search-form" type="text">
               </div>
               <div class="col-md-3 col-sm-3 search-input">
                  <select class="form-control input-lg search-form" name="sub_cat_id">
                     <option selected="selected" value="">All Categories</option>
                     <?php foreach ($categories as $key => $category) { ?>
                     <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - <?php echo $category['name']; ?> - </option>
                     <?php foreach ($sub_categories as $key => $sub_category) {
                        if($sub_category['cat_id'] == $category['ID']){ ?>
                     <option value="<?php echo $sub_category['ID'] ?>"><?php echo $sub_category['name']; ?></option>
                     <?php } } ?>
                     <?php } ?>
                  </select>
               </div>
               <div class="col-md-3 col-sm-3 search-input">
                  <select class="form-control input-lg search-form" name="country_id">
                     <option selected="selected" value="">All Locations</option> 
                     <?php foreach ($countries as $country) { ?> 
                     <option value="<?php echo $country['ID'] ?>"><?php echo $country['country_name'] ?></option>
                     <?php } ?>                     
                  </select>
               </div>
               <div class="col-md-2 col-sm-2 search-input">
                  <button type="button" id="search-btn" class="btn btn-primary btn-lg simple-btn btn-block">
                  <i class="fa fa-search"></i> Search</button>
               </div>
            </form>
         </div>
         <!-- <div class="top-categories margin-bottom-none">
            <h4>Popular Categories</h4>
            <a>
            <i class="fa fa-book"></i>Books
            </a>
            <a>
            <i class="fa fa-briefcase"></i>Jobs
            </a>
            <a>
            <i class="fa fa-mobile"></i>Mobiles
            </a>
            <a>
            <i class="fa fa-laptop"></i>Laptop
            </a>
            <a>
            <i class="fa fa-building-o"></i>Property
            </a>
         </div> -->
      </div>
   </div>
</section>
      <!-- End Search Box -->
      
	  <!-- Featured Products -->
      <section class="featured-products">
         <div class="container">
            <div class="row append-listing">
                  <div class="carousel-section-header">
                     <h1>Featured Ads <a class="btn btn-md btn-primary pull-right">Show More Items <b>24727</b> <i class="fa fa-arrow-right"></i></a></h1>
                  </div>
                  <?php foreach ($listings as $key => $listing) { if($listing['status']=='1'){ 
                       // print_r($listing); die();

                     ?>

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
                                 <li class="item-date"><i class="fa fa-clock-o"></i><?php echo ucfirst($listing['title']); ?></li>
                                 <li class="item-cat"><i class="fa fa-glass"></i> <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><?php echo ucfirst($listing['cat_name']) ?></a> , <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"> <?php echo ucfirst($listing['sub_cat_name']) ?></a></li>
                                 <li class="item-location"><i class="fa fa-map-marker"></i> <?php echo ucfirst($listing['country_name']) ?></li>

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
                              <?php } ?>

                              <?php $fav_list_id = ''; }else{ ?>
                                 <li class="item-type"><a href="<?php echo base_url('login'); ?>"><i class="fa fa-heart"></i> Favourite </a></li>
                              <?php }  ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                  <?php } } ?> 

            </div>
            <div class="row">
               <div class="col-md-12" style="text-align: center;">
                  <input type="hidden" name="total_listings_no" id="total-listings-count" value="<?php echo count($listings); ?>">                  
                  <a href="javascript:void(0)"  class="btn btn-md btn-primary load-more">Load More</a>
               </div>
            </div>      
         </div>
      </section>

      <!-- End Featured Products -->
      
	  <!-- Trending ads -->

     
      <!-- End tranding ads -->   
	  <!-- Footer -->
 <style type="text/css">
    
.item-margin{

   margin-bottom: 35px;

 } 

 </style>