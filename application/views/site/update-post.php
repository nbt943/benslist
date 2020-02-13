<?php 
 // echo '<pre>' ; print_r($listings);die; 
?>

      <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Update Your Ad</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?= base_url(); ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Update Your Ad</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- Create Post -->
   <?php  
      $listing_id= $listings['ID']*5359;
      $listing_id = 'BENS-'.$listing_id.'-LIST'; 
   ?>
             
      <section class="create-post">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
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
                  <div class="login-panel widget margin-bottom-none">
                     <div class="login-body">
                        <?= form_open('edit-post/'.$listing_id,['method'=>'POST','enctype'=>'multipart/form-data']); ?> 
                        <div class="col-sm-6">
                           <div class="form-group"> 
                              <?php $value = ''; if(isset($listings['title'])){ $value = $listings['title'];} ?>
                              <?= form_label('Ad Title *', 'title',['class'=>'control-label']); ?> 
                              <?= form_input(['type'=>'text','name'=>'title','placeholder'=>'e.g. Apple iPhone SE 2017','class'=>'form-control border-form','value'=>$value] ) ?>
                           </div>
                           <span class="text-danger"><?= form_error('title'); ?></span>         
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <?= form_label('Price *', 'price',['class'=>'control-label']); ?> 
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-euro"></i></span>
                                 <?php $value='';if(isset($listings['price'])){ $value = $listings['price']; }?>
                                  <?= form_input(['type'=>'text','name'=>'price','placeholder'=>'e.g. 999','class'=>'form-control border-form','value'=>$value] ) ?> 
                              </div>
                           </div>
                           <span class="text-danger"><?= form_error('price'); ?></span>   
                        </div>

                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="row">
                                 <?= form_label('Condition *', 'condition',['class'=>'col-sm-12 control-label']); ?>  
                                 <div class="col-sm-12 p-0">
                                    <div class="radio radio-info radio-inline">
                                       <?php $value =''; if(isset($listings['product_type'])){ if($listings['product_type'] == 'new'){ $value = 'checked'; }} ?>
                                       <?= form_radio(['name'=>'product_type','value'=>'new','id'=>'new','checked'=>$value ]) ?>
                                       <?= form_label('Brand New *', 'new'); ?> 
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                       <?php $value=''; if(isset($listings['product_type'])){ if($listings['product_type'] == 'used'){ $value = 'checked'; }}?>
                                       <?= form_radio(['name'=>'product_type','value'=>'used','id'=>'used','checked'=>$value ]) ?>
                                       <?= form_label('Used *', 'Used'); ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <span class="text-danger"><?= form_error('product_type'); ?></span>         
                        </div> 
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?php $value=''; if(isset($listings['year'])){ $value = $listings['year']; } ?>
                              <?= form_label('Year *', 'year',['class'=>'control-label']); ?> 
                              <?= form_input(['type'=>'text','name'=>'year','placeholder'=>'Year','class'=>'form-control border-form','value'=>$value] ) ?>   
                           </div>
                           <span class="text-danger"><?php echo form_error('year'); ?></span>   
                        </div>
                          
                        <div class="col-sm-12">  
                           <div class="col-sm-6 p-0">
                              <div class="form-group">
                              <label class="control-label">Add Photos</label>
                                 <div class="row">
                                    <div class="col-md-4">
                                    <img src="<?php if(isset($listings['image_1'])){echo base_url('assets/images/site-listings/'.$listings['image_1']); } ?>" alt="your image"/>
                                       <!-- <div class="file-field">
                                          <div class="d-flex justify-content-center">
                                             <div class="btn addphoto-btn active">
                                                <i class="fa fa-camera"></i>
                                                <h3>Add Photo</h3>
                                                <input type="file" name="img_1" onchange="readURL_1(this);">
                                             </div>
                                          </div>
                                       </div>  -->
                                    </div> 

                                     <div class="col-md-4">


                                    <img id="list-img_2" src="#" alt="your image" style="display: none;" />
                                          <div class="file-field">
                                             <div class="d-flex justify-content-center">
                                                <div class="btn addphoto-btn">
                                                   <i class="fa fa-camera"></i>
                                                   <h3>Add Photo</h3>
                                                   <input type="file" name="img_2" onchange="readURL_2(this);">
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
                                                   <input type="file" name="img_3" onchange="readURL_3(this);">
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
                                                   <input type="file" name="img_4" onchange="readURL_4(this);">
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
                                                   <input type="file" name="img_5" onchange="readURL_5(this);">
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
                                                   <input type="file" name="img_6" onchange="readURL_6(this);">
                                                </div>
                                             </div>
                                          </div> 
                                       </div>                                    
                                   </div> 
                                 </div>
                              </div>
                                    <span class="text-danger"><?php //echo form_error('img_1'); ?></span>         
                           </div>
                        </div>
                        <div class="col-sm-12 addphoto-border"></div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <?php $value=''; if(isset($listings['name'])){ $value = $listings['name']; } ?>
                              <?= form_label('Your Name *', 'name',['class'=>'control-label']); ?> 
                              <?= form_input(['type'=>'text','placeholder'=>'e.g. Benslist','name'=>'name','class'=>'form-control border-form','value'=>$value]) ?>
                           </div>
                           <span class="text-danger"><?= form_error('name'); ?></span>     
                        </div> 
                                                                          
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?= form_label('Ad Description *', 'description',['class'=>'control-label']); ?> 
                              <?php $value=''; if(isset($listings['description'])){ $value = $listings['description']; } ?>
                              <?= form_textarea(['placeholder'=>'Include the brand, model, age and any included accessories','name'=>'description','class'=>'form-control border-form'],$value) ?>
                           </div>
                           <span class="text-danger"><?php echo form_error('description'); ?></span>         
                        </div>
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?= form_label('Phone number *', 'phone_number',['class'=>'control-label']); ?>  
                              <div class="input-group">
                                 <span class="input-group-addon">+44</span>
                                 <?php $value=''; if(isset($listings['phone_number'])){ $value = $listings['phone_number']; } ?>
                               <?= form_input(['type'=>'text','placeholder'=>'e.g. 123456789','name'=>'phone_number','class'=>'form-control border-form','value'=>$value]) ?> 
                              </div>
                           </div>
                           <span class="text-danger"><?php echo form_error('phone_number'); ?></span>   
                        </div> 
                        <div class="col-sm-12">  
                           <div class="form-group text-right margin-bottom-none">
                              <?= form_button(['type'=>'submit','class'=>'btn btn-success'],'<i class="fa fa-save"></i> UPDATE POST') ?>
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
