<!DOCTYPE html>
<html>
<head>
	<title>Apply for Loan</title>

	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<script  src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

<div class="container p-5">

<?php echo form_open('ian_branch/loan_apply'); ?>

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
  <input type="file" class="custom-file-input" id="customFile" required>
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
<button type="submit" class="btn btn-success ">Submit</button>
</div>
<?php form_close()?>

</div>

<script type="text/javascript">
	$(function() {
		checkmember();

		function checkmember() {
			var user_name = <?php echo $this->session->userdata['name']; ?>;

			// first user_id is a variable for model to acces
			// second user_id is the value to be passed on to that model
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url(); ?>loan_applications/check',
				data: {user_name: user_name}
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
								var loan_type = '<input type="text" class="form-control" name="' + result.loan_name  + '" value="' + result.loan_name + '" disabled>'; 

								$('#loanapp-type').html(loan_type);	
							}
							error: function() {
	                          alert('Error wrong synatx!');
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

								for (i=0; i < result.length; i++ ) {
									loan_type += '<option>'+ result[i].loan_name +'</option>';
								}

								var all_loans = '<select class="custom-select" id="loan-selector" required><option value="" disabled selected hidden>Select Loan Term..</option></select>'

								$('#loan-selector').html(loan_type);
								$('#loanapp-type').html(all_loans);	
							}
							error: function() {
	                          alert('Error wrong synatx!');
	                        }
						});
					}
				} 


			});
		}

		function applyloan() {
			var 
		}
         
	});
</script>



</body>
</html>
