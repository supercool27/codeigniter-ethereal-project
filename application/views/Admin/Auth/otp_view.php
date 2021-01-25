
<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    <h5 class="text-center font-weight-light my-4">2. OTP Verification </h3></div>
                                    <div class="card-body">
                                    <br> 
                                        <span class="text-danger"> <?php echo $this->session->flashdata("error"); ?></span>
                                        <form method="post" action="<?php echo base_url('admin/otp_verify'); ?>">
                                            <div class="form-group">
                                                <h3> Enter OTP </h3>
                                                <input type="hidden" value="<?php echo $user_id;?>" name="user_id" />
                                                <input type="hidden" value="<?php echo $uuid->uuid;?>" name ="uuid"/>
                                                <input length="1" name="otp" value="<?php echo set_value('otp');?>"  class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Enter OTP"/>
                                                <small style="color:red;"> <?php echo form_error('otp') ?> </small>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                              <button type="submit" class="btn btn-primary" Value="login" >Enter OTP recieved by Email or Mobile</button>
                                            </div>
                                            <a href="<?php echo base_url('user/resend'); ?>" > Resend OTP </a> 
                                        </form>
                                      
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>




