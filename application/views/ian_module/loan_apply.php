<!DOCTYPE html>
<html>
<head>
	<title>Apply for Loan</title>

	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

<div class="container p-5">

<?php echo validation_errors()?>


<?php $attributes = array('id'=>'loan_form', 'name'=>'loan_form')?>
<?php echo form_open('loan_applications/loanApply', $attributes); ?>

<div class="form-group" id="loanapp-type">
	<!-- ajax insert of loan type -->
</div>

<div class="form-group">
  <select class="custom-select" name="loanapp-term" id="loanapp-term" required>
    <option value="" disabled selected hidden>Select Loan Term..</option>
  </select>
</div>

<div class="input-group mb-3" id="loanapp-amount">
  <div class="input-group-prepend">
    <span class="input-group-text">&#8369;</span>
  </div>
  <input type="text" class="form-control " name="loan-amount" id="loan-amount" placeholder="0,000,000.00">
</div>

<div class="custom-file mb-3" id="loanapp-payslip">
  <input type="file" class="custom-file-input" id="customFile" name="user-attachment" required>
  <label class="custom-file-label text-muted" for="customFile">Attach Payslip</label>
</div>

<hr class="mb-4">

<div class="form-group">
  <input type="text" name="co-maker1" id="co-maker1" class="form-control" placeholder="Input Co-Maker Name">
</div>

<div class="form-group">
  <input type="text" name="co-maker2" id="co-maker2" class="form-control" placeholder="Input Co-Maker Name">
</div>

<div class="form-group">
  <input type="text" name="co-maker3" id="co-maker3" class="form-control" placeholder="Input Co-Maker Name">
</div>

<div class="form-group">
  <input type="text" name="co-maker4" id="co-maker4" class="form-control" placeholder="Input Co-Maker Name">
</div>

<div class="d-flex justify-content-center">
<button type="submit" id="apply-loan" name="apply-loan" class="btn btn-success ">Submit</button>
</div>
<?php form_close()?>

<div class="container border border-primary mt-4 p-5">
	<ul class="list-group" id="membersList">
		<!-- members list will be inserted here -->
	</ul>
</div>

</div>

