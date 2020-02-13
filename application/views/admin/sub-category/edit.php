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
        <li class="active">Edit Category?></li>
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
              <h3 class="box-title">Edit Category</h3>
            </div> 


            <form role="form" action="<?php echo base_url().'admin/sub-category/update/'.$single_subcategory['ID'] ?>" method="post" enctype= multipart/form-data>
              <div class="box-body">
                <div class="form-group">
                  <label for="parent_category_id">Parent Category</label>
                  <select  name="cat_id" class="form-control">
                    <option value="">Select Parent Category</option>
                    <?php foreach ($categories as $category) { ?> 
                    <option value="<?php echo $category['ID'] ?>" <?php if($single_subcategory['cat_id'] == $category['ID']){ echo "selected"; } ?> ><?php echo $category['name'] ?></option> 
                    <?php } ?> 
                  </select>
                  <span class="text-danger"><?php echo form_error('parent_category_id'); ?></span>                   
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" value="<?php echo $single_subcategory['name'] ?>" class="form-control" id="name" placeholder="Name">
                  <span class="text-danger"><?php echo form_error('name'); ?></span>         
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="3" placeholder="Description"><?php echo $single_subcategory['description'] ?></textarea>
                   <span class="text-danger"><?php echo form_error('description'); ?></span>  
                </div>

                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Update Category</button>
                </div>			
              </div>          
            </form>
          </div> 
        </div>  
		</div>        
  </div>
</section>
</div>
 