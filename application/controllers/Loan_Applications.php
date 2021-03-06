<?php
 class Loan_Applications extends CI_Controller
 {
 	public function check() 
 	{
 		$data_result = $this->loan_application_model->check();
 		echo json_encode($data_result);
 	}
 	public function oldUser_exsistingData() {
 		$data_result = $this->loan_application_model->oldUser_exsistingData();
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
 	public function getShareCapital() 
 	{
 		$data_result = $this->loan_application_model->getShareCapital();
 		echo json_encode($data_result);
 	}
 	public function generateLoanAppId() {
 		$data_result = $this->loan_application_model->generateLoanAppId();
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
 		$config = array(
 			'upload_path' => './assets/img/payslip_uploads',
 			'allowed_types' => 'gif|jpg|png|jpeg',
 			'max_size' => 5000,
			'max_width' => 0,
			'max_height' => 0
 		);
 		$this->load->library('upload', $config); 
 		if(!$this->upload->do_upload()) {
 			$error = array('error' => $this->upload->display_errors());
 			$post_image = 'noimage.jpg';
 			echo $error['error'];
 		} else {
 			$data = array('upload_data' => $this->upload->data());
 			$post_image = $_FILES['userfile']['name'];
 		}
 		$data_result = $this->loan_application_model->insertLoanApp($post_image);
 		echo json_encode($data_result);
 	}
 	public function searchCoMaker() {
 		$data_result = $this->loan_application_model->searchCoMaker();
 		echo json_encode($data_result);
 	}
 	public function fetchAllMembers() {
 		$data_result = $this->loan_application_model->fetchAllMembers();
 		echo json_encode($data_result);
 	} 
 	// public function MemberLimit() {
 	// 	$data_result = $this->loan_application_model->MemberLimit();
 	// 	echo json_encode($data_result);
 	// }
 	public function coMakersApplication() {
 		$data_result = $this->loan_application_model->coMakersApplication();
 		echo json_encode($data_result);
 	}
 	public function getLoanDeductions() {
 		$data_result = $this->loan_application_model->getLoanDeductions();
 		echo json_encode($data_result);
 	}
 	public function cmloanappData() {
 		$data_result = $this->loan_application_model->cmloanappData();
 		echo json_encode($data_result);
 	}
 	public function findCmName() {
 		$data_result = $this->loan_application_model->findCmName();
 		echo json_encode($data_result);
 	}
 	public function getAllMembers() {
 		$data_result = $this->loan_application_model->getAllMembers();
 		echo json_encode($data_result);
 	}
 	public function cmAttachment() {
 		$data_result = $this->loan_application_model->cmUpdateAttachment();
 		echo json_encode($data_result);
 	}
 	public function RenewLoan() {
		$data_result = $this->loan_application_model->renewLoan();
 		echo json_encode($data_result);	
	}
	public function getRenewalId() {
		$data_result = $this->loan_application_model->getRenewalId();
		echo json_encode($data_result);
	}
	public function CheckRenewAvailability() {
		$data_result = $this->loan_application_model->CheckRenewAvailability();
		echo json_encode($data_result);
	}
		
	public function getOutstandingBalance() {
		$data_result = $this->loan_application_model->getOutstandingBalance();
		echo json_encode($data_result);
	}
 	// public function ledgerData() {
 	// 	$data_result = $this->loan_application_model->ledgerData();
 	// 	echo json_encode($data_result);
 	// }
 	public function checkCreditCommiteeApprovals() {
		$data_result = $this->loan_model->checkCreditCommiteeApprovals();
 		echo json_encode($data_result);	
	}
	public function insertChequeNo() {
		$data_result = $this->loan_model->insertChequeNo();
 		echo json_encode($data_result);	
	}	
 }