<?php
 class Loan_Applications extends CI_Controller
 {
 	public function check() 
 	{
 		$data_result = $this->loan_application_model->check();
 		echo json_encode($data_result);
 	}

 	public function oldUser()
 	{
 		$data_result = $this->loan_application_model->oldUser();
 		echo json_encode($data_result);
 	}

 	public function newUser()
 	{
 		$data_result = $this->loan_application_model->newUser();
 		echo json_encode($data_result);
 	}

 	public function getLoanTerm()
 	{
 		$data_result = $this->loan_application_model->getLoanTerm();
 		echo json_encode($data_result);
 	}

 	public function getLoanAmount()
 	{
 		$data_result = $this->loan_application_model->getLoanAmount();
 		echo json_encode($data_result);
 	}

 	public function insertLoanApp() 
 	{
 		$data_result = $this->loan_application_model->insertLoanApp();
 		echo json_encode($data_result);
 	}
 }