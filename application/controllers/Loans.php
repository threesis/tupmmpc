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

		public function getActiveLoans(){
			$result = $this->loan_model->getActiveLoans();
			echo json_encode($result);
		}

		public function getLoans(){
			$result = $this->loan_model->getLoans();
			echo json_encode($result);
		}

		public function getLoanRecord(){
			$result = $this->loan_model->getLoanRecord();
			echo json_encode($result);
		}

		public function getActiveLoanTbl(){
			$result = $this->loan_model->getActiveLoanTbl();
			echo json_encode($result);
		}

		public function getChequeDetails(){
			$result = $this->loan_model->getChequeDetails();

			$data = array();

			foreach($result->result() as $r) {
       	$data[] = array(
            $r->loan_amount,
            $r->loan_term,
            $r->loan_interest,
            $r->monthly_deduc,
            $r->cheque_no,
            $r->id,
            $r->loan_name,
            $r->remarks
       	);
      }

			echo json_encode($data);
		}

		public function insertLoanVoucher(){
			$result = $this->loan_model->insertLoanVoucher();
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

		public function showLoanDeductions(){
			$result = $this->loan_model->showLoanDeductions();
			echo json_encode($result);
		}

		public function addLoanDeductions(){
			$result = $this->loan_model->addLoanDeductions();
			echo json_encode($result);
		}

		public function updateLoanDeductions(){
			$result = $this->loan_model->updateLoanDeductions();
			echo json_encode($result);
		}

		public function deleteLoanDeductions(){
			$result = $this->loan_model->deleteLoanDeductions();
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
