<?php
	class Pages extends CI_Controller {
		public function index() {
			// Check login session
			if(!$this->session->userdata('signed_in')) {
				$this->load->view('pages/home');
			// If they go to the home page while signed in
			} elseif($this->session->userdata('signed_in')) {
				redirect('home');
			} else {
				show_404();
			}
		}
	}