<?php
	class Administrators extends CI_Controller {
		public function admin() {
			// Check login session
			if(!$this->session->userdata('signed_in')) {
				// Set message
				$this->session->set_flashdata('not_signedin', 'You must sign in to continue!');
				// Redirect to sign in page
				redirect('signin');
			} elseif($this->session->userdata('signed_in')) {
				// Redirect to admin page
				$this->load->view('pages/admin');
			} else {
				show_404();
			}
		}


		// Retrieve loan function
		public function get_loans() {
			// Get all loans from database -> model
			$result = $this->administrator_model->get_all_loan_types();
			echo json_encode($result);
		}

		// Add loan function
		public function add_loan() {
			// Add loan -> modal
			$result = $this->administrator_model->register_loan();
			$msg['success'] = false;
			$msg['type'] = 'add';
			if($result) {
				// If there are data returned from the model.. 
				$msg['success'] = true;
			}
			// Convert $msg to json type to become readable thru ajax request
			echo json_encode($msg);
		}

		// Edit loan function
		public function edit_loan() {
			$result = $this->administrator_model->edit_loan();
			echo json_encode($result);
		}

		// Update loan function
		public function update_loan() {
			$result = $this->administrator_model->update_loan();
			$msg['success'] = false;
			if($result) {
				$msg['success'] = true;
				$msg['type'] = 'update';
			}
			echo json_encode($msg);
		}

		// Delete loan function
		public function delete_loan() {
			$result = $this->administrator_model->delete_loan();
			$msg['success'] = false;
			if($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		// Delete user function
		public function delete_user() {
			$result = $this->administrator_model->delete_user();
			$msg['success'] = false;
			if($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		// Sort member by date
		public function sort_member_date() {
			$result = $this->administrator_model->sort_member_date();
			echo json_encode($result);
		}

		// Sort member by position
		public function sort_member_position() {
			$result = $this->administrator_model->sort_member_position();
			echo json_encode($result);
		}

		// Sort member by date
		public function sort_member_college() {
			$result = $this->administrator_model->sort_member_college();
			echo json_encode($result);
		}

		// Search member function 
		public function search_user() {
			$result = $this->administrator_model->search_user();
			echo json_encode($result);
		}
		
		// Register member function
		public function add_member() {
			$result = $this->administrator_model->add_member();
			$msg['success'] = false;
			if($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		// Retrieve latest member registration date -> model
		public function get_latest_date() {
			$result = $this->administrator_model->get_latest_date();
			echo json_encode($result);
		}

		public function getMember_latest_date() {
			$result = $this->administrator_model->getMember_latest_date();
			echo json_encode($result);
		}

<<<<<<< HEAD
		public function save_info() {
			// Add loan -> modal
			$result = $this->administrator_model->save_info();
			$msg['success'] = false;
			$msg['type'] = 'add';
			if($result) {
				// If there are data returned from the model.. 
				$msg['success'] = true;
			}
			// Convert $msg to json type to become readable thru ajax request
			echo json_encode($msg);
=======
		public function testing() {
			$result = $this->administrator_model->testing();
			echo json_encode($result);
>>>>>>> d63d7a81ebb4a2bbd1aad75f251dcea6a9df989a
		}
	}