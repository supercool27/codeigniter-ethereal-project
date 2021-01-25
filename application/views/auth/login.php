<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Login</h1>
      <?= form_open('login'); ?>
      <span class="text-danger"> <?php echo $this->session->flashdata("error"); ?></span>  
      <div class="form-group">
          <label for="">Email / Mobile Number </label>
          <input type="email" value="<?php echo set_value('email_id');?>"  class="form-control" placeholder="Please Enter your email" />
          <small style="color:red;"> <?php echo form_error('email_id') ?> </small>
        </div>
        <div class="form-group">
          <label for=""> Password </label>
          <input value="<?php echo set_value('password'); ?>" type="password" class="form-control" placeholder="password" />
          <small style="color:red;"> <?php echo form_error('password'); ?> </small>
        </div>
        <div class="form-group">
          <label for=""></label>
          <button type="submit" class="btn btn-primary" value="login">Login </button>
        <div>
      <?= form_close(); ?>
    </div>
  </div>
</div>