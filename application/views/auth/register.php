<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Register</h1>
      <div class="card-body">
      <?php echo validation_errors(); ?>

    <?= form_open('registeration'); ?>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">First Name</label>
                            <input value="<?php echo set_value('first_name'); ?>" name="first_name" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name">
                            <small style="color:red;"><?php echo form_error('first_name'); ?>  </small>
                        

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">Last Name</label>
                            <input value="<?php echo set_value('last_name'); ?>" name="last_name" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name">
                            <small style="color:red;">  <?php echo form_error('last_name'); ?></small>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input value="<?php echo set_value('email'); ?>" name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
                    <small style="color:red;"> <?php echo form_error('email');?> </small>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input name="password" value="<?php echo set_value('password'); ?>" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password">
                        </div>
                        <small style="color:red;"> <?php echo form_error('password'); ?> </small>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                            <input name="cnfpassword" value="<?php echo set_value('cnfpassword'); ?>" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password">
                        </div>
                        <small style="color:red"><?php echo form_error('cnfpassword') ?>  </small>
                    </div>
                </div>
                <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
            <?php form_close(); ?>
 </div>
    </div>
  </div>
</div>