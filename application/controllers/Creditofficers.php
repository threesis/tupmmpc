<?php
	class Creditofficers extends CI_Controller {

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

		
	}