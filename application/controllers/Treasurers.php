<?php
	class Treasurers extends CI_Controller {
		public function treasurer() {
			// Check login session
			if(!$this->session->userdata('signed_in')) {
				// Set message
				$this->session->set_flashdata('not_signedin', 'You must sign in to continue!');
				// Redirect to sign in page
				redirect('signin');
			} elseif($this->session->userdata('signed_in') && ($this->session->userdata('position') == 'Treasurer')) {
				$this->load->view('pages/treasurer');
			} else {
				show_404();
			}
		}
	}