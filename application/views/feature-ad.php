<?php 
 
require('header.php');

?>
 <section class="banner"> 
	<div class="container p-6">
		<div class="row min-vh-10">
			<div class="col-lg-12 text-center">
				<h1>Ben'sList Classified</h1>
				<p class="banner-text pb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
			</div>

			<div class="row">
				<form class="w-75 mx-auto col-lg-9"> 
					<div class="input-group ss-form ">
						<select class="col-4 form-control banner-round-select mb-2">
							<option>Any Category</option>
							<option>Category</option>
						</select>

						<select class="col-4 form-control mb-2">
							<option>Any Category</option>
							<option>Category</option>
						</select>

						<input type="text" class="col-4 form-control banner-round-input">
						<button class="nav-btn banner-btn">Search Now</button>
					</div>
				</form>
			</div>	
		</div>
	</div>
</section>
<!-- feature start -->
<section class="feature">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="feature-block">
					<div class="col-lg-12 col-xs-12">
						<div class="feature-img">
						</div>
					</div>
					<div class="col-lg-12 col-xs-12">
						<h4 class="text-center font-weight-bold text-uppercase">reach more buyers and seller faster</h4>
						<p class="text-center text-secondary mt-3">Upgrade your Ad to top position</p>
					</div>
					<div class="col-lg-12 col-xs-12 p-0">
						 <div class="alert alert-warning text-center mt-2 mb-2" role="alert">
   							APPLICABLE FOR PROPERTIES CATEGORY IN ARWANI		
						 </div>
					</div>
					<div class="col-lg-12 col-xs-12">
						<div class="col-lg-6">
							<h4 class="text-left text-uppercase font-weight-bold">feature ad</h4>
						</div>
						<div class="col-lg-6">
							<div class="see-example text-right">
								<a href="" class="text-right font-weight-bold text-uppercase"> see example</a>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<div class="notification mt-2 mb-2">
								<p class="text-secondary"><i class="fa fa-check pr-2 "></i>Get noticed with 'FEATURED' tag in top position</p>
								<p class="text-secondary"><i class="fa fa-check pr-2 "></i>Ad will be heighlighted to top position</p>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<div class="feature-box">
								<div class="col-lg-8">
								 <input class="form-check-input ml-3" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  									<label class="form-check-label" for="exampleRadios1">
    									<h5 class="font-weight-bold d-inline ml-5">Featured Ad For 30 Days</h5>
    									<p class="mt-2 ml-5 font-weight-normal text-secondary"><i class="fa fa-check pr-2 "></i>Reach up to 10 time more buyer</p>
 									</label>
 								</div>	
 									<div class="col-lg-4">
 										<div class="see-example text-right">
 											<a href="">$ 999</a>
 										</div>
 									</div>
							</div>
							<div class="feature-box mt-2">
								<div class="col-lg-8">
								 <input class="form-check-input ml-3" type="radio" name="exampleRadios" id="exampleRadios2" value="option1" checked>
  									<label class="form-check-label" for="exampleRadios1">
    									<h5 class="font-weight-bold d-inline ml-5">Featured Ad For 7 Days</h5>
    									<p class="mt-2 ml-5 font-weight-normal text-secondary"><i class="fa fa-check pr-2 "></i>Reach up to 4 time more buyer</p>
 									</label>
 								</div>	
 									<div class="col-lg-4">
 										<div class="see-example text-right">
 											<a href="">$ 499</a>
 										</div>
 									</div>
							</div>
						</div>
					</div>	
						<div class="col-lg-12 col-xs-12 p-0">
							<div class="bussiness mt-4 mb-4">
								<div class="package text-center">
									<div class="col-lg-8">
									<p class="text-white text-left mt-2 font-weight-bold">Heavey discount on Packages</p>
									</div>
									<div class="col-lg-4">
										<button type="button" class="btn btn-outline btn-package">view Packages</button>
									</div>
								</div>
							</div>

						</div>
						<div class="col-lg-12 col-xs-12 p-0">
							<div class="btn-border text-center">
								<button type="button" class="btn btn btn-pay font-weight-bold">Pay 999</button></div>
							</div>



				</div>
			</div>
		</div>
	</div>	
</section>


<?php require('footer.php'); ?>


<style>

.feature-block{
	width: 60%;
	margin: auto;
	border: 1px solid#ccc;
	display: flow-root; 
}
.see-example a{
	text-decoration: none;
	color: #ee0880;
}
.notification i{
	color: #cdcab0;
}	
.feature-box{
	border: 1px solid#ccc;
	display: flow-root;
	padding: 20px 0px;
}
.feature-box i{
	color: #cdcab0;
}

.bussiness{
	padding: 15px;
	background: #ebeeef;
	width: 100%;
}
.package{
	background: #ee0880;
	padding: 10px 0px;
	width: 100%;
	display: flex;
	 
}
.btn-package{
	border: 1px solid#fff;
	color: #fff;
}
.btn-package:hover{
	color: #fff;
}
.btn-package:focus{
	color: #fff;
}
.btn-border{
	border: 1px solid#ccc;
	padding: 20px;
}
.btn-pay{
	background: #ee0880;
	border: none;
	padding: 20px 30px;
	color: #fff;
	width: 70%;

}
.btn-pay:hover{
	background: #ee0880;
	color: #fff;
}
.btn-pay:focus{
	background: #ee0880;
	color: #fff; 
}
.feature{
	margin: 5% 0%;
}

</style>