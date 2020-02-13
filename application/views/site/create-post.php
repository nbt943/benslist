<?php 

 ?> 
   <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Post Your Ad</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="<?php echo base_url(); ?>">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Post Your Ad</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
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
                        <?= form_open('insert-site-listing',['enctype'=>'multipart/form-data','method'=>'POST']); ?> 
                        <div class="col-sm-6">
                           <div class="form-group">
                              <?php $value = '';if(isset($lists['lists']['title'])) { $value = $lists['lists']['title']; } ?>
                              <?= form_label('Ad Title *', 'title',['class'=>'control-label']); ?> 
                              <?= form_input(['type'=>'text','name'=>'title','placeholder'=>'e.g. Apple iPhone SE 2017','class'=>'form-control border-form','value'=>$value] ) ?>
                           </div>
                           <span class="text-danger"><?= form_error('title'); ?></span>         
                        </div>
                        <div class="col-sm-6 get-cat-div">
                           <div class="form-group">
                              <?= form_label('Category *', 'category',['class'=>'control-label']); ?> 
                              <?php $value=array(''=>'Category'); foreach ($categories as $key => $category) { 
                               $value[$category['ID']] = $category['name'];  
                              } ?>
 
                              <?= form_dropdown('cat_id', $value, '',['class'=>'form-control border-form site-categories'])  ?> 
                           </div>
                           <span class="text-danger"><?= form_error('cat_id'); ?></span>         
                        </div>

                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="row">
                                 <?= form_label('Condition *', 'condition',['class'=>'col-sm-12 control-label']); ?> 
                                 <div class="col-sm-12 p-0">
                                    <div class="radio radio-info radio-inline">
                                  <?= form_radio(['name'=>'product_type','value'=>'new','id'=>'new']) ?>
                                  <?= form_label('Brand New *', 'new'); ?>  
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                  <?= form_radio(['name'=>'product_type','value'=>'used','id'=>'used'] ) ?> 
                                  <?= form_label('Used *', 'used'); ?>  
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <span class="text-danger"><?= form_error('product_type'); ?></span>         
                        </div> 
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?= form_label('Price *', 'price',['class'=>'control-label']); ?>  
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-euro"></i></span>
                                 <?php $value='';if(isset($lists['lists']['price'])) { $value = $lists['lists']['price']; }?>
                                  <?= form_input(['type'=>'text','name'=>'price','placeholder'=>'e.g. 999','class'=>'form-control border-form','value'=>$value] ) ?> 
                              </div>
                           </div>
                           <span class="text-danger"><?= form_error('price'); ?></span>         
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <?= form_label('Year *', 'year',['class'=>'control-label']); ?>   
                              <?php $value='';if(isset($lists['lists']['year'])) { $value = $lists['lists']['year']; } ?>
                              <?= form_input(['type'=>'text','name'=>'year','placeholder'=>'Year','class'=>'form-control border-form','value'=>$value] ) ?>  
                           </div>
                           <span class="text-danger"><?= form_error('year'); ?></span>         
                        </div> 
                        <div class="col-sm-12">  
                           <div class="col-sm-6 p-0">
                              <div class="form-group">
                              <label class="control-label">Add Photos</label>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <img id="list-img_1" src="#" alt="your image" style="display: none;" />
                                       <div class="file-field">
                                          <div class="d-flex justify-content-center">
                                             <div class="btn addphoto-btn active">
                                                <i class="fa fa-camera"></i>
                                                <h3>Add Photo</h3>
                                                 <?= form_input(['type'=>'file','name'=>'img_1','onchange'=>'readURL_1(this)']) ?>
                                             </div>
                                          </div>
                                       </div> 
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
                        <div class="col-sm-6 get-country-div">
                           <div class="form-group">
                              <?= form_label('Country *', 'country',['class'=>'control-label']); ?> 
                               <?php $value=array(''=>'Country'); foreach ($countries as $key => $country) 
                              { 
                                 $value[$country['ID']] = $country['country_name'];  
                              }  
                              ?>
                              <?= form_dropdown('country_id', $value, '',['class'=>'form-control border-form site-countries'])  ?> 
                             </div>
                           <span class="text-danger"><?= form_error('country_id'); ?></span>         
                        </div> 
                                                                          
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?= form_label('Ad Description *', 'description',['class'=>'control-label']); ?> 
                              <?php $value=''; if(isset($lists['lists']['description'])) { $value = $lists['lists']['description']; }?>
                              <?= form_textarea(['placeholder'=>'Include the brand, model, age and any included accessories','name'=>'description','class'=>'form-control border-form'],$value) ?>   
                           </div>
                           <span class="text-danger"><?= form_error('description'); ?></span>         
                        </div>
                        <div class="col-sm-6">  
                           <div class="form-group">
                              <?php $value=''; if(isset($lists['lists']['name'])) { $value = $lists['lists']['name']; }?>
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
                                  <?php $value=''; if(isset($lists['lists']['phone_number'])) { $value = $lists['lists']['phone_number']; }?>
                               <?= form_input(['type'=>'text','placeholder'=>'e.g. 123456789','name'=>'phone_number','class'=>'form-control border-form','value'=>$value]) ?>
                              </div>
                           </div>
                           <span class="text-danger"><?= form_error('phone_number'); ?></span>         
                        </div> 
                        <div class="col-sm-12">  
                           <div class="form-group text-right margin-bottom-none">
                              <?= form_button(['type'=>'submit','class'=>'btn btn-success'],'<i class="fa fa-save"></i> CREATE POST') ?>
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
