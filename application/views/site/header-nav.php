<!DOCTYPE html>
<html lang="en">
   <head><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120909275-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120909275-1');
</script>
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
   </head>
   <body>
     
     <!-- Preloder -->
     <div id="preloader"></div>
     <!-- End Preloder -->
     
     <!-- Navbar -->
      <nav class="navbar top-navbar" role="navigation">
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
                              <a href="<?php echo base_url('category'); ?>"><i class="fa fa-fw fa-angle-right"></i><?php echo $category['name']; ?></a>
                           </li>
                        <?php } ?>
                     </ul>
                  </li>
                  <li><a href="<?php echo base_url('pricing'); ?>">Pricing</a></li>
                  <li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
                  <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                  <!-- <li class="dropdown">
                     <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">Blog <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li>
                           <a href="blog.html"><i class="fa fa-fw fa-angle-right"></i> Blog</a>
                        </li>
                        <li>
                           <a href="blog_details.html"><i class="fa fa-fw fa-angle-right"></i> Blog Details</a>
                        </li>
                     </ul>
                  </li> -->
               </ul> 
                <div class="user-dropdown pull-right">
                  <ul class="nav navbar-right top-nav">
                     <li class="dropdown">
                        <a aria-expanded="true" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url('site-assets/'); ?>images/user.jpg" alt="User Image" class="user-dp"> Benslist User<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li>
                              <a href="<?php echo base_url('settings'); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('my-ads'); ?>my-ads.html"><i class="fa fa-fw fa-pencil"></i> My Ads</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('favourite'); ?>favourite.html"><i class="fa fa-fw fa-heart"></i> Favourite Ads</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ad-alerts'); ?>ad-alerts.html"><i class="fa fa-fw fa-clock-o"></i> Ad Alerts</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('settings'); ?>settings.html"><i class="fa fa-fw fa-gear"></i> Settings</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
                </div>  
                              
               <!-- <div class="user-login pull-right">
                  <a href="<?php echo base_url('signup'); ?>">REGISTER</a>
                  <span>or</span>  
                  <a class="btn btn-md btn-primary" href="<?php echo base_url('login'); ?>">Sign In</a>
               </div> -->
            </div>
         </div>
      </nav>