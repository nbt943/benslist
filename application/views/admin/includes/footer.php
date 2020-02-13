

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Benslist</b> Admin System  
        </div>
        <strong>Copyright &copy; 2019-2020 <a href="<?php echo base_url(); ?>">Benslist</a>.</strong> All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>	
	<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
	
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
	<!-- <script src="<?php //echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.min.js"></script> -->

	<!-- EDITOR -->

	<script src="<?php echo base_url(); ?>assets/bower_components/ckeditor/ckeditor.js"></script>

	<script>
		$(function () { 
	    CKEDITOR.replace('question')
	    CKEDITOR.replace('answer')
	    
	    // $('.textarea').wysihtml5
	  });
	</script>
	
<script>
 $('document').ready(function() {
	 
	$('#user_login').keyup(function() {
		
		var user_login = $(this).val();
		
		$.ajax({
			
			type:'POST',
			url:'<?php echo base_url('admin/user/username-validate') ?>',
			data: {user_login:user_login},
			success: function(response){
				if(response == 'error') {
					
					$('#add_user').attr('disabled','disabled');
					$('#uerror').css('display','block');
				}else {
					
					$('#add_user').removeAttr('disabled');
					$('#uerror').css('display','none');
					
				}
				
											
			}
			
		});
	});
	
	$('#user_email').keyup(function() {
		
		var user_email = $(this).val();
		
		$.ajax({
			
			type:'POST',
			url:'<?php echo base_url('admin/user/email-validate') ?>',
			data: {user_email:user_email},
			success: function(response){
				if(response == 'error') {
					
					$('#add_user').attr('disabled','disabled');
					$('#eerror').css('display','block');
				}else {
					
					$('#add_user').removeAttr('disabled');
					$('#eerror').css('display','none');
					
				}
															
			}
			
		});
		
	});	

});	
	

</script>	

    <script type="text/javascript">

	
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })	
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
	
	<script>
	function deleteuser(id) {
		
		if(confirm("do you really want to delete this user?")) {
			
			window.location.href= "<?php echo base_url('admin/user/delete/') ?>"+id;
		}
	}

	$('body').on('change','.country_id',function(){

		$.ajax({

			type:"POST",
			url:"<?php echo base_url('admin/ajax/states-country') ?>",
			data:{country_id:$(this).val()},
			success: function(response){

				$('.state_id').html(response);

			}


		});


	});

	$('body').on('change','.state_id',function(){

		$.ajax({

			type:"POST",
			url:"<?php echo base_url('admin/ajax/cities-state') ?>",
			data:{state_id:$(this).val()},
			success: function(response){

				$('.city_id').html(response);

			}


		});


	});	


$("#paypal-data").validate({
  rules: {
    paypal_client: {
      required: true,
    },
    paypal_secret: {
      required: true,
    },
  },
  submitHandler: function(form){ 

    $.ajax({
      type:'POST',
      url: "<?php echo base_url('admin/payment/insert-paypal-key') ?>",
      data : {paypal_data:$('#paypal-data').serialize()},
      success: function(response)
      {
        $('.payment-msg').css('display','block');
        $('.close').click();

      }
    }); 
  }
});

$("#stripe-data").validate({
  rules: {
    stripe_client: {
      required: true,
    },
    stripe_secret: {
      required: true,
    },
  },
  submitHandler: function(form){ 

    $.ajax({
      type:'POST',
      url: "<?php echo base_url('admin/payment/insert-stripe-key') ?>",
      data : {stripe_data:$('#stripe-data').serialize()},
      success: function(response)
      {
        $('.payment-msg').css('display','block');
        $('.close').click();
      }
    }); 
  }
});
	</script>
  </body>
</html>