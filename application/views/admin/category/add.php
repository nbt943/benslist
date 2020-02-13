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
        <li><a href="#">Category</a></li>
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
              <h3 class="box-title">Add Category</h3>
            </div> 


            <form role="form" action="<?php echo base_url().'admin/category/insert/'?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  <span class="text-danger"><?php echo form_error('name'); ?></span>         
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                </div>

                <div class="form-group">
                  <label for="user_pass">Image</label>
                  <input type="file" name="image" class="form-control" id="user_pass">
                  <span class="text-danger"><?php echo form_error('image'); ?></span>         
                </div>


                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Add Category</button>
                </div>			
              </div>          
            </form>
          </div> 
        </div>  
		</div>        
  </div>
</section>
</div>
 