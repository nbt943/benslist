
<?php 
  // echo '<pre>';print_r($messages); die();
?>

<!--FOOTER  -->

     <footer>
        <section class="footer-Content">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">Tips and help</h3>
                        <ul class="menu">
                           <li><a href="#"><span>About Classified</span></a></li>
                           <li><a href="#"><span>Classified Blog</span></a></li>
                           <li><a href="#"><span>Help</span></a></li>
                           <li><a href="#"><span>Press Contact</span></a></li>
                           <li><a href="#"><span>Contact Us</span></a></li>
                        </ul>   
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">Quick Links</h3>
                        <ul class="menu">
                           <li><a href="#"><span>About Us</span></a></li>
                           <li><a href="#"><span>Contact Us</span></a></li>
                           <li><a href="#"><span>Careers</span></a></li>
                           <li><a href="#"><span>All Cities</span></a></li>
                           <li><a href="#"><span>Advertise With Us</span></a></li>
                           <li><a href="#"><span>Blog</span></a></li>
                        </ul>
                     </div>
                  </div>
                   <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">How to sell fast</h3>
                        <ul class="menu">
                           <li><a href="#"><span>How to sell fast</span></a></li>
                           <li><a href="#"><span>Membership</span></a></li>
                           <li><a href="#"><span>Banner Advertising</span></a></li>
                           <li><a href="#"><span>Promote your ad</span></a></li>
                           <li><a href="#"><span>Trade Delivers</span></a></li>
                           <li><a href="#"><span>Advertise With Us</span></a></li>
                           <li><a href="#"><span>FAQ</span></a></li>
                        </ul>
                     </div>
                  </div>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget">
                      <h3 class="block-title">Support</h3>
                      <p>We have over 15 year of experience</p>
                      <p>Our suppoer available to help you 24 hours a day, seven daye week</p>
                      <h3 class="block-title">Follow Us</h3>
                      <div class="bottom-social-icons social-icon">  
                        <a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank" class="dribble"><i class="fa fa-dribbble"></i></a>
                        <a href="#" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
                      </div>                        
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12"> 
                     <div class="site-info text-center">
                        <p class="font-weight-bold">&copy; Copyright 2000-2019 All rights reserved</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- End Footer -->
      
    <!-- Post Ad -->
      <a href="<?php echo base_url('create-post') ?>" data-toggle="tooltip" data-placement="left" title="Post Your Ad" class="btn btn-danger btn-lg post-free-add-btn"><i class="fa fa-pencil"></i></a>
      <!-- End Post Ad -->
    
    <!-- Back To Top -->
    <a href="#" id="back-to-top" data-toggle="tooltip" data-placement="left" title="Back To Top" class="btn btn-default btn-md"><i class="fa fa-chevron-up"></i></a>
      <!-- End Back To Top -->
    


  
    <!-- jQuery -->
      <script src="<?php echo base_url('site-assets/'); ?>js/jquery.js"></script>
      
    <!-- Custom js -->
      <script src="<?php echo base_url('site-assets/'); ?>js/custom.js"></script>
    
    <!-- Bootstrap JavaScript -->
      <script src="<?php echo base_url('site-assets/'); ?>js/bootstrap.min.js"></script>
    


    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>



    <!-- Owl Carousel -->
    <script src="<?php echo base_url('site-assets/'); ?>plugins/owl-carousel/owl.carousel.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-database.js"></script>


<!-- GOOGLE TRANSLATE -->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<!-- TIME PICKER -->
<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url('site-assets/time-picker/dist/wickedpicker.min.js'); ?>"></script>
  <script>

 $('.timepicker').wickedpicker();

</script>

