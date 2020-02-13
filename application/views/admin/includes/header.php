<?php
    $last = $this->uri->total_segments();
    $id = $this->uri->segment($last);
// print_r($id);die;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- <body class="sidebar-mini skin-black-light"> -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>B</b>L</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Bens</b>list</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('admin/logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Benslist</p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>			
              
      			<li class="treeview <?php if($id=='show-listing' ||$id=='show-approve-listing'||$id=='show-disapprove-listing'){ echo "active";} ?>">
      			  <a href="#">
      				<i class="fa fa-tasks"></i>
      				<span>Listings</span>
      				<span class="pull-right-container">
      				  <i class="fa fa-angle-left pull-right"></i>
      				</span>
      			  </a>
      			  <ul class="treeview-menu">
      				<li class="<?php if($id=='show-listing'){ echo "active";} ?>"><a href="<?php echo base_url('admin/listing/show-listing') ?>"><i class="fa fa-circle-o"></i>All Listings</a></li>
              <li class="<?php if($id=='show-deleted-listing'){ echo "active";} ?>"><a href="<?php echo base_url('admin/listing/show-approve-listing') ?>"><i class="fa fa-circle-o"></i>Approved Listing</a></li>  
      				<li class="<?php if($id=='show-disapprove-listing'){ echo "active";} ?>"><a href="<?php echo base_url('admin/listing/show-disapprove-listing') ?>"><i class="fa fa-circle-o"></i>Disapproved Listing</a></li>				  
 <!--              <li><a href="<?php // echo base_url('admin/listing/add-new') ?>"><i class="fa fa-circle-o"></i>Add New List</a></li>      			 -->
      				</ul>
      			</li>

            <li class="treeview <?php if($id=='show-giveaway-listing'||$id=='show-giveaway-approve-listing'||$id=='show-giveaway-disapprove-listing'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-tasks"></i>
              <span>Give Away Listings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="<?php if($id=='show-giveaway-listing'){ echo "active";} ?>"><a href="<?php echo base_url('admin/giveaway/show-giveaway-listing') ?>"><i class="fa fa-circle-o"></i>All Give Away Listings Listings</a></li>
              <li class="<?php if($id=='show-giveaway-approve-listing'){ echo "active";} ?>"><a href="<?php echo base_url('admin/giveaway/show-giveaway-approve-listing') ?>"><i class="fa fa-circle-o"></i>Approved Give Away Listing</a></li>  
              <li class="<?php if($id=='show-giveaway-disapprove-listing'){ echo "active";} ?>"><a href="<?php echo base_url('admin/giveaway/show-giveaway-disapprove-listing') ?>"><i class="fa fa-circle-o"></i>Disapproved Give Away Listing</a></li>   
              </ul>
            </li>

            <li class="treeview <?php if($id=='show-category' ||$id=='show-deleted-category'||$id=='add-new'||$id=='sort-category'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-share"></i>
              <span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="<?php if($id=='show-category'){ echo "active";} ?>"><a href="<?php echo base_url('admin/category/show-category') ?>"><i class="fa fa-circle-o"></i>List Categories</a></li>
              <li class="<?php if($id=='show-deleted-category'){ echo "active";} ?>"><a href="<?php echo base_url('admin/category/show-deleted-category') ?>"><i class="fa fa-circle-o"></i>List deleted Category</a></li>         
              <li class="<?php if($id=='add-new'){ echo "active";} ?>"><a href="<?php echo base_url('admin/category/add-new') ?>"><i class="fa fa-circle-o"></i>Add New Category</a></li>            
              <li class="<?php if($id=='sort-category'){ echo "active";} ?>"><a href="<?php echo base_url('admin/category/sort-category')?>"><i class="fa fa-circle-o"></i>Sort Categories</a></li>            
             </ul>
            </li>
            <li class="treeview <?php if($id=='show-sub-category' ||$id=='show-deleted-sub-category'||$id=='sub-category-add-new'||$id=='sort-sub-category'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-share"></i>
              <span>Sub Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="<?php if($id=='show-category'){ echo "active";} ?>"><a href="<?php echo base_url('admin/sub-category/show-sub-category') ?>"><i class="fa fa-circle-o"></i>List Sub Categories</a></li>
              <li class="<?php if($id=='show-deleted-category'){ echo "active";} ?>"><a href="<?php echo base_url('admin/sub-category/show-deleted-sub-category') ?>"><i class="fa fa-circle-o"></i>List deleted Sub Category</a></li>         
              <li class="<?php if($id=='sub-category-add-new'){ echo "active";} ?>"><a href="<?php echo base_url('admin/sub-category/sub-category-add-new') ?>"><i class="fa fa-circle-o"></i>Add New Sub Category</a></li>            
              <li class="<?php if($id=='sort-sub-category'){ echo "active";} ?>"><a href="<?php echo base_url('admin/sub-category/sort-sub-category')?>"><i class="fa fa-circle-o"></i>Sort Sub Categories</a></li>            
             </ul>
            </li>
            <li class="treeview <?php if($id=='show-brand' ||$id=='show-deleted-brand'||$id=='brand-add-new'||$id=='sort-brand'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-share"></i>
              <span>Brand</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="<?php if($id=='show-brand'){ echo "active";} ?>"><a href="<?php echo base_url('admin/brand/show-brand') ?>"><i class="fa fa-circle-o"></i>List Brands</a></li>
              <li class="<?php if($id=='show-deleted-brand'){ echo "active";} ?>"><a href="<?php echo base_url('admin/brand/show-deleted-brand') ?>"><i class="fa fa-circle-o"></i>List deleted Brands</a></li>         
              <li class="<?php if($id=='brand-add-new'){ echo "active";} ?>"><a href="<?php echo base_url('admin/brand/brand-add-new') ?>"><i class="fa fa-circle-o"></i>Add New Brand</a></li>            
              <li class="<?php if($id=='sort-brand'){ echo "active";} ?>"><a href="<?php echo base_url('admin/brand/sort-brand')?>"><i class="fa fa-circle-o"></i>Sort Brands</a></li>            
             </ul>
            </li>
