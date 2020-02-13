

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
              <h3 class="box-title">Update User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
	
            <form role="form" action="<?php echo base_url().'admin/user/update/'.$single_user[0]->id ?>" method="post">
              <div class="box-body">

									
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" value="<?php echo $single_user[0]->firstname ?>" name="first_name" class="form-control" id="first_name">				  
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" value="<?php echo $single_user[0]->lastname ?>" name="last_name" class="form-control" id="last_name">
                </div>
                <div class="form-group">
                  <label for="user_phone">Mobile</label>
                  <input type="text" value="<?php echo $single_user[0]->phone ?>" name="user_phone" class="form-control" id="user_phone">
                </div>	
                <div class="form-group">
                  <label for="user_pass">New Password</label>
                  <input type="password" value = "" name="user_pass" class="form-control" id="user_pass">
				  <span class="text-danger"><?php echo form_error('user_pass'); ?></span>				  
                </div>	
                <div class="form-group">
				  <label for="user_role">Role</label>
				  <select  name="user_role" class="form-control">
                    				  
                    <option <?php if($single_user[0]->role == 'admin') { echo "selected"; } ?> value="1">Administrator</option>
                    <option <?php if($single_user[0]->role == '2') { echo "selected"; } ?> value="2">Sub Admin</option>
                  </select>
				  <span class="text-danger"><?php echo form_error('user_role'); ?></span>				  				  
				</div>					
              <div class="box-footer">
                <button type="submit" id="add_user" class="btn btn-info pull-right">Update User</button>
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
