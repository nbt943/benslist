<section class="login-user">
   <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>Log In</h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>Log In</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

<section class="login">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-4">
                  <div class="login-panel widget">
                     <div class="login-body">
                        <form>
                           <div class="form-group">
                              <label class="control-label">Email <span class="required">*</span></label>
                              <input type="text" placeholder="Email or Username" class="form-control">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Password <span class="required">*</span></label>
                              <input type="password" placeholder="Password" class="form-control">
                           </div>
                           <div class="form-group">
                              <button class="btn btn-block btn-lg btn-primary">Sign In</button>
                           </div>
                        </form>
                     </div>
                     <div class="login-with-sites">
                        <button class="btn-facebook login-icons btn-lg btn-block"> <i class="fa fa-facebook"></i> Login With Facebook</button>
                        <button class="btn-google login-icons btn-lg btn-block"> <i class="fa fa-google"></i> Login With Google</button>
                     </div>
                     <div class="login-footer">
                        <div class="checkbox checkbox-primary pull-left">
                           <input id="checkbox2" type="checkbox">
                           <label for="checkbox2">
                           Remember me
                           </label>
                        </div>
                        <p class="text-center pull-right"> <a href="forgot-password.html"> Forgot password? </a> </p>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <p class="text-center margin-bottom-none">Don't have an account? <a href="signup.html"><strong>Signup</strong></a></p>
               </div>
            </div>
         </div>
      </section>

</section>      


<style>
 
.login-user .breadcumb_area {
    background-image: url("../assets/images/breadcumb.jpg");
    position: relative;
    width: 100%;
    z-index: 0;
    border-bottom: 1px solid #ececec;
    padding: 40px 0px;
}  
.login-user .breadcumb_area::after {
    background-color: rgba(255, 255, 255, 0.85);
    content: "";
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: -1;
}

   
.login-user .breadcumb_section {
    position: relative;
    width: 100%;
}
.login-user .page_title> h3 {
     
    font-size: 44px;
    font-weight: 300;
    letter-spacing: 2px;
    margin: 0 0 13px;
    padding: 0;
    text-transform: uppercase;
}
.register-user .page_pagination ul> li> a, .page_pagination ul> li {
    color: #1f1f1f;
    display: inline-block;
    letter-spacing: 1px;
    text-transform: capitalize;
}
.register-user .widget {
    background: #ffffff none repeat scroll 0 0;
    border-radius: 12px;
    display: inline-block;
    border: 1px solid #dddddd;
    margin-bottom: 27px;
    padding: 30px;
    position: relative;
    width: 100%;
}
.register-user .form-group .control-label {
    color: #1f1f1f;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
}
.register-user .form-control{
   padding: 0;
    border: none;
    border-radius: 0;
    -webkit-appearance: none;
    -webkit-box-shadow: inset 0 -1px 0 #ddd;
    box-shadow: inset 0 -1px 0 #ddd;
    font-size: 16px;
}
.register-user .btn-block {
    display: block;
    width: 100%;
}
.register-user .btn-lg, .btn-group-lg>.btn {
    padding: 10px 16px;
    font-size: 17px;
    line-height: 1.3333333;
    border-radius: 3px;
}
.register-user .btn {
    border-radius: 50px;
}
.register-user .btn {
    text-transform: uppercase;
    border: none;
    -webkit-box-shadow: 1px 1px 4px rgba(0,0,0,0.4);
    box-shadow: 1px 1px 4px rgba(0,0,0,0.4);
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.register-user .btn-primary {
    color: #ffffff;
    background-color: #ee0880;
    border-color: transparent;
}
.register-user .btn-primary:hover{
   background-color: #fd33a3;
}
.register-user .checkbox label {
    display: inline-block;
    position: relative;
    line-height: 17px;
    padding-left: 13px;
}
.register-user .checkbox input[type="checkbox"] {
    opacity: 0;
}
.register-user .checkbox label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 17px;
    height: 17px;
    left: 0;
    margin-left: -11px;
    border: 1px solid #cccccc;
    border-radius: 50px;
    background-color: #fff;
    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
}
.register-user .checkbox-primary input[type="checkbox"]:checked+ label::after {
    color: #ee0880;
}
.register-user .checkbox input[type="checkbox"]:checked+ label::after {
    font-family: 'FontAwesome';
    content: "\f00c";
}
.register-user .checkbox label::after {
    display: inline-block;
    position: absolute;
    width: 16px;
    height: 16px;
    left: 0;
    top: -1px;
    margin-left: -11px;
    padding-left: 3px;
    padding-top: 1px;
    font-size: 11px;
    color: #555555;
}
.footer{
   border-top: 5px solid #ee0880;
}
.navbar{
   border-bottom: 5px solid#ee0880;
}








</style>