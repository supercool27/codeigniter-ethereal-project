<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <br> 
                                    <span class="text-danger"> <?php echo $this->session->flashdata("error"); ?></span>
                                        <form method="post" action="<?php echo base_url('admin/login'); ?>">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="email_id" value="<?php echo set_value('email_id');?>"  class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                                <small style="color:red;"> <?php echo form_error('email_id') ?> </small>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input value="<?php echo set_value('password'); ?>" class="form-control py-4" name='password' id="inputPassword" type="password" placeholder="Enter password" />
                                                <small style="color:red;"> <?php echo form_error('password'); ?> </small>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="forgotpassword">Forgot Password?</a>
                                              <button type="submit" class="btn btn-primary" Value="login" >Login </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register">Need an account? Sign up!</a></div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assests/js/scripts.js"></script>