<?php
	class Loans extends CI_Controller {

		public function checkVerifiedApp(){
			$result = $this->loan_model->checkVerifiedApp();
			echo json_encode($result); 
		}

		public function getPendingLoans(){
			$result = $this->loan_model->getPendingLoans();
			echo json_encode($result); 
		}

		public function getApprovedLoans(){
			$result = $this->loan_model->getApprovedLoans();
			echo json_encode($result);
		}

		public function getDisapprovedLoans(){
			$result = $this->loan_model->getDisapprovedLoans();
			echo json_encode($result);
		}

		public function addLoan() {
			// Add loan -> modal
			$result = $this->loan_model->addLoan();
			$msg['success'] = false;
			$msg['type'] = 'add';
			if($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		public function editLoan() {
			$result = $this->loan_model->editLoan();
			echo json_encode($result);
		}

		public function updateLoan() {
			$result = $this->loan_model->updateLoan();
			$msg['success'] = false;
			if($result) {
				$msg['success'] = true;
				$msg['type'] = 'update';
			}
			echo json_encode($msg);
		}

		public function showLoansArchive(){
			$result = $this->loan_model->showLoansArchive();
			echo json_encode($result);
		}

		public function archiveLoan() {
			$result = $this->loan_model->archiveLoan();
			$msg['success'] = false;
			if($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		public function unarchiveLoan(){
			$result = $this->loan_model->unarchiveLoan();
			echo json_encode($result);
		}

		public function deleteLoan(){
			$result = $this->loan_model->deleteLoan();
			echo json_encode($result);
		}

		
		
	}