<script type="text/javascript">

  function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
  //$('.goog-te-gadget').children().get(0).siblings().remove();


        
    $('body').on('change','.site-categories', function() {

       $('.get-sub-cat-div').remove();
      var cat_id = $(this).val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('ajax-ci/get-sub-cat'); ?>",
        data: {cat_id:cat_id},
        success: function(response) {
          if(response != "") {

          $('.get-cat-div').after('<div class="col-sm-6 get-sub-cat-div"> <div class="form-group"> <label class="control-label">Sub Category <span class="required">*</span></label> <select class="form-control border-form site-sub-categories" name="sub_cat_id"> <option selected="" value="">Select Sub Category</option>'+response+' </select> </div><span class="text-danger"><?php echo form_error('sub_cat_id'); ?></span></div>');

        }

        }

      });

    });
    $('body').on('change','.site-sub-categories', function() {

      $('.get-brand-div').remove();
      var sub_cat_id = $(this).val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('ajax-ci/get-brand-sub-cat'); ?>",
        data: {sub_cat_id:sub_cat_id},
        success: function(response) {

          if(response != "") {

          $('.get-sub-cat-div').after('<div class="col-sm-6 get-brand-div"> <div class="form-group"> <label class="control-label">Brand <span class="required">*</span></label> <select class="form-control border-form" name="brand_id"> <option selected="">Select Brand</option>'+response+' </select> </div><span class="text-danger"><?php echo form_error('brand_id'); ?></span></div>');

              }

          }
  

      });

    }); 

    $('body').on('change','.site-countries', function() {

      $('.get-state').remove();
      var country_id = $(this).val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('ajax-ci/get-state'); ?>",
        data: {country_id:country_id},
        success: function(response) {
          if(response != "") {

          $('.get-country-div').after('<div class="col-sm-6 get-state"> <div class="form-group"> <label class="control-label">State <span class="required">*</span></label> <select class="form-control border-form site-states" name="state_id"> <option selected="">All States</option>'+response+' </select> </div></div>');

        }

        }

      });

    });
    $('body').on('change','.site-states', function() {

      $('.get-city').remove();
      var state_id = $(this).val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('ajax-ci/get-cities'); ?>",
        data: {state_id:state_id},
        success: function(response) {
          if(response != "") {

          $('.get-state').after('<div class="col-sm-6 get-city"> <div class="form-group"> <label class="control-label">City <span class="required">*</span></label> <select class="form-control border-form site-city" name="city_id"> <option selected="">Select City</option>'+response+' </select> </div></div>');

        }

        }

      });

    });

      $('body').on('click','#fav', function() {

         var l_id = $(this).attr('data-tab');         
         $.ajax({
           type: "POST",
           url: "<?php echo base_url('ajax-ci/fav'); ?>",
           data:{l_id:l_id},
           context: this,          
           success: function(response) {

              $(this).attr('id','unfav');
               $(this).find(".fa-heart").css('color','red');


           }

         });

      });

      $('body').on('click','#unfav', function() {

         var l_id = $(this).attr('data-tab');

         var abc = $(this);
         $.ajax({
           type: "POST",
           url: "<?php echo base_url('ajax-ci/unfav'); ?>",
           data:{l_id:l_id},
           context: this,
           success: function(response) {
              $(this).attr('id','fav');

               $(this).find(".fa-heart").css('color','');           }

         });

      });

      $('body').on('click','#un-fav', function() {

         var l_id = $(this).attr('data-tab');

         var abc = $(this);
         $.ajax({
           type: "POST",
           url: "<?php echo base_url('ajax-ci/unfav'); ?>",
           data:{l_id:l_id},
           context: this,
           success: function(response) {  

           $(this).parent().parent().remove();
           }

         });

      });

  function readURL_1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#list-img_1')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);

                $('#list-img_1').css('display','block');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  function readURL_2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#list-img_2')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                $('#list-img_2').css('display','block');                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  function readURL_3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#list-img_3')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                $('#list-img_3').css('display','block');                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  function readURL_4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#list-img_4')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                $('#list-img_4').css('display','block');                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  function readURL_5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#list-img_5')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                $('#list-img_5').css('display','block');                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  function readURL_6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#list-img_6')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                $('#list-img_6').css('display','block');                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    // USER IMAGE RENDER

  function render_userimg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#user_img')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
                $('#user_img').css('display','block');                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

