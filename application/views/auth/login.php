<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-md-6 mx-md-auto">

      <?php if (validation_errors()): ?>
        <div class="alert bg-danger text-white">
          <h5>Errors ;( </h5>
          <p><?= validation_errors(); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( isset($errors) && (bool) count($errors) ): ?>
        <div class="alert bg-danger text-white">
          <h5>Errors ;( </h5>
          <ul>
            <?php foreach ($errors as $error): ?>
              <li><?= $error; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <h1>Login</h1>
      <?= form_open('login'); ?>
        <div class="form-group">
          <label>Email </label>
          <input type="email" class="form-control" placeholder="Provide your Email Address" name="email" value="<?= set_value('email');?>" required />
        </div>
        <div class="form-group">
          <label> Password </label>
          <input type="password" class="form-control" placeholder="Provide your Account Password" name="password" required />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">
            Login
          </button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
