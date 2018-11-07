<?php
	class Creditofficers extends CI_Controller {
		public function credit_officer() {
			// Check login session
			if(!$this->session->userdata('signed_in')) {
				// Set message
				$this->session->set_flashdata('not_signedin', 'You must sign in to continue!');
				// Redirect to sign in page
				redirect('signin');
			} elseif($this->session->userdata('signed_in') && ($this->session->userdata('position') == 'Credit Officer')) {
				$this->load->view('pages/creditofficer');
			} else {
				show_404();
			}
		}

		public function getPendingLoans() {
			$result = $this->creditofficer_model->getPendingLoans();
			echo json_encode($result);
		}

		public function getApprovedLoans() {
			$result = $this->creditofficer_model->getApprovedLoans();
			echo json_encode($result);
		}

		public function getDisapprovedLoans() {
			$result = $this->creditofficer_model->getDisapprovedLoans();
			echo json_encode($result);
		}
	}