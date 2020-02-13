
<!DOCTYPE html>
<html>
<head>
	<title>BENSLIST</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/ben_style/ben_style.css') ?>">
 	 

</head>
<body>

<section class="navbar col-lg-12"> 
	<div class="container">
	 	<div class="row"> 	
		 	<div class="col-lg-3 p-0">
		 		<a href="<?php echo base_url() ?>" class="col-10 float-left logo-img p-0"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
		 		<div class="menu-btn col-2">
		 			<button class="float-right" id="menu-btn" onclick="menu()" ><i class="fa fa-bars"></i></button>
		 		</div>

		 		<div id="menu-slide">
		 			<a href="javascript: void(0)" class="cross" onclick="closebtn()">&times;</a>
		 			<ul class="list-group">		 				
					   	<li class="list-group-item"><a href="#">Search on Map</a></li> 
					    <li class="list-group-item"><a href="#">Motors</a></li>
					    <li class="list-group-item"><a href="#">Property</a></li>
					    <li class="list-group-item"><a href="#">Jobs</a></li>
					    <li class="list-group-item"><a href="#">For Sale</a></li>
					    <li class="dropdown list-group-item">
					    	<button class="dropdown-toggle" data-toggle='dropdown'>Eng</button>
					    	<div class="dropdown-menu">
					    		<a href="#" class="dropdown-item">Hindi</a>
					    		<a href="#" class="dropdown-item">French</a>
					    	</div>
					    </li>
					    <li class="list-group-item"><button class="nav-btn">Post Your Ad</button></li>
					    <li class="list-group-item"><button class="nav-btn" data-toggle='dropdown'>Sign Up</button>
					    	<div class="dropdown-menu">
				    			<div class="profile">
				    				<div class="profile-inner">
				    					<ul>
				    						<li class="list-s"><i class="fa fa-user-circle"></i></li>


				    					</ul>

				    				</div>

				    			</div>
				    		</div>


					    </li>
					</ul> 
		 		</div>
		 	</div> 

		 	<div class="col-lg-9 col-sm-12 p-0 ">
		 		<ul class="list-inline d-inline-flex menu-padding float-right mt-4">
		 			 <?php foreach ($categories as $category) { ?>
		 				<li><a href=""><?php echo $category['name'] ?></a></li> 
		 		  	<?php }  ?>

					    
				    <li class="dropdown">
				    	<button class="dropdown-toggle" data-toggle='dropdown'>Eng</button>
				    	<div class="dropdown-menu">
				    		<a href="#" class="dropdown-item">Hindi</a>
				    		<a href="#" class="dropdown-item">French</a>
				    	</div>
				    </li>
				<?php 

					if(!$this->session->userdata('username')){ ?>
				    <li>
				    	  <a class="btn sign-btn" href="#" data-toggle="modal" data-target=".login-register-form">
                           Sign In
                        </a>

                        <!-- Login / Register Modal-->
                        <div class="modal fade login-register-form" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-design">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
                                            <li><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="modal-body modal-margin">
                                        <div class="tab-content">
                                            <div id="login-form" class="tab-pane fade in active">
									        <form action="<?php echo base_url('home-get-set') ?>" id="form-site-login" method="post">
									          <div class="form-group has-feedback">
									            <input type="text" class="form-control input-design" placeholder="Username" name="username" id="log-username" required />
									            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
									          </div>
									          <div class="form-group has-feedback">
									            <input type="password" id="log-password" class="form-control input-design" placeholder="Password" name="log-password" required />
									            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
									          </div>
									          <div class="row">
									            <div class="col-xs-8">                       
									            </div><!-- /.col -->
									            <div class="col-xs-4">
									              <button type="button" class="btn btn-primary btn-block btn-flat login_site_user"> Sign In
									              	
									              </button> 
									            </div><!-- /.col -->
									          </div>
									        </form>  
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
                                                <form action="/">
                                                    <div class="form-group text-left">
                                                        <label for="name">User Name:</label>
                                                        <input type="text" class="form-control input-design" id="name" placeholder="Enter your name" name="name">
                                                    </div>
                                                    <div class="form-group text-left">
                                                        <label for="newemail">Email:</label>
                                                        <input type="email" class="form-control input-design" id="newemail" placeholder="Enter new email" name="newemail">
                                                    </div>
                                                    <div class="form-group text-left">
                                                        <label for="newpwd">Password:</label>
                                                        <input type="password" class="form-control input-design" id="newpwd" placeholder="New password" name="newpwd">
                                                    </div>
                                                    <button type="submit" class="btn btn modal-btn">Register</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</li>
					<?php } else{ ?>


				     <li><button class="nav-btn" data-toggle='dropdown'>My Account</button>
				    	<div class="dropdown-menu profile-dropdown dropdown-position">
				    		<div class="profile">
				    			<div class="profile-inner pt-5 pb-5">
				    				<div class="col-lg-12">
				    					<div class="col-lg-3">
				    					 		<div class="profile-img-icon">
				    					 			<i class="fa fa-user-circle"></i>
				    					 		</div>
				    					</div>
				    					<div class="col-lg-9 p-0">
				    					 <div class="profile-name">
				    					 	<p class="text-secondary text-left m-0">Hello</p>
				    					 	<p class="font-weight-bold m-0">User Name</p>
				    					 	<a href="">View and edit profile</a>
				    					 </div>
				    					</div>
				    				</div>
				    				<div class="col-lg-12">
				    					<div class="profile-list mt-4">
				    						<ul class="pl-3">
				    							<a href="<?php echo base_url('my-ads'); ?>" class="text-decoration-none"><li class="list-unstyled text-left"><p class="font-weight-normal"><i class="fa fa-address-card mr-4"></i>My Ads</p></li></a>
				    							<a href="" class="text-decoration-none"><li class="list-unstyled text-left"><p class="font-weight-normal"><i class="fa fa-list-ul mr-4"></i>Buy Business Packages</p></li></a>
				    							<a href="" class="text-decoration-none"><li class="list-unstyled text-left"><p class="font-weight-normal"><i class="fa fa-credit-card mr-4"></i>Bought Packages & Billing</p></li></a>
				    							<a href="" class="text-decoration-none"><li class="list-unstyled text-left"><p class="font-weight-normal"><i class="fa fa-question-circle mr-4"></i>Help</p></li></a>
				    							<a href="" class="text-decoration-none"><li class="list-unstyled text-left"><p class="font-weight-normal"><i class="fa fa-cog mr-4"></i>Settings</p></li></a>
				    							<a href="" class="text-decoration-none"><li class="list-unstyled
				    							text-left"><p class="font-weight-normal"><i class="fa fa-power-off mr-4"></i>Sign Out</p></li></a>
				    						</ul>

				    					</div>
				    				</div>	
				    			</div>
							</div>
						</div>
				    </li>
					<?php } ?>

				    <li>
				    	  <a class="btn sign-btn" href="<?php echo base_url('post-ad'); ?>">
                           Sell
                        </a>
                    </li>					
				</ul> 	 
		 	</div>
		</div> 
	</div>
