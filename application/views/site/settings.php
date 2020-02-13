<?php  
// echo '<pre>'; print_r($user);die;
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
                           <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>My Account</li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Profile Settings</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- Settings -->
      <section class="settings">
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
				  <a class="btn delete-account btn-danger btn-block"><i class="fa fa-trash"></i> Delete Account</a>
               </div>
               <div class="col-sm-6">
                  <div class="widget my-profile margin-bottom-none">
                     <div class="widget-header">
                        <?php
                    if($this->session->flashdata('message'))
                    {
                        echo '
                        <div class="alert alert-success">
                            '.$this->session->flashdata("message").'
                        </div>
                        ';
                    }
                    ?> 
                        <h1>My Account</h1>
                     </div>
                     <div class="widget-body">
                        <?= form_open('setting/update',['method'=>'POST','enctype'=>'multipart/form-data']); ?>
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <?= form_label('Username *', 'user_login',['class'=>'control-label']); ?>  
                                    <?= form_input(['type'=>'text','name'=>'user_login','placeholder'=>'Benslist','class'=>'form-control border-form','value'=>$user['user_login']] ) ?>
                                    <span class="text-danger"><?= form_error('user_login'); ?></span>         
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <?= form_label('Email Address *', 'user_email',['class'=>'control-label']); ?>  
                                    <?= form_input(['type'=>'email','name'=>'user_email','class'=>'form-control border-form','value'=>$user['user_login'],'disabled'=>'disabled'] ) ?> 
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <?= form_label('First Name *', 'first_name',['class'=>'control-label']); ?>  
                                    <?= form_input(['type'=>'text','name'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control border-form','value'=>$user_meta[0]->firstname]) ?>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <?= form_label('Last Name *', 'last_name',['class'=>'control-label']); ?>  
                                    <?= form_input(['type'=>'text','name'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control border-form','value'=>$user_meta[0]->lastname]) ?>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <?= form_label('Phone Number *', 'phone',['class'=>'control-label']); ?>   
                              <div class="input-group">
                                 <span class="input-group-addon">+44</span>
                                 <?= form_input(['type'=>'text','name'=>'phone','placeholder'=>'e.g. 123456789','class'=>'form-control border-form','value'=>$user_meta[0]->phone]) ?> 
                              </div>
                           </div> 
                           <div class="col-sm-12 p-0">
                              <div class="col-sm-3 p-0">
                                 <img id="user_img" src="#" alt="your image" style="display: none;">
                                 <div class="form-group">
                                    <?= form_label('Avatar *', 'profile_img',['class'=>'control-label']); ?> 
                                    <div class="file-field">
                                       <div class="d-flex justify-content-center">
                                          <div class="btn addphoto-btn active">
                                             <i class="fa fa-camera"></i>
                                             <h3>Add Photo</h3>
                                             <?= form_input(['type'=>'file','name'=>'profile_img','onchange'=>'render_userimg(this)']) ?> 
                                             <?= form_input(['type'=>'hidden','name'=>'profile_img_old','value'=>$user_meta[0]->avatar]) ?>
                                          </div>
                                       </div>
                                    </div> 
                                 </div>
                              </div>
                           </div> 
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <?= form_label('Password', 'user_pass',['class'=>'control-label']); ?> 
                                    <?= form_input(['type'=>'password','name'=>'user_pass','placeholder'=>'Enter New Password','class'=>'form-control border-form']) ?> 
                                    <span class="text-danger"><?= form_error('user_pass'); ?></span>         
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <?= form_label('Confirm Password', 'c_pass',['class'=>'control-label']); ?>
                                    <?= form_input(['type'=>'password','name'=>'c_pass','placeholder'=>'Confirm Your  Password','class'=>'form-control border-form']) ?> 
                                    <span class="text-danger"><?= form_error('c_pass'); ?></span>         
                                 </div>
                              </div>
                           </div>
                           <div class="form-group margin-bottom-none">
                              <div class="text-right">
                                 <?= form_button(['type'=>'submit','class'=>'btn btn-success'],'<i class="fa fa-save"></i> Save Update') ?>
                                 <?= form_button(['type'=>'reset','class'=>'btn btn-danger'],'<i class="fa fa-close"></i> Reset') ?> 
                              </div>
                           </div>
                        <?php form_close(); ?>
                     </div>
                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="widget listing-filter-block margin-bottom-none">
                     <div class="widget-header">
                        <h1>Trending Ads </h1>
                     </div>
                     <div class="widget-body">
                        <div class="similar-ads">
                           <a href="single.html">
                              <div class="similar-ad-left">
                                 <img class="img-responsive img-center" src="images/categories/restaurant/1.png" alt="">
                              </div>
                              <div class="similar-ad-right">
                                 <h4>Duis autem vel eum iriure do hen...</h4>
                                 <p><i class="fa fa-dollar"></i> 450 - <i class="fa fa-map-marker"></i> Buffalo </p>
                              </div>
                              <div class="clearfix"></div>
                           </a>
                        </div>
                        <div class="similar-ads">
                           <a href="single.html">
                              <div class="similar-ad-left">
                                 <img class="img-responsive img-center" src="images/categories/pets/1.png" alt="">
                              </div>
                              <div class="similar-ad-right">
                                 <h4>Duis autem vel eum iriure do hen...</h4>
                                 <p><i class="fa fa-dollar"></i> 450 - <i class="fa fa-map-marker"></i> Buffalo </p>
                              </div>
                              <div class="clearfix"></div>
                           </a>
                        </div>
                        <div class="similar-ads">
                           <a href="single.html">
                              <div class="similar-ad-left">
                                 <img class="img-responsive img-center" src="images/categories/real_estate/2.png" alt="">
                              </div>
                              <div class="similar-ad-right">
                                 <h4>Duis autem vel eum iriure do hen...</h4>
                                 <p><i class="fa fa-dollar"></i> 450 - <i class="fa fa-map-marker"></i> Buffalo </p>
                              </div>
                              <div class="clearfix"></div>
                           </a>
                        </div>
                        <div class="similar-ads">
                           <a href="single.html">
                              <div class="similar-ad-left">
                                 <img class="img-responsive img-center" src="images/categories/cars/1.png" alt="">
                              </div>
                              <div class="similar-ad-right">
                                 <h4>Duis autem vel eum iriure do hen...</h4>
                                 <p><i class="fa fa-dollar"></i> 450 - <i class="fa fa-map-marker"></i> Buffalo </p>
                              </div>
                              <div class="clearfix"></div>
                           </a>
                        </div>
                        <div class="similar-ads">
                           <a href="single.html">
                              <div class="similar-ad-left">
                                 <img class="img-responsive img-center" src="images/categories/job/1.png" alt="">
                              </div>
                              <div class="similar-ad-right">
                                 <h4>Duis autem vel eum iriure do hen...</h4>
                                 <p><i class="fa fa-dollar"></i> 450 - <i class="fa fa-map-marker"></i> Buffalo </p>
                              </div>
                              <div class="clearfix"></div>
                           </a>
                        </div>
                        <div class="similar-ads">
                           <a href="single.html">
                              <div class="similar-ad-left">
                                 <img class="img-responsive img-center" src="images/categories/real_estate/2.png" alt="">
                              </div>
                              <div class="similar-ad-right">
                                 <h4>Duis autem vel eum iriure do hen...</h4>
                                 <p><i class="fa fa-dollar"></i> 450 - <i class="fa fa-map-marker"></i> Buffalo </p>
                              </div>
                              <div class="clearfix"></div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Settings -->
      
	  <!-- Footer -->
 