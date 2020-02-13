<?php 
   // echo '<pre>'; print_r($giveaway_listings);die;
 ?> 
   <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Update Your Giveaway Post</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?php echo base_url(); ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Update Your Giveaway Post</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
   <?php  
      $giveaway_listings_id= $giveaway_listings['ID']*7523;
      $giveaway_listings_id = 'BENS-'.$giveaway_listings_id.'-LIST'; 
   ?>
	  <!-- Create Post -->
     

      <section class="create-post">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="login-panel widget margin-bottom-none">
                     <div class="login-body">
                         <?php
                           if($this->session->flashdata('message'))
                            {
                              echo '
                              <div class="alert alert-success">
                                 '.$this->session->flashdata("message").'
                             </div>
                             ';
                           }
                         ?>
                        <?= form_open('giveaway/giveaway-post-edit/'.$giveaway_listings_id,['enctype'=>'multipart/form-data','method'=>'POST']); ?> 
                        <div class="col-sm-6">
                           <div class="form-group">
                              <?php $value = '';if(isset($giveaway_listings['title'])) { $value = $giveaway_listings['title']; } ?>
                              <?= form_label('Item Title *', 'title',['class'=>'control-label']); ?> 
                              <?= form_input(['type'=>'text','name'=>'title','placeholder'=>'e.g. Pizza','class'=>'form-control border-form','value'=>$value] ) ?>
                           </div>
                           <span class="text-danger"><?= form_error('title'); ?></span>         
                        </div>
                        <div class="col-sm-6 giveaway-cate">
                           <div class="form-group">
                              <?= form_label('Product Category *', 'giveaway_cate',['class'=>'control-label']); ?> 
                              <?php $value=array(''=>'Select Category','f'=>'Food','nf'=>'Non-Food'); 
                              ?> 
                              <?= form_dropdown('giveaway_cate', $value, '',['class'=>'form-control border-form'])  ?> 
                           </div>
                           <span class="text-danger"><?= form_error('giveaway_cate'); ?></span>         
                        </div> 
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?= form_label('Pickup Time *', 'time',['class'=>'control-label']); ?>  
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                 <?php// $value='';if(isset($lists['lists']['price'])) { $value = $lists['lists']['price']; ?> 
                                  <?= form_input(['type'=>'text','name'=>'pick_time','id'=>'timepicker','placeholder'=>'e.g. 01:30 PM','class'=>'form-control border-form timepicker','value'=>''] ) ?>
                                  <p id="output"></p> 
                              </div>
                           </div>
                           <span class="text-danger"><?= form_error('price'); ?></span>         
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <?= form_label('location *', 'year',['class'=>'control-label']); ?>   
                              <?php  $value='';if(isset($giveaway_listings['location'])) { $value = $giveaway_listings['location']; } ?>
                              <?= form_input(['type'=>'text','name'=>'location','placeholder'=>'Location','class'=>'form-control border-form','value'=>$value]) ?>  
                           </div>
                           <span class="text-danger"><?= form_error('location'); ?></span>         
                        </div>                          

                        <div class="col-sm-12">  
                           <div class="col-sm-6 p-0">
                              <div class="form-group">
                              <label class="control-label">Add Photos</label>
                                 <div class="row">
                                    <div class="col-md-4">
                                    <img  src="<?php if(isset($giveaway_listings['image_1'])){echo base_url('site-assets/images/giveaway-listings/'.$giveaway_listings['image_1']);} ?>" alt="your image" /> 
                                    </div>                                   
                                     <div class="col-md-4"> 

                                    <img id="list-img_2" src="#" alt="your image" style="display: none;" />
                                          <div class="file-field">
                                             <div class="d-flex justify-content-center">
                                                <div class="btn addphoto-btn">
                                                   <i class="fa fa-camera"></i>
                                                   <h3>Add Photo</h3>
                                                   <?= form_input(['type'=>'file','name'=>'img_2','onchange'=>'readURL_2(this)']) ?> 
                                                </div>
                                             </div>
                                          </div> 
                                    </div>
                                     <div class="col-md-4"> 
                                    <img id="list-img_3" src="#" alt="your image" style="display: none;" />
                                          <div class="file-field">
                                             <div class="d-flex justify-content-center">
                                                <div class="btn addphoto-btn">
                                                   <i class="fa fa-camera"></i>
                                                   <h3>Add Photo</h3>
                                                   <?= form_input(['type'=>'file','name'=>'img_3','onchange'=>'readURL_3(this)']) ?>  
                                                </div>
                                             </div>
                                          </div> 
                                    </div>                                     
                                 <div class="col-lg-12 mt-2 p-0">
                                    <div class="col-md-4"> 
                                    <img id="list-img_4" src="#" alt="your image" style="display: none;" />
                                          <div class="file-field">
                                             <div class="d-flex justify-content-center">
                                                <div class="btn addphoto-btn">
                                                   <i class="fa fa-camera"></i>
                                                   <h3>Add Photo</h3>
                                                   <?= form_input(['type'=>'file','name'=>'img_4','onchange'=>'readURL_4(this)']) ?>  
                                                </div>
                                             </div>
                                          </div> 
                                    </div>
                                    <div class="col-md-4">
                                    <img id="list-img_5" src="#" alt="your image" style="display: none;" />
                                       <div class="file-field">
                                          <div class="d-flex justify-content-center">
                                             <div class="btn addphoto-btn">
                                                <i class="fa fa-camera"></i>
                                                <h3>Add Photo</h3>
                                                <?= form_input(['type'=>'file','name'=>'img_5','onchange'=>'readURL_5(this)']) ?> 
                                             </div>
                                          </div>
                                       </div> 
                                    </div>
                                     <div class="col-md-4">
                                    <img id="list-img_6" src="#" alt="your image" style="display: none;"/>
                                       <div class="file-field">
                                          <div class="d-flex justify-content-center">
                                             <div class="btn addphoto-btn">
                                                <i class="fa fa-camera"></i>
                                                <h3>Add Photo</h3>
                                                <?= form_input(['type'=>'file','name'=>'img_6','onchange'=>'readURL_6(this)']) ?>  
                                             </div>
                                          </div>
                                       </div> 
                                       </div>                                    
                                   </div> 
                                 </div>
                              </div>
                                 <span class="text-danger"><?= form_error('img_1'); ?></span> 
                                 <?php 
                                 if($this->session->flashdata('image_error'))
                                 {
                                   echo $this->session->flashdata('image_error'); 
                                 }   
                                 ?>        
                           </div>
                        </div>
                        <div class="col-sm-12 addphoto-border"></div>                       
                                                                          
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?= form_label('Ad Description *', 'description',['class'=>'control-label']); ?> 
                              <?php $value=''; if(isset($giveaway_listings['description'])) { $value = $giveaway_listings['description']; }?>
                              <?= form_textarea(['placeholder'=>'Include the brand, model, age and any included accessories','name'=>'description','class'=>'form-control border-form'],$value) ?>   
                           </div>
                           <span class="text-danger"><?= form_error('description'); ?></span>         
                        </div>
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?php $value=''; if(isset($giveaway_listings['name'])) { $value = $giveaway_listings['name']; }?>
                              <?= form_label('Your Name *', 'name',['class'=>'control-label']); ?> 
                               <?= form_input(['type'=>'text','placeholder'=>'e.g. Benslist','name'=>'name','class'=>'form-control border-form','value'=>$value]) ?> 
                           </div>
                           <span class="text-danger"><?= form_error('name'); ?></span>         
                        </div> 
                        <div class="col-sm-6">   
                           <div class="form-group"> 
                              <?= form_label('Phone number *', 'phone_number',['class'=>'control-label']); ?> 
                              <div class="input-group">
                                 <span class="input-group-addon">+44</span>
                                  <?php $value=''; if(isset($giveaway_listings['phone_number'])) { $value = $giveaway_listings['phone_number']; }?>
                               <?= form_input(['type'=>'text','placeholder'=>'e.g. 123456789','name'=>'phone_number','class'=>'form-control border-form','value'=>$value]) ?>
                              </div>
                           </div>
                           <span class="text-danger"><?= form_error('phone_number'); ?></span>         
                        </div> 
                        <div class="col-sm-12">  
                           <div class="form-group text-right margin-bottom-none">
                              <?= form_button(['type'=>'submit','class'=>'btn btn-success'],'<i class="fa fa-save"></i> update POST') ?>
                              <?= form_button(['type'=>'reset','class'=>'btn btn-danger'],'<i class="fa fa-close"></i> Reset') ?> 
                           </div>
                        </div>   
                        <?php form_close(); ?>
                     </div>                          
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Create Post -->
      
	  <!-- Footer -->
