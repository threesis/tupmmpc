<?php
	class Members extends CI_Controller {
		public function member() {
			// Check login session
			if(!$this->session->userdata('signed_in')) {
				// Set message
				$this->session->set_flashdata('not_signedin', 'You must sign in to continue!');
				// Redirect to sign in page
				redirect('signin');
			} elseif($this->session->userdata('signed_in') && ($this->session->userdata('position') == 'Member')) {
				$this->load->view('pages/member');
			} else {
				show_404();
			}
		}
	}