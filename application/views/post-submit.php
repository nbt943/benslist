<?php 
 
require('header.php');

?> 

<!-- submit post start -->

<section class="post-submit mt-5 mb-5">	
	<div class="container">
		<div class="row">
			<div class="col-lg-12  col-sm-12">
				<div class="submit-form">
					<div class="col-lg-6 offset-3 col-sm-12 border">
						<div class="submit-img-icon">
							<i class="fa fa-check-circle"></i>
						</div>
						<div class="col-lg-12">
							 <h3 class="text-center font-weight-bold">congratulations!</h3>	
							 <h4 class="text-center font-weight-bold mt-5">Your Ad will go live shortly...</h4>
						</div>
						<div class="col-lg-12 col-sm-12">
							<div class="notification">
								<p class="text-center pr-2 mt-4"><i class="fa fa-exclamation-circle text-center pr-3 text-secondary"></i>Allows 1 free ads 90 days of <span class="font-weight-bold"> properties</span></p>
							</div>
						</div>
						<div class="col-lg-12 col-sm-12">
							<div class="submit-img text-center mt-4 mb-4">
								 <img src="assets/images/submit-post/submit.png" >
							</div>
						</div>
						<div class="col-lg-12">
							<h4 class="text-center font-weight-bold mt-5">Reach more buyers and sell faster</h4>
							<p class="text-center pr-2 mt-2">Upgrade your Ad to a top position</p>
						</div>
						<div class="col-lg-12 col-sm-12">
							<div class="btn-sell text-center">
							<button type="button" class="btn sell-btn text-center mt-5 mb-5">SELL FASTER NOW</button>
							</div>
							<div class="btn-preview text-center">
							<button type="button" class="btn btn-outline preview-btn  mb-5">Preview Ad</button>
							</div> 
						</div>

					</div>




				</div>

			</div>	
		</div>
	</div>
</section>



<?php require('footer.php'); ?>


<style>
	
 
.submit-img-icon{
	font-size: 50px;
    text-align: center;
    color: #23e5d8;
}
p{
	font-size: 18px;
}
.sell-btn{
	background-color: #ee0880;
	padding: 10px 30px;
	color: #fff;
	width: 70%;
	margin: auto;
}
.preview-btn{

	border: 1px solid#ee0880;

	padding: 10px 30px;
	color: #ee0880;
	width: 70%;
	margin: auto;
	outline: none;
}
.sell-btn:hover{
	color: #fff;
}
.sell-btn:focus{
	color: #fff;
}
.preview-btn:hover {
	color: #ee0880;
}

.preview-btn:focus{
color: #ee0880;
}
.submit-img img{
	max-width: 35%;
}
</style>
