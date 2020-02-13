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
        <li><a href="#">CMS</a></li>
        <li class="active">Edit</li>
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
              <h3 class="box-title">Edit CMS</h3>
            </div> 


            <form role="form" action="<?php echo base_url().'admin/cms/update-cms/'.$single_cms['ID']?>" method="post">
              <div class="box-body">
                <input type="text" name="id" value="<?php echo $single_cms['ID'] ?>" >
                <div class="form-group">
                  <label for="name">Page Title</label>
                  <input type="text" name="page_title" value="<?php echo $single_cms['page_title'] ?>" class="form-control" id="name" placeholder="Page Title">
                  <span class="text-danger"><?php echo form_error('page_title'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="name">Page Slug</label>
                  <input type="text" name="page_slug" value="<?php echo $single_cms['page_slug'] ?>" class="form-control" id="name" placeholder="Page Slug">
                  <span class="text-danger"><?php echo form_error('page_slug'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="name">Page URL</label>
                  <input type="text" name="page_url" class="form-control" value="<?php echo $single_cms['page_url'] ?>" id="name" placeholder="Page URL">
                  <span class="text-danger"><?php echo form_error('page_url'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="name">Page Content</label>
                  <input type="text" name="page_content" class="form-control" value="<?php echo $single_cms['page_content'] ?>" id="name" placeholder="Page Content">
                  <span class="text-danger"><?php echo form_error('page_content'); ?></span>         
                </div>
 

                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Update CMS</button>
                </div>      
              </div>          
            </form>
          </div> 
        </div>  
    </div>        
  </div>
</section>
</div>
 