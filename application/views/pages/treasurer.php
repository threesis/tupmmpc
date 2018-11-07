<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png"/>
    <title>TUPMMPC | Treasurer</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap4/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Muli:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Niramit|PT+Sans|Source+Sans+Pro|Open+Sans|Droid+Serif|Kaushan+Script|Rambla" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/treasurer.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

  </head>

  <body id="page-top">

    <!-- Navigation Bar -->
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark navbar-color">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png">TUPMMPC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">MESSAGES</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ACCOUNT
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#editModulesModal" href="#">Manage Modules</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>users/signout">Sign Out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Set/Edit Position Module -->
    <div class="modal fade" id="editModulesModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit user modules</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="list-group module-position-list">
              <a href="#" class="list-group-item list-group-item-action active">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Apply</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>


    <div class="wrapper">
      <div class="container">
        <?php if($this->session->flashdata('user_signedin')): ?>
          <?php echo '<p class="alert alert-success alert-dismissable fade show text-center" role="alert">
                      <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>'.$this->session->flashdata('user_signedin').
                      $this->session->userdata('username').'!'.'</p>'; 
          ?>
        <?php endif; ?>
        <div class="row">
        <!-- Profile -->
          <div class="col-sm-12 col-md-4 col-lg-3 offset-md mb-3">
            <div class="card">
              <div class="card-header bg-success p-5">
                <div class="card-title">
                  <img src="assets/img/team/may.jpg" class="img-thumbnail rounded-circle mx-auto d-block my-3">
                </div>
              </div>
              <div class="card-text">
                <h6 class="admin-name text-center"><?php echo $this->session->userdata('name') ?></h6>
                <h6 class="position-text text-center text-muted"><?php echo $this->session->userdata('position') ?></h6>
                <p class="text-center m-3"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></p>
              </div>
              <div class="list-group profile-menu my-3" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="home-list" data-toggle="list" href="#admin-home" role="tab"aria-controls="home"><i class="fas fa-home mr-2"></i> Home</a>
                <a class="list-group-item list-group-item-action" id="loans-list" data-toggle="list" href="#admin-loans" role="tab" aria-controls="settings"><i class="fas fa-credit-card mr-2"></i> Loans</a>
                <a class="list-group-item list-group-item-action" id="sharecapital-list" data-toggle="list" href="#sharecapital-table" role="tab"aria-controls="settings"><i class="fas fa-money-bill mr-2"></i> My Share Capital</a>
                <a class="list-group-item list-group-item-action" id="loan-app" data-toggle="list" href="#loan-app-form" role="tab" aria-controls="messages"><i class="fas fa-edit mr-2"></i> Apply for Loan</a>
                <a class="list-group-item list-group-item-action" id="co-makers" data-toggle="list" href="#co-makers-table" role="tab" aria-controls="messages"><i class="fas fa-users mr-2"></i> Co-Makers</a>
                <a class="list-group-item list-group-item-action" id="transactions-list" data-toggle="list" href="#transactions-tbl" role="tab" aria-controls="messages"><i class="fas fa-paperclip mr-2"></i> Transactions</a>
                <a class="list-group-item list-group-item-action" id=loanreports-list" data-toggle="list" href="#loan-reports" role="tab" aria-controls="messages"><i class="fas fa-folder-open mr-2"></i> Loan Reports</a>
              </div>
            </div>
          </div>

          <!-- Navigation Body -->
          <div class="col-sm-12 col-md-8 col-lg-9 mb-3">
            <div class="card">
              <div class="tab-content">
                <!-- Home Part -->
                <div class="tab-pane fade show active" id="admin-home" role="tabpanel" aria-labelledby="home-tab">
                  <h5 class="card-header">Home</h5>
                    <div class="card-body">
                     Individual Ledger
                    </div>
                </div>
                <!-- Loans Part -->
                <div class="tab-pane fade show" id="admin-loans" role="tabpanel" aria-labelledby="home-tab">
                  <h4 class="card-header">Loans</h4>
                    <div class="card-body card-body-mh">
                      <!-- 1st row -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="card">
                            <h5 class="card-header">Student Loan</h5>
                            <div class="card-body">
                              <p class="card-text"><small>Interest Rate: 0.75%</small></p>
                              <p class="card-text"><small>Maximum Amount: 150,000.00</small></p>
                              <p class="card-text"><small>Maximum Loan Term: 48 months</small></p>
                            </div>
                            <div class="card-footer">
                             
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card">
                            <h5 class="card-header">Appliance Loan</h5>
                            <div class="card-body">
                              <p class="card-text"><small>Interest Rate: 0.75%</small></p>
                              <p class="card-text"><small>Maximum Amount: 150,000.00</small></p>
                              <p class="card-text"><small>Maximum Loan Term: 48 months</small></p>
                            </div>
                            <div class="card-footer">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card">
                            <h5 class="card-header">Regular Loan</h5>
                            <div class="card-body">
                              <p class="card-text"><small>Interest Rate: 0.75%</small></p>
                              <p class="card-text"><small>Maximum Amount: 150,000.00</small></p>
                              <p class="card-text"><small>Maximum Loan Term: 48 months</small></p>
                            </div>
                            <div class="card-footer">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- 2nd row -->
                      <div class="row my-4">
                        <div class="col-md-4">
                          <div class="card">
                            <h5 class="card-header">Multi-Purpose Loan</h5>
                            <div class="card-body">
                              <p class="card-text"><small>Interest Rate: 0.75%</small></p>
                              <p class="card-text"><small>Maximum Amount: 150,000.00</small></p>
                              <p class="card-text"><small>Maximum Loan Term: 48 months</small></p>
                            </div>
                            <div class="card-footer">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card">
                            <h5 class="card-header">Balik-Eskwela Loan</h5>
                            <div class="card-body">
                              <p class="card-text"><small>Interest Rate: 0.75%</small></p>
                              <p class="card-text"><small>Maximum Amount: 150,000.00</small></p>
                              <p class="card-text"><small>Maximum Loan Term: 48 months</small></p>
                            </div>
                            <div class="card-footer">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card">
                            <h5 class="card-header">Calamity Loan</h5>
                            <div class="card-body">
                              <p class="card-text"><small>Interest Rate: 0.75%</small></p>
                              <p class="card-text"><small>Maximum Amount: 150,000.00</small></p>
                              <p class="card-text"><small>Maximum Loan Term: 48 months</small></p>
                            </div>
                            <div class="card-footer">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    
                        </div>
                      </div>
                       <!-- Reports Part -->
                  <div class="tab-pane fade show" id="sharecapital-table" role="tabpanel" aria-labelledby="home-tab">
                    <h5 class="card-header">My Share Capital</h5>
                      <div class="card-body">
                              Content..
                        </div>
                   </div>
                  <!-- Members Part -->
                    <div class="tab-pane fade show" id="loan-app-form" role="tabpanel" aria-labelledby="home-tab">
                       <h5 class="card-header">Loan Application Form</h5>
                        <div class="card-body">
                              Content..
                        </div>
                    </div>
                    <!-- Reports Part -->
                  <div class="tab-pane fade show" id="co-makers-table" role="tabpanel" aria-labelledby="home-tab">
                    <h5 class="card-header">Co-makers</h5>
                      <div class="card-body">
                              Content..
                        </div>
                   </div>
                   <!-- Members Part -->
                    <div class="tab-pane fade show" id="transactions-tbl" role="tabpanel" aria-labelledby="home-tab">
                       <h5 class="card-header">Transactions</h5>
                        <div class="card-body">
                              Content..
                        </div>
                    </div>
                  <!-- Members Part -->
                    <div class="tab-pane fade show" id="loan-reports" role="tabpanel" aria-labelledby="home-tab">
                       <h5 class="card-header">Loan Reports</h5>
                        <div class="card-body">
                              Content..
                        </div>
                    </div>
                    </div>
                    <div class="card-footer"></div>

                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/jqBootstrapValidation.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url() ?>assets/js/cofficer.js"></script>
    <script defer src="<?php echo base_url() ?>assets/vendor/fontawesome-free/js/all.js" rel="stylesheet"></script>
    

  </body>

</html>
