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

<div class="form-group">
  <select class="custom-select" name="loanapp-type" id="loanapp-type" required>
	<option value="" disabled selected hidden>Select Loan Type..</option>
  </select>
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
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url(); ?>loan_applications/check',
				async: false,
				dataType: 'json',
				success: function(data) {
					
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
