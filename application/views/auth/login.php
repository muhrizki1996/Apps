<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title['title']; ?> - Log In</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/');?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('auth') ?>">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        <label for="password">Password</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>