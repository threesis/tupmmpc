<?php
	class Pages extends CI_Controller {
		public function index() {
			// Check login session
			if(!$this->session->userdata('signed_in')) {
				$this->load->view('pages/home');
			// If they go to the home page while signed in
			} elseif($this->session->userdata('signed_in') && ($this->session->userdata('position') == 'Administrator')) {
				redirect('admin');
			} elseif($this->session->userdata('signed_in') && ($this->session->userdata('position') == 'Member')) {
				redirect('member');
			} elseif($this->session->userdata('signed_in') && ($this->session->userdata('position') == 'Treasurer')) {
				redirect('treasurer');
			} elseif($this->session->userdata('signed_in') && ($this->session->userdata('position') == 'Credit Officer')) {
				redirect('credit_officer');
			} else {
				show_404();
			}
		}
	}