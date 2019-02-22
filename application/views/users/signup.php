<?php echo form_open('signup'); ?>
<head>
  <title>TUPMMPC | Sign Up</title>
</head>
<!-- Custom styles -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/signupBtn.css" />
<link type="text/css" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" />
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-8 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Sign Up</h5>
            <form class="form-signin">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-label-group">
                    <input type="text" id="inputUserame" class="form-control" name="username" placeholder="Username" required autofocus>
                    <label for="inputUserame">Username</label>
                  </div>
                </div>

                <div class="col-md-7">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required>
                    <label for="inputEmail">Email address</label>
                  </div>
                </div>

                <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputConfirmPassword" class="form-control" name="password2" data-match="inputPassword" data-match-error="Whoops, password don't match" placeholder="Password" required>
                  <label for="inputConfirmPassword">Confirm password</label>
                </div>
                </div>

                <div class="col-md-7">
                  <div class="form-label-group">
                    <input type="name" id="inputName" class="form-control" name="name" placeholder="Full Name" required>
                    <label for="inputName">Full Name</label>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-label-group">
                    <input type="date" id="inputBday" class="form-control" name="birthday" placeholder="Birthday" required>
                    <label for="inputBday">Birthday</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="address" id="inputAddress" class="form-control" name="address" placeholder="Complete Address" required>
                    <label for="inputAddress">Address</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="text" id="inputZip" class="form-control" name="zipcode" placeholder="Zip Code" required>
                    <label for="inputZip">Zip Code</label>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="form-label-group">
                    <select type="dropdown" id="inputCollege" class="form-control" name="college" placeholder="College" id="exampleFormControlSelect1">
                      <option>College of Science</option>
                      <option>College of Engineering</option>
                      <option>College of Liberal Arts</option>
                      <option>College of Industrial Education</option>
                      <option>College of Industrial Technology</option>
                      <label for="inputCollege">College</label>
                    </select>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-lg btn-success btn-block text-uppercase rounded mt-2">Register</button>
              <p class="text-center mt-3 small mb-0">Already registered?<a id="signinLink" class="ml-2" href="<?php echo base_url() ?>signin">Click here to sign in</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php echo form_close(); ?>