<?php

require('header.php');

?>

 
<!-- package billing -->
<section class="biiling-package mt-5 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="col-lg-4 mb-3">
         <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
					   <li class="nav-item">
					     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#boughtpackage" role="tab" aria-controls="home" aria-selected="true">Bought Packages</a>
					   </li>
					   <li class="nav-item">
					     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="profile" aria-selected="false">Billing</a>
					   </li>
					   <li class="nav-item">
					     <a class="nav-link" id="contact-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="contact" aria-selected="false">Invoices</a>
					   </li>
					 </ul>
     		</div>
     <!-- /.col-md-4 -->
      <div class="col-lg-8">
				 <div class="tab-content billing-tab" id="myTabContent">
				   <div class="tab-pane fade show active" id="boughtpackage" role="tabpanel" aria-labelledby="home-tab">
							<nav class="border p-3">
	            	<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
		               <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#active" role="tab" aria-controls="nav-home" aria-selected="true">Active</a>
	                 <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sheduled" role="tab" aria-controls="nav-profile" aria-selected="false">SCHEDULED</a>
	                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#expired" role="tab" aria-controls="nav-contact" aria-selected="false">EXPIRED</a>
	              </div>
	           </nav>

							 <div class="tab-content" id="nav-tabContent">
									<div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="nav-home-tab">
										dfafdsdsffsdfsdfsdf
									</div>
									<div class="tab-pane fade" id="sheduled" role="tabpanel" aria-labelledby="nav-profile-tab">
										dfsfgfgzzzzzzdfsdfdsfdsfsdfsdf
								 	</div>
								  <div class="tab-pane fade" id="expired" role="tabpanel" aria-labelledby="nav-contact-tab">
										fdsdfgfdgfgjhjhnbnbnbn
					 			 </div>
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
				   <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="contact-tab">
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
.billing-tab .nav-tab{
	font-size: 18px;
	border:none;
}
.billing-tab nav{
	font-size: 18px;

}
.billing-tab .nav-link{
	border:none;
	color: rgba(0,47,52,.36);
}
.billing-tab .nav-link.active{
	border-bottom: 2px solid#002f34;
	    color: #002f34;
}
.billing-tab .nav-link:hover{
	border-color: unset;
}
.billing-tab .nav-tabs{
	border:none;
}
.billing-form h4{
	font-size: 20px;
	line-height: 24px;
	color: #002f34;

}
.billing-form h5{
	font-size: 16px;
    line-height: 24px;

    color: #002f34;
    padding: 8px 0;
}
.billing-form label{
	color: #002f34;
    display: block;
    font-size: 14px;
    line-height: 16px;
		font-weight: 200
}
.billing-form select{
	-webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: none;
    border: none;
    color: #002f34;
    display: block;
    font-size: 16px;
    height: 48px;
    box-sizing: border-box;
    outline: none;
    padding-left: 12px;
    padding-right: 12px;
    width: 100%;
		background: #fff;
    box-shadow: inset 0 0 0 1px rgba(0,47,52,.64);
}

 .billing-form input{
	 -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: none;
    border: none;
    color: #002f34;
    display: block;
    font-size: 16px;
    height: 48px;
    box-sizing: border-box;
    outline: none;
    padding-left: 12px;
    padding-right: 12px;
    width: 100%;
		background: #fff;
		box-shadow: inset 0 0 0 1px rgba(0,47,52,.64);
		margin: 20px 0px;
 }
 .billingchange-btn{
	 display: flex;
    width: 100%;
    justify-content: flex-end;
 }
.billingchange-btn .btn{
	background: #ee0880;
    color: #fff;
    font-weight: bold;
    padding: 15px 20px;
}

 .nav-pills .nav-link.active {
	color: #fff !important;
		background-color: #002f34 !important;
		font-weight: 600 !important;
}
.biiling-package .nav-item a{
	color: #6c757d;
	font-size: 16px;
	font-weight: 500
}
.biiling-package{
	margin: 5% 0;
	width: 100%;
	display: inline-block;
}





</style>
