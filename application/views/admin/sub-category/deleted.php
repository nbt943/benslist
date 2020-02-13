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
        <li><a href="<?php echo  base_url('admin/users'); ?>">Category</a></li>
        <li class="active">Deleted</li>
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
              <h3 class="box-title">Deleted Sub Categories</h3>
            </div>
              <div class="box-body">
                <table id="category-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Parent Category</th>
                  <th>Sub Category</th>
                  <th>Description</th>
                  <th>Created</th> 
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody> 
                  <?php if($subcategories){ ?>
                  <?php $i = 1; foreach ($subcategories as $subcategory) { if($subcategory['status']=='0'){ ?>
                <tr>
                  <td><?php echo $i++ ?></td>                  
                  <td><?php echo $subcategory['cat_name'] ?></td>
                  <td><?php echo $subcategory['name'] ?></td>
                  <td><?php echo $subcategory['description'] ?></td>
                  <td><?php echo $subcategory['datetime'] ?></td>  
                  <td>
                    <a href="<?php echo base_url('admin/sub-category/edit/'.$subcategory['ID']) ?>" class="btn"><i class="fa fa-edit" title="Edit"></i></a>      
                    <a id="<?php echo $subcategory['ID'] ?>" class="btn active-sub-category"><i class="fa fa-fw fa-bullseye" title="Make it active"></i></a>                
                    <a id="<?php echo $subcategory['ID'] ?>" class="btn delete-sub-category"><i class="fa fa-trash"  title="Permanent Delete"></i></a>            
                    
                  </td>
                  </tr>
                  <?php } } } ?>    
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

  $('body').on('click','.active-sub-category', function(){
    if(confirm("Do you really want to active?"))
    {
      var id = $(this).attr('id');
      window.location.href = "<?php echo base_url('admin/sub-category/active-sub-category/') ?>"+id+" ";
    }
  });

  $('body').on('click','.delete-sub-category', function(){
    if(confirm("Do you really want to delete permanent?"))
    {
      var id = $(this).attr('id');
      window.location.href = "<?php echo base_url('admin/sub-category/delete-sub-category/') ?>"+id+" ";
    }
  });
</script>