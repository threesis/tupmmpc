<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png"/>
    <title>TUPMMPC</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap4/css/bootstrap.css" rel="stylesheet">

    <!-- Selectize -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/selectize/css/selectize.bootstrap3.css"/>

    <!-- JQuery -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Muli:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Niramit|PT+Sans|Source+Sans+Pro|Open+Sans|Droid+Serif|Kaushan+Script|Rambla" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/admin.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/r-2.2.2/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/r-2.2.2/datatables.min.js"></script>


  </head>

  <body id="page-top">
    <?php foreach($user_image as $image) : ?>
    <!-- Navigation Bar -->
    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-white navbar-color">
      <div class="container">
        <a class="navbar-brand"><img src="<?php echo base_url(); ?>assets/img/logo.png"><strong>TUPMMPC</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active mr-2">
              <a class="nav-link" href="#"><span class="far fa-envelope fa-lg mr-2"></span>Messages</a>
            </li>
            <li class="nav-item dropdown mr-2">
              <a class="nav-link" href="#" id="navbarDropdownNoti" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell fa-lg mr-2"></i>Notifications</a>
              <div id="returnNoti" class="dropdown-menu" aria-labelledby="navbarDropdownNoti">
                <a id="openApp" class="dropdown-item">Account</a>
              </div>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user fa-lg mr-2"></i>Account</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item mb-1" id="editProfileBtn" data-toggle="modal" data-target="#editProfileModal" href="#"><span class="far fa-edit fa-lg mr-1"></span> Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>users/signout"><span class="fas fa-sign-out-alt fa-lg mr-2"></span>Sign out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="wrapper">
      <div class="container">
        <div class="row">
        <!-- Profile -->
          <div class="col-sm-padding col-sm-12 col-md-4 col-lg-3 offset-md mb-3">
            <div class="card shadow-sm">
              <div class="card-header bg-secondary p-5 bobo">
                <div id="displayUserImg" class="card-title">
                  <img src="<?php echo base_url(); ?>assets/img/profile_img/<?php echo $image['user_img']; ?>" class="img-thumbnail rounded-circle mx-auto d-block my-3 shadow-sm">
                </div>
              </div>
              <div class="card-text mb-3 mx-3">
                <h6 id="displayUserName" class="admin-name text-center"><?php echo $image['name']; ?></h6>
                <h6 class="info-text text-center text-muted"><?php echo $this->session->userdata('position') ?></h6>
              </div>
              <div class="list-group profile-menu" id="list-tab" role="tablist">
                <?php if($this->session->flashdata('user_signedin')): ?>
                  <?php echo '<p class="alert bg-primary alert-dismissable fade show text-center mb-0" id="loginWelcomeMsg" role="alert">
                            <button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><a class="h7 text-white">'.$this->session->flashdata('user_signedin').
                            $this->session->userdata('username').'!'.'</a></p>';
                  ?>
                <?php endif; ?>
                <a class="list-group-item list-group-item-action mt-0 active" id="dashboard-tab" data-toggle="list" href="#dashboardTab" role="tab" aria-controls="home">Dashboard<i class="fas fa-home mr-2 mt-1 float-left"></i>  <i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loans-tab" data-toggle="list" href="#loansTab" role="tab" aria-controls="settings">Loans<i class="fas fa-credit-card mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="members-tab" data-toggle="list" href="#membersTab" role="tab" aria-controls="messages">Members<i class="fas fa-users mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loanapps-tab" data-toggle="list" href="#loanAppTab" role="tab" aria-controls="settings"> Loan Applications<i class="fas fa-poll mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="myloanrecords-tab" data-toggle="list" href="#myloanrecordsTab" role="tab" aria-controls="messages">My Loan Records<i class="fas fa-folder-open mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="records-comakers-tab" data-toggle="list" href="#loanRecordsCoMakersTab" role="tab" aria-controls="settings"><span id="loanRecordsTabText">Loan Records</span> <span id="comakersTabText">& Co-Makers</span><i class="fas fa-poll-h mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="sharecap-ledger-tab" data-toggle="list" href="#ledgerShareCapTab" role="tab" aria-controls="messages">Ledger & Share Capital<i class="fas fa-users mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="applyloan-tab" data-toggle="list" href="#applyLoanTab" role="tab" aria-controls="messages">Apply Loan<i class="far fa-file-alt mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="websettings-tab" data-toggle="list" href="#websiteSettings" role="tab" aria-controls="messages">Settings<i class="fas fa-cog mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
              </div>
            </div>
          </div>


          <!-- Navigation Body -->
          <div class="col-sm-padding col-sm-12 col-md-8 col-lg-9 mb-3">
            <div class="card shadow-sm">
              <div class="tab-content">
                <!-- Home Part -->
                <div class="tab-pane fade show" id="dashboardTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header shadow-sm">Dashboard</h2>
                  <div id="chairmanDash">
                    <div class="card-body card-body-mh">
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardTotalMembers" class="mb-0 text-dark" style="font-size: 2rem"><?php echo $members; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Total <cite>Members</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-user-circle text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardLoansApplied" class="mb-0 text-dark" style="font-size: 2rem"><?php echo $loansApplied; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Loans <cite>Applied</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-file-alt text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-4">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardPendingLoans" class="mb-0 text-warning" style="font-size: 2rem"><?php echo $pendingLoans; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Loans <cite>Pending</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-pause-circle text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer bg-warning p-1">
                              <small class="text-white ml-2">Pending</small>
                              <i class="fas fa-chart-bar text-white float-right mr-2 mt-1"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardApprovedLoans" class="mb-0 text-info" style="font-size: 2rem"><?php echo $approvedLoans; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Loans <cite>Approved</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-check-circle text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer bg-info p-1">
                              <small class="text-white ml-2">Accepted</small>
                              <i class="fas fa-chart-bar text-white float-right mr-2 mt-1"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardActiveLoans" class="mb-0 text-primary" style="font-size: 2rem"><?php echo $ongoingLoans; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Loans <cite>Active</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-arrow-alt-circle-right text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer bg-primary p-1">
                              <small class="text-white ml-2">On-going</small>
                              <i class="fas fa-chart-bar text-white float-right mr-2 mt-1"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <div class="row mb-3">
                            <div class="col-md-12">
                              <div class="card rounded shadow-sm">
                                <div class="card-body p-3">
                                  <div class="row">
                                    <div class="col-6">
                                      <h6 id="dashboardPayments" class="mb-0 text-success" style="font-size: 2rem">&#8369;65,250</h6>
                                      <footer class="text-muted" style="font-size: 0.8rem">Total Loan <cite>Payments</cite></footer>
                                    </div>
                                    <div class="col-6">
                                      <i class="far fa-arrow-alt-circle-right text-secondary float-right" style="font-size: 2.5rem"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-12">
                              <div class="card rounded shadow-sm">
                                <div class="card-body p-3">
                                  <div class="row">
                                    <div class="col-6">
                                      <h6 id="dashboardMissedPayments" class="mb-0 text-danger" style="font-size: 2rem">&#8369;27,500</h6>
                                      <footer class="text-muted" style="font-size: 0.8rem">Total Missed <cite>Payments</cite></footer>
                                    </div>
                                    <div class="col-6">
                                      <i class="far fa-arrow-alt-circle-right text-secondary float-right" style="font-size: 2.5rem"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card rounded shadow-sm">
                                <div class="card-body p-3">
                                  <div class="row">
                                    <div class="col-6">
                                      <h6 id="dashboardMissedPayments" class="mb-0 text-warning" style="font-size: 2rem">&#8369;82,900</h6>
                                      <footer class="text-muted" style="font-size: 0.8rem">Total <cite>Share Capital</cite></footer>
                                    </div>
                                    <div class="col-6">
                                      <i class="far fa-arrow-alt-circle-right text-secondary float-right" style="font-size: 2.5rem"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-7">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <h6 class="mb-0 text-primary" style="font-size: 1.2rem">Monthly Loan Track</h6>
                              <footer class="text-muted" style="font-size: 0.8rem"><cite>in 2018-2019</cite></footer>
                              <canvas id="line-chart"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="memberDash">
                    <div class="card-body card-body-mh">
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardMemberAppliedLoans" class="mb-0 text-warning" style="font-size: 2rem"><?php echo $loansApplied; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Total Loans <cite>Applied</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-file-alt text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer bg-warning p-1">
                              <small class="text-white ml-2">Applied</small>
                              <i class="fas fa-chart-bar text-white float-right mr-2 mt-1"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardMemberPendingLoans" class="mb-0 text-info" style="font-size: 2rem"><?php echo $pendingLoans; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Loans <cite>Pending</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-pause-circle text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer bg-info p-1">
                              <small class="text-white ml-2">Pending</small>
                              <i class="fas fa-chart-bar text-white float-right mr-2 mt-1"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardMemberApprovedLoans" class="mb-0 text-success" style="font-size: 2rem"><?php echo $approvedLoans; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Loans <cite>Approved</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-check-circle text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer bg-success p-1">
                              <small class="text-white ml-2">Approved</small>
                              <i class="fas fa-chart-bar text-white float-right mr-2 mt-1"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-6">
                                  <h6 id="dashboardMemberActiveLoans" class="mb-0 text-primary" style="font-size: 2rem"><?php echo $ongoingLoans; ?></h6>
                                  <footer class="text-muted" style="font-size: 0.8rem">Loans <cite>Active</cite></footer>
                                </div>
                                <div class="col-6">
                                  <i class="far fa-arrow-alt-circle-right text-secondary float-right" style="font-size: 2.5rem"></i>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer bg-primary p-1">
                              <small class="text-white ml-2">On-going</small>
                              <i class="fas fa-chart-bar text-white float-right mr-2 mt-1"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card rounded shadow-sm">
                            <div class="card-body p-3">
                              <div class="row">
                                <div class="col-5">
                                  <h6 class="mb-0 text-primary" style="font-size: 1.2rem">Monthly Loan Track</h6>
                                  <footer class="text-muted" style="font-size: 0.8rem"><cite>in 2018-2019</cite></footer>
                                </div>
                                <div class="col-7">
                                  <canvas id="line-chart"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="creditDash">
                    CREDIT OFFICER DASHBOARD
                  </div>
                  <div id="managerDash">
                    MANAGER DASHBOARD
                  </div>
                  <div id="treasurerDash">
                    TREASURER DASHBOARD
                  </div>
                  <div class="card-footer" style="min-height: 60px"></div>
                </div>

                <!-- Loans Part -->
                <div class="tab-pane fade show" id="loansTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header shadow-sm"><strong>Loans</strong><button type="button" id="loans-archive" class="btn btn-light float-right" style="margin-top: -3px"><small class="text-secondary">Loans archive</small></button><button type="button" id="loans-deduction" class="btn btn-light float-right mr-1" style="margin-top: -3px"><small class="text-secondary">Loan deductions</small></button></h2>
                    <div class="card-body card-body-mh">
                      <div class="no-padding" id="addLoanMsg"></div>
                        <form class="form" id="searchloan">
                          <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                              <input type="text" class="form-control" placeholder="Search.." aria-label="Search for a loan" id="searchLoan">
                            </div>
                          </div>
                        </form>
                      <div class="row" id="returnLoans">
                        <!-- Loans list from ajax call -->
                      </div>
                    </div>
                    <div class="card-footer" style="min-height: 60px">
                      <div id="returnLatestDate"></div>
                      <button id="add-loan" class="btn btn-outline-success float-right mb-2"><i class="fas fa-plus-circle mr-2"></i>Add Loan</button>

                      <!-- Add Loan Modal -->
                      <div class="modal fade" id="addLoanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h2 class="modal-title"></h2>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="addLoanForm">
                              <input type="hidden" name="loan_id" value="0">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-6">
                                    <label for="name" class="custom-sm h6">Loan Type</label>
                                    <div class="input-group input-group-sm mb-2">
                                      <input type="text" class="form-control form-control-sm" placeholder="Enter Loan Name.." id="name" name="loan_name">
                                      <div class="invalid-feedback" id="invalidName"></div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <label for="amount" class="custom-sm h6">Max Amount</label>
                                    <div class="input-group input-group-sm mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">&#8369;</span>
                                      </div>
                                      <input type="text" class="form-control form-control-sm" placeholder="Enter Max Amount.." id="amount" name="loan_max_amt" maxlength="9">
                                      <div class="invalid-feedback" id="invalidAmt"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <label for="term" class="custom-sm h6">Max Term</label>
                                    <div class="input-group input-group-sm mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Months</span>
                                      </div>
                                      <input type="text" class="form-control form-control-sm" placeholder="Enter Max Term.." id="term" name="loan_max_term" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                      <div class="invalid-feedback" id="invalidTerm"></div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <label for="interest" class="custom-sm h6">Max Interest</label>
                                    <div class="input-group input-group-sm mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">&#37;</span>
                                      </div>
                                      <input type="text" class="form-control form-control-sm" placeholder="Enter Max Interest.." id="interest" name="loan_interest" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                      <div class="invalid-feedback" id="invalidInterest"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <label for="desc" class="custom-sm h6">Loan Description</label>
                                    <div class="input-group input-group-sm">
                                      <textarea class="form-control form-control-sm" placeholder="Enter Loan Description.." id="desc" name="loan_desc" rows="2" style="resize: none"></textarea>
                                      <div class="invalid-feedback" id="invalidDescription"></div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <label for="selectLoanDeductions" class="custom-sm h6">Loan Deductions</label>
                                    <div id="selectLoanDeductions"></div>
                                  </div>
                                </div>
                              </div>
                            </form>
                            <div class="modal-footer">
                              <button type="submit" id="saveLoan" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-2"></i>Add Loan</button>
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- Members Part -->
                <div class="tab-pane fade show" id="membersTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header shadow-sm">Members</h2>
                    <div class="card-body card-body-mh">
                      <div class="no-padding" id="addMemberMsg"></div>
                        <table id="memberListTbl" class="table table-striped table-hover table-responsive-sm table-md nowrap">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Position</th>
                            <th>Last login</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="returnMemberList">
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer" style="min-height: 60px">
                      <div id="returnMemberLatestDate"></div>
                      <button class="btn btn-outline-success float-right mb-2" id="adduser-perm2"><i class="fas fa-plus-circle mr-2"></i>Add New Member</button>
                    </div>


                <!-- VIEW PROFILE MODAL -->
                <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-secondary p-5 profile-header">
                        <div class="modal-title mx-auto">
                          <img id="viewProfileImg" src="assets/img/team/2.jpg" class="img-thumbnail rounded-circle d-block my-3">
                        </div>
                      </div>
                      <div class="modal-text m-3">
                        <button class="btn btn-light bg-light float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>...</strong></button>
                        <div class="dropdown-menu pb-3" aria-labelledby="dropdownMenuButton">
                          <a href="#" class="dropdown-item" id="delete-user">Delete account</a>
                        </div>
                        <h6 class="memberprofile-name text-center d-block" id="userName"></h6>
                        <h6 class="profile-text text-center text-muted" id="userPosition"></h6>
                        <p class="text-center"><small id="userCollege"></small>&nbsp;&nbsp;-&nbsp;&nbsp;<small id="userAddress"></small></p>
                        <div class="row mt-3">
                          <div class="col-sm-12 col-md-6">
                            <button id="userSharecap" type="button" class="btn btn-outline-secondary btn-sm btn-block p-2"></button>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <button id="userLoanRecords" type="button" class="btn btn-outline-secondary btn-sm btn-block p-2">Loan Records</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script type="text/javascript">
                    $('#userSharecap').click(function(){
                      $("#userLoanRecordsTbl").DataTable().destroy();
                      var id = $('#userSharecap').attr('userid');
                      var name = $('#userName').text();
                      var scModal = $('#userShareCapModal');
                      var vpModal = $('#viewProfileModal');
                      vpModal.modal('hide');
                      scModal.modal('show');
                      scModal.find('.modal-title').text('Share Capital of ' + name + '');
                      scModal.find('.modal-body');
                      $.ajax({
                        type    : 'ajax',
                        method  : 'get',
                        url     : '<?php echo base_url() ?>users/getUserShareCap',
                        data    : {id:id},
                        async   : false,
                        dataType: 'json',
                        success: function(data) {
                          if(data.length) {
                            var tbl = '', or = '', myDate = '';
                            var c = 0;
                            for(var i = 0; i < data.length; i++) {
                              c++;
                              if(data[i].or_number == ''){
                                or = 'Pending';
                              } else {
                                or = data[i].or_number;
                              } if(data[i].date_updated == '0000-00-00') {
                                myDate = 'Pending';
                              } else {
                                myDate = new Date(data[i].date_updated);
                                myDate = myDate.toLocaleDateString("en-US");
                              }
                              tbl +=  '<tr class="text-secondary">' +
                                        '<td style="vertical-align: middle">' + c + '</td>' +
                                        '<td style="vertical-align: middle">' + Math.round(data[i].share_capital).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="vertical-align: middle">' + Math.round(data[i].total_share_capital).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="vertical-align: middle">' + or + '</td>' +
                                        '<td style="vertical-align: middle">' + myDate + '</td>' +
                                      '</tr>'; 
                            }
                            scModal.find('.modal-body #userLoanRecordsTbl').hide();
                            scModal.find('.modal-body #userShareCapTbl').show();
                            scModal.find('.modal-body #returnUserShareCap').html(tbl);
                          } else {
                            scModal.find('.modal-body #userLoanRecordsTbl').hide();
                            scModal.find('.modal-body #userShareCapTbl').show();
                            scModal.find('.modal-body #returnUserShareCap').html('');
                          }
                        },
                        error: function() {
                          alert('A database error occured!');
                        } 
                      });

                      scModal.on('click', '#userShareCapClose', function(){
                        scModal.modal('hide');
                        vpModal.modal('show');
                      });

                      var userShareCapDataTbl = $('#userShareCapTbl').DataTable({
                        "dom": 'lBfrtip',
                        "destroy": true,
                        buttons: [
                          {
                          extend: 'pdf',
                          text: 'PDF'
                          },
                          {
                          extend: 'excel',
                          text: 'Excel'
                          },
                          {
                          extend: 'print',
                          text: 'Print'
                          },
                        ],
                        "pagingType": "simple_numbers",
                        "language": { search: "", searchPlaceholder: "Search.." }
                      });

                        $('#userShareCapTbl_info').addClass('text-muted font-italic');
                    });

                    $('#userLoanRecords').click(function(){
                      $("#userShareCapTbl").DataTable().destroy();
                      var id = $('#userSharecap').attr('userid');
                      var name = $('#userName').text();
                      var scModal = $('#userShareCapModal');
                      var vpModal = $('#viewProfileModal');
                      vpModal.modal('hide');
                      scModal.modal('show');
                      scModal.find('.modal-title').text('Loan Records of '+name+'');
                      scModal.find('.modal-body');
                      $.ajax({
                        type    : 'ajax',
                        method  : 'get',
                        url     : '<?php echo base_url() ?>users/getUserLoanRecords',
                        data    : {id:id},
                        async   : false,
                        dataType: 'json',
                        success: function(data) {
                          if(data.length) {
                            var tblRec = '', myDateRec = '';
                            var c = 0;
                            for(var i = 0; i < data.length; i++) {
                              c++;
                              myDateRec = new Date(data[i].date_applied);
                              myDateRec = myDateRec.toLocaleDateString("en-US");
                              tblRec += '<tr class="text-secondary">' +
                                          '<td style="vertical-align: middle">' + c + '</td>' +
                                          '<td style="vertical-align: middle">' + myDateRec + '</td>' +
                                          '<td style="vertical-align: middle">' + data[i].loan_name + '</td>' +
                                          '<td style="vertical-align: middle">' + Math.round(data[i].loan_amount).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                          '<td style="vertical-align: middle">' + Math.round(data[i].loan_int).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                          '<td style="vertical-align: middle">' + data[i].loan_term + ' month/s</td>' +
                                          '<td style="vertical-align: middle">' + Math.round(data[i].monthly_deduc).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '</tr>'; 
                            }
                            scModal.find('.modal-body #userLoanRecordsTbl').show();
                            scModal.find('.modal-body #userShareCapTbl').hide();
                            scModal.find('.modal-body #returnUserLoanRecords').html(tblRec);
                          } else {
                            scModal.find('.modal-body #userLoanRecordsTbl').show();
                            scModal.find('.modal-body #userShareCapTbl').hide();
                            scModal.find('.modal-body #returnUserLoanRecords').html('');
                          }
                        },
                        error: function() {
                          alert('A database error occured!');
                        } 
                      });

                      scModal.on('click', '#userShareCapClose', function(){
                        scModal.modal('hide');
                        vpModal.modal('show');
                      });

                      var userLoanRecordsDataTbl = $('#userLoanRecordsTbl').DataTable({
                        "dom": 'lBfrtip',
                        "destroy": true,
                        buttons: [
                          {
                          extend: 'pdf',
                          text: 'PDF'
                          },
                          {
                          extend: 'excel',
                          text: 'Excel'
                          },
                          {
                          extend: 'print',
                          text: 'Print'
                          },
                        ],
                        "pagingType": "simple_numbers",
                        "language": { search: "", searchPlaceholder: "Search.." }
                      });

                      $('#userLoanRecordsTbl_info').addClass('text-muted font-italic');
                    });
                  </script>
                </div>

                <div class="modal fade" id="userShareCapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title"></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                        <table id="userShareCapTbl" class="table table-striped table-hover table-responsive text-nowrap" style="display: none">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Share Capital (&#8369;)</th>
                              <th>Total Share Capital (&#8369;)</th>
                              <th>OR Number</th>
                              <th>Payment</th>
                            </tr>
                          </thead>
                          <tbody id="returnUserShareCap">
                            
                          </tbody>
                        </table>
                        <table id="userLoanRecordsTbl" class="table table-striped table-hover table-responsive text-nowrap" style="display: none">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Date Applied</th>
                              <th>Loan Applied</th>
                              <th>Loan Amount (&#8369;)</th>
                              <th>Loan Interest (&#8369;)</th>
                              <th>Loan Term</th>
                              <th>Monthly Amortization (&#8369;)</th>
                            </tr>
                          </thead>
                          <tbody id="returnUserLoanRecords">
                            
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button id="userShareCapClose" type="button" class="btn btn-secondary btn-sm">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- ADD MEMBER MODAL -->
                <div class="modal fade" id="addMemberModal">
                  <div class="modal-dialog modal-dialog-centered">  
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Add Member</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                        <form id="addMemberForm">
                          <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                            <div class="row">
                              <div class="form-group col-md-4">
                                <label for="firstname" class="custom-sm h6">First Name:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter First Name.." aria-describedby="Fname" id="firstname" name="Fname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
                                <div class="invalid-feedback" id="invalidFname"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="middlename" class="custom-sm h6">Middle Name:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Middle Name.." aria-describedby="Mname" id="middlename" name="Mname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
                                <div class="invalid-feedback" id="invalidMname"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="lastname" class="custom-sm h6">Last Name:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Last Name.." aria-describedby="Lname" id="lastname" name="Lname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
                                <div class="invalid-feedback" id="invalidLname"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="address" class="custom-sm h6">City:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Address.." aria-describedby="Address" id="address" name="city">
                                <div class="invalid-feedback" id="invalidCity"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="zipcode" class="custom-sm h6">Zipcode:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Zipcode.." aria-describedby="Zipcode" id="zipcode" name="zip" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <div class="invalid-feedback" id="invalidZip"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="position" class="custom-sm h6">Position:</label>
                                <select class="custom-select form-control-sm" id="position" name="position">
                                  <option selected hidden>Select Role..</option>
                                  <option value="2">Member</option>
                                  <option value="4">Treasurer</option>
                                  <option value="1">Administrator</option>
                                  <option value="3">Credit Officer</option>
                                </select>
                                <div class="invalid-feedback" id="invalidPos"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="birthday" class="custom-sm h6">Birthday:</label>
                                <input type="date" class="form-control form-control-sm" placeholder="Date" name="birthday" aria-describedby="Birthday" id="birthday" name="bday">
                                <div class="invalid-feedback" id="invalidBday"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="email" class="custom-sm h6">Email:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Email.." aria-describedby="Email" id="email" name="email">
                                <div class="invalid-feedback" id="invalidEmail"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="phone" class="custom-sm h6">Phone Number:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Contact Number.." aria-describedby="Phone" id="phone" name="phone" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <div class="invalid-feedback" id="invalidPhone"></div>
                              </div>

                              <div class="form-group col-md-6" id="selectizeCollege">
                                <label for="college" class="custom-sm h6">College:</label>
                                <select id="college" name="college" style="cursor: pointer;">
                                  <option></option>
                                  <option>College of Science</option>
                                  <option>College of Industrial Technology</option>
                                  <option>College of Liberal Arts</option>
                                  <option>College of Engineering</option>
                                  <option>College of Architecture and Fine Arts</option>
                                  <option>College of Industrial Education</option>
                                </select>
                                <div class="invalid-feedback" id="invalidCollege"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="membershipDate" class="custom-sm h6">Date of Membership:</label>
                                <input type="date" class="form-control form-control-sm" placeholder="Date" id="membershipDate" name="membershipDate">
                                <div class="invalid-feedback" id="invalidMembership"></div>
                              </div>

                              <div class="col-12"><hr></div>

                              <div class="form-group col-md-4">
                                <label for="username" class="custom-sm h6">Username:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Username.." aria-describedby="Uname" id="username" name="Uname" onkeypress="if(event.charCode == 32){return false;}">
                                <div class="invalid-feedback" id="invalidUname"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="password" class="custom-sm h6">Password:</label>
                                <input type="password" class="form-control form-control-sm" placeholder="Enter Password.." aria-describedby="Password" id="password" name="password" onkeypress="if(event.charCode == 32){return false;}">
                                <div class="invalid-feedback" id="invalidPass"></div>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="password2" class="custom-sm h6">Verify Password:</label>
                                <input type="password" class="form-control form-control-sm" placeholder="Re-type Password.." aria-describedby="Password2" id="password2" name="password2" onkeypress="if(event.charCode == 32){return false;}">
                                <div class="invalid-feedback" id="invalidPass2"></div>
                              </div>

                              <div class="col-12"><hr></div>

                              <div class="form-group col-md-6">
                                <label for="subscribeShare" class="custom-sm h6">Subscribe Share:</label>
                                <div class="input-group input-group-sm mb-2">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">&#8369;</span>
                                  </div>
                                  <input type="text" class="form-control form-control-sm" placeholder="Enter Subscribe Share.." aria-describedby="Subscribeshare" id="subscribeShare" name="subscribeShare" maxlength="9">
                                  <div class="invalid-feedback" id="invalidSubscribeShare"></div>
                                </div>
                              </div> 

                              <div class="form-group col-md-6">
                                <label for="sharecap" class="custom-sm h6">Share Capital:</label>
                                <div class="input-group input-group-sm mb-2">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">&#8369;</span>
                                  </div>
                                  <input type="text" class="form-control form-control-sm" placeholder="Enter Share Capital.." aria-describedby="Sharecap" id="sharecap" name="sharecap" maxlength="9">
                                  <div class="invalid-feedback" id="invalidShareCapital"></div>
                                </div>
                              </div> 

                              <div class="form-group col-md-6">
                                <label for="startingShareCap" class="custom-sm h6">Starting Share Capital:</label>
                                <div class="input-group input-group-sm mb-2">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">&#8369;</span>
                                  </div>
                                  <input type="text" class="form-control form-control-sm" placeholder="Enter Staring Capital.." aria-describedby="Ewan" id="startingShareCap" name="startingShareCap" maxlength="9">
                                  <div class="invalid-feedback" id="invalidStarting"></div>
                                </div>
                              </div> 

                              <div class="form-group col-md-6">
                                <label for="orNum" class="custom-sm h6">OR Number:</label>
                                <div class="input-group input-group-sm mb-2" onkeypress="if(event.charCode == 32){return false;}">
                                  <input type="text" class="form-control form-control-sm" placeholder="Enter OR Number.." aria-describedby="ORnumber" id="orNum" name="orNum" maxlength="">
                                  <div class="invalid-feedback" id="invalidOR"></div>
                                </div>
                              </div> 
                            </div>
                          </div> 
                        </form>     
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm float-right" id="add-user"><i class="fas fa-plus-circle mr-2"></i>Add Member</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>

              <!-- Loan Application Lists -->
              <div class="tab-pane fade show" id="loanAppTab" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-header shadow-sm">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="ml-2 pb-4">
                      <h2 class="card-title">Loan Applications</h2>
                    </li>
                    <li class="nav-item ml-auto loan-apps">
                      <a class="nav-link active" data-toggle="tab" href="#pending_loans">Pending<span id="pendingNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                    <li class="nav-item loan-apps">
                      <a class="nav-link" data-toggle="tab" href="#approved_loans">Approved<span id="approvedNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                    <li class="nav-item loan-apps">
                      <a class="nav-link" data-toggle="tab" href="#active_loans">Active<span id="activeNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                  </ul>
                </div>
                  <div class="tab-content card-body card-body-mh">
                    <div id="loanAppMsg" class="no-padding"></div>
                    <div class="tab-pane list-group active" id="pending_loans">
                      <table id="pendingLoansTbl" class="table table-striped table-hover table-responsive-sm table-md nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Loan Applied</th>
                            <th>Verifications</th>
                          </tr>
                        </thead>
                        <tbody id="returnPendingLoan">
                          
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane list-group" id="approved_loans">
                      <table id="approvedLoansTbl" class="table table-striped table-hover table-responsive-sm table-md nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Loan Applied</th>
                            <th>Remarks</th>
                          </tr>
                        </thead>
                        <tbody id="returnApprovedLoans">
                          
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane list-group" id="active_loans">
                      <table id="activeLoansTbl" class="table table-striped table-hover table-responsive nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Loan Applied</th>
                            <th>Loan Amount</th>
                            <th>Cheque No.</th>
                            <th>Disbursement No.</th>
                          </tr>
                        </thead>
                        <tbody id="returnActiveLoans">
                          
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane list-group" id="disapproved_loans">
                      <div class="row mb-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Search.." aria-label="Search for a member" id="searchDisapprovedLoanApp">
                        </div>
                      </div>
                      <div id="returnDisapprovedLoans"></div>
                    </div>
                  </div>
                  <div class="card-footer" style="min-height: 60px">
                    <p class="card-text text-muted float-left mt-2"><em id="pendingLoanInfo"></em><em id="approvedLoanInfo" style="display: none"></em><em id="activeLoanInfo" style="display: none"></em></p>
                    <div id="pendingLoanPaginate" class="float-right"></div>
                    <div id="approvedLoanPaginate" class="float-right" style="display: none"></div>
                    <div id="activeLoanPaginate" class="float-right" style="display: none"></div>
                  </div>
                </div>

                <!-- Loan Application Form Check Modal -->
                  <div class="modal fade" id="openLoanApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title"></h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                          <div id="defaultLoanAppBody">
                            <div class="row">
                              <img id="loanAppFormImg" class="rounded w-25 h-25 ml-3" src="">
                                <div class="col align-self-start">
                                  <label name="loanApplicant" style="font-size: 110%; font-weight: 600"></label><br>
                                  <a name="loanApplicantEmail" class="small text-primary em"></a><br>
                                  <a name="loanApplicantContact" class="small"></a><br>
                                  <a name="loanApplicantCollege" class="small"></a><br>
                                  <a name="loanApplicantAddress" class="small"><a name="loanApplicantZip" class="small"></a></a><br>
                                  <a name="loanApplicantRegDate" class="small"></a>
                                </div>
                                <div class="col align-self-start">
                                  <a class="custom-xs h6" id="thpInfo"><em>Take home pay:<span class="userLoanInfo ml-2" name="loan_thp"></span></em></a><br>
                                  <a class="custom-xs h6" id="cnInfo"><em>Cheque No.:<span class="userLoanInfo ml-2" name="loan_cn"></span></a></em><br>
                                </div>
                              </div>
                                  
                                  <!-- <div id="returnAppComakers">
                                  </div> -->
                            <input type="hidden" name="loan_deduc_hidden">
                            <table class="table table-striped table-hover table-bordered table-sm mt-3">
                              <thead>
                                <tr>
                                  <th colspan="2" class="text-center">Information</th>
                                  <th colspan="2" class="text-center">Co-makers</th>
                                </tr>
                              </thead>
                              <tbody style="font-size: 90%">
                                <tr>
                                  <td>Application ID</td>
                                  <td name="loan_id"></td>
                                  <td colspan="2">Comaker 1</td>
                                </tr>
                                <tr>
                                  <td>Type of Loan</td>
                                  <td name="loan_type"></td>
                                  <td colspan="2">Comaker 2</td>
                                </tr>
                                <tr>
                                  <td>Term of Loan</td>
                                  <td name="loan_term"></td>
                                  <td colspan="2">Comaker 3</td>
                                </tr>
                                <tr>
                                  <td>Amount of Loan</td>
                                  <td name="loan_amt"></td>
                                  <th colspan="2"><button class="btn btn-outline-info btn-sm btn-block" data-toggle="modal" data-target="#applicantPayslipModal" onclick="$('#openLoanApp').modal('hide');">View payslip</button></th>
                                </tr>
                                <tr>
                                  <td>Interest on Loan</td>
                                  <td name="loan_interest"></td>
                                  <td colspan="2"><button class="btn btn-outline-info btn-sm btn-block">View Ledger</button></td>
                                </tr>
                                <tr>
                                  <td>Monthly Amortization</td>
                                  <td name="loan_deduc"></td>
                                  <td colspan="2"><button class="btn btn-outline-info btn-sm btn-block">View Loans</button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div id="confirmationLoanAppBody">
                          </div>
                          <div id="cancellationLoanAppBody">
                          </div>
                        </div>
                        <div class="modal-footer" style="min-height: 50px">
                          <div id="returnLoanAppFooter">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="applicantPayslipModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 id="applicant-payslip" class="modal-title"></h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="max-height: 80%; overflow-y: auto">
                          <img class="img-fluid" id="loan_payslip">
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary btn-sm float-right" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $('#applicantPayslipModal').on('click', '#applicantPayslipBackBtn', function(){
                        $('#applicantPayslipModal').modal('hide');
                        $('#openLoanApp').modal('show');
                      });
                    </script>
                  </div>

                  <div class="modal fade" id="confirmationLoanAppModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title"></h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                          <div id="confirmationLoanAppBody">
                            
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div id="ConfirmationLoanAppFooter">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- MY LOAN RECORD -->
                <div class="tab-pane fade show" id="myloanrecordsTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header">My Loan Records</h2>
                  <div class="card-body card-body-mh">
                    <table id="myLoanRecordTbl" class="table table-striped table-hover table-responsive table-md nowrap">
                      <thead>
                        <tr>
                          <th>Date Applied</th>
                          <th>Loan Applied</th>
                          <th>Loan Interest (&#8369;)</th>
                          <th>Loan Amount (&#8369;)</th>
                          <th>Loan Term</th>
                          <th>Monthly Amortization (&#8369;)</th>
                          <th>Status</th>
                          <th>Comakers</th>
                        </tr>
                      </thead>
                      <tbody id="returnMyLoanRecords">
                        
                      </tbody>
                    </table>
                    <div id="myLoanRecApplyLoan" class="text-center mt-5"></div>
                  </div>
                  <div id="myLoanRecordFooter" class="card-footer" style="min-height: 60px">
                    <p class="card-text text-muted float-left mt-2"><em id="myLoanRecordsInfo"></em></p>
                    <div id="myLoanRecordPaginate" class="float-right"></div>
                  </div>
                  <script type="text/javascript">
                    $(function(){
                    getMyLoanRecords();

                    function getMyLoanRecords() {
                      var id = '<?php echo $this->session->userdata('user_id'); ?>';
                      $.ajax({
                        type    : 'ajax',
                        method  : 'get',
                        url     : '<?php echo base_url() ?>users/getMyLoanRecords',
                        data    : {id:id},
                        async   : false,
                        dataType: 'json',
                        success: function(data) {
                          if(data.length) {
                            var tbl = '';
                            var cm1 = '';
                            var cm2 = '';
                            var cm3 = '';
                            for(var i = 0; i < data.length; i++) {
                              var myDate  = new Date(data[i].date_applied);
                              if(data[i].comaker_1 == null) {
                                cm1 = '';
                              } else {
                                cm1 = data[i].comaker_1 + ', ';
                              } if(data[i].comaker_2 == null) {
                                cm2 = '';
                              } else {
                                cm2 = data[i].comaker_2;
                              } if(data[i].comaker_3 == null) {
                                cm3 = '';
                              } else {
                                cm3 = ', ' + data[i].comaker_3;
                              }

                              tbl +=  '<tr class="text-secondary">' +
                                        '<td style="vertical-align: middle">' + myDate.toLocaleDateString("en-US") + '</td>' +
                                        '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].loan_name + '</span></td>' +
                                        '<td style="vertical-align: middle">' + Math.round(data[i].loan_amount).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="vertical-align: middle">' + Math.round(data[i].loan_int).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="vertical-align: middle">' + data[i].loan_term + ' month/s</td>' +
                                        '<td style="vertical-align: middle">' + Math.round(data[i].monthly_deduc).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="vertical-align: middle">' + data[i].status + '</td>' +
                                        '<td style="vertical-align: middle">' + cm1 + cm2 + cm3 + '</td>' +
                                      '</tr>'; 
                            }
                            $('#returnMyLoanRecords').html(tbl);
                          } else {
                            $('#returnMyLoanRecords').html('');
                            $('#myLoanRecApplyLoan').html('<button class="btn btn-outline-primary btn-lg" onclick="$("#applyLoanTab").addClass("active");">New here? Apply for a loan now!</button>');
                          }
                        },
                        error: function() {
                          alert('A database error occured!');
                        } 
                      });

                      var myLoanRecDataTbl = $('#myLoanRecordTbl').DataTable({
                        "dom": 'lBfrtip',
                        buttons: [
                          {
                          extend: 'pdf',
                          text: 'Export PDF'
                          },
                          {
                          extend: 'excel',
                          text: 'Export Excel'
                          },
                          {
                          extend: 'print',
                          text: 'Print table'
                          },
                        ],
                        "pagingType": "simple_numbers",
                        "language": { search: "", searchPlaceholder: "Search.." }
                      });

                      $('#myLoanRecordTbl_info').detach().appendTo('#myLoanRecordsInfo');
                      $('#myLoanRecordTbl_paginate').detach().appendTo('#myLoanRecordPaginate');

                      }
                    });
                  </script>
                </div>

                <!-- Loan Application Lists -->
                <div class="tab-pane fade show" id="ledgerShareCapTab" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card-header shadow-sm">
                    <ul class="nav nav-tabs card-header-tabs">
                      <li class="ml-2 pb-4" style="min-height: 40px;">
                        <h2 class="card-title">Ledger & Share Capital</h2>
                      </li>
                      <li id="view-ledgers" class="nav-item ml-auto loan-apps">
                        <a id="ledgerTab" class="nav-link active" data-toggle="tab" href="#ledgerSubTab">View Ledger<span class="badge badge-secondary ml-1"></span></a>
                      </li>
                      <li id="update-ledgers" class="nav-item loan-apps">
                        <a id="updateLedgerTab" class="nav-link" data-toggle="tab" href="#updateLedgerSubTab">Update Ledger<span class="badge badge-secondary ml-1"></span></a>
                      </li>
                      <li id="update-share-capitals" class="nav-item loan-apps">
                        <a id="shareCapTab" class="nav-link" data-toggle="tab" href="#shareCapSubTab">Share Capital<span class="badge badge-secondary ml-1"></span></a>
                      </li>
                    </ul>
                  </div>
                    <div class="tab-content card-body card-body-mh">
                    <div id="ledgerShareCapMsg" class="no-padding"></div>
                      <div class="tab-pane active" id="ledgerSubTab">
                        <div class="form-row mb-1">
                          <div class="col-sm-12 col-md-6">
                            <select id="viewLedgerMonthSelect">
                              <option></option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>

                          <div class="col-sm-12 col-md-6">
                            <select id="viewLedgerYearSelect">

                            </select>
                          </div>
                        </div>
                        <table id="collectionsTbl" class="table table-striped table-hover table-responsive table-md text-nowrap">
                          <thead>
                            <tr id="returnCollectionsHeader">
                              
                            </tr>
                          </thead>
                          <tbody id="returnCollectionsBody">
                            
                          </tbody>
                          <tfoot id="returnCollectionsFooter">
                            
                          </tfoot>
                        </table>
                        <!-- <small class="mt-2">Showing <strong id="numOfLedgerEntry"></strong> out of <strong id="totalLedgerEntry"></strong> entries</small> -->
                      </div>

                      <div class="tab-pane" id="updateLedgerSubTab">
                        <div class="form-row mb-1">
                          <div class="col-sm-12 col-md-4">
                            <select id="updateLedgerMonthSelect">
                              <option></option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>

                          <div class="col-sm-12 col-md-4">
                            <select id="updateLedgerYearSelect">

                            </select>
                          </div>
                          <div id="updateLedgerOR" class="col-sm-12 col-md-4 text-center">
                          </div>
                        </div>
                        <table id="viewUpdateLedgerTbl" class="table table-striped table-hover table-responsive table-md text-nowrap">
                          <thead>
                            <tr>
                              <th style="vertical-align: middle"><input id="selectAllLedger" type="checkbox"></th>
                              <th>Name</th>
                              <th>Loan Applied</th>
                              <th>Balance (&#8369;)</th>
                              <th>Monthly Amortization (&#8369;)</th>
                              <th>Date Updated</th>
                            </tr>
                          </thead>
                          <tbody id="returnViewUpdateLedgerBody">
                            
                          </tbody>
                          <tfoot id="returnViewUpdateLedgerFoot">
                            
                          </tfoot>
                        </table>
                        <!-- <small class="mt-2">Showing <strong id="numOfLedgerEntry"></strong> out of <strong id="totalLedgerEntry"></strong> entries</small> -->
                      </div>

                      <div class="tab-pane" id="shareCapSubTab">
                        <div class="form-row mb-1">
                          <div id="shareCapMonthFilter" class="col-sm-12 col-md-4">
                            <select id="shareCapMonthSelect">
                              <option></option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>
                          <div id="shareCapYearFilter" class="col-sm-12 col-md-4">
                            <select id="shareCapYearSelect">
                              
                            </select>
                          </div>
                          <div id="shareCapOR" class="col-sm-12 col-md-4 text-center">
                          </div>
                        </div>
                        <table id="shareCapRecTbl" class="table table-striped table-hover table-responsive table-md text-nowrap">
                          <thead>
                            <tr>
                              <th style="vertical-align: middle"><input id="selectAllShareCap" type="checkbox"></th>
                              <th>Name</th>
                              <th>Share Capital (&#8369;)</th>
                              <th>Total Share Capital (&#8369;)</th>
                              <th>Last Updated</th>
                            </tr>
                          </thead>
                          <tbody id="returnShareCapRec">
                            
                          </tbody>
                          <tfoot id="returnShareCapRecFoot">
                            
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="card-footer" style="min-height: 60px">
                      <p class="card-text text-muted float-left mt-2"><em id="viewLedgerInfo"></em><em id="updateLedgerInfo" style="display: none"></em><em id="shareCapInfo" style="display: none"></em></p>
                      <div id="viewLedgerPaginate" class="float-right"></div>
                      <button id="ledgerShareCapBtn" class="btn btn-outline-success float-right" style="display: none"><i class="far fa-edit mr-1"></i>Update All</button>
                      <button id="updateLedgerBtn" class="btn btn-outline-success float-right" style="display: none"><i class="far fa-edit mr-1"></i>Update All</button>
                    </div>
                  </div>

                

              <!-- RECORDS AND COMAKERS TAB -->
              <div class="tab-pane fade show" id="loanRecordsCoMakersTab" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-header shadow-sm">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="ml-2 pb-4" style="min-height: 40px">
                      <h2 class="card-title"><span id="loanRecordsText">Loan Records</span> <span id="comakersText">& Co-Makers</span></h2>
                    </li>
                    <li id="loanrecords-tab" class="nav-item ml-auto loan-apps">
                      <a class="nav-link active" data-toggle="tab" href="#loanRecordsSubTab">Loan Records<span id="pendingNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                    <li id="comakers-tab" class="nav-item loan-apps">
                      <a class="nav-link" data-toggle="tab" href="#comakersSubTab">Co-Makers<span id="approvedNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                  </ul>
                </div>
                  <div class="tab-content card-body card-body-mh">
                    <div id="loanAppMsg" class="no-padding"></div>
                    <div class="tab-pane active" id="loanRecordsSubTab">
                      <div class="dropdown mb-2">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="loanNameDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </button>
                      <div id="returnLoanNames" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      </div>
                    </div>
                    <table id="loanRecordTbl" class="table table-striped table-hover table-responsive table-md text-nowrap">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Name</th>
                          <th>Take Home Pay (&#8369;)</th>
                          <th>Amount of Loan (&#8369;)</th>
                          <th>Gross Amount of Loan (&#8369;)</th>
                          <th>Monthly Amortization (&#8369;)</th>
                          <th>Term of Payments</th>
                          <th>Remarks</th>
                        </tr>
                      </thead>
                      <tbody id="returnLoanRecords">
                        
                      </tbody>
                      <tfoot id="returnLoanRecordsFoot">
                        
                      </tfoot>
                    </table>
                    <script type="text/javascript">
                      $(function(){
                        getLoans();
                        getLoanRecord();

                        function getLoans() {
                          $.ajax({
                            type    : 'ajax',
                            url     : '<?php echo base_url() ?>loans/getLoans',
                            async   : false,
                            dataType: 'json',
                            success: function(data) {
                              var loanNames = '';
                              for(var i = 0; i < data.length; i++) {
                                loanNames += '<a loan-id="' + data[i].id + '" class="dropdown-item" href="#">' + data[i].loan_name + '</a>';
                              }
                              $('#returnLoanNames').html(loanNames);
                              $('#loanNameDropdown').text(data[1].loan_name).attr('loan-id', data[1].id);
                            },
                            error: function() {
                              alert('A database error occured!');
                            } 
                          });
                        }

                        $('#returnLoanNames a').click(function(){
                          var id = $(this).attr('loan-id');
                          var name = $(this).text();
                          $('#loanNameDropdown').text(name).attr('loan-id', id);
                          getLoanRecord();
                        });

                        function getLoanRecord() {
                          $("#loanRecordTbl").DataTable().destroy();
                          var id = $('#loanNameDropdown').attr('loan-id');
                          $.ajax({
                            type    : 'ajax',
                            method  : 'get',
                            url     : '<?php echo base_url() ?>loans/getLoanRecord',
                            data    : {loanID: id},
                            async   : false,
                            dataType: 'json',
                            success : function(data) {
                              var tbl, loanRecFoot, nameCount;
                              var totalLoanAmt = 0, totalGrossAmt = 0;
                              if(data.length > 0) {
                                for(var i = 0; i < data.length; i++) {
                                  var cm1 = data[i].comaker_1;
                                  var cm2 = data[i].comaker_2;
                                  var cm3 = data[i].comaker_3;
                                  if(cm1 == null) {
                                    cm1 = '-';
                                  } if(cm2 == null) {
                                    cm2 = '-';
                                  } if(cm3 == null) {
                                    cm3 = '-';
                                  }
                                  nameCount = i;
                                  var myDate  = new Date(data[i].date_applied);
                                  totalLoanAmt = Number(totalLoanAmt) + Number(data[i].loan_amount);
                                  var loanAmt =Math.round(data[i].loan_amount).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                  var takehomepay = Math.round(data[i].take_home_pay).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                  var monthlydeduc = Math.round(data[i].monthly_deduc).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                  var thpAfterDeduc = data[i].take_home_pay - data[i].monthly_deduc;
                                  thpAfterDeduc = Math.round(thpAfterDeduc).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                  var calcInterest = data[i].loan_amount * (data[i].loan_interest * 0.1);
                                  var grossAmt = Number(data[i].loan_amount) + Number(calcInterest);
                                  totalGrossAmt = Number(totalGrossAmt) + grossAmt;
                                  grossAmt = Math.round(grossAmt).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                                tbl +=  '<tr class="text-secondary">' +
                                          '<td style="vertical-align: middle">' + myDate.toLocaleDateString("en-US") + '</td>' +
                                          '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].name + '</span></td>' +
                                          '<td style="vertical-align: middle">' + takehomepay + '</td>' +
                                          '<td style="vertical-align: middle">' + loanAmt + '</td>' +
                                          '<td style="vertical-align: middle">' + grossAmt + '</td>' +
                                          '<td style="vertical-align: middle">' + monthlydeduc + '</td>' +
                                          '<td style="vertical-align: middle">' + data[i].loan_term + ' month/s</td>' +
                                          '<td style="vertical-align: middle">' + data[i].status + '</td>' +
                                        '</tr>';                       
                                }
                                loanRecFoot =  '<tr>' +
                                                  '<th>Total</th>' +
                                                  '<th>' + i + '</th>' +
                                                  '<th></th>' +
                                                  '<th>&#8369;' + Math.round(totalLoanAmt).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</th>' +
                                                  '<th>&#8369;' + Math.round(totalGrossAmt).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</th>' +
                                                  '<th></th>' +
                                                  '<th></th>' +
                                                  '<th></th>' +
                                                '</tr>'; 
                                $('#returnLoanRecords').html(tbl);
                                $('#returnLoanRecordsFoot').html(loanRecFoot);
                              }
                              else{
                                $('#returnLoanRecords').html('');
                                $('#returnLoanRecordsFoot').html('');
                              }
                            },
                            error: function() {
                              alert('Error!');
                            }
                          });
                            
                          var loanRecordsDataTbl = $('#loanRecordTbl').DataTable({
                            "dom": 'lBfrtip',
                            "buttons": [
                              {
                              extend: 'pdf',
                              text: 'Export PDF'
                              },
                              {
                              extend: 'excel',
                              text: 'Export Excel'
                              },
                              {
                              extend: 'print',
                              text: 'Print table'
                              },
                            ],
                            "pagingType": "simple_numbers",
                            "language": { search: "", searchPlaceholder: "Search.." }
                          });

                          $('#loanRecordsPaginate').html($('#loanRecordTbl_paginate').clone());
                          $('#loanRecordsInfo').html($('#loanRecordTbl_info').clone());
                          $('#loanRecordTbl_info').remove();
                          $('#loanRecordTbl_paginate').remove();

                        }
                      });
                    </script>
                    </div>

                    <div class="tab-pane" id="comakersSubTab">
                      <!-- CoMakers Part  -->
                  <div class="tab-pane fade show" id="coMakersTab" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-header">
                      <ul class="nav nav-tabs card-header-tabs">
                        <li class="ml-2 pb-4">
                          <h2 class="card-title">
                            <span>Co-Makers Application</span>
                          </h2>
                        </li>
                        <li class="nav-item ml-auto">
                          <a class="nav-link active" data-toggle="tab" href="#pending_cm_applications">Pending<span class="badge badge-danger badge-pill ml-2" id="cm_pending_badge"></span></a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body" style="height: 70vh; overflow-y: auto;">
                      <div class="tab-pane list-group active" id="pending_cm_applications">
                        <div id="return_cm_applications">
                          <!-- insert comakers application list group -->
                        </div>
                      </div>            
                    </div>
                  </div>

                  <div class="modal fade" id="cmViewLoanAppModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="cmViewLoanAppModalTitle"></h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        <div class="modal-body" id="cmViewLoanAppModalBody">
                          
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-success" id="submit_cm_attachment">Submit Attachment</button>
                        </div>
                      </div>
                      
                    </div>                  
                  </div>
                <!-- end CoMakers Part -->
                    </div>
                  </div>
                  <div class="card-footer" style="min-height: 60px">
                    <p class="card-text text-muted float-left mt-2"><em id="loanRecordsInfo"></em><em id="comakersInfo" style="display: none"></em></p>
                    <div id="loanRecordsPaginate" class="float-right"></div>
                    <div id="comakersPaginate" class="float-right" style="display: none"></div>
                  </div>
                </div>


                <!-- Loan Application part -->
                <div class="tab-pane fade show" id="applyLoanTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header">Apply Loan</h2>
                  <div class="card-body card-body-mh">
                  <div class="no-padding" id="loanapp_alerts"></div>
                    <div class="row justify-content-md-center">
                      <div class="col-md-6 col-sm-12">
                        <h6>Please fill up the form below</h6>
                        <form id="loanAppForm" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="hidden" name="loanapp-remarks" id="loanapp_remarks" class="form-control" value="New">
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="loanapp-id-no" id="loanapp_id_no" class="form-control" value="">
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="loanapp-user-id" id="loanapp_user_id" class="form-control">
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="loanapp-name" id="loanapp_name" class="form-control">
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="loan-selector-data" class="form-control" id="loan_selector_data" value="">
                            <input type="text" name="loan-type" id="loan_type" class="form-control" style="display: block" disabled>
                            <select class="custom-select mt-2 text-muted" name="loan_selector" id="loan_selector" style="display: block">
                               <!-- ajax insert loan types -->
                            </select>
                            <div class="invalid-feedback" id="loan_selector_invalid"></div>
                          </div>
                          <div class="input-group mb-3" id="loanapp-amount">
                            <input type="number" maxlength="10" class="form-control" name="loan-amount" id="loan-amount" placeholder="Input loan amount..">
                            <div class="invalid-feedback" id="loan_amount_invalid"></div>
                          </div>
                          <div class="form-group">
                            <select class="custom-select text-muted" name="loan-term" id="loan_term">
                              <option selected hidden>Select loan term..</option>
                              <!-- ajax insert loan terms-->
                            </select>
                            <div class="invalid-feedback" id="loan_term_invalid"></div>
                          </div>
                          <div class="form-group">
                            <div class="row mx-auto">
                                <label for="user_attachment" class="btn btn-secondary btn-sm">
                                  Upload Payslip <input type="file" id="user_attachment" name="userfile" hidden>
                                </label>
                                <p id="user_attachment_image" class="small ml-2 mt-2"></p>
                                <div class="invalid-feedback" id="user_attachment_invalid"></div>
                            </div>
                          </div>
                          <input type="hidden" id="comakerCount">
                          <div id="loanapp-cm-application">
                            <!--Number of Co Maker depedency insert here -->
                          </div>
                          <div class="d-flex justify-content-end">
                            <button type="button" id="loanapp_submit" class="btn btn-success btn-sm"><i class="fas fa-arrow-circle-right mr-1"></i> Proceed</button>
                          </div>
                        </form>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <h6 class="mb-3">Calculator</h6>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Term</span>
                          </div>
                          <input type="text" class="form-control" placeholder="-" name="calc_loan_term">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Gross Amt.</span>
                          </div>
                          <input type="text" class="form-control" placeholder="-" name="calc_loan_grossamt">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Monthly Deduc.</span>
                          </div>
                          <input type="text" class="form-control" placeholder="-" name="calc_loan_monthlydeduc">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer" style="min-height: 60px"></div>
                </div>


                <!-- Settings Part -->
                <div class="tab-pane fade show" id="websiteSettings" role="tabpanel" aria-labelledby="home-tab">
                  <h5 class="card-header">Settings</h5>
                  <div class="card-body card-body-mh">
                    <div class="" id="addMsg"></div>
                    <form class="row" id="saveInfoForm">
                      <div class="form-group col-md-6 my-2">
                        <label for="web-title" class="custom-sm">Website Title</label>
                        <input type="text-area" class="form-control" placeholder="Enter Website Title:" aria-describedby="webtitle" id="web-title" name="webtitle">
                        <div class="invalid-feedback" id="invalidTitle"></div>
                      </div>
                      <div class="form-group col-md-6 my-2">
                        <label for="web-telno" class="custom-sm">Telephone Number</label>
                        <input type="text-area" class="form-control" placeholder="Enter Telephone No.:" aria-describedby="webtelno" id="web-telno" name="webtelno">
                        <div class="invalid-feedback" id="invalidTelno"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="web-phoneno" class="custom-sm">Mobile Number</label>
                        <input type="text-area" class="form-control" placeholder="Enter Mobile No.:" aria-describedby="webphoneno" id="web-phoneno" name="webphoneno">
                        <div class="invalid-feedback" id="invalidPhoneno"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="web-location" class="custom-sm">Location</label>
                        <input type="text-area" class="form-control" placeholder="Enter Branch Location:" aria-describedby="weblocation" id="web-location" name="weblocation">
                        <div class="invalid-feedback" id="invalidLocation"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="web-email" class="custom-sm">Email</label>
                        <input type="text-area" class="form-control" id="web-email" placeholder="Enter Email Address:" name="webemail"></input>
                        <div class="invalid-feedback" id="invalidEmailAdd"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="web-address" class="custom-sm">Website</label>
                        <input type="text-area" class="form-control" placeholder="Enter Website Url:" aria-describedby="webaddress" id="web-address" name="webaddress">
                        <div class="invalid-feedback" id="invalidWebaddress"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="web-fb" class="custom-sm">Facebook</label>
                        <input type="text-area" class="form-control" placeholder="Enter Facebook Account:" aria-describedby="weblocation" id="web-fb" name="webfb">
                        <div class="invalid-feedback" id="invalidFbaccount"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="web-twitter" class="custom-sm">Twitter</label>
                        <input type="text-area" class="form-control" placeholder="Enter Twitter Account:" aria-describedby="weblocation" id="web-twitter" name="webtwitter">
                        <div class="invalid-feedback" id="invalidTwitteraccount"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Upload Logo</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                    <button type="submit" id="editInfo" class="btn btn-primary">Edit</button>
                    <button type="submit" id="saveInfos" class="btn btn-primary" >Save</button>
                    <button type="button" id="cancelEdit" class="btn btn-alert" data-dismiss="modal">Cancel</button>
                  </div>
                </div>

                <!-- ALL MODAL UI ARE HERE -->
                <!-- Archive Loan Modal -->
                <div class="modal fade" id="loanArchiveModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Loan Archive</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="max-height: 80%; overflow-y: auto">
                        <div id="unarchiveLoanMsg" style="margin: -15px -15px 15px -15px"></div>
                        <div id="returnLoanArchive" class="row">
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm px-3" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Loan Deduction Modal -->
                <div class="modal fade" id="loanDeductionModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Loan Deductions</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="max-height: 80%; overflow-y: auto">
                        <div id="addLoanDeducMsg" style="margin: -15px -15px 15px -15px"></div>
                        <table id="addLoanDeducTbl" class="table table-striped table-hover table-responsive-md table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Value</th>
                              <th>Date Added</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="returnLoanDeductions">

                          </tbody>
                        </table>
                        <div id="returnEmptyDeduc" class="text-center"></div>
                        <div class="text-center mb-2"><button type="button" id="addLoanDeduction" class="btn btn-outline-secondary btn-sm">Add New Loan Deduction</button></div>
                        <form id="addLoanDeducForm" class="mt-3" style="display: none;">
                          <hr>
                          <h5>Add New Loan Deduction</h5>
                          <div class="row mt-3">
                            <div class="col-4">
                              <label for="deducName" class="custom-sm h6">Deduction Name</label>
                              <div class="input-group input-group-sm mb-2">
                                <input type="text" class="form-control form-control-sm" placeholder="Enter name.." id="deducName" name="deducName">
                                <div class="invalid-feedback" id="invalidDeducName"></div>
                              </div>
                            </div>
                            <div class="col-4">
                              <label for="deducType" class="custom-sm h6">Deduction Type</label>
                              <select class="custom-select form-control-sm" id="deducType" name="deducType" disabled>
                                <option selected hidden>Select type..</option>
                                <option value="percentage">Percent</option>
                                <option value="amount">Amount</option>
                              </select>
                              <div class="invalid-feedback" id="invalidDeducType"></div>
                            </div>
                            <div class="col-4">
                              <label for="deducVal" class="custom-sm h6">Deduction Value</label>
                              <div class="input-group input-group-sm mb-2">
                                <div id="deducValPrepend" class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter value.." id="deducVal" name="deducVal" maxlength="4" disabled>
                                <div class="invalid-feedback" id="invalidDeducVal"></div>
                              </div>
                            </div>
                          </div>
                          <button type="button" id="saveLoanDeduc" class="btn btn-secondary btn-sm btn-block">Add deduction</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm px-3" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Delete Loan Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title"></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" id="deleteRecordBtn"><i class="fas fa-trash mr-1"></i>I am sure</button>
                        <button type="button" class="btn btn-secondary btn-sm" id="cancelDeleteRecordBtn" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>

                    <!-- VIEW PROFILE MODAL -->
                <div class="modal fade" id="openProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer"></div>
                    </div>
                  </div>
                </div>

                <!-- EDIT PROFILE MODAL -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Edit Account</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div id="returnEditProfileBody">
                        
                      </div>
                      <div class="modal-footer">
                        
                      </div>
                    </div>
                  </div>
                </div>

                <!-- loan app calculations MODAL -->
                <div class="modal fade" id="loanAppCalculations" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Loan Summary</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="max-height: 80%; overflow-y: auto;">
                        <div class="custom-sm ml-2">
                          <!-- <span id="loanType"></span><br>
                          <span id="loanTerm"></span><br>
                          <span id="loanAmt"></span><br>
                          <span id="loanInt"></span><br>
                          <span id="loanGross"></span><br>
                          <span id="loanMoDed"></span><br>
                          <span id="loanRetensionFee"></span><br>
                          <span id="loanServiceFee"></span><br>
                          <span id="loanOutstandingBal"></span><br> -->

                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <td colspan="3" rowspan="2">
                                    <br>
                                    <br>
                                    <span>Loan Receivable - </span><span id="loanType"></span><br>
                                    <span>Loan Interest - </span><span id="loanTerm"></span><br>
                                    <span>Deferred Interest Income </span><br>
                                    <span>Retention Fee 3%</span><br>
                                    <span>Service Fee 1%</span><br>
                                    <span>Outstanding Balance of </span><br>
                                    <span>Cash in Bank</span>
                                  </td>
                                  <td class="text-center font-weight-bold">DEBIT</td>
                                  <td class="text-center font-weight-bold">CREDIT</td>
                                </tr>

                                <tr>
                                  <td id="debits" class="text-right">
                                    <span id="loanAmt"></span><br>
                                    <span id="loanInt"></span><br>
                                  </td>
                                  
                                  <td id="credits" class="text-right">
                                    <br>
                                    <br>
                                    <span id="loanDefIntInc"></span><br>
                                    <span id="loanRetensionFee"></span><br>
                                    <span id="loanServiceFee"></span><br>
                                    <span id="loanOutstandingBal"></span><br>
                                    <span id="loanCiB"></span>
                                  </td>
                                </tr>

                                <tr>
                                  <td colspan="3"></td>
                                  <td id="debitTotal" class="text-right" rowspan="1"></td>
                                  <td id="creditTotal" class="text-right" rowspan="1"></td>
                                </tr>

                                <tr>
                                  <td colspan="3" class="text-right"><strong>NET AMOUNT DUE<strong></td>
                                  <td colspan="2"  class="text-right" id="totalNetAmt"><span id="loanNetAmt"></span></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          
                          <div id="loanCms" class="mt-3"></div>
                        </div>
                        <div class="table-responsive p-2 mt-1">
                          <table class="table table-striped table-sm" style="border: 1px solid lightgray;">
                            <thead>
                              <tr>
                                <th scope="col">Months</th>
                                <th scope="col">Monthly Interest</th>
                                <th scope="col">Monthly Amortizations</th>
                                <th scope="col">Balance</th>
                              </tr>
                            </thead>
                            <tbody id="calcBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success btn-sm float-right" id="submitLoan"><i class="fas fa-thumbs-up mr-1"></i> Apply</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ALL MODAL UI ARE HERE -->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    


    <script type="text/javascript">
      $(function() {
        searchLoan();
        getActiveLoans();
        getApprovedLoans();
        getPendingLoans();
        get_latest_date();
        search_user();
        getMember_latest_date();
        get_infos();
        Comakers();
        Check();

        // DataTables CODES

        var pendingLoansDataTbl = $('#pendingLoansTbl').DataTable({
          "dom": 'lBfrtip',
          buttons: [
            {
            extend: 'pdf',
            text: 'Export PDF'
            },
            {
            extend: 'excel',
            text: 'Export Excel'
            },
            {
            extend: 'print',
            text: 'Print table',
            exportOptions: {
              columns: [0, 1, 2]
            }
            },
          ],
          "pagingType": "simple_numbers",
          "language": { search: "", searchPlaceholder: "Search.." },
          "columnDefs": [
            { "orderable": false, "targets": 3 }
          ]
        });

        $('#pendingLoansTbl_info').detach().appendTo('#pendingLoanInfo');
        $('#pendingLoansTbl_paginate').detach().appendTo('#pendingLoanPaginate');

        var approvedLoansDataTbl = $('#approvedLoansTbl').DataTable({
          "dom": 'lBfrtip',
          buttons: [
            {
            extend: 'pdf',
            text: 'Export PDF'
            },
            {
            extend: 'excel',
            text: 'Export Excel'
            },
            {
            extend: 'print',
            text: 'Print table',
            exportOptions: {
              columns: [0, 1, 2]
            }
            },
          ],
          "pagingType": "simple_numbers",
          "language": { search: "", searchPlaceholder: "Search.." },
          "columnDefs": [
            { "orderable": false, "targets": 3 }
          ]
        });

        $('#approvedLoansTbl_info').detach().appendTo('#approvedLoanInfo');
        $('#approvedLoansTbl_paginate').detach().appendTo('#approvedLoanPaginate');

        var activeLoansDataTbl = $('#activeLoansTbl').DataTable({
          "dom": 'lBfrtip',
          buttons: [
            {
            extend: 'pdf',
            text: 'Export PDF'
            },
            {
            extend: 'excel',
            text: 'Export Excel'
            },
            {
            extend: 'print',
            text: 'Print table',
            exportOptions: {
              columns: [0, 1, 2, 3]
            }
            },
          ],
          "pagingType": "simple_numbers",
          "language": { search: "", searchPlaceholder: "Search.." }
        });

        $('#activeLoansTbl_info').detach().appendTo('#activeLoanInfo');
        $('#activeLoansTbl_paginate').detach().appendTo('#activeLoanPaginate');
        // DataTables CODES END
        
        // Ledger & Share Capital
        var months  = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        var cities = ['Manila', 'Makati', 'Quezon', 'Pasig', 'Taguig', 'Pasay', 'Parañaque', 'Caloocan', 'Las Piñas', 'Malabon', 'Mandaluyong', 'Marikina ', 'Muntinlupa', 'Navotas', 'San Juan', 'Valenzuela', 'Pateros'];
        var yearNow = new Date().getFullYear(), yrOptions = "<option val=" + yearNow + ">" + yearNow + "</option>";
        for(var Y = yearNow; Y >= 2010; Y--) {
          yrOptions += "<option value=" + Y + ">" + Y + "</option>";
        }
        var month = new Date();
        $('#updateLedgerYearSelect').html(yrOptions).selectize({
          create: false,
          placeholder: "Year..",
          closeAfterSelect: true
        });
        $('#shareCapYearSelect').html(yrOptions).selectize({
          create: false,
          placeholder: "Year..",
          closeAfterSelect: true
        });
        $('#shareCapMonthSelect').selectize({
          create: false,
          maxOptions: 12,
          placeholder: months[month.getMonth()],
          closeAfterSelect: true
        });
        $('#viewLedgerYearSelect').html(yrOptions).selectize({
          create: false,
          placeholder: "Year..",
          closeAfterSelect: true
        });
        $('#viewLedgerMonthSelect').selectize({
          create: false,
          maxOptions: 12,
          placeholder: months[month.getMonth()],
          closeAfterSelect: true
        });
        $('#updateLedgerYearSelect').html(yrOptions).selectize({
          create: false,
          placeholder: "Year..",
          closeAfterSelect: true
        });
        $('#updateLedgerMonthSelect').selectize({
          create: false,
          maxOptions: 12,
          placeholder: months[month.getMonth()],
          closeAfterSelect: true
        });
        $('#college').selectize({
          create: true,
          maxOptions: 5,
          placeholder: "Select College..",
          closeAfterSelect: true
        });
        // Select all checkboxes
        $('#selectAllShareCap').click( function () {
          $('#shareCapRecTbl input[type="checkbox"]:enabled').prop('checked', this.checked);
        });
        $('#selectAllLedger').click( function () {
          $('#viewUpdateLedgerTbl input[type="checkbox"]:enabled').prop('checked', this.checked);
        });
        $('#ledgerTab').click(function(){
          $('#ledgerShareCapBtn').hide();
          $('#updateLedgerBtn').hide();
          $('#viewLedgerInfo').show();
          $('#updateLedgerInfo').hide();
          $('#shareCapInfo').hide();
        });
        $('#updateLedgerTab').click(function(){
          $('#viewLedgerPaginate').hide();
          $('#viewLedgerInfo').hide();
          $('#ledgerShareCapBtn').hide();
          $('#updateLedgerBtn').show();
          $('#updateLedgerInfo').show();
          $('#shareCapInfo').hide();
        });
        $('#shareCapTab').click(function(){
          $('#ledgerShareCapBtn').show();
          $('#updateLedgerBtn').hide();
          $('#viewLedgerInfo').hide();
          $('#updateLedgerInfo').hide();
          $('#shareCapInfo').show();
        });
        

        function getPendingLoans(query){
          var ccUsername = '<?php echo $this->session->userdata('username'); ?>';
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>loans/getPendingloans',
            async: false,
            data: {query: query},
            dataType: 'json',
            success: function(data) {
              if(data.length > 0) {
                $('#pendingNotif').html(data.length);
                var c = 0;
                var row = '';
                var txtCol1 = '';
                var txtCol2 = '';
                var txtCol3 = '';
                var status = '';
                var verifiedIcon = '';
                var verifiedBy = '';
                var verifiedThp = '';
                var takeHomePay = '';
                for(var i = 0; i < data.length; i++){
                  c++;
                  if(data[i].cc_approval_1 == ccUsername) {
                    status = 'verified';
                    if(data[i].take_home_pay > 0) {
                      verifiedThp = 'verified';
                      verifiedBy = data[i].thp_verified_by;
                      takeHomePay = data[i].take_home_pay;
                      verifiedIcon = 'far fa-check-circle text-success';
                    } else {
                      verifiedThp = 'pending';
                      verifiedIcon = '';
                    }
                  } else if(data[i].take_home_pay > 0) {
                    verifiedThp = 'verified';
                    verifiedBy = data[i].thp_verified_by;
                    takeHomePay = data[i].take_home_pay;
                    verifiedIcon = 'far fa-check-circle text-success';
                    if(data[i].cc_approval_2 == ccUsername) {
                      status = 'verified';
                    } else if(data[i].cc_approval_3 == ccUsername) {
                      status = 'verified';                      
                    } else {
                      status = 'pending';
                    }
                  } else {
                    if(data[i].cc_approval_2 == ccUsername) {
                      status = 'verified';
                      verifiedThp = 'pending';
                      verifiedIcon = '';
                    } else if(data[i].cc_approval_3 == ccUsername) {
                        status = 'verified';
                        verifiedThp = 'pending';
                        verifiedIcon = '';
                      } else { 
                        status = 'pending';
                        verifiedThp = 'pending';
                        verifiedIcon = '';
                      }
                  } 

                  if(data[i].cc_approval_1 == null) {
                    txtCol1 = 'text-secondary';
                  } else {
                    txtCol1 = 'text-success';
                  } if(data[i].cc_approval_2 == null) {
                    txtCol2 = 'text-secondary';
                  } else {
                    txtCol2 = 'text-success';
                  } if(data[i].cc_approval_3 == null) {
                    txtCol3 = 'text-secondary';
                  } else {
                    txtCol3 = 'text-success';
                  } 

                  switch(data[i].college) {
                    case 'College of Science':
                      col = 'COS';
                      break;
                    case 'College of Liberal Arts':
                      col = 'CLA';
                      break;
                    case 'College of Industrial Technology':
                      col = 'CIE';
                      break;
                    case 'College of Engineering':
                      col = 'COE';
                      break;
                    case 'College of Architecture and Fine Arts':
                      col = 'CAFA';
                      break;
                    case 'College of Industrial Education':
                      col = 'CIE';
                      break;
                    default: 
                      col = data[i].college; 
                  }

                  row +=  '<tr class="text-secondary" name="' + data[i].name + '" status="' + status + '" verifiedThp="' + verifiedThp + '" payslip="' + takeHomePay + '" verifiedBy="' + verifiedBy + '" monthlyDeduc="' + data[i].monthly_deduc + '" data="' + data[i].loanapp_id + '" style="cursor: pointer">' +
                            '<td style="vertical-align: middle">' + c + '</td>' +
                            '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].name + '</span><i class="' + verifiedIcon + ' ml-1"></i></td>' +
                            '<td style="vertical-align: middle">' + col + '</td>' +
                            '<td style="vertical-align: middle">' + data[i].loan_name + '</td>' +
                            '<td style="vertical-align: middle">' +
                              '<i cc="' + data[i].cc_approval_3 + '" class="far fa-user-circle fa-lg mr-1 '+ txtCol3 +'"></i>' +
                              '<i cc="' + data[i].cc_approval_2 + '" class="far fa-user-circle fa-lg mr-1 '+ txtCol2 +'"></i>' +
                              '<i cc="' + data[i].cc_approval_1 + '" class="far fa-user-circle fa-lg mr-1 '+ txtCol1 +'"></i>' +
                            '</td>' +
                          '</tr>'; 
                }  
                  $('#returnPendingLoan').html(row);  
                  $('#dashboardPendingLoans').load(location.href + " #dashboardPendingLoans"); 
                } else {
                  if(query != null) {
                    $('#pendingNotif').html('0');
                    $('#returnPendingLoan').html('<div class="ml-4">' +
                                                  '<h4 class="mt-5"><strong class="text-danger">No results for ' + query + '</h4>' +
                                                  '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">The term you entered did not bring up any results.</h7>' +
                                                '</div>');
                  } else {
                    $('#pendingNotif').html('0');
                    $('#returnPendingLoan').html('<div class="ml-4">' +
                                                  '<h4 class="mt-5"><strong class="text-success">Great job!</h4>' +
                                                  '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">Nothing to display.</h7>' +
                                                '</div>');
                  }
                } 
            }, 
            error: function(){
              alert('ERROR!');
            }
          });
        }

        function getApprovedLoans(query){
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>loans/getApprovedLoans',
            data: {query: query},
            async: false,
            dataType: 'json',
            success: function(data){
              var color = '';
              var status = '';
              var verifiedBy = '';
              var takeHomePay = '';
              var approvedLoanNote = '';
              if(data.length > 0) {
                $('#approvedNotif').html(data.length);
                var c = 0, row = ''; 
                for(var i = 0; i < data.length; i++){
                  c++;
                  var dateIssued = new Date(Date.parse(data[i].date_approved.replace('-','/','g')));
                  dateIssued = dateIssued.toUTCString();
                  dateIssued = dateIssued.split(' ').slice(0, 4).join(' ');
                  if(data[i].cheque_no == null) {
                    color = 'info';
                    status = 'pending';
                    approvedLoanNote = 'Pending cheque..';
                  } else {
                    color = 'primary';
                    status = 'verified';
                    approvedLoanNote = 'Pending voucher..';
                  }

                  switch(data[i].college) {
                    case 'College of Science':
                      col = 'COS';
                      break;
                    case 'College of Liberal Arts':
                      col = 'CLA';
                      break;
                    case 'College of Industrial Technology':
                      col = 'CIE';
                      break;
                    case 'College of Engineering':
                      col = 'COE';
                      break;
                    case 'College of Architecture and Fine Arts':
                      col = 'CAFA';
                      break;
                    case 'College of Industrial Education':
                      col = 'CIE';
                      break;
                    default: 
                      col = data[i].college; 
                  }

                  row +=  '<tr class="text-secondary" name="' + data[i].name + '" status="' + status + '" data="' + data[i].loanapp_id + '"payslip="' + data[i].take_home_pay + '" verifiedBy="' + data[i].thp_verified_by + '" chequeNo="' + data[i].cheque_no + '" dateIssued="' + dateIssued + '" style="cursor: pointer">' +
                            '<td style="vertical-align: middle">' + c + '</td>' +
                            '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].name + '</span></td>' +
                            '<td style="vertical-align: middle">' + col + '</td>' +
                            '<td style="vertical-align: middle">' + data[i].loan_name + '</td>' +
                            '<td style="vertical-align: middle"><span class="badge badge-' + color + ' p-2 px-3">' + approvedLoanNote + '</span></td>' +
                          '</tr>'; 
                }
                $('#returnApprovedLoans').html(row);
                $('#dashboardApprovedLoans').load(location.href + " #dashboardApprovedLoans"); 
              } else {
                if(query != null) {
                  $('#approvedNotif').html('0');
                  $('#returnApprovedLoans').html('<div class="ml-4">' +
                                       '<h4 class="mt-5"><strong class="text-danger">No results for ' + query + '</h4>' +
                                       '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">The term you entered did not bring up any results.</h7>' +
                                     '</div>');
                } else {
                  $('#approvedNotif').html('0');
                  $('#returnApprovedLoans').html('<div class="ml-4"><h4 class="mt-5"><strong class="text-success">Looks good!</h4><h7 style="color: #66757f; font-weight: light; padding-top: 20px">Nothing to display.</h7></div>');
                }
              } 
            }, 
              error: function(){
                alert('ERROR');
              }
          });
        }

        function getActiveLoans(){
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>loans/getActiveLoans',
            async: false,
            dataType: 'json',
            success: function(data){
              var color = '';
              var status = '';
              var verifiedBy = '';
              var takeHomePay = '';
              var approvedLoanNote = '';
              if(data.length > 0) {
                $('#activeNotif').html(data.length);
                var c = 0, row = ''; 
                for(var i = 0; i < data.length; i++){
                  c++;
                  var dateActive = new Date(Date.parse(data[i].payment_date.replace('-','/','g')));
                  dateActive = dateActive.toUTCString();
                  dateActive = dateActive.split(' ').slice(0, 4).join(' ');

                  switch(data[i].college) {
                    case 'College of Science':
                      col = 'COS';
                      break;
                    case 'College of Liberal Arts':
                      col = 'CLA';
                      break;
                    case 'College of Industrial Technology':
                      col = 'CIE';
                      break;
                    case 'College of Engineering':
                      col = 'COE';
                      break;
                    case 'College of Architecture and Fine Arts':
                      col = 'CAFA';
                      break;
                    case 'College of Industrial Education':
                      col = 'CIE';
                      break;
                    default: 
                      col = data[i].college; 
                  }

                  row +=  '<tr class="text-secondary" name="' + data[i].name + '" remarks="' + data[i].remarks + '" data="' + data[i].loanapp_id + '" activeLoanID="' + data[i].id + '" payslip="' + data[i].take_home_pay + '" balance="' + data[i].balance + '" dateActive="' + dateActive + '" style="cursor: pointer">' +
                            '<td style="vertical-align: middle">' + c + '</td>' +
                            '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].name + '</span></td>' +
                            '<td style="vertical-align: middle">' + col + '</td>' +
                            '<td style="vertical-align: middle">' + data[i].loan_name + '</td>' +
                            '<td style="vertical-align: middle">' + Math.round(data[i].balance).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="vertical-align: middle">' + data[i].cheque_no + '</td>' +
                            '<td style="vertical-align: middle">' + data[i].disbursement_no + '</td>' +
                          '</tr>'; 
                }
                $('#returnActiveLoans').html(row);
                $('#dashboardActiveLoans').load(location.href + " #dashboardActiveLoans"); 
              } else {
                if(query != null) {
                  $('#activeNotif').html('0');
                  $('#returnActiveLoans').html('<div class="ml-4">' +
                                       '<h4 class="mt-5"><strong class="text-danger">No results for ' + query + '</h4>' +
                                       '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">The term you entered did not bring up any results.</h7>' +
                                     '</div>');
                } else {
                  $('#activeNotif').html('0');
                  $('#returnActiveLoans').html('<div class="ml-4"><h4 class="mt-5"><strong class="text-success">Looks good!</h4><h7 style="color: #66757f; font-weight: light; padding-top: 20px">Nothing to display.</h7></div>');
                }
              } 
            }, 
            error: function(){
              alert('ERROR');
            }
          });
        }

        var selectedTab = 'returnPendingLoan';
        selectApp(selectedTab);

        $('.loan-apps').click(function() {
        selectedTab = $(this).find('a').attr('href');
          if(selectedTab == '#approved_loans') {
            selectedTab = 'returnApprovedLoans';
            $('#pendingLoanInfo').hide();
            $('#approvedLoanInfo').show();
            $('#activeLoanInfo').hide();
            $('#pendingLoanPaginate').hide();
            $('#approvedLoanPaginate').show();
            $('#activeLoanPaginate').hide();
          } else if(selectedTab == '#active_loans') {
            selectedTab = 'returnActiveLoans';
            $('#pendingLoanInfo').hide();
            $('#approvedLoanInfo').hide();
            $('#activeLoanInfo').show();
            $('#pendingLoanPaginate').hide();
            $('#approvedLoanPaginate').hide();
            $('#activeLoanPaginate').show();
          } else {
            selectedTab = 'returnPendingLoan';
            $('#pendingLoanInfo').show();
            $('#approvedLoanInfo').hide();
            $('#activeLoanInfo').hide();
            $('#pendingLoanPaginate').show();
            $('#approvedLoanPaginate').hide();
            $('#activeLoanPaginate').hide();
          }
          selectApp(selectedTab);
        });
        
        // open app pending
        function selectApp(selectedTab){
        $("#"+selectedTab).on('click', 'tr', function() {
          var role = '<?php echo $this->session->userdata('position'); ?>';
          var id = $(this).attr('data');
          var status = $(this).attr('status');
          var dateIssued = $(this).attr('dateIssued');
          var verifiedBy = $(this).attr('verifiedBy');
          var verifiedThp = $(this).attr('verifiedThp');
          var takeHomePay = $(this).attr('payslip');
          takeHomePay = Math.round(takeHomePay).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          var cheque = $(this).attr('chequeNo');
          var name = $(this).attr('name');
          var img = $(this).find('img').attr('src');
          $('#openLoanApp').attr('selectedname', name);
          $('#openLoanApp').attr('selectedid', id);
          if(selectedTab == 'returnPendingLoan') {
            $('#thpInfo').hide();
            $('#cnInfo').hide();
            $('#openLoanApp').find('.modal-title').html("<a class='text-info'>New</a> - Application #" + id);
            $('#openLoanApp').find('.modal-footer').html('<div class="input-group input-group-sm"><div class="input-group-prepend"><span class="input-group-text px-2" id="basic-addon1">&#8369;</span></div><input type="text" class="form-control form-control-sm mr-2" placeholder="Input the payslip amount.." id="loanAppPayslipAmt" name="loanAppPayslipAmt" maxlength="8"><button type="button" class="btn btn-primary btn-sm mr-1 px-4 float-right" id="approveLoanAppBtn"><i class="far fa-check-circle mr-1"></i> Approve</button><button type="button" class="btn btn-danger btn-sm float-right px-2" id="cancelLoanAppBtn" data-toggle="modal" data-target="#cancelLoanNote"><i class="fas fa-times-circle"></i> Cancel</button></div>').attr('id', 'approve-cancel-PL');
            if(status == 'verified') {
              $('#approveLoanAppBtn').prop('disabled', true).html('<i class="far fa-check-circle"></i> Verified!');
            } else {
              $('#approveLoanAppBtn').prop('disabled', false).html('<i class="fas fa-arrow-circle-right"></i> Approve');
            }
            if(verifiedThp == 'verified') {
              $('#thpInfo').show();
              $('span[name=loan_thp]').html('&#8369;' + takeHomePay);
              $('span[name=loan_thp_verified]').html(verifiedBy);
              if(role == 'Credit Officer') {
                $('#approve-cancel-PL').show();
                $('#openLoanApp').modal('show');
                $('#loanAppPayslipAmt').prop('disabled', true).val(takeHomePay + " — reviewed by: " + verifiedBy);
              }
            } else {
              if(role == 'Credit Officer') {
                $('#approve-cancel-PL').show();
                $('#openLoanApp').modal('show');
                $('#loanAppPayslipAmt').prop('disabled', false).attr('placeholder', 'Input the payslip amount..');
              }
            }
          } else if(selectedTab == 'returnApprovedLoans') {
            $('#openLoanApp').find('.modal-title').html("<a class='text-primary'>Approved</a> - Application #" + id);
            $('#thpInfo').show();
            $('#cnInfo').hide();
            $('span[name=loan_thp]').html('&#8369;' + takeHomePay);
            $('span[name=loan_thp_verified]').html(verifiedBy);
            $('#openLoanApp').find('.modal-footer').html('<div class="input-group input-group-sm"><input type="text" class="form-control form-control-sm mr-2" placeholder="Enter cheque number.." id="chequeNumberInput" name="cheque_number" maxlength="8"><button type="button" class="btn btn-outline-success btn-sm float-right px-2" id="chequeLoanAppBtn"><i class="fas fa-arrow-circle-right fa-sm mr-1"></i> Submit cheque</button></div>').attr('id', 'issue-cheque-AL');
            if(status == 'verified') {
              $('#cnInfo').show();
              $('span[name=loan_cn]').html(cheque);
              $('span[name=loan_cn_verified]').html(dateIssued);
              if(role == 'Treasurer') {
                $('#openLoanApp').modal('show');
                $('#chequeLoanAppBtn').prop('disabled', true).html('<i class="far fa-check-circle"></i> Cheque Issued!');
                $('#chequeNumberInput').prop('disabled', true).val(cheque + " — cheque issued on: " + dateIssued);
              } else if(role == 'Manager') {
                $('#openLoanApp').modal('show');
                $('#openLoanApp').find('.modal-footer').html('<button type="button" class="btn btn-outline-success btn-sm float-right px-2" id="voucherLoanAppBtn"><i class="fas fa-arrow-circle-right fa-sm mr-1"></i>Create voucher</button>');
              }
            } else {
              if(role == 'Treasurer') {
                $('#openLoanApp').modal('show');
                $('#chequeNumberInput').show();
                $('#chequeNumberInput').prop('disabled', false).attr('placeholder', 'Enter cheque number..');
              } else if(role == 'Manager') {
                $('#openLoanApp').modal('show');
                $('#openLoanApp').find('.modal-footer').html('<div class="mx-auto"><em>Pending cheque number</em></div>');
              }
            }
          }  else if(selectedTab == 'returnActiveLoans') {

            }
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              url     : '<?php echo base_url() ?>administrators/getLoanAppDetails',
              data    : {id:id},
              async   : false,
              dataType: 'json',
              success : function(data) {
                var cmCount = 0;
                var comakers = '';
                $('#loanAppFormImg').attr('src', img);
                $('label[name=loanApplicant]').text(data.name);
                $('a[name=loanApplicantCollege]').text(data.college);
                $('a[name=loanApplicantEmail]').text(data.email);
                $('a[name=loanApplicantContact]').text(data.contact_no);
                $('a[name=loanApplicantAddress]').text(data.address);
                $('a[name=loanApplicantZip]').text(' — ' + data.zipcode);
                $('img[id=loan_payslip]').attr('src', '<?php echo base_url() ?>assets/img/payslips/' + data.user_payslip);
                $('#applicant-payslip').html('<p id="applicantPayslipBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p><span style="font-weight: normal">Payslip of</span> ' + data.name);
                $('td[name=loan_id]').text(data.loanapp_id);
                $('td[name=loan_type]').text(data.loan_name);
                $('td[name=loan_amt]').html('&#8369;' + Math.round(data.loan_amount).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('td[name=loan_interest]').html('&#8369;' + Math.round(data.loan_int).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('td[name=loan_deduc]').html('&#8369;' + Math.round(data.monthly_deduc).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('input[name=loan_deduc_hidden]').text(data.monthly_deduc);
                $('td[name=loan_term]').text(data.loan_term + ' month/s');

                if(data.comaker_1 != null) {
                  cmCount++;
                } if(data.comaker_2 != null) {
                  cmCount++;
                } if(data.comaker_3 != null) {
                  cmCount++;
                } if (data.comaker_4 != null) {
                  cmCount++;
                }

                if(cmCount != 0) {
                  for(var i = 1; i <= cmCount; i++) {
                    if(i == 1) {
                      var cm = data.comaker_1;
                    } if (i == 2) {
                      cm = data.comaker_2;
                    } if (i == 3) {
                      cm = data.comaker_3;
                    } if (i == 4) {
                      cm = data.comaker_4;
                    }
                    comakers += '<a class="custom-xs h6">' + i + ':<span class="userLoanInfo ml-2" name="comaker_' + i + '">' + cm + '</span></a><br>';
                  }
                  $('#returnAppComakers').html(comakers);
                } else {
                  $('#returnAppComakers').html('Nothing to display.');
                }                          
              },
              error: function() {
                alert('Error!');
              }
            });
          });
        }

        $('#openLoanApp').on('click', '#voucherLoanAppBtn', function(){
          var id = $('#openLoanApp').attr('selectedid');
          var name = $('#openLoanApp').attr('selectedname');
          var loan = '';
          var loanAmt = '';
          var loanTerm = '';
          var loanInterest = '';
          var monthlyDeduc = '';
          var cheque = '';
          var dii = '';
          var cashInBank = '';
          var serviceFee = '';
          var retentionFee = '';
          var totalDebit = '';
          var totalCredit = '';
          var totalBalance = '';
          var remarks = '';
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>loans/getChequeDetails',
            data    : {id:id},
            async   : false,
            dataType: 'json',
            success : function(data){
              loanAmt = data[0][0];
              loanTerm = data[0][1];
              loanInterest = data[0][2];
              monthlyDeduc = data[0][3];
              cheque = data[0][4];
              APLid = data[0][5];
              loan = data[0][6];
              remarks = data[0][7];
              dii = loanInterest * loanAmt;
              serviceFee = 0.01 * loanAmt;
              retentionFee = 0.03 * loanAmt;
              cashInBank = loanAmt - serviceFee;
              totalDebit = Number(loanAmt) + Number(dii);
              totalCredit = Number(cashInBank) + Number(dii) + Number(serviceFee);
              totalBalance = loanAmt - monthlyDeduc;
            },
            error : function(){
              alert('ERROR!');
            }
          });
            $('#openLoanApp').modal('hide');
            $('#confirmationLoanAppModal').find('.modal-dialog').removeClass('modal-md');
            $('#confirmationLoanAppModal').modal('show');
            $('#confirmationLoanAppModal').find('.modal-title').html('<p id="confirmationLoanAppBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p>Disbursement voucher');
            $('#confirmationLoanAppModal').find('.modal-body').html(
              '<div class="mb-5"><span class="h4 float-left">NET AMOUNT: </span><span class="h3 float-right text-success">&#8369;' + cashInBank.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span></div>' +
              '<table class="table table-striped table-bordered table-hover table-sm">' +
                '<tbody id="calcBody" style="height: auto; max-height: 400px; overflow-y: auto; font-size: 90%">' +
                  '<tr>' +
                    '<td colspan="2"><strong>DATE: <?php date_default_timezone_set("Asia/Manila"); echo date("Y/m/d"); ?></strong></td>' +
                    '<td><strong>VOUCHER: ' + APLid + '</strong></td>' +
                    '<td><strong>CHEQUE: ' + cheque + '</strong></td>' +
                  '<tr>' +
                    '<td colspan="2">Payee</td>' +
                    '<td colspan="2">' + name + '</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">' + loan + '</td>' +
                    '<td colspan="2">&#8369;' + cashInBank.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2"></td>' +
                    '<td colspan="1"><strong>DEBIT</strong></td>' +
                    '<td colspan="1"><strong>CREDIT</strong></td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">Loan Receivable - ' + loan + '</td>' +
                    '<td colspan="1">&#8369;' + loanAmt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td colspan="1">-</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">Loan Interest * ' + loanTerm + ' month/s</td>' +
                    '<td colspan="1">&#8369;' + dii.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td colspan="1">-</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">Deferred Intereset Income</td>' +
                    '<td colspan="1">-</td>' +
                    '<td colspan="1">&#8369;' + dii.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">Retention Fee 3%</td>' +
                    '<td colspan="1">-</td>' +
                    '<td colspan="1">-</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">Service Fee 1%</td>' +
                    '<td colspan="1">-</td>' +
                    '<td colspan="1">&#8369;' + serviceFee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">Outstanding balance of</td>' +
                    '<td colspan="1">-</td>' +
                    '<td colspan="1">-</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2">Cash in bank</td>' +
                    '<td colspan="1">-</td>' +
                    '<td colspan="1">&#8369;' + cashInBank.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                  '</tr>' +
                  '<tr><td colspan="4">-</td></tr>' +
                  '<tr>' +
                    '<td colspan="2">TOTAL</td>' +
                    '<td colspan="1">&#8369;' + totalDebit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td colspan="1">&#8369;' + totalCredit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                  '</tr>' +
                  '<tr>' +
                    '<td colspan="2" class="h5">NET AMOUNT DUE</td>' +
                    '<td colspan="1"></td>' +
                    '<td colspan="1" class="h4"><span class="text-success">&#8369;' + cashInBank.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span></td>' +
                  '</tr>' +
                '</tbody>' +
              '</table>');
            $('#confirmationLoanAppModal').find('.modal-footer').html('<button type="button" class="btn btn-outline-success btn-sm mr-1" id="submitVoucherBtn"><i class="fas fa-check fa-sm mr-1"></i>Submit</button>');

            $('#confirmationLoanAppModal').on('click', '#submitVoucherBtn', function(){
              var apostrophe = "'s";
              var data = '&loanapp_id=' + id + '&dvNo=' + APLid + '&retFee=' + retentionFee + '&serFee=' + serviceFee + '&debit=' + totalDebit +'&credit=' + totalCredit +'&netAmt=' + cashInBank + '&balance=' + totalBalance + '&remarks=' + remarks;
              $.ajax({
                type    : 'ajax',
                method  : 'post',
                url     : '<?php echo base_url() ?>loans/insertLoanVoucher',
                data    : data,
                async   : false,
                dataType: 'json',
                success : function(data){
                  if(data) {
                    $('#confirmationLoanAppModal').modal('hide');
                    $('#loanAppMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + apostrophe + ' loan has started.</a>' +
                                '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                  '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                              '</p>').fadeIn().delay(3000).fadeOut('fast');
                    getApprovedLoans();
                    getActiveLoans();
                  } else {
                    $('#confirmationLoanAppModal').modal('hide');
                    $('#loanAppMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Oops, something went wrong!</a>' +
                                '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                  '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                              '</p>').fadeIn().delay(3000).fadeOut('fast');
                    getApprovedLoans();
                    getActiveLoans();
                  }
                },
                error : function(){
                  alert('ERROR!');
                }
              });
            });
        });



        function checkInputPayslipAmt() {
          if($('#loanAppPayslipAmt').val() == '') {
            $('#loanAppPayslipAmt').addClass('is-invalid');
            $('#loanAppPayslipAmt').attr('placeholder', 'Please input the payslip amount..');
          } else {
            $('#loanAppPayslipAmt').removeClass('is-invalid');
            $('#approveLoanAppBtn').unbind().html('<i class="fas fa-arrow-circle-right"></i> Approve');
          }
        }

        $('#openLoanApp').on('keyup', '#loanAppPayslipAmt', function(){
          checkInputPayslipAmt();
        });

        // Change content of modal when aproving a loan - CC UI
        $('#openLoanApp').on('click', '#approveLoanAppBtn', function(){
          var apostrophe = "'s";
          var id = $('#openLoanApp').attr('selectedid');
          var name = $('#openLoanApp').attr('selectedname');
          var ccUsername = '<?php echo $this->session->userdata('username'); ?>';
          var payslip = $('#loanAppPayslipAmt').val().replace(/\D/g, "");
          var monthlyDeduc = $('input[name=loan_deduc_hidden]').text();
          var thp = payslip - monthlyDeduc;
            if($('#loanAppPayslipAmt').val() != '') {
              $('#loanAppPayslipAmt').removeClass('is-invalid');
              $(this).text('Are you sure?');
              $(this).click(function(){
                $.ajax({
                  type    : 'ajax',
                  method  : 'get',
                  url     : '<?php echo base_url() ?>loan_applications/checkCreditCommiteeApprovals',
                  data    : {id:id},
                  async   : false,
                  dataType: 'json',
                  success : function(data) {
                    // check cc columns are filled - approved
                    var ccCheck;
                    var cc1 = data.cc_approval_1;
                    var cc2 = data.cc_approval_2;
                    var cc3 = data.cc_approval_3;
                    if((cc1 == null) && (cc2 == null) && (cc3 == null)) {
                      ccCheck = 0;
                    } else if(cc1 == null) {
                      ccCheck = 1;
                    } else if(cc2 == null) {
                      ccCheck = 2;
                    } else if(cc3 == null) {
                      ccCheck = 3;
                    } else {
                      ccCheck = 4;
                    }

                    $.ajax({
                      // verifying you accepted a loan app
                      type    : 'ajax',
                      method  : 'get',
                      url     : '<?php echo base_url() ?>administrators/manageLoanApps',
                      data    : {id:id, cc:ccUsername, check:ccCheck, thp:thp},
                      async   : false,
                      dataType: 'json',
                      success : function(data) {
                        if(data == true) {
                          $('#confirmationLoanAppModal').modal('hide');
                          $('#loanAppMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, you approved ' + name + apostrophe + ' application.</a>' +
                                      '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                      '</button>' +
                                    '</p>').fadeIn().delay(3000).fadeOut('fast');
                          getPendingLoans();
                          getApprovedLoans();
                          getDisapprovedLoans();
                        } else {
                          $('#confirmationLoanAppModal').modal('hide');
                          $('#loanAppMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + apostrophe + ' application has been approved.</a>' +
                                      '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                      '</button>' +
                                    '</p>').fadeIn().delay(3000).fadeOut('fast');
                          getPendingLoans();
                          getApprovedLoans();
                          getDisapprovedLoans();
                        }
                      },
                      error: function() {
                        alert('Error!');
                      }
                    });
                  },
                  error: function() {
                    alert('Error!');
                  }
                });
                $('#openLoanApp').modal('hide');
              });
            } else {
              $('#loanAppPayslipAmt').addClass('is-invalid');
              $('#loanAppPayslipAmt').attr('placeholder', 'Please input the payslip amount..');
            }
        });

        // Back button in loan application approve conf
        $('#confirmationLoanAppModal').on('click', '#confirmationLoanAppBackBtn', function(){
          $('#confirmationLoanAppModal').modal('hide');
          $('#openLoanApp').modal('show');
        });

        // cancel loan app
        $('#openLoanApp').on('click', '#cancelLoanAppBtn', function(){
          var name = $('#openLoanApp').attr('selectedname');
          var apostrophe = "'s";
          $('#openLoanApp').modal('hide');
          $('#confirmationLoanAppModal').modal('show');
          $('#confirmationLoanAppModal').find('.modal-title').html('<p id="loanAppBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p>Cancellation');
          $('#confirmationLoanAppModal').find('.modal-body').html('<div id="disapprovedRequirements">' +
                                                                  "<a class='mb-2'>You're about to cancel <strong>" + name + apostrophe + "</strong> application. Please note all the missed requirements below.</a>" +
                                                                  '<hr>' +
                                                                  '<div class="form-group">' +
                                                                    '<label for="exampleFormControlTextarea1">Note:</label>' +
                                                                    '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>' +
                                                                  '</div>' +
                                                                  '</div>');
          $('#confirmationLoanAppModal').find('.modal-footer').html('<button type="button" class="btn btn-danger btn-sm mr-1" id="cancelLoanAppBtn"><i class="fas fa-check fa-sm mr-1"></i>  I am sure</button>');
        });  

        // cancel loan app confirm
        $('#confirmationLoanAppModal').on('click', '#cancelLoanAppBtn', function(){
          var id = $('#openLoanApp').attr('selectedid');
          var apostrophe = "'s";
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>administrators/cancelLoanApp',
            data    : {id:id},
            async   : false,
            dataType: 'json',
            success : function(data) {
              $('#confirmationLoanAppModal').modal('hide');
              $('#loanAppMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + data.name + apostrophe + ' application has been cancelled.</a>' +
                          '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                          '</button>' +
                        '</p>').fadeIn().delay(3000).fadeOut('fast'); 
            },
            error: function() {
              alert('Error!');
            }
          });
        });

        // Back button in loan cancellation
        $('#confirmationLoanAppModal').on('click', '#loanAppBackBtn', function(){
          $('#confirmationLoanAppModal').modal('hide');
          $('#openLoanApp').modal('show');
        }); 

        function checkInputChequeNo() {
          var respo = '';
          if($('#chequeNumberInput').val() == '') {
            $('#chequeNumberInput').addClass('is-invalid');
            $('#chequeNumberInput').attr('placeholder', 'Please enter cheque number..');
          } else {
            $('#chequeNumberInput').removeClass('is-invalid');
            $('#chequeLoanAppBtn').unbind().html('<i class="fas fa-arrow-circle-right fa-sm mr-1"></i> Submit cheque');
          }
        }

        $('#openLoanApp').on('keyup', '#chequeNumberInput', function(){
          checkInputChequeNo();
        });

        $('#openLoanApp').on('click', '#chequeLoanAppBtn', function(){
          if($('#chequeNumberInput').val() != '') {
            var id = $('#openLoanApp').attr('selectedid');
            var name = $('#openLoanApp').attr('selectedname');
            var cheque = $('#chequeNumberInput').val();
            var apostrophe = "'s";

            alert(cheque);
            $(this).text('Are you sure?');
            $(this).click(function(){
              $.ajax({
                type    : 'ajax',
                method  : 'get',
                url     : '<?php echo base_url() ?>loan_applications/insertChequeNo',
                data    : {id:id, cheque_no:cheque},
                async   : false,
                dataType: 'json',
                success : function(data) {
                  $('#openLoanApp').modal('hide');
                  $('#loanAppMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + apostrophe + ' cheque has been issued.</a>' +
                              '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                              '</button>' +
                            '</p>').fadeIn().delay(3000).fadeOut('fast'); 
                  getApprovedLoans();
                  getDisapprovedLoans();
                  getPendingLoans();
                },
                error: function() {
                  alert('Error!');
                }
              });
            });
          } else {
            $('#chequeNumberInput').addClass('is-invalid');
            $('#chequeNumberInput').attr('placeholder', 'Please enter cheque number..');
          }
        });
        // Loan related scripts

        // Forms input validations (loans, members)
        $('input[name=loan_interest]').keyup(function(){
          $(this).val(function(index, value) {
            return value
              .replace(/\B(?=(\d{2})+(?!\d))/g, ".")
              ;
            });
          });
        $('input[name=loan_max_amt]').keyup(function(){
          $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
          });
        });
        $('input[name=subscribeShare]').keyup(function(){
          $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
          });
        });
        $('input[name=sharecap]').keyup(function(){
          $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
          });
        });
        $('input[name=startingShareCap]').keyup(function(){
          $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
          });
        });
        $('#openLoanApp').on('keyup', 'input[name=loanAppPayslipAmt]', function(){
          $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
          });
        });

        // Add member
        $('#adduser-perm2').click(function() {
          $.ajax({ 
            type    : 'ajax',
            url     : '<?php echo base_url() ?>administrators/retrieveCommitteeInstances',
            async   : false,
            dataType: 'json',
            success: function(data) {
              if(data == false) {
                $('option[value=3]').remove();
              }
            }, 
            error: function() { 
              alert('A database error occured!');
            }
          });
          $('#addMemberModal').modal('show');
          $('#addMemberForm').attr('action', '<?php echo base_url() ?>administrators/add_member');
        });

        $('#add-user').click(function() {
          var url = $('#addMemberForm').attr('action');
          var data = $('#addMemberForm').serialize();
          // Add member form validation
          var apostrophe = "'s";
          var fname = $('input[name=Fname]');
          var mname = $('input[name=Mname]');
          var lname = $('input[name=Lname]');
          var username = $('input[name=Uname]');
          var email = $('input[name=email]');
          var phone = $('input[name=phone]');
          var college = $('input[id=college-selectized]');
          var password = $('input[name=password]');
          var password2 = $('input[name=password2]');
          var city = $('input[name=city]');
          var zip = $('input[name=zip]');
          var position = $('select[name=position]');
          var birthday = $('input[id=birthday]');
          var sharecap = $('input[name=sharecap]');
          var startingShareCap = $('input[name=startingShareCap]');
          var membershipDate = $('input[id=membershipDate]');
          var subscribeShare = $('input[id=subscribeShare]');
          var orno = $('input[id=orNum]');
          var result = '';

          if(fname.val() == ''){
            fname.addClass('is-invalid');
            $('#invalidFname').html('Please fill out this field.');
          } else {
            fname.removeClass('is-invalid');
            $('#invalidFname').html('');
            result += '1';
          }
          if(mname.val() == ''){
            mname.addClass('is-invalid');
            $('#invalidMname').html('Please fill out this field.');
          } else {
            mname.removeClass('is-invalid');
            $('#invalidMname').html('');
            result += '2';
          }
          if(lname.val() == ''){
            lname.addClass('is-invalid');
            $('#invalidLname').html('Please fill out this field.');
          } else {
            lname.removeClass('is-invalid');
            $('#invalidLname').html('');
            result += '3';
          }
          if(username.val() == ''){
            username.addClass('is-invalid');
            $('#invalidUname').html('Please fill out this field.');
          } else {
            username.removeClass('is-invalid');
            $('#invalidUname').html('');
            result += '4';
          }
          if(email.val() == ''){
            email.addClass('is-invalid');
            $('#invalidEmail').html('Please fill out this field.');
          } else {
            email.removeClass('is-invalid');
            $('#invalidEmail').html('');
            result += '5';
          }
          if(password.val() != password2.val()) {
            password.addClass('is-invalid');
            password2.addClass('is-invalid');
            $('#invalidPass').html('Password do not match!');
            $('#invalidPass2').html('Password do not match!');
          } else {
            password.removeClass('is-invalid');
            password2.removeClass('is-invalid');
            $('#invalidPass').html('Password match!');
            $('#invalidPass2').html('Password match!');
            result += '6';
          }
          if(city.val() == ''){
            city.addClass('is-invalid');
            $('#invalidCity').html('Please fill out this field.');
          } else {
            city.removeClass('is-invalid');
            $('#invalidCity').html('');
            result += '7';
          }
          if(zip.val() == ''){
            zip.addClass('is-invalid');
            $('#invalidZip').html('Please fill out this field.');
          } else {
            zip.removeClass('is-invalid');
            $('#invalidZip').html('');
            result += '8';
          }
          if(position.val() == 'Select Role..'){
            position.addClass('is-invalid');
            $('#invalidPos').html('Please fill out this field.');
          } else {
            position.removeClass('is-invalid');
            $('#invalidPos').html('');
            result += '9';
          }
          if(birthday.val() == ''){
            birthday.addClass('is-invalid');
            $('#invalidBday').html('Please fill out this field.');
          } else {
            birthday.removeClass('is-invalid');
            $('#invalidBday').html('');
            result += '10';
          }
          if(phone.val() == ''){
            phone.addClass('is-invalid');
            $('#invalidPhone').html('Please fill out this field.');
          } else {
            phone.removeClass('is-invalid');
            $('#invalidPhone').html('');
            result += '11';
          }
          if(membershipDate.val() == ''){
            membershipDate.addClass('is-invalid');
            $('#invalidMembership').html('Please fill out this field.');
          } else {
            membershipDate.removeClass('is-invalid');
            $('#invalidMembership').html('');
            result += '12';
          }
          if(sharecap.val() == ''){
            sharecap.addClass('is-invalid');
            $('#invalidShareCapital').html('Please fill out this field.');
          } else {
            sharecap.removeClass('is-invalid');
            $('#invalidShareCapital').html('');
            result += '13';
          }
          if(startingShareCap.val() == ''){
            startingShareCap.addClass('is-invalid');
            $('#invalidStarting').html('Please fill out this field.');
          } else {
            startingShareCap.removeClass('is-invalid');
            $('#invalidStarting').html('');
            result += '14';
          }
          if(subscribeShare.val() == ''){
            subscribeShare.addClass('is-invalid');
            $('#invalidSubscribeShare').html('Please fill out this field.');
          } else {
            subscribeShare.removeClass('is-invalid');
            $('#invalidSubscribeShare').html('');
            result += '15';
          }
          if(orno.val() == ''){
            orno.addClass('is-invalid');
            $('#invalidOR').html('Please fill out this field.');
          } else {
            orno.removeClass('is-invalid');
            $('#invalidOR').html('');
            result += '16';
          }

          if(result == '12345678910111213141516') {
            var name = fname.val()+' '+mname.val()+' '+lname.val();
            var filteredShareCap = sharecap.val().replace(/\D/g, "");
            var filteredStarting = startingShareCap.val().replace(/\D/g, "");
            // Add member ajax call
            $.ajax({ 
              type    : 'ajax',
              method  : 'post',
              url     : url,
              data    : data + '&name=' + name + '&sharecap=' + filteredShareCap + '&startingShareCap=' + filteredStarting, 
              async   : false,
              dataType: 'json',
              success: function(response) {
                if(response.success) {
                  $('#addMemberModal').modal('hide');
                  $('#addMemberForm')[0].reset();
                  $('#addMemberMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + apostrophe + ' account has been created.</a>' +
                                            '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                              '<span aria-hidden="true">&times;</span>' +
                                            '</button>' +
                                          '</p>').fadeIn();  
                  search_user();
                  getMember_latest_date();
                  refreshShareCapRec();
                  $('#membersTab .card-body').animate({scrollTop: 0}, 'fast');
                  $('#dashboardTotalMembers').load(location.href + " #dashboardTotalMembers");
                } else {
                  alert('Error');
                }
              }, 
              error: function() { 
                alert('A database error occured!');
              }
            });
          } 
        });

          // View profile
          // Delete Member
          $('#returnMemberList').on('click', '.viewuser-perm4', function() {
            var apostrophe = "'s";
            var id = $(this).attr('user-id');
            var name = $(this).attr('user-name');
            var email = $(this).attr('user-email');
            var address = $(this).attr('user-address');
            var position = $(this).attr('user-position');
            var sharecap = $(this).attr('user-sharecap');
            var college = $(this).attr('user-college');
            var img = $(this).attr('user-img');
            var since = new Date($(this).attr('since'));
            $('#viewProfileModal').find('#userSharecap').attr('userID', id);
            $('#viewProfileModal').find('#userName').text(name);
            $('#viewProfileModal').find('#userPosition').text(position + ' / Member since ' + since.toLocaleDateString("en-US"));
            $('#viewProfileModal').find('#userCollege').text(college);
            $('#viewProfileModal').find('#userAddress').text(address);
            $('#viewProfileModal').find('#userSharecap').html('Total Share Capital: <strong>&#8369;'+ Math.round(sharecap).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</strong>');
            $('#viewProfileModal').find('#viewProfileImg').attr('src', '<?php echo base_url(); ?>assets/img/profile_img/' + img +'');
            $('#viewProfileModal').modal('show');
            $('#delete-user').click(function() {
              $('#viewProfileModal').modal('hide');
              $('#deleteModal').modal('show');
              $('#deleteModal').find('.modal-title').text('Delete user account');
              $('#deleteModal').find('.modal-body').html("<p>Are you sure you want to remove <strong>" + name + "</strong>'s account? Deleting this account will also delete all records of the member in this system.<br><br><h6 class='text-danger'>This cannot be undone.</h6></p>");
              $('#deleteRecordBtn').unbind().click(function() {
                $.ajax({
                  type    : 'ajax',
                  method  : 'get',
                  async   : false,
                  url     : '<?php echo base_url() ?>administrators/delete_user',
                  data    : {id:id},
                  dataType: 'json',
                  success: function(response) {
                    if(response.success) {
                      $('#deleteModal').modal('hide');
                      $('#viewProfileModal').modal('hide');
                      $('#addMemberMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + apostrophe + ' account has been deleted.</a>' +
                                                '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                                  '<span aria-hidden="true">&times;</span>' +
                                                '</button>' +
                                              '</p>').fadeIn();  
                      search_user();
                      $('#membersTab .card-body').animate({scrollTop: 0}, 'fast');
                    } else {
                      alert('Error!');
                    }
                  },
                  error: function() {
                    alert('A database error occured!');
                  }
                });
              });
              $('#cancelDeleteRecordBtn').click(function() {
                $('#viewProfileModal').modal('show');
              });
            });
          });

        // Wait for user search input..
        $('#searchMember').keyup(function() {
          memberDataTbl.search( this.value ).draw();
        });

        // Search members 
        function search_user() {
          $("#memberListTbl").DataTable().destroy();
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>administrators/search_user',
            async   : false,
            dataType: 'json',
            success: function(data) {
              var row = '';
              var col = '';
              var i;
              if(data.length > 0) {
              for(i = 0; i < data.length; i++) {
                var last_login = '';
                if(data[i].last_login == '0000-00-00 00:00:00') {
                  last_login = 'New user';
                } else {
                  last_login = new Date(data[i].last_login);
                  last_login = last_login.toLocaleDateString("en-US");
                }
                switch(data[i].college) {
                  case 'College of Science':
                    col = 'COS';
                    break;
                  case 'College of Liberal Arts':
                    col = 'CLA';
                    break;
                  case 'College of Industrial Technology':
                    col = 'CIE';
                    break;
                  case 'College of Engineering':
                    col = 'COE';
                    break;
                  case 'College of Architecture and Fine Arts':
                    col = 'CAFA';
                    break;
                  case 'College of Industrial Education':
                    col = 'CIE';
                    break;
                  default: 
                    col = data[i].college; 
                }
                row +=  '<tr class="text-secondary">' +
                          '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].name + '</span></td>' +
                          '<td style="vertical-align: middle">' + col + '</td>' +
                          '<td style="vertical-align: middle">' + data[i].role_name + '</td>' +
                          '<td style="vertical-align: middle"><span style="display: none">' + data[i].register_date +'</span>'+last_login + '</td>' +
                          '<td style="vertical-align: middle"><button href="javascript:;" class="btn btn-outline-success btn-sm viewuser-perm4" user-id="' + data[i].user_id + '" user-name="' + data[i].name + '" user-position ="' + data[i].role_name + '" user-college="' + data[i].college + '" user-address="' + data[i].address + '" user-img="' + data[i].user_img + '" user-sharecap="' + data[i].total_share_capital + '" since="'+ data[i].register_date +'">More info</button></td>' +
                        '</tr>'; 
              }  
              $('#returnMemberList').html(row);
            } else {
              row  =  '<div class="ml-4">' +
                      '<h4 class="mt-5"><strong class="text-danger">No results for ' + query + '</h4>' +
                      '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">The name you entered did not bring up any results.</h7>' +
                      '</div>';
            }
              $('#returnMemberList').html(row);
            },
            error: function() {
              alert('A database error occured!');
            }
          });

          var memberDataTbl = $('#memberListTbl').DataTable({
          "dom": 'lBfrtip',
          "order": [[ 3, "desc" ]],
          buttons: [
            {
            extend: 'pdf',
            text: 'Export PDF'
            },
            {
            extend: 'excel',
            text: 'Export Excel'
            },
            {
            extend: 'print',
            text: 'Print table',
            exportOptions: {
              columns: [0, 1, 2, 3]
            }
            },
          ],
          "pagingType": "simple_numbers",
          "language": { search: "", searchPlaceholder: "Search user.." },
          "columnDefs": [
            { "orderable": false, "targets": 4 }
          ]
        });

        $('#memberListTbl_info').addClass('text-muted font-italic');
        }

        // Wait for user search input..
        $('#searchLoan').keyup(function() {
          var input = $(this).val();
          if(input != '') {
            searchLoan(input);
          } else {
            searchLoan();
          }
        });

        // Search loans 
        function searchLoan(query) {
          $.ajax({
            type    : 'ajax',
            method  : 'post',
            url     : '<?php echo base_url() ?>administrators/searchLoan',
            async   : false,
            data    : {query : query},
            dataType: 'json',
            success: function(data) {
              var card = '';
              var i;
              if(data.length > 0) {
              for(i = 0; i < data.length; i++) {
                var max_amt = data[i].loan_max_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
                card += '<div class="col-sm-12 col-md-12 col-lg-4 mb-3">' + 
                            '<div class="card shadow-sm rounded">' +
                              '<h6 class="card-header">' + data[i].loan_name + '</h6>' +
                              '<div class="card-body">' +
                                '<p class="card-text small">Interest: <span class="text-secondary float-right">' + data[i].loan_interest + '&#37</span></p>' +
                                '<p class="card-text small">Maximum Term: <span class="text-secondary float-right">' + data[i].loan_max_term + ' month/s</span></p>' + 
                                '<p class="card-text small">Maximum Amount: <span class="text-secondary float-right">&#8369;' + max_amt + '</span></p>' +
                                '<p class="card-text smaller text-left"><em>' + data[i].loan_description + '</em></p>' +
                              '</div>' + 
                              '<div class="card-footer" style="min-height: 40px">' + 
                                '<button href="javascript:;" class="btn btn-green btn-sm float-right archive-loan" id="archiveLoan" data="' + data[i].id + '" loanType="' + data[i].loan_name + '"><i class="fas fa-archive mr-2"></i>Archive</button>' +
                                '<button href="javascript:;" class="btn btn-green strong btn-sm float-right mr-1 edit-loan" data="' + data[i].id + '"><i class="fas fa-cog mr-2"></i>Edit</button>' + 
                              '</div>' + 
                            '</div>' + 
                          '</div>';
              }
              $('#returnLoans').html(card);
            } else {
              card  =  '<div class="ml-5">' +
                      '<h4 class="mt-5"><strong class="text-danger">No results for ' + query + '</h4>' +
                      '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">The loan name you entered did not bring up any results.</h7>' +
                      '</div>';
            }
              $('#returnLoans').html(card);
            },
            error: function() {
              alert('A database error occured!');
            }
          });
          var role = '<?php echo $this->session->userdata('roleID'); ?>';
                switch(role){
                  case '3':
                  $('.edit-loan').show();
                  $('#viewuser-perm4, #returnMemberLatestDate').show();
                  $('#loanRecordsText, #loanRecordsTabText').show();
                  break;
                  case '4':
                  $('#returnLatestDate').show();
                  $('#view-ledgers').show();
                  break;
                  case '5':
                  $('#loanRecordsText, #loanRecordsTabText').show();
                  $('#view-ledgers, #update-ledgers, #update-share-capitals').show();
                  break;
                  case '6':
                  $('#add-loan, .edit-loan, .archive-loan').show();
                  $('#adduser-perm2, #viewuser-perm4').show();
                  $('#loanRecordsText, #loanRecordsTabText, #comakersText, #comakersTabText').show();
                  break;
                }
        }

        // Retrieve latest date
        function getMember_latest_date() {
          $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>/administrators/getMember_latest_date',
            async: false,
            dataType: 'json',
            success: function(data) {
              var latestDate = '<p class="card-text small text-muted float-left mt-2"><em>Last register: ' + data[0].register_date + '</em></p>';
              $('#returnMemberLatestDate').html(latestDate);
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        }

        function showLoanDeductions(){
          $.ajax({ 
            type    : 'ajax',
            url     : '<?php echo base_url() ?>loans/showLoanDeductions',
            async   : false,
            dataType: 'json',
            success: function(data) {
              var choice = '', php, perc;
              if(data.length) {
                for(var i = 0; i < data.length; i++){
                  if(data[i].deduc_type == 'percentage'){
                    php = '';
                    perc = '%';
                  } else {
                    php = '&#8369;';
                    perc = '';
                  }
                  choice += '<div class="form-check">' +
                              '<input class="form-check-input small" type="checkbox" value="'+data[i].deduc_val+'" id="'+data[i].deduc_id+'">' +
                              '<label class="form-check-label small" for="'+data[i].deduc_id+'">'+data[i].deduc_name+' ('+php+data[i].deduc_val+perc+')</label>' +
                            '</div>';
                }
                $('#selectLoanDeductions').html(choice);
              } else {
                $('#selectLoanDeductions').html('<p class="mt-2 text-warning">No loan deductions found!</p>');
              }
            }, 
            error: function() { 
              alert('A database error occured!');
            }
          });
        }

        showLoanDeductions();

        // Add Loan Function
        $('#add-loan').click(function() {
          $('#selectLoanDeductions input[type=checkbox]').attr('checked', false);
          $('#addLoanModal').modal('show');
          $('#addLoanForm')[0].reset();
          $('input[name=loan_name]').prop('disabled', false);
          $('#addLoanModal').find('.modal-title').text('Add Loan Type');
          $('#addLoanForm').attr('action', '<?php echo base_url() ?>loans/addLoan');
        });

        // Save Loan Function
        $('#saveLoan').click(function() {
          var checked = [];
          $.each($('#selectLoanDeductions input[type="checkbox"]:checked'), function(){
            checked.push($(this).attr('id'));
          });
          var url = $('#addLoanForm').attr('action');
          var data = $('#addLoanForm').serialize();
          // Form validation
          var name = $('input[name=loan_name]');
          var amount = $('input[name=loan_max_amt]');
          var term = $('input[name=loan_max_term]');
          var interest = $('input[name=loan_interest]');
          var description = $('textarea[name=loan_desc]');
          var result = '';

          if(name.val() == '') {
            name.addClass('is-invalid');
            $('#invalidName').html('Please fill out this field.');
          } else {
            name.removeClass('is-invalid');
            $('#invalidName').html('');
            result += '1';
          } 
          if(amount.val() == '') {
            amount.addClass('is-invalid');
            $('#invalidAmt').html('Please fill out this field.');
          } else {
            amount.removeClass('is-invalid');
            $('#invalidAmt').html('');
            result += '2';
          } 
          if(term.val() == '') {
            term.addClass('is-invalid');
            $('#invalidTerm').html('Please fill out this field.');
          } else {
            term.removeClass('is-invalid');
            $('#invalidTerm').html('');
            result += '3';
          } 
          if(interest.val() == '') {
            interest.addClass('is-invalid');
            $('#invalidInterest').html('Please fill out this field.');
          } else {
            interest.removeClass('is-invalid');
            $('#invalidInterest').html('');
            result += '4';
          }
          if(description.val() == '') {
            description.addClass('is-invalid');
            $('#invalidDescription').html('Please fill out this field.');
          } else {
            description.removeClass('is-invalid');
            $('#invalidDescription').html('');
            result += '5';
          }

          if(result == '12345') {
            var filteredAmt = amount.val().replace(/\D/g, "");
            $.ajax({ 
            type    : 'ajax',
            method  : 'post',
            url     : url,
            data    : data + '&filteredAmt=' + filteredAmt + '&deductions=' + JSON.stringify(checked),
            async   : false,
            dataType: 'json',
            success: function(response) {
              var name = $('input[name=loan_name]').val();
              if(response.success) {
                $('#addLoanModal').modal('hide').fadeOut(); 
                $('#addLoanForm')[0].reset();
                if(response.type == 'add') {
                  var type = 'added';
                  var color = 'success';
                } else if(response.type == 'update') {
                  var type = 'updated';
                  var color = 'primary';
                }
                $('#addLoanMsg').html('<p class="alert bg-'+color+' alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + ' has been ' + type + '.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn(); 
                searchLoan();
                refreshCollections();
                get_latest_date();
                $('#loansTab .card-body').animate({scrollTop: 0}, 'fast');
              } else {
                alert('You did not made any changes! Please close it properly.');
              }
            }, 
            error: function() { 
              alert('A database error occured!');
            }
          });
        }

        // Function to remove all invalid validations in the form when modal is closed
        $(document).on("hidden.bs.modal", '#addLoanModal', function() {
          name.removeClass('is-invalid');
          $('#invalidName').html('');
          amount.removeClass('is-invalid');
          $('#invalidAmt').html('');
          term.removeClass('is-invalid');
          $('#invalidTerm').html('');
          interest.removeClass('is-invalid');
          $('#invalidInterest').html('');
        });
      });

        // Edit Loans
        $('#returnLoans').on('click', '.edit-loan', function() {
          var id = $(this).attr('data');
          $('#addLoanModal').modal('show');
          $('#addLoanModal').find('.modal-title').text('Edit Loan');
          $('#addLoanModal').find('.btn-success').text('Save changes');
          $('#addLoanForm').attr('action', '<?php echo base_url() ?>loans/updateLoan');
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>loans/editLoan',
            data    : {id:id},
            async   : false,
            dataType: 'json',
            success : function(data) {
              $('#selectLoanDeductions input[type=checkbox]').attr('checked', false);
              if(data.length){
                for(var i = 0; i < data.length; i++){
                  $('#selectLoanDeductions input[id='+data[i].loan_deduc+']').attr('checked', true);
                }
                $('input[name=loan_name]').val(data[0].loan_name);
                $('input[name=loan_max_amt]').val(data[0].loan_max_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('input[name=loan_max_term]').val(data[0].loan_max_term);
                $('input[name=loan_interest]').val(data[0].loan_interest);
                $('textarea[name=loan_desc]').val(data[0].loan_description);
                $('input[name=loan_id').val(data[0].id);
                $('#addLoanModal').find('.modal-title').text('Edit Loan (' + data[0].loan_name + ')');
              } 
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        });

        // Archive Loan
        $('#returnLoans').on('click', '.archive-loan', function() {
          var id = $(this).attr('data');
          var name = $(this).attr('loanType');
          $('#deleteModal').modal('show');
          $('#deleteModal').find('.modal-title').text('Archive (' + name + ')');
          $('#deleteModal').find('.modal-body').text('Are you sure you want to archive this loan?');
          $('#deleteRecordBtn').unbind().click(function() {
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              async   : false,
              url     : '<?php echo base_url() ?>loans/archiveLoan',
              data    : {id:id},
              dataType: 'json',
              success: function(response) {
                if(response.success) {
                  $('#deleteModal').modal('hide');
                  $('#addLoanMsg').html('<p class="alert bg-info alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + ' has been archived.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn();  
                  searchLoan();
                  $('#loansTab .card-body').animate({scrollTop: 0}, 'fast');
                } else {
                  alert('Error!');
                }
              },
              error: function() {
                alert('A database error occured!');
              }
            });
          });
        });

        // Add loan deduc validations
        var name = $('#deducName');
        var type = $('#deducType');
        var val = $('#deducVal');
        name.keyup(function(){
          if(name.val() == ''){
            val.val('');
            type.val('Select type..');
            type.prop('disabled', true);
            val.prop('disabled', true);
            $('#deducValPrepend').html('');
          } else {
            type.prop('disabled', false);
          }
        });

        type.change(function(){
          val.val('');
          val.prop('disabled', false);
          if(type.val() == 'percentage'){
            $('#deducValPrepend').html('<div class="input-group-text text-muted">%</div>');
            $('#deducVal').attr({onkeypress: 'return event.charCode >= 48 && event.charCode <= 57', maxlength: '4'});
          } else if(type.val() == 'amount') {
            $('#deducValPrepend').html('<div class="input-group-text text-muted">&#8369;</div>');
            $('#deducVal').attr('maxlength', '5');
          }
        });

        val.keyup(function(){
          if($(this).attr('maxlength') == '4'){
            $(this).val(function(index, value) {
              return value
              .replace(/\B(?=(\d{2})+(?!\d))/g, ".")
              ;
            });
          } else {
            $(this).val(function(index, value) {
              return value
              .replace(/\D/g, "")
              .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
              ;
            });
          }
        });

        // Add loan deduc
        $('#addLoanDeduction').click(function(){
          val.val('');
          type.val('Select type..');
          type.prop('disabled', true);
          val.prop('disabled', true);
          $('#deducValPrepend').html('');
          $('#addLoanDeducForm').show();
          $('#addLoanDeduction').hide();
          $('.modal-body').animate({scrollTop: $(document).height()}, "slow");
        });

        $('#loanDeductionModal').on('click', '#saveLoanDeduc', function(){
          var count = '';
          var name = $('input[name=deducName]');
          var type = $('select[name=deducType]');
          var val = $('input[name=deducVal]');
          var filteredAmt = val.val().replace(/\D/g, "");
          var deducData = $('#addLoanDeducForm').serialize();
          if(name.val() == ''){
            name.addClass('is-invalid');
            $('#invalidDeducName').text('Please fill out this field.');
          } else {
            name.removeClass('is-invalid');
            $('#invalidDeducName').text('');
            count += '1';
          } if(type.val() == 'Select type..'){
            type.addClass('is-invalid');
            $('#invalidDeducType').text('Please fill out this field.');
          } else {
            type.removeClass('is-invalid');
            $('#invalidDeducType').text('');
            count += '2';
          } if(val.val() == ''){
            val.addClass('is-invalid');
            $('#invalidDeducVal').text('Please fill out this field.');
          } else {
            val.removeClass('is-invalid');
            $('#invalidDeducVal').text('');
            count += '3';
          }

          if(count == '123'){
            $.ajax({
              type    : 'ajax',
              method  : 'post',
              url     : '<?php echo base_url() ?>loans/addLoanDeductions',
              data    : deducData + '&filteredAmt=' + filteredAmt,
              async   : false,
              dataType: 'json',
              success: function(data) {
                if(data == true) {
                  showLoanDeduc();
                  $('#addLoanDeduction').show();
                  $('#addLoanDeducForm').hide();
                  $('#addLoanDeducForm')[0].reset();
                  $('.modal-body').animate({scrollTop: 0}, 'fast');
                  $('#returnEmptyDeduc').html('');
                  $('#addLoanDeducMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, new loan deduction has been added.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>').fadeIn();
                } else {
                  $('#returnEmptyDeduc').html('<h4 class="mt-3"><strong class="text-danger">No loan deductions.</strong></h4>');
                }
              },
              error: function() {
                alert('A database error occured!');
              }
            });
          }
          showLoanDeductions();
        });

        /*// Edit loan deduc
        $('#returnLoanDeductions').on('click', '#editLoanDeduc', function(){
          var identify = $(this).attr('data');
          $(this).removeClass('btn-success').addClass('btn-primary').attr('id', 'updateLoanDeduc').text('Update');
          $('#returnLoanDeductions').find('.'+identify).attr('contenteditable', true).css('background-color', 'rgba(179,255,179,0.5)');
        });

        $('#returnLoanDeductions').on('click', '#updateLoanDeduc', function(){
          var id = $(this).attr('data');
          var name = ($('#addLoanDeducTbl .'+$(this).attr('data'))[0].innerHTML);
          var type = ($('#addLoanDeducTbl .'+$(this).attr('data'))[1].innerHTML);
          var val = ($('#addLoanDeducTbl .'+$(this).attr('data'))[2].innerHTML);
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>loans/updateLoanDeductions',
            data    : {id: id, name: name, type: type, val: val},
            async   : false,
            dataType: 'json',
            success: function(data) {
              if(data == true) {
                showLoanDeduc();
                $('.modal-body').animate({scrollTop: 0}, 'fast');
                $('#addLoanDeducMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, loan deduction has been updated.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>').fadeIn();
              } else {
                $('#addLoanDeducMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Someting happened. Please try again later.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>').fadeIn();
              }
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        });*/

        $('#returnLoanDeductions').on('click', '#deleteLoanDeduc', function(){
          $(this).text('Sure?');
          $(this).click(function(){
            var id = $(this).attr('data');
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              url     : '<?php echo base_url() ?>loans/deleteLoanDeductions',
              data    : {id: id},
              async   : false,
              dataType: 'json',
              success: function(data) {
                if(data == true) {
                  showLoanDeduc();
                  $('.modal-body').animate({scrollTop: 0}, 'fast');
                  $('#addLoanDeducMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, loan deduction has been deleted.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>').fadeIn();
                } else {
                  showLoanDeduc();
                }
              },
              error: function() {
                alert('A database error occured!');
              }
            });
            showLoanDeductions();
          });
        });

        // Loan deductions
        $('#loans-deduction').click(function(){
          $('#addLoanDeducForm').hide();
          $('#addLoanDeduction').show();
          $('#loanDeductionModal').modal('show');
          $('#addLoanDeducForm')[0].reset();
          showLoanDeduc();
        });

        function showLoanDeduc(){
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>loans/showLoanDeductions',
            async   : false,
            dataType: 'json',
            success: function(data) {
              if(data.length) {
                var row = '';
                var php = '';
                var perc = '';
                for(var i = 0; i < data.length; i++) {
                  if(data[i].deduc_type == 'percentage'){
                    php = '';
                    perc = '%';
                  } else {
                    php = '&#8369;';
                    perc = '';
                  }
                  var c = i+1;
                  var myDate = new Date(Date.parse(data[i].date_added.replace('-','/','g')));
                  myDate = myDate.toUTCString();
                  myDate = myDate.split(' ').slice(0, 4).join(' ');
                  var val = data[i].deduc_val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
                  row += '<tr>' +
                            '<td>' + c + '</th>' +
                            '<td class="'+data[i].deduc_id+'">' + data[i].deduc_name + '</td>' +
                            '<td class="'+data[i].deduc_id+'">' + data[i].deduc_type + '</td>' +
                            '<td class="'+data[i].deduc_id+'">' + php + data[i].deduc_val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + perc + '</td>' +
                            '<td>' + myDate + '</td>' +
                            '<td><button id="deleteLoanDeduc" data="'+data[i].deduc_id+'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>' +
                          '</tr>';
                }  
                $('#returnLoanDeductions').html(row);
              } else {
                $('#returnLoanDeductions').html('');
                $('#returnEmptyDeduc').html('<h4 class="mt-3 mb-5"><strong class="text-danger">No loan deductions.</strong></h4>');
              }
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        }

        // Show archived loans 
        $('#loans-archive').click(function(){
          $('#loanArchiveModal').modal('show');
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>loans/showLoansArchive',
            async   : false,
            dataType: 'json',
            success: function(data) {
              if(data) {
                var card = '';
                for(var i = 0; i < data.length; i++) {
                  var myDate = new Date(Date.parse(data[i].date_updated.replace('-','/','g')));
                  myDate = myDate.toUTCString();
                  myDate = myDate.split(' ').slice(0, 4).join(' ');
                  var max_amt = data[i].loan_max_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
                  card += '<div class="col-sm-12 col-md-12 col-lg-6 mb-3">' + 
                              '<div class="card shadow-sm rounded">' +
                                '<h6 class="card-header">' + data[i].loan_name + '</h6>' +
                                '<div class="card-body">' +
                                  '<p class="card-text small">Interest: <span class="text-secondary float-right">' + data[i].loan_interest + '&#37</span></p>' +
                                  '<p class="card-text small">Maximum Term: <span class="text-secondary float-right">' + data[i].loan_max_term + ' month/s</span></p>' + 
                                  '<p class="card-text small">Maximum Amount: <span class="text-secondary float-right">&#8369;' + max_amt + '</span></p>' +
                                  '<p class="card-text smaller text-left"><em>' + data[i].loan_description + '</em></p>' +
                                  '<p class="card-text text-secondary small">Archived on: <span class="text-secondary float-right"><?php echo date('m-d-Y'); ?></span></p>' +
                                '</div>' + 
                                '<div class="card-footer" style="min-height: 40px">' + 
                                  '<button href="javascript:;" class="btn btn-outline-danger btn-sm float-right delete-loan" id="delete-loan" data="' + data[i].id + '" loanType="' + data[i].loan_name + '"><i class="fas fa-trash mx-1"></i></button>' + 
                                  '<button href="javascript:;" class="btn btn-outline-primary btn-sm float-right mr-1" id="unarchiveLoan" data="' + data[i].id + '" loanType="' + data[i].loan_name + '"><i class="fas fa-archive mr-1"></i>Unarchive</button>' +
                                '</div>' + 
                              '</div>' + 
                            '</div>';
                }  
                $('#returnLoanArchive').html(card);
              } else {
                $('#returnLoanArchive').html('<div class="ml-5 mb-5">' +
                                                '<h4 class="mt-3"><strong class="text-danger">No loans archived</h4>' +
                                                '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">Tip: Deleting an archived loan will delete it permanently.</h7>' +
                                              '</div>');
              }
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        });

        // Unarchive loan
        $('#returnLoanArchive').on('click', '#unarchiveLoan', function(){
          $(this).text('Are you sure?');
          $(this).click(function(){
            var id = $(this).attr('data');
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              async   : false,
              url     : '<?php echo base_url() ?>loans/unarchiveLoan',
              data    : {id:id},
              dataType: 'json',
              success: function(data) {
                if(data) {
                  $('#unarchiveLoanMsg').html('<p class="alert bg-info alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + data.loan_name + ' has been unarchived.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn();  
                  searchLoan();
                  $('#loans-archive').click();
                } else {
                  $('#unarchiveLoanMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">A problem occured. Please try again later.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn();
                }
              },
              error: function() {
                alert('A database error occured!');
              }
            });
          });
        });

        // Delete loan
        $('#returnLoanArchive').on('click', '.delete-loan', function(){
          $(this).text('Delete?');
          $(this).click(function(){
            var id = $(this).attr('data');
            var loanName = $(this).attr('loantype');
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              async   : false,
              url     : '<?php echo base_url() ?>loans/deleteLoan',
              data    : {id:id},
              dataType: 'json',
              success: function(response) {
                if(response == true) {
                  $('#unarchiveLoanMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + loanName + ' has been permanently deleted.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn();  
                  searchLoan();
                  $('#loans-archive').click();
                } else {
                  $('#unarchiveLoanMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">A problem occured. Please try again later.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn();
                }
              },
              error: function() {
                alert('A database error occured!');
              }
            });
          });
        });

        //Retrieve latest date
        function get_latest_date() {
          $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>/administrators/get_latest_date',
            async: false,
            dataType: 'json',
            success: function(data) {
              if(data) {
                var latestDate = '<p class="card-text small text-muted float-left mt-2"><em>Last updated: ' + data[0].date_created + '</em></p>';
                $('#returnLatestDate').html(latestDate);
              } else {
                var latestDate = '<p class="card-text small text-muted float-left mt-2"><em>Nothing to display.</em></p>';
                $('#returnLatestDate').html(latestDate);
              }
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        }

        // VIEW LEDGER CODES 
        refreshCollections();

        function refreshCollections() {
          var months  = ['January','February','March','April','May','June','July','August','September','October','November','December'];
          var year = new Date().getFullYear();
          var month = new Date().getMonth()+1;
          viewCollections(month, year);
        }

        $('#viewLedgerMonthSelect').change(function(){
          month = $('#viewLedgerMonthSelect').val();
          year = $('#viewLedgerYearSelect').val();
          viewCollections(month, year);
        });

        $('#viewLedgerYearSelect').change(function(){
          month = $('#viewLedgerMonthSelect').val();
          year = $('#viewLedgerYearSelect').val();
          viewCollections(month, year);
        });

        function viewCollections(month, year){
          $.ajax({
          type    : 'ajax',
          method  : 'GET',
          url     : '<?php echo base_url() ?>administrators/viewCollections',
          data    : {mo: month, yr: year},
          async   : false,
          dataType: 'json',
          success : function(data) {
            if(data){
            var head, row, rowFoot, opts, totalMonthly = '', totalBalance = '', or = '';
            head = '<th style="vertical-align: middle">Month</th>' +
                   '<th style="vertical-align: middle">OR No.</th>';
            for(var a = 0; a < data['numcols'].length; a++){
              head += '<th style="vertical-align: middle">' + data['numcols'][a].loan_name + ' (&#8369;)</th>';
            }
            for(var i = 0; i < data['result'].length; i++){
              if(data['result'][i].payment_date == '0000-00-00') {
                lastUp = 'Pending';
              } else {
                lastUp = new Date(data['result'][i].payment_date);
                lastUp = lastUp.toLocaleDateString("en-US");
              } if(data['result'][i].or_number == '') {
                or = 'Pending';
              } else {
                or = data['result'][i].or_number;
              }


              row  += '<tr class="text-secondary">' +
                        '<td style="vertical-align: middle">' + lastUp + '</td>' +
                        '<td style="vertical-align: middle">' + or + '</td>';
              for(var loans = 0; loans < data['numcols'].length; loans++){
                if(data['result'][i].loan_name == data['numcols'][loans].loan_name) {
                  var totalInRow = 0;
                  row += '<td style="vertical-align: middle">' + Math.round(data['result'][i].balance).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>';
                  totalInRow = Number(totalInRow) + Number(data['result'][i].balance);
                } else {
                  row += '<td style="vertical-align: middle">0</td>';
                }
              }
              row  += '<td style="vertical-align: middle">0</td>' +
                      '<td style="vertical-align: middle">' + Math.round(totalInRow).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                      '</tr>';  
            }

              head += '<th style="vertical-align: middle">Others</th>' +
                      '<th style="vertical-align: middle">Total (&#8369;)</th>';

              $('#returnCollectionsHeader').html(head);
              $('#returnCollectionsBody').html(row);
            } else {
              $('#returnCollectionsBody').html('');
              $('#returnCollectionsFooter').html('');
            }
          },
          error: function() {
            alert('Error!');
          }
          });

          /*if(data){
            var head, row, rowFoot, opts, totalMonthly = '', totalBalance = '', or = '';
            head = '<th style="vertical-align: middle">Month</th>' +
                   '<th style="vertical-align: middle">OR No.</th>';
            for(var a = 0; a < data['numcols'].length; a++){
              head += '<th style="vertical-align: middle">' + data['numcols'][a].loan_name + ' (&#8369;)</th>';
            }
            for(var i = 0; i < data['result'].length; i++){
              if(data['result'][i].payment_date == '0000-00-00') {
                lastUp = 'Pending';
              } else {
                lastUp = new Date(data['result'][i].payment_date);
                lastUp = lastUp.toLocaleDateString("en-US");
              } if(data['result'][i].or_number == '') {
                or = 'Pending';
              } else {
                or = data['result'][i].or_number;
              }


              row  += '<tr class="text-secondary">' +
                        '<td style="vertical-align: middle">' + lastUp + '</td>' +
                        '<td style="vertical-align: middle">' + or + '</td>';
              for(var loans = 0; loans < data['numcols'].length; loans++){
                if(data['result'][i].loan_name == data['numcols'][loans].loan_name) {
                  var totalInRow = 0;
                  row += '<td style="vertical-align: middle">' + Math.round(data['result'][i].balance).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>';
                  totalInRow = Number(totalInRow) + Number(data['result'][i].balance);
                } else {
                  row += '<td style="vertical-align: middle">0</td>';
                }
              }
              row  += '<td style="vertical-align: middle">0</td>' +
                      '<td style="vertical-align: middle">' + Math.round(totalInRow).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                      '</tr>';  
            }

              head += '<th style="vertical-align: middle">Others</th>' +
                      '<th style="vertical-align: middle">Total (&#8369;)</th>';

              $('#returnCollectionsHeader').html(head);
              $('#returnCollectionsBody').html(row);
            } else {
              $('#returnCollectionsBody').html('');
              $('#returnCollectionsFooter').html('');
            }
*/
          $("#collectionsTbl").DataTable().destroy();
          var collectionsDataTbl = $('#collectionsTbl').DataTable({
            "dom": 'lBfrtip',
            buttons: [
              {
              extend: 'pdf',
              text: 'Export PDF'
              },
              {
              extend: 'excel',
              text: 'Export Excel'
              },
              {
              extend: 'print',
              text: 'Print table'
              },
            ],
            "pagingType": "simple_numbers",
            "language": { search: "", searchPlaceholder: "Search.." }
          });

          $('#viewLedgerInfo').html($('#collectionsTbl_info').clone());
          $('#viewLedgerPaginate').html($('#collectionsTbl_paginate').clone());
          $('#collectionsTbl_info').remove();
          $('#collectionsTbl_paginate').remove();
        }

        // VIEW LEDGER CODES END

        // UPDATE LEDGER CODES
        refreshUpdateLedger();

        function refreshUpdateLedger() {
          var months  = ['January','February','March','April','May','June','July','August','September','October','November','December'];
          var year = new Date().getFullYear();
          var month = new Date().getMonth()+1;
          updateLedger(month, year);
        }

        $('#updateLedgerBtn').click(function(){
          var checked = [];
          var monthly = [];
          $.each($('#returnViewUpdateLedgerBody input[type=checkbox]:checked'), function(){
            checked.push($(this).attr('id'));
            monthly.push($(this).attr('md'));
          });
          var ORinput = $('#updateLedgerOR').find('#inputLedgerOR');
          ORinput.keyup(function() {
            if(ORinput.val() == '') {
              ORinput.attr('placeholder', 'Please enter the OR number!')
              ORinput.addClass('is-invalid');
            } else {
              ORinput.removeClass('is-invalid');
            }
          });
          if(ORinput.val() == '') {
            ORinput.attr('placeholder', 'Please enter the OR number!')
            ORinput.addClass('is-invalid');
          } else if(checked.length == 0) {
            alert('Please select ledgers to update.');
          } else {
            ORinput.removeClass('is-invalid');
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              url     : '<?php echo base_url() ?>administrators/updateLedgers',
              data    : {check: JSON.stringify(checked), md: JSON.stringify(monthly), ornum: ORinput.val()},
              async   : false,
              dataType: 'json',
              success : function(data){
                if(data == true) {
                  $('#ledgerShareCapMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success,  ledgers have been updated this month.</a>' +
                                  '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                  '</button>' +
                                '</p>').fadeIn().delay(3000).fadeOut('fast');
                  updateLedger();
                } else {
                  $('#ledgerShareCapMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Oops, something went wrong.</a>' +
                                  '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                  '</button>' +
                                '</p>').fadeIn().delay(3000).fadeOut('fast');
                  updateLedger();
                }
              },
              error : function(){
                alert('ERROR!');
              }
            });
          }
        });

        $('#updateLedgerMonthSelect').change(function(){
          month = $('#updateLedgerMonthSelect').val();
          year = $('#updateLedgerYearSelect').val();
          updateLedger(month, year);
        });

        $('#updateLedgerYearSelect').change(function(){
          month = $('#updateLedgerMonthSelect').val();
          year = $('#updateLedgerYearSelect').val();
          updateLedger(month, year);
        });

        function updateLedger(month, year){
          $("#viewUpdateLedgerTbl").DataTable().destroy();
          $.ajax({
          type    : 'ajax',
          method  : 'GET',
          url     : '<?php echo base_url() ?>administrators/updateLedger',
          data    : {mo: month, yr: year},
          async   : false,
          dataType: 'json',
          success : function(data) {
            if(data.length > 0){
            var row, rowFoot, opts, totalMonthly = '', totalBalance = '', count = 0, lock = '';
            for(var i = 0; i < data.length; i++){
              or = data[0].or_number;
              if(data[i].payment_status == 'paid') {
                cond = 'far fa-check-circle text-success';
                lock = 'disabled';
              } else {
                cond = 'far fa-times-circle text-danger';
                lock = '';
                count++;
              }
              if(data[i].payment_date == '0000-00-00') {
                lastUp = 'Pending';
              } else {
                lastUp = new Date(data[i].payment_date).toUTCString();
                lastUp = lastUp.split(' ').slice(0, 4).join(' ');
              }
              totalMonthly = Number(totalMonthly) + Number(data[i].monthly_deduc);
              totalBalance = Number(totalBalance) + Number(data[i].balance);
              row +=  '<tr class="text-secondary">' +
                        '<td style="vertical-align: middle"><input id="' + data[i].loanapp_id + '" md="' + data[i].monthly_deduc + '" type="checkbox" ' + lock + '></td>' +
                        '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].name + ' <i class="'+cond+'"></i></span></td>' +
                        '<td style="vertical-align: middle">' + data[i].loan_name + '</td>' +
                        '<td style="vertical-align: middle">' + Math.round(data[i].balance).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '<td style="vertical-align: middle">' + Math.round(data[i].monthly_deduc).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '<td style="vertical-align: middle">' + lastUp + '</td>' +
                      '</tr>'; 
            }
              rowFoot +=  '<tr>' +
                        '<th style="vertical-align: middle">Total</th>' +
                        '<th style="vertical-align: middle"></th>' +
                        '<th style="vertical-align: middle"></th>' +
                        '<th style="vertical-align: middle">&#8369;' + Math.round(totalBalance).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</th>' +
                        '<th style="vertical-align: middle">&#8369;' + Math.round(totalMonthly).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</th>' +
                        '<th style="vertical-align: middle"></th>' +
                      '</tr>';

              $('#returnViewUpdateLedgerBody').html(row);
              $('#returnViewUpdateLedgerFoot').html(rowFoot);
              if(count > 0) {
                $('#updateLedgerOR').html('<input type="text" id="inputLedgerOR" class="form-control form-control-sm" placeholder="Input New OR Number..">');
                $('#updateLedgerBtn').prop('disabled', false);
              } else {
                $('#updateLedgerOR').html('<h3>OR No: ' + or + ' <i class="far fa-check-circle text-success"></i></h3>');
                $('#updateLedgerBtn').prop('disabled', true);
              }
            } else {
              $('#returnViewUpdateLedgerBody').html('');
              $('#returnViewUpdateLedgerFoot').html('');
              $('#updateLedgerOR').html('<input type="text" id="inputLedgerOR" class="form-control form-control-sm" placeholder="Input New OR Number.." disabled>');
              $('#updateLedgerBtn').prop('disabled', true);
            }
          },
          error: function() {
            alert('Error!');
          }
          });

          var updateLedgerDataTbl = $('#viewUpdateLedgerTbl').DataTable({
            "dom": 'lBfrtip',
            buttons: [
              {
              extend: 'pdf',
              text: 'Export PDF'
              },
              {
              extend: 'excel',
              text: 'Export Excel'
              },
              {
              extend: 'print',
              text: 'Print table'
              },
            ],
            "pagingType": "simple_numbers",
            "language": { search: "", searchPlaceholder: "Search.." },
            "columnDefs": [
              { "orderable": false, "targets": 0 }
            ]
          });

          $('#updateLedgerInfo').html($('#viewUpdateLedgerTbl_info').clone());
          $('#viewUpdateLedgerTbl_info').remove();

        }
        // UPDATED LEDGER CODES END

        // SHARE CAPITAL CODES 
          refreshShareCapRec();

          function refreshShareCapRec() {
            var months  = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            var year = new Date().getFullYear();
            var month = new Date().getMonth()+1;
            getShareCapitalRec(month, year);
          }

          $('#ledgerShareCapBtn').click(function(){
            var checked = [];
            $.each($('#returnShareCapRec input[type=checkbox]:checked'), function(){
              checked.push($(this).attr('id'));
            });
            var ORinput = $('#shareCapOR').find('#updateShareCapOR');
            ORinput.keyup(function() {
              if(ORinput.val() == '') {
                ORinput.attr('placeholder', 'Please enter the OR number!')
                ORinput.addClass('is-invalid');
              } else {
                ORinput.removeClass('is-invalid');
              }
            });
            if(ORinput.val() == '') {
              ORinput.attr('placeholder', 'Please enter the OR number!')
              ORinput.addClass('is-invalid');
            } else if(checked.length == 0) {
              alert('Please select users to update.');
            } else {
              ORinput.removeClass('is-invalid');
              $.ajax({
                type    : 'ajax',
                method  : 'get',
                url     : '<?php echo base_url() ?>administrators/updateShareCapital',
                data    : {check: JSON.stringify(checked), ornum: ORinput.val()},
                async   : false,
                dataType: 'json',
                success : function(data){
                  if(data == true) {
                    $('#ledgerShareCapMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success,  share capitals have updated to this month.</a>' +
                                    '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                      '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                  '</p>').fadeIn().delay(3000).fadeOut('fast');
                    getShareCapitalRec();
                  } else {
                    $('#ledgerShareCapMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Oops, something went wrong.</a>' +
                                    '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                      '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                  '</p>').fadeIn().delay(3000).fadeOut('fast');
                    getShareCapitalRec();
                  }
                },
                error : function(){
                  alert('ERROR!');
                }
              });
            }
          });

          $('#shareCapMonthSelect').change(function(){
            year = $('#shareCapYearSelect').val();
            month = $('#shareCapMonthSelect').val();
            getShareCapitalRec(month, year);
          });

          $('#shareCapYearSelect').change(function(){
            year = $('#shareCapYearSelect').val();
            month = $('#shareCapMonthSelect').val();
            getShareCapitalRec(month, year);
          });

          function getShareCapitalRec(month, year) {
            $("#shareCapRecTbl").DataTable().destroy()
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              url     : '<?php echo base_url() ?>administrators/getShareCapitalRec',
              data    : {mo: month, yr: year},
              async   : false,
              dataType: 'json',
              success: function(data) {
                if(data.length > 0) {
                var tbl, total = 0, share = 0, count = 0, lock, tblFoot, cond, or, lastUp;
                for(var i = 0; i < data.length; i++) {
                  or = data[0].or_number;
                  if(data[i].status == 'paid') {
                    cond = 'far fa-check-circle text-success';
                    lock = 'disabled';
                  } else {
                    cond = 'far fa-times-circle text-danger';
                    lock = '';
                    count++;
                  }
                  if(data[i].date_updated == '0000-00-00') {
                    lastUp = 'Pending';
                  } else {
                    lastUp = new Date(data[i].date_updated).toUTCString();
                    lastUp = lastUp.split(' ').slice(0, 4).join(' ');
                  }
                  share = Number(share) + Number(data[i].share_capital);
                  total = Number(total) + Number(data[i].total_share_capital);
                  tbl +=  '<tr class="text-secondary">' +
                            '<td><input id="' + data[i].id + '" type="checkbox" ' + lock + '></td>' +
                            '<td><img class="rounded-circle member-icon mr-3" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + '?>"><span style="font-weight: 500">' + data[i].name + ' <i class="'+cond+'"></i></span></td>' +
                            '<td style="vertical-align: middle">' + data[i].share_capital.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="vertical-align: middle">' + data[i].total_share_capital.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="vertical-align: middle">' + lastUp + '</td>' +
                          '</tr>'; 
                }
                  tblFoot +=  '<tr>' +
                                '<th>Total</th>' +
                                '<th></th>' +
                                '<th>&#8369;' + Math.round(share).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</th>' +
                                '<th>&#8369;' + Math.round(total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</th>' +
                                '<th></th>' +
                              '</tr>'; 
                  $('#returnShareCapRec').html(tbl);
                  $('#returnShareCapRecFoot').html(tblFoot);
                  if(count > 0) {
                    $('#shareCapOR').html('<input type="text" id="updateShareCapOR" class="form-control form-control-sm" placeholder="Input New OR Number..">');
                    $('#ledgerShareCapBtn').prop('disabled', false);
                  } else {
                    $('#shareCapOR').html('<h3>OR No: ' + or + ' <i class="far fa-check-circle text-success"></i></h3>');
                    $('#ledgerShareCapBtn').prop('disabled', true);
                  }
                } else {
                  $('#returnShareCapRec').html('');
                  $('#returnShareCapRecFoot').html('');
                  $('#shareCapOR').html('<input type="text" id="updateShareCapOR" class="form-control form-control-sm" placeholder="Input New OR Number.." disabled>');
                  $('#ledgerShareCapBtn').prop('disabled', true);
                }
              },
              error: function() {
                alert('A database error occured!');
              } 
            });

            var shareCapDataTbl = $('#shareCapRecTbl').DataTable({
              "dom": 'lBfrtip',
              buttons: [
                {
                extend: 'pdf',
                text: 'Export PDF'
                },
                {
                extend: 'excel',
                text: 'Export Excel'
                },
                {
                extend: 'print',
                text: 'Print table'
                },
              ],
              "pagingType": "simple_numbers",
              "language": { search: "", searchPlaceholder: "Search.." },
              "columnDefs": [
                { "orderable": false, "targets": 0 }
              ]
            });

            $('#shareCapInfo').html($('#shareCapRecTbl_info').clone());
            $('#shareCapRecTbl_info').remove();

          }
        // SHARE CAPITAL CODES END

        $('#loanapp_user_id').attr('value', '<?php echo $this->session->userdata('user_id'); ?>').hide();
        $('#loanapp_name').attr('value', '<?php echo $this->session->userdata('name'); ?>').hide();

        var get_username = '';
        var get_name =  '';
        var user_id_no = '';
        var loan;
        var terms = '';
        var loanapp_amt;
        var a = 0; 
        var max_comakers;
        var three_comakers;
        var two_comakers;
        var one_comakers;
        var min_comakers;
        var loan_id_no = '';
        var loanapp_id = '';
        var interest = '';

        // User Checking for past loan applications start
        function Check() {
          var get_username = '<?php echo $this->session->userdata('username'); ?>';
          var get_name =  '<?php echo $this->session->userdata('name'); ?>';
          var user_id_no = '<?php echo $this->session->userdata('user_id')?>';

          $('#loanapp-cm-application').html('');
          $('#loan_selector_data').val('');
          $('#user_attachment_image').text('');
          $('#cm_attachment_image').text('');

          interest= '';
          loan = '';
          z = 0;

          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url(); ?>loan_applications/check',
            data    : {member_id: user_id_no},
            async   : false,
            dataType: 'json',
            success: function(response) {
              if(response == true) {
                $('#loan_selector').attr('style', 'display: none');
                $('#loanapp_user_id').attr('status', 'newUser');
                var url = '<?php echo base_url(); ?>loan_applications/newUser';

                $.ajax({
                  type    : 'ajax',
                  url     : url,
                  async   : false,
                  dataType: 'json',
                  success: function(result) {
                    $('#loan_type').attr({
                      loan_id: result[0].id,
                      loan_interest: result[0].loan_interest,
                      value: result[0].loan_name,
                      placeholder: result[0].loan_name
                    });

                    loan = $('#loan_type').val();
                    loan_id_no = $('#loan_type').attr('loan_id');
                    interest = $('#loan_type').attr('loan_interest');
                    user_id_no = '<?php echo $this->session->userdata('user_id'); ?>';

                    $('#loan_selector_data').val(loan_id_no);

                    getLoanTerm(loan_id_no);
                    getLoanAmount(loan_id_no);
                    generateLoanAppId(user_id_no, loan_id_no);

                    $.ajax({
                      type: 'ajax',
                      method: 'get',
                      url: '<?php echo base_url(); ?>loan_applications/getShareCapital',
                      data: {member_id: user_id_no},
                      async: false,
                      dataType: 'json',
                      success: function(data) {
                        var user_data_sc = data[0].total_share_capital * 2;

                        $('#loan-amount').val(user_data_sc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                      }, error: function() {
                        alert('Error cannot find user share capital');
                      }
                    });

                    passInterest(interest);

                    agik(interest);
                  }, error: function() {
                    alert('New User function returned false');
                  }
                });
              } else {
                $('#loan_type').attr('style', 'display: none');
                $('#loan_selector').attr('style', 'display: block');
                $('#loanapp_user_id').attr('status', 'oldUser');

                $.ajax({
                  type    : 'ajax',
                  method  : 'get',
                  url     : '<?php echo base_url(); ?>loan_applications/oldUser_exsistingData',
                  data    : { get_oldUser_loanData: user_id_no },
                  async   : false,
                  dataType: 'json',
                  success: function(query) {
                    var i;
                    var test = [];

                    for(i=0;i<query.length;i++) {
                      test.push(query[i].loan_applied);
                    }

                    $.ajax({
                      type: 'ajax',
                      method: 'get',
                      url: '<?php echo base_url(); ?>loan_applications/oldUser',
                      data: {loan_applied_id: test},
                      async: false,
                      dataType: 'json',
                      success: function(result) {
                        var loan_type_list = '<option value="" disabled selected hidden>Select loan type..</option>';
                        var i;

                        for(i=0; i<result.length; i++ ) {
                            loan_type_list += '<option class="loanOptions" loan_id="'+ result[i].id +'" loan_interest="' + result[i].loan_interest + '" value="'+ result[i].loan_name +'" max_amt="'+result[i].loan_max_amt+'">'+ result[i].loan_name +'</option>'
                        }

                        $('#loan_selector').html(loan_type_list);

                        $('#loan_selector').change(function() {
                          $('#calc_loan_term').attr('placeholder', '');
                          $('#calc_loan_grossamt').attr('placeholder', '');
                          $('#calc_loan_monthlydeduc').attr('placeholder', '');
                          loan = $('#loan_selector').find(':selected').val();
                          var name = $('#loan_selector').find(':selected').attr('value');
                          var max_amt = $('#loan_selector').find(':selected').attr('max_amt');
                          interest = $('#loan_selector').find(':selected').attr('loan_interest');
                          loan_id_no = $('#loan_selector').find(':selected').attr('loan_id');
                          user_id_no = '<?php echo $this->session->userdata('user_id'); ?>';


                          getLoanTerm(loan_id_no);
                          getLoanAmount(loan_id_no);
                          generateLoanAppId(user_id_no, loan_id_no);

                          $('#loan_selector_data').val(loan_id_no);

                          $('#loan-amount').val('');

                          $.ajax({
                            type: 'ajax',
                            method: 'get',
                            url: '<?php echo base_url(); ?>loan_applications/getShareCapital',
                            data: {member_id: user_id_no},
                            async: false,
                            dataType: 'json',
                            success: function(data) {
                              var sharecap = data[0].total_share_capital;
                              sharecap = sharecap * 3;
                              if(sharecap < max_amt){
                                var loanable = sharecap;
                              } else {
                                loanable = max_amt;
                              }
                              $('#loanapp_alerts').html('<p class="alert bg-info alert-dismissable fade show" role="alert"><a class="h7 text-white">Tip: The max loanable amount of '+name+' is &#8369;'+Math.round(max_amt).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'. Your total share capital is &#8369;'+Math.round(sharecap).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'. <br>You can only loan a MAX amount of &#8369;'+Math.round(loanable).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'. Thank you!</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="position: relative">&times;</span></button></p>');

                            agik(interest);
                            }, error: function(data) {
                              alert('Error cannot find user share capital');
                            }
                          });

                          passInterest(interest);

                          agik(interest);

                          $('#loanapp-cm-application').html('');
                        });
                      }, error: function() {
                        alert('Old User function returned false');
                      }
                    });

                  }, error: function(query) {
                    alert(query);
                    alert('Error on Check Function');
                  }
                });
              }
            }, 
            error: function() {
              alert('Error on Check function');
            }
          });
        }
        // user checking for past loan  applications 


        //loan amount function start
        function getLoanAmount(data) {
          var url = '<?php echo base_url(); ?>loan_applications/getLoanAmount';

          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : url,
            data    : {loan_id: data},
            async   : false,
            dataType: 'json',
            success: function(result) {
              max_comakers = result[0].loan_max_amt;

              $('#loan-amount').attr({
                max_amount: max_comakers
              });
            }, error: function() {
              alert('Error on Get Loan Amount function');
            }
          });
        } 
        //loan amount function end 

        // generate loan app id start : uncomplete
        function generateLoanAppId(user_id, loan_id){
          loanapp_id = user_id +  loan_id;

          $.ajax({
            type: 'ajax',
            data: {loanapp_id: loanapp_id},
            url: '<?php echo base_url(); ?>loan_applications/generateLoanAppId',
            async: false,
            dataType: 'json',
            success: function(result) {
              var i;
              if (result.length == 0) {
                loanapp_id = loanapp_id + 0 ;
              } else {
                for( i=0; i < result.length; i++) {
                  i = i;
                }
                loanapp_id = loanapp_id + i;               
              }
              $('#loanapp_id_no').val(loanapp_id);
            }, error: function() {
              alert('Error on generating Loan ID');
            }
          });
        }
        // generate loan app id end


        // amount and co maker dependency start
        if(($('#loan_amount').val() != '') || ($('#loan_amount').val() != 0)) {
            loanapp_amt = $(this).val();

            var cm = '';

            var store = max_comakers - loanapp_amt;

            if((loanapp_amt != '') || (loanapp_amt != 0)){
              if(store >= 0) {
                var store = '';
                var z;

                 $('#loanapp_alerts').html(store);

                 if((loanapp_amt <= max_comakers) && (loanapp_amt >= 100000)) 
                  {
                        a = 3;
                  }
                  else if((loanapp_amt <=  99999) && (loanapp_amt >= 0)) 
                  {
                        a = 2;
                  }

                for(z = 1; z <= a; z++){
                  cm += '<div class="form-group">'+ '<input type="hidden" name="user_username'+ z +'" id="user_username'+ z +'" value="">' +'<input type="text" autocomplete="off" user-username="user_username'+ z +'" cmlist="cmList' + z + ' " class="form-control dropdown-toggle" data-toggle="dropdown" placeholder="Input Co-Maker'+ z +' Name" name="co-maker'+ z +'" id="co-maker'+ z +'" cmk-uname=""><div class="invalid-feedback" id="co-makerinvalid'+ z +'"></div><div class="dropdown-menu cmList' + z + '"></div></div>';
                }

                CMSearch(z);
                getLoanTerm(loanapp_amt);

                $('#loanapp-cm-application').html(cm);
                $('#comakerCount').val(z-1);
              } else {
                 var store = '<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Invalid input! Please try again.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>';

                 $('#loanapp_alerts').html(store);
              }
            } else {
                cm = '';

               $('#loanapp-cm-application').html(cm);
            }
        }

        $('#loan-amount').keyup(function() {
          loanapp_amt = $(this).val();

          var cm = '';

          var store = max_comakers - loanapp_amt;

          if((loanapp_amt != '') || (loanapp_amt != 0)){
            if(store >= 0) {
              var store = '';
              var z;

               $('#loanapp_alerts').html(store);

               if((loanapp_amt <= max_comakers) && (loanapp_amt >= 100000)) 
                {
                      a = 3;
                }
                else if((loanapp_amt <=  99999) && (loanapp_amt >= 0)) 
                {
                      a = 2;
                }

              for(z = 1; z <= a; z++){
                cm += '<div class="form-group">'+ '<input type="hidden" name="user_username'+ z +'" id="user_username'+ z +'" value="">' +'<input type="text" autocomplete="off" user-username="user_username'+ z +'" cmlist="cmList' + z + ' " class="form-control dropdown-toggle" data-toggle="dropdown" placeholder="Input Co-Maker'+ z +' Name" name="co-maker'+ z +'" id="co-maker'+ z +'" cmk-uname=""><div class="invalid-feedback" id="co-makerinvalid'+ z +'"></div><div class="dropdown-menu cmList' + z + '"></div></div>';
              }

              CMSearch(z);
              getLoanTerm(loanapp_amt);

              $('#loanapp-cm-application').html(cm);
              $('#comakerCount').val(z-1);
            } else {
               var store = '<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Please select your desired loan first.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>';

               $('#loanapp_alerts').html(store);
            }
          } else {
              cm = '';

             $('#loanapp-cm-application').html(cm);
          }
        });
        // amount and co maker dependecy end


        // Application loan terms start 
        function getLoanTerm(data) {
          terms = '<option value="" disabled selected hidden>Select Loan Term..</option>';

          if (data <= 99999) {
             for(var i=1; i <= 24; i++) {
                terms += '<option value="'+ i +'">'+ i +' month/s</option>';
              }

              $('#loan_term').html(terms);
          } else if(data >= 100000) {
             for(var i=1; i <= 36; i++) {
                terms += '<option value="'+ i +'">'+ i +' month/s</option>';
              }

              $('#loan_term').html(terms);
          }
        }
        // Application loan terms end

         // upload start
        $('#loanAppForm').on('change', '#user_attachment', function() {
          $('#user_attachment_image').text($('#user_attachment')[0].files[0].name);
        });      
        // upload end

        // comaker on search dropdown start
        function CMSearch(z) {
          var y =  z-1;
          var x;
          var data_val = '';
          var data_id = '';
          var data = '';
          var data2 = '';
          var clicked_data1 = '';
          var clicked_data2 = '';
          var cmk1 = '';
          var cmk2 = '';
          var cmk3 = '';
          var cmk4 = '';

          for(x = 1; x <= y; x++){            
            $('#loanapp-cm-application').on('keyup','#co-maker'+ x, function() {
              data_val = $(this).val();
              data_id = $(this).attr('cmlist');
              data = $(this).attr('id');
              data2 = $(this).attr('user-username');

              cmk1 = $('#co-maker1').attr('cmk-uname');
              cmk2 = $('#co-maker2').attr('cmk-uname');
              cmk3 = $('#co-maker3').attr('cmk-uname');

             if(data_val != '') 
             {               
                searchCoMaker(data_val, data_id, cmk1, cmk2, cmk3); 
             } else 
             {
                searchCoMaker();
             }

              $(this).click(function() {
                data = $(this).attr('id');
                data2 = $(this).attr('user-username');        
              });

              $('.cm_user').click(function() {
                clicked_data1 = $(this).attr('value');
                clicked_data2 = $(this).attr('User-uname');

                $('#'+ data).val(clicked_data1);
                $('#'+ data).attr('cmk-uname', clicked_data2);
                $('#'+ data2).val(clicked_data2);
              });
            });
          }

        }

        function searchCoMaker(query, id, cmk1, cmk2, cmk3, cmk4) {
            var url = '<?php echo base_url(); ?>loan_applications/searchCoMaker';
            get_username = '<?php echo $this->session->userdata('user_id'); ?>';
            var test = [];
            var userlimit = [];

            $.ajax({
              type: 'ajax',
              url: '<?php echo base_url(); ?>loan_applications/fetchAllMembers',
              async: false,
              dataType: 'json',
              success: function(data) {
                 for(var i=0; i < data.length; i++) {
                    test.push(data[i].id);
                 }
              }, error: function() {
                alert('Error found fetching all members');
              }
            });

            // alert(test);

            // $.ajax({
            //   type: 'ajax',
            //   method: 'get',
            //   url: '<?php echo base_url(); ?>loan_applications/MemberLimit',
            //   data: {memberlimit: test},
            //   async: false,
            //   dataType: 'json',
            //   success: function(data) {
            //     for(var i=0; i < data.length; i++) {
            //       userlimit.push(data[i].member_id);
            //     }
            //   }, error: function() {
            //     alert('Error on Member Limits');
            //   }
            // });

            // alert(userlimit);
 
          $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: {key_entered: query, user: get_username, cmk1: cmk1, cmk2: cmk2, cmk3: cmk3, cmk4: cmk4},
            async: false,
            dataType: 'json',
            success: function(data) {
                var row = '';
                var i;

                if(data.length > 0) {  
                  for (i=0; i < data.length; i++) {
                    row += '<a role="button" class="dropdown-item w-100 cm_user" value="' + data[i].name + '" User-uname="' + 
        data[i].id + '">' 
                          + '<h5>' + data[i].name + '</h5>' 
                          + '<p>' + data[i].username + '</p>'
                          +'</a>'; 
                  }

                  $('#loanapp-cm-application').find('.' + id).html(row);
                } else {
                  row = '<a class="list-group-item list-group-item-action"><h5>No Result Found</h5><p>No User Exist</p></a>';

                  $('#loanapp-cm-application').find('.' + id).html(row);
                }
            }, error: function() {
                alert('search not working properly');
            }
          });
        }
        // comaker on search dropdown end

        // apply loan side calculator
        function passInterest(interest) {
          $('#loan_term').change(function(){
            $('input[name="calc_loan_term"]').val($('#loan_term').val() + ' month/s');
            agik(interest);
          });


          $('#loan-amount').keyup(function(){
            agik(interest);
          });
        }

        function agik(interest){
          var calcInterest;
          var calcTerm = $('#loan_term').val();
          var calcAmount = $('#loan-amount').val();
          var max_amount = $('#loan-amount').attr('max_amount');
          calcInterest = interest/12;

          calcGrossAmt = calcInterest * calcTerm * Number(calcAmount);

          var calcTotal =  Number(calcAmount) + Number(calcGrossAmt);

          $('input[name=calc_loan_grossamt]').val(Math.round(calcTotal).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
          $('input[name=calc_loan_monthlydeduc]').val(Math.round(calcTotal / calcTerm).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        }

        // insert loan data to db start
         $('#loanapp_submit').click(function() {
          var data = loan;
          var cmCount = $('#comakerCount').val();
          var cms = '';
          var count = '';
          var tableBody = '';
          var returnLoanCms = '';
          var loanType = '';
          var loanInterest = '';
          var loanTerm = $('#loan_term').val();
          var loanAmount = $('#loan-amount').val();
          var max_amount = $('#loan-amount').attr('max_amount');

          if($('#loanapp_user_id').attr('status') == 'newUser') {
            loanType = $('#loan_type').val();
            loanInterest = $('#loan_type').attr('loan_interest');
            if($('#loan_term').val() == null) {
              $('#loan_term').addClass('is-invalid');
              $('#loan_term_invalid').html("Please select your loan's term.");
            } else {
              count += '12';
              $('#loan_term').removeClass('is-invalid');
              $('#loan_term_invalid').text('');
              if($('#loan-amount').val() == '') {
                $('#loan-amount').addClass('is-invalid');
                $('#loan_amount_invalid').html('Please type your desired loan amount.');
              } else {
                count += '3';
                $('#loan-amount').removeClass('is-invalid');
                $('#loan_amount_invalid').text('');
                if ($('#user_attachment').get(0).files.length === 0) {
                  $('#user_attachment').addClass('is-invalid');
                  $('#user_attachment_invalid').html('No files selected! Please kindly attach your payslip.');
                } else {
                  count += '4';
                  $('#user_attachment').removeClass('is-invalid');
                  $('#user_attachment_invalid').text('');
                } 
              }
            }
          } else {
            loanType = $('#loan_selector').val();
            loanInterest = $('.loanOptions:selected').attr('loan_interest');
            if($('#loan_selector_data').val() == null) {
              $('#loan_selector').addClass('is-invalid');
              $('#loan_selector_invalid').html('Please select your desired loan.');
            } else {
              count += '1';
              $('#loan_selector').removeClass('is-invalid');
              $('#loan_selector_invalid').text('');
              if($('#loan_term').val() == null) {
                $('#loan_term').addClass('is-invalid');
                $('#loan_term_invalid').html("Please select your loan's term.");
              } else {
                count += '2';
                $('#loan_term').removeClass('is-invalid');
                $('#loan_term_invalid').text('');
                if($('#loan-amount').val() == '') {
                  $('#loan-amount').addClass('is-invalid');
                  $('#loan_amount_invalid').html('Please type your desired loan amount.');
                } else {
                  count += '3';
                  $('#loan-amount').removeClass('is-invalid');
                  $('#loan_amount_invalid').text('');
                  if ($('#user_attachment').get(0).files.length === 0) {
                    $('#user_attachment').addClass('is-invalid');
                    $('#user_attachment_invalid').html('No files selected! Please kindly attach your payslip.');
                  } else {
                    count += '4';
                    $('#user_attachment').removeClass('is-invalid');
                    $('#user_attachment_invalid').text('');
                  } 
                }
              }
            }
          }
          

          $('#loan_selector').change(function() {
            if($('#loan_selector_data').val() != null) {
              $('#loan_selector').removeClass('is-invalid');
              $('#loan_selector_invalid').text('');
            } else {
              $('#loan_selector').addClass('is-invalid');
              $('#loan_selector_invalid').html('Please select your desired loan.');
            }
          });

          $('#loan_term').change(function() {
            if($(this).val() != null) {
              $('#loan_term').removeClass('is-invalid');
              $('#loan_term_invalid').text('');
            } else {
              $('#loan_term').addClass('is-invalid');
              $('#loan_term_invalid').html("Please select your loan's term.");
            }
          });

          $('#loan-amount').keyup(function() {
            if($(this).val() != '') {
              $('#loan-amount').removeClass('is-invalid');
              $('#loan_amount_invalid').text('');
            } else {
              $('#loan-amount').addClass('is-invalid');
              $('#loan_amount_invalid').html('Please type your desired loan amount.');
            }
          });

          if ($('#user_attachment').get(0).files.length === 0) {
            $('#user_attachment').addClass('is-invalid');
            $('#user_attachment_invalid').html('No files selected! Please kindly attach your payslip.');
          } else {
             $('#user_attachment').removeClass('is-invalid');
            $('#user_attachment_invalid').text('');
          }          

          if(count == '1234') {
            for(var i = 1; i <= cmCount; i++) {
              if($('#co-maker'+i).val() == ''){
                $('#co-maker'+i).addClass('is-invalid');
                $('#co-makerinvalid'+i).text('Please choose a co-maker.');
              } else {
                $('#co-maker'+i).removeClass('is-invalid');
                $('#co-makerinvalid'+i).text('');
                cms += i;
              } 
            }

          if(cmCount == 1) {
            returnLoanCms = "Your co-maker is <span class='font-weight-bold'>" +$('#co-maker1').val()+ "</span>.";
          } else if(cmCount == 2) {
            returnLoanCms = "Your co-makers are <span class='font-weight-bold'>" +$('#co-maker1').val()+ "</span> and <span class='font-weight-bold'>" +$('#co-maker2').val()+ "</span>.";
          } else if(cmCount == 3) {
            returnLoanCms = "Your co-makers are <span class='font-weight-bold'>" +$('#co-maker1').val()+ "</span>, <span class='font-weight-bold'>" +$('#co-maker2').val()+ "</span> and <span class='font-weight-bold'>" +$('#co-maker3').val()+ "</span>.";
          } else {
            returnLoanCms = "Your co-makers are <span class='font-weight-bold'>" +$('#co-maker1').val()+ "</span>, <span class='font-weight-bold'>" +$('#co-maker2').val()+ "</span>, <span class='font-weight-bold'>" +$('#co-maker3').val()+ "</span> and <span class='font-weight-bold'>" +$('#co-maker4').val()+ "</span>.";
          }

          if(cmCount == cms.length) {
            var loanTerm = $('#loan_term').val();
            var interest = loanInterest / 12;
            var grossAmt = interest * loanTerm * Number(loanAmount) ;
            var calcTotal =  Number(loanAmount) + Number(calcGrossAmt);
            var monthlyDeduc = calcTotal/ loanTerm;
            var balance = calcTotal - monthlyDeduc;
            var RetentionFee = 0;
            var OutstandingBal = 0;
            var servFee = loanAmount * 0.01; 
            var loanNetAmt = loanAmount - servFee;

            var loanDebitTotal = Number(loanAmount)+ Number(grossAmt);

            var loanCreditTotal = grossAmt + RetentionFee + servFee + OutstandingBal + loanNetAmt;

            for(var i = 1; i <= loanTerm; i++) {
              var int = interest / loanTerm;
              var bal = monthlyDeduc * (i-2);
              bal = balance - bal;
              tableBody +=  '<tr>' +
                              '<th scope="row">' + i + '</th>' +
                              '<td>&#8369;' + grossAmt.toFixed(0) + 'pesos</td>' +
                              '<td>&#8369;' + monthlyDeduc.toFixed(0) + '</td>' +
                              '<td>&#8369;' + bal.toFixed(0) + '</td>' +
                            '</tr>';
            }

            $('#calcBody').html(tableBody);
            $('#loanType').html('<span class="font-weight-bold">' + loanType + '</span>');
            $('#loanTerm').html('<span class="font-weight-bold">' + loanTerm + ' months</span>');
            $('#loanAmt').html('<span class="font-weight-bold">' + Number(loanAmount).toFixed(2) + '</span>');
            $('#loanInt').html('<span class="font-weight-bold">' + grossAmt.toFixed(2) + '</span>');
            $('#loanDefIntInc').html('<span class="font-weight-bold">' + grossAmt.toFixed(2) + '</span>');
            $('#loanGross').html('<span class="font-weight-bold">' + calcTotal.toFixed(2) + '</span>');
            $('#loanMoDed').html('<span class="font-weight-bold">' + monthlyDeduc.toFixed(0) + '</span>');
            $('#loanOutstandingBal').html('<span class="font-weight-bold">' + OutstandingBal + '</span>');
            $('#loanRetensionFee').html('<span class="font-weight-bold">' + RetentionFee + '</span>');
            $('#loanServiceFee').html('<span class="font-weight-bold">' + servFee.toFixed(2) + '</span>');
            $('#loanCiB').html('<span class="font-weight-bold">' + loanNetAmt.toFixed(2) + '</span>');
            $('#loanNetAmt').html('<span class="font-weight-bold">' + loanNetAmt.toFixed(2) + '</span>');
            $('#debitTotal').html('<span class="font-weight-bold">' + loanDebitTotal.toFixed(2) + '</span>');
            $('#creditTotal').html('<span class="font-weight-bold">' + loanCreditTotal.toFixed(2) + '</span>');

            $('#loanCms').html(returnLoanCms);
            $('#loanAppCalculations').modal('show');
          } else {
              var store = '<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Please choose your co-maker/s.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>';
              $('#loanapp_alerts').html(store);
            }
          } else {
            $('#loanapp_alerts').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Notice, please make sure all fields and attachment are filled-out before submitting.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
          }   
        });              

        $('#submitLoan').click(function(){
          var newFormData = new FormData($('#loanAppForm')[0]);

          $.ajax({
            type:     'ajax',
            method:   'post',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            url:     '<?php echo base_url(); ?>loan_applications/insertLoanApp',
            data:     newFormData,
            async:    false,
            dataType: 'json',
            success: function(data) {
              if (data == true) {
                var store = '<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, wait for further updates about your application.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>';

                $('#loanapp_alerts').html(store);
                $('#loanAppForm')[0].reset();
                Check();
              } else {
                alert('loan app data response is false');
                Check();
              }
            }, error: function() {
              alert('Error on submitting loan app data');
            }
          });
          $('#loanAppCalculations').modal('hide');
        });          
        // insert loan data to db end

        // comakers tab start
          // fix upload button for co maker attachment and design
          function Comakers() {
            var user_id = '<?php echo $this->session->userdata('user_id'); ?>';
            
            $.ajax({
              type: 'ajax',
              method: 'get',
              url: '<?php echo base_url(); ?>loan_applications/coMakersApplication',
              data:{user_id: user_id},
              async: false,
              dataType: 'json',
              success: function(data) {
                var rows = '';
                var i;

                for(i=0; i < data.length; i++){
                  rows += '<li class="list-group-item d-flex">' +
                            '<div class="p-3"><img src="assets/img/team/ian.jpg" class="rounded-circle member-icon"></div>' +
                            '<div class="p-3"><h5 class="member-name font-weight-bold">' + data[i].name + '</h5>' +
                            '<p class="text-muted"><small>' + data[i].username + '</small></p>' +
                            '<p class="text-muted"><small>' + data[i].loan_name + '</small></p></div>' +
                            '<div class="float-right my-2 ml-auto p-3"><button href="javascript:;" class="btn btn-info btn-sm float-right" id="cmCheckLoan'+ i +'" data="' + data[i].loanapp_id + '">View Application</button></div>'
                            '</li>';
                }

                $('#return_cm_applications').html(rows);
                $('#cm_pending_badge').text(i);

                cmApplyCount(i);
              }, error: function() {
                alert('Something went wrong on checking for co-makers');
              }
            });
          }

          function cmApplyCount(y) {
            get_username = '<?php echo $this->session->userdata('user_id'); ?>';

            for(var i = 0; i < y; i++) {
              $('#return_cm_applications').on('click', '#cmCheckLoan'+ i, function() {
                $('#cmViewLoanAppModal').modal('show'); 

                var loanapp_data = $(this).attr('data');

                $.ajax({
                  type: 'ajax',
                  method: 'get',
                  url: '<?php echo base_url(); ?>loan_applications/cmloanappData',
                  data: {loanapp_data: loanapp_data},
                  async: false,
                  dataType: 'json',
                  success: function(result) {
                     get_username = '<?php echo $this->session->userdata('user_id'); ?>';

                    var cmCount = 0;
                    var cnt = '';
                    var cm = '';
                    var cm_uploads =  '<form id="cmAttachmentForm" enctype="multipart/form-data">' +
                                        '<div class="form-group">'+
                                        '<input type="hidden" class="form-control" id="cm_id" name="cm_id" value="'+ get_username +'">' +
                                        '<input type="hidden" class="form-control" id="loan_App_id" name="loan_App_id" value="'+ result[0].loanapp_id +'">' +
                                        '<div class="form-group">' +
                                          '<div class="row mx-auto">' +
                                              '<label for="cmimg" class="btn btn-secondary btn-sm">' +
                                                'Upload image <input type="file" id="cmimg" name="userfile" hidden>' +
                                              '</label>' +
                                            '<p id="cmAttachmentImg" class="small ml-2 mt-2"></p>' +
                                          '</div>' +
                                        '</div>' +
                                        '<div class="invalid-feedback" id="cm_attachment_invalid"></div>' +
                                        '</div>' +
                                      '</form>'; 
                    var cm_id_data = '';

                    if(result[0].comaker_1 != null) {
                      cmCount++;
                    } if (result[0].comaker_2 != null) {
                      cmCount++;
                    } if(result[0].comaker_3 != null) {
                      cmCount++;
                    } 

                    for(var i=1; i <= cmCount; i++) {
                      if(i == 1) {
                        cm = result[0].comaker_1;
                      } if(i == 2) {
                        cm = result[0].comaker_2;
                      } if(i == 3) {
                        cm = result[0].comaker_3;
                      } 

                      $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: '<?php echo base_url(); ?>loan_applications/findCmName',
                        data: {cm : cm},
                        async: false, 
                        dataType: 'json',
                        success: function(data) {
                          cnt += '<p><span class="font-weight-bold">Co-Maker'+ i +': </span><span class="text-muted">'+ data[0].name +'</span></p><div cm_id="'+ data[0].id +'" id="cm_attachment_button'+ i +'"></div>';

                          get_username = '<?php echo $this->session->userdata('user_id'); ?>';

                          if(data[0].id == get_username) {
                              cm_id_data = '#cm_attachment_button'+i;
                          }
                        }, error: function() {
                          alert('Error on findCmName');
                        }
                      });
                    }

                    var cm_loandata_head = '<span class="font-weight-bold">Loan Application Details</span>';
                    var cm_loandata_body = '<div class="row d-flex">' + 
                                          '<div class="p-3"><img src="assets/img/team/ian.jpg" class="rounded-circle member-icon d-block mx-auto m-2"><h6 class="text-center d-block">'+ result[0].name +'</h6><small class="text-muted text-center d-block">'+ result[0].username +'</small><small class="text-muted text-center d-block">'+ result[0].email +'</small></div>' + 
                                          '<div class="d-block p-3"><p><span class="font-weight-bold">Loan Application ID: </span><span class="text-muted">'+ result[0].loanapp_id +'</span></p>'+
                                          '<p><span class="font-weight-bold">Loan Type: </span><span class="text-muted">'+ result[0].loan_name +'</span></p>'+
                                          '<p><span class="font-weight-bold">Loan Term: </span><span class="text-muted">'+ result[0].loan_term +'</span></p>'+
                                          '<p><span class="font-weight-bold">Amount Loaned: </span><span class="text-muted">'+ result[0].loan_amount +'</span></p></div>' +
                                          '<div class="d-block p-3" id="comaker-count"></div></form>'+
                                          '</div>';

                    $('#cmViewLoanAppModalTitle').html(cm_loandata_head);
                    $('#cmViewLoanAppModalBody').html(cm_loandata_body);
                    $('#comaker-count').html(cnt);

                    $(cm_id_data).html(cm_uploads);
                  }, error: function() {
                    alert('Error finding Loan application Data');
                  }
                });
              });
            }
          }


          $('#cmViewLoanAppModal').on('change', '#cmimg', function() {
            $('#cmAttachmentImg').text($('#cmimg')[0].files[0].name);
          });  

          $('#cmViewLoanAppModal').on('click', '#submit_cm_attachment', function() {
              if($('#cmimg').val() != null) {
                $('#cmimg').removeClass('is-invalid');
                $('#cm_attachment_invalid').text('');

                $(this).text('Are you sure?');
                $(this).click(function() {
                  var cm_id = $('#cm_id').val();
                  var lapp_id = $('#loan_App_id').val(); 
                  var cmdata = new FormData($('#cmAttachmentForm')[0]);

                  $.ajax({
                    type: 'ajax',
                    method: 'post',
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    url: '<?php echo base_url(); ?>loan_applications/cmAttachment',
                    data: cmdata,
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                      if(data == true) {
                        alert('Your attachment has successfully sent');
                        $('cmViewLoanAppModal').modal('hide');
                      } else {
                        alert('Comaker uploading attachment failed');
                      }
                    }, error: function(data) {
                      alert('Error updating Co-Makers Attachment');
                    }
                  });

                });
              } else {
                $('#cmimg').addClass('is-invalid');
                $('#cm_attachment_invalid').html('Please attach your payslip.');
              }
          });
        // comakers tab end

        // Edit Profile Button
        $('#editProfileBtn').click(function() {
          loadEditProfileModalDefaults();
          retrieveLoggedUserInfo();
        });

        // Enter trigger button in edit profile
        $("#editProfileModal").keypress(function(e) {
          if (e.which == 13) {
            $('#editProfileSaveBtn').click();
          }
        });
        
        // Enter trigger in save permission changes
        $('#manageModuleModal').on('keypress', "#confirmationPassword", function(e) {
          if (e.which == 13) {
            $('#saveUserModule').click();
          }
        });

        // Back button in edit profile - change pass
        $('#editProfileModal').on('click', '#editProfileBackBtn', function() {
          loadEditProfileModalDefaults();
          retrieveLoggedUserInfo();
        });

        // Change modal content to change pass
        $("#editProfileModal").on("click", "#changePasswordLink", function() {
          var editProfileModalBody =  '<div class="col-md-12">' +
                                        '<h6 class="mb-3">Change Password</h6>' +
                                        '<div class="form-group">' +
                                          '<input type="password" placeholder="Enter current password.." class="form-control form-control-sm" id="editCurrentPass" name="currentPassEdit">' +
                                          '<div class="invalid-feedback" id="invalidCurrentPassEdit"></div>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                          '<input type="password" placeholder="Enter new password.." class="form-control form-control-sm" id="editPassword" name="passwordEdit">' +
                                          '<div class="invalid-feedback" id="invalidPassEdit"></div>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                          '<input type="password" placeholder="Re-enter new password.." class="form-control form-control-sm" id="editPassword2" name="password2Edit">' +
                                          '<div class="invalid-feedback" id="invalidRePassEdit"></div>' +
                                        '</div>' +
                                      '</div>';
          var editProfileModalFooter =  '<button type="button" class="btn btn-success btn-sm" id="changePasswordBtn">Save changes</button>' +
                                        '<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="cancelChangePassword">Cancel</button>';

          $("#editProfileModal").find(".modal-title").html('<p id="editProfileBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p>Edit Profile');
          $("#editProfileModal").find(".row").html(editProfileModalBody);
          $("#editProfileModal").find(".modal-footer").html(editProfileModalFooter);
        });

        // Load edit profile modal contents
        function loadEditProfileModalDefaults() {
          var defaultEditProfileBody =  '<form id="editProfileForm" enctype="multipart/form-data" method="post">' +
                                          '<input type="hidden" id="editID" name="idEdit">' +
                                          '<div class="modal-body">' +
                                            '<div id="editProfileMsg" style="margin: -15px -15px 15px -15px"></div>' +
                                            '<div class="row">' +
                                              '<div class="col-md-12">' +
                                                '<h6 class="mb-3">Basic Info</h6>' +
                                                '<div class="form-group">' +
                                                  '<input type="text" class="form-control form-control-sm" id="editName" name="nameEdit">' +
                                                  '<div class="invalid-feedback" id="invalidNameEdit"></div>' +
                                                '</div>' +
                                                '<div class="form-group">' +
                                                  '<input type="text" class="form-control form-control-sm" id="editEmail" name="emailEdit">' +
                                                  '<div class="invalid-feedback" id="invalidEmailEdit"></div>' +
                                                '</div>' +
                                                '<div class="form-group">' +
                                                  '<input type="date" class="form-control form-control-sm" id="editBirthday" name="birthdayEdit">' +
                                                  '<div class="invalid-feedback" id="invalidBdayEdit"></div>' +
                                                '</div>' +
                                                '<div class="form-group">' +
                                                  '<select class="custom-select form-control-sm" id="editCollege" name="collegeEdit">' +
                                                    '<option selected hidden>Select College..</option>' +
                                                    '<option>College of Science</option>' +
                                                    '<option>College of Industrial Technology</option>' +
                                                    '<option>College of Liberal Arts</option>' +
                                                    '<option>College of Engineering</option>' +
                                                    '<option>College of Architecture and Fine Arts</option>' +
                                                    '<option>College of Industrial Education</option>' +
                                                  '</select>' +
                                                  '<div class="invalid-feedback" id="invalidCollegeEdit"></div>' +
                                                '</div>' +
                                                '<div class="form-group">' +
                                                  '<div class="row mx-auto">' +
                                                      '<label for="userimg" class="btn btn-secondary btn-sm">' +
                                                        'Upload image <input type="file" id="userimg" name="userfile" hidden>' +
                                                      '</label>' +
                                                    '<p id="editProfileImg" class="small ml-2 mt-2">HA</p>' +
                                                  '</div>' +
                                                '</div>' +
                                                '<a href="#" id="changePasswordLink"><small>Change password</small></a>' +
                                              '</div>' + 
                                            '</div>' +
                                          '</div>' +
                                        '</form>';

          var defaultEditProfileFooter =  '<button type="submit" class="btn btn-success btn-sm float-right" id="editProfileSaveBtn">Save changes</button>' +
                                          '<button type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal">Cancel</button>';
          $('#editProfileModal').find('.modal-title').html('Edit Account');
          $("#returnEditProfileBody").html(defaultEditProfileBody);
          $("#editProfileModal").find(".modal-footer").html(defaultEditProfileFooter);                   
        }

        // Retrieve logged user information for editing
        function retrieveLoggedUserInfo() {
          $("#editCurrentPass, #editPassword, #editPassword2").val('');
          var loggedUsername = '<?php echo $this->session->userdata('username') ?>';
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>administrators/retrieveUserInfo',
            data    : { userName: loggedUsername },
            async   : false,
            dataType: 'json',
            success: function(data) {
              $('#editID').val(data[0].id);
              $('#editName').val(data[0].name);
              $('#editEmail').val(data[0].email);
              $('#editBirthday').val(data[0].birthday);
              $('#editCollege').val(data[0].college);
              $('#editProfileImg').text(data[0].user_img);

              $("#editProfileModal").on("click", "#changePasswordBtn", function (){
                $('#editProfileMsg').html('');
                var userPass = data[0].password;
                var verifyPass = $('#editCurrentPass').val();
                var userNewPass = $('#editPassword2').val();
                if(verifyPass != '') {
                  encryptCurrentPass(verifyPass, userPass, userNewPass);
                } else {
                  $('#editProfileMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Notice, you did not made any changes.</a>' +
                                      '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                      '</button>' +
                                    '</p>').fadeIn();    
                }
              });


              $("#editProfileModal").on("change", "#userimg", function (){
                $('#editProfileImg').text($('#userimg')[0].files[0].name);
              });


              $('#editProfileSaveBtn').one('click', function() {
                $('#editProfileMsg').html('');
                updateUserInfo();
              });
            },
            error: function() {
              alert('A database error occured!');
            } 
          });
        }

        // Input current pass encryption
        function encryptCurrentPass(verifyPass, userPass, userNewPass) {
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>administrators/encryptCurrentPass',
            data    : { currentPass: verifyPass, desiredNewPass: userNewPass },
            async   : false,
            dataType: 'json',
            success: function(data) {
              if(data.currentPass == userPass) {
                $('#editCurrentPass').removeClass('is-invalid');
                $('#invalidCurrentPassEdit').text('');
                  if($('#editPassword2').val() != $('#editPassword').val()) {
                    $('#editPassword').addClass('is-invalid');
                    $('#editPassword2').addClass('is-invalid');
                    $('#invalidRePassEdit').text('New password do not match!');
                  } else if (($('#editPassword2').val() && $('#editPassword').val()) == '') {
                    $('#editPassword').addClass('is-invalid');
                    $('#editPassword2').addClass('is-invalid');
                    $('#invalidRePassEdit').text('You can not leave these blank.');
                  } else {
                    $('#editPassword').removeClass('is-invalid');
                    $('#editPassword2').removeClass('is-invalid');
                    $('#invalidRePassEdit').text('');
                    var userNewPass = data.desiredNewPass;
                    updateUserPass(userNewPass);
                  }
              } else {
                $('#editCurrentPass').addClass('is-invalid');
                $('#invalidCurrentPassEdit').text('Invalid password.');
              }
            },
            error: function(data) {
              alert('A database error occured!');
            }
          });
        }

        // Update user info
        function updateUserInfo() {
          var userNewInfo = $('#editProfileForm')[0];
          var data = new FormData(userNewInfo);
          $.ajax({
            type    : 'ajax',
            method  : 'post',
            enctype : 'multipart/form-data',
            processData: false,
            contentType: false,
            cache   : false,
            url     : '<?php echo base_url() ?>administrators/updateUserInfo',
            data    : data,
            async   : false,
            dataType: 'json',
            success: function(data) {
              if(data == true) {
                $('#editCurrentPass').removeClass('is-invalid');
                $('#invalidCurrentPassEdit').text('');
                $('#editProfileMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, your information have been updated.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn().delay(3000).fadeOut('fast'); 
                  $('#displayUserImg').load(location.href+" #displayUserImg");
                  $('#displayUserName').load(location.href + " #displayUserName");
                  search_user();
              } else {
                $('#editProfileMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Notice, you did not made any changes<br>or the image did not meet the requirements below.<br>&nbsp;&nbsp;* Max size: 2MB<br>&nbsp;&nbsp;* Dimensions: 500x500 px<br>&nbsp;&nbsp;* Type: PNG, JPG, GIF</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn();  
              }
            }
          });
          retrieveLoggedUserInfo();
        }

        $("#editPassword2").keypress(function(e) {
          if (e.which == 13) {
            $('#changePasswordBtn').click();
          }
        });

        // Update user password
        function updateUserPass(userNewPass) {
          var id = $("#editID").val();
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>administrators/updateUserPass',
            data    : { userID: id, newPass: userNewPass },
            async   : false,
            dataType: 'json',
            success: function(data) {
              if(data == true) {
                $('#editCurrentPass').removeClass('is-invalid');
                $('#invalidCurrentPassEdit').text('');
                $('#editProfileMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, your password has been changed.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>'); 
                retrieveLoggedUserInfo();
              } else {
                $('#editProfileMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Notice, you did not made any changes.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>');  
                retrieveLoggedUserInfo();
              }
            },
            error: function(data) {
              alert('A database error occured!');
            }
          });
        }

        // retrieve web infos for setting from db
        function get_infos() {
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>administrators/get_infos',
            async: false,
            dataType: 'json',
            success: function(data) {
              $('input[name=webtitle]').val(data.title).prop('disabled', true);
              $('input[name=webtelno]').val(data.telephone_no).prop('disabled', true);
              $('input[name=webphoneno]').val(data.cellphone_no).prop('disabled', true);
              $('input[name=weblocation]').val(data.address).prop('disabled', true);
              $('input[name=webemail]').val(data.email).prop('disabled', true);
              $('input[name=webaddress]').val(data.web_link).prop('disabled', true);
              $('input[name=webfb]').val(data.fb_account).prop('disabled', true);
              $('input[name=webtwitter]').val(data.twitter_account).prop('disabled', true);
            },
            error: function(){
              alert('Error!');
            } 
          });
        }

        // settings tab
        $('#editInfo').click(function() {
          $('#web-title').prop('disabled', false);
          $('#web-telno').prop('disabled', false);
          $('#web-phoneno').prop('disabled', false);
          $('#web-location').prop('disabled', false);
          $('#web-address').prop('disabled', false);
          $('#web-email').prop('disabled', false);
          $('#web-fb').prop('disabled', false);
          $('#web-twitter').prop('disabled', false);
         $('#editInfo').hide(); 
         $('#saveInfos').show();
        });

        $('#cancelEdit').click(function() {
          $('#web-title').prop('disabled', true);
          $('#web-telno').prop('disabled', true);
          $('#web-phoneno').prop('disabled', true);
          $('#web-location').prop('disabled', true);
          $('#web-address').prop('disabled', true);
          $('#web-email').prop('disabled', true);
          $('#web-fb').prop('disabled', true);
          $('#web-twitter').prop('disabled', true);
          $('#editInfo').show();
          $('#saveInfos').hide(); 
        });

        $('#saveInfos').click(function() {
          $('#saveInfoForm').attr('action', '<?php echo base_url() ?>administrators/save_infos');
          var url = $('#saveInfoForm').attr('action');
          var data = $('#saveInfoForm').serialize();
          // Form validation
          var title = $('input[name=webtitle]');
          var telno = $('input[name=webtelno]');
          var phoneno = $('input[name=webphoneno]');
          var location = $('input[name=weblocation]');
          var email = $('input[name=webemail]');
          var fb = $('input[name=webfb]');
          var twitter = $('input[name=webtwitter]');
          var webaddress = $('input[name=webaddress]');
          var result = '';

          if(title.val() == '') {
            title.addClass('is-invalid');
            $('#invalidTitle').html('Please fill out this field.');
          } else {
            title.removeClass('is-invalid');
            $('#invalidTitle').html('');
            result += '1';
          } 
          if(telno.val() == '') {
            telno.addClass('is-invalid');
            $('#invalidTelno').html('Please fill out this field.');
          } else {
            telno.removeClass('is-invalid');
            $('#invalidTelno').html('');
            result += '2';
          } 
          if(phoneno.val() == '') {
            phoneno.addClass('is-invalid');
            $('#invalidPhoneno').html('Please fill out this field.');
          } else {
            phoneno.removeClass('is-invalid');
            $('#invalidPhoneno').html('');
            result += '3';
          } 
          if(location.val() == '') {
            location.addClass('is-invalid');
            $('#invalidLocation').html('Please fill out this field.');
          } else {
            location.removeClass('is-invalid');
            $('#invalidLocation').html('');
            result += '4';
          }
          if(email.val() == '') {
            email.addClass('is-invalid');
            $('#invalidEmailAdd').html('Please fill out this field.');
          } else {
            email.removeClass('is-invalid');
            $('#invalidEmailAdd').html('');
            result += '5';
          }
           if(fb.val() == '') {
            fb.addClass('is-invalid');
            $('#invalidFbaccount').html('Please fill out this field.');
          } else {
            fb.removeClass('is-invalid');
            $('#invalidFbaccount').html('');
            result += '6';
          }
           if(twitter.val() == '') {
            twitter.addClass('is-invalid');
            $('#invalidTwitteraccount').html('Please fill out this field.');
          } else {
            twitter.removeClass('is-invalid');
            $('#invalidTwitteraccount').html('');
            result += '7';
          }
          if(webaddress.val() == '') {
            webaddress.addClass('is-invalid');
            $('#invalidWebaddress').html('Please fill out this field.');
          } else {
            webaddress.removeClass('is-invalid');
            $('#invalidWebaddress').html('');
            result += '8';
          }
          
          if(result == '12345678') {
            $.ajax({ 
            type    : 'ajax',
            method  : 'post',
            url     : url,
            data    : data,
            async   : false,
            dataType: 'json',
            success: function(response) {
              if(response.success) {
                $('#addMsg').html('<p class="alert alert-primary alert-dismissable fade show text-center" role="alert">Info updated successfully!</p>').fadeIn().delay(3000).fadeOut('slow'); 
              } else {
                alert('You did not made any changes! Please close it properly.');
              }
            }, 
            error: function() { 
            alert('Could not add data!');
            }
          });
        }
        });
      });
    </script>

    <script type="text/javascript">
      $(function(){
        checkPerms();
        function checkPerms(){
          var role = '<?php echo $this->session->userdata('roleID'); ?>';
          switch(role){
            case '1':
            $('#websettings-tab').show();
            $('#websiteSettings').addClass('active');
            break;
            case '2':
            $('#memberDash').show();
            $('#dashboardTab').addClass('active');
            $('#loans-tab').show();
            $('#myloanrecords-tab').show();
            $('#applyloan-tab').show();
            break;
            case '3':
            $('#creditDash').show();
            $('#dashboardTab').addClass('active');
            $('#loans-tab, #loans-deduction, #returnLatestDate, #add-loan, .edit-loan').show();
            $('#members-tab, #viewuser-perm4, #returnMemberLatestDate').show();
            $('#loanapps-tab').show();
            $('#records-comakers-tab, #loanrecords-tab, #loanRecordsText, #loanRecordsTabText').show();
            break;
            case '4':
            $('#treasurerDash').show();
            $('#dashboardTab').addClass('active');
            $('#loans-tab, #returnLatestDate').show();
            $('#loanapps-tab').show();
            $('#sharecap-ledger-tab, #view-ledgers').show();
            break;
            case '5':
            $('#managerDash').show();
            $('#dashboardTab').addClass('active');
            $('#loans-tab').show();
            $('#loanapps-tab').show();
            $('#records-comakers-tab, #loanrecords-tab, #loanRecordsText, #loanRecordsTabText').show();
            $('#sharecap-ledger-tab, #view-ledgers, #update-ledgers, #update-share-capitals').show();
            break;
            case '6':
            $('#chairmanDash').show();
            $('#dashboardTab').addClass('active');
            $('#loans-tab, #loans-deduction, #loans-archive, #returnLatestDate, #add-loan, .edit-loan, .archive-loan').show();
            $('#members-tab, #adduser-perm2, #viewuser-perm4').show();
            $('#records-comakers-tab, #loanrecords-tab, #comakers-tab, #loanRecordsText, #loanRecordsTabText, #comakersText, #comakersTabText').show();
            break;
          }
        }
      });
    </script>

    

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>

    <!-- Selectize -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/selectize/js/standalone/selectize.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/jqBootstrapValidation.js"></script>

    <!-- Custom scripts for this template -->
    <script defer src="<?php echo base_url() ?>assets/vendor/fontawesome-free/js/all.js" rel="stylesheet"></script>

    
    <script>
    var ctxL = document.getElementById("line-chart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Loan track",
            data: [25, 38, 150, 50, 76, 260, 230, 220, 70, 80, 150, 100, 100],
            backgroundColor: ['rgba(102, 255, 204, 0.2)'],
            borderColor: ['rgba(130, 255, 230)'],
            borderWidth: 2
          }
        ]
      },
      options: {
        responsive: true
      }
    });
    </script>

    <script>
      var ctxP = document.getElementById("pie-chart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            labels: ["Approved", "Disapproved"],
            datasets: [
                {
                    data: [70, 30],
                    backgroundColor: [ "#53ff85", "#F7464A"],
                    hoverBackgroundColor: [ "#99ffbb", "#FF5A5E"]
                }
            ]
        },
        options: {
            responsive: true
        }
    });
    </script>


    <?php endforeach; ?>
  </body>
</html>
