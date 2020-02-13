 
      <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Contact Us</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Contact Us</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- Contact Us -->
      <section class="contact">
         <div class="container">
            <div class="row">
            	<div class="col-md-6">
            		<div class="message">

	            		<?php echo $this->session->flashdata('contact_message'); ?>
            			
            		</div>
            	</div>
            </div>
            <div class="row">
               <div class="col-md-6 ">
                  <div class="widget top-space margin-bottom-none">
                     <div class="widget-header">
                        <h1>Contact Us</h1>
                     </div>

                     <?php 

                        $attr = array('method'=>'POST','id'=>'contactForm');

                        echo form_open('enquiry',$attr); ?> 

                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-6">
                                 <?= form_label('Your Name *', 'name',['class'=>'control-label']); ?> 
                                 <?= form_input(['type'=>'text','name'=>'name','placeholder'=>'Enter Name','class'=>'form-control','maxlength'=>'100']) ?> 

                                 <div class="error-msg"><?= form_error('name'); ?></div>
                              </div>
                              <div class="col-md-6">
                                 <?= form_label('Your Email Address *', 'email',['class'=>'control-label']); ?> 
                                 <?= form_input(['type'=>'email','name'=>'email','placeholder'=>'Enter Email Address','class'=>'form-control']) ?>  
                                 <div class="error-msg"><?= form_error('email'); ?></div>                                 
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <?= form_label('Subject', 'subject',['class'=>'control-label']); ?> 
                                 <?= form_input(['type'=>'text','name'=>'subject','placeholder'=>'Enter The Subject','class'=>'form-control']) ?>  
	                        <div class="error-msg"><?= form_error('subject'); ?> </div>                          
                        </div>
                        <div class="form-group">
                           <?= form_label('Message', 'message',['class'=>'control-label']); ?> 
                                 <?= form_textarea(['row'=>'3','name'=>'message','placeholder'=>'Enter Message','class'=>'form-control']) ?>   
	                        <div class="error-msg"><?= form_error('message'); ?></div>
                        </div>
                        <div class="text-right">
                           <?= form_submit(['value'=>'Send Message','class'=>'btn btn-primary']) ?>  
                        </div>
                     <?php form_close(); ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="widget margin-bottom-none">
                     <div class="widget-header">
                        <h1>Get in Touch</h1>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                     <hr>
                     <h4 class="heading-primary">Benslist <strong>Classified</strong></h4>
                     <ul class="list list-icons list-icons-style-3 mt-xlg">
                        <li><i class="fa fa-fw fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>
                        <li><i class="fa fa-fw fa-phone"></i> <strong>Phone:</strong> (123) 456-789</li>
                        <li><i class="fa fa-fw fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
                     </ul>
                     <hr>
                     <h4 class="heading-primary">Business <strong>Hours</strong></h4>
                     <ul class="list list-icons list-dark mt-xlg">
                        <li><i class="fa fa-fw fa-clock-o"></i> Monday - Friday - 9am to 5pm</li>
                        <li><i class="fa fa-fw fa-clock-o"></i> Saturday - 9am to 2pm</li>
                        <li><i class="fa fa-fw fa-clock-o"></i> Sunday - Closed</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Contact Us -->
      
	  <!-- Footer -->
<style type="text/css">

.message{
    color: #077910;
    font-size: large;
    margin-bottom: 10px;
}	
.error-msg{

    color: #d63434;		
}
</style>