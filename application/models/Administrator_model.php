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
			$input = $this->input->post('query');
			if($input != '') {
				$this->db->like('name', $input);
			}
			$this->db->order_by('name', 'ASC');
			$query = $this->db->from('members')->join('roles', 'roles.role_id = members.position')->join('share_capital', 'share_capital.user_id = members.id')->get();
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
				'birthday' => date('Y-m-d', strtotime($this->input->post('bday')))
			);

			$inserted = $this->db->insert('members', $member_data);
			$last_id = $this->db->insert_id();

			if($inserted) {
				$share_cap_data = array(
					'user_id' => $last_id,
					'share_capital' => $this->input->post('sharecap'),
					'total_share_capital' => $this->input->post('sharecap')
				);

				$this->db->insert('share_capital', $share_cap_data);
				if($this->db->affected_rows() > 0) {
					return true;
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

		public function testing() {
			$id = $this->input->get('id');
			$this->db->where('role_id', $id);
			$this->db->where('access', '1');
			$query = $this->db->select('*')->from('role_perm')->join('permissions', 'permissions.perm_id = role_perm.perm_id')->get();
				return $query->result();
		}

		public function testing1() {
			$id = $this->input->get('id');
			$role_id = $this->input->get('role_id');
			$this->db->where('perm_id', $id);
			$this->db->where('role_id', $role_id);
			$this->db->where('access', '1');
			$query = $this->db->select('*')->from('role_perm')->join('permissions_roles', 'permissions_roles.pr_id = role_perm.perm_role_id')->get();
				return $query->result();
		}

		public function populateLoanAppManagementPerm() {
			$role_id = $this->input->get('role_id');
			$this->db->where('perm_id', 5);
			$this->db->where('role_id', $role_id);
			$this->db->where('access', '1');
			$query = $this->db->select('*')->from('role_perm')->join('permissions_roles', 'permissions_roles.pr_id = role_perm.perm_role_id')->get();
				return $query->result();
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

		public function retrieveRolePermissions() {
			$roleName = $this->input->get('role');
			$this->db->where('role_name', $roleName);
			$query = $this->db->select('*')->from('roles')->join('role_perm', 'role_perm.role_id = roles.role_id')->join('permissions', 'permissions.perm_id = role_perm.perm_id')->join('permissions_roles', 'permissions_roles.pr_id = role_perm.perm_role_id')->get();
				return $query->result();
		}

		public function setPermissions() {
			$array_id = $this->input->get('ids');
			$this->db->set('access', 1);
			$this->db->where_in('rp_id', $array_id);
			$this->db->update('role_perm');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function setPermissions2() {
			$array_id2 = $this->input->get('ids');
			$this->db->set('access', 0);
			$this->db->where_in('rp_id', $array_id2);
			$this->db->update('role_perm');
			if($this->db->affected_rows() > 0) {
				return true;
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

		public function getAllMembers() {
			$query = $this->db->get('members');
			return $query->num_rows();
		}

		public function getAllAppliedLoans() {
			$query = $this->db->get('loan_applications');
			return $query->num_rows();
		}

		public function getAllPendingLoans() {
			$this->db->where('status', 'Pending');
			$query = $this->db->get('loan_applications');
			return $query->num_rows();
		}

		public function getAllApprovedLoans() {
			$query = $this->db->get('approved_loan_apps');
			return $query->num_rows();
		}

		public function getAllActiveLoans() {
			$query = $this->db->get('active_loan_apps');
			return $query->num_rows();
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
			$input = $this->input->get('query');
			if($input != '') {
				$this->db->like('name', $input);
			}
			$this->db->select('*')->from('share_capital a');
			$this->db->join('members b', 'b.id = a.user_id', 'left');
			$this->db->order_by('a.id', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}
		
	}