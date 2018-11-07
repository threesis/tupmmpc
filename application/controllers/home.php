<?php
	class Home extends CI_Controller {
		public function index() {
			$this->load->view('layouts/main');
		}
<<<<<<< HEAD
	}
=======

		// Get loan function
		public function get_loans() {
			// Get all loans from database -> model
			$result = $this->home_model->get_all_loan_types();
			echo json_encode($result);
		}
	}

	
>>>>>>> fefb475a82ae0dbf4e27631a1c8d08464f3c140a
