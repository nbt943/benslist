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
        <li><a href="#">Category-feature</a></li>
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
              <h3 class="box-title">Add Category Feature</h3>
            </div> 


            <form role="form" action="<?php echo base_url().'admin/category/feature-insert/'?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="categary_id">Category</label>
                  <select  name="categary_id" class="form-control">
                    <option value="">Select Category</option>  
                  </select>
                  <span class="text-danger"><?php echo form_error('categary_id'); ?></span>                   
                </div>

                <div class="form-group">
                  <label for="feature_name">Feature Name</label>
                  <input type="text" name="feature_name" class="form-control" id="feature_name" placeholder="Name">
                  <span class="text-danger"><?php echo form_error('user_pass'); ?></span>         
                </div> 

                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" class="form-control" id="user_pass">
                  <span class="text-danger"><?php echo form_error('image'); ?></span>         
                </div> 

                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Add Category Feature</button>
                </div>			
              </div>          
            </form>
          </div> 
        </div>  
		</div>        
  </div>
</section>
</div>
 