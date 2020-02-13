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

<!-- CATEGORIES -->

<section class="category">	 
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center pt-5">
				<h3>Categories</h3> 
			</div> 
		</div>
		
		<div class="row mt-4 mb-4">
		<?php foreach ($categories as $category) { ?> 
			<div class="col-lg-3 text-center category-icons col-12 col-sm-6 mt-4">
				<div class="border mb-2">
					<img src="<?php echo base_url('assets/images/category/'.$category['image']) ?>" width='245px' height='200px' > 
					<h4 class="pt-5"><?php echo $category['name'] ?></h4>
					<p class="category-text"><?php echo $category['description'] ?></p>
				</div> 	
			</div>
		<?php } ?>
			<!-- <div class="col-lg-3 text-center category-icons col-12 col-sm-6 mt-4">
				<div class="border p-2 mb-2">
					<i class="fa fa-briefcase"></i> 
					<h4 class="pt-5"></h4>
					<p class="category-text">Lorem Ipsum is simply dummy text of the printing and typesetting indu stry. Lorem Ipsum has been the industry's</p>
				</div> 			
			</div>  
			<div class="col-lg-3 text-center category-icons col-12 col-sm-6 mt-4">
				<div class="border p-2 mb-2">
					<i class="fa fa-briefcase"></i> 
					<h4 class="pt-5"></h4>
					<p class="category-text">Lorem Ipsum is simply dummy text of the printing and typesetting indu stry. Lorem Ipsum has been the industry's</p>
				</div> 			
			</div>
			<div class="col-lg-3 text-center category-icons col-12 col-sm-6 mt-4">
				<div class="border p-2 mb-2">
					<i class="fa fa-briefcase"></i> 
					<h4 class="pt-5"></h4>
					<p class="category-text">Lorem Ipsum is simply dummy text of the printing and typesetting indu stry. Lorem Ipsum has been the industry's</p>
				</div> 			
			</div> -->
		</div>					
	</div>	 	
</section>


<!-- FEATURED ADS  -->

<section class="ads">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center pt-5">
				<h3>Featured Ads</h3>
				<p>Lorem Ipsum is simply dummy text</p>
			</div>
		</div>

		<div class="row"> 
			<div class="col-lg-3 ads-icons col-12 col-sm-6">
				<div class="border mb-2"> 
					<img src="<?php echo base_url(); ?>assets/images/ads1.jpg">
					<div class="row mt-2">
						<div class="col-lg-4 col-4">
							<h5>Mobile</h5>
						</div>

						<div class="col-lg-8 col-8">
							<i class="fa fa-bookmark float-right"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<p>Smartphone for sale</p>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-12">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-8 col-8">
							<p><i class="fa fa-map-marker"></i>East 7th street 98</p>
						</div>	
						<div class="col-lg-4 col-4">
							<i class="fa fa-heart ad-save float-right">Save</i>
						</div>						
					</div> 
				</div>
			</div>

			<div class="col-lg-3 ads-icons col-12 col-sm-6">
				<div class="border mb-2"> 
					<img src="<?php echo base_url(); ?>assets/images/ads2.jpg">
					<div class="row mt-2">
						<div class="col-lg-4 col-4">
							<h5>Fashion</h5>
						</div>

						<div class="col-lg-8 col-8">
							<i class="fa fa-bookmark float-right"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<p>Cloth for sale</p>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-12">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-8 col-8">
							<p><i class="fa fa-map-marker"></i>East 7th street 98</p>
						</div>	
						<div class="col-lg-4 col-4">
							<i class="fa fa-heart ad-save float-right">Save</i>
						</div>						
					</div> 
				</div>
			</div>

			<div class="col-lg-3 ads-icons col-12 col-sm-6">
				<div class="border mb-2"> 
					<img src="<?php echo base_url(); ?>assets/images/ads3.jpg">
					<div class="row mt-2">
						<div class="col-lg-4 col-4">
							<h5>Matrimony</h5>
						</div>

						<div class="col-lg-8 col-8">
							<i class="fa fa-bookmark float-right"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<p>Jewellery for sale</p>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-12">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-8 col-8">
							<p><i class="fa fa-map-marker"></i>East 7th street 98</p>
						</div>	
						<div class="col-lg-4 col-4">
							<i class="fa fa-heart ad-save float-right">Save</i>
						</div>						
					</div> 
				</div>
			</div>

			<div class="col-lg-3 ads-icons col-12 col-sm-6">
				<div class="border mb-2"> 
					<img src="<?php echo base_url(); ?>assets/images/ads4.jpg">
					<div class="row mt-2">
						<div class="col-lg-4 col-4">
							<h5>Animals</h5>
						</div>

						<div class="col-lg-8 col-8">
							<i class="fa fa-bookmark float-right"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<p>Greyhounds Dogs for sale</p>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-12">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>						
					</div>

					<div class="row">
						<div class="col-lg-8 col-8">
							<p><i class="fa fa-map-marker"></i>East 7th street 98</p>
						</div>	
						<div class="col-lg-4 col-4">
							<i class="fa fa-heart ad-save float-right">Save</i>
						</div>						
					</div> 
				</div>
			</div> 

			<div class="col-lg-12 text-center pt-5 mb-5">
				 <button class="nav-btn">View All</button>
			</div> 
		</div>
	</div>

