<?php echo form_open('signin'); ?>

<head>
  <title>TUPMMPC | Sign In</title>
</head>
<!-- Custom styles -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/signinBtn.css" />
<link type="text/css" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" />
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Sign In</h5>
          <?php if($this->session->flashdata('signin_failed')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('signin_failed').'</p>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('not_signedin')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_signedin').'</p>'; ?>
          <?php endif; ?>
          <form class="form-signin">
            <div class="form-label-group">
              <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
              <label for="inputUsername">Username</label>
            </div>

            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>

            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label small" for="customCheck1">Remember password</label>
            </div>
            <button type="submit" class="btn btn-lg btn-success btn-block text-uppercase mt-4">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo form_close(); ?>
