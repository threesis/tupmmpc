<?php


class Loan_Applications extends CI_Controller
{
	public function apply() 
	{
		$this->load->view('ian_module/loan_apply');
	}

	public function check()
	{	
		$id = $this->session->userdata('id');
		die($id);

		$result = $this->loan_application_model->verify($id);
		echo json_encode($result);
	}
}