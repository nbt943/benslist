<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// echo '<pre>' ;print_r($payments);die;
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
        <li><a href="<?php echo  base_url('admin/users'); ?>">Payment</a></li>
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
              <h3 class="box-title">Show Stripe Payment Details</h3>
            </div>
              <div class="box-body">
                <table id="cms-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                   <th>Id</th>
                  <th>User</th> 
                  <th>Amount</th>
                  <th>Payment Id</th>
                  <th>Currency Code</th>
                  <th>PaymentDate</th> 
                </tr>
                </thead>
                <tbody> 
                  <?php $i = 1; foreach ($payments as $payment) { ?>                   
                <tr>
                  <td><?php echo $i++; ?></td> 
                  <td><?php echo $payment['user_nicename'] ?></td>
                  <td><?php echo $payment['amount'] ?></td>
                  <td><?php echo $payment['payment_id'] ?></td>
                  <td><?php echo $payment['currency_code'] ?></td>
                  <td><?php echo $payment['payment_date'] ?></td>
                  <!-- <td><?php //if($cms['status'] == '1'){ echo "Active";} else { echo "Inactive"; }?></td>  -->
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
    
    $('#cms-table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'pageLength'  : 15,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>