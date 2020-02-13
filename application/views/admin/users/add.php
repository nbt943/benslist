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
        <li><a href="<?php echo  base_url('admin/users'); ?>">Users</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>

    <!-- Main content -->
	
    <section class="content">
  <?php
                if($this->session->flashdata('message'))
                {
                    echo '
                    <div class="alert alert-success col-sm-3">
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
    ?>         
      <div class="row">
	  
        <!-- left column -->
        <div class="col-md-12">	
		
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->

	
            <form role="form" action="<?php echo base_url().'admin/user/insert/'?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="user_login">Username</label>
                  <input type="text" name="user_login" class="form-control" id="user_login" autocomplete="off">
				  <span class="text-danger"><?php echo form_error('user_login'); ?></span>
				  <span class="text-danger" style="display:none" id="uerror" >This username is already exsist</span>
				  
                </div>
                <div class="form-group">
                  <label for="user_email">Email</label>
                  <input type="email" name="user_email" class="form-control" id="user_email" placeholder="Enter email">
				  <span class="text-danger" ><?php echo form_error('user_email'); ?></span>	
				  <span class="text-danger" style="display:none" id="eerror" >This email is already exsist</span>
				  
                </div>	
                <div class="form-group">
                  <label for="user_pass">Password</label>
                  <input type="password" name="user_pass" class="form-control" id="user_pass">
				  <span class="text-danger"><?php echo form_error('user_pass'); ?></span>				  
                </div>	
                <div class="form-group">
				  <label for="user_role">Role</label>
				  <select  name="user_role" class="form-control">
                    <option value="">Select Role</option>				  
                    <option value="1">Administrator</option>
                    <option value="2">Sub Administrator</option>
                  </select>
				  <span class="text-danger"><?php echo form_error('user_role'); ?></span>				  				  
				</div>										
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="first_name">				  
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="last_name">
                </div>
                <div class="form-group">
                  <label for="user_phone">Mobile</label>
                  <input type="text" name="user_phone" class="form-control" id="user_phone">
                </div>				
              <div class="box-footer">
                <button type="submit" id="add_user" class="btn btn-info pull-right">Add User</button>
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
 