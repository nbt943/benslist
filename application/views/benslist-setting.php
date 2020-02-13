<?php

require('header.php');

?>

<!-- benslist-setting -->
 <section class="setting mt-5 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="row">	
					<div class="col-lg-4 mb-3">
	         			<ul class="nav nav-pills flex-column" id="myTab" role="tablist">
						   <li class="nav-item">
						     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#privacy" role="tab" aria-controls="privacy" aria-selected="true">Privacy </a>
						   </li>
						   <li class="nav-item">
						     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="profile" aria-selected="false">Billing</a>
						   </li>
						   <li class="nav-item">
						     <a class="nav-link" id="contact-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="contact" aria-selected="false">Invoices</a>
						   </li>
						 </ul>
	     			</div>
      
     				<div class="col-lg-8">
				 	<div class="tab-content billing-tab" id="myTabContent">
				   		<div class="tab-pane fade show active" id="privacy" role="tabpanel" aria-labelledby="privacy-tab">
						 <div class="col-lg-12  privacy-form ">
							<h3 class="font-weight-bold p-4 border m-0">My Ads settting</h3>
							<h5 class="font-weight-bold p-4 border m-0">Show my phone number in ads</h5>
							<h4 class="font-weight-bold p-4 border mt-5 mb-0">Change password</h4>
							<form class="border">	 
									<div class="col-lg-12 col-md-6"> 
										<input type="password" class="form-control"  placeholder="Current password">
										<input type="password" class="form-control"  placeholder="New Password">
										<input type="password" class="form-control"  placeholder="Confirm new password">
										<button class="btn btn-primary" type="submit">Button</button>	 		 
									</div>	 									
								</form>
						</div>			 
				   </div>
				   <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="profile-tab">
				   		 <div class="col-lg-12 border billing-form ">
								 <h4 class="font-weight-bold ml-4 pt-3 pb-3">Billing information</h4>
								 	<form>
										<h5 class="font-weight-bold ml-4">Customer Information</h5>
										<div class="col-md-6">
											<div class="form-group">
										    <label>Do you have a GST Number?</label>
										    <select class="form-control">
										      <option>Do you have a GST Number?</option>
										      <option>Yes</option>
										      <option>No</option>
										    </select>
										  </div>
										</div>
												<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Email address</label>
																<input type="email" class="form-control"  placeholder="Enter email">
															 </div>
														</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Customer Name</label>
																	<input type="text" class="form-control"  placeholder="Enter email">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Business Name</label>
																	<input type="text" class="form-control"  placeholder="Enter email">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>GST Number</label>
																	<input type="text" class="form-control"  placeholder="Enter email">
																</div>
															</div>

															<div class=" col-md-12 border-top"></div>
																<h5 class="font-weight-bold ml-4 w-100">Customer Address</h5>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Address line 1</label>
																		<input type="text" class="form-control"  placeholder="Enter email">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Address line 2</label>
																		<input type="text" class="form-control"  placeholder="Enter email">
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																    <label>State</label>
																    <select class="form-control">
																      <option>State</option>
																      <option>Rajasthan</option>
																      <option>Punjab</option>
																			 <option>Punjab</option>
																			  <option>Punjab</option>
																				 <option>Punjab</option>
																    </select>
																  </div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>City</label>
																		<input type="text" class="form-control"  placeholder="Enter email">
																	</div>
																</div>
																<div class="col-md-12 p-0 border"></div>
																<div class="billingchange-btn mt-2 mb-2">
															 <button class="btn" type="submit">SAVE CHANGES</button>
														 </div>
												</div>




									</form>


							 </div>
				   </div>
				   <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="-tab">
				   		<h2>Contact</h2>
				    	 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
				   </div>
					</div>
     			</div>
			</div>
		</div>
	</div>
</section>






<?php require('footer.php'); ?>




<style>
	
.setting{
	 width: 100%;
	 display: inline-block;
}



</style>