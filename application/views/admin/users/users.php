
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<h3 class="box-title">All Users</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>				  
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone</th>
                  <th>Action</th>
		
				  </tr>
				<?php $i = 1;  foreach($users as $user) { 
								 if($user->role != '1') {?>

                <tr>
                  <td> <?php  echo $i++ ?></td>
                  <td><?php echo $user->user_login  ?></td>
                  <td><?php echo $user->user_email;  ?></td>
                  <td><?php if($user->role == '2') { echo "Sub Admin"; }else { echo "Admin"; } ?></td>				  
                  <td><?php echo $user->firstname;  ?></td>
                  <td><?php echo $user->lastname; ?></td>
				  <td><?php echo $user->phone;  ?></td>
				  <td>
					<a href="<?php echo base_url() ?>admin/user/edit/<?php echo $user->id ?>"> <i class="fa fa-pencil"></i></a>|||
					<a href="javascript:void(0);" onclick="deleteuser(<?php echo $user->id;?>);"> <i class="fa fa-trash"></i></a>					
				  </td>				  

				  </tr>
			 <?php }}?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