// DELETE ACCOUNT    
    $('body').on('click','.delete-account',function(){
      if(confirm('Do you really want to delete your account'))
      {
        if(confirm('Your all listings will be deleted permanently'))
        {
          window.location.href = '<?php echo base_url('setting/delete-user'); ?>';
        }
      }
   });

// DELETE LISTING
  
  $('body').on('click','.delete-listing',function(){

    if(confirm('Do you want to delete your listing'))
    {
      var id = $(this).attr('id'); 
      window.location.href = '<?php echo base_url('delete-user-site-listing/') ?>'+id; 
    
    }
  });

  $('body').on('click','.load-more',function(){
    var listing_count = $('#total-listings-count').val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ajax/load-more-listings'); ?>",
      data:{listing_count:listing_count},
      success: function(response) 
      {
        if(response == '')
        {
          $('.load-more').replaceWith('<p style="color:red;font-weight:bold">No more data</p>');
        }

        $('#total-listings-count').val(listing_count+8);

        $('.append-listing').append(response);
      }

    });
  });

   $('body').on('click','.cate-load-more',function(){
    var listing_count = $('#total-listings-count').val();

    var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1];

    
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ajax/cate-load-more-listings'); ?>",
      data:{listing_count:listing_count,cat_slug:last_part},
      success: function(response) 
      {
        if(response == '')
        {          
          $('.cate-load-more').replaceWith('<p style="color:red;font-weight:bold;margin:20px 0">No more data</p>');
        }

        $('#total-listings-count').val(listing_count+8);

        $('.single-categorie').append(response);
      }

    });
  });



// CHAT 


  var firebaseConfig = {
    apiKey: "AIzaSyAxYBxBp_S-kEz_BzHJMXkqEZEvGfgvZcY",
    authDomain: "mrathi-c69d4.firebaseapp.com",
    databaseURL: "https://mrathi-c69d4.firebaseio.com",
    projectId: "mrathi-c69d4",
    storageBucket: "mrathi-c69d4.appspot.com",
    messagingSenderId: "135108546252",
    appId: "1:135108546252:web:5a963735a5c4db1f783c69",
    measurementId: "G-M4JDTW0QXJ"
  };

  firebase.initializeApp(firebaseConfig);
  

  $(document).ready(function(){


    document.getElementById("messages").innerHTML = "";
    var chat_node  = $('.get-chat-active').find('.chat-node').val();   
    firebase.database().ref("messages/"+chat_node).on("child_added", function (snapshot) {

      console.log('1');
    if(snapshot.val().img != ''){
      var fileName = snapshot.val().img;
      var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1); 
      if(fileExtension== 'txt'){
        var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/txt.png" height="50px" width="100px"></a>';
      }else if(fileExtension== 'pdf'){
       
         var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/pdf.jpg" height="50px" width="100px"></a>';   

      }else if(fileExtension== 'docx'){
      
        var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/docx.png" height="50px" width="100px"></a>';
   

      }else if(fileExtension== 'xls' || fileExtension== 'csv'){
      
        var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/excel.xls" height="50px" width="100px"></a>';
   

      }else{
      var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'" height="50px" width="100px"></a>';
      }

    }else{
      var imgs= '';
    }      
    var sender = '<?php echo $this->session->userdata('userId'); ?>';
   if('me-send-'+sender == snapshot.val().sender) {
        var html = '<div class="outgoing_msg"> <div class="sent_msg">'+imgs+' <p>'+snapshot.val().message+'</p><span class="time_date"> '+snapshot.val().current_time+' | '+snapshot.val().current_date+'</span> </div></div>';
      }else{
        var html = '<div class="incoming_msg"> <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="image"> </div><div class="received_msg"> <div class="received_withd_msg">'+imgs+' <p>'+snapshot.val().message+'</p><span class="time_date">'+snapshot.val().current_time+' | '+snapshot.val().current_date+'</span></div></div></div>';
      }


        document.getElementById("messages").innerHTML += html;
        $("#messages").stop().animate({ scrollTop: $("#messages")[0].scrollHeight}, 1000);

  // remove message node
  //document.getElementById("message-" + snapshot.key).innerHTML = "This message has been removed";
    });
  });


  $(document).on('keypress','#message', function(e) 
  {
    var code = (e.keyCode ? e.keyCode : e.which);
      switch (code)
      {     
      case 13: 
        if($('.write_msg').val().trim().length == 0)
        {
          alert('Please type a message');              
        }
        else
        {
          sendMessage();
        }
      }        
  });



 $('body').on('click','.msg_send_btn',function(){
    if($('.write_msg').val().trim().length == 0)
    {
      alert('Please type a message');
    }
    else{
      sendMessage();
    }
 })




