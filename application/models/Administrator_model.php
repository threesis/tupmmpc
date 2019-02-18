<?php
	class Administrator_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_infos() {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('website_info');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}

		public function save_infos() {
			$web_data = array(
				'title' => $this->input->post('webtitle'),
				'telephone_no' => $this->input->post('webtelno'),
				'cellphone_no' => $this->input->post('webphoneno'),
				'address' => $this->input->post('weblocation'),
				'email' => $this->input->post('webemail'),
				'web_link' => $this->input->post('webaddress'),
				'fb_account' => $this->input->post('webfb'),
				'twitter_account' => $this->input->post('webtwitter')
			);
			// Insert loan to db
			$this->db->insert('website_info', $web_data);
			if($this->db->affected_rows() > 0) {
				return true; 
			} else { 
				return false;
			}
		}

		public function delete_user() {
			$id = $this->input->get('id');
			$this->db->where('id', $id);
			$this->db->delete('members');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function sort_member_date() {
			$this->db->order_by('name', 'asc');
			$query = $this->db->from('members')->join('roles', 'roles.role_id = members.position')->get();
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function search_user() {
			$this->db->select('*')->from('members a','left');
			$this->db->join('roles b', 'b.role_id = a.position');
			$this->db->join('share_capital c', 'c.user_id = a.id')->select_max('total_share_capital');
			$this->db->group_by('id');
			$query = $this->db->get();
			return $query->result();
		}

		public function searchLoan() {
			$input = $this->input->post('query');
			if($input != '') {
				$this->db->like('loan_name', $input);
				$this->db->or_like('loan_max_amt', $input);
			}
			$this->db->where('loan_status', 'active');
			$this->db->order_by('date_created', 'DESC');
			$query = $this->db->from('loan_types')->get();
			return $query->result();
		}

		public function add_member() {
			$memDate = $this->input->post('membershipDate');
			$member_data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('city'),
				'zipcode' => $this->input->post('zip'),
				'college' => $this->input->post('college'),
				'position' => $this->input->post('position'),
				'username' => $this->input->post('Uname'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'contact_no' => $this->input->post('phone'),
				'user_img' => 'noimage.jpg',
				'birthday' => date('Y-m-d', strtotime($this->input->post('bday'))),
				'register_date' => $memDate
			);

			$inserted = $this->db->insert('members', $member_data);
			$last_id = $this->db->insert_id();

			if($inserted) {
				$share_cap_data = array(
					'user_id' => $last_id,
					'share_capital' => $this->input->post('sharecap'),
					'total_share_capital' => $this->input->post('startingShareCap'),
					'subscribe_share' => $this->input->post('subscribeShare'),
					'or_number' => $this->input->post('orNum'),
					'status' => 'paid',
					'updated_for' => date('Y-m-d'),
					'date_updated' => date('Y-m-d')
				);

				$this->db->insert('share_capital', $share_cap_data);
				if($this->db->affected_rows() > 0) {
					$total = $this->db->query("select sum(share_capital+total_share_capital) as tot from share_capital where user_id = $last_id group by sc_id DESC LIMIT 1")->row()->{'tot'};
					$data = array(
						'user_id' => $last_id,
						'share_capital' => $this->input->post('sharecap'),
						'total_share_capital' => $total,
						'status' => 'unpaid',
						'updated_for' => date('Y-m-d', strtotime('+1 month'))
					);
					$this->db->insert('share_capital', $data);
					if($this->db->affected_rows() > 0) {
						return true;
					}
				}
			} else {
				return false;
			}
		}

		public function get_latest_date() {
			$query = $this->db->query('SELECT DATE_FORMAT(date_created, "%W, %M %d, %Y - %h:%i %p") as date_created FROM loan_types ORDER BY id DESC LIMIT 1');
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getMember_latest_date() {
			$query = $this->db->query('SELECT DATE_FORMAT(register_date, "%W, %M %d, %Y - %h:%i %p") as register_date FROM members ORDER BY id DESC LIMIT 1');
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getRoles() {
			$this->db->order_by('role_id', 'ASC');
			$query = $this->db->get('roles');
			if($query->num_rows() > 0) {
				// If there are data detected in the db, return the rows to the controller
				return $query->result();
			} else {
				return false;
			}
		}

		public function verifyAccountPassword() {
			$userName = $this->input->get('userName');
			$userPass = md5($this->input->get('userPass'));
			$this->db->where('username', $userName);
			$this->db->where('password', $userPass);
			$query = $this->db->from('members')->get();

			if($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}

		public function retrieveUserInfo() {
			$userName = $this->session->userdata('username');
			$this->db->where('username', $userName);
			$query = $this->db->get('members');
				return $query->result_array();
		}

		public function retrieveCommitteeInstances() {
			$this->db->where('position', 3);
			$query = $this->db->get('members');
			if($query->num_rows() == 3) {
				return false;
			} else {
				return $query->result_array();
			}
		}

		public function updateUserInfo($user_image) {
			$userID = $this->input->post('idEdit');
			$updatedInfo = array(
				'name' => $this->input->post('nameEdit'),
				'email' => $this->input->post('emailEdit'),
				'birthday' => date('Y-m-d', strtotime($this->input->post('birthdayEdit'))),
				'college' => $this->input->post('collegeEdit'),
				'user_img' => $user_image
			);
			$this->db->where('id', $userID);
			$this->db->update('members', $updatedInfo);
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function getAllMembers($userType) {
			$query = $this->db->get('members');
			return $query->num_rows();
		}
    
		public function getAllAppliedLoans($userType, $userID) {
			if($userType == 'Chairman') {
				$query = $this->db->get('loan_applications');
				return $query->num_rows();
			} elseif ($userType == 'Member') {
				$query = $this->db->where('member_id', $userID)->get('loan_applications');
				return $query->num_rows();
			} 
		}

		public function getAllPendingLoans($userType, $userID) {
			if($userType == 'Chairman') {
				$this->db->where('status', 'Pending');
				$query = $this->db->get('loan_applications');
				return $query->num_rows();
			} elseif ($userType == 'Member') {
				$this->db->where('status', 'Pending');
				$query = $this->db->where('member_id', $userID)->get('loan_applications');
				return $query->num_rows();
			}
		}

		public function getAllApprovedLoans($userType, $userID) {
			if($userType == 'Chairman') {
				$this->db->where('status', 'Approved');
				$query = $this->db->get('loan_applications');
				return $query->num_rows();
			} elseif ($userType == 'Member') {
				$this->db->where('status', 'Approved');
				$this->db->where('member_id', $userID);
				$query = $this->db->get('loan_applications');
				return $query->num_rows();
			}
		}

		public function getAllActiveLoans($userType, $userID) {
			if($userType == 'Chairman') {
				$this->db->where('status', 'Active');
				$query = $this->db->get('loan_applications');
				return $query->num_rows();
			} elseif ($userType == 'Member') {
				$this->db->where('status', 'Active');
				$this->db->where('member_id', $userID);
				$query = $this->db->get('loan_applications');
				return $query->num_rows();
			}
		}

		public function getTotalLoanPayments($userType) {
			$this->db->select_sum('balance')->from('active_loan_apps');
			$query = $this->db->get();
			return $query->result();
		}

		public function getAllMissedPayments() {
			$this->db->select_sum('balance')->from('active_loan_apps');
			$query = $this->db->get();
			return $query->result();
		}

		public function getTotalShareCapital() {
			$this->db->select_sum('total_share_capital')->from('share_capital');
			$query = $this->db->get();
			return $query->result();
		}

		public function updateShareCapital() {
			date_default_timezone_set('Asia/Manila');

			$or = $this->input->get('ornum');
			$ids = json_decode($this->input->get('check'));

			if($ids){
				foreach ($ids as $id) {
					$share = $this->db->query("select share_capital as share from share_capital where user_id = $id")->row()->{'share'};
					$total = $this->db->query("select sum(share_capital+total_share_capital) as tot from share_capital where user_id = $id group by sc_id DESC LIMIT 1")->row()->{'tot'};
					$lastID = $this->db->query("select sc_id as id from share_capital where user_id = $id group by total_share_capital DESC LIMIT 1")->row()->{'id'};

						$this->db->set('or_number', $or);
						$this->db->set('status', 'paid');
						$this->db->set('date_updated', date('Y-m-d'));
						$this->db->where('sc_id', $lastID);
						$this->db->update('share_capital');

						$data = array(
							'user_id' => $id,
							'share_capital' => $share,
							'total_share_capital' => $total,
							'status' => 'unpaid',
							'updated_for' => date('Y-m-d', strtotime('+1 month'))
						);
						$this->db->insert('share_capital', $data);
				}
				return true;
			} else {
				return false;
			}

		}

		public function updateLedgers() {
			date_default_timezone_set('Asia/Manila');

			$or = $this->input->get('ornum');
			$ids = json_decode($this->input->get('check'));
			$md = json_decode($this->input->get('md'));

			if($ids){
				foreach ($ids as $id => $code) {
					$balance = $this->db->query("select balance as bal from active_loan_apps where loanapp_id = $code")->row()->{'bal'};
					$remark = $this->db->query("select remarks as rm from active_loan_apps where loanapp_id = $code")->row()->{'rm'};
					$lastID = $this->db->query("select id as active_id from active_loan_apps where loanapp_id = $code")->row()->{'active_id'};
					$diff = $balance - $md[$id];

						$this->db->set('or_number', $or);
						$this->db->set('payment_status', 'paid');
						$this->db->set('payment_date', date('Y-m-d'));
						$this->db->where('id', $lastID);
						$this->db->update('active_loan_apps');

						$data = array(
							'loanapp_id' => $code,
							'balance' => $diff,
							'remarks' => $remark,
							'payment_status' => 'unpaid',
							'payment_for' => date('Y-m-d', strtotime('+1 month'))
						);
						$this->db->insert('active_loan_apps', $data);
				}
				return true;
			} else {
				return false;
			}

		}

		public function updateUserPass() {
			$userID = $this->input->get('userID');
			$newPass = $this->input->get('newPass');
			$this->db->set('password', $newPass);
			$this->db->where('id', $userID);
			$this->db->update('members');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function getShareCapitalRec(){
			$month = $this->input->get('mo');
			$year = $this->input->get('yr');
			if(($month || $year) != ''){
				$this->db->like('MONTH(updated_for)', $month);
				$this->db->like('YEAR(updated_for)', $year);
			}
			$this->db->select('*')->select_min('total_share_capital')->from('share_capital a');
			$this->db->join('members b', 'b.id = a.user_id', 'left');
			$this->db->group_by('user_id');
			$this->db->order_by('status', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		public function viewCollections(){
			/*$loans = $this->db->select('loan_name')->get('loan_types')->result();

			foreach ($loans as $loan) {
				$new = $loan->loan_name;
				$this->db->select("or_number, payment_date, CASE WHEN loan_name = '$new' THEN balance END '$new'");
			}*/

			$this->db->select('or_number, payment_date, loan_name, balance');
			$this->db->group_by('or_number, payment_date')->from('active_loan_apps a');
			$this->db->join('loan_applications b', 'b.loanapp_id = a.loanapp_id');
			$this->db->join('loan_types c', 'c.id = b.loan_applied');
			$this->db->where('b.member_id', 2);
			$query = $this->db->get();
			return array('result' => $query->result(), 'numcols' => $this->db->select('loan_name')->get('loan_types')->result());
		}

		public function updateLedger(){
			$month = $this->input->get('mo');
			$year = $this->input->get('yr');
			if(($month || $year) != ''){
				$this->db->like('MONTH(payment_for)', $month);
				$this->db->like('YEAR(payment_for)', $year);
			}
			$this->db->select('*')->select_min('balance')->from('active_loan_apps a');
			$this->db->join('loan_applications b', 'b.loanapp_id = a.loanapp_id');
			$this->db->join('members c', 'c.id = b.member_id');
			$this->db->join('loan_types d', 'd.id = b.loan_applied');
			$this->db->group_by('a.loanapp_id');
			$this->db->order_by('payment_status', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}
		
	}