</section>


<!-- TRENDING -->

<section class="trends">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center pt-5">
				<h3>Trending Ads</h3>
				<p>Lorem Ipsum is simply dummy text</p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-4 col-sm-6"> 
				<div class="border mb-2"> 				
					<div class="trends-img ">
						<img src="<?php echo base_url(); ?>assets/images/trends1.jpg">
						<h6>Cities Finest Spa</h6>
						<p>Kenny Dr Granada Hills, CA 91344</p>
					</div>

					<div class="row">
						<div class="col-5">
							<i class="fa fa-heart"> 5</i>
							<i class="fa fa-comment"> 8</i>
						</div>
						<div class="col-7  ">
							<h5 class="float-right">FASHION</h5>  
						</div>
					</div>

					<div class="row">
						<div class="col-lg-2 col-2 text-center">
							<h3 class="rounded-circle pr-4 pl-2 circle-color">A</h3>
						</div>
						<div class="col-lg-10 col-10">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						</div>
					</div> 	
				</div>			 
			</div>

			<div class="col-lg-4 col-sm-6"> 
				<div class="border mb-2"> 				
					<div class="trends-img ">
						<img src="<?php echo base_url(); ?>assets/images/trends2.jpg">
						<h6>Top Furniture</h6>
						<p>Kenny Dr Granada Hills, CA 91344</p>
					</div>

					<div class="row">
						<div class="col-5">
							<i class="fa fa-heart"> 5</i>
							<i class="fa fa-comment"> 8</i>
						</div>
						<div class="col-7">
							<h5 class="float-right">FURNITURE</h5>  
						</div>
					</div>

					<div class="row">
						<div class="col-lg-2 col-2">
							<h3 class="rounded-circle mr-2">A</h3>
						</div>
						<div class="col-lg-10 col-10">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						</div>
					</div> 	
				</div>			 
			</div>

			<div class="col-lg-4 col-sm-6"> 
				<div class="border mb-2"> 				
					<div class="trends-img ">
						<img src="<?php echo base_url(); ?>assets/images/trends3.jpg">
						<h6>Cream Restaurant</h6>
						<p>Kenny Dr Granada Hills, CA 91344</p>
					</div>

					<div class="row">
						<div class="col-5">
							<i class="fa fa-heart"> 5</i>
							<i class="fa fa-comment"> 8</i>
						</div>
						<div class="col-7">
							<h5 class="float-right">FAST FOOD</h5>  
						</div>
					</div>

					<div class="row">
						<div class="col-lg-2 col-2">
							<h3 class="rounded-circle mr-2">A</h3>
						</div>
						<div class="col-lg-10 col-10">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						</div>
					</div> 	
				</div>			 
			</div> 	
		</div>					 

