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
        <li><a href="#">State</a></li>
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
              <h3 class="box-title">Edit State</h3>
            </div> 


            <form role="form" action="<?php echo base_url().'admin/state/update-state/'.$single_state['ID']?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="states">Name</label>
                  <input type="text" name="state_name" value="<?php echo $single_state['state_name'] ?>" class="form-control" id="user_pass" placeholder="Name">
                  <span class="text-danger"><?php echo form_error('state_name'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="country">Country</label>
                  <select  name="country_id" class="form-control">
                    <option class="">Select Country</option>
                    <?php foreach ($countries as $country) { ?> 
                    <option value="<?php echo $country['ID'] ?>" <?php if($country['ID'] == $single_state['country_id']){ echo "selected"; } ?> ><?php echo $country['country_name'] ?></option>  
                    <?php } ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('country_id'); ?></span>                   
                </div> 

                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Update State</button>
                </div>      
              </div>          
            </form>
          </div> 
        </div>  
    </div>        
  </div>
</section>
</div>
 