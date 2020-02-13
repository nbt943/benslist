<?php 
   require('header.php'); 

?>
 
<!-- form start -->
<section class="form">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="post-ad-form">
               <div class="post-heading">
                  <h1>POST YOUR AD</h1>
               </div>
               <div class="form-inner">
                  <div class="form-heading">
                     <h2>SELECTED CATEGORY</h2>
                  </div>
                  <div class="form-category">
                     <div class="category">
                        <ol>
                           <li>Cars
                              <span>/</span>
                           </li>
                           <li>Cars
                           </li>
                           <li><a href="">Change</a></li>
                        </ol>
                     </div>
                  </div>
                  <form action="<?php echo base_url('insert-site-listing'); ?>" enctype="multipart/form-data" method="POST" >
	                  <div class="form-inner-block">
	                     <div class="inner-block-heading">
	                        <h2>INCLUDE SOME DETAILS</h2>
	                     </div>
	                     <?php 
	                        if($brands !=  '') { ?>
	                     <div class="col-md-6">
	                        <div class="form-group mb-5">
	                           <label for="">Brand*</label>
	                           <select class="form-control select-design">
	                              <option value=""> Select Brand</option>
	                              <?php 
	                                 foreach ($brands as $key => $brand) { ?>
	                              <option value="<?php echo $brand['ID'] ?>"><?php echo $brand['name'] ?></option>
	                              <?php } ?>
	                           </select>
	                        </div>
	                     </div>
	                     <?php } ?>
	                     <div class="col-md-6">
	                        <div class="form-input mb-5">   			
	                           <label for="validationDefault01">Year</label>
	                           <input type="text" name="other_info[year]" class="form-control input-design" id="validationDefault01" placeholder="Year" >
	                        </div>
	                     </div>
	                     <div class="col-md-6">
	                        <div class="form-input mb-5">   			
	                           <label for="validationDefault01">KM driven *</label>
	                           <input type="text" name="other_info[km]" class="form-control input-design" id="validationDefault01" placeholder="KM">
	                        </div>
	                     </div>
	                     <div class="col-md-6">
	                        <div class="form-btn mb-5">
	                           <label for="validationDefault01">Fuel</label> 
	                              <div class="radio">
                                    <label><input type="radio" name="other_info[fuel_type]">CNG & Hybrids</label>
                                 </div>
                                  <div class="radio">
                                    <label><input type="radio" name="other_info[fuel_type]">Diesel</label>
                                  </div>
                                  <div class="radio">
                                    <label><input type="radio" name="other_info[fuel_type]">LPG</label>
                                  </div>
                                  <div class="radio">
                                    <label><input type="radio" name="other_info[fuel_type]">Petrol</label>
                                  </div>           
                           </div>
	                     </div>
	                     <div class="col-md-6">
	                        <div class="form-input mb-5">
	                           <label for="validationDefault01">Ad title *</label>
	                           <input type="text" class="form-control input-design" id="validationDefault01" name="title" placeholder="Title">
	                           <div class="limitation">
	                              <span>Mention the key features of your item (e.g. brand, model, age, type)</span> 
	                           </div>
	                        </div>
	                     </div>
	                     <div class="col-md-6">
	                        <div class="form-group">
	                           <label for="exampleFormControlTextarea1">Description *</label>
	                           <textarea name="description" class="form-control textarea-design" id="exampleFormControlTextarea1" rows="3"></textarea>
	                           <div class="limitation">											    <span>A minimum length of 10 characters is . Please edit 					the field.</span>
	                              <span>0 / 4096</span>
	                           </div>
	                        </div>
	                     </div>
	                     <div class="col-lg-12">
	                        <div class="inner-block-heading">
	                           <h2>SET A PRICE</h2>
	                        </div>
	                     </div>
	                     <div class="col-md-6">
	                        <div class="form-group mb-5">
	                           <label for="validationDefault01">price *</label>
	                           <input type="text" name="price" class="form-control input-design" id="validationDefault01" placeholder=" " value="" > 
	                        </div>
	                     </div>
	                     <div class="col-lg-12">
	                        <div class="inner-block-heading">
	                           <h2>UPLOAD UP TO 20 PHOTOS</h2>
	                        </div>
	                     </div>
	                     <div class="col-md-6">
	                        <div class="row">
	                           <?php
	                              for ($i=1; $i<=6 ; $i++) {  ?>
	                           <div class="col-md-4">
	                              <div class="custom-file mb-5">
	                                 <input type="file" class="custom-file-input" name="img_<?php echo $i; ?>" id="customFile">
	                                 <label class="custom-file-label" for="customFile">Choose file</label>
	                              </div>
	                           </div>
	                           <?php }
	                              ?>
	                        </div>
	                     </div>
	                     <div class="col-lg-12">
	                        <div class="inner-block-heading">
	                           <h2>Confirm your location</h2>
	                        </div>
	                     </div>
	                     <div class="col-md-6">
                           <div class="form-group mb-5">
                              <label for="">Country *</label>
                              <select id="State" name="country_id" class="select-design">
                                 <option value="">Select Country</option>
                                 <?php foreach ($countries as $country) { ?>                                  
                                 <option value="<?php echo $country['ID'] ?>"><?php echo $country['country_name'] ?></option>
                              <?php } ?>
                              </select>
                           </div>
	                        <div class="form-group mb-5">
	                           <label for="">State *</label>
	                           <select id="State" name="state_id" class="select-design">
                                 <option value="">Select State</option>
                                 <?php foreach ($states as $state) { ?> 	                              
	                              <option value="<?php echo $state['ID'] ?>"><?php echo $state['state_name'] ?></option>
                              <?php } ?>
	                           </select>
	                        </div>
	                        <div class="form-group mb-5">
	                           <label for="">City *</label>
	                           <select id="State" name="city_id" class="select-design">
	                              <option value="unknown">Select City</option>
                                 <?php foreach ($cities as $city) { ?>
                                    <option value="<?php echo $city['ID'] ?>"><?php echo $city['city_name'] ?></option>
                                 <?php } ?>
	                           </select>
	                        </div>
	                     </div>
	                     <div class="col-lg-12">
	                        <div class="inner-block-heading">
	                           <h2>REVIEW YOUR DETAILS</h2>
	                        </div>
	                     </div>
	                     <div class="col-md-6">
	                        <div class="row">
	                           <div class="col-md-3">
	                              <div class="custom-file review-img mb-5">
	                                 <input type="file" class="custom-file-input" id="customFile">
	                                 <label class="custom-file-label" for="customFile"><i class="fa fa-camera"></i></label>
	                              </div>
	                           </div>
	                           <div class="col-md-9">
	                              <div class="form-input seller-name mb-5">   			
	                                 <label for="validationDefault01">Name</label>
	                                 <input type="text" class="form-control input-design" id="validationDefault01" placeholder="Seller Name " value="" >
	                              </div>
	                           </div>
	                           <div class="col-md-8">
	                              <div class="review-p">
	                                 <p>Your phone number</p>
	                              </div>
	                           </div>
	                           <div class="col-md-4">
	                              <div class="review-p text-right">
	                                 <p>+91 9876543210</p>
	                              </div>
	                           </div>
	                           <div class="col-md-8">
	                              <div class="review-p">
	                                 <p>Show my phone number on my ads</p>
	                              </div>
	                           </div>
	                           <div class="col-md-4">
	                              <div class="review-p text-right">
	                                 <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
	                                    <div class="handle"></div>
	                                 </button>
	                              </div>
	                           </div>
	                           <div class="col-md-4">
	                              <div class="review-p text-right">
	                                 <button type="submit" class="btn btn-primary">Create</button>
	                                    <div class="handle"></div>
	                                 </button>
	                              </div>
	                           </div>	                           
	                        </div>
	                     </div>
	                  </div>
            	  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php require('footer.php'); ?>
