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
        <li><a href="#">Faq</a></li>
        <li class="active">Edit</li>
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
              <h3 class="box-title">Edit Faq</h3> 
            </div> 


            <form role="form" action="<?php echo base_url().'admin/faq/update-faq/'.$single_faq['ID'] ?>" method="post">
              <div class="box-body">
                <div class="box-body pad">
                  <form>
                    <input type="hidden" name="id" value="<?php echo $single_faq['ID'] ?>">
                    <textarea id="editor1" name="question" rows="10" cols="80">
                      <?php echo $single_faq['question'] ?>
                    </textarea>

                    <h3 class="box-title">Answers </h3>
                    <textarea id="editor2" name="answer" rows="10" cols="80">
                       <?php echo $single_faq['answer'] ?>
                    </textarea>
                  </form>
                </div> 

                <div class="box-footer">
                  <button type="submit" id="add_user" class="btn btn-info pull-right">Update Faq</button>
                </div>			
              </div>          
            </form>
          </div> 
        </div>  
		</div>        
  </div>
</section>
</div>
