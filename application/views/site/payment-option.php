<?php
 // echo'<pre>'; print_r($admin_payment_details);die; 
?>
      <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Payment Option</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?php echo base_url(); ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Payment Option</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- pricing -->
     <!--  <section class="pricing-table">
         <div class="container">
            <div class="row">  
               <div class="col-md-4">
                  <div class="panel panel-primary text-center advanced-plan margin-bottom-none">
                     <div class="panel-heading">
                        <h3 class="panel-title">a</h3>
                     </div>
                     <div class="panel-body">
                        <div class="plan-price">
                           <div class="price-value"><span>.00</span></div>
                           <div class="interval">a</div>
                        </div>
                     </div>
                     <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-check-square text-primary"></i> Free ad posting</li>
                        <li class="list-group-item"><i class="fa fa-check-square text-primary"></i>Featured ads availability</li> 
                        <li class="list-group-item"><i class="fa fa-check-square text-primary"></i> 100% Secure!</li>
                        <li class="list-group-item"><a href="" class="btn btn-primary btn-lg">Pay Now</a></li>
                        </li>
                     </ul>
                  </div>
               </div><?php // } ?> 
            </div>
         </div>
      </section> --> 
<?php 
// echo '<pre>' ;print_r($admin_payment_details);die; ?>
      <section class="payment-option">
         <div class="container">
            <div class="row">
               <div class="col-md-2"></div>
            <?php if($admin_payment_details[0]['status'] == 'true'){ ?> 
               <div class="col-md-4">
                  <div class="paypal-logo payment-hover">
                     <a href="<?php echo base_url('payment-plan/'.$plan[0]['ID']) ?>"><img src="<?php echo base_url('site-assets/images');?>/paypal-logo.png"></a>
                  </div>
               </div> 
            <?php } ?>

            <?php if($admin_payment_details[1]['status'] == 'true'){ ?> 
               <div class="col-md-4">
                  <div class="stripe-logo payment-hover">
                     <a href="<?php echo base_url('stripe-payment/'.$plan[0]['ID']) ?>"><img src="<?php echo base_url('site-assets/images');?>/stripe-logo.png"></a>
                  </div> 
               </div>
            <?php } ?>
            </div>
         </div>
      </section>
      <!-- End pricing -->
      
	  <!-- Footer -->
