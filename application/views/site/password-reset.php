
      <!-- End Navbar -->
      
     <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Password Reset</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?= base_url() ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Password Reset</li>
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
                        <?= form_open('reset-password/insert/'.$string,['method'=>'POST']); ?>                           
                           <div class="form-group"> 
                              <?= form_input(['type'=>'hidden','name'=>'string','value'=>$string]) ?>
                              <?= form_label('Password *', 'password',['class'=>'control-label']); ?>
                              <?= form_input(['type'=>'password','name'=>'password','placeholder'=>'Password','class'=>'form-control'] ) ?> 
                              <span class="text-danger"><?= form_error('password'); ?></span>  
                           </div>
                           <div class="form-group">
                              <?= form_label('Confirm Password *', 'c_pass',['class'=>'control-label']); ?>
                               <?= form_input(['type'=>'password','name'=>'c_pass','placeholder'=>'Confirm Password','class'=>'form-control'] ) ?> 
                              <span class="text-danger"><?= form_error('c_pass'); ?></span>  
                           </div>                      
                           <div class="form-group">
                              <?= form_button(['type'=>'submit','class'=>'btn btn-block btn-lg btn-primary'],'Reset') ?>
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
