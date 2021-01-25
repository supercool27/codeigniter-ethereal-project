<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "Application Name" ?></title>
  <?php $this->load->view('auth/_shared/css'); ?>
</head>
<body>
  <?= $content; ?>
  <?php $this->load->view('auth/_shared/js'); ?>
</body>
</html>