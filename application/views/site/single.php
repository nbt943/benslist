 <?php 
 
// echo '<pre>';print_r($rating_check);die;

   $last = $this->uri->total_segments(); 
   $listings_id = $this->uri->segment($last);

 ?> 

                        

      <!-- End Navbar -->
      
	  <!-- Categories Page Search-->
      
      <!-- End Categories Page Search-->
      
	  <!-- Single Detail -->
      <section class="single-detail">
         <div class="container">
            <div class="row">
               <?php
                  if($this->session->flashdata('rating'))
                   {
                     echo '
                     <div class="alert alert-success">
                        '.$this->session->flashdata("rating").'
                    </div>
                    ';
                  }
                  if($this->session->flashdata('rating-error'))
                   {
                     echo '
                     <div class="alert alert-danger">
                        '.$this->session->flashdata("rating-error").'
                    </div>
                    ';
                  }
                  if($this->session->flashdata('image_error'))
                   {
                     echo '
                     <div class="alert alert-danger">
                        '.$this->session->flashdata("image_error").'
                    </div>
                    ';
                  }
               ?>
               <div class="col-lg-8 col-md-6 col-sm-6">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="item single-ads">
                           <div class="item-ads-grid margin-bottom-none">
                              <div class="item-title-single">
                                 <a>
                                    <h1><?php echo ucfirst($listings_data['title']) ?></h1>
                                 </a>
                                 <div class="item-meta">
                                    <ul>
                                       <li class="item-date"><i class="fa fa-clock-o"></i> <?php 

                                          $originalDate = $listings_data['start_date'];
                                          $newtime = date("h:i A", strtotime($originalDate));
                                          echo $newtime; 
                                       ?> </li>
                                       <li class="item-cat">
                                          <i class="fa fa-chain"></i> 
                                          <?php echo ucfirst($listings_data['cat_name']) ?>,
                                          <?php echo ucfirst($listings_data['sub_cat_name']) ?>
                                       </li>
                                       <li class="item-location">
                                          <i class="fa fa-map-marker"></i> <?php echo ucfirst($listings_data['city_name']); ?>
                                       </li>
                                       <li class="item-type">
                                          <i class="fa fa-money"></i><?php echo $listings_data['price']; ?> 
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="item-img-grid">
                                 <div class="favourite-icon">
                                    <a class="fav-btn" title="" data-placement="bottom" data-toggle=" " data-original-title="Save Ad"><?php echo $get_fav_count->fav_count; ?> <i class="fa fa-heart"></i></a>
                                 </div>
                                 <div id="sync1" class="owl-carousel">
                                 	<?php 
                                      // print_r($listings_data); die();
                                 		for ($i=1; $i<=6; $i++) { 

                                 			if($listings_data['image_'.$i] != ""){

                                 		 ?>

                                   <div class="item">
                                    <img alt="" src="<?php echo base_url('assets/images/site-listings/750-500-'.$listings_data['image_'.$i]); ?>" class="img-responsive img-center"></div>

                                 	<?php } }  ?>
                               	
                               	 </div>

                                 <div id="sync2" class="owl-carousel">
                                  	<?php 
                                 		for ($i=1; $i<=6; $i++) { 
                                 			if($listings_data['image_'.$i] != ""){
                                 		 ?>

                                   <div class="item"><img alt="" src="<?php echo base_url('assets/images/site-listings/190-130-'.$listings_data['image_'.$i]); ?>" class="img-responsive img-center"></div>


                                 	<?php } } ?>

                                 </div>
                              </div>
                              <div class="single-item-meta">
                                 <h4><strong>Spesification</strong></h4>
                                 <table class="table table-condensed table-hover table-bordered">
                                    <tbody>
                                       <tr>
                                          <td>Classified ID</td>
                                          <td><?php echo $listings_id ?></td>
                                       </tr>
                                       <tr>
                                          <td>Condition</td>
                                          <td><?php echo ucfirst($listings_data['product_type']) ?></td>
                                       </tr>
                                       <tr>
                                          <td>Brand</td>
                                          <td><?php echo ucfirst($listings_data['brand_name']) ?></td>
                                       </tr>
                                       <tr>
                                          <td>Price</td>
                                          <td><?php echo $listings_data['price']; ?></td>
                                       </tr>
                                    </tbody>
                                 </table>



                                 <h4><strong>Description</strong></h4>
                                 <p>
                            		<?php echo $listings_data['description']; ?>
                                 </p>
