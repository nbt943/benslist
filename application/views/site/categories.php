<?php 

$last = $this->uri->total_segments();
$cate_slug = $this->uri->segment($last);
// echo '<pre>'; print_r($cate_slug);die();

?>
      <!-- End Navbar -->
      
	  <!-- Categories Page Search-->
      
      <!-- End Categories Page Search-->
      
	  <!-- Categories List Page -->
      <section class="categories-list main-categories-list">
         <div class="container">
            <div id="Restaurant" class="row">
               <div class="col-lg-3 col-md-3 col-sm-3">
               <?php

                  
                  
                  $order_cate = [];
                  $i=1;
                  foreach ($categories as $key => $category) 
                  { 
                     if($category['slug']==$cate_slug)
                     {
                        $order_cate[0] = $category;
                     }
                     else
                     {
                         $order_cate[$i] = $category;
                         $i++;
                     }
                  }
                     
                  for($j=0;$j<count($order_cate);$j++)
                  {                 
                  ?>
                  <div class="widget <?php if($order_cate[$j]['slug']==$cate_slug){ echo 'active-cate';} ?>">
                     <div class="widget-header">
                        <small><?php //echo $total_cate; ?></small>
                        <h1><a href="<?php echo base_url('category-list/'.$order_cate[$j]['slug']) ?>"><i class="fa fa-glass shortcut-icon icon-blue"></i><?php echo ucfirst($order_cate[$j]['name']); ?></a></h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <?php foreach ($sub_categories as $key => $sub_category) { 
                              if($sub_category['cat_id'] ==$order_cate[$j]['ID']){
                           ?>
                           <li><a href="#"><?php echo ucwords($sub_category['name']);  ?> <span class="item-numbers">155</span></a></li> 
                           <?php } } ?>
                        </ul>
                     </div>
                  </div>
               <?php } ?>
               </div>               
                      
               <div class="col-lg-9 col-md-9 col-sm-9">
                  <div class="single-categorie">
                  <?php foreach ($listings as $key => $listing) { ?>
                     <?php
                        $listing_id= $listing['ID']*5359;
                        $listing_id = 'benlsidi'.$listing_id.'bnelsls';
                     ?>
                     <div class="col-md-3 cate-append-listing">
                        <div class="item">
                           <div class="item-ads-grid icon-blue"> 
                              <div class="item-img-grid">
                                 <a href="<?php echo base_url('single/'.$listing_id) ?>"><img alt="" src="<?php echo base_url('assets/images/site-listings/271-161-'.$listing['image_1']); ?>" class="img-responsive img-center"></a>
                                 <div class="item-title">
                             
                                    <a href="<?php echo base_url('single/'.$listing_id) ?>"> 
                                    </a>
                                    <h3>$<?php echo $listing['price'] ?></h3>
                                 </div>
                              </div>
                              <div class="item-meta">
                                 <ul>
                                    <li class="item-date"><i class="fa fa-clock-o"></i><?php echo ucfirst($listing['title']); ?></li>
                                    <li class="item-cat"><i class="fa fa-glass"></i> <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><?php echo ucfirst($listing['cat_name']) ?></a> , <a href="<?php echo base_url('category-list/'.$listing['cat_slug']); ?>"><?php echo ucfirst($listing['sub_cat_name']) ?></a></li>
                                    <li class="item-location"><i class="fa fa-map-marker"></i> <?php echo ucfirst($listing['country_name']); ?></li>

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
                  <?php } ?>                    
                  </div>
                  <div class="row">
                     <div class="col-md-12" style="text-align: center;">
                     <input type="hidden" name="total_listings_no" id="total-listings-count" value="<?php echo count($listings); ?>">                  
                     <a href="javascript:void(0)"  class="btn btn-md btn-primary cate-load-more">Load More</a>
                  </div>
               </div> 
               </div>
            </div>            
         </div>
      </section>
      
      <!-- End Categories List Page -->
      
	  <!-- App Store -->
      
      <!-- End App Store -->
      
	  <!-- Footer -->

<style>
   .active-cate{
      border: 2px solid #09639e;
   }
</style>