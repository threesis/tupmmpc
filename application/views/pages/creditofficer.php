<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png"/>
    <title>TUPMMPC | Credit Officer</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap4/css/bootstrap.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Muli:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Niramit|PT+Sans|Source+Sans+Pro|Open+Sans|Droid+Serif|Kaushan+Script|Rambla" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/cofficer.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation Bar -->
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark navbar-color">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>credit_officer"><img src="<?php echo base_url(); ?>assets/img/logo.png">TUPMMPC</a>
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
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>users/signout">Sign Out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
                  <img src="assets/img/team/2.jpg" class="img-thumbnail rounded-circle mx-auto d-block my-3">
                </div>
              </div>
              <div class="card-text">
                <h6 class="admin-name text-center"><?php echo $this->session->userdata('name') ?></h6>
                <h6 class="position-text text-center text-muted"><?php echo $this->session->userdata('position') ?></h6>
                <p class="text-center m-3"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></p>
              </div>
              <div class="list-group profile-menu my-3" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="home-list" data-toggle="list" href="#cofficer-home" role="tab" aria-controls="home"><i class="fas fa-home mr-2"></i> Home</a>
                <a class="list-group-item list-group-item-action" id="loans-list" data-toggle="list" href="#cofficer-loans" role="tab" aria-controls="settings"><i class="fas fa-credit-card mr-2"></i> Loans</a>
                <a class="list-group-item list-group-item-action" id="members-list" data-toggle="list" href="#cofficer-members" role="tab" aria-controls="messages"><i class="fas fa-users mr-2"></i> Members</a>
                <a class="list-group-item list-group-item-action" id="members-list" data-toggle="list" href="#cofficer-transactions" role="tab" aria-controls="messages"><i class="fas fa-paperclip mr-2"></i> View Transactions</a>
                <a class="list-group-item list-group-item-action" id="members-list" data-toggle="list" href="#cofficer-records" role="tab" aria-controls="messages"><i class="fas fa-folder-open mr-2"></i> View Records</a>
              </div>
            </div>
          </div>

          <!-- Home -->
          <div class="col-sm-12 col-md-8 col-lg-9 mb-3">
            <div class="card">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="cofficer-home" role="tabpanel" aria-labelledby="home-tab">
                  <h5 class="card-header">Home</h5>
                  <div class="card-body card-body-mh">
                    <div class="row p-4 align-middle">
                      <div class="col-md-7">
                        <div class="card">
                          <div class="card-header">
                            <span class="card-title h6">Member's Loan Track</span>
                          </div>
                          <div class="card-body">
                            <div class="row pl-3 pr-5 pt-5 pb-5">
                              <canvas id="line-chart"></canvas>
                            </div>
                          </div>
                        </div> 
                      </div>
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header">
                            <span class="card-title h6">Total Loans Approved</span>
                          </div>
                          <div class="card-body mb-1">
                            <div class="text-center">
                              <canvas id="pie-chart"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">TEST</button>
                  </div>
                </div>

          <!-- Loan Application Lists -->
          <div class="tab-pane fade show" id="cofficer-loans" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item ml-3">
                  <h5 class="card-title text-muted">Loan Applications</h5>
                </li>
                <li class="nav-item ml-auto">
                  <a class="nav-link active" data-toggle="tab" href="#pending_loans">Pending<span class="badge badge-danger badge-pill ml-2">20</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#approved_loans">Approved<span class="badge badge-danger badge-pill ml-2">88</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#disapproved_loans">Disapproved<span class="badge badge-danger badge-pill ml-2">15</span></a>
                </li>
              </ul>
            </div>
              <div class="tab-content card-body card-body-mh">
                <div class="tab-pane list-group active" id="pending_loans">
                  <div id="returnPendingLoan"></div>

                  <!-- PENDING Loan Application Form Check Modal -->
                  <div class="modal fade" id="openLoanAppForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title"><img src="assets/img/team/2.jpg" class="rounded-circle"><strong class="ml-3">NAME<span class="ml-3 mr-3">-</span>LOAN TYPE</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                        </div>
                        <div class="modal-footer">
                          <div class="mx-auto">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check mr-1"></i> Approve</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#disapprovedLoanNote"><i class="fas fa-times mr-1"></i> Disapprove</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane list-group" id="approved_loans">
                  <div id="returnApprovedLoans"></div>

                  <!-- APPROVED Loan Application Form Check Modal -->
                  <div class="modal fade" id="openLoanAppForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title"><img src="assets/img/team/2.jpg" class="rounded-circle"><strong class="ml-3">NAME<span class="ml-3 mr-3">-</span>LOAN TYPE</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                        </div>
                        <div class="modal-footer">
                          <div class="mx-auto">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check mr-1"></i> Approve</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#disapprovedLoanNote"><i class="fas fa-times mr-1"></i> Disapprove</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane list-group" id="disapproved_loans">
                  <div id="returnDisapprovedLoans"></div>
                
                  <!-- DISAPPROVED Loan Application Form Check Modal -->
                  <div class="modal fade" id="openLoanAppForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title"><img src="assets/img/team/2.jpg" class="rounded-circle"><strong class="ml-3">NAME<span class="ml-3 mr-3">-</span>LOAN TYPE</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                        </div>
                        <div class="modal-footer">
                          <div class="mx-auto">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check mr-1"></i> Approve</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#disapprovedLoanNote"><i class="fas fa-times mr-1"></i> Disapprove</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- get pending loans ajax -->
                  <script type="text/javascript">
                    $(function() {
                      getPendingLoans();
                      getApprovedLoans();
                      getDisapprovedLoans();

                      function getPendingLoans() {
                        $.ajax({
                          type:     'ajax',
                          url:      '<?php echo base_url() ?>creditofficers/getPendingLoans',
                          async:    false,
                          dataType: 'json',
                          success: function(data) {
                            var row = '';
                            var i;
                            for(i = 0; i < data.length; i++) {
                              row += '<a href="#" data-toggle="modal" data-target="#openLoanAppForm" class="list-group-item list-group-item-action"><img src="assets/img/team/2.jpg" class="rounded-circle mr-3"><small>' + data[i].name + '</small><span class="badge badge-dark p-2 w-15 float-right">' + data[i].loan_type + '</span><small><span class="badge badge-primary p-2 mr-2 w-15 float-right">' + data[i].created_date + '</span></small></a>';
                            }
                            $('#returnPendingLoan').html(row);
                          },
                          error: function() {
                            alert('ERROR!');
                          }
                        });
                      }

                      function getApprovedLoans() {
                        $.ajax({
                          type:     'ajax',
                          url:      '<?php echo base_url() ?>creditofficers/getApprovedLoans',
                          async:    false,
                          dataType: 'json',
                          success: function(data) {
                            var row = '';
                            var i;
                            for(i = 0; i < data.length; i++) {
                              row += '<a href="#" data-toggle="modal" data-target="#openLoanAppForm" class="list-group-item list-group-item-action"><img src="assets/img/team/2.jpg" class="rounded-circle mr-3"><small>' + data[i].name + '</small><span class="badge badge-dark p-2 w-15 float-right">' + data[i].loan_type + '</span><small><span class="badge badge-primary p-2 mr-2 w-15 float-right">' + data[i].created_date + '</span></small></a>';
                            }
                            $('#returnApprovedLoans').html(row);
                          },
                          error: function() {
                            alert('ERROR!');
                          }
                        });
                      }

                      function getDisapprovedLoans() {
                        $.ajax({
                          type:     'ajax',
                          url:      '<?php echo base_url() ?>creditofficers/getDisapprovedLoans',
                          async:    false,
                          dataType: 'json',
                          success: function(data) {
                            var row = '';
                            var i;
                            for(i = 0; i < data.length; i++) {
                              row += '<a href="#" data-toggle="modal" data-target="#openLoanAppForm" class="list-group-item list-group-item-action"><img src="assets/img/team/2.jpg" class="rounded-circle mr-3"><small>' + data[i].name + '</small><span class="badge badge-dark p-2 w-15 float-right">' + data[i].loan_type + '</span><small><span class="badge badge-primary p-2 mr-2 w-15 float-right">' + data[i].created_date + '</span></small></a>';
                            }
                            $('#returnDisapprovedLoans').html(row);
                          },
                          error: function() {
                            alert('ERROR!');
                          }
                        });
                      }

                    });
                  </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    <!-- Disapprove Modal -->
    <div class="modal fade" id="disapprovedLoanNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><strong>Disapproved - Juan Miguel C. Ladisla</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Requirements -->
            <label for="disapprovedRequirements">Check for the incomplete requirements:</label>
            <div id="disapprovedRequirements">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="payslipCheck">
                <label class="form-check-label" for="payslipCheck">Payslip</label>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="vidCheck">
                <label class="form-check-label" for="vidCheck">Valid ID</label>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="porCheck">
                <label class="form-check-label" for="porCheck">Proof of Registration</label>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="othersCheck">
                <label class="form-check-label" for="othersCheck">Others</label>
              </div>
            </div>
            <hr class="mx-2">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Note:</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <!-- /Requirements -->
          </div>
          <div class="modal-footer">
            <div class="mx-auto">
              <button type="button" class="btn btn-primary"><i class="fas fa-paper-plane mr-1"></i> Send</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancel</button>
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
    <script defer src="<?php echo base_url() ?>assets/vendor/fontawesome-free/js/all.js" rel="stylesheet"></script>

  </body>

</html>
