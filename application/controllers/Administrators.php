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
				$userType = $this->session->userdata('position');
				$userID = $this->session->userdata('user_id');
				$userName = $this->session->userdata('username');
				$data['user_image'] = $this->administrator_model->retrieveUserInfo();
				$data['members'] = $this->administrator_model->getAllMembers($userType);
				$data['loansApplied'] = $this->administrator_model->getAllAppliedLoans($userType, $userID);
				$data['pendingLoans'] = $this->administrator_model->getAllPendingLoans($userType, $userID);
				$data['approvedLoans'] = $this->administrator_model->getAllApprovedLoans($userType, $userID);
				$data['ongoingLoans'] = $this->administrator_model->getAllActiveLoans($userType, $userID);
				$data['totalPayments'] = $this->administrator_model->getTotalLoanPayments($userType);
				$data['missedPayments'] = $this->administrator_model->getAllMissedPayments($userType);
				$data['totalShareCapital'] = $this->administrator_model->getTotalShareCapital($userType);

				$this->load->view('pages/admin', $data);
			} else {
				show_404();
			}
		}

		//hget web infos 
		public function get_infos() {
			$result = $this->administrator_model->get_infos();
			echo json_encode($result);
		}

		public function save_infos() {
			// Add loan -> modal
			$result = $this->administrator_model->save_infos();
			$msg['success'] = false;
			if($result) {
				// If there are data returned from the model.. 
				$msg['success'] = true;
			}
			// Convert $msg to json type to become readable thru ajax request
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

		public function searchLoan() {
			$result = $this->administrator_model->searchLoan();
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

		// Get loan details
		public function getLoanAppDetails() {
			$result = $this->loan_model->getLoanAppDetails();
			echo json_encode($result);
		}

		// Manage loan apps
		public function manageLoanApps() {
			$result = $this->loan_model->manageLoanApps();
			echo json_encode($result);
		}

		public function cancelLoanApp() {
			$result = $this->loan_model->cancelLoanApp();
			echo json_encode($result);
		}
		
		public function populateLoanAppManagementPerm() {
			$result = $this->administrator_model->populateLoanAppManagementPerm();
			echo json_encode($result);
		}

		public function getRoles() {
			$result = $this->administrator_model->getRoles();
			echo json_encode($result);
		}

		public function retrieveParentOptions() {
			$result = $this->administrator_model->retrieveParentOptions();
			echo json_encode($result);
		}

		public function retrieveChildOptions() {
			$result = $this->administrator_model->retrieveChildOptions();
			echo json_encode($result);
		}

		public function retrieveRolePermissions() {
			$result = $this->administrator_model->retrieveRolePermissions();
			echo json_encode($result);
		}

		public function setPermissions() {
			$result = $this->administrator_model->setPermissions();
			echo json_encode($result);
		}

		public function setPermissions2() {
			$result = $this->administrator_model->setPermissions2();
			echo json_encode($result);
		}

		public function verifyAccountPassword() {
			$result = $this->administrator_model->verifyAccountPassword();
			echo json_encode($result);
		}

		public function retrieveUserInfo() {
			$result = $this->administrator_model->retrieveUserInfo();
			echo json_encode($result);
		}

		public function getAllMembers() {
			$result = $this->administrator_model->getAllMembers();
			echo json_encode($result);
		}

		public function retrieveCommitteeInstances() {
			$result = $this->administrator_model->retrieveCommitteeInstances();
			echo json_encode($result);
		}

		public function updateUserInfo() {
			$config['upload_path']   = './assets/img/profile_img';
			$config['allowed_types'] = 'gif|png|jpg';
			$config['max_size'] 	 = 5000;
			$config['max_width']     = 0;
			$config['max_height']    = 0;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()) {
				$error = array('error' => $this->upload->display_errors());
				$user_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$user_image = $_FILES['userfile']['name'];
			}

			$result = $this->administrator_model->updateUserInfo($user_image);
			echo json_encode($result);
		}

		public function updateUserPass() {
			$result = $this->administrator_model->updateUserPass();
			echo json_encode($result);
		}
		
		public function encryptCurrentPass() {
			$result = array(
				'currentPass' => md5($this->input->get('currentPass')),
				'desiredNewPass' => md5($this->input->get('desiredNewPass'))
			);
			echo json_encode($result);
		}

		public function getShareCapitalRec(){
			$result = $this->administrator_model->getShareCapitalRec();
			echo json_encode($result);
		}

		public function viewCollections(){
			$result = $this->administrator_model->viewCollections();
			echo json_encode($result);
		}

		public function updateLedger(){
			$result = $this->administrator_model->updateLedger();
			echo json_encode($result);
		}

		// Dashboard 
		public function getTotalLoanPayments(){
			$result = $this->administrator_model->getTotalLoanPayments();
			echo json_encode($result);
		}

		public function getAllMissedPayments(){
			$result = $this->administrator_model->getAllMissedPayments();
			echo json_encode($result);
		}

		public function getTotalShareCapital(){
			$result = $this->administrator_model->getTotalShareCapital();
			echo json_encode($result);
		}

		public function updateShareCapital(){
			$result = $this->administrator_model->updateShareCapital();
			echo json_encode($result);
		}

		public function updateLedgers(){
			$result = $this->administrator_model->updateLedgers();
			echo json_encode($result);
		}
		
	}