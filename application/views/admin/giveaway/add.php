<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo  base_url('admin/users'); ?>">Listing</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
	
    <section class="content">
      <div class="row">
	  
        <!-- left column -->
        <div class="col-md-12">	
		
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
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
              <h3 class="box-title">Add Listing</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

	
            <form role="form" action="<?php echo base_url().'admin/listing/insert'?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="user_role">User</label>
                  <select  name="user_id" class="form-control">
                    <option value="">Select User</option>  
                    <?php 
                      foreach ($sellers as $key => $seller) { ?>
                      <option value="<?php echo $seller->id ?>"><?php echo $seller->display_name;  ?></option>  

                    <?php  }
                    ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('user_id'); ?></span>                   
                </div>

                <div class="form-group">
                  <label for="user_role">Category</label>
                  <select  name="category_id" class="form-control">
                    <option value="">Select Category</option> 
                     <?php 
                      foreach ($categories as $key => $category) { ?>
                      <option value="<?php echo $category['ID'] ?>"><?php echo $category['name'];  ?></option>  

                    <?php  }
                    ?>                    
                  </select>
                  <span class="text-danger"><?php echo form_error('category_id'); ?></span>                   
                </div>

                <div class="form-group">
                  <label for="user_role">Trade</label>
                  <select  name="trade" class="form-control">
                    <option value="">Select Trade</option>
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>  
                  </select>
                  <span class="text-danger"><?php echo form_error('trade'); ?></span>                   
                </div>

                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                  <span class="text-danger"><?php echo form_error('title'); ?></span>         
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="description" placeholder="Description"></textarea>
                  <span class="text-danger"><?php echo form_error('description'); ?></span>         

                </div>

                <div class="form-group">
                  <label for="user_pass">Country</label>
                  <select  name="country_id" class="form-control country_id">
                    <option value="">Select Country</option>
                    <?php foreach ($countries as $country) { ?>
                        <option value="<?php echo $country['ID'] ?>"><?php echo $country['country_name'] ?></option> 
                   <?php  } ?> 
                  </select>
                  <span class="text-danger"><?php echo form_error('country_id'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">State</label>
                  <select  name="state_id" class="form-control state_id">
                    <option value="">Select State</option>
                    <?php foreach ($states as $state) { ?>
                        <option value="<?php echo $state['ID'] ?>"><?php echo $state['state_name'] ?></option> 
                   <?php  } ?> 
                  </select>
                  <span class="text-danger"><?php echo form_error('state_id'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">City</label>
                  <select  name="city_id" class="form-control city_id">
                    <option value="">Select City</option>
                    <?php foreach ($cities as $city) { ?>
                        <option value="<?php echo $city['ID'] ?>"><?php echo $city['city_name'] ?></option> 
                   <?php  } ?> 
                  </select>
                  <span class="text-danger"><?php echo form_error('city_id'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">Price</label>
                  <input type="number" name="price" class="form-control" id="user_pass" placeholder="Price">
                  <span class="text-danger"><?php echo form_error('price'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">Currency</label>
                  <input type="text" name="currency" class="form-control" id="user_pass" placeholder="Currency">
                  <span class="text-danger"><?php echo form_error('currency'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="featured">Featured</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="featured" id="optionsRadios1" value="1">
                      Featured
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="featured" checked="checked" id="optionsRadios2" value="0">
                      Not Featured
                    </label>
                  </div> 
                  <span class="text-danger"><?php echo form_error('featured'); ?></span>                           
                </div>
                				
              <div class="box-footer">
                <button type="submit" id="add_user" class="btn btn-info pull-right">Add Listing</button>
              </div>			
              </div>
          
            </form>
          </div>
          <!-- /.box -->


          <!-- /.box -->

          <!-- /.box -->

        </div>
		</div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 