<script type="text/javascript">
	$(function() {
		checkmember();

		//newly added 
		$('#apply-loan').click(function() {
			var info = $('#loan_form').serialize(); 
			var user_name = '<?php echo $this->session->userdata('name'); ?>';
			var date_applied = '<?php echo date('M/d/Y H:i:sa'); ?>';
			var user_id = '<?php echo $this->session->userdata('id'); ?>';
			var loan_type = $('#loan-type').val();

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?php echo base_url(); ?>loan_applications/loanApply',
				data: info + '&user_id=' + user_id + '&user_name=' + user_name + '&date_applied=' + date_applied + '&loan_type=' +loan_type,
				async: false,
				dataType: 'json',
				success: function(data) 
				{
					if (data.success) {
					  $('#addMemberMsg').html('<p class="alert alert-success alert-dismissable fade show text-center" role="alert">Loan added successfully!</p>').fadeIn().delay(3000).fadeOut('slow');
                    } else {
                      alert('Error');
                    }
				}, 
				error: function() 
				{
					alert(user_id);
					alert('Error! somethings wrong with your syntax on loan_application_model!');
				}
			});
		});

		function checkmember() {
			var user_name = '<?php echo $this->session->userdata['name']; ?>';

			// first user_id is a variable for model to acces
			// second user_id is the value to be passed on to that model
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url(); ?>loan_applications/check',
				data: {user_name: user_name},
				async: false,
				dataType: 'json',
				success: function(data) {
					// check if 0 loan applications table has no record of user loan  if 1 table has record already
					if (data = '0') {
						// set loan to regular for first application of loan
						$.ajax({
							type: 'ajax',
							url: '<?php echo base_url(); ?>loan_applications/new_user_applicant',
							async: false,
							dataType: 'json',
							success: function(result) {
								var loan_terms = '';
								var i;

								var loan_type = '<input type="text" class="form-control" id="loan-type" name="loan-type" value="' + result.loan_name + '" disabled>'; 

								var terms = result.loan_max_term;

								for (i = 1; i <= terms; i++) {
									loan_terms += '<option value="' + i + '">' + i + '</option>';
								}

								$('#loanapp-type').html(loan_type);	
								$('#loanapp-term').html(loan_terms);
							},
							error: function() {
	                          alert('Error wrong synatx on new_user_applicant!');
	                        }
						});
						

					} else if (data = '1') {
						$.ajax({
							type: 'ajax',
							url: '<?php echo base_url(); ?>loan_applications/old_user_applicant',
							async: false,
							dataType: 'json',
							success: function(result) {
								var loan_type =  '';
								var i;
								var type;

								for (i=0; i < result.length; i++ ) {
									loan_type += '<option value="' + result[i].loan_name + '" >'+ result[i].loan_name +'</option>';
								}

								var all_loans = '<select class="custom-select" id="loan-type" name="loan-type" required><option value="" disabled selected hidden>Select Loan Term..</option></select>'

								$('#loan-type').html(loan_type);
								$('#loanapp-type').html(all_loans);	


								//loan terms selection
								$('#loan-type option').click( function() {
									type = $(this).attr('value');
								});

								if (result.loan_name == type) {
									$.ajax({
										type: 'ajax',
										url: '<?php echo base_url(); ?>loan_applications/getLoanTerms',
										data: {loan_name: type},
										async: false,
										dataType: 'json',
										success: function(result) {
											var terms = '';
											var i;

											for (var i = 1; i <= result.loan_max_term; i++) {
												terms += '<option value="' + i + '">' + i + '</option>';
											}

											$('#loanapp-term').html(terms);
										}, 
										error: function() {
											alert('Error wrong synatx on getLoanTerms!');
										}
									});
								}


							},
							error: function() {
	                          alert('Error wrong synatx on old_user_applicant!');
	                        }
						});
					}
				} 


			});
		}
        
        $('#co-maker1').keyup(function() {
        	var key_val = $(this).val();

        	if (key_val != '') {
        		searchMember(key_val);
        	} else {
        		searchMember();
        	}
        });

        $('#co-maker2').keyup(function() {
        	var key_val = $(this).val();

        	if (key_val != '') {
        		searchMember(key_val);
        	} else {
        		searchMember();
        	}
        });

        $('#co-maker3').keyup(function() {
        	var key_val = $(this).val();

        	if (key_val != '') {
        		searchMember(key_val);
        	} else {
        		searchMember();
        	}
        });

        $('#co-maker4').keyup(function() {
        	var key_val = $(this).val();

        	if (key_val != '') {
        		searchMember(key_val);
        	} else {
        		searchMember();
        	}
        });

        function searchMember(input) {
        	$.ajax({
        		type: 'ajax',
        		method: 'post',
        		url: '<?php echo base_url();?>/loan_applications/searchMember',
        		data: {key_typed : input},
        		async: false,
        		dataType: 'json',
        		success: function(data) {
        			var member_list = '';
        			var i;

        			if (data.length > 0 ) {
	        			for (i=0; i < data.length; i++) {
	        				member_list += '<li class="list-group-item">'+'<h5 class="member-name">' + data[i].name + '</h5>' +
	        						'<p class="text-muted"><small>' + data[i].position + '</small></p>'+'</li>';
	        			}

	        			$('#membersList').html(member_list);
        			} else {
        				member_list += '<h4 class="text-center mt-5"><strong class="text-danger">' + '"' + input + '"' + ' </strong>not found!</h4>';
        			}

        			$('#membersList').html(member_list);
        		}, 
        		error: function() {
        			alert('Error wrong syntax on searchMember!');
        		}
        	});
        }

	});
</script>



</body>
</html>
