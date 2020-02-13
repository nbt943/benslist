<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 


?>
 
<div class="content-wrapper"> 
  <section class="content-header">
    <h1><small></small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Payment</a></li>
        <li class="active">Add</li>
      </ol>
  </section>

    <!-- Main content -->
  
<section class="content">
  <div class="row">
    <div class="col-md-6"> 
      <div class="col-md-12">
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
              <h3 class="box-title">Add Payment</h3>
          </div>  
          <form role="form" action="<?php echo base_url().'admin/payment/insert-payment'?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="name">Offer name</label>
                <input type="text" name="offer_name" class="form-control" id="name" placeholder="Offer name">
                <span class="text-danger"><?php echo form_error('offer_name'); ?></span>         
              </div>

              <div class="form-group">
                <label for="name">Price</label>
                <input type="text" name="price" class="form-control" id="name" placeholder="Price">
                <span class="text-danger"><?php echo form_error('price'); ?></span>         
              </div>

              <div class="form-group">
                <label for="name">Number of ads</label>
                <input type="text" name="ads_no" class="form-control" id="name" placeholder="Number of ads">
                <span class="text-danger"><?php echo form_error('ads_no'); ?></span>         
              </div>  

              <div class="form-group">
                <label for="name">Months</label>
                <input type="text" name="month" class="form-control" id="name" placeholder="Number of ads">
                <span class="text-danger"><?php echo form_error('month'); ?></span>         
              </div> 
              <div class="box-footer">
                <button type="submit" id="add_user" class="btn btn-info pull-right">Add Payment details</button>
              </div>      
            </div>          
          </form>
        </div> 
      </div>  
    </div> 
    <div class="col-md-6"> 
    
          <div class="col-md-12">
          <!-- general form elements -->
            <div class="box box-info">
              <div class="box-header with-border">
            <?php
                if($this->session->flashdata('delete'))
                {
                    echo '
                    <div class="alert alert-success">
                        '.$this->session->flashdata("delete").'
                    </div>
                    ';
                }
            ?>          
            <h3 class="box-title">Show Payment Details</h3>
              </div>
            <div class="box-body">
              <table id="payment-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Offer name</th> 
                  <th>Price</th>
                  <th>No. of Ads</th>  
                  <th>Month</th>  
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody> 
                  <?php $i = 1; foreach ($payment_details as $payment_detail) { ?>                   
                <tr>
                  <td><?php echo $i++; ?></td> 
                  <td><?php echo $payment_detail['offer_name'] ?></td>
                  <td><?php echo $payment_detail['price'] ?></td>
                  <td><?php echo $payment_detail['ads_no'] ?></td>
                  <td><?php echo $payment_detail['month'] ?></td>  
                  <td>           
                     <a id="<?php echo $payment_detail['ID'] ?>" class="btn delete-payment"><i class="fa fa-trash"></i></a>            
                  </td>
                  </tr>    
                <?php } ?>
                </tbody>                 
              </table>      
            </div> 
          </div> 
        </div>       
  </div>
</section>


</div>

<script>
    $(function () {
    
    $('#payment-table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'pageLength'  : 15,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });


   $('body').on('click','.delete-payment',function(){ 
    if(confirm('Do you really want to delete this payment details?'))
    {
      var id = $(this).attr('id');
      window.location.href = "<?php echo  base_url('admin/payment/delete-payment/') ?>"+id; 
    }

   });
 
</script>
 