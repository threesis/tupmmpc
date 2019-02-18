<?php
	class User_model extends CI_Model {
		public function register($enc_password) {
			// User data array
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $enc_password,
				'name' => $this->input->post('name'),
				'birthday' => $this->input->post('birthday'),
				'address' => $this->input->post('address'),
				'zipcode' => $this->input->post('zipcode'),
				'college' => $this->input->post('college')
			);

			// Insert user to db
			return $this->db->insert('members', $data);
		}

		public function signin($username, $password) {
			date_default_timezone_set('Asia/Manila');
			// Validate
			$this->db->where('username like binary', $username);
			$this->db->where('password like binary', $password);
			$result = $this->db->from('members')->join('roles', 'roles.role_id = members.position')->get();

			if(count($result) == 1) {
				$this->db->set('last_login', date('Y-m-d H:i:s'));
				$this->db->where('username', $username);
				$this->db->update('members');
				if($this->db->affected_rows() > 0) {
					return $result->result_array();
				}
			} else {
				return false;
			}
		}

		public function getMyLoanRecords(){
			$id = $this->input->get('id');
			$this->db->select('*')->from('loan_applications a');
			$this->db->join('active_loan_apps b', 'b.loanapp_id = a.loanapp_id', 'left');
			$this->db->join('loan_types c', 'c.id = a.loan_applied');
			$this->db->join('members d', 'd.id = a.member_id');
			$this->db->where('a.member_id', $id);
			$this->db->order_by('a.loanapp_id', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		public function getUserShareCap(){
			$id = $this->input->get('id');
			$this->db->select('*')->from('share_capital');
			$this->db->where('user_id', $id);
			$this->db->order_by('sc_id', 'ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function getUserLoanRecords(){
			$id = $this->input->get('id');
			$this->db->select('*')->from('active_loan_apps a');
			$this->db->join('loan_applications b', 'b.loanapp_id = a.loanapp_id');
			$this->db->join('loan_types c', 'c.id = b.loan_applied');
			$this->db->where('member_id', $id);
			$this->db->order_by('a.id', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

	}