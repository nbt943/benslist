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
        <li><a href="#">City</a></li>
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
              <h3 class="box-title">Add City</h3>
            </div> 


            <form role="form" action="<?php echo base_url().'admin/city/insert/'?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="city_name">Name</label>
                  <input type="text" name="city_name" class="form-control" id="name" placeholder="Name">
                  <span class="text-danger"><?php echo form_error('city_name'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="state_id">State</label>
                  <select  name="state_id" class="form-control">
                    <option value="">Select State</option>  
                    <?php foreach ($states as $state) { ?> 
                    <option value="<?php echo $state['ID'] ?>"><?php echo $state['state_name'] ?></option>
                    <?php } ?>
                  </select>
                  </select>
                  <span class="text-danger"><?php echo form_error('state_id'); ?></span>                   
                </div> 

                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Add City</button>
                </div>      
              </div>          
            </form>
          </div> 
        </div>  
    </div>        
  </div>
</section>
</div>
 