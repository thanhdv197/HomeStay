<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade modal-login modal-border-transparent" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            
            <button type="button" class="btn btn-close close" data-dismiss="modal" aria-label="Close">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            
            <div class="clear"></div>
            
            <!-- Begin # DIV Form -->
            <div id="modal-login-form-wrapper">
                
                <!-- Begin # Login Form -->
                <form id="login-form" name="_token">
                    @csrf
                    <div class="modal-body pb-10">
                
                        <h4 class="text-center mb-15">Sign-in</h4>
                    
                        <button class="btn btn-facebook btn-block">Sign-in with Facebook</button>
                        
                        <div class="modal-seperator mb-40">
                            <span>or</span>
                        </div>
                        
                        <div class="form-group mb-0"> 
                            <input id="login_username" name="login_username" class="form-control mb-5" placeholder="username" type="text"> 
                        </div>
                        <div class="form-group mb-0"> 
                            <input id="login_password" name="login_password" class="form-control mb-5" placeholder="password" type="password"> 
                        </div>
        
                        <div class="form-group mb-0 mt-10">
                            <div class="row gap-5">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="checkbox-block font-icon-checkbox"> 
                                        <input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
                                        <label class="" for="remember_me_checkbox">remember</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 text-right"> 
                                    <button id="login_lost_btn" type="button" class="btn btn-link">forgot pass?</button>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="modal-footer pt-25 pb-5">
                    
                        <div class="row gap-10">
                            <div class="col-xs-6 col-sm-6 mb-10">
                                <button type="submit" id="sign-in" class="btn btn-primary btn-block">Sign-in</button>
                            </div>
                            <div class="col-xs-6 col-sm-6 mb-10">
                                <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                        <div class="text-left">
                            No account? 
                            <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                        
                    </div>
                </form>
                <!-- End # Login Form -->
                            
                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body pb-10">
                        
                        <h4 class="text-center mb-15">Forgot password</h4>
                        
                        <div class="form-group mb-0"> 
                            <input id="lost_email" class="form-control mb-5" type="text" placeholder="Enter Your Email">
                        </div>
                        
                        <div class="text-center">
                            <button id="lost_login_btn" type="button" class="btn btn-link">Sign-in</button> or 
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer pt-25 pb-5">
                        
                        <div class="row gap-10">
                            <div class="col-xs-6 col-sm-6 mb-10">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                            <div class="col-xs-6 col-sm-6 mb-10">
                                <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                        
                    </div>
                    
                </form>
                <!-- End | Lost Password Form -->
                            
                <!-- Begin | Register Form -->
                <form id="register-form" enctype="multipart/form-data" style="display:none;">
                    @csrf
                    <div class="modal-body pb-20">

                        <h4 class="text-center mb-15">Register</h4>
                        
                        <button class="btn btn-facebook btn-block">Register with Facebook</button>
                        
                        <div class="modal-seperator mb-40">
                            <span>or</span>
                        </div>
                        
                        <div class="form-group mb-0"> 
                            <input id="register_username" class="form-control mb-5" type="text" placeholder="Username"> 
                        </div>
                        
                        <div class="form-group mb-0"> 
                            <input id="register_email" class="form-control mb-5" type="email" placeholder="Email">
                        </div>
                        
                        <div class="form-group mb-0"> 
                            <input id="register_password" class="form-control mb-5" type="password" placeholder="Password">
                        </div>
                        
                        <div class="form-group mb-0"> 
                            <input id="register_password_confirm" class="form-control mb-5" type="password" placeholder="Confirm Password">
                        </div>

                        <div class="form-group mb-0"> 
                            <input id="name" class="form-control mb-5" type="type" placeholder="Name">
                        </div>

                        <div class="form-group mb-0"> 
                            <input id="phonenumber" class="form-control mb-5" type="text" placeholder="Phone Number">
                        </div>

                        <div class="form-group mb-0"> 
                            <input id="address" class="form-control mb-5" type="text" placeholder="Address">
                        </div>

                        <div class="form-group mb-0"> 
                            <input id="birthday" class="form-control mb-5" type="date" placeholder="Birthday">
                        </div>

                        <div class="form-group mb-0"> 
                            <input id="avatar" name="avatar" class="form-control mb-5" type="file" accept="Image/*" placeholder="Upload Image">
                        </div>

                    </div>
                        
                    <div class="modal-footer pt-25 pb-5">
                    
                        <div class="row gap-10">
                            <div class="col-xs-6 col-sm-6 mb-10">
                                <button type="submit" id="register" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <div class="col-xs-6 col-sm-6 mb-10">
                                <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                        
                        <div class="text-left">
                                Already have account? <button id="register_login_btn" type="button" class="btn btn-link">Sign-in</button>
                        </div>
                        
                    </div>
                        
                </form>
                <!-- End | Register Form -->
                            
            </div>
            <!-- End # DIV Form -->
                            
        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->
