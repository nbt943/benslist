<?php defined('BASEPATH') OR exit('No direct script access allowed');
// echo '<pre>';print_r($listings); die();
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
        <li><a href="<?php echo  base_url('admin/users'); ?>">Listing</a></li>
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
              <h3 class="box-title">Add Listing</h3>
            </div>
              <div class="box-body">
                <table id="listing-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>User Name</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Sub Category</th> 
                  <th>Price</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Created</th>  
                  <th>Status</th>  
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody> 

                  <?php if($listings){ ?>
              <?php $i=1; foreach ($listings as $key => $listing) {  ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $listing['user_id'] ?></td>
                  <td><?php echo $listing['title'] ?></td>
                  <td><?php echo $listing['cat_name'] ?></td>
                  <td><?php echo $listing['subcat_name'] ?></td> 
                  <td><?php echo $listing['price'] ?></td> 
                  <td><?php echo $listing['country_name'] ?></td>
                  <td><?php echo $listing['state_name'] ?></td>
                  <td><?php echo $listing['city_name'] ?></td>
                  <td><?php echo $listing['start_date'] ?></td>               
                  <td><?php if($listing['status'] == '1'){ echo "Approved"; }if($listing['status'] == '0'){ echo "New"; }if($listing['status'] == '2'){ echo "Disapproved"; } ?></td>
                  <td>
                    <a id="<?php echo $listing['ID']; ?>" class="btn approve-btn"><i class="fa fa-thumbs-up" title="Approved"></i></a> 
                    <a id="<?php echo $listing['ID']; ?>" class="btn disapprove-btn"><i class="fa fa-thumbs-down" title="Make it disapprove"></i></a>            
                  </td>
                  </tr>  

                  <?php } } ?>  
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
      window.location.href = "<?php echo base_url().'admin/listing/approve-listing/' ?>"+id+"";
    }
  });

  $('body').on('click','.disapprove-btn',function(){
    if(confirm("Do you really want to disapprove?"))
    {
      var id = $(this).attr('id');
      window.location.href = "<?php echo base_url().'admin/listing/disapprove-listing/' ?>"+id+"";
    }
  });

</script>