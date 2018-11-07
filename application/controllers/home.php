<?php
	class Home extends CI_Controller {
		public function index() {
			$this->load->view('layouts/main');
		}

		// Get loan function
		public function get_loans() {
			// Get all loans from database -> model
			$result = $this->home_model->get_all_loan_types();
			echo json_encode($result);
		}
	}

	