<?php


class Loan_Applications extends CI_Controller
{
	public function apply() 
	{
		$this->load->view('ian_module/loan_apply');
	}

	public function check()
	{
		$result = $this->loan_application_model->verify();
		echo json_encode($result);
	}
}