<style>
   .post-heading{
   text-align: center;
   }
   .post-heading h1{
   font-weight: 900;
   font-size: 24px;
   }
   .form
   .category ol {
   list-style: none;
   display: flex;
   text-align: left;
   padding: 0;
   color: rgba(0,47,52,.64);
   margin: 20px 0px;
   }
   .category ol li span{
   margin: 0px 5px;
   color: rgba(0,47,52,.64);
   }
   .category ol li a{
   padding: 0px 20px;
   color: #ee0880;
   text-decoration: none;
   font-weight: 900;
   text-transform: uppercase;
   }
   .form-inner{
   border: 1px solid#ccc;
   }
   .border-bottom: {
   border-bottom: 1px solid#ccc;
   }
   .form-category{
   padding: 0px 16px;
   }
   .form-heading{
   padding: 0px 16px;
   }
   .form-heading h2{
   font-weight: bold;
   font-size: 20px;
   }
   .form-inner-block{
   padding: 10px;
   }
   .inner-block-heading h2{
   font-weight: bold;
   font-size: 20px;
   }
   label{
   color: #002f34;
   display: block;
   font-size: 14px;
   line-height: 16px;
   font-weight: 500;
   }
   .select-design{
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
   box-shadow: inset 0 0 0 1px rgba(0,47,52,.64);
   }
   .form-design{
   margin: 5% 0%;
   display: flow-root;
   }
   .input-design{
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
   box-shadow: inset 0 0 0 1px rgba(0,47,52,.64);
   }
   .btn-design{
   -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;
   background-color: #fff;
   border-style: none;
   box-shadow: inset 0 0 0 1px #002f34;
   color: #002f34;
   cursor: pointer;
   font-size: 14px;
   height: 48px;
   margin-bottom: 8px;
   margin-right: 39px;
   min-width: 64px;
   outline: 0;
   padding: 8px 16px;
   }
   .btn-design:hover{
   background-color: #cbf7ee;
   box-shadow: inset 0 0 0 1px #00777f;
   color: #00777f;
   }
   .textarea-design{
   -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;
   background-color: #fff;
   border-style: none;
   box-shadow: inset 0 0 0 1px #002f34;
   color: #002f34;
   cursor: pointer;
   font-size: 14px;
   height: 47px !important;
   margin-bottom: 8px;
   margin-right: 8px;
   min-width: 64px;
   outline: 0;
   padding: 8px 16px;
   }
   .limitation{
   display: flex;
   }
   .limitation span{
   font-size: 13px;
   flex-grow: 1;
   }
   .btn-file {
   position: relative;
   overflow: hidden;
   }
   .btn-file input[type=file] {
   position: absolute;
   top: 0;
   right: 0;
   min-width: 100%;
   min-height: 100%;
   font-size: 100px;
   text-align: right;
   filter: alpha(opacity=0);
   opacity: 0;
   outline: none;   
   cursor: inherit;
   display: block;
   }
   .custom-file label{
   font-size: 12px;
   color: #002f34;
   }
   .form{
   margin: 5% auto;
   }
   .review-img{
   width: 50%;
   background: transparent;
   border-radius: 70px;
   padding: 50px;
   border: 1px solid #ccc;
   }
   .review-img label i{
   font-size: 40px;
   position: absolute;
   top: 31px;
   left: 26px;
   color: #000;
   }
   .seller-name {
   margin: 4% 0%;
   }
</style>