<!-- TRENDS SECOND ROW  -->
	
		<div class="row">
			<div class="col-lg-4 col-sm-6"> 
				<div class="border mb-2"> 				
					<div class="trends-img ">
						<img src="<?php echo base_url(); ?>assets/images/trends4.jpg">
						<h6>Auto Frame Business</h6>
						<p>Kenny Dr Granada Hills, CA 91344</p>
					</div>

					<div class="row">
						<div class="col-5">
							<i class="fa fa-heart"> 5</i>
							<i class="fa fa-comment"> 8</i>
						</div>
						<div class="col-7">
							<h5 class="float-right">VEHICLES</h5>  
						</div>
					</div>

					<div class="row">
						<div class="col-lg-2 col-2">
							<h3 class="rounded-circle mr-2">A</h3>
						</div>
						<div class="col-lg-10 col-10">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						</div>
					</div> 	
				</div>			 
			</div>

			<div class="col-lg-4 col-sm-6"> 
				<div class="border mb-2"> 				
					<div class="trends-img ">
						<img src="<?php echo base_url(); ?>assets/images/trends5.jpg">
						<h6>USA Universities</h6>
						<p>Kenny Dr Granada Hills, CA 91344</p>
					</div>

					<div class="row">
						<div class="col-5">
							<i class="fa fa-heart"> 5</i>
							<i class="fa fa-comment"> 8</i>
						</div>
						<div class="col-7">
							<h5 class="float-right">EDUCATION</h5>  
						</div>
					</div>

					<div class="row">
						<div class="col-lg-2 col-2">
							<h3 class="rounded-circle mr-2">A</h3>
						</div>
						<div class="col-lg-10 col-10">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						</div>
					</div> 	
				</div>			 
			</div>

			<div class="col-lg-4 col-sm-6"> 
				<div class="border mb-2"> 				
					<div class="trends-img ">
						<img src="<?php echo base_url(); ?>assets/images/trends6.jpg">
						<h6>Cream Restaurant</h6>
						<p>Kenny Dr Granada Hills, CA 91344</p>
					</div>

					<div class="row">
						<div class="col-5">
							<i class="fa fa-heart"> 5</i>
							<i class="fa fa-comment"> 8</i>
						</div>
						<div class="col-7">
							<h5 class="float-right">MATRIMONY</h5>  
						</div>
					</div>

					<div class="row">
						<div class="col-lg-2 col-2">
							<h3 class="rounded-circle mr-2">A</h3>
						</div>
						<div class="col-lg-10 col-10">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						</div>
					</div> 	
				</div>			 
			</div> 	
		</div>
 
		<div class="col-lg-12 text-center pt-5 mb-5">
			 <button class="nav-btn">View All</button>
		</div> 
	</div>
</section>

<!-- PROJECT -->

<section class="project">
	<div class="container">
		<div class="row text-center pt-5 pb-5">
			<div class="col-lg-4">
				<h2>1238+</h2>
				<h4>Completed Project</h4>
			</div>

			<div class="col-lg-4">
				<h2>1238+</h2>
				<h4>Happy Client</h4>
			</div>

			<div class="col-lg-4">
				<h2>1238+</h2>
				<h4>Award Winner</h4>
			</div>
		</div>		
	</div>	
</section>


<!-- TESTIMONIALS -->
                     
<section class="testimonials">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center pt-5">
				<h3>Trending Ads</h3>
				<p>Lorem Ipsum is simply dummy text</p>
			</div>
		</div>

		<div class="row mb-5">
			<div class="col-lg-6">
				<div class="row">
				 	<div class="col-lg-3 col-sm-3">
				 		<img src="<?php echo base_url(); ?>assets/images/testimonial1.png">
				 	</div>

				 	<div class="col-lg-9 col-sm-9">
				 		<h5>Lorem Ipsum is</h5>
				 		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
				 		<i class="fa fa-facebook p-2 border social-hov"></i> 
				 		<i class="fa fa-twitter p-2 border social-hov"></i> 
				 		<i class="fa fa-google-plus p-2 border social-hov"></i> 
				 		<i class="fa fa-linkedin p-2 border social-hov"></i> 
				 	</div>
				</div> 
			</div>

			<div class="col-lg-6">
				<div class="row">
				 	<div class="col-lg-3 col-sm-3">
				 		<img src="<?php echo base_url(); ?>assets/images/testimonial2.png">
				 	</div>

				 	<div class="col-lg-9 col-sm-9">
				 		<h5>Lorem Ipsum is</h5>
				 		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
				 		<i class="fa fa-facebook  p-2 border social-hov"></i> 
				 		<i class="fa fa-twitter p-2 border social-hov"></i> 
				 		<i class="fa fa-google-plus p-2 border social-hov"></i> 
				 		<i class="fa fa-linkedin p-2 border social-hov"></i> 
				 	</div>
				</div> 
			</div>
		</div>
	</div>
</section>


<?php require('footer.php'); ?>




<style>
	
.banner{
	display: inline-block;
	width: 100%;
}

</style>>