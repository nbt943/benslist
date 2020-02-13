<?php 
  // echo '<pre>' ; print_r($requests_seller);die; 
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
      <section class="my-ads">
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
                  if($this->session->flashdata('message'))
                  {
                    echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
                  } ?>                
                  <div class="widget my-profile margin-bottom-none">
                    <div class="widget-header">   
                      <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#request">Requests</a></li>
                        <li><a data-toggle="pill" href="#send">Send </a></li> 
                      </ul>
                      
                      <div class="tab-content">
                        <div id="request" class="tab-pane fade in active">
                          <table id="request-table" class="table table-bordered table-hover">
                            <thead>                        
                            <tr>
                              <th>S. No.</th>
                              <th>Buyer Name</th>
                              <th>Food </th> 
                              <!-- <th>Contact</th>  -->
                              <th>Pickup Time</th> 
                              <th>Status</th> 
                              <th>Action</th> 
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i=1; foreach ($requests_buyer as $key => $request_buyer) { ?>
                            <tr>
                              <td><?php echo $i++ ?></td> 
                              <td><?php echo $request_buyer['buyer'] ?></td> 
                              <td><?php echo $request_buyer['title'] ?></td>  
                              <!-- <td><?php  ?></td>   -->
                              <td><?php echo $request_buyer['pick_time'] ?></td>  
                              <td><?php echo ucfirst($request_buyer['status']) ?></td>
                              <td>
                                <?php $buyer_id = $request_buyer['buyer_id']*7523; ?>
                                <a id="<?php echo $buyer_id ?>" class="btn approved-giveaway-listing" title="Approved"><i class="fa fa-thumbs-up"></i></a>            
                                <a id="<?php echo $buyer_id ?>" class="btn disapproved-giveaway-listing" title="Disapproved"><i class="fa fa-thumbs-down"></i></a>          
                              </td>
                              </tr>  
                              <?php }  ?>   
                            </tbody>                 
                          </table>  
                        </div>
                        <div id="send" class="tab-pane fade">
                          <table id="request-table" class="table table-bordered table-hover">
                            <thead>                        
                            <tr>
                              <th>S. No.</th>
                              <th>Seller Name</th>
                              <th>Food </th> 
                              <!-- <th>Contact</th>  -->
                              <th>Pickup Time</th> 
                              <th>Status</th>  
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i=1; foreach ($requests_seller as $key => $request_seller) { ?>
                            <tr>
                              <td><?php echo $i++ ?></td> 
                              <td><?php echo $request_seller['seller'] ?></td> 
                              <td><?php echo $request_seller['title'] ?></td>  
                              <!-- <td><?php  ?></td>   -->
                              <td><?php echo $request_seller['pick_time'] ?></td>  
                              <td><?php echo ucfirst($request_seller['status']) ?></td> 
                              </tr>  
                              <?php } ?>   
                            </tbody>                 
                          </table>  
                        </div>                           
                      </div>                    
                    </div> 
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End My Ads -->
      
	  <!-- Footer -->
