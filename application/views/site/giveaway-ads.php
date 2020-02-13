<?php 
  // echo '<pre>' ; print_r($giveaway_listings);die;
 ?>


    <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="profile-breadcumb">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-left">
                  <div class="breadcumb_section">
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>My Account</li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Giveaway Requests</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- My Ads -->
      <section>
         <div class="container">
            <div class="row">
               <div class="col-sm-3">
                  <div class="widget profile-widget margin-bottom-none">
                      <div class="widget-body">
                        <div class="avatar">
                          <img src="<?php if($user_meta[0]->avatar == ''){ echo base_url('site-assets/images/users/default-user.png'); } else{ echo base_url('site-assets/images/users/'.$user_meta[0]->avatar); } ?>" class="profile-dp" alt="User Image" style="min-width:100%">
                        </div>
                        <?php $originalDate = $user['user_registered'];
                              $newtime = date("d-M-Y", strtotime($originalDate));  ?>
                         <div class="profile-info">
                           <h2 class="seller-name"><?php echo ucfirst($user['user_nicename']) ?></h2>
                           <p class="seller-detail"> Joined : <strong><?php echo $newtime ?></strong></p>
                        </div>
                        <div class="list-group">
                           <a class="list-group-item" href="<?php echo base_url('my-ads') ?>"> 
                           <i class="fa fa-fw fa-pencil"></i> My Ads
                           </a>
                           <a class="list-group-item" href="<?php echo base_url('favourite') ?>"> 
                           <i class="fa fa-fw fa-heart"></i> Favourite Ads
                           </a> 
                           <a class="list-group-item" href="<?php echo base_url('settings') ?>">
                           <i class="fa fa-fw fa-gear"></i> Settings
                           </a>
                           <a class="list-group-item" href="<?php echo base_url('logout'); ?>">
                           <i class="fa fa-fw fa-power-off"></i> Log Out</a>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-9">
               <?php
                if($this->session->flashdata('request'))
                {
                  echo '<div class="alert alert-success">'.$this->session->flashdata("request").'</div>';
                }
                ?>
                
                  <div class="widget my-profile margin-bottom-none">
                     <div class="widget-header">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <h1>My Ads</h1> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-5">
                          <button><a href="<?php echo base_url('giveaway/giveaway-requests') ?>">View Requests</a></button>
                        </div>  
                     </div>
                     <div class="widget-body">
                        <?php foreach ($giveaway_listings as $key => $giveaway_listing) { 
                              $giveaway_listing_id= $giveaway_listing['ID']*7523;
                              $giveaway_listing_id = 'BENS-'.$giveaway_listing_id.'-LIST';                              
                        ?>

                        <div class="col-md-12 col-sm-12 col-xs-12 my-ad">
                           <div class="col-md-2 col-xs-5 col-sm-2 p-0 img-round">
                              <img src="<?php echo base_url('/site-assets/images/giveaway-listings/80-80-'.$giveaway_listing['image_1'])  ?>" alt="">
                           </div>
                           <div class="col-md-3 col-xs-7 col-sm-3 p-0"> 
                               <a target="_blank" href="<?php echo base_url('giveaway/single/'.$giveaway_listing_id) ?>"><strong><?php echo $giveaway_listing['title'] ?></strong></a>
                            
                              <p><strong class="p-2"><?php if($giveaway_listing['giveaway_cate']=='f'){echo 'Food';}else{echo 'Non Food';}?></strong></p>
                               
                           </div>
                           <div class="col-md-4 col-xs-12 col-sm-4 p-0">
                            <?php $originalDate = $giveaway_listing['date'];
                                  $newtime = date("h:i A", strtotime($originalDate)); 
                            ?>
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo $newtime  ?></li>
                                 <li class="item-location"><i class="fa fa-map-marker"></i> <?php echo $giveaway_listing['city_name'] ?></li> 
                              </ul>
                           </div> 
                           <div class="col-md-3 col-xs-12 col-sm-3 action action-padding">
                              <a class="label label-success" title="" data-placement="top" data-toggle="tooltip" href="<?php echo base_url('giveaway/giveaway-post-update/'.$giveaway_listing_id) ?>" data-original-title="Edit Ad"><i class="fa fa-pencil"></i></a> 
                              <a class="label label-info" title="" data-placement="top" data-toggle="tooltip" href="<?php echo base_url('giveaway/single/'.$giveaway_listing_id) ?>" data-original-title="View Ad"><i class="fa fa-eye"></i></a>
                              <a class="label label-danger delete-giveaway-listing" title="" data-placement="top" data-toggle="tooltip" id="<?php echo $giveaway_listing_id; ?>" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                           </div> 
                        </div> 
                        <?php } ?> 
                         
                        <div class="text-center">
                           <ul class="pagination pagination-sm">
                               <?php // echo $this->pagination->create_links() ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End My Ads -->
      
	  <!-- Footer -->
