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
    <!-- Navigation Bar -->
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark navbar-color">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png">TUPMMPC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active mr-2">
              <a class="nav-link" href="#">MESSAGES</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ACCOUNT
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" id="bobo" data-toggle="list" href="#admin-edit-profile" role="tab" aria-controls="home">Edit Profile</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#editModulesModal" href="#">Manage Modules</a>
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
        <div class="msg">
          <?php if($this->session->flashdata('user_signedin')): ?>
            <?php echo '<p class="alert alert-success alert-dismissable fade show text-center" id="loginWelcomeMsg" role="alert">
                      <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>'.$this->session->flashdata('user_signedin').
                      $this->session->userdata('username').'!'.'</p>';
            ?>
            <script type="text/javascript">
              $('#loginWelcomeMsg').fadeIn().delay(2500).fadeOut('slow');
            </script>
          <?php endif; ?>
        </div>
        <div class="row">
        <!-- Profile -->
          <div class="col-sm-12 col-md-4 col-lg-3 offset-md mb-3">
            <div class="card" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15)">
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
                <a class="list-group-item list-group-item-action active" id="home-list" data-toggle="list" href="#dashboardTab" role="tab" aria-controls="home"><i class="fas fa-home mr-2"></i> Dashboard</a>
                <a class="list-group-item list-group-item-action" id="loans-list" data-toggle="list" href="#loansTab" role="tab" aria-controls="settings"><i class="fas fa-credit-card mr-2"></i> Loans</a>
                <a class="list-group-item list-group-item-action" id="loanrecords-list" data-toggle="list" href="#loanRecordTab" role="tab" aria-controls="settings"><i class="fas fa-poll-h mr-2"></i> Loan Records</a>
                <a class="list-group-item list-group-item-action" id="loanapps-list" data-toggle="list" href="#loanAppTab" role="tab" aria-controls="settings"><i class="fas fa-poll mr-2"></i> Loan Applications</a>
                <a class="list-group-item list-group-item-action" id="members-list" data-toggle="list" href="#membersTab" role="tab" aria-controls="messages"><i class="fas fa-users mr-2"></i> Members</a>
                <a class="list-group-item list-group-item-action" id="transactions-list" data-toggle="list" href="#transactionsTab" role="tab" aria-controls="messages"><i class="fas fa-paperclip mr-2"></i> View Transactions</a>
                <a class="list-group-item list-group-item-action" id="records-list" data-toggle="list" href="#recordsTab" role="tab" aria-controls="messages"><i class="fas fa-folder-open mr-2"></i> View Records</a>
                <a class="list-group-item list-group-item-action" id="comakers-list" data-toggle="list" href="#coMakersTab" role="tab" aria-controls="messages"><i class="fas fa-users mr-2"></i> Co-Makers</a>
                <a class="list-group-item list-group-item-action" id="sharecap-list" data-toggle="list" href="#shareCapTab" role="tab" aria-controls="messages"><i class="fas fa-money-check mr-2"></i> Share Capital Records</a>
              </div>
            </div>
          </div>

          <!-- Navigation Body -->
          <div class="col-sm-12 col-md-8 col-lg-9 mb-3">
            <div class="card" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15)">
              <div class="tab-content">
                <!-- Home Part -->
                <div class="tab-pane fade show active" id="dashboardTab" role="tabpanel" aria-labelledby="home-tab">
                  <h5 class="card-header">Dashboard</h5>
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
                  <h5 class="card-header">Loans</h5>
                    <div class="card-body card-body-mh">
                      <div id="addLoanMsg"></div>
                      <!-- Row where columns from ajax for loop will be returned -->
                      <div class="row" id="returnColumn">
                        <!-- Loans list from ajax call -->
                      </div>
                    </div>
                    <div class="card-footer">
                      <div id="returnLatestDate"></div>
                      <button id="add-loan" class="btn btn-primary float-right mb-2"><i class="fas fa-plus mr-2"></i>Add Loan</button>

                      <!-- Add Loan Modal -->
                      <div class="modal fade" id="addLoanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title"></h5>
                            </div>
                            <form id="addLoanForm">
                              <input type="hidden" name="loan_id" value="0">
                              <div class="modal-body">
                                <div class="form-row justify-content-center">
                                  <div class="form-group col-md-10 mb-2">
                                    <label for="name" class="custom-sm">Loan Type</label>
                                    <input type="loan_type" class="form-control" id="name" name="loan_name">
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
                              <button type="submit" id="saveLoan" class="btn btn-primary">Apply</button>
                              <button type="button" id="closeLoan" class="btn btn-secondary" data-dismiss="modal">CloseYSsssAAAAAA</button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- Ajax on add loan button modal -->
                      <script type="text/javascript"> 
                        $(function() { // document.ready jquery function
                          get_loans();
                          get_latest_date();

                          // Add Loan Function
                          $('#add-loan').click(function() {
                            $('#addLoanModal').modal('show');
                            $('#addLoanForm')[0].reset();
                            $('select[name=loan_name]').prop('disabled', false);
                            $('#addLoanModal').find('.modal-title').text('Add Loan');
                            $('#addLoanForm').attr('action', '<?php echo base_url() ?>administrators/add_loan');
                          });

                          //Save Loan Function
                          $('#saveLoan').click(function() {
                            var url = $('#addLoanForm').attr('action');
                            var data = $('#addLoanForm').serialize();
                            // Form validation
                            var name = $('select[name=loan_name]');
                            var amount = $('select[name=loan_max_amt]');
                            var term = $('select[name=loan_max_term]');
                            var interest = $('select[name=loan_interest]');
                            var result = '';

                            if(name.val() == 'Select Loan Type..') {
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
                                  $('#addLoanMsg').html('<p class="alert alert-'+color+' alert-dismissable fade show text-center" role="alert">Loan ' + type + ' successfully!</p>').fadeIn().delay(3000).fadeOut('slow'); 
                                  get_loans();
                                  get_latest_date();
                                } else {
                                  alert('You did not made any changes! Please close it properly.');
                                }
                              }, 
                              error: function() { 
                              alert('Could not add data!');
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
                                $('select[name=loan_max_amt]').val(data.loan_max_amt);
                                $('select[name=loan_max_term]').val(data.loan_max_term);
                                $('select[name=loan_interest]').val(data.loan_interest);
                                $('input[name=loan_id').val(data.id);
                                $('#addLoanModal').find('.modal-title').text('Edit Loan (' + data.loan_name + ')');
                              },
                              error: function() {
                                alert('Error!');
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
                                    $('#addLoanMsg').html('<p class="alert alert-danger alert-dismissable fade show text-center" role="alert">Loan deleted successfully!</p>').fadeIn().delay(3000).fadeOut('slow'); 
                                    get_loans();
                                  } else {
                                    alert('Error!');
                                  }
                                },
                                error: function() {
                                  alert('Errora!');
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
                                                  '<p class="card-text"><small>Interest: ' + data[i].loan_interest + '</small></p>' +
                                                  '<p class="card-text"><small>Maximum Amount: ' + data[i].loan_max_amt + '</small></p>' +
                                                  '<p class="card-text"><small>Maximum Term: ' + data[i].loan_max_term + '</small></p>' + 
                                                '</div>' + 
                                                '<div class="card-footer">' + 
                                                  '<button href="javascript:;" class="btn btn-danger btn-sm float-right" id="deleteLoan" data="' + data[i].id + '"><i class="fas fa-trash mr-2"></i>Delete</button>' +
                                                  '<button href="javascript:;" class="btn btn-success btn-sm float-right mr-1" id="editLoan" data="' + data[i].id + '"><i class="fas fa-cog mr-2"></i>Edit</button>' + 
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
                                alert('Error getting date!');
                              }
                            });
                          }

                        }); // End script
                        </script> 


                    </div>
                  </div>

                <!-- Loan Application part -->
                <div class="tab-pane fade show" id="loanAppTab" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card-header">
                    <span class="h5">Loan Application Form</span>
                  </div>

                  <div class="card-body card-body-mh">
                    <div class="loanapp_alerts" id="loanapp_alerts">
                      <!-- alerts incase of error -->
                    </div>

                    <form class="p-4" id="loanAppForm">
                      <div class="form-group">
                        <input type="text" name="loanapp_username" id="loanapp_username" class="form-control">
                      </div>

                      <div class="form-group">
                        <input type="text" name="_loanapp_name" id="loanapp_name" class="form-control">
                      </div>

                      <div class="form-group">
                        <input type="text" name="loan_type" id="loan_type" class="form-control" style="display: block" disabled>

                        <select class="custom-select mt-2" name="loan_selector" id="loan_selector" style="display: block">
                           <!-- ajax insert loan types -->
                        </select>
                      </div>

                      <div class="form-group">
                        <select class="custom-select" name="loan_term" id="loan_term" required>
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
                        <input type="file" class="custom-file-input" id="customFile" name="user_attachment" required>
                        <label class="custom-file-label text-muted" for="customFile">Attach Payslip</label>
                      </div>

                      <div class="form-group">
                        <input type="text" name="co_maker1" id="co_maker1" class="form-control" style="display: block;" placeholder="Input Co-Maker1 Name">
                      </div>

                      <div class="form-group">
                        <input type="text" name="co_maker2" id="co_maker2" class="form-control" style="display: none;" placeholder="Input Co-Maker2 Name">
                      </div>

                      <div class="form-group">
                        <input type="text" name="co_maker3" id="co_maker3" class="form-control" style="display: none;" placeholder="Input Co-Maker3 Name">
                      </div>

                      <div class="form-group">
                        <input type="text" name="co_maker4" id="co_maker4" class="form-control" style="display: none;" placeholder="Input Co-Maker4 Name">
                      </div>

                      <hr class="mb-4">

                      <div class="d-flex justify-content-center">
                        <button type="submit" id="loanapp_submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>

                <script type="text/javascript">
                  $(function () {
                      Check();

                      $('#loanapp_username').attr('value', '<?php echo $this->session->userdata('username'); ?>').hide();
                      $('#loanapp_name').attr('value', '<?php echo $this->session->userdata('name'); ?>').hide();

                      var get_username = '';
                      var get_name =  '';
                      var loan = '';
                      var terms = '';

                      // code added start
                      var loanapp_amt = '';
                      var max_comakers;
                      var three_comakers;
                      var two_comakers;
                      var one_comakers;


                      $('#loan-amount').keyup(function() {
                        loanapp_amt = $(this).val();

                        // check amount entered
                        if(loanapp_amt > max_comakers){
                           var store = '<p class="alert alert-danger alert-dismissable fade show text-center" role="alert"><button type="button" class="close float-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Amount Entered exceeded the Loan MAX Amount</p>';

                           $('#loanapp_alerts').html(store);
                           $('#loanapp_submit').attr('disabled'); 
                        } else if ((loanapp_amt <= max_comakers) && (loanapp_amt > three_comakers)) {
                          $('#co_maker1').attr('style', 'display: block', 'required');
                          $('#co_maker2').attr('style', 'display: block', 'required');
                          $('#co_maker3').attr('style', 'display: block', 'required');
                          $('#co_maker4').attr('style', 'display: block', 'required'); 
                        } else if ((loanapp_amt <= three_comakers) && (loanapp_amt > two_comakers)) {
                          $('#co_maker1').attr('style', 'display: block', 'required');
                          $('#co_maker2').attr('style', 'display: block', 'required');
                          $('#co_maker3').attr('style', 'display: block', 'required');
                          $('#co_maker4').attr('style', 'display: none', 'value', '');
                        } else if ((loanapp_amt <= two_comakers) && (loanapp_amt > one_comakers)) {
                          $('#co_maker1').attr('style', 'display: block', 'required');
                          $('#co_maker2').attr('style', 'display: block', 'required');
                          $('#co_maker3').attr('style', 'display: none', 'value', '');
                          $('#co_maker4').attr('style', 'display: none', 'value', '');
                        } else if ((loanapp_amt <= one_comakers) && (loanapp_amt > 0)) {
                          $('#co_maker1').attr('style', 'display: block', 'required');
                          $('#co_maker2').attr('style', 'display: none', 'value', '');
                          $('#co_maker3').attr('style', 'display: none', 'value', '');
                          $('#co_maker4').attr('style', 'display: none', 'value', '');
                        } else {
                          var store = '<p class="alert alert-danger alert-dismissable fade show text-center" role="alert"><button type="button" class="close float-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Amount Entered is less than zero and cannot be applied</p>';

                           $('#loanapp_alerts').html(store);
                           $('#loanapp_submit').attr('disabled');
                        }
                      });
                      // code added end

                      // newly code added insert data to db
                      $('#loanapp_submit').click(function() {
                        var url = '<?php echo base_url(); ?>loan_applications/insertLoanApp'

                        $.ajax({
                          type: 'ajax',
                          method: 'post',
                          url: url,
                          data: {
                            loan_name: get_name,
                            loan_username: get_username,
                            loan_type: loan,
                            loan_term: terms,
                            loan_amount: loanapp_amt,
                            user_attachment: user_attachment,
                            co_maker1: co_maker1,
                            co_maker2: co_maker2,
                            co_maker3: co_maker3,
                            co_maker4: co_maker4
                          },
                          async: false,
                          dataType: 'json',
                          success: function(response) {
                            if (response == true) {
                              $('#loanAppForm')[0].reset();
                              var store = '<p class="alert alert-success alert-dismissable fade show text-center" role="alert"><button type="button" class="close float-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Loan Successfully Sent! Wait for further notifications about your loan</p>';

                              $('#loanapp_alerts').html(store);
                            } else {
                              alert('loan app data response is false');
                            }
                          }, error: function() {
                            alert('Error on submitting loan app data');
                          }
                        });
                      });

                      function Check() 
                      {
                        var url = '<?php echo base_url(); ?>loan_applications/check';
  
                        var get_username = '<?php echo $this->session->userdata('username'); ?>';
                        var get_name =  '<?php echo $this->session->userdata('name'); ?>';
                        
                        $.ajax({
                          type: 'ajax',
                          method: 'post',
                          url: url,
                          data: {username: get_username, name: get_name},
                          async: false,
                          dataType: 'json',
                          success: function(response) {
                            if (response == true) {
                              $('#loan_selector').attr('style', 'display: none');

                              var url = '<?php echo base_url(); ?>loan_applications/newUser';

                              $.ajax({
                                type: 'ajax',
                                url: url,
                                async: false,
                                dataType: 'json',
                                success: function(result) {
                                  $('#loan_type').attr({
                                    loan_id: result[0].id,
                                    value: result[0].loan_name,
                                    placeholder: result[0].loan_name
                                  });

                                  loan = $('#loan_type').val();

                                  getLoanTerm(loan);
                                  // added start
                                  getLoanAmount(loan);
                                  // added end
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

                                    getLoanTerm(loan);
                                    // added start
                                    getLoanAmount(loan);
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

                      function getLoanTerm(data) {
                        terms = '<option value="" disabled selected hidden>Select Loan Type..</option>';
                        var url = '<?php echo base_url(); ?>loan_applications/getLoanTerm';

                        $.ajax({
                          type: 'ajax',
                          method: 'get',
                          url: url,
                          data: {loan_name: data},
                          async: false,
                          dataType: 'json',
                          success: function(result) {
                            var i;

                            for(i=1; i<=result[0].loan_max_term; i++) {
                              terms += '<option value="'+ i +'">'+ i +' Month/s</option>';
                            }

                            $('#loan_term').html(terms);
                          }, error: function() {
                            alert('Error on Get Term function');
                          }

                        });
                      }

                      //newly added start here
                      function getLoanAmount(data) {
                        var url = '<?php echo base_url(); ?>loan_applications/getLoanAmount';

                        $.ajax({
                          type: 'ajax',
                          method: 'get',
                          url: url,
                          data: {loan_name: data},
                          async: false,
                          dataType: 'json',
                          success: function(result) {
                            max_comakers = result[0].loan_max_amt;
                            three_comakers = result[0].loan_max_amt/2;
                            two_comakers = result[0].loan_max_amt/4;
                            one_comakers = result[0].loan_max_amt/8;
                          }, error: function() {
                            alert('Error on Get Loan Amount function');
                          }
                        });
                      } 
                      // newly added end
                  });           
                </script>


                <!-- Members Part -->
                <div class="tab-pane fade show" id="membersTab" role="tabpanel" aria-labelledby="home-tab">
                  <h5 class="card-header">Members</h5>
                    <div class="card-body card-body-mh">
                      <!--Search Bar -->
                        <form class="form-row">
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
                        </form>
                      <div id="addMemberMsg"></div>
                      <ul class="list-group" id="returnRow">
                        <!-- Member list from ajax call -->
                      </ul>
                    </div>
                    <div class="card-footer">
                      <div id="returnMemberLatestDate"></div>
                      <button class="btn btn-primary float-right mb-2" id="add-member"><i class="fas fa-plus mr-2"></i>Add New Member</button>
                    </div>


                <!-- VIEW PROFILE MODAL -->
                <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success p-5 profile-header">
                        <div class="modal-title mx-auto">
                          <img src="assets/img/team/2.jpg" class="img-thumbnail rounded-circle d-block my-3">
                        </div>
                      </div>
                      <div class="modal-text m-3">
                        <button class="btn btn-light bg-light float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>...</strong></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a href="#" class="dropdown-item" id="promoteUser" class="list-group-item list-group-item-action">Promote</a>
                          <a href="#" class="dropdown-item" id="deleteUser" class="list-group-item list-group-item-action">Delete Profile</a>
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
                        <h5 class="modal-title">Add Member</h5>
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

                <!-- Ajax -->
                <script type="text/javascript"> 
                  $(function() {
                    sort_member_date();
                    getMember_latest_date();

                    // Add member
                    $('#add-member').click(function() {
                      $('#addMemberModal').modal('show');
                      $('#addMemberForm').attr('action', '<?php echo base_url() ?>administrators/add_member');
                    });
                    $('#saveMember').click(function() {
                      var url = $('#addMemberForm').attr('action');
                      var data = $('#addMemberForm').serialize();
                      // Add member form validation
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
                              $('#addMemberMsg').html('<p class="alert alert-success alert-dismissable fade show text-center" role="alert">Member added successfully!</p>').fadeIn().delay(3000).fadeOut('slow');
                            } else {
                              alert('Error');
                            }
                          }, 
                          error: function() { 
                            alert(data);
                          }
                        });
                      } 
                    });

                      // View profile
                      // Delete Member
                      $('#returnRow').on('click', '.view-profile-btn', function() {
                        var id = $(this).attr('user-id');
                        var name = $(this).attr('user-name');
                        var email = $(this).attr('user-email');
                        var address = $(this).attr('user-address');
                        var position = $(this).attr('user-position');
                        var college = $(this).attr('user-college');
                        $('#viewProfileModal').find('#userName').text(name);
                        $('#viewProfileModal').find('#userPosition').text(position);
                        $('#viewProfileModal').find('#userCollege').text(college);
                        $('#viewProfileModal').find('#userAddress').text(address);
                        $('#viewProfileModal').modal('show');
                        $('#deleteUser').click(function() {
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
                                  $('#addMemberMsg').html('<p class="alert alert-danger alert-dismissable fade show text-center" role="alert">User deleted successfully!</p>').fadeIn().delay(3000).fadeOut('slow'); 
                                  sort_member_date();
                                } else {
                                  alert('Error!');
                                }
                              },
                              error: function() {
                                alert('Error!');
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
                      var sort = $('#sort').val();
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
                                      '<img src="assets/img/team/ian.jpg" class="rounded-circle member-icon">' +
                                      '<button href="javascript:;" class="btn btn-info btn-sm float-right my-2 view-profile-btn" user-id="' + data[i].id + '" user-name="' + data[i].name + '" user-position ="' + data[i].position + '" user-college="' + data[i].college + '" user-address="' + data[i].address + '">View Profile</button>' +
                                      '<h5 class="member-name">' + data[i].name + '</h5>' +
                                      '<p class="text-muted"><small>' + data[i].college + '</small></p>' +
                                      '</li>';
                          }
                          $('#returnRow').html(row);
                        } else {
                          row += '<h4 class="text-center mt-5"><strong class="text-danger">' + '"' + query + '"' + ' </strong>not found!</h4>';
                        }
                          $('#returnRow').html(row);
                        },
                        error: function() {
                          alert('Error!');
                        }
                      });
                    }
                 
                    // Sort members by date
                    function sort_member_date() { 
                      $.ajax({ 
                        type    : 'ajax',
                        url     : '<?php echo base_url() ?>administrators/sort_member_date',
                        async   : false,
                        dataType: 'json',
                        success: function(data) {
                          var column = ''; 
                          var i; 
                          for(i = 0; i < data.length; i++) {
                            column += '<li class="list-group-item">' +
                                      '<img src="assets/img/team/ian.jpg" class="rounded-circle member-icon">' +
                                      '<button href="javascript:;" class="btn btn-info btn-sm float-right my-2 view-profile-btn" user-id="' + data[i].id + '" user-name="' + data[i].name + '" user-position ="' + data[i].role_name + '" user-college="' + data[i].college + '" user-address="' + data[i].address + '">View Profile</button>' +
                                      '<h5 class="member-name">' + data[i].name + '</h5>' +
                                      '<p class="text-muted"><small>' + data[i].college + '</small></p>' +
                                      '</li>';
                          }
                          $('#returnRow').html(column);
                        }, 
                          error: function() {
                            $('#alert-msg').html('<p class="alert alert-danger alert-dismissable fade show text-center" role="alert">Could not get data from the database!</p>').fadeIn('slow');
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
                          alert('Error getting date!');
                        }
                      });
                    }

                  }); // End script
                  </script> 

                </div>

                <!-- Reports Part -->
                <div class="tab-pane fade show" id="transactionsTab" role="tabpanel" aria-labelledby="home-tab">
                  <h5 class="card-header">Transactions</h5>
                  <div class="card-body card-body-mh">
                    Content..
                  </div>
                </div>

                <!-- Members Part -->
                <div class="tab-pane fade show" id="recordsTab" role="tabpanel" aria-labelledby="home-tab">
                  <h5 class="card-header">Records</h5>
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

                <!-- ALL MODAL UI ARE HERE -->
                <!-- Delete Loan Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Delete Loan</h5>
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
                <!-- ALL MODAL UI ARE HERE -->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

        <!-- VIEW PROFILE MODAL -->
    <div class="modal fade" id="openProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(function() {
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

  </body>
</html>