<!--             <li class="treeview">
              <a href="#">
              <i class="fa fa-filter"></i>
              <span>Advance Filter Fields</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i>List Advance Filter Fields</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i>List deleted Advance Filter Fields</a></li>         
              <li><a href=""><i class="fa fa-circle-o"></i>Add New Advance Filter Fields</a></li>            
              <li><a href=""><i class="fa fa-circle-o"></i>Sort Advance Filter Fields</a></li>            
             </ul>
            </li> -->

<!--             <li class="treeview">
              <a href="#">
              <i class="fa fa-cog"></i>
              <span>Category Features</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php //echo base_url('admin/category-feature/show-category-feature') ?>"><i class="fa fa-circle-o"></i>List Categories Features</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i>List deleted Category Features</a></li>         
                <li><a href="<?php //echo base_url('admin/category-feature/add-new') ?>"><i class="fa fa-circle-o"></i>Add New Category Features</a></li>            
                <li><a href=""><i class="fa fa-circle-o"></i>Sort Categories Features</a></li>            
              </ul>
            </li>    -->         

            <li class="treeview">
              <a href="#">
              <i class="fa fa-user"></i>
              <span>Site Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url('admin/users') ?>"><i class="fa fa-circle-o"></i>List Site Users</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i>List deleted Site Users</a></li>         
              <li><a href="<?php echo base_url('admin/user/new-user') ?>"><i class="fa fa-circle-o"></i>Add New Site Users</a></li>                        
              </ul>
            </li>  

            <li class="treeview  <?php if($id=='show-country' ||$id=='add-new-country'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-globe"></i>
              <span>Countries</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($id=='show-country'){ echo "active";} ?>"><a href="<?php echo base_url('admin/country/show-country') ?>"><i class="fa fa-circle-o"></i>List Countries</a></li>          
                <li class="<?php if($id=='add-new-country'){ echo "active";} ?>"><a href="<?php echo base_url('admin/country/add-new-country') ?>"><i class="fa fa-circle-o"></i>Add New Country</a></li>
              </ul>
            </li> 

            <li class="treeview <?php if($id=='show-state' ||$id=='add-new-state'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-globe"></i>
              <span>States</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($id=='show-state'){ echo "active";} ?>"><a href="<?php echo base_url('admin/state/show-state') ?>"><i class="fa fa-circle-o"></i>List States</a></li>         
                <li class="<?php if($id=='add-new-state'){ echo "active";} ?>"><a href="<?php echo base_url('admin/state/add-new-state') ?>"><i class="fa fa-circle-o"></i>Add New State</a></li>
              </ul>
            </li>  

            <li class="treeview <?php if($id=='show-city' ||$id=='add-new-city'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-globe"></i>
              <span>Cities</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($id=='show-city'){ echo "active";} ?>"><a href="<?php echo base_url('admin/city/show-city') ?>"><i class="fa fa-circle-o"></i>List Cities</a></li>         
                <li class="<?php if($id=='add-new-city'){ echo "active";} ?>"><a href="<?php echo base_url('admin/city/add-new-city') ?>"><i class="fa fa-circle-o"></i>Add New City</a></li>
              </ul>
            </li>  

            <li class="treeview <?php if($id=='show-cms' ||$id=='deleted-cms' || $id=='add-new-cms'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-file-text-o"></i>
              <span>C.M.S.</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="<?php if($id=='show-cms'){ echo "active";} ?>"><a href="<?php echo base_url('admin/cms/show-cms') ?>"><i class="fa fa-circle-o"></i>List C.M.S. Pages</a></li>
              <li class="<?php if($id=='deleted-cms'){ echo "active";} ?>"><a href="<?php echo base_url('admin/cms/deleted-cms') ?>"><i class="fa fa-circle-o"></i>List deleted C.M.S. Pages</a></li>         
              <li class="<?php if($id=='add-new-cms'){ echo "active";} ?>"><a href="<?php echo base_url('admin/cms/add-new-cms') ?>"><i class="fa fa-circle-o"></i>Add New C.M.S. Pages</a></li>                      
              </ul>
            </li> 

            

            <li class="treeview <?php if($id=='show-faq' ||$id=='show-deleted-faq' || $id=='add-new-faq'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-file-text-o"></i>
              <span>FAQs</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="<?php if($id=='show-faq'){ echo "active";} ?>"><a href="<?php echo base_url('admin/faq/show-faq') ?>"><i class="fa fa-circle-o"></i>List FAQs</a></li>
              <li class="<?php if($id=='show-deleted-faq'){ echo "active";} ?>"><a href="<?php echo base_url('admin/faq/show-deleted-faq') ?>"><i class="fa fa-circle-o"></i>List deleted FAQs</a></li>
              <li class="<?php if($id=='add-new-faq'){ echo "active";} ?>"><a href="<?php echo base_url('admin/faq/add-new-faq') ?>"><i class="fa fa-circle-o"></i>Add New FAQs</a></li>