<!--                                  <ul>
                                    <li><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i> Geotagging &ndash; add location info to your photos</li>
                                    <li><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i> Object tracking &ndash; lock focus on a specific object</li>
                                    <li><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i> Red-eye reduction</li>
                                    <li><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i> Image capture, supported file format: JPEG</li>
                                    <li><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i> Image playback, supported file formats: BMP, GIF, JPEG, PNG; WebP</li>
                                    <li><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i> Video capture, supported file formats: 3GPP, MP4</li>
                                    <li><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i> Video playback, supported file formats: 3GPP, MP4, M4V, AvI, XVID, WEBM</li>
                                 </ul> -->
                              </div>
                              <div class="item-footer">
                                 <div class="row">
                                    <div class="col-xs-12 col-md-8">
                                       <span class="item-views"> <i class="fa fa-eye"></i> Ad Views : <b><?php echo $listings_data['total_views']; ?></b></span>
                                    </div>
                                    <div class="col-xs-12 col-md-4 pull-rights">
                                       <?php if($rating_check != '1'){ ?>
                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#review_modal"><i class="fa fa-star"></i> Write a Review</button>
                                    <?php } ?>
                                    </div>
                                    <!--  <div class="col-xs-12 col-md-7 text-right-md">
                                       <div class="share-widget text-right">
                                          <span>Share This Ad : </span>
                                          <div class="social-links social-bg pull-right">
                                             <ul>
                                                <li><a class="fa fa-twitter" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-facebook" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-google-plus" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-instagram" target="_blank" href="#"></a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
 
                  <div class="row mt-4">
                     <div class="col-sm-12"> 
                        <div class="widget my-profile margin-bottom-none">
                           <div class="widget-header avg_rating">
                              <h2><b>Product Rating and Reviews</b></h2> 
                              <?php if(isset($avg_rating[0]['rating'])){
                                    for($j = 1;$j<=5;$j++)
                                    { 
                              ?> 
                                    <i class="fa fa-star <?php if(round($avg_rating[0]['rating']) >= $j){ echo 'star-checked';} ?>"></i>

                              <?php }}else {echo '<b>No ratings yet.</b>';} ?>


                           </div>
                           <div class="widget-body">
                              <?php $i = 973; foreach ($ratings_data as $key => $rating_data) { ?>                                          

                              <p class="collapse-heading" data-toggle="collapse" data-target="#<?php echo 'demo'.$i ?>"><i class="fa fa-user"></i><b> <?php if(isset($rating_data['user_nicename'])){echo $rating_data['user_nicename'];}  ?></b>
                              <span class="pull-right">
                                 <?php for($j = 1;$j<=5;$j++)
                                       { 
                                 ?>
                                    <i class="fa fa-star <?php if($rating_data['rating'] >= $j){ echo 'star-checked';} ?>"></i>

                                 <?php } ?>
                                 </span>
                              </p>
                              <div id="<?php echo 'demo'.$i ?>" class="collapse">
                                 <p><?php if(isset($rating_data['comments'])){ echo $rating_data['comments']; } ?>

                                 <!-- echo $rating_data['comments'] -->
                                 <?php 
                                    $orgDate = $rating_data['date'];
                                    $rating_date = date("d M Y", strtotime($orgDate)); 
                                 ?>
                                 <p class="review_date"><?php echo $rating_date ?></p>
                                 <hr>
                              </div>  


                              <?php $i = $i*2; $i++; } ?> 
                                
                           </div>
                        </div>
                     </div>
                  </div>

               </div>


               



               <!-- The Modal -->
               <div class="modal fade" id="review_modal">
                  <div class="modal-dialog modal-xl">
                     <div class="modal-content">                     
                       <!-- Modal Header -->
                        <div class="modal-header">
                           <h4 class="modal-title"><b> Write A Review</b></h4>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                       
                       <!-- Modal body -->
                        <div class="modal-body">
                           <div class="form-group" id="rating-ability-wrapper">
                              <!-- <label class="control-label" for="rating">  -->
                              <!-- <span class="field-label-info"></span> -->
                              <!-- </label> -->
                              <h2 class="bold rating-header" style="">
                              <span class="selected-rating">0</span><small> / 5</small>
                              </h2>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                           </div>

                           <div class="form-group">
                              <?= form_open('reviews/single/insert/'.$listings_id,['id'=>'rating_val','method'=>'POST','enctype'=>'multipart/form-data']); ?>                                 
                                 <?= form_input(['type'=>'hidden','name'=>'star_rates','id'=>'selected_rating'] ) ?>
                                 <textarea rows=5 placeholder="Write a review..." name="reviews"></textarea> 

                                 <div class="row">
                                    <div class="col-md-4">
                                       <img id="rating-img_1" src="#" alt="your image" style="display: none;" />
                                       <div class="file-field">
                                          <div class="d-flex justify-content-center">
                                             <div class="btn addphoto-btn active">
                                                <i class="fa fa-camera"></i>
                                                <h3>Add Photo</h3>
                                                 <?= form_input(['type'=>'file','name'=>'rating_img','onchange'=>'rating_img_render(this)']) ?>
                                             </div>
                                          </div>
                                       </div> 
                                    </div>
                                 </div>
                              
                                 <div class="row">                              
                                    <div class="modal-footer col-md-offset-6">
                                       <!-- <button type="submit" class="btn btn-primary">Submit</button>  -->
                                       <?= form_button(['type'=>'submit','class'=>'btn btn-primary'],'<i class="fa fa-save"></i> Submit') ?>
                                    </div>
                                 </div>
                              <?php form_close(); ?>
                           </div>
                        </div>                                                
                     </div>
                  </div>
               </div>







               <div class="col-lg-4 col-md-6 col-sm-6"> 
                  <div class="widget user-widget">
                  <div class="widget-body text-center"> 
                      <img src="<?php if($user_meta[0]->avatar == ''){ echo base_url('site-assets/images/users/default-user.png'); } else{ echo base_url('site-assets/images/users/'.$user_meta[0]->avatar); } ?>" class="user-dp" alt="User Image">
                      <!-- <span class="user-status user-online"></span> -->
                     <!-- <span class="user-status user-offline"></span> -->
                     <h2 class="seller-name"><?php echo ucfirst($users['user_nicename']) ?></h2>  
                     <p class="seller-detail"><i class="fa fa-map-marker"></i> Location: <strong><?php echo ucfirst($listings_data['city_name']) ?> </strong><br>
                        <i class="fa fa-clock-o"></i> Joined : <strong><?php  
                  $orgDate = $listings_data['user_registered_date'];
                  $newDate = date("d M Y", strtotime($orgDate));
      
                  echo $newDate;
                        ?></strong>
                     </p>
                  </div>
                  <div class="widget-footer">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="profile-action-btns text-center">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="0133 4568 9876" class="btn btn-primary btn-lg"><i class="fa fa-whatsapp"></i></a>
                              <a href="#" data-toggle="tooltip" data-placement="top" title="Send Message" class="btn btn-primary btn-lg"><i class="fa fa-envelope-o"></i></a>
                              <a  href="<?= base_url('chat-page/'.
                              $listings_id) ?>" data-toggle="tooltip" title="Live Chat" class="btn btn-primary btn-lg"><i class="fa fa-comment-o"></i></a> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                  
               <div class="listing-filters">
                  <div class="widget listing-filter-block">
                     <div class="widget-header">
                        <h1>Similar ads</h1>
                     </div>
                     <div class="widget-body">
                              
                           	<?php foreach ($listings_data_by_category as $key => $listing_data_by_category) { 
                                 $listing_id= $listing_data_by_category['ID']*5359;
                                    $listing_id = 'BENS'.$listing_id.'LIST';
                              ?>
         				   <div class="similar-ads">
                           <a href="<?php echo base_url('single/'.$listing_id); ?>">
                              <div class="similar-ad-left">
                                <img class="img-responsive img-center" src="<?php echo base_url('assets/images/site-listings/'.$listing_data_by_category['image_1']); ?>" alt="">
                              </div>
                              <div class="similar-ad-right">
                                 <h4><?php echo $listing_data_by_category['title']; ?></h4>
                                 <p><i class="fa fa-euro"></i> <?php echo $listing_data_by_category['price'] ?> - <i class="fa fa-map-marker"></i> Buffalo </p>
                              </div>
                              <div class="clearfix"></div>
                           </a>
                        </div>
                           	<?php } ?>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
   </section>
      <!-- End Category List -->
      
	  <!-- Footer -->

<style>
   .modal-header h4 {
    width: fit-content;
    float: left;
   }

   .rating-header {
    margin-top: -10px;
    margin-bottom: 10px;
}

.modal .modal-body textarea{
   width: 100%;
   max-height: unset;
   border: 1px solid #ccc;
}

.collapse-heading{
   background-color: #f4f4f4;
   padding: 10px;
}

.star-checked {
  color: orange;
}

.review_date{
   color: #bdafaf;
}

</style>