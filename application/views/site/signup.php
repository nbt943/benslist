
      <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Sign Up</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?= base_url() ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Sign Up</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- Login -->
      <section class="login">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-4">
                  <div class="login-panel widget">
                     <div class="login-body">
                        <?= form_open('signup/insert',['method'=>'POST']); ?>  
                           <div class="form-group">
                               <?= form_label('Email *', 'email',['class'=>'control-label']); ?>
                               <?= form_input(['type'=>'text','name'=>'email','placeholder'=>'Email Address','class'=>'form-control']) ?>  
                              <span class="text-danger"><?= form_error('email'); ?></span>         
                           </div>
                           <div class="form-group">
                               <?= form_label('Nicename *', 'user-nicename',['class'=>'control-label']); ?>
                               <?= form_input(['type'=>'text','name'=>'user_nicename','placeholder'=>'Nicename','class'=>'form-control']) ?>  
                              <span class="text-danger"><?= form_error('user_nicename'); ?></span>         
                           </div>
                           <div class="form-group">
                              <?= form_label('Password *', 'password',['class'=>'control-label']); ?>
                              <?= form_input(['type'=>'password','name'=>'password','placeholder'=>'Password','class'=>'form-control']) ?> 
                              <span class="text-danger"><?= form_error('password'); ?></span>  
                           </div>
                           <div class="form-group">
                              <?= form_label('Confirm Password *', 'confirm-password',['class'=>'control-label']); ?>
                              <?= form_input(['type'=>'password','name'=>'c_pass','placeholder'=>'Confirm Password','class'=>'form-control']) ?>  
                              <span class="text-danger"><?= form_error('c_pass'); ?></span>  
                           </div>
                           <div class="login-footer">
                              <div class="checkbox checkbox-primary pull-left">
                              <input id="checkbox2" type="checkbox" name="agree">
                                  <?= form_label('I Agree with Term and Condition *', 'checkbox2'); ?> 
                                  <?= form_checkbox(['id'=>'checkbox2','name'=>'agree']) ?> 
                                 <span class="text-danger"><?= form_error('agree'); ?></span>  
                              </div>                              
                           </div>  
                           <div class="form-group">
                              <button class="btn btn-block btn-lg btn-primary">Sign Up</button>
                           </div>                           
                        <?php form_close(); ?>
                     </div>
                     
                  </div>
                  <p class="text-center margin-bottom-none"><a href="<?= base_url('login') ?>"><strong>Have an account? </strong></a></p>
               </div>
            </div>
         </div>
      </section>
      <!-- End Login -->
      
	  <!-- Footer -->
