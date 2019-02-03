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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/selectize/css/selectize.css"/>

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


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-html5-1.5.4/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-1.5.0/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-html5-1.5.4/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-1.5.0/datatables.min.js"></script>


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
                <a class="dropdown-item mb-1" id="permission-mngmt" data-toggle="modal" data-target="#manageModuleModal" href="#"><span class="far fa-check-square fa-lg mr-2"></span> Manage Modules</a>
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
        <div class="msg">
        </div>
        <div class="row">
        <!-- Profile -->
          <div class="col-sm-padding col-sm-12 col-md-4 col-lg-3 offset-md mb-3">
            <div class="card">
              <div class="card-header bg-secondary p-5 bobo">
                <div id="displayUserImg" class="card-title">
                  <img src="<?php echo base_url(); ?>assets/img/profile_img/<?php echo $image['user_img']; ?>" class="img-thumbnail rounded-circle mx-auto d-block my-3 shadow-sm">
                </div>
              </div>
              <div class="card-text mb-2 mx-3">
                <h6 id="displayUserName" class="admin-name text-center"><?php echo $image['name']; ?></h6>
                <h6 class="info-text text-center text-muted"><?php echo $this->session->userdata('position') ?></h6>
              </div>
              <div class="list-group profile-menu" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="dashboard-tab" data-toggle="list" href="#dashboardTab" role="tab" aria-controls="home">Dashboard<i class="fas fa-home mr-2 mt-1 float-left"></i>  <i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loans-tab" data-toggle="list" href="#loansTab" role="tab" aria-controls="settings">Loans<i class="fas fa-credit-card mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="members-tab" data-toggle="list" href="#membersTab" role="tab" aria-controls="messages">Members<i class="fas fa-users mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="records-tab" data-toggle="list" href="#loanRecordTab" role="tab" aria-controls="settings">Loan Records<i class="fas fa-poll-h mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loanapps-tab" data-toggle="list" href="#loanAppTab" role="tab" aria-controls="settings"> Loan Applications<i class="fas fa-poll mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loanrecords-tab" data-toggle="list" href="#recordsTab" role="tab" aria-controls="messages">My Loan Records<i class="fas fa-folder-open mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="comakers-tab" data-toggle="list" href="#coMakersTab" role="tab" aria-controls="messages">Co-Makers<i class="fas fa-users mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="Ledger-tab" data-toggle="list" href="#LedgerTab" role="tab" aria-controls="messages">Ledger<i class="fas fa-book mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="sharecap-tab" data-toggle="list" href="#shareCapTab" role="tab" aria-controls="messages">Share Capital Records<i class="fas fa-money-check mr-2 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="applyloan-tab" data-toggle="list" href="#applyLoanTab" role="tab" aria-controls="messages">Apply Loan<i class="far fa-file-alt mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="websettings-tab" data-toggle="list" href="#websiteSettings" role="tab" aria-controls="messages">Settings<i class="fas fa-cog mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
              </div>
            </div>
          </div>

          <!-- Navigation Body -->
          <div class="col-sm-padding col-sm-12 col-md-8 col-lg-9 mb-3">
            <div class="card">
              <div class="tab-content">
                <!-- Home Part -->
                <div class="tab-pane fade show active" id="dashboardTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header shadow-sm">Dashboard</h2>
                  <div class="card-body">
                    <div class="row mb-4">
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
                    <div class="row mb-4">
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

                <!-- Loans Part -->
                <div class="tab-pane fade show" id="loansTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header shadow-sm"><strong>Loans</strong><button type="button" id="loansArchiveBtn" class="btn btn-light float-right" style="margin-top: -3px"><small class="text-secondary">Loans archive</small></button></h2>
                    <div class="card-body card-body-mh">
                      <div class="no-padding" id="addLoanMsg"></div>
                        <form class="form" id="searchloan">
                          <div class="row mb-3">
                            <div class="col-sm-12 col-md-8">
                              <input type="text" class="form-control shadow-sm" placeholder="Search.." aria-label="Search for a member" id="searchLoan">
                            </div>
                            <div class="col-sm-12 col-md-4">
                              <div class="input-group shadow-sm">
                                <div class="input-group-prepend">
                                  <div class="input-group-text text-muted">Sort By</div>
                                </div>
                                <select class="custom-select" id="sortLoans">
                                  <option>Date</option>
                                  <option>Amount</option>
                                  <option>Interest</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </form>
                      <div class="row" id="returnLoans">
                        <!-- Loans list from ajax call -->
                      </div>
                    </div>
                    <div class="card-footer" style="min-height: 60px">
                      <div id="returnLatestDate"></div>
                      <button id="addloan-perm1" class="btn btn-outline-success float-right mb-2"><i class="fas fa-plus-circle mr-2"></i>Add Loan</button>

                      <!-- Add Loan Modal -->
                      <div class="modal fade" id="addLoanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
                                  <div class="col-12">
                                    <label for="name" class="custom-sm h6">Loan Type</label>
                                    <div class="input-group input-group-sm mb-2">
                                      <input type="text" class="form-control form-control-sm" placeholder="Enter Loan Name.." id="name" name="loan_name">
                                      <div class="invalid-feedback" id="invalidName"></div>
                                    </div>
                                    <label for="amount" class="custom-sm h6">Max Amount</label>
                                    <div class="input-group input-group-sm mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">&#8369;</span>
                                      </div>
                                      <input type="text" class="form-control form-control-sm" placeholder="Enter Max Amount.." id="amount" name="loan_max_amt" maxlength="9">
                                      <div class="invalid-feedback" id="invalidAmt"></div>
                                    </div>
                                    <label for="term" class="custom-sm h6">Max Term</label>
                                    <div class="input-group input-group-sm mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Months</span>
                                      </div>
                                      <input type="text" class="form-control form-control-sm" placeholder="Enter Max Term.." id="term" name="loan_max_term" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                      <div class="invalid-feedback" id="invalidTerm"></div>
                                    </div>
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
                      <!--Search Bar -->
                        <form class="form" id="searchuser-perm1">
                          <div class="row mb-3">
                            <div class="col-sm-12 col-md-8">
                              <input type="text" class="form-control shadow-sm" placeholder="Search.." aria-label="Search for a member" id="searchMember" name="searchMember">
                            </div>
                            <div class="col-sm-12 col-md-4">
                              <div class="input-group shadow-sm">
                                <div class="input-group-prepend">
                                  <div class="input-group-text text-muted">Sort By</div>
                                </div>
                                <select class="custom-select" id="sort" name="sort">
                                  <option>Date</option>
                                  <option>Position</option>
                                  <option>College</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </form>
                      <ul class="list-group" id="returnRow">
                        <!-- Member list from ajax call -->
                      </ul>
                    </div>
                    <div class="card-footer" style="min-height: 60px">
                      <div id="returnMemberLatestDate"></div>
                      <button class="btn btn-outline-success float-right mb-2" id="adduser-perm2"><i class="fas fa-plus-circle mr-2"></i>Add New Member</button>
                    </div>


                <!-- VIEW PROFILE MODAL -->
                <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-secondary p-5 profile-header">
                        <div class="modal-title mx-auto">
                          <img id="viewProfileImg" src="assets/img/team/2.jpg" class="img-thumbnail rounded-circle d-block my-3">
                        </div>
                      </div>
                      <div class="modal-text m-3">
                        <button class="btn btn-light bg-light float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>...</strong></button>
                        <div class="dropdown-menu pb-3" aria-labelledby="dropdownMenuButton">
                          <a href="#" class="dropdown-item" id="promoteUser">Promote</a>
                          <a href="#" class="dropdown-item" id="deleteuser-perm3">Delete Profile</a>
                        </div>
                        <h6 class="memberprofile-name text-center d-block" id="userName"></h6>
                        <h6 class="profile-text text-center text-muted" id="userPosition"></h6>
                        <p class="text-center"><small id="userCollege"></small>&nbsp;&nbsp;-&nbsp;&nbsp;<small id="userAddress"></small></p>
                        <div class="mt-2">
                          <button id="userSharecap" type="button" class="btn btn-outline-secondary btn-sm btn-block"></button>
                          <button type="button" class="btn btn-outline-secondary btn-sm btn-block">Loan record</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- ADD MEMBER MODAL -->
                <div class="modal fade" id="addMemberModal">
                  <div class="modal-dialog modal-dialog-centered modal-md">  
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Add Member</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                        <form id="addMemberForm">
                          <div class="modal-body" style="height: auto; max-height: 500px; overflow-y: auto">
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label for="firstname" class="custom-sm h6">First Name:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter First Name.." aria-describedby="Fname" id="firstname" name="Fname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">

                                <div class="invalid-feedback" id="invalidFname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="middlename" class="custom-sm h6">Middle Name:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Middle Name.." aria-describedby="Mname" id="middlename" name="Mname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                <div class="invalid-feedback" id="invalidMname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="lastname" class="custom-sm h6">Last Name:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Last Name.." aria-describedby="Lname" id="lastname" name="Lname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                <div class="invalid-feedback" id="invalidLname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="username" class="custom-sm h6">Username:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Username.." aria-describedby="Uname" id="username" name="Uname">
                                <div class="invalid-feedback" id="invalidUname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="address" class="custom-sm h6">City:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Address.." aria-describedby="Address" id="address" name="city">
                                <div class="invalid-feedback" id="invalidCity"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="zipcode" class="custom-sm h6">Zipcode:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Zipcode.." aria-describedby="Zipcode" id="zipcode" name="zip" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <div class="invalid-feedback" id="invalidZip"></div>
                              </div>

                              <div class="form-group col-md-6">
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

                              <div class="form-group col-md-6">
                                <label for="birthday" class="custom-sm h6">Birthday:</label>
                                <input type="date" class="form-control form-control-sm" placeholder="Date" name="birthday" aria-describedby="Birthday" id="birthday" name="bday">
                                <div class="invalid-feedback" id="invalidBday"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="email" class="custom-sm h6">Email:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Email.." aria-describedby="Email" id="email" name="email">
                                <div class="invalid-feedback" id="invalidEmail"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="phone" class="custom-sm h6">Phone Number:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Contact Number.." aria-describedby="Phone" id="phone" name="phone" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <div class="invalid-feedback" id="invalidPhone"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="college" class="custom-sm h6">College:</label>
                                <select id="college" name="college" placeholder="Select college.." style="cursor: pointer;">
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
                                <label for="sharecap" class="custom-sm h6">Share Capital:</label>
                                <div class="input-group input-group-sm mb-2">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">&#8369;</span>
                                  </div>
                                  <input type="text" class="form-control form-control-sm" placeholder="Enter Share Capital.." aria-describedby="Sharecap" id="sharecap" name="sharecap">
                                  <div class="invalid-feedback" id="invalidShareCapital"></div>
                                </div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="password" class="custom-sm h6">Password:</label>
                                <input type="password" class="form-control form-control-sm" placeholder="Enter Password.." aria-describedby="Password" id="password" name="password">
                                <div class="invalid-feedback" id="invalidPass"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="password2" class="custom-sm h6">Verify Password:</label>
                                <input type="password" class="form-control form-control-sm" placeholder="Re-type Password.." aria-describedby="Password2" id="password2" name="password2">
                                <div class="invalid-feedback" id="invalidPass2"></div>
                              </div>
                            </div>
                          </div> 
                        </form>     
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm float-right" id="saveMember"><i class="fas fa-plus-circle mr-2"></i>Add Member</button>
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
                      <h2 class="card-title">LOAN APPLICATIONS</h2>
                    </li>
                    <li class="nav-item ml-auto loan-apps">
                      <a class="nav-link active" data-toggle="tab" href="#pending_loans">Pending<span id="pendingNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                    <li class="nav-item loan-apps">
                      <a class="nav-link" data-toggle="tab" href="#approved_loans">Approved<span id="approvedNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                    <li class="nav-item loan-apps">
                      <a class="nav-link" data-toggle="tab" href="#ongoing_loans">Ongoing<span id="ongoingNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                    <li class="nav-item loan-apps">
                      <a class="nav-link" data-toggle="tab" href="#disapproved_loans">Cancelled<span id="disapprovedNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                  </ul>
                </div>
                  <div class="tab-content card-body card-body-mh">
                    <div id="loanAppMsg" class="no-padding"></div>
                    <div class="tab-pane list-group active" id="pending_loans">
                      <div class="row mb-3">
                        <div class="col">
                          <input type="text" class="form-control shadow-sm" placeholder="Search.." aria-label="Search for a member" id="searchPendingLoanApp">
                        </div>
                      </div>
                      <div id="returnPendingLoan"></div>
                    </div>

                    <div class="tab-pane list-group" id="approved_loans">
                      <div class="row mb-3">
                        <div class="col">
                          <input type="text" class="form-control shadow-sm" placeholder="Search.." aria-label="Search for a member" id="searchApprovedLoanApp">
                        </div>
                      </div>
                      <div id="returnApprovedLoans"></div>
                    </div>

                    <div class="tab-pane list-group" id="ongoing_loans">
                      <div class="row mb-3">
                        <div class="col">
                          <input type="text" class="form-control shadow-sm" placeholder="Search.." aria-label="Search for a member" id="searchOngoingLoanApp">
                        </div>
                      </div>
                      <div id="returnOngoingLoans"></div>
                    </div>

                    <div class="tab-pane list-group" id="disapproved_loans">
                      <div class="row mb-3">
                        <div class="col">
                          <input type="text" class="form-control shadow-sm" placeholder="Search.." aria-label="Search for a member" id="searchDisapprovedLoanApp">
                        </div>
                      </div>
                      <div id="returnDisapprovedLoans"></div>
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
                        <div class="modal-body" style="height: auto; max-height: 400px; overflow-y: auto;">
                          <div id="defaultLoanAppBody">
                            <div class="row">
                              <img id="loanAppFormImg" class="rounded w-25 h-25 ml-3" src="">
                                <div class="col align-self-start">
                                  <label name="loanApplicant" class="custom-sm h6"></label><br>
                                  <a name="loanApplicantEmail" class="small text-primary em"></a><br>
                                  <a name="loanApplicantContact" class="small"></a><br>
                                  <a name="loanApplicantCollege" class="small"></a><br>
                                  <a name="loanApplicantAddress" class="small"><a name="loanApplicantZip" class="small"></a></a><br>
                                  <a name="loanApplicantRegDate" class="small"></a>
                                </div>
                                <div class="col align-self-start">
                                  <button class="btn btn-light btn-sm w-100 mb-1 ml-auto"><i class="far fa-eye mr-1"></i>Ledger</button>
                                  <button class="btn btn-light btn-sm w-100 mb-2"><i class="far fa-eye mr-1"></i>Summary</button>
                                  <a class="custom-xs h6" id="thpInfo">Take Home Pay:<span class="userLoanInfo ml-2" name="loan_thp"></span></a><br>
                                  <a class="custom-xs h6" id="cnInfo">Cheque Number:<span class="userLoanInfo ml-2" name="loan_cn"></span></a><br>
                                </div>
                              </div>
                            <hr>
                            <form class="row mt-3 mb-2" id="LoanAppInfo">
                              <div class="col-md-6 col-sm-12">
                                <div class="ml-2">
                                  <h6 class="mb-1">INFORMATION</h6>
                                  <a class="custom-xs h6">Loan Application ID:<span class="userLoanInfo ml-2" name="loan_id"></span></a><br>
                                  <a class="custom-xs h6">Type of Loan:<span class="userLoanInfo ml-2" name="loan_type"></span></a><br>
                                  <a class="custom-xs h6">Term of Loan:<span class="userLoanInfo ml-2" name="loan_term"></span></a><br>
                                  <a class="custom-xs h6">Amount of Loan:<span class="userLoanInfo ml-2" name="loan_amt"></span></a><br>
                                  <a class="custom-xs h6">Interest on Loan:<span class="userLoanInfo ml-2" name="loan_interest"></span></a><br>
                                  <a class="custom-xs h6">Monthly Deduction:<span class="userLoanInfo ml-2" name="loan_deduc"></span></a><br>
                                  <input type="hidden" name="loan_deduc_hidden">
                                  <a class="custom-xs h6">Member Payslip:</a><br>
                                  <a class="custom-xs h6" id="thpVerifyInfo">THP Verified By:<span class="userLoanInfo ml-2" name="loan_thp_verified"></span></a><br>
                                  <a class="custom-xs h6" id="cnVerifyInfo">CN Verified On:<span class="userLoanInfo ml-2" name="loan_cn_verified"></span></a><br>
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                <div class="ml-2">
                                  <h6 class="mb-1">CO-MAKERS:</h6>
                                  <div id="returnAppComakers">
                                  </div>
                                </div>
                              </div>
                            </form>
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

                  <div class="modal fade" id="confirmationLoanAppModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title"></h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
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
                </div>

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

                <!-- ledger part -->
                  <div class="tab-pane fade show" id="LedgerTab" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-header">
                      <ul class="nav nav-tabs card-header-tabs">
                        <li class="ml-2 pb-4">
                          <h2 class="card-title">
                            <span>Ledger</span>
                          </h2>
                        </li>
                        <li class="nav-item ml-auto">
                          <a class="nav-link active" data-toggle="tab" href="#viewLedger">View Ledger</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#updateLedger">Update Ledger</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body tab-content" style="height: 70vh; overflow-y: auto;">
                      <div class="tab-pane list-group active" id="viewLedger">
                        <div id="return_viewLedger">
                          <div class="d-flex">
                            <div class="d-block form-group"><h6>Month: </h6><input type="text" name="VL_inputMonth" class="form-control w-75" placeholder="Enter Month"></div>
                            <div class="d-block form-group"><h6>Year: </h6><input type="text" name="VL_inputYear" class="form-control w-75" placeholder="Enter Year"></div>
                            <div class="d-block form-group"><h6>OR No.: </h6><input type="text" name="VL_inputORno" class="form-control w-75" placeholder="Enter OR No."></div>     
                          </div>
                          <!-- insert ledger data table -->
                          <div class="table-responsive mx-auto">
                            <table class="table table-bordered table-sm mt-3">
                              <thead id="VL_header">
                                <tr id="VL_header_tr">
                                 <!-- insert view ledger table header here -->
                                </tr>
                              </thead>
                              <tbody id="VL_body">
                                <!-- insert view ledger table body here -->
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane list-group fade" id="updateLedger">
                        <div id="return_updateLedger px-auto">
                        <div class="row"> 
                          <div class="col-sm-9"> 
                            <div class="d-block">
                              <div class="d-flex">
                                <div class="d-block form-group"><h6>Month: </h6><input type="text" name="UL_inputMonth" class="form-control w-75" placeholder="Enter Month"></div>
                                <div class="d-block form-group"><h6>Year: </h6><input type="text" name="UL_inputYear" class="form-control w-75" placeholder="Enter Year"></div>
                                <div class="d-block form-group"><h6>OR No.: </h6><input type="text" name="UL_inputORno" class="form-control w-75" placeholder="Enter OR No."></div>     
                              </div>
                            </div>

                            <div class="d-block">
                              <div class="d-flex">
                                <div class="form-group"><input type="hidden" name="UL_inputMemberId" class="form-control" id="UL_inputMemberId"></div>
                                <div class="d-flex form-group"><h6 class="p-2">Name: </h6><input type="text" name="UL_inputMemberName" id="UL_inputMemberName" list="memberSearch" class="form-control ml-2" placeholder="Enter Member Name"><datalist id="memberSearch"></datalist></div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="d-block mx-auto my-5">
                              <button class="btn btn-outline-primary" id="UL_searchbtn"><span>Search<span></button>
                            </div>
                          </div>
                        </div>

                          <hr>

                          <div id="update_LedgerData">
                            <!-- insert input fields here -->
                          </div>
                        </div>
                      </div>            
                    </div>
                  </div>
                <!-- ledger part end -->

                <!-- RECORDS Part -->
                <div class="tab-pane fade show" id="loanRecordTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header">Records</h2>
                  <div class="card-body card-body-mh">
                    <div class="col-md-12">
                      <table id="loanRecordTbl" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%" style="border: 0.5px solid lightgray">
                        <thead>
                          <tr class="table-font">
                            <th>Date</th>
                            <th>Name</th>
                            <th>Take Home Pay</th>
                            <th>THP After Deduction</th>
                            <th>Amount of Loan</th>
                            <th>Gross Amount of Loan</th>
                            <th>Monthly Deduction</th>
                            <th>Term of Payments</th>
                            <th>Remarks</th>
                            <th>Code No.</th>
                          </tr>
                        </thead>
                        <tbody id="returnLoanRecords">
                          
                        </tbody>
                      </table>
                    </div>
                    <script type="text/javascript">
                      $(function(){
                        $.ajax({
                          type    : 'ajax',
                          url     : '<?php echo base_url() ?>administrators/getMembers',
                          async   : false,
                          dataType: 'json',
                          success : function(data) {
                            var tbl = '';
                            for(var i = 0; i < data.length; i++) {
                              var myDate = new Date(Date.parse(data[i].date_created.replace('-','/','g')));
                              myDate = myDate.toUTCString();
                              myDate = myDate.split(' ').slice(1, 4).join('-');
                              var loan_amt = data[i].loan_amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                              var takehomepay = data[i].take_home_pay.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                              var monthlydeduc = data[i].monthly_deduc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
                              tbl += '<tr class="small">' +
                                        '<th scope="row">' + myDate + '</th>' +
                                        '<td>' + data[i].name + '</td>' +
                                        '<td>&#8369;' + takehomepay + '</td>' +
                                        '<td>&#8369;' + takehomepay + '</td>' +
                                        '<td>&#8369;' + loan_amt + '</td>' +
                                        '<td>&#8369;' + loan_amt + '</td>' +
                                        '<td>&#8369;' + monthlydeduc + '</td>' +
                                        '<td>' + data[i].loan_term + ' month/s</td>' +
                                        '<td>' + data[i].status + '</td>' +
                                        '<td>' + data[i].loanapp_id + '</td>' +
                                      '</tr>';                          
                            }
                            $('#returnLoanRecords').html(tbl);
                          },
                          error: function() {
                            alert('Error!');
                          }
                        });

                        var table = $('#loanRecordTbl').DataTable({       
                          scrollX:        true,
                          scrollCollapse: true,
                          autoWidth:      false,  
                          paging:         true,       
                          columnDefs: [
                          { "width": "150px", "targets": [0,1] },       
                          { "width": "40px", "targets": [4] }
                          ]
                        });
                      });
                    </script>
                  </div>
                  <div class="card-footer" style="min-height: 60px"></div>
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
                            <select class="custom-select mt-2" name="loan_selector" id="loan_selector" style="display: block">
                               <!-- ajax insert loan types -->
                            </select>
                            <div class="invalid-feedback" id="loan_selector_invalid"></div>
                          </div>
                          <div class="input-group mb-3" id="loanapp-amount">
                            <div class="input-group-prepend">
                              <span class="input-group-text">&#8369;</span>
                            </div>
                            <input type="number" min="0" value="0" maxlength="9" class="form-control" name="loan-amount" id="loan-amount">
                            <div class="invalid-feedback" id="loan_amount_invalid"></div>
                          </div>
                          <div class="form-group">
                            <select class="custom-select" name="loan-term" id="loan_term" required>
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
                          <input type="text" class="form-control" placeholder="0" name="calc_loan_term">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Gross Amt.</span>
                          </div>
                          <input type="text" class="form-control" placeholder="0.00" name="calc_loan_grossamt">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Monthly Deduc.</span>
                          </div>
                          <input type="text" class="form-control" placeholder="0.00" name="calc_loan_monthlydeduc">
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
                      <div class="modal-body" style="height: auto; max-height: 500px; overflow-y: auto">
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
                        <button type="button" class="btn btn-danger btn-sm" id="deleteRecordBtn"> I am sure</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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

                <!-- MANAGE MODULES MODAL -->
                <div class="modal fade" id="manageModuleModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Set user modules</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div id="returnModuleBody">
                        
                      </div>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                </div>

                <!-- EDIT PROFILE MODAL -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
                      <div class="modal-body" style="height: auto; max-height: 500px; overflow-y: auto;">
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
        getApprovedLoans();
        getDisapprovedLoans();
        getPendingLoans();
        get_latest_date();
        search_user();
        getMember_latest_date();
        populateRolePermissions();
        get_infos();
        Check();
        Comakers();
        // All loan related scripts
        $('#searchPendingLoanApp').keyup(function() {
          var input = $(this).val();
          if(input != '') {
            getPendingLoans(input);
          } else {
            getPendingLoans();
          }
        });

        $('#searchApprovedLoanApp').keyup(function() {
          var input = $(this).val();
          if(input != '') {
            getApprovedLoans(input);
          } else {
            getApprovedLoans();
          }
        });

        $('#searchOngoingLoanApp').keyup(function() {
          var input = $(this).val();
          if(input != '') {
            getOngoingLoans(input);
          } else {
            getOngoingLoans();
          }
        });

        $('#searchDisapprovedLoanApp').keyup(function() {
          var input = $(this).val();
          if(input != '') {
            getDisapprovedLoans(input);
          } else {
            getDisapprovedLoans();
          }
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

                  row += '<li class="list-group-item" data-toggle="modal" data-target="#openLoanAppForm" status="' + status + '" verifiedThp="' + verifiedThp + '" payslip="' + takeHomePay + '" verifiedBy="' + verifiedBy + '" monthlyDeduc="' + data[i].monthly_deduc + '" data="' + data[i].loanapp_id + '" style="cursor: pointer">' +
                            '<img src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img +'" class="rounded-circle member-icon">' +
                              '<div id="returnApprovalIcons">' +
                                '<i cc="' + data[i].cc_approval_3 + '" class="far fa-user-circle fa-lg mt-1 mr-1 float-right '+ txtCol3 +'"></i>' +
                                '<i cc="' + data[i].cc_approval_2 + '" class="far fa-user-circle fa-lg mt-1 mr-1 float-right '+ txtCol2 +'"></i>' +
                                '<i cc="' + data[i].cc_approval_1 + '" class="far fa-user-circle fa-lg mt-1 mr-1 float-right '+ txtCol1 +'"></i>' +
                              '</div>' +
                            '<h2 class="member-name">' + data[i].name + '<i class="' + verifiedIcon + ' ml-1"></i></h2>' +
                            '<p class="text-muted"><small>' + data[i].loan_name + '</small></p>' +
                          '</li>';  
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
                var row = ''; 
                for(var i = 0; i < data.length; i++){
                  var dateIssued = new Date(Date.parse(data[i].date_approved.replace('-','/','g')));
                  dateIssued = dateIssued.toUTCString();
                  dateIssued = dateIssued.split(' ').slice(0, 4).join(' ');
                  if(data[i].cheque_no == null) {
                    color = 'info';
                    status = 'pending';
                    approvedLoanNote = 'Pending cheque number..';
                  } else {
                    color = 'primary';
                    status = 'verified';
                    approvedLoanNote = 'Pending disbursement voucher..';
                  }
                  row +=  '<li class="list-group-item" data-toggle="modal" data-target="#openLoanAppForm" status="' + status + '" data="' + data[i].loanapp_id + '" payslip="' + data[i].take_home_pay + '" verifiedBy="' + data[i].thp_verified_by + '" chequeNo="' + data[i].cheque_no + '" dateIssued="' + dateIssued + '" style="cursor: pointer">' +
                            '<img src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img +'" class="rounded-circle member-icon">' +
                              '<span class="badge badge-' + color + ' p-2 mt-2 w-25 float-right">' + approvedLoanNote + '</span>' +
                              '<h2 class="member-name">' + data[i].name + '<i class="far fa-check-circle text-' + color + ' ml-1"></i></h2>' +
                            '<p class="text-muted"><small>' + data[i].loan_name + '</small></p>' +
                          '</li>';   
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

        function getDisapprovedLoans(query){
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>loans/getDisapprovedLoans',
            data: {query: query},
            async: false,
            dataType: 'json',
            success: function(data){
              if(data.length > 0) {
                $('#disapprovedNotif').html(data.length);
                var row = '';
                for(var i = 0; i < data.length; i++){
                  row += '<li class="list-group-item" data-toggle="modal" data-target="#openLoanAppForm" data="' + data[i].loanapp_id + '" style="cursor: pointer">' +
                            '<img src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img +'" class="rounded-circle member-icon">' +
                              '<span class=" badge badge-primary p-2 mr-2 w-15 float-right">' + data[i].date_created + '</span>' +
                              '<h2 class="member-name">' + data[i].name + '</h2>' +
                            '<p class="text-muted"><small>' + data[i].loan_name + '</small></p>' +
                          '</li>';   
                }
                $('#returnDisapprovedLoans').html(row);
              } else {
                if(query != null) {
                  $('#disapprovedNotif').html('0');
                  $('#returnDisapprovedLoans').html('<div class="ml-4">' +
                                       '<h4 class="mt-5"><strong class="text-danger">No results for ' + query + '</h4>' +
                                       '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">The term you entered did not bring up any results.</h7>' +
                                     '</div>');
                } else {
                  $('#disapprovedNotif').html('0');
                  $('#returnDisapprovedLoans').html('<div class="ml-4"><h4 class="mt-5"><strong class="text-success">Looks good!</h4><h7 style="color: #66757f; font-weight: light; padding-top: 20px">Nothing to display.</h7></div>');
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
          } else if(selectedTab == '#disapproved_loans') {
            selectedTab = 'returnDisapprovedLoans';
          } else {
            selectedTab = 'returnPendingLoan';
          }
          selectApp(selectedTab);
        });
        
        // open app pending
        function selectApp(selectedTab){
        $("#"+selectedTab).on('click', 'li', function() {
          var role = '<?php echo $this->session->userdata('position'); ?>';
          var id = $(this).attr('data');
          var status = $(this).attr('status');
          var dateIssued = $(this).attr('dateIssued');
          var verifiedBy = $(this).attr('verifiedBy');
          var verifiedThp = $(this).attr('verifiedThp');
          var takeHomePay = $(this).attr('payslip').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          var cheque = $(this).attr('chequeNo');
          var name = $(this).find('h2').text();
          var img = $(this).find('img').attr('src');
          $('#openLoanApp').attr('selectedname', name);
          $('#openLoanApp').attr('selectedid', id);
          $('#openLoanApp').modal('show');
          if(selectedTab == 'returnPendingLoan') {
            $('#thpInfo').hide();
            $('#thpVerifyInfo').hide();
            $('#cnInfo').hide();
            $('#cnVerifyInfo').hide();
            $('#openLoanApp').find('.modal-title').html("<a class='text-info'>New</a> - Application #" + id);
            $('#openLoanApp').find('.modal-footer').html('<div class="input-group input-group-sm"><div class="input-group-prepend"><span class="input-group-text px-2" id="basic-addon1">&#8369;</span></div><input type="text" class="form-control form-control-sm mr-2" placeholder="Input the payslip amount.." id="loanAppPayslipAmt" name="loanAppPayslipAmt" maxlength="8"><button type="button" class="btn btn-primary btn-sm mr-1 px-4 float-right" id="approveLoanAppBtn"><i class="far fa-check-circle mr-1"></i> Approve</button><button type="button" class="btn btn-danger btn-sm float-right px-2" id="cancelLoanAppBtn" data-toggle="modal" data-target="#cancelLoanNote"><i class="fas fa-times-circle"></i> Cancel</button></div>').attr('id', 'approve-cancel-PL');
            if(status == 'verified') {
              $('#approveLoanAppBtn').prop('disabled', true).html('<i class="far fa-check-circle"></i> Verified!');
            } else {
              $('#approveLoanAppBtn').prop('disabled', false).html('<i class="fas fa-arrow-circle-right"></i> Approve');
            }
            if(verifiedThp == 'verified') {
              $('#thpInfo').show();
              $('#thpVerifyInfo').show();
              $('span[name=loan_thp]').html('&#8369;' + takeHomePay);
              $('span[name=loan_thp_verified]').html(verifiedBy);
              if(role == 'Credit Officer') {
                $('#loanAppPayslipAmt').prop('disabled', true).val(takeHomePay + " — reviewed by: " + verifiedBy);
              } else {
                $('#approve-cancel-PL').hide();
              }
            } else {
              if(role == 'Credit Officer') {
                $('#loanAppPayslipAmt').prop('disabled', false).attr('placeholder', 'Input the payslip amount..');
              } else {
                $('#approve-cancel-PL').hide();
              }
            }
          } else if(selectedTab == 'returnApprovedLoans') {
            $('#openLoanApp').find('.modal-title').html("<a class='text-primary'>Approved</a> - Application #" + id);
            $('#thpInfo').show();
            $('#thpVerifyInfo').show();
            $('#cnInfo').hide();
            $('#cnVerifyInfo').hide();
            $('span[name=loan_thp]').html('&#8369;' + takeHomePay);
            $('span[name=loan_thp_verified]').html(verifiedBy);
            $('#openLoanApp').find('.modal-footer').html('<div class="input-group input-group-sm"><input type="text" class="form-control form-control-sm mr-2" placeholder="Enter cheque number.." id="chequeNumberInput" name="cheque_number" maxlength="8"><button type="button" class="btn btn-outline-success btn-sm float-right px-2" id="chequeLoanAppBtn"><i class="fas fa-arrow-circle-right fa-sm mr-1"></i> Submit cheque</button></div>').attr('id', 'issue-cheque-AL');
            if(status == 'verified') {
              $('#cnInfo').show();
              $('#cnVerifyInfo').show();
              $('span[name=loan_cn]').html(cheque);
              $('span[name=loan_cn_verified]').html(dateIssued);
              if(role == 'Treasurer') {
                $('#chequeLoanAppBtn').prop('disabled', true).html('<i class="far fa-check-circle"></i> Cheque Issued!');
                $('#chequeNumberInput').prop('disabled', true).val(cheque + " — cheque issued on: " + dateIssued);
              } else if(role == 'Administrator') {
                $('#openLoanApp').find('.modal-footer').html('<button type="button" class="btn btn-outline-success btn-sm float-right px-2" id="voucherLoanAppBtn"><i class="fas fa-arrow-circle-right fa-sm mr-1"></i>Create cheque</button>');
              } else {
                $('#issue-cheque-AL').hide();
              }
            } else {
              if(role == 'Treasurer') {
                $('#chequeNumberInput').prop('disabled', false).attr('placeholder', 'Enter cheque number..');
              } else if(role == 'Administrator') {
                $('#openLoanApp').find('.modal-footer').html('<div class="text-center"><em>Pending cheque number</em></div>');
              } else {
                $('#cnInfo').hide();
                $('#cnVerifyInfo').hide();
                $('#issue-cheque-AL').hide();
              }
            }
          } else if(selectedTab == 'returnDisapprovedLoans') {
            $('#approveLoanAppBtn').show();
            $('#cancelLoanAppBtn').hide();
          }
          populateLoanAppManagementPerm();
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
                $('span[name=loan_id]').text(data.loanapp_id);
                $('span[name=loan_type]').text(data.loan_name);
                $('span[name=loan_amt]').html('&#8369;' + data.loan_amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('span[name=loan_interest]').html('&#8369;' + data.loan_int.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('span[name=loan_deduc]').html('&#8369;' + data.monthly_deduc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('input[name=loan_deduc_hidden]').text(data.monthly_deduc);
                $('span[name=loan_term]').text(data.loan_term + ' month/s');

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

        function checkInputPayslipAmt() {
          if($('#loanAppPayslipAmt').val() == '') {
            $('#loanAppPayslipAmt').addClass('is-invalid');
            $('#loanAppPayslipAmt').attr('placeholder', 'Please input the payslip amount..');
          } else {
            $('#loanAppPayslipAmt').removeClass('is-invalid');
          }
        }

        $('#openLoanApp').on('keyup', '#loanAppPayslipAmt', function(){
          checkInputPayslipAmt();
        });

        // Change content of modal when aproving a loan - CC UI
        $('#openLoanApp').on('click', '#approveLoanAppBtn', function(){
          var name = $('#openLoanApp').attr('selectedname');
          if($('#loanAppPayslipAmt').val() != '') {
            $('#openLoanApp').modal('hide');
            $('#confirmationLoanAppModal').modal('show');
            $('#confirmationLoanAppModal').find('.modal-title').html('<p id="confirmationLoanAppBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p>Confirmation');
            $('#confirmationLoanAppModal').find('.modal-body').html("Accept <strong>"+ name +"</strong>'s application?");
            $('#confirmationLoanAppModal').find('.modal-footer').html('<button type="button" class="btn btn-success btn-sm mr-1" id="acceptLoanAppBtn"><i class="fas fa-check fa-sm mr-1"></i>  I am sure</button>');
          } else {
            $('#loanAppPayslipAmt').addClass('is-invalid');
            $('#loanAppPayslipAmt').attr('placeholder', 'Please input the payslip amount..');
          }
        });

        // Approve loan app - insert data to db
        $('#confirmationLoanAppModal').on('click', '#acceptLoanAppBtn', function(){
          var apostrophe = "'s";
          var id = $('#openLoanApp').attr('selectedid');
          var name = $('#openLoanApp').attr('selectedname');
          var ccUsername = '<?php echo $this->session->userdata('username'); ?>';
          var payslip = $('#loanAppPayslipAmt').val().replace(/\D/g, "");
          var monthlyDeduc = $('input[name=loan_deduc_hidden]').text();
          var thp = payslip - monthlyDeduc;
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
          }
        }

        $('#openLoanApp').on('keyup', '#chequeNumberInput', function(){
          checkInputChequeNo();
        });

        $('#openLoanApp').on('click', '#chequeLoanAppBtn', function(){
          if($('#chequeNumberInput').val() != '') {
            $(this).text('Are you sure?');
            $(this).click(function(){
              var id = $('#openLoanApp').attr('selectedid');
              var name = $('#openLoanApp').attr('selectedname');
              var cheque = $('#chequeNumberInput').val();
              var apostrophe = "'s";
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
        $('#college').selectize({
          create: true,
          maxOptions: 3,
          closeAfterSelect: true
        });
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
        $('input[name=sharecap]').keyup(function(){
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

        $('#permission-mngmt').click(function() {
          loadManageModuleDefaults();
          retrieveRolePermissions();
          getRoles();
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

        $('#saveMember').click(function() {
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
          var password = $('input[name=password]');
          var password2 = $('input[name=password2]');
          var city = $('input[name=city]');
          var zip = $('input[name=zip]');
          var position = $('select[name=position]');
          var birthday = $('input[id=birthday]');
          var sharecap = $('input[name=sharecap]');
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
          if(sharecap.val() == ''){
            sharecap.addClass('is-invalid');
            $('#invalidShareCapital').html('Please fill out this field.');
          } else {
            sharecap.removeClass('is-invalid');
            $('#invalidShareCapital').html('');
            result += '12';
          }

          if(result == '123456789101112') {
            var name = fname.val()+' '+mname.val()+' '+lname.val();
            var filteredShareCap = sharecap.val().replace(/\D/g, "");
            // Add member ajax call
            $.ajax({ 
              type    : 'ajax',
              method  : 'post',
              url     : url,
              data    : data + '&name=' + name + '&sharecap=' + filteredShareCap, 
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
          $('#returnRow').on('click', '.viewuser-perm4', function() {
            var apostrophe = "'s";
            var id = $(this).attr('user-id');
            var name = $(this).attr('user-name');
            var email = $(this).attr('user-email');
            var address = $(this).attr('user-address');
            var position = $(this).attr('user-position');
            var sharecap = $(this).attr('user-sharecap');
            var college = $(this).attr('user-college');
            var img = $(this).attr('user-img');
            $('#viewProfileModal').find('#userName').text(name);
            $('#viewProfileModal').find('#userPosition').text(position);
            $('#viewProfileModal').find('#userCollege').text(college);
            $('#viewProfileModal').find('#userAddress').text(address);
            $('#viewProfileModal').find('#userSharecap').html('Total share capital: <strong>&#8369;'+ sharecap +'</strong>');
            $('#viewProfileModal').find('#viewProfileImg').attr('src', '<?php echo base_url(); ?>assets/img/profile_img/' + img +'');
            $('#viewProfileModal').modal('show');
            $('#deleteuser-perm3').click(function() {
              $('#deleteModal').modal('show');
              $('#deleteModal').find('.modal-title').text('Delete user');
              $('#deleteModal').find('.modal-body').text("Are you sure you want to delete " + name + "'s account?");
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
          });

        // Wait for user search input..
        $('#searchMember').keyup(function() {
          var input = $(this).val();
          if(input != '') {
            search_user(input);
          } else {
            search_user();
          }
        });

        // Search members 
        function search_user(query) {
          $.ajax({
            type    : 'ajax',
            method  : 'post',
            url     : '<?php echo base_url() ?>administrators/search_user',

            async   : false,
            data    : {query : query},
            dataType: 'json',
            success: function(data) {
              var row = '';
              var i;
              if(data.length > 0) {
              for(i = 0; i < data.length; i++) {
                row += '<li class="list-group-item">' +
                          '<img id="membersListImg" src="<?php echo base_url(); ?>assets/img/profile_img/' + data[i].user_img + ' ?>" class="rounded-circle member-icon">' +
                          '<button href="javascript:;" class="btn btn-outline-success btn-sm float-right my-2 viewuser-perm4" style="display: block" user-id="' + data[i].id + '" user-name="' + data[i].name + '" user-position ="' + data[i].role_name + '" user-college="' + data[i].college + '" user-address="' + data[i].address + '" user-img="' + data[i].user_img + '" user-sharecap="' + data[i].total_share_capital + '">View Profile</button>' +
                          '<h5 class="member-name">' + data[i].name + '</h5>' +
                          '<p class="text-muted"><small>' + data[i].college + '</small></p>' +
                        '</li>';
              }  
              $('#returnRow').html(row);
            } else {
              row  =  '<div class="ml-4">' +
                      '<h4 class="mt-5"><strong class="text-danger">No results for ' + query + '</h4>' +
                      '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">The name you entered did not bring up any results.</h7>' +
                      '</div>';
            }
              $('#returnRow').html(row);
            },
            error: function() {
              alert('A database error occured!');
            }
          });
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
                              '</div>' + 
                              '<div class="card-footer" style="min-height: 40px">' + 
                                '<button href="javascript:;" class="btn btn-green btn-sm float-right archiveloan-perm3" id="archiveLoan" data="' + data[i].id + '" loanType="' + data[i].loan_name + '" style="display: block"><i class="fas fa-archive mr-2"></i>Archive</button>' +
                                '<button href="javascript:;" class="btn btn-green strong btn-sm float-right mr-1 editloan-perm2" id="editLoan" data="' + data[i].id + '" style="display: block"><i class="fas fa-cog mr-2"></i>Edit</button>' + 
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
        }

        // Retrieve latest date
        function getMember_latest_date() {
          $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>/administrators/getMember_latest_date',
            async: false,
            dataType: 'json',
            success: function(data) {
              var latestDate = '<p class="card-text small text-muted float-left mt-2"><em>Last updated: ' + data[0].register_date + '</em></p>';
              $('#returnMemberLatestDate').html(latestDate);
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        }

        // Add Loan Function
        $('#addloan-perm1').click(function() {
          $('#addLoanModal').modal('show');
          $('#addLoanForm')[0].reset();
          $('input[name=loan_name]').prop('disabled', false);
          $('#addLoanModal').find('.modal-title').text('Add Loan Type');
          $('#addLoanForm').attr('action', '<?php echo base_url() ?>loans/addLoan');
        });

        // Save Loan Function
        $('#saveLoan').click(function() {
          var url = $('#addLoanForm').attr('action');
          var data = $('#addLoanForm').serialize();
          // Form validation
          var name = $('input[name=loan_name]');
          var amount = $('input[name=loan_max_amt]');
          var term = $('input[name=loan_max_term]');
          var interest = $('input[name=loan_interest]');
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

          if(result == '1234') {
            var filteredAmt = amount.val().replace(/\D/g, "");
            $.ajax({ 
            type    : 'ajax',
            method  : 'post',
            url     : url,
            data    : data + '&filteredAmt=' + filteredAmt,
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
                get_latest_date();
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
        $('#returnLoans').on('click', '#editLoan', function() {
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
              $('input[name=loan_name]').val(data.loan_name);
              $('input[name=loan_max_amt]').val(data.loan_max_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
              $('input[name=loan_max_term]').val(data.loan_max_term);
              $('input[name=loan_interest]').val(data.loan_interest);
              $('input[name=loan_id').val(data.id);
              $('#addLoanModal').find('.modal-title').text('Edit Loan (' + data.loan_name + ')');
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        });

        // Archive Loan
        $('#returnLoans').on('click', '#archiveLoan', function() {
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

        // Show archived loans 
        $('#loansArchiveBtn').click(function(){
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
                                  '<p class="card-text text-secondary small">Archived on: <span class="text-secondary float-right">' + myDate + '</span></p>' +
                                '</div>' + 
                                '<div class="card-footer" style="min-height: 40px">' + 
                                  '<button href="javascript:;" class="btn btn-outline-danger btn-sm float-right editloan-perm2" id="deleteArchivedLoan" data="' + data[i].id + '" loanType="' + data[i].loan_name + '" style="display: block"><i class="fas fa-trash mx-1"></i></button>' + 
                                  '<button href="javascript:;" class="btn btn-outline-primary btn-sm float-right mr-1 archiveloan-perm3" id="unarchiveLoan" data="' + data[i].id + '" loanType="' + data[i].loan_name + '" style="display: block"><i class="fas fa-archive mr-1"></i>Unarchive</button>' +
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
                  $('#loansArchiveBtn').click();
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
        $('#returnLoanArchive').on('click', '#deleteArchivedLoan', function(){
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
                  $('#loansArchiveBtn').click();
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
          $('#loan-amount').attr('placeholder', '');
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
                $('#loan_type').attr('style', 'display:none');
                $('#loan_selector').attr('style', 'display:block');
                $('#loanapp_user_id').attr('status', 'oldUser');

                $.ajax({
                  type: 'ajax',
                  method: 'get',
                  url: '<?php echo base_url(); ?>loan_applications/oldUser_exsistingData',
                  data:{get_oldUser_loanData: user_id_no},
                  async: false,
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
                        var loan_type_list = '<option value="" disabled selected hidden>Select Loan Type..</option>';
                        var i;

                        for(i=0; i<result.length; i++ ) {
                            loan_type_list += '<option class="loanOptions" loan_id="'+ result[i].id +'" loan_interest="' + result[i].loan_interest + '" value="'+ result[i].loan_name +'">'+ result[i].loan_name +'</option>'
                        }

                        $('#loan_selector').html(loan_type_list);

                        $('#loan_selector').change(function() {
                          loan = $('#loan_selector').find(':selected').val();
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
                              $('#loan-amount').val(data[0].total_share_capital.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

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

              var data_holder =  "This loan max amount is " + max_comakers; 

              $('#loan-amount').attr({
                placeholder: data_holder,
                max_amount: max_comakers
              });
            }, error: function() {
              alert('Error on Get Loan Amount function');
            }
          });
        } 
        //loan amount function end 

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
               var store = '<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Invalid input! Please try again.</a><button type="button" class="close-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>';

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

          $('input[name="calc_loan_grossamt"]').val(calcTotal.toFixed(2) + ' pesos');
          $('input[name="calc_loan_monthlydeduc"]').val((calcTotal / calcTerm).toFixed(0) + ' pesos');
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

        // ledger part start
          function viewLedger() {
              $.ajax({
                type: 'ajax',
                url: '<?php echo base_url(); ?>loan_applications/viewLedger',
                async: false,
                dataType: 'json',
                success: function(result) {
                  

                }, error: function() {
                  alert('View Ledger data cannot be Found!');
                }
              });
          }

          $('#UL_inputMemberName').keyup(function() {
                var ULsearchMember = $(this).val();
                
                if(ULsearchMember != '') {
                  updateLedger(ULsearchMember);
                } else {
                  updateLedger();
                }

                var mid_hold = $('#memberSearch [value="' + ULsearchMember + '"]').data('mid');


               $('#UL_inputMemberId').attr('value', mid_hold);                
          });

          $('#UL_searchbtn').click(function() {
            var ul_member_id = $('#UL_inputMemberId').val();

            // $.ajax({
            //   type:'ajax',
            //   method: 'get',
            //   url: '<?php echo base_url();?>loan_applications/ledgerData',
            //   data: {sc_member_id:ul_member_id},
            //   async: false,
            //   dataType: 'json',
            //   success: function(result) {
            //     alert(result);
            //     var row = '';
            //     var i; 

            //     if (result.length > 0 ) {
            //       row += '<div class="form-group d-flex"><span class="font-weight-bold">Share Capital: <span><input type="number" min="0" class="form-control w-50"></div>';


            //       for(i=0; i<result.length; i++) {
            //         row += '<div class="form-group d-flex"><span class="font-weight-bold">'+ result[i].loan_name +': <span><input type="number" min="0" class="form-control w-50"></div>';
            //       }

            //       $('#update_LedgerData').html(row);
            //     } else {
            //        row += '<div class="form-group d-flex"><span class="font-weight-bold">Member has no record<span></div>';


            //       $('#update_LedgerData').html(row);
            //     }

            //   }, error: function(data) {

            //     alert(data);
            //   }
            // });
          });

          function updateLedger(ULsearchMember) {
            $.ajax({
              type: 'ajax',
              url: '<?php echo base_url();?>loan_applications/getAllMembers',
              data: {ULsearchMember: ULsearchMember},
              async: false,
              dataType: 'json',
              success: function(result) {
                var rows = '';
                var i;

                for(i=0; i < result.length; i++) {
                  rows += '<option data-mid="'+ result[i].id +'" value="'+ result[i].name +'">'
                }


                $('#memberSearch').html(rows);
              }, error: function() {
                alert('Error getting all members');
              }
            });
          }
        // ledger part end

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
          var data = new FormData($('#editProfileForm')[0]);
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


        var permArray1 = []; //Global variable
        var permArray2 = []; 
        var minusArray = []; 

        // User Module - Apply Button
        $('#manageModuleModal').on('click', '#applyUserModule', function() {
          $.each($('.childCheck:checked'), function() {
            permArray2.push($(this).val());
          });
          $.each($('.childCheck:not(:checked)'), function() {
            minusArray.push($(this).val());
          });
          var manageModuleConfirmationBody = '<div class="container">' +
                                                '<div class="row justify-content-center">' +
                                                  '<div class="form-group col-md-12 mb-2">' +
                                                    '<label for="confirmationPassword" class="custom-sm">Re-enter your account password to save changes.</label>' +
                                                    '<input type="password" class="form-control" placeholder="Password" id="confirmationPassword" name="userConfirmPass" autocomplete="false">' +
                                                  '</div>' +
                                                '</div>' +
                                              '</div>';

          var manageModuleConfirmationFooter = '<button type="button" class="btn btn-success btn-sm" id="saveUserModule">Save changes</button>' +
                                               '<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="cancelPasswordConfirmation">Cancel</button>';

          $('#modulesModalBody').css('height', 'auto');
          $('#manageModuleModal').find('.modal-title').html('<p id="manageModuleBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p>Save permission changes');           
          $('#manageModuleModal').find('.modal-body').html(manageModuleConfirmationBody);
          $('#manageModuleModal').find('.modal-footer').html(manageModuleConfirmationFooter);

          // Modules modal back button
          $('#manageModuleModal').on('click', '#manageModuleBackBtn', function() {
            loadManageModuleDefaults();
            retrieveRolePermissions();
            getRoles();
          });

          $('#saveUserModule').click(function() {
            var confirmUser = '<?php echo $this->session->userdata('username') ?>';
            var confirmPass = $('#confirmationPassword').val();
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              url     : '<?php echo base_url() ?>administrators/verifyAccountPassword',
              data    : { userName: confirmUser, userPass: confirmPass},
              async   : false,
              dataType: 'json',
              success: function(data) {
                loadManageModuleDefaults();
                getRoles();
                if(data == false) {
                  permArray2 = [];
                  minusArray = [];
                  retrieveRolePermissions();
                  $('#PermMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Incorrect password. Please try again.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn(); 
                } else { 
                  updatePermissions();
                  retrieveRolePermissions();  
                }
              },
              error: function() {
                alert('A database error occured!');
              } 
            });
          });
        });

        // User Module - Role Selection Button
        $('#manageModuleModal').on('click', '.wews', function() {
          $(".dropdown-mod:first-child").html($(this).text()+' <span class="caret"></span>');
          $('#setModuleForm').trigger('reset'); // Resets all input inside form
          retrieveRolePermissions();
        });


        function getRoles() {
          $.ajax({
            type    : 'ajax',
            url     : '<?php echo base_url() ?>administrators/getRoles',
            async   : false,
            dataType: 'json',
            success: function(data) {
              var roleName = '';
              for(var i = 1; i < data.length; i++) {
                roleName += '<a class="dropdown-item wews" href="#">' + data[i].role_name + '</a>';
              }
              $('#returnRoleNames').html(roleName);
            },
            error: function() {
              alert('A database error occured!');
            } 
          });
        }

        function updatePermissions2(permArray2) {
          if(minusArray.length != 0) {
            $.ajax({
              type: 'ajax',
              method: 'get',
              url: '<?php echo base_url() ?>/administrators/setPermissions2',
              data: {ids: minusArray},
              async: false,
              dataType: 'json',
              success: function(data) {
                if(data == true) {
                  if(permArray2.length == 0) {
                    $('#PermMsg').html('<p class="alert bg-primary alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, permission changes have been updated.</a>' +
                                          '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                            '<span aria-hidden="true">&times;</span>' +
                                          '</button>' +
                                        '</p>').fadeIn().delay(3500).fadeOut('fast'); 

                  } else {
                    $('#PermMsg').html('<p class="alert bg-primary alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, permission changes have been updated.</a>' +
                                          '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                            '<span aria-hidden="true">&times;</span>' +
                                          '</button>' +
                                        '</p>').fadeIn().delay(3500).fadeOut('fast'); 
                  }
                } else {
                  if(permArray2.length == 0) {
                    $('#PermMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Notice, you did not made any changes.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn(); 
                  } else {
                    $('#PermMsg').html('<p class="alert bg-primary alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, permission changes have been updated.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn().delay(3500).fadeOut('fast'); 
                  }
                }
              }, 
              error: function() {
                alert('A database error occured!');
              }
            });
            minusArray = [];
          } else {
            if(permArray2.length == 0) {
              $('#PermMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Notice, you did not made any changes.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn(); 

            } else {
              $('#PermMsg').html('<p class="alert bg-primary alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, permission changes have been updated.</a>' +
                                    '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                      '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                  '</p>').fadeIn().delay(3500).fadeOut('fast'); 
            }
          }
        }

        function updatePermissions() {
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>/administrators/setPermissions',
            data: {ids: permArray2},
            async: false,
            dataType: 'json',
            success: function(data) {
              if(data == true) {
                updatePermissions2(permArray2);
              } else { 
                permArray2 = [];
                updatePermissions2(permArray2);
              }
            }, 
            error: function() {
              alert('A database error occured!');
            }
          });
          permArray2 = [];
        }

        // Load modules modal content
        function loadManageModuleDefaults() {
          $('#manageModuleModal').find('.modal-title').text('Set user modules');    
          $('#manageModuleModal').find('#cancelPasswordConfirmation').text('Close');
          var defaultModuleModalBody =  '<form id="setModuleForm">'+
                                              '<div class="modal-body" id="modulesModalBody" style="height: 500px; overflow-y: auto;">'+
                                                '<div id="PermMsg" style="margin: -15px -15px 15px -15px"></div>'+
                                                '<div class="row">'+
                                                  '<div class="col-md-5 mb-3">'+
                                                    '<div class="dropdown">'+
                                                      '<button class="btn btn-secondary dropdown-toggle dropdown-mod" type="button" id="roleNameDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Member</button>'+
                                                      '<div class="dropdown-menu dropdown-mod" id="returnRoleNames" aria-labelledby="roleNameDropdown">'+
                                                        '<!-- return role names -->'+
                                                      '</div>'+
                                                    '</div>'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="row">'+
                                                  '<form id="manageModuleForm">'+
                                                    '<div class="col-md-6 returnChecks" id="returnChecks">'+
                                                      '<!-- parent options -->'+
                                                    '</div>'+
                                                    '<div class="col-md-6" id="returnChecks1">'+
                                                      '<!-- parent options -->'+
                                                    '</div>'+
                                                  '</form>'+
                                                '</div>'+
                                              '</div>'+
                                            '</form>';
          var defaultModuleModalFooter =  '<button type="button" class="btn btn-success btn-sm" id="applyUserModule">Save changes</button>' +
                                          '<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="closeModuleWindow">Close</button>';

          $('#returnModuleBody').html(defaultModuleModalBody);
          $('#manageModuleModal').find('.modal-footer').html(defaultModuleModalFooter);
        }

        // Populate all saved permissions for a specific role
        function retrieveRolePermissions() {
          var roleName = $('#roleNameDropdown').text();
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>/administrators/retrieveRolePermissions',
            data: {role : roleName},
            async: false,
            dataType: 'json',
            success: function(data) {
              var checks = '';
              var checks1 = '';
              var dashboard = '';
              var loans = '';
              var members = '';
              var records = '';
              var loanapp = '';
              var myloanrec = '';
              var comakers = '';
              var sharecap = '';
              var applyloan = '';
              var managemodule = '';
              var check = 'checked';
              for(var i = 0; i < data.length; i++) {
                if(i < 5) {
                  if(data[i].access == 1) {
                    dashboard += '<div class="form-check">'+
                                  '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                  '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                  '</div>';
                  } else {
                    dashboard += '<div class="form-check">'+
                                  '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                  '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                  '</div>';
                  }
                } else if(i < 10) {
                    if(data[i].access == 1) {
                      loans += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      loans += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i < 15) {
                    if(data[i].access == 1) {
                      members += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      members += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i < 20) {
                    if(data[i].access == 1) {
                      records += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      records += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i < 25) {
                    if(data[i].access == 1) {
                      loanapp += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      loanapp += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i < 30) {
                    if(data[i].access == 1) {
                      myloanrec += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      myloanrec += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i < 35) {
                    if(data[i].access == 1) {
                      comakers += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      comakers += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i < 40) {
                    if(data[i].access == 1) {
                      sharecap += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      sharecap += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i == 40) {
                    if(data[i].access == 1) {
                      applyloan += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      applyloan += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                } else if(i == 41) {
                    if(data[i].access == 1) {
                      managemodule += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '" ' + check + '>'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    } else {
                      managemodule += '<div class="form-check">'+
                                '<input class="form-check-input childCheck" type="checkbox" value="' + data[i].rp_id + '" id="' + data[i].pr_id + '">'+
                                '<label class="form-check-label" for="' + data[i].pr_id + '">' + data[i].perm_role + '</label>' +
                                '</div>';
                    }
                }

                switch(i) {
                  case 1:
                  if(data[i].access == 1) {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 6:
                  if(data[i].access == 1) {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 11:
                  if(data[i].access == 1) {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 16:
                  if(data[i].access == 1) {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 21:
                  if(data[i].access == 1) {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 26:
                  if(data[i].access == 1) {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 31:
                  if(data[i].access == 1) {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 36:
                  if(data[i].access == 1) {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 40:
                  if(data[i].access == 1) {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                  case 41:
                  if(data[i].access == 1) {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  } else {
                    checks1 += '<div class="h6 parentCheck" type="checkbox" value="' + data[i].perm_desc + '" id="' + data[i].perm_name + '">'+ data[i].perm_name + '</div>' +
                                 '<div class="' + data[i].perm_name + ' ml-2 mb-3"></div>';
                  }
                  break;
                }
              }
              
              $('#returnChecks').html(checks);
              $('.Dashboard').html(dashboard);
              $('.Loans').html(loans);
              $('.Members').html(members);
              $('.Records').html(records);
              $('.Loan-Applications').html(loanapp);

              $('#returnChecks1').html(checks1);
              $('.My-Loan-Records').html(myloanrec);
              $('.Co-Makers').html(comakers);
              $('.Share-Capital').html(sharecap);
              $('.Apply-Loan').html(applyloan);
              $('.Manage-Modules').html(managemodule);
            },
            error: function() {
              alert('bobo');
            }
          });
        }


        function populateRolePermissions() {
        <?php $role = $this->session->userdata('roleID') ?>
        $.ajax({
          type    : 'ajax',
          method  : 'get',
          url     : '<?php echo base_url() ?>administrators/testing',
          data    : {id : '<?php echo $role; ?>'},
          async   : false,
          dataType: 'json',
          success: function(data) {
            var all = [];
            for(var i = 0; i < data.length; i++) {
              $('#'+data[i].perm_desc).show();

              $.ajax({
              type    : 'ajax',
              method  : 'get',
              url     : '<?php echo base_url() ?>administrators/testing1',
              data    : {id : all.push(i), role_id : '<?php echo $role; ?>'},
              async   : false,
              dataType: 'json',
              success: function(data) {
                for(var i = 0; i < data.length; i++) {
                  $('#'+data[i].perm_role).show();
                  $('.'+data[i].perm_role).show();
                }
              },
              error: function() {
                alert('bobo');
              }
            });
            }
          },
          error: function() {
            alert('bobo');
          }
        });
        }

        function populateLoanAppManagementPerm(){
          <?php $role = $this->session->userdata('roleID') ?>
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>administrators/populateLoanAppManagementPerm',
            data    : {role_id : '<?php echo $role; ?>'},
            async   : false,
            dataType: 'json',
            success: function(data) {
              for(var i = 0; i < data.length; i++) {
                $('#'+data[i].perm_role).show();
                $('.'+data[i].perm_role).show();
              }
            },
            error: function() {
              alert('bobo');
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
