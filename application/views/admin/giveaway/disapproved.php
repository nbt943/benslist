<?php defined('BASEPATH') OR exit('No direct script access allowed');
// echo '<pre>';print_r($giveway_disapprove_listings); die();
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
        <li><a href="<?php echo  base_url('admin/users'); ?>">Give Away Listing</a></li>
        <li class="active">Dispproved</li>
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
              <h3 class="box-title">Disapproved Listing</h3>
            </div>
              <div class="box-body">
                <table id="listing-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>User Name</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Pickup Time</th>
                  <th>Phone Number</th>
                  <th>Location</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Created</th>  
                  <th>Status</th>  
                  <th>Action</th>  
                </tr>
                </thead>
                <tbody> 

                  
              <?php $i=1; foreach ($giveway_disapprove_listings as $key => $giveway_disapprove_listing) {  ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $giveway_disapprove_listing['user_nicename'] ?></td>
                  <td><?php echo $giveway_disapprove_listing['title'] ?></td>
                  <td><?php if($giveway_disapprove_listing['giveaway_cate'] == 'f'){echo 'Food';}else{echo 'Non Food';}  ?></td>
                  <td><?php echo $giveway_disapprove_listing['pick_time'] ?></td>                  
                  <td><?php echo $giveway_disapprove_listing['phone_number'] ?></td> 
                  <td><?php echo $giveway_disapprove_listing['location'] ?></td> 
                  <td><?php echo $giveway_disapprove_listing['country_name'] ?></td>
                  <td><?php echo $giveway_disapprove_listing['state_name'] ?></td>
                  <td><?php echo $giveway_disapprove_listing['city_name'] ?></td>
                  <td><?php echo $giveway_disapprove_listing['date'] ?></td>               
                  <td><?php if($giveway_disapprove_listing['status'] == '2'){ echo "Disapproved"; } ?></td>
                  <td> 
                    <a id="<?php echo $giveway_disapprove_listing['ID'] ?>APP" class="btn approve-btn"><i class="fa fa-thumbs-up" title="Approved" ></i></a>   
                     <a id="<?php echo $giveway_disapprove_listing['ID'] ?>" class="btn delete-btn"><i class="fa fa-trash" title="Permanent Delete" ></i></a>         
                  </td>
                  </tr>  

                  <?php }  ?>  
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
    
    $('#listing-table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'pageLength'  : 15,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $('body').on('click','.approve-btn',function(){
    if(confirm("Do you really want to approve?"))
    {
      var id = $(this).attr('id');
      window.location.href = "<?php echo base_url().'admin/giveaway/approve-giveaway-listing/' ?>"+id+"";
    }
  });

  $('body').on('click','.delete-btn',function(){
    if(confirm("Do you really want to delete permanently?"))
    {
      var id = $(this).attr('id');
      window.location.href = "<?php echo base_url().'admin/listing/delete-listing/' ?>"+id+"";
    }
  });

</script>