function sendMessage() {


  var chat_node  = $('.get-chat-active').find('.chat-node').val(); 
  var d = new Date();
  var current_date = d.toLocaleDateString();
  var current_time = d.toLocaleTimeString();
  if( document.getElementById("chat-docx").files.length >0 ){
    var img  =  function () {
      var formData = new FormData();
      formData.append("file", document.getElementById('chat-docx').files[0]);
      var temp = null;
      $.ajax({
        async: false,
        url: '<?php echo base_url('ajax/chat/img'); ?>',
        type: 'POST',
        data: formData,
        success: function (data) {
          temp = data;
        },
        cache: false,
        contentType: false,
        processData: false
      });
    return temp;
    }();

  }else{
    
    img= '';
  }   

  var sender = '<?php echo $this->session->userdata('userId') ?>';
  var message = document.getElementById("message").value;

  firebase.database().ref("messages/"+chat_node).push().set({
    "sender": 'me-send-'+sender,
    "message": message,
    "img":img,
    "receiver":'rec',
    "status":'unread',
    'current_time':current_time,
    'current_date':current_date
  });

  $('#message').val('');
  return false;
  
}


  var unread = 0;
    $('.chat-node').each(function(){
    var ch_node = $(this).val();
    var thiss = $(this);

    firebase.database().ref("messages/"+ch_node).orderByChild("status").equalTo("unread").on("value", function(ysnapshot) {
        unread = ysnapshot.numChildren();

        // if(unread !=0){

      $('.'+ch_node).prev().children().children('.nbt-count').text(unread);
      var mover  = $('.'+ch_node).parent().html();

      if($('.'+ch_node).parent().hasClass('get-chat-active')){
  
        $('.'+ch_node).parent().parent().prepend('<a href="javascript:void(0)" onclick="get_messages_fire(this)" class="get-chat-active">'+mover+'</a>');

      }else{

        $('.'+ch_node).parent().parent().prepend('<a href="javascript:void(0)" onclick="get_messages_fire(this)">'+mover+'</a>');

      }   

         // $('#'+ch_node).parent().remove();
          $('.'+ch_node).parent().eq(1).remove();

//        }

//      $('#'+ch_node).parent().remove();

    });
      //alert(unread);        

  });

  
  function get_messages_fire(thiss) {
    
    if(!$(thiss).hasClass('get-chat-active')) {

  $('.chat-node').each(function(){

    var ch_node = $(this).val();

      firebase.database().ref("messages/"+ch_node).off("child_added");      


  });


    // firebase.database().ref("messages/"+chat_node).set({

    //   "status":'read'
    // }); 



    document.getElementById("messages").innerHTML = "";

    $('a').removeClass('get-chat-active');
    $(thiss).addClass('get-chat-active');
    var chat_node  = $(thiss).find('.chat-node').val();   


    firebase.database().ref("messages/"+chat_node).on("child_added", function (snapshot) {
 


    var sender = '<?php echo $this->session->userdata('userId'); ?>';
     if(snapshot.val().img != ''){
      var fileName = snapshot.val().img;
      var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1); 
      if(fileExtension== 'txt'){
        var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/txt.png" height="50px" width="100px"></a>';
   

      }else if(fileExtension== 'pdf'){
       
         var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/pdf.jpg" height="50px" width="100px"></a>';   

      }else if(fileExtension== 'docx'){
      
        var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/docx.png" height="50px" width="100px"></a>';
   

      }else if(fileExtension== 'xls' || fileExtension== 'csv'){
      
        var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/icons/excel.xls" height="50px" width="100px"></a>';
   

      }else{
      var imgs = '<a download href="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'"><img src="<?= base_url() ?>/assets/uploads/chat-img/'+snapshot.val().img+'" height="50px" width="100px"></a>';
      }


     }else{
      var imgs= '';
    }      

    if('me-send-'+sender == snapshot.val().sender) {

      console.log('1');
         var html ='';
         html = '<div class="outgoing_msg">'+imgs+' <div class="sent_msg"> <p>'+snapshot.val().message+'</p><span class="time_date"> '+snapshot.val().current_time+' | '+snapshot.val().current_date+'</span> </div></div>';
      }else{
        var html = '<div class="incoming_msg"> <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="image"> </div><div class="received_msg"> <div class="received_withd_msg">'+imgs+' <p>'+snapshot.val().message+'</p><span class="time_date">'+snapshot.val().current_time+' | '+snapshot.val().current_date+'</span></div></div></div>';
      }


        document.getElementById("messages").innerHTML += html;
   firebase.database().ref("messages/"+chat_node).child(snapshot.key).update({
          "status":"read"
    });
        $("#messages").stop().animate({ scrollTop: $("#messages")[0].scrollHeight}, 1000);

       // remove message node
  //document.getElementById("message-" + snapshot.key).innerHTML = "This message has been removed";
});

    }

  }

// RENDER CHAT IMAGE

// function chating_img_render(input) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 $('#chat-img_1')
//                     .attr('src', e.target.result)
//                     .width(50)
//                     .height(50);
//                 $('#chat-img_1').css('display','block');                    
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }

  // $('#file-upload').change(function() {
  // var i = $(this).prev('label').clone();
  // var file = $('#file-upload')[0].files[0].name;
  // $(this).prev('label').text(file);
  // });

//   $("#chat-img_1").change(function(){
//   $("#file-name").text(this.files[0].name);
// });
 

 function uploadFile(target) { 
  document.getElementById("chat-img_1").innerHTML = target.files[0].name;
  $('.chat-img-name').css('display','block');
}

 













$('body').on('click','#search-btn',function(){
  $('.append-listing').append('<div class="search-loader-parent"><i class="fa search-loader fa-spinner fa-spin"></i></div>');
  $.ajax({
    type: 'POST',
    url: '<?php echo base_url('search-filter') ?>',
    data: {data: $('#search-form').serialize()},
    success: function(response){
      $('.append-listing').html('');
      var listings = JSON.parse(response);
      var favourite = listings['favourites'];
      var listing = listings['listing'];
      $.each(listing, function(i){
        var fav_list_id = '';
        $.each(favourite, function(index){
          if(favourite[index].listing_id == listing[i].ID)
          {
            fav_list_id = favourite[index].listing_id;
          }
        });
        var listing_id = listing[i].ID*5359;
        listing_id = 'BENS'+listing_id+'LIST';
        $('.search-loader-parent').remove();
        $('.append-listing').append('<div class="item col-md-3 item-margin"> <div class="item-ads-grid icon-blue"><a href="<?php echo base_url('single/') ?>'+listing_id+'"> <div class="item-img-grid"> <img alt="" src="./assets/images/site-listings/271-161-'+listing[i].image_1+'" class="img-responsive img-center"> <div class="item-title"> <h3>$'+listing[i].price+'</h3> </div> </div> </a> <div class="item-meta"> <ul> <li class="item-date"><i class="fa fa-clock-o"></i>'+listing[i].title+'</li> <li class="item-cat"><i class="fa fa-glass"></i> <a href="<?php echo base_url('category-list/'); ?>'+listing[i].cat_slug+'">'+listing[i].cat_name+'</a> , <a href="<?php echo base_url('category-list/'); ?>'+listing[i].cat_slug+'"> '+listing[i].subcat_name+'</a></li> <li class="item-location"><a href="<?php echo base_url('category-list/'); ?>'+listing[i].cat_slug+'"><i class="fa fa-map-marker"></i> '+listing[i].country_name+'</a></li>'+
          (fav_list_id != ''? '<li class="item-type"><a href="javascript:void(0)" id="unfav" data-tab="'+listing[i].ID+'"><i style="color: red" class="fa fa-heart"></i> Favourite </a></li> </div> </div>': '<li class="item-type"><a href="javascript:void(0)" id="fav" data-tab="'+listing[i].ID+'"><i class="fa fa-heart"></i> Favourite </a></li></div> </div>')
          +'');
      })
    }
  })
})