<!--               <li><a href="<?php //echo base_url('admin/faq/sort-faq') ?>"><i class="fa fa-circle-o"></i>Sort FAQs</a></li>                      
 -->              </ul>
            </li>

            <li class="treeview <?php if($id=='contact'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-file-text-o"></i>
              <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url('admin/page/contact'); ?>"><i class="fa fa-circle-o"></i>Contact</a></li>
              </ul>
            </li>

             <li class="treeview <?php if($id=='payment-settings'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-paypal"></i>
              <span>Payment Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu"> 
              <li class="<?php if($id=='payment-settings'){ echo "active";} ?>"><a href="<?php echo base_url('admin/payment/payment-settings') ?>"><i class="fa fa-circle-o"></i>Payment Settings</a></li>                      
               
              </ul>
            </li>  



            <li class="treeview <?php if($id =='show-paypal-payment' || $id == 'show-stripe-payment'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-paypal"></i>
              <span>Payments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu"> 
              <li class="<?php if($id=='show-paypal-payment'){ echo "active";} ?>"><a href="<?php echo base_url('admin/payment/show-paypal-payment') ?>"><i class="fa fa-circle-o"></i>Show Paypal Payments</a></li>                      
              <li class="<?php if($id=='show-stripe-payment'){ echo "active";} ?>"><a href="<?php echo base_url('admin/payment/show-stripe-payment') ?>"><i class="fa fa-circle-o"></i>Show Stripe Payments</a></li>                      
              
              </ul>
            </li>   

            <li class="treeview <?php if($id=='add-payment'){ echo "active";} ?>">
              <a href="#">
              <i class="fa fa-archive"></i>
              <span>Payment Plans</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="<?php if($id=='add-payment'){ echo "active";} ?>"><a href="<?php echo base_url('admin/payment/add-payment') ?>"><i class="fa fa-circle-o"></i>Add payment plans</a></li>                       
              </ul>
            </li> 

            <li class="treeview">
              <a href="#">
              <i class="fa fa-archive"></i>
              <span>Featured Listing Orders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i>List Featured Listing Orders</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i>List deleted Featured Listing Orders</a></li>
              </ul>
            </li> 

            <li class="treeview">
              <a href="#">
              <i class="fa fa-archive"></i>
              <span>Advertisement Slots</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i>List Advertisement Slots</a></li> 
              </ul>
            </li> 

            <li class="treeview">
              <a href="#">
              <i class="fa fa-archive"></i>
              <span>Advertisement Orders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i>List Advertisement Orders</a></li> 
              <li><a href=""><i class="fa fa-circle-o"></i>List deleted Advertisement Orders</a></li> 
              </ul>
            </li> 

            <li class="treeview">
              <a href="#">
              <i class="fa fa-wrench"></i>
              <span>Site Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i>Manage Site Settings</a></li>  
              </ul>
            </li>  
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>