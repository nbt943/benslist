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
        <li><a href="<?php echo  base_url('admin/users'); ?>">Country</a></li>
        <li class="active">Show</li>
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
              <h3 class="box-title">Show Country</h3>
            </div>
              <div class="box-body">
                <table id="country-table" class="table table-bordered table-hover">
                <thead> 
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Phone Code</th> 
                  <th>Currency</th>
                  <th>Status</th>  
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody> 
                <?php $i =1; foreach ($countries as $country) { ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $country['country_name'] ?></td>
                  <td><?php echo $country['country_phone_code'] ?></td>
                  <td><?php echo $country['country_currency'] ?></td>
                  <td><?php echo $country['status'] ?></td> 
                  <td>
                    <a href="<?php echo base_url('admin/country/edit-country/'.$country['ID']) ?>" class="btn"><i class="fa fa-edit"></i></a>          
                     <a href="" class="btn"><i class="fa fa-trash"></i></a>            
                  </td>
                  </tr>
                <?php } ?>    
                </tbody>                 
              </table> 			
              </div> 
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
 


 <script>
  $(function () {
    
    $('#country-table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'pageLength'  : 15,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>