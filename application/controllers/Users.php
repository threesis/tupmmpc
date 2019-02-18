<?php
	class Users extends CI_Controller {
		public function signin() {
			// Check login session
			// If they go to the sign in page while signed in
			if($this->session->userdata('signed_in')) {
				redirect('home');
			} else {
				// Validation
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE) {
				// Redirects to signin view
				$this->load->view('users/signin');

			} else {
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt password
				$password = md5($this->input->post('password'));
				// Login user -> model
				$user_info = $this->user_model->signin($username, $password);

				if($user_info) {
					// Create session
					$session_data = array(
						'roleID' => $user_info[0]['position'],
						'position' => $user_info[0]['role_name'],
						'name' => $user_info[0]['name'],
						'username' => $username,
						'user_id' => $user_info[0]['id'],
						'signed_in' => true
					);
					// Set user session
					$this->session->set_userdata($session_data);
					// Message
					$this->session->set_flashdata('user_signedin', 'Welcome back, ');
					// Redirect to the admin page
					redirect('home');

				} else {
					// Set message
					$this->session->set_flashdata('signin_failed', 'Username or Password is invalid!');
					// Redirect back to the signin page
					redirect('signin');
				}
			}

			}
			
		}

		public function activities() {
			if($this->session->userdata('signed_in')) {
				redirect('home');
			} else {
				$this->load->view('pages/activities');
			}
		}

		public function getMyLoanRecords(){
			$result = $this->user_model->getMyLoanRecords();
			echo json_encode($result);
		}

		public function getUserShareCap(){
			$result = $this->user_model->getUserShareCap();
			echo json_encode($result);
		}

		public function getUserLoanRecords(){
			$result = $this->user_model->getUserLoanRecords();
			echo json_encode($result);
		}

		public function signout() {
			// Unset user data
			$this->session->sess_destroy();
			// Redirect to the home page
			redirect(base_url());
		}

	}