// setInterval(function(){ 
//   $(".inbox_chat").load(location.href + " .inbox_chat");
//  }, 3000);

$('#payment-form').validate({
    rules: {
        firstname: {
            required : true,
        },
        lastname: {
            required : true,
        },
        email: {
            required : true,
        },
    },
});



  // RATING 

  $(".btnrating").on('click',(function(e) {
  var previous_value = $("#selected_rating").val();
  
  var selected_value = $(this).attr("data-attr");
  $("#selected_rating").val(selected_value);

  $(".selected-rating").empty();
  $(".selected-rating").html(selected_value);
  
  for (i = 1; i <= selected_value; ++i) {
  $("#rating-star-"+i).toggleClass('btn-warning');
  $("#rating-star-"+i).toggleClass('btn-default');
  }
  
  for (ix = 1; ix <= previous_value; ++ix) {
  $("#rating-star-"+ix).toggleClass('btn-warning');
  $("#rating-star-"+ix).toggleClass('btn-default');
  }
  
  }));

  function rating_img_render(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#rating-img_1')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
            $('#rating-img_1').css('display','block');                    
        };

        reader.readAsDataURL(input.files[0]);
    }
  }



$('#rating_val').validate({
  ignore: [],
  rules: {
      star_rates: {
          required : true,
      },
  },
  messages: {
      star_rates: "You must have to give rating", 
      }
});

  
$('body').on('click','#giveaway-search-btn',function(){ 
  $.ajax({
    type: 'POST',
    url: '<?php echo base_url('giveaway-search-filter')  ?>',
    data:{data: $('#giveaway-search-form').serialize()},
    success:function(response) {

      $('.append-giveaway-listing').html('');
      var giveaway_listings = JSON.parse(response);
      var giveaway_listing = giveaway_listings['giveaway_listing'];
      $.each(giveaway_listing,function(i){

      var giveaway_listing_id = giveaway_listing[i].ID*7523;      
      var giveaway_listing_id = 'BENS'+giveaway_listing_id+'LIST';

        $('.append-giveaway-listing').append('<div class="item col-md-3 item-margin"> <div class="item-ads-grid icon-blue"><a href="<?php echo base_url('giveaway/single/') ?>'+giveaway_listing_id+'"> <div class="item-img-grid"> <img alt="" src="<?php echo base_url('site-assets/images/giveaway-listings/271-161-') ?>'+giveaway_listing[i].image_1+'" class="img-responsive img-center"> <div class="item-title"> </div> </div> </a> <div class="item-meta"> <ul> <li class="item-date"><i class="fa fa-clock-o"></i>'+giveaway_listing[i].title+'</li> <li class="item-cat"><i class="fa fa-glass"></i> <a>'+(giveaway_listing[i].giveaway_cate=='f'?'Food':'Non Food')+'</a></li> <li class="item-location"><i class="fa fa-map-marker"></i>'+giveaway_listing[i].country_name+'</li> </ul> </div> </div> </div>');
      })        
    }

  })
});






 
      </script>
   </body>
</html>
<style>
  .search-loader{
    font-size: 40px;
  }
  .search-loader-parent{
    text-align: center;
  }
</style>