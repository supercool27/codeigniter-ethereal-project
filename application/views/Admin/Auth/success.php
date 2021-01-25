<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    <h5 class="text-center font-weight-light my-4">Success </h3></div>
                                    <div class="card-body">
                                    <br> 
                                    <span class="text-danger"> <?php echo $this->session->flashdata("error"); ?></span>
                                        <form">
                                            <div class="form-group">
                                                <div class="alert alert-success" role="alert">
                                                    You are Successfully registred with us. Thank you.
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a href="<?php echo base_url('login'); ?>"> Click to login page </a>
                                            </div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assests/js/scripts.js"></script>

<?php 
        echo "user registered sucessfully";
?>
    <a href="<?php echo base_url('login'); ?>"> Click to login page </a>
    