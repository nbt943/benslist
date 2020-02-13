<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

// echo '<pre>' ;print_r($admin_payment_details);die;

$paypal_data = json_decode($admin_payment_details[0]['payment_keys']);
$stripe_data = json_decode($admin_payment_details[1]['payment_keys']);
// print_r($stripe_data);die;
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
        <li><a href="#">Payment Settings</a></li>
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
              <p class="payment-msg alert alert-success" style="display: none">New Paypal keys are added</p> 
              <h3 class="box-title">Payment Settings</h3>
            </div> 
<!-- Payment Settings -->
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Paypal Payment</label>
                  <div class="alert alert-info alert-dismissible payment-width"> 
                    <h4><i class="icon fa fa-info"></i> Paypal!</h4>
                    “The Way to Send and Receive Money Online"
                  </div>    
                </div>

                <label class="switch">
                  <input type="checkbox" <?php if($admin_payment_details[0]['status']=='true'){?> checked <?php } ?>class="toggle-click" value="<?php echo $admin_payment_details[0]['ID'] ?>">
                  <span class="slider round"></span>
                <input type="text" name="id" >
                </label>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#paypal-modal">Manage</button>
                  <p class="enable-1"></p>

                <div class="modal fade" id="paypal-modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Paypal Payment</h4>
                      </div>

                      <form id="paypal-data">
                        <input type="hidden" name="id" class="paypal-id" value="<?php echo $admin_payment_details[0]['ID'] ?>">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="name">Paypal Client ID</label>
                            <input type="text" name="paypal_client" class="form-control paypal-client"  placeholder="Paypal Client ID" value="<?php if(isset($paypal_data->paypal_client)){ echo $paypal_data->paypal_client; } ?>">
                                    
                          </div>

                          <div class="form-group">
                            <label for="name">Paypal Secret ID</label>
                            <input type="text" name="paypal_secret" class="form-control paypal-secret" placeholder="Paypal Secret ID" value="<?php if(isset($paypal_data->paypal_secret)){ echo $paypal_data->paypal_secret; }  ?>">
                                    
                          </div>     
                        </div> 
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" id="add_user" class="btn btn-info pull-right">Submit</button>
                        </div>
                      </form>
                    </div> 
                  </div> 
                </div>
              </div> 

<!-- Stripe Payment -->
               <div class="box-body">
                <div class="form-group">
                  <label for="name">Stripe Payment</label>
                  <div class="alert alert-info alert-dismissible payment-width"> 
                    <h4><i class="icon fa fa-info"></i> Stripe!</h4>
                    "The new standard in online payments"
                  </div>    
                </div>

                <label class="switch">
                  <input type="checkbox" <?php if($admin_payment_details[1]['status']=='true'){?> checked <?php } ?>class="toggle-click" value="<?php echo $admin_payment_details[1]['ID'] ?>">
                  <span class="slider round"></span>
                <input type="text" name="id" >
                </label>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#strip-modal">Manage</button>
                <p class="enable-2"></p>

                <div class="modal fade" id="strip-modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Stripe Payment</h4>
                      </div>

                      <form id="stripe-data">
                         <input type="hidden" name="id" value="<?php echo $admin_payment_details[1]['ID'] ?>">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="name">Stripe Client ID</label>
                            <input type="text" name="stripe_client" class="form-control" id="name" placeholder="Stripe Client ID" value="<?php if(isset($stripe_data->stripe_client)){ echo $stripe_data->stripe_client; } ?>">
                            <span class="text-danger"><?php echo form_error('stripe_client'); ?></span>         
                          </div>

                          <div class="form-group">
                            <label for="name">Paypal Secret ID</label>
                            <input type="text" name="stripe_secret" class="form-control" id="name" placeholder="Stripe Secret ID" value="<?php if(isset($stripe_data->stripe_secret)){ echo $stripe_data->stripe_secret; }  ?>">
                            <span class="text-danger"><?php echo form_error('stripe_secret'); ?></span>         
                          </div>     
                        </div> 
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" id="add_user" class="btn btn-info pull-right">Submit</button>
                        </div>
                      </form>
                    </div> 
                  </div> 
                </div> 
     
              </div>    
          </div> 
        </div>  
  </div>        
  </div>
</section>
 
</div>
 
 <style>
   
 .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
 </style>

 <script>
   
   $('body').on('click','.toggle-click',function(){
      var status = $(this).is(':checked');
      var id= $(this).val(); 

      if(status==true){
         $('.enable-'+id).html('Enable');
      }
      else{
        $('.enable-'+id).html('Disable');
      }
      $.ajax({
        type:"POST",
        url: "<?php echo base_url('admin/payment/insert-payment-status'); ?>",
        data:{status:status,id:id},
        success: function(response)
        {
            
        }
      });
    });




 </script>
