
      <!-- End Navbar -->
      
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Forgot Password</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?= base_url() ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Forgot Password</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
	  <!-- Login -->
      <section class="login">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-4">
                  <div class="login-panel widget">
                     <div class="login-body">
                      <?= form_open('forgot-password/insert',['method'=>'POST']); ?> 
                          <?php
                              if($this->session->flashdata('message'))
                              {
                                  echo '
                                  <div class="alert alert-danger">
                                      '.$this->session->flashdata("message").'
                                  </div>
                                  ';
                              }
                              ?>     
                          <div class="form-group">
                            <?= form_label('Email *', 'email',['class'=>'control-label']); ?>
                            <?= form_input(['type'=>'text','name'=>'email','placeholder'=>'Email','class'=>'form-control'] ) ?>                              
                              <span class="text-danger"><?= form_error('email'); ?></span>         
                           </div>
                            
                           <div class="form-group">
                             <?= form_button(['type'=>'submit','class'=>'btn btn-block btn-lg btn-primary'],'Continue') ?> 
                           </div>
                        <?php form_close(); ?>
                     </div> 
                     <div class="login-footer"> 
                        <p class="text-center">Enter your registered email</p>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <p class="text-center margin-bottom-none">Don't have an account? <a href="<?= base_url('signup') ?>"><strong>Signup</strong></a></p>
               </div>
            </div>
         </div>
      </section>
      <!-- End Login -->
      
	  <!-- Footer -->
