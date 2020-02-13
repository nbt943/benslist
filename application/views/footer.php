

<!--FOOTER  -->

<section class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 footer-logo col-12 col-sm-12 col-md-6 p-0">
				<a href="<?php echo base_url() ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
			</div>

			<div class="col-lg-3"></div>

			<div class="col-lg-6 mt-4 col-12 text-center col-sm-12 col-md-6 float-right"> 
				<h5 class="float-right"><i class="fa fa-envelope"></i>Subscribe to Our News Offers</h5>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-lg-3 col-6 ">
				<h4>Tips and help</h4>
				<p>About Classlfted</p>
				<p>Classlfted Blog</p>
				<p>Help</p>
				<p>Press Contact</p>
				<p>Contact Us</p>
			</div>

			<div class="col-lg-3 col-6 ">
				<h4>Quick Links</h4>
				<p>About Us</p>
				<p>Contact Us </p>
				<p>Careers</p>
				<p>All Cities</p>
				<p>Help & Support</p>
				<p>Advertise With Us</p>
				<p>Blog</p>
			</div>

			<div class="col-lg-3 col-6 ">
				<h4>How to sell fast</h4>
				<p>How to sell fast</p>
				<p>Membership</p>
				<p>Banner Advertising</p>
				<p>Promote your ad</p>
				<p>Trade Delivers</p>
				<p>Advertise With Us</p>
				<p>FAQ</p>
			</div>

			<div class="col-lg-3 col-6 ">
				<h4>Support</h4>
				<p>We have over 15 year of experience</p>
				<p>Our suppoer available to help you 24 hours a day, seven daye week</p>
				<h4>Follow Us</h4>
				<i class="fa fa-facebook p-2 border social-hov"></i> 
		 		<i class="fa fa-twitter p-2 border social-hov"></i> 
		 		<i class="fa fa-google-plus p-2 border social-hov"></i> 
		 		<i class="fa fa-linkedin p-2 border social-hov"></i>
		 		<i class="fa fa-youtube p-2 border social-hov"></i>
			</div>
		</div>
		
	</div>
</section>

<!-- COPYRIGHT -->

<section>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col text-center pt-2">
					<p>&copy; Copyright 2000-2019 All rights reserved</p>
				</div>
			</div>
		</div>
	</div>
</section>
 
</body>
</html>


 
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

<!-- TOGGLE MENU -->

<script>

function menu(){ 
	document.getElementById('menu-slide').style.width = '100%'; 
}

function closebtn() {
	document.getElementById('menu-slide').style.width = '0'; 
	document.getElementById('menu-btn').style.zIndex = '3';
} 

</script>	

<script type="text/javascript">
	
$('body').on('click','.login_site_user',function(){
	var username = $('#log-username').val();
	var password = $('#log-password').val();
	$('.error').remove();
	$.ajax({

	type: 'POST',
	url: '<?php echo base_url('admin/login/site-user-login') ?>',
	data: {username:username,password:password},
	success: function(response) {
			var obj = JSON.parse(response);
			if(obj.username != '') {

			$('#log-username').after('<span class= "error">'+ obj.username+'</span>'); 

			}if(obj.password != ''){

			$('#log-password').after('<span class= "error">'+ obj.password+'</span>'); 


			}if(obj.invalid != ''){

			$('#log-password').after('<span class= "error">'+ obj.invalid+'</span>'); 


			}if (obj.invalid == '' && obj.username == '' && obj.password == '') {
			alert();
			$('#form-site-login').submit();

			}
		}

	});
});



</script>