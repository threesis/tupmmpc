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

		public function signout() {
			// Unset user data
			$this->session->sess_destroy();
			// Redirect to the home page
			redirect(base_url());
		}

	}