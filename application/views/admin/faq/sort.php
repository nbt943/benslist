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
        <li class="active">Sort</li>
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
              <h3 class="box-title">Sort Faq</h3>
            </div>
              <div class="box-body">
                <h3 class="box-title">Drag and Drop to Sort Faq</h3>
                <ul id="sortable">
                  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
                  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li> 
                </ul>
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
 

 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>

    <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
 #sortable li {
    margin: 0 0 6px;
    padding: 0 10px; 
    font-size: 24px; 
    background: #4492bf;
    color: #fff;
}
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>