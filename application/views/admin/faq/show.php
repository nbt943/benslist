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
        <li><a href="<?php echo  base_url('admin/users'); ?>">Faq</a></li>
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
              <h3 class="box-title">Show Faq</h3>
            </div>
              <div class="box-body">
                <table id="category-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Questions</th>
                  <th>Answers</th> 
                  <th>Created</th>  
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody> 
                  <?php $i =1; foreach ($faqs as $faq) { if($faq['status']=='1'){ ?>  
                <tr>
                  <td><?php echo $i++ ?></td> 
                  <td><?php echo $faq['question'] ?></td>
                  <td><?php echo $faq['answer'] ?></td> 
                  <td><?php echo $faq['datetime'] ?></td>  
                  <td>
                    <a href="<?php echo base_url('admin/faq/edit-faq/'.$faq['ID']) ?>" class="btn"><i class="fa fa-edit"></i></a>          
                     <a id="<?php echo $faq['ID'] ?>" class="btn delete-faq"><i class="fa fa-trash"></i></a>            
                  </td>
                  </tr>
                  <?php } } ?>    
                </tbody>                 
              </table> 			
              </div> 
          </div>
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
    
    $('#category-table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'pageLength'  : 15,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });


  $('body').on('click','.delete-faq', function(){
    if(confirm("Do you really want to deactivate?"))
    {
      var id = $(this).attr('id');
      window.location.href = "<?php echo base_url('admin/faq/deleted/') ?>"+id+" ";
    }
  });
</script>