<?php
//  echo'<pre>'; print_r($categories);die; 
?>
      <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Payment Packages</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?php echo base_url() ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Payment Packages</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- pricing -->
      <section class="pricing-table">
         <div class="container">
            <div class="row"> 
            <?php foreach ($payment_plans as $payment_plan) { ?> 
               <div class="col-md-4">
                  <div class="panel panel-primary text-center advanced-plan margin-bottom-none">
                     <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $payment_plan['offer_name']; ?></h3>
                     </div>
                     <div class="panel-body">
                        <div class="plan-price">
                           <div class="price-value"><?php echo '$'.$payment_plan['price']; ?><span>.00</span></div>
                           <div class="interval">per month</div>
                        </div>
                     </div>
                     <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-check-square text-primary"></i> Free ad posting</li>
                        <li class="list-group-item"><i class="fa fa-check-square text-primary"></i><?php echo $payment_plan['ads_no']; ?>&nbsp;Featured ads availability</li> 
                        <li class="list-group-item"><i class="fa fa-check-square text-primary"></i> 100% Secure!</li>
                        <li class="list-group-item"><a href="<?php echo base_url('payment-option/'.$payment_plan['ID']) ?>" class="btn btn-primary btn-lg">Pay Now</a></li>
                        </li>
                     </ul>
                  </div>
               </div><?php } ?> 
            </div>
         </div>
      </section>
      <!-- End pricing -->
      
	  <!-- Footer -->
