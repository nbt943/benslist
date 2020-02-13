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
        <li><a href="#">Country</a></li>
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
              <h3 class="box-title">Add Country</h3>
            </div> 


            <form role="form" action="<?php echo base_url().'admin/country/insert'?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="user_pass">Name</label>
                  <input type="text" name="country_name" class="form-control" id="user_pass" placeholder="Name">
                  <span class="text-danger"><?php echo form_error('country_name'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">Phone Code</label>
                  <input type="text" name="country_phone_code" class="form-control" id="user_pass" placeholder="Phone Code">
                  <span class="text-danger"><?php echo form_error('country_phone_code'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">Currency</label>
                  <input type="text" name="country_currency" class="form-control" id="user_pass" placeholder="Currency">
                  <span class="text-danger"><?php echo form_error('country_currency'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">Currency Code</label>
                  <input type="text" name="country_currency_code" class="form-control" id="user_pass" placeholder="Currency Code">
                  <span class="text-danger"><?php echo form_error('country_currency_code'); ?></span>         
                </div>

                <div class="form-group">
                  <label for="user_pass">Currency Symbol</label>
                  <input type="text" name="country_currency_symbol" class="form-control" id="user_pass" placeholder="Currency Symbol">
                  <span class="text-danger"><?php echo form_error('country_currency_symbol'); ?></span>         
                </div> 

                <div class="form-group">
                  <label for="user_pass">Status</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="optionsRadios1" value="1">
                      Active
                    </label>
                  </div>

                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="optionsRadios2" value="0">
                      Inactive
                    </label>
                  </div> 
                </div> 

                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Add Country</button>
                </div>			
              </div>          
            </form>
          </div> 
        </div>  
		</div>        
  </div>
</section>
</div>
 