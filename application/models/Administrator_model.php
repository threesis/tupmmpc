<?php
	class Administrator_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_all_loan_types() {
			// Get all loans in the table descending by date
			$this->db->order_by('date_created', 'DESC');
			$query = $this->db->get('loan_types');
			if($query->num_rows() > 0) {
				// If there are data detected in the db, return the rows to the controller
				return $query->result();
			} else {
				return false;
			}
		}

		public function register_loan() {
			$loan_data = array(
				'loan_name' => $this->input->post('loan_name'),
				'loan_max_amt' => $this->input->post('loan_max_amt'),
				'loan_max_term' => $this->input->post('loan_max_term'),
				'loan_interest' => $this->input->post('loan_interest')
			);
			// Insert loan to db
			$this->db->insert('loan_types', $loan_data);
			if($this->db->affected_rows() > 0) {
				return true;
			} else { 
				return false;
			}
		}

		public function edit_loan() {
			$id = $this->input->get('id');
			$this->db->where('id', $id);
			$query = $this->db->get('loan_types');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}

		public function update_loan() {
			$id = $this->input->post('loan_id');
			$loan_update_data = array(
				'loan_max_amt' => $this->input->post('loan_max_amt'),
				'loan_max_term' => $this->input->post('loan_max_term'),
				'loan_interest' => $this->input->post('loan_interest')
			);
			$this->db->where('id', $id);
			$this->db->update('loan_types', $loan_update_data);
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function delete_loan() {
			$id = $this->input->get('id');
			$this->db->where('id', $id);
			$this->db->delete('loan_types');
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
			$query = $this->db->get('members');
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
			$query = $this->db->get('members');
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
				'birthday' => date('Y-m-d', strtotime($this->input->post('bday')))
			);

			$this->db->insert('members', $member_data);
			if($this->db->affected_rows() > 0) {
				return true;
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
			$query = $this->db->select('*')->from('role_perm')->join('permissions', 'permissions.perm_id = role_perm.perm_id')->get();
				return $query->result();
		}
		
	}