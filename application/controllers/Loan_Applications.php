<?php


class Loan_Applications extends CI_Controller
{
	public function apply() 
	{
		$this->load->view('ian_module/loan_apply');
	}

	public function check()
	{	
		$result = $this->loan_application_model->check();
		echo json_encode($result);
	}

	public function new_user_applicant()
	{
		$result = $this->loan_application_model->new_user_applicant();
		echo json_encode($result);
	}

	public function old_user_applicant() 
	{
		$result = $this->loan_application_model->old_user_applicant();
		echo json_encode($result);
	}

	public function getLoanTerms()
	{
		$result = $this->loan_application_model->getLoanTerms();
		echo json_encode($result);
	}
}