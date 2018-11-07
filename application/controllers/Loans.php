<?php
	class Loans extends CI_Controller {
		public function loan_status() {
			$data = $this->loan_model->loan_status();
			print_r($data);

			$this->load->view('pages/creditofficer', $data);
		}
	}