</section>


<style>
	
.navbar ul li a i{
	font-size: 22px;

}
.profile-img-icon i{
	font-size: 50px;
}
.profile-name a{
	color: #ee0880 !important;
}

.profile-list ul li{
	padding: 10px 0px;

}
.profile-list ul li p{
	font-size: 15px;
	color: #002f34 !important;
}

.profile-dropdown{
	width: 40%;
}
.profile-list ul li:hover{
	background-color: #cbf7ee; ;
	 
}
.sign-btn{
	background-color: #ee0880;
    border: none;
    border-radius: 30px;
    padding: 5px 15px;
    color: #ffffff !important;
}
.sign-btn:hover, .sign-btn:focus{
	background-color: #ee0880;
    border: none;
    border-radius: 30px;
    padding: 5px 15px;
    color: #ffffff !important;
}
.input-design{
	-webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    border-style: none;
    box-shadow: inset 0 0 0 1px #002f34;
    color: #002f34;
    cursor: pointer;
    font-size: 14px;
    height: 48px;
    margin-bottom: 8px;
    margin-right: 5px;
    min-width: 64px;
    outline: 0;
    padding: 8px 15px;
}
.modal-design{
	 
	width:100%
}
.modal-margin{
	margin: 10% 0%;
}
.modal-btn{
	background: #ee0880;
	color: #fff;
	 width: 50%;
	border-radius: 30px;
}
.modal-btn:hover, .modal-btn:focus{
	background: #ee0880;
	color: #fff;
	 width: 50%;
	border-radius: 30px;
}
.modal-header {
  padding: 0;
}
.modal-header .close {
  padding: 10px 15px;
}
.modal-header ul {
  border: none;
}
.modal-header ul li {
  margin: 0;
}
.modal-header ul li a {
  border: none;
  border-radius: 0;
}
.modal-header ul li.active a {
  color: #ffafd9;
}
.modal-header ul li a:hover {
  border: none;
  background: #ee0880;
    color: #fff;
}
.modal-header ul li a span {
  margin-left: 10px;
}
.modal-body .form-group {
  margin-bottom: 10px;
}
.dropdown-position{
	 float: right;;
	 left: unset;
	 right: 0;
}
</style>