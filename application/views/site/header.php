<?php 
  
 ?>
<!DOCTYPE html>
<html lang="en">
   <head><!-- Global site tag (gtag.js) - Google Analytics -->

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Benslist Classified</title>

 
 

	  <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
      <link rel="icon" type="<?php echo base_url('site-assets/'); ?>image/png" href="images/favicon.png">
      
	  <!-- Bootstrap CSS -->
      <link href="<?php echo base_url('site-assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
      
	  <!-- Custom CSS -->
      <link href="<?php echo base_url('site-assets/'); ?>css/style.css" rel="stylesheet">
      
	  <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?php echo base_url('site-assets/'); ?>plugins/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo base_url('site-assets/'); ?>plugins/owl-carousel/owl.theme.css">
      
	  <!-- Font Awesome -->
      <link href="<?php echo base_url('site-assets/'); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- TIME PICKER  --> 
      <link href="<?php echo base_url('site-assets/time-picker/dist/wickedpicker.min.css'); ?>" rel="stylesheet" type="text/css">
   </head>
   <body>
	  
	  <!-- Preloder -->
	  <div id="preloader"></div>
	  <!-- End Preloder -->
	 
	  <!-- Navbar -->
      <nav class="navbar top-header" role="navigation">
         <div class="container">
            <div class="navbar-header col-sm-2">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php echo base_url(); ?>"><img alt="logo" src="<?php echo base_url('site-assets/'); ?>images/logo.png" ></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li class="dropdown">
                     <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> Categories <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <?php foreach ($categories as $key => $category) { ?>
                           <li>
                              <a href="<?php echo base_url('category-list/'.$category['slug']); ?>"><i class="fa fa-fw fa-angle-right"></i><?php echo ucfirst($category['name']); ?></a>
                           </li>
                        <?php } ?>
                     </ul>
                  </li> 
                  <li class="dropdown">
                     <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> Give Away<b class="caret"></b></a> 
                     <ul class="dropdown-menu">
                        <li>
                           <a href="<?php echo base_url('giveaway/create-giveaway-listing') ?>"><i class="fa fa-fw fa-angle-right"></i>Give Away Insert</a>
                           <a href="<?php echo base_url('giveaway/giveaway-page') ?>"><i class="fa fa-fw fa-angle-right"></i>Give Away Items</a>  
                        </li>  
                     </ul>
                  </li>  
                  <li><a href="<?php echo base_url('payment-package'); ?>">Pricing</a></li> 
                  <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                  <li><a href="<?php  if(!$this->session->userdata('userId')){ echo base_url('login'); }else { echo base_url('create-post');} ?>">Post Ad</a></li>
                  <li><div id="google_translate_element" class="translate"></div></li>
                  <!-- <li class="dropdown">
                     <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> Languages <b class="caret"></b></a> 
                     <ul class="dropdown-menu">
                        <li>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>English</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>German</a> 
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>French</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Danish</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Russian</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Dutch</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Spanish</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Arabic</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Portuguese</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Urdu</a>                             
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Polish</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Hindi</a>
                           <a href=""><i class="fa fa-fw fa-angle-right"></i>Urdu</a> 
                        </li>  
                     </ul>
                  </li>   -->   
               </ul>
               <?php 
              if(!$this->session->userdata('userId'))
              {  ?> 
                  <div class="user-login pull-right">
                     <a href="<?php echo base_url('signup'); ?>">REGISTER</a>
                     <span>or</span>  
                     <a class="btn btn-md btn-primary" href="<?php echo base_url('login'); ?>">Sign In</a>
                  </div>
              <?php } 
              else
               { ?>
                  <div class="user-dropdown pull-right">
                     <ul class="nav navbar-right top-nav">
                        <li class="dropdown">
                           <a aria-expanded="true" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url('site-assets/'); ?>images/user.jpg" alt="User Image" class="user-dp"> Benslist User<b class="caret"></b></a>
                           <ul class="dropdown-menu">
                              <li>
                                 <a href="<?php echo base_url('my-ads'); ?>"><i class="fa fa-fw fa-pencil"></i> My Ads</a>
                              </li>
                              <li>
                                 <a href="<?php echo base_url('settings'); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                              </li>
                              <li>
                                 <a href="<?php echo base_url('favourite'); ?>"><i class="fa fa-fw fa-heart"></i> Favourite Ads</a>
                              </li>
                              <li>
                                 <a href="<?php echo base_url('chat-page') ?>"><i class="fa fa-fw fa-comment"></i> Chat</a>
                              </li> 
                              <li>
                                 <a href="<?php echo base_url('faq') ?>"><i class="fa fa-fw fa-comment"></i> FAQ</a>
                              </li> 
                              <li>
                                 <a href="<?php echo base_url('giveaway/giveaway-ads') ?>"><i class="fa fa-fw fa-comment"></i> Giveaway Ads</a>
                              </li> 
                              <li>
                                 <a href="<?php echo base_url('settings'); ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                              </li>
                              <li>
                                 <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                   </div>
                 <?php } ?> 
            </div>
         </div>
      </nav>
      <!-- End Navbar -->
      
	  