<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png"/>
    <title>TUPMMPC | Administrator</title>

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
    <link href="<?php echo base_url() ?>assets/css/admin.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
          <?php if($this->session->flashdata('user_signedin')): ?>
            <?php echo '<p class="alert bg-success alert-dismissable fade show text-center" id="loginWelcomeMsg" role="alert">
                      <button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button><a class="h7 text-white">'.$this->session->flashdata('user_signedin').
                      $this->session->userdata('username').'!'.'</a></p>';
            ?>
            <script type="text/javascript">
              $('#loginWelcomeMsg').fadeIn().delay(4000).fadeOut('slow');
            </script>
          <?php endif; ?>
        </div>
        <div class="row">
        <!-- Profile -->
          <div class="col-sm-padding col-sm-12 col-md-4 col-lg-3 offset-md mb-3">
            <div class="card">
              <div class="card-header bg-secondary p-5">
                <div id="displayUserImg" class="card-title">
                  <img src="<?php echo base_url(); ?>assets/img/profile_img/<?php echo $image['user_img']; ?>" class="img-thumbnail rounded-circle mx-auto d-block my-3">
                </div>
              </div>
              <div class="card-text mb-3 mx-3">
                <h6 id="displayUserName" class="admin-name text-center"><?php echo $image['name']; ?></h6>
                <h6 class="info-text text-center text-muted"><?php echo $this->session->userdata('position') ?></h6>
                <p class="text-center info-text m-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="list-group profile-menu" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="dashboard-tab" data-toggle="list" href="#dashboardTab" role="tab" aria-controls="home">Dashboard<i class="fas fa-home mr-2 mt-1 float-left"></i>  <i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loans-tab" data-toggle="list" href="#loansTab" role="tab" aria-controls="settings">Loans<i class="fas fa-credit-card mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="members-tab" data-toggle="list" href="#membersTab" role="tab" aria-controls="messages">Members<i class="fas fa-users mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="records-tab" data-toggle="list" href="#loanRecordTab" role="tab" aria-controls="settings">Loan Records<i class="fas fa-poll-h mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loanapps-tab" data-toggle="list" href="#loanAppTab" role="tab" aria-controls="settings"> Loan Applications<i class="fas fa-poll mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="loanrecords-tab" data-toggle="list" href="#recordsTab" role="tab" aria-controls="messages">My Loan Records<i class="fas fa-folder-open mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="comakers-tab" data-toggle="list" href="#coMakersTab" role="tab" aria-controls="messages">Co-Makers<i class="fas fa-users mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="sharecap-tab" data-toggle="list" href="#shareCapTab" role="tab" aria-controls="messages">Share Capital Records<i class="fas fa-money-check mr-2 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
                <a class="list-group-item list-group-item-action" id="applyloan-tab" data-toggle="list" href="#applyLoanTab" role="tab" aria-controls="messages">Apply Loan<i class="far fa-file-alt mr-2 mt-1 float-left"></i><i class="fas fa-chevron-right fa-sm float-right mt-1"></i></a>
              </div>
            </div>
          </div>

          <!-- Navigation Body -->
          <div class="col-sm-padding col-sm-12 col-md-8 col-lg-9 mb-3">
            <div class="card">
              <div class="tab-content">
                <!-- Home Part -->
                <div class="tab-pane fade show active" id="dashboardTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header">Dashboard</h2>
                  <div class="card-body card-body-mh-100 p-4">
                      <div class="row mb-3">
                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row px-2">
                                <div class="col-md-5 text-center">
                                  <div class="row text-primary" id="icon" style="font-size: 4vw"><i class="fas fa-users"></i></div>
                                </div>

                                <div class="col-md-7 pl-4">
                                  <div class="row" style="font-size: 2vw"><span class="pl-2 h1">200</span></div>
                                  <div class="row text-center" style="font-size: 2vw"><span class="h4">All Members</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row px-2">
                                <div class="col-md-5 text-center">
                                  <div class="row text-success" id="icon" style="font-size: 4vw"><i class="fas fa-thumbs-up"></i></div>
                                </div>

                                <div class="col-md-7 pl-4">
                                  <div class="row" style="font-size: 2vw"><span class="pl-2 h1">201</span></div>
                                  <div class="row text-center" style="font-size: 2vw"><span class="h4">Approved Loans</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row px-2">
                                <div class="col-md-5 text-center">
                                  <div class="row text-danger" id="icon" style="font-size: 4vw"><i class="fas fa-thumbs-down"></i></div>
                                </div>

                                <div class="col-md-7 pl-4">
                                  <div class="row" style="font-size: 2vw"><span class="pl-2 h1">220</span></div>
                                  <div class="row text-center" style="font-size: 2vw"><span class="h4">Disapproved Loans</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-7">
                          <div class="card">
                            <!-- <div class="card-header"><span class="h5">Loan Track</span></div> -->
                            <div class="card-body" style="height: 21em">
                              <canvas id="line-chart" class="mt-4"></canvas>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="card">
                            <!-- <div class="card-header"><span>Loan Applied</span></div> -->
                            <div class="card-body">  
                              <canvas id="pie-chart"></canvas>
                            </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                </div>

                <!-- Loans Part -->
                <div class="tab-pane fade show" id="loansTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header"><strong>Loans</strong></h2>
                    <div class="card-body card-body-mh">
                      <div class="no-padding" id="addLoanMsg"></div>
                      <div class="row" id="returnColumn">
                        <!-- Loans list from ajax call -->
                      </div>
                    </div>
                    <div class="card-footer">
                      <div id="returnLatestDate"></div>
                      <button id="addloan-perm1" class="btn btn-success float-right mb-2"><i class="fas fa-plus mr-2"></i>Add Loan</button>

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
                                <div class="form-row justify-content-center">
                                  <div class="form-group col-md-10 mb-2">
                                    <label for="name" class="custom-sm">Loan Type</label>
                                    <input type="text" class="form-control" placeholder="Enter Loan Name.." id="name" name="loan_name">
                                    <div class="invalid-feedback" id="invalidName"></div>
                                  </div>
                                  <div class="form-group col-md-10 mb-2">
                                    <label for="amount" class="custom-sm">Max Amount</label>
                                    <select class="custom-select custom-small-text" id="amount" name="loan_max_amt">
                                      <option selected hidden>Select Loan Max Amount..</option>
                                      <option>Php 5,000.00</option>
                                      <option>Php 10,000.00</option>
                                      <option>Php 15,000.00</option>
                                      <option>Php 20,000.00</option>
                                      <option>Php 25,000.00</option>
                                      <option>Php 50,000.00</option>
                                      <option>Php 100,000.00</option>
                                      <option>Php 150,000.00</option>
                                      <option>Php 200,000.00</option>
                                      <option>Php 300,000.00</option>
                                      <option>Php 400,000.00</option>
                                      <option>Php 500,000.00</option>
                                      <option>Php 750,000.00</option>
                                      <option>Php 1,000,000.00</option>
                                      <option>Php 1,500,000.00</option>
                                      <option>Php 2,000,000.00</option>
                                    </select>
                                    <div class="invalid-feedback" id="invalidAmt"></div>
                                  </div>
                                  <div class="form-group col-md-10 mb-2">
                                    <label for="term" class="custom-sm">Max Term</label>
                                    <select class="custom-select custom-small-text" id="term" name="loan_max_term">
                                      <option selected hidden>Select Loan Max Term..</option>
                                      <option>3 months</option>
                                      <option>6 months</option>
                                      <option>12 months / 1 year</option>
                                      <option>24 months / 2 years</option>
                                      <option>36 months / 3 years</option>
                                      <option>48 months / 4 years</option>
                                    </select>
                                    <div class="invalid-feedback" id="invalidTerm"></div>
                                  </div>
                                  <div class="form-group col-md-10">
                                    <label for="interest" class="custom-sm">Interest</label>
                                    <select class="custom-select custom-small-text" id="interest" name="loan_interest">
                                      <option selected hidden>Select Loan Interest..</option>
                                      <option>0%</option>
                                      <option>0.5%</option>
                                      <option>0.75%</option>
                                      <option>1%</option>
                                      <option>2%</option>
                                      <option>3%</option>
                                      <option>5%</option>
                                      <option>10%</option>
                                      <option>15%</option>
                                      <option>20%</option>
                                      <option>25%</option>
                                    </select>
                                    <div class="invalid-feedback" id="invalidInterest"></div>
                                  </div>
                                </div>
                              </div>
                            </form>
                            <div class="modal-footer">
                              <button type="submit" id="saveLoan" class="btn btn-success">Apply</button>
                              <button type="button" id="closeLoan" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                <!-- Members Part -->
                <div class="tab-pane fade show" id="membersTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header">Members</h2>
                    <div class="card-body card-body-mh">
                      <div class="no-padding" id="addMemberMsg"></div>
                      <!--Search Bar -->
                        <form class="form" id="searchuser-perm1">
                          <div class="row">
                            <div class="col-sm-12 col-md-8 mb-2">
                              <input type="text" class="form-control" placeholder="Search member.." aria-label="Search for a member" id="searchMember" name="searchMember">
                            </div>
                            <div class="col-sm-12 col-md-4 mb-2">
                              <div class="input-group">
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
                    <div class="card-footer">
                      <div id="returnMemberLatestDate"></div>
                      <button class="btn btn-success float-right mb-2" id="adduser-perm2"><i class="fas fa-plus mr-2"></i>Add New Member</button>
                    </div>


                <!-- VIEW PROFILE MODAL -->
                <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success p-5 profile-header">
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
                        <p class="text-center"><small id="userCollege"></small>&nbsp;&nbsp;|&nbsp;&nbsp;<small id="userAddress"></small></p>
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
                          <div class="modal-body">
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label for="firstname" class="custom-sm">First Name:</label>
                                <input type="text" class="form-control" placeholder="Enter First Name" aria-describedby="Fname" id="firstname" name="Fname">
                                <div class="invalid-feedback" id="invalidFname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="address" class="custom-sm">City:</label>
                                <input type="text" class="form-control" placeholder="Enter Address" aria-describedby="Address" id="address" name="city">
                                <div class="invalid-feedback" id="invalidCity"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="middlename" class="custom-sm">Middle Name:</label>
                                <input type="text" class="form-control" placeholder="Enter Middle Name" aria-describedby="Mname" id="middlename" name="Mname">
                                <div class="invalid-feedback" id="invalidMname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="zipcode" class="custom-sm">Zipcode:</label>
                                <input type="text" class="form-control" placeholder="Enter Zipcode" aria-describedby="Zipcode" id="zipcode" name="zip">
                                <div class="invalid-feedback" id="invalidZip"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="lastname" class="custom-sm">Last Name:</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name" aria-describedby="Lname" id="lastname" name="Lname">
                                <div class="invalid-feedback" id="invalidLname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="position" class="custom-sm">Position:</label>
                                <select type="text" class="custom-select" id="position" name="position">
                                  <option selected hidden>Select Role..</option>
                                  <option value="2">Member</option>
                                  <option value="4">Treasurer</option>
                                  <option value="1">Administrator</option>
                                  <option value="3">Credit Officer</option>
                                </select>
                                <div class="invalid-feedback" id="invalidPos"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="username" class="custom-sm">Username:</label>
                                <input type="text" class="form-control" placeholder="Enter Username" aria-describedby="Uname" id="username" name="Uname">
                                <div class="invalid-feedback" id="invalidUname"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="birthday" class="custom-sm">Birthday:</label>
                                <input type="date" class="form-control" placeholder="Date" name="birthday" aria-describedby="Birthday" id="birthday" name="bday">
                                <div class="invalid-feedback" id="invalidBday"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="email" class="custom-sm">Email:</label>
                                <input type="text" class="form-control" placeholder="Enter Email" aria-describedby="Email" id="email" name="email">
                                <div class="invalid-feedback" id="invalidEmail"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="college" class="custom-sm">College:</label>
                                <select class="custom-select" id="college" name="college">
                                  <option selected hidden>Select College..</option>
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
                                <label for="password" class="custom-sm">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Password" aria-describedby="Password" id="password" name="password">
                                <div class="invalid-feedback" id="invalidPass"></div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="password2" class="custom-sm">Verify Password:</label>
                                <input type="password" class="form-control" placeholder="Re-type Password" aria-describedby="Password2" id="password2" name="password2">
                                <div class="invalid-feedback" id="invalidPass2"></div>
                              </div>
                            </div>
                          </div> 
                        </form>     
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success float-right" id="saveMember"><i class="fas fa-plus-circle mx-1"></i> Add Member</button>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>

              <!-- Loan Application Lists -->
              <div class="tab-pane fade show" id="loanAppTab" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-header">
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
                      <a class="nav-link" data-toggle="tab" href="#disapproved_loans">Cancelled<span id="disapprovedNotif" class="badge badge-secondary ml-1"></span></a>
                    </li>
                  </ul>
                </div>
                  <div class="tab-content card-body card-body-mh">
                    <div id="loanAppMsg" class="no-padding"></div>
                    <div class="tab-pane list-group active" id="pending_loans">
                      <div id="returnPendingLoan"></div>
                    </div>

                    <div class="tab-pane list-group" id="approved_loans">
                      <div id="returnApprovedLoans"></div>
                    </div>

                    <div class="tab-pane list-group" id="disapproved_loans">
                      <div id="returnDisapprovedLoans"></div>
                    </div>

                    <!-- get pending loans ajax -->
                      <script type="text/javascript">
                        $(function() {
                          
                          getPendingLoans();
                          getApprovedLoans();
                          getDisapprovedLoans();

                          function getPendingLoans(){
                            $.ajax({
                              type: 'ajax',
                              url: '<?php echo base_url() ?>loans/getPendingloans',
                              async: false,
                              dataType: 'json',
                              success: function(data) { 
                                if(data['numrows'] > 0) {
                                  $('#pendingNotif').html(data['numrows']); 
                                } else {
                                  $('#pendingNotif').html('0');
                                }
                                if(data) {
                                  var row = '';
                                  var i; 
                                  for(i = 0; i < data['numrows']; i++){
                                    row += '<li class="list-group-item" data-toggle="modal" data-target="#openLoanAppForm" data="' + data['result'][i].loanapp_id + '" style="cursor: pointer">' +
                                              '<img src="<?php echo base_url(); ?>assets/img/profile_img/' + data['result'][i].user_img +'" class="rounded-circle member-icon">' +
                                                '<span class=" badge badge-primary p-2 mr-2 w-15 float-right">' + data['result'][i].date_created + '</span>' +
                                                '<h2 class="member-name">' + data['result'][i].name + '</h2>' +
                                              '<p class="text-muted"><small>' + data['result'][i].loan_type + '</small></p>' +
                                            '</li>';                           
                                  } 
                                  $('#returnPendingLoan').html(row);
                                } else {
                                    row = '<div class="ml-4">' +
                                           '<h4 class="mt-5"><strong class="text-success">Great job!</h4>' +
                                           '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">All applications are approved! Nothing to display.</h7>' +
                                           '</div>';
                                }
                                $('#returnPendingLoan').html(row); 
                              }, 
                              error: function(){
                                alert('ERROR!');
                              }
                            });
                          }

                          function getApprovedLoans(){
                            $.ajax({
                              type: 'ajax',
                              url: '<?php echo base_url() ?>loans/getApprovedLoans',
                              async: false,
                              dataType: 'json',
                              success: function(data){
                                if(data['numrows'] > 0) {
                                  $('#approvedNotif').html(data['numrows']); 
                                } else {
                                  $('#approvedNotif').html('0');
                                }
                                if(data) {
                                  var row = ''; 
                                  var i; 
                                  for(i=0; i < data['numrows']; i++){
                                    row += '<li class="list-group-item" data-toggle="modal" data-target="#openLoanAppForm" data="' + data['result'][i].loanapp_id + '" style="cursor: pointer">' +
                                              '<img src="<?php echo base_url(); ?>assets/img/profile_img/' + data['result'][i].user_img +'" class="rounded-circle member-icon">' +
                                                '<span class=" badge badge-primary p-2 mr-2 w-15 float-right">' + data['result'][i].date_created + '</span>' +
                                                '<h2 class="member-name">' + data['result'][i].name + '</h2>' +
                                              '<p class="text-muted"><small>' + data['result'][i].loan_type + '</small></p>' +
                                            '</li>';   
                                  }
                                  $('#returnApprovedLoans').html(row);
                                } else {
                                    row = '<div class="ml-4">' +
                                          '<h4 class="mt-5"><strong class="text-danger">Uh oh!</h4>' +
                                          '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">You might want to review more applications. Nothing to display.</h7>' +
                                          '</div>';
                                }
                                $('#returnApprovedLoans').html(row); 
                              }, 
                                error: function(){
                                  alert('ERROR');
                                }
                            });
                          }

                          function getDisapprovedLoans(){
                            $.ajax({
                              type: 'ajax',
                              url: '<?php echo base_url() ?>loans/getDisapprovedLoans',
                              async: false,
                              dataType: 'json',
                              success: function(data){
                                if(data['numrows'] > 0) {
                                  $('#disapprovedNotif').html(data['numrows']);
                                } else {
                                  $('#disapprovedNotif').html('0');
                                }
                                if(data) {
                                  var row = '';
                                  var i; 
                                  for(i=0; i < data['numrows']; i++){
                                    row += '<li class="list-group-item" data-toggle="modal" data-target="#openLoanAppForm" data="' + data['result'][i].loanapp_id + '" style="cursor: pointer">' +
                                              '<img src="<?php echo base_url(); ?>assets/img/profile_img/' + data['result'][i].user_img +'" class="rounded-circle member-icon">' +
                                                '<span class=" badge badge-primary p-2 mr-2 w-15 float-right">' + data['result'][i].date_created + '</span>' +
                                                '<h2 class="member-name">' + data['result'][i].name + '</h2>' +
                                              '<p class="text-muted"><small>' + data['result'][i].loan_type + '</small></p>' +
                                            '</li>';   
                                  }
                                  $('#returnDisapprovedLoans').html(row);
                                } else {
                                    row = '<div class="ml-4">' +
                                          '<h4 class="mt-5"><strong class="text-success">Looks good!</h4>' +
                                          '<h7 style="color: #66757f; font-weight: light; padding-top: 20px">No applications have been cancelled! Nothing to display.</h7>' +
                                          '</div>';
                                }
                                $('#returnDisapprovedLoans').html(row); 
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
                            var id = $(this).attr('data');
                            var name = $(this).find('h2').text();
                            var img = $(this).find('img').attr('src');
                            $('#openLoanApp').modal('show');
                            $('#openLoanApp').find('.modal-dialog').removeClass('modal-md');
                            $('#openLoanApp').find('.modal-title').text("Application #" + id);
                            if(selectedTab == 'returnPendingLoan') {
                              $('#approveLoanApp').show();
                              $('#cancelLoanApp').show();
                              $('#acceptLoanApp').hide();
                              $('#declineLoanAppBtn').hide();
                            } else if(selectedTab == 'returnApprovedLoans') {
                              $('#cancelLoanApp').show();
                              $('#approveLoanApp').hide();
                              $('#acceptLoanApp').hide();
                              $('#declineLoanAppBtn').hide();
                            } else if(selectedTab == 'returnDisapprovedLoans') {
                              $('#approveLoanApp').show();
                              $('#acceptLoanApp').hide();
                              $('#cancelLoanApp').hide();
                              $('#declineLoanAppBtn').hide();
                            }
                            $('#defaultLoanAppBody').show();
                            $('#confirmationLoanAppBody').hide();
                            $('#cancellationLoanAppBody').hide();
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
                                  $('a[name=loanApplicantAddress]').text(data.address);
                                  $('span[name=loan_id]').text(data.loanapp_id);
                                  $('span[name=loan_type]').text(data.loan_type);
                                  $('span[name=loan_amt]').text('PHP ' + data.loan_amount);
                                  $('span[name=loan_term]').text(data.loan_term + ' months');

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
                                      comakers += '<a class="custom-xs h6">Co-maker ' + i + ':<span class="userLoanInfo ml-2" name="comaker_' + i + '">' + cm + '</span></a><br>';
                                    }
                                    $('#returnAppComakers').html(comakers);
                                  } else {
                                    $('#returnAppComakers').html('Nothing to display.');
                                  }

                                  // Change content of modal
                                  $('#approveLoanApp').click(function(){
                                    $('#openLoanApp').find('.modal-dialog').addClass('modal-md');
                                    $('#openLoanApp').find('.modal-title').html('<p id="approveLoanAppBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p>Confirmation');
                                    $('#confirmationLoanAppBody').html("Accept "+ data.name +"'s application?");
                                    if(selectedTab == 'returnPendingLoan') {
                                      $('#approveLoanApp').hide();
                                      $('#cancelLoanApp').hide();
                                      $('#acceptLoanApp').show();
                                      $('#declineLoanAppBtn').hide();
                                    } else if(selectedTab == 'returnDisapprovedLoans') {
                                      $('#approveLoanApp').hide();
                                      $('#acceptLoanApp').show();
                                      $('#cancelLoanApp').hide();
                                      $('#declineLoanAppBtn').hide();
                                    }
                                    $('#defaultLoanAppBody').hide();
                                    $('#confirmationLoanAppBody').show();
                                  });

                                  // Back button in loan application
                                  $('#openLoanApp').on('click', '#approveLoanAppBackBtn', function(){
                                    $('#openLoanApp').find('.modal-dialog').removeClass('modal-md');
                                    $('#openLoanApp').find('.modal-title').text("Application #" + id);
                                    $('#confirmationLoanAppBody').hide();
                                    $('#acceptLoanApp').hide();
                                    $('#cancelLoanApp').show();
                                    $('#defaultLoanAppBody').show();
                                    $('#approveLoanApp').show();
                                  });

                                  //cancel loan app
                                  $('#openLoanApp').on('click', '#cancelLoanApp', function(){
                                    var name = $('#'+selectedTab).find('li[data=' + id + ']').find('h2').text();
                                    var apostrophe = "'s";
                                    $('#openLoanApp').find('.modal-dialog').addClass('modal-md');
                                    $('#openLoanApp').find('.modal-title').html('<p id="cancelLoanBackBtn" class="fas fa-chevron-left mr-4" style="font-size: 15px; color: gray; cursor: pointer"></p>Cancellation');
                                    $('#defaultLoanAppBody').hide();
                                    $('#cancellationLoanAppBody').html('<div id="disapprovedRequirements">' +
                                                                        "<a class='mb-2'>You're about to cancel <strong>" + name + "</strong>'s application. Please note all the missed requirements below.</a>" +
                                                                        '<hr>' +
                                                                        '<div class="form-group">' +
                                                                          '<label for="exampleFormControlTextarea1">Note:</label>' +
                                                                          '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>' +
                                                                        '</div>' +
                                                                        '</div>');
                                    $('#cancellationLoanAppBody').show();
                                    $('#approveLoanApp').hide();
                                    $('#cancelLoanApp').hide();
                                    $('#declineLoanAppBtn').show();
                                    $.ajax({
                                      type    : 'ajax',
                                      method  : 'get',
                                      url     : '<?php echo base_url() ?>administrators/cancelLoanApp',
                                      data    : {id:id},
                                      async   : false,
                                      dataType: 'json',
                                      success : function(data) {
                                        $('#openLoanApp').modal('hide');
                                        $('#loanAppMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + data.name + apostrophe + ' application has been cancelled.</a>' +
                                                    '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                                      '<span aria-hidden="true">&times;</span>' +
                                                    '</button>' +
                                                  '</p>').fadeIn().delay(3000).fadeOut('fast'); 
                                        getPendingLoans();
                                        getApprovedLoans();
                                        getDisapprovedLoans();
                                      },
                                      error: function() {
                                        alert('Error!');
                                      }
                                    });

                                    // Back button in loan cancellation
                                      $('#openLoanApp').on('click', '#cancelLoanBackBtn', function(){
                                        $('#openLoanApp').find('.modal-dialog').removeClass('modal-md');
                                        $('#openLoanApp').find('.modal-title').text("Application #" + id);
                                        if(selectedTab == 'returnPendingLoan') {
                                          $('#approveLoanApp').show();
                                          $('#cancelLoanApp').hide();
                                          $('#acceptLoanApp').hide();
                                          $('#declineLoanAppBtn').show();
                                        } else if(selectedTab == 'returnApprovedLoans') {
                                          $('#cancelLoanApp').show();
                                          $('#approveLoanApp').hide();
                                          $('#acceptLoanApp').hide();
                                          $('#declineLoanAppBtn').hide();
                                        } else if(selectedTab == 'returnDisapprovedLoans') {
                                          $('#approveLoanApp').show();
                                          $('#acceptLoanApp').hide();
                                          $('#cancelLoanApp').hide();
                                          $('#declineLoanAppBtn').hide();
                                        }
                                        $('#cancellationLoanAppBody').hide();
                                        $('#defaultLoanAppBody').show();
                                      });

                                  });                                
                                },
                                error: function() {
                                  alert('Error!');
                                }
                              });
                            });
                          }

                          // approve loan app
                          $('#openLoanApp').on('click', '#acceptLoanApp', function(){
                            var id = $("#"+selectedTab).find('li').attr('data');
                            var apostrophe = "'s";
                            $.ajax({
                              type    : 'ajax',
                              method  : 'get',
                              url     : '<?php echo base_url() ?>administrators/manageLoanApps',
                              data    : {id:id},
                              async   : false,
                              dataType: 'json',
                              success : function(data) {
                                $('#openLoanApp').modal('hide');
                                $('#loanAppMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + data.name + apostrophe + ' application has been approved.</a>' +
                                            '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                              '<span aria-hidden="true">&times;</span>' +
                                            '</button>' +
                                          '</p>').fadeIn().delay(3000).fadeOut('fast'); 
                                getPendingLoans();
                                getApprovedLoans();
                                getDisapprovedLoans();
                              },
                              error: function() {
                                alert('Error!');
                              }
                            });
                          });
                      });
                    </script>
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
                        <div class="modal-body">
                          <div id="defaultLoanAppBody">
                            <div class="row">
                              <img id="loanAppFormImg" class="rounded w-25 h-25 ml-3" src="">
                                <div class="col align-self-start">
                                  <label name="loanApplicant" class="custom-sm h6"></label><br>
                                  <a name="loanApplicantEmail" class="small primary"></a><br>
                                  <a name="loanApplicantCollege" class="small"></a><br>
                                  <a name="loanApplicantAddress" class="small"></a><br>
                                  <a name="loanApplicantRegDate" class="small"></a>
                                </div>
                                <div class="col align-self-start">
                                  <label name="as" class="custom-sm h6">Confirmations</label><br>
                                  <a name="as" class="small primary">Credit Officer 1: <a href="#" class="badge badge-success" data-toggle="tooltip" data-placement="right" title="Verified on: Dec 25 2018">Verified <span class="far fa-check-circle"></span></a></a><br>
                                  <a name="as" class="small primary">Credit Officer 2: <a href="#" class="badge badge-danger" data-toggle="tooltip" data-placement="right" title="Pending">Pending <span class="far fa-times-circle"></span></a></a><br>
                                  <a name="as" class="small primary">Credit Officer 3: <a href="#" class="badge badge-danger" data-toggle="tooltip" data-placement="right" title="Pending">Pending <span class="far fa-times-circle"></span></a></a><br>
                                </div>
                              </div>
                            <hr>
                            <form class="row mt-3" id="LoanAppInfo">
                              <div class="col-5">
                                <h6 class="mb-1">Loan Info:</h6>
                                <div class="container">
                                    <a class="custom-xs h6">Application ID:<span class="userLoanInfo ml-2" name="loan_id"></span></a><br>
                                    <a class="custom-xs h6">Type:<span class="userLoanInfo ml-2" name="loan_type"></span></a><br>
                                    <a class="custom-xs h6">Term:<span class="userLoanInfo ml-2" name="loan_term"></span></a><br>
                                    <a class="custom-xs h6">Amount:<span class="userLoanInfo ml-2" name="loan_amt"></span></a><br>
                                    <a class="custom-xs h6">Payslip:</a>
                                </div>
                              </div>
                              <div class="col-7">
                                <h6 class="mb-1">Co-makers:</h6>
                                <div id="returnAppComakers" class="container">
                                </div>
                              </div>
                            </form>
                          </div>
                          <div id="confirmationLoanAppBody">
                          </div>
                          <div id="cancellationLoanAppBody">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="ml-auto">
                            <button type="button" class="btn btn-primary btn-sm" id="approveLoanApp"><i class="fas fa-check fa-sm mr-1"></i> Approve</button>
                            <button type="button" class="btn btn-success btn-sm" id="acceptLoanApp"><i class="fas fa-check fa-sm mr-1"></i> I'm sure</button>
                            <button type="button" class="btn btn-danger btn-sm" id="declineLoanAppBtn"><i class="fas fa-times fa-sm mr-1"></i> I'm sure</button>
                            <button type="button" class="btn btn-danger btn-sm" id="cancelLoanApp" data-toggle="modal" data-target="#cancelLoanNote"><i class="fas fa-times fa-sm mr-1"></i> Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- RECORDS Part -->
                <div class="tab-pane fade show" id="recordsTab" role="tabpanel" aria-labelledby="home-tab">
                  <h2 class="card-header">Records</h2>
                  <div class="card-body card-body-mh">
                        <div class="card text-center">
                        <div class="card-header">
                          <div class=" d-flex justify-content-center mx-3">
                            <ul class="nav nav-pills">
                              <li class="nav-item"><a class="nav-link border border-primary p-1 mx-2" data-toggle="tab" href="#sc">SHARE CAPITAL</a></li>
                              <li class="nav-item"><a class="nav-link border border-primary p-1 mx-2" data-toggle="tab" href="#mpl">MULTI-PURPOSE</a></li>
                              <li class="nav-item"><a class="nav-link border border-primary p-1 mx-2" data-toggle="tab" href="#rl">REGULAR</a></li>
                              <li class="nav-item"><a class="nav-link border border-primary p-1 mx-2" data-toggle="tab" href="#cl">CALAMITY</a></li>
                              <li class="nav-item"><a class="nav-link border border-primary p-1 mx-2" data-toggle="tab" href="#bel">BALIK-ESKWELA</a></li>
                              <li class="nav-item"><a class="nav-link border border-primary p-1 mx-2" data-toggle="tab" href="#bl">BIRTHDAY</a></li>
                              <li class="nav-item"><a class="nav-link border border-primary p-1 mx-2" data-toggle="tab" href="#al">APPLIANCE</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane container active" id="sc">
                              <table class="table table-hover table-bordered text-center text-light">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Date</th>
                                    <th>OR Given</th>
                                    <th>Amt Loaned</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            
                            <div class="tab-pane container" id="mpl">
                              <table class="table table-hover table-bordered text-center text-light">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Date</th>
                                    <th>OR Given</th>
                                    <th>Amt Loaned</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  
                                </tbody>
                              </table>
                            </div>

                            <div class="tab-pane container" id="rl">
                              <table class="table table-hover table-bordered text-center text-light">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Date</th>
                                    <th>OR Given</th>
                                    <th>Amt Loaned</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            
                            <div class="tab-pane container" id="cl">
                              <table class="table table-hover table-bordered text-center text-light">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Date</th>
                                    <th>OR Given</th>
                                    <th>Amt Loaned</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tbody>
                              </table>                              
                            </div>
                            
                            <div class="tab-pane container" id="bel">
                              <table class="table table-hover table-bordered text-center text-light">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Date</th>
                                    <th>OR Given</th>
                                    <th>Amt Loaned</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            
                            <div class="tab-pane container" id="bl">
                              <table class="table table-hover table-bordered text-center text-light">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Date</th>
                                    <th>OR Given</th>
                                    <th>Amt Loaned</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            
                            <div class="tab-pane container" id="al">
                              <table class="table table-hover table-bordered text-center text-light">
                                <thead class="bg-primary">
                                  <tr>
                                    <th>Date</th>
                                    <th>OR Given</th>
                                    <th>Amt Loaned</th>
                                    <th>Payments</th>
                                    <th>Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                </div>

                <!-- Loan Application part -->
                <div class="tab-pane fade show" id="applyLoanTab" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card-header">
                    <span class="h5">Loan Application Form</span>
                  </div>
                  <form class="p-4" id="loanAppForm">
                    <div class="card-body card-body-mh">
                      <div class="loanapp_alerts" id="loanapp_alerts">
                        <!-- alerts incase of error -->
                      </div>

                        <div class="form-group">
                          <input type="text" name="loanapp-username" id="loanapp_username" class="form-control">
                        </div>

                        <div class="form-group">
                          <input type="text" name="loanapp-name" id="loanapp_name" class="form-control">
                        </div>

                        <div class="form-group">
                          <input type="text" name="loan-type" id="loan_type" class="form-control" style="display: block" disabled>

                          <select class="custom-select mt-2" name="loan_selector" id="loan_selector" style="display: block">
                             <!-- ajax insert loan types -->
                          </select>
                        </div>

                        <div class="form-group">
                          <select class="custom-select" name="loan-term" id="loan_term" required>
                            <!-- ajax insert loan terms-->
                          </select>
                        </div>

                        <div class="input-group mb-3" id="loanapp-amount">
                          <div class="input-group-prepend">
                            <span class="input-group-text">&#8369;</span>
                          </div>
                          <input type="number" class="form-control " name="loan-amount" id="loan-amount" placeholder="0,000,000.00">
                        </div>

                        <div class="custom-file mb-3" id="loanapp-payslip">
                          <input type="file" class="custom-file-input" id="customFile" name="user-attachment">
                          <label class="custom-file-label text-muted" for="customFile">Attach Payslip</label>
                        </div>

                        <input type="hidden" id="comakerCount">
                        <div id="loanapp-cm-application">
                          <!--Number of Co Maker depedency insert here -->
                        </div>

                        <hr class="mb-4">

                        <div class="d-flex justify-content-center">
                          <button type="button" id="loanapp_submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                  </form>
                </div>

                <!-- ALL MODAL UI ARE HERE -->
                <!-- Delete Loan Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Delete Loan</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Do you really want to delete this loan?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteRecordBtn">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                  <div class="modal-dialog modal-dialog-centered" role="document">
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
                <!-- ALL MODAL UI ARE HERE -->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    


    <script type="text/javascript">
      $(function() {
        get_loans();
        get_latest_date();
        search_user();
        getMember_latest_date();
        populateRolePermissions();
        Check();

        $('#permission-mngmt').click(function() {
          loadManageModuleDefaults();
          retrieveRolePermissions();
          getRoles();
        });

        // Add member
        $('#adduser-perm2').click(function() {
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
          var password = $('input[name=password]');
          var password2 = $('input[name=password2]');
          var city = $('input[name=city]');
          var zip = $('input[name=zip]');
          var position = $('select[name=position]');
          var birthday = $('input[id=birthday]');
          var college = $('select[name=college]');
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
          if(college.val() == 'Select College..'){
            college.addClass('is-invalid');
            $('#invalidCollege').html('Please fill out this field.');
          } else {
            college.removeClass('is-invalid');
            $('#invalidCollege').html('');
            result += '11';
          }

          if(result == '1234567891011') {
            var name = fname.val()+' '+mname.val()+' '+lname.val();
            $.ajax({ 
              type    : 'ajax',
              method  : 'post',
              url     : url,
              data    : data + '&name=' + name, 
              async   : false,
              dataType: 'json',
              success: function(response) {
                if(response.success) {
                  sort_member_date();
                  getMember_latest_date();
                  $('#addMemberModal').modal('hide');
                  $('#addMemberForm')[0].reset();
                  $('#addMemberMsg').html('<p class="alert bg-success alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, ' + name + apostrophe + ' account has been created.</a>' +
                                            '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                              '<span aria-hidden="true">&times;</span>' +
                                            '</button>' +
                                          '</p>').fadeIn();  
                  populateRolePermissions();
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
            var college = $(this).attr('user-college');
            var img = $(this).attr('user-img');
            $('#viewProfileModal').find('#userName').text(name);
            $('#viewProfileModal').find('#userPosition').text(position);
            $('#viewProfileModal').find('#userCollege').text(college);
            $('#viewProfileModal').find('#userAddress').text(address);
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
                      sort_member_date();
                      populateRolePermissions();
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
                          '<button href="javascript:;" class="btn btn-success btn-sm float-right my-2 viewuser-perm4" style="display: block" user-id="' + data[i].id + '" user-name="' + data[i].name + '" user-position ="' + data[i].role_name + '" user-college="' + data[i].college + '" user-address="' + data[i].address + '" user-img="' + data[i].user_img + '">View Profile</button>' +
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

        //Retrieve latest date
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
          $('#addLoanModal').find('.modal-title').text('Add Loan');
          $('#addLoanForm').attr('action', '<?php echo base_url() ?>administrators/add_loan');
        });

        //Save Loan Function
        $('#saveLoan').click(function() {
          var url = $('#addLoanForm').attr('action');
          var data = $('#addLoanForm').serialize();
          // Form validation
          var name = $('input[name=loan_name]');
          var amount = $('select[name=loan_max_amt]');
          var term = $('select[name=loan_max_term]');
          var interest = $('select[name=loan_interest]');
          var result = '';

          if(name.val() == '') {
            name.addClass('is-invalid');
            $('#invalidName').html('Please fill out this field.');
          } else {
            name.removeClass('is-invalid');
            $('#invalidName').html('');
            result += '1';
          } 
          if(amount.val() == 'Select Loan Max Amount..') {
            amount.addClass('is-invalid');
            $('#invalidAmt').html('Please fill out this field.');
          } else {
            amount.removeClass('is-invalid');
            $('#invalidAmt').html('');
            result += '2';
          } 
          if(term.val() == 'Select Loan Max Term..') {
            term.addClass('is-invalid');
            $('#invalidTerm').html('Please fill out this field.');
          } else {
            term.removeClass('is-invalid');
            $('#invalidTerm').html('');
            result += '3';
          } 
          if(interest.val() == 'Select Loan Interest..') {
            interest.addClass('is-invalid');
            $('#invalidInterest').html('Please fill out this field.');
          } else {
            interest.removeClass('is-invalid');
            $('#invalidInterest').html('');
            result += '4';
          }

          if(result == '1234') {
            $.ajax({ 
            type    : 'ajax',
            method  : 'post',
            url     : url,
            data    : data,
            async   : false,
            dataType: 'json',
            success: function(response) {
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
                $('#addLoanMsg').html('<p class="alert bg-'+color+' alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, loan has been ' + type + '.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn(); 
                get_loans();
                get_latest_date();
                populateRolePermissions();
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
        $('#returnColumn').on('click', '#editLoan', function() {
          var id = $(this).attr('data');
          $('#addLoanModal').modal('show');
          $('#addLoanModal').find('.modal-title').text('Edit Loan');
          $('#addLoanModal').find('.btn-primary').text('Save changes');
          $('#addLoanForm').attr('action', '<?php echo base_url() ?>administrators/update_loan');
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : '<?php echo base_url() ?>administrators/edit_loan',
            data    : {id:id},
            async   : false,
            dataType: 'json',
            success : function(data) {
              $('input[name=loan_name]').val(data.loan_name).prop('disabled', true);
              $('select[name=loan_max_amt] option:selected').text(data.loan_max_amt);
              $('select[name=loan_max_term] option:selected').text(data.loan_max_term);
              $('select[name=loan_interest] option:selected').text(data.loan_interest);
              $('input[name=loan_id').val(data.id);
              $('#addLoanModal').find('.modal-title').text('Edit Loan (' + data.loan_name + ')');
            },
            error: function() {
              alert('A database error occured!');
            }
          });
        });

        // Delete Loan
        $('#returnColumn').on('click', '#deleteLoan', function() {
          var id = $(this).attr('data');
          $('#deleteModal').modal('show');
          $('#deleteRecordBtn').unbind().click(function() {
            $.ajax({
              type    : 'ajax',
              method  : 'get',
              async   : false,
              url     : '<?php echo base_url() ?>administrators/delete_loan',
              data    : {id:id},
              dataType: 'json',
              success: function(response) {
                if(response.success) {
                  $('#deleteModal').modal('hide');
                  $('#addLoanMsg').html('<p class="alert bg-danger alert-dismissable fade show" role="alert"><a class="h7 text-white">Success, loan has been deleted.</a>' +
                                        '<button type="button" class="close-sm" data-dismiss="alert" aria-label="Close">' +
                                          '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                      '</p>').fadeIn();  
                  get_loans();
                  populateRolePermissions();
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

        // Retrieve loans from db
        function get_loans() { 
          $.ajax({ 
            type    : 'ajax', 
            url     : '<?php echo base_url() ?>administrators/get_loans', 
            async   : false, 
            dataType: 'json',
            success: function(data) {
              var column = ''; 
              var i; 
              for(i = 0; i < data.length; i++) { 
                column += '<div class="col-sm-12 col-md-12 col-lg-4 mb-3">' + 
                            '<div class="card">' +
                              '<h6 class="card-header">' + data[i].loan_name + '</h6>' +
                              '<div class="card-body">' +
                                '<p class="card-text small">Interest: <span class="text-secondary float-right">' + data[i].loan_interest + '</span></p>' +
                                '<p class="card-text small">Maximum Term: <span class="text-secondary float-right">' + data[i].loan_max_term + '</span></p>' + 
                                '<p class="card-text small">Maximum Amount: <span class="text-secondary float-right">' + data[i].loan_max_amt + '</span></p>' +
                              '</div>' + 
                              '<div class="card-footer">' + 
                                '<button href="javascript:;" class="btn btn-green btn-sm float-right deleteloan-perm3" id="deleteLoan" data="' + data[i].id + '"><i class="fas fa-trash mr-2"></i>Delete</button>' +
                                '<button href="javascript:;" class="btn btn-green strong btn-sm float-right mr-1 editloan-perm2" id="editLoan" data="' + data[i].id + '"><i class="fas fa-cog mr-2"></i>Edit</button>' + 
                              '</div>' + 
                            '</div>' + 
                          '</div>';
              }
              $('#returnColumn').html(column); 
            }, 
              error: function() { 
                $('#alert-msg').html('<p class="alert alert-danger alert-dismissable fade show text-center" role="alert">Could not get data from the database!</p>').fadeIn('slow');
              }
          });
        }

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

        $('#loanapp_username').attr('value', '<?php echo $this->session->userdata('username'); ?>').hide();
        $('#loanapp_name').attr('value', '<?php echo $this->session->userdata('name'); ?>').hide();

        var get_username = '';
        var get_name =  '';
        var loan = '';
        var terms = '';
        var loanapp_amt;
        var a; 
        var max_comakers;
        var three_comakers;
        var two_comakers;
        var one_comakers;

        // User Checking for past loan applications start
        function Check() {

          var url = '<?php echo base_url(); ?>loan_applications/check';
          var get_username = '<?php echo $this->session->userdata('username'); ?>';
          var get_name =  '<?php echo $this->session->userdata('name'); ?>';
          
          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : url,
            data    : {username: get_username, name: get_name},
            async   : false,
            dataType: 'json',
            success: function(response) {
              if(response == true) {
                $('#loan_selector').attr('style', 'display: none');

                var url = '<?php echo base_url(); ?>loan_applications/newUser';

                $.ajax({
                  type    : 'ajax',
                  url     : url,
                  async   : false,
                  dataType: 'json',
                  success: function(result) {
                    $('#loan_type').attr({
                      loan_id: result[0].id,
                      value: result[0].loan_name,
                      placeholder: result[0].loan_name
                    });

                    loan = $('#loan_type').val();

                    getLoanTerm(loan);
                    getLoanAmount(loan);
                    insertLoanData(loan);
                  }, error: function() {
                    alert('New User function returned false');
                  }
                });
              } else {
                $('#loan_type').attr('style', 'display:none');

                $('#loan_selector').attr('required');
                var url = '<?php echo base_url(); ?>loan_applications/oldUser';

                $.ajax({
                  type: 'ajax',
                  url: url,
                  async: false,
                  dataType: 'json',
                  success: function(result) {
                    var loan_type_list = '<option value="" disabled selected hidden>Select Loan Type..</option>';
                    var i;

                    for(i=0; i<result.length; i++ ) {
                        loan_type_list += '<option class="loanOptions" loan_id="'+ result[i].id +'" value="'+ result[i].loan_name +'">'+ result[i].loan_name +'</option>'
                    }

                    $('#loan_selector').html(loan_type_list);

                    $('#loan_selector').change(function() {
                      loan = $('#loan_selector').find(':selected').val();

                      alert(loan);
                      getLoanTerm(loan);
                      // added start
                      getLoanAmount(loan);
                      insertLoanData(loan);
                      // added end
                    });
                  }, error: function() {
                    alert('Old User function returned false');
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

        // Application loan terms start 
        function getLoanTerm(data) {
          terms = '<option value="" disabled selected hidden>Select Loan Term..</option>';
          var url = '<?php echo base_url(); ?>loan_applications/getLoanTerm';

          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : url,
            data    : {loan_name: data},
            async   : false,
            dataType: 'json',
            success: function(result) {
              for(var i = 1; i <= result[0].loan_max_term; i++) {
                terms += '<option value="'+ i +'">'+ i +' month/s</option>';
              }
              $('#loan_term').html(terms);
            }, error: function() {
              alert('Error on Get Term function');
            }
          });
        }
        // Application loan terms end

        //loan amount function start
        function getLoanAmount(data) {
          var url = '<?php echo base_url(); ?>loan_applications/getLoanAmount';

          $.ajax({
            type    : 'ajax',
            method  : 'get',
            url     : url,
            data    : {loan_name: data},
            async   : false,
            dataType: 'json',
            success: function(result) {
              max_comakers = result[0].loan_max_amt;
              three_comakers = result[0].loan_max_amt * 3/4;
              two_comakers = result[0].loan_max_amt * 1/2;
              one_comakers = result[0].loan_max_amt * 1/4;
            }, error: function() {
              alert('Error on Get Loan Amount function');
            }
          });
        } 
        //loan amount function end 

        // amount and co maker dependency start
        // problem: if amount is less than half loan app data doesn't store to db 
        $('#loan-amount').keyup(function() {
          loanapp_amt = $(this).val();

          var cm = '';

          var store = max_comakers - loanapp_amt;

          if(store >= 0) {
            if((loanapp_amt <= max_comakers) && (loanapp_amt >= three_comakers)) {
                  a = 4;
            } else if((loanapp_amt < three_comakers) && (loanapp_amt >= two_comakers)) {
                  a = 3;
            } else if((loanapp_amt < two_comakers) && (loanapp_amt >= one_comakers)) {
                  a = 2;
            } else if((loanapp_amt < one_comakers) && (loanapp_amt > 0)) {
                  a = 1;
            }

            for(var i = 1; i <= a; i++){
              cm += '<div class="form-group"><input type="text" class="form-control" placeholder="Input Co-Maker'+ i +' Name" name="co-maker'+ i +'" id="co-maker'+ i +'"><div class="invalid-feedback" id="co-makerinvalid'+ i +'"></div></div>';
            }

            $('#loanapp-cm-application').html(cm);
            $('#comakerCount').val(i-1);
          } else {
             var store = '<p class="alert alert-danger alert-dismissable fade show text-center" role="alert"><button type="button" class="close float-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Amount Entered Cannot be Applied for Loan</p>';

             $('#loanapp_alerts').html(store);
          }
        });
        // amount and co maker dependecy end

        // insert loan data to db start
        function insertLoanData(data) {
          $('#loanapp_submit').click(function() {

            // MGA BINAGO NI MIGS
            var cmCount = $('#comakerCount').val();
            var cms = '';

            for(var i = 1; i <= cmCount; i++) {
              if($('#co-maker'+i).val() == ''){
                $('#co-maker'+i).addClass('is-invalid');
                $('#co-makerinvalid'+i).text('Input is Empty');
              } else {
                $('#co-maker'+i).removeClass('is-invalid');
                $('#co-makerinvalid'+i).text('');
                cms += i;
              } 
            }

            if(cmCount == cms.length) { 
              var url = '<?php echo base_url(); ?>loan_applications/insertLoanApp';
              var serialize =  $('#loanAppForm').serialize();

              $.ajax({
                type:     'ajax',
                method:   'post',
                url:      url,
                data:     serialize + '&loan-type=' + data,
                async:    false,
                dataType: 'json',
                success: function(data) {
                  if (data == true) {
                    // Check();
                    var store = '<p class="alert alert-success alert-dismissable fade show text-center" role="alert"><button type="button" class="close float-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Loan Successfully Sent! Wait for further notifications about your loan</p>';

                  $('#loanapp_alerts').html(store);
                  } else {
                    alert('loan app data response is false');
                    Check();
                    // terms = '';
                    // a = 0;
                    // loanapp_amt = '';
                    // max_comakers = 0;
                    // three_comakers = 0;
                    // two_comakers = 0;
                    // one_comakers = 0;
                  }
                }, error: function() {
                  alert('Error on submitting loan app data');
                }
              });
            } else {
              alert('AGIKNESS?');
            }
         });                        
        }
        // insert loan data to db end

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
          var editProfileModalFooter =  '<button type="button" class="btn btn-success" id="changePasswordBtn">Save changes</button>' +
                                        '<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelChangePassword">Cancel</button>';

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

          var defaultEditProfileFooter =  '<button type="submit" class="btn btn-success float-right" id="editProfileSaveBtn">Save changes</button>' +
                                          '<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>';
                                            
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

          var manageModuleConfirmationFooter = '<button type="button" class="btn btn-success" id="saveUserModule">Save changes</button>' +
                                               '<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelPasswordConfirmation">Cancel</button>';

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
          var defaultModuleModalFooter =  '<button type="button" class="btn btn-success" id="applyUserModule">Save changes</button>' +
                                          '<button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModuleWindow">Close</button>';

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

        /*$(document).on("hidden.bs.modal", '#manageModuleModal', function() {
          resetForm();
          retrieveRolePermissions();
        });
        $('#closeModuleWindow').click(function() {
          resetForm();
          retrieveRolePermissions();
        });*/

      });
    </script>

    

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>

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
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "Loan Track",
            data: [10000, 8900, 7800, 6700, 5600, 8500, 4000],
            backgroundColor: [
              'rgba(102, 255, 204, 0.2)',
            ],
            borderColor: [
              'rgba(179, 255, 230)',
            ],
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
