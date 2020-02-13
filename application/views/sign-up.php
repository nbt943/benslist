<?php 

require('header.php');

?>


<div class="login nav-margin">
    <div class="container">        
        <ul class="nav nav-pills form-heading-size">
            <li class="active"><a href="#signup-form" data-toggle="tab">Signup</a></li>
            <li ><a href="#login-form" data-toggle="tab">Login</a></li>  
        </ul> 

        <div class="tab-content">
            <div class="col-6 tab-pane fade in active form-size" id="signup-form">
                <form method="post" action="<?php echo base_url('user') ?>" id="signup-validate">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div> 
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div> 
                    </div>

                    <div class="row mt-2"> 
                        <div class="col-lg-12">
                            <select class="form-control" name="gender" >
                                <option value="">Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>                        
                        </div> 
                    </div>

                    <div class="row mt-2"> 
                        <div class="col-lg-12">
                            <select class="form-control" name="country">
                                <option value="">Select Country</option>
                                <option>India</option>
                                <option>USA</option>
                            </select>                        
                        </div> 
                    </div>

                    <div class="row mt-2"> 
                        <div class="col-lg-12">
                            <select class="form-control" name="state">
                                <option value="">Select State</option>
                                <option>New York</option>
                                <option>Antarctica</option>
                            </select>                        
                        </div> 
                    </div>

                    <div class="row mt-2"> 
                        <div class="col-lg-12">
                            <select class="form-control" name="city">
                                <option value="">Select City</option>
                                <option>Los Angeles</option>
                                <option>Chicago</option>
                            </select>                        
                        </div> 
                    </div>

                    <div class="row mt-2"> 
                        <div class="col-lg-12">
                            <select class="form-control" name="user_type">
                                <option value="">Select User Type</option>
                                <option>Buyer</option>
                                <option>Seller</option>
                            </select>                        
                        </div> 
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div> 
                    </div>

                    <div class="row mt-2 mb-5">
                        <div class="col-lg-12">
                            <a href=""><button class="btn btn-info form-control btn-color">REGISTER</button></a>
                        </div> 
                    </div>
                </form>
            </div>

<!-- LOGIN FORM -->

            <div class="col-6 tab-pane fade form-size" id="login-form">
                <form method="post" action="<?php echo base_url('login') ?>" id="login-validate" >
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="row mt-2 mb-5">
                        <div class="col-lg-12">
                            <a href=""><button class="btn btn-info form-control btn-color">LOGIN</button></a>
                        </div> 
                    </div>
                </form>
            </div>
        </div>   
    </div> 
</div>



<?php require('footer.php'); ?>


<script>
    /*
    $('body').ready(function(){
        $('#signup-validate').validate({
            rules : {
                first_name : 'required',
                last_name : 'required',
                email : {
                    required : true,
                    email : true
                },
                phone : {
                    required : true,
                    digits : true,
                    minlength: 10,
                    maxlength: 10
                },
                gender : {
                    required : true, 
                },
                country : {
                    required : true, 
                },
                state : {
                    required : true, 
                },
                city : {
                    required : true, 
                },
                password : {
                    required : true, 
                    minlength : 5
                },

            },
            messages: {
                first_name : {
                    required : "Please enter first name",
                },
                last_name : {
                    required : "Please enter last name",
                },
                email : {
                    required : "Please enter email address",
                }, 
                phone : {
                    required : "Please enter phone no", 
                    minlength: "Phone number field accept only 10 digits",
                    maxlength: "Phone number field accept only 10 digits",
                },
                gender : {
                    required : "Please select gender",
                },
                country : {
                    required : "Please select country",
                },
                state : {
                    required : "Please select state",
                },
                city : {
                    required : "Please select city",
                },
                password : {
                    required : "Please enter password",
                    minlength : "Password field accept minimum 5 letters"
                },
            },
 
         });

        $('#login-validate').validate({
            rules :
            {
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true
                }
            },
            messages :
            {
                email : {
                    required : "Please enter email address"
                },
                password : {
                    required : "Please enter password"
                },
            },
        });
    });


 */
    
</script>