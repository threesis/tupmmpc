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
			$this->db->select('*')->select_max('b.balance')->from('loan_applications a');
			$this->db->join('active_loan_apps b', 'b.loanapp_id = a.loanapp_id', 'left');
			$this->db->join('loan_types c', 'c.id = a.loan_applied');
			$this->db->join('members d', 'd.id = a.member_id');
			$this->db->where('a.member_id', $id);
			$this->db->group_by('a.loanapp_id');
			$this->db->order_by('a.loanapp_id', 'DESC');
			$query = $this->db->get();
			
			foreach ($query->result() as $r) {
				if($r->comaker_1 == '') {
					$cm1 = "null";
				} else {
					$cm1 = $this->db->query("SELECT name AS cm1 FROM members WHERE id = $r->comaker_1")->row()->{'cm1'};
				}
				if($r->comaker_2 == '') {
					$cm2 = "null";
				} else {
					$cm2 = $this->db->query("SELECT name AS cm2 FROM members WHERE id = $r->comaker_2")->row()->{'cm2'};
				} 
				if($r->comaker_3 == '') {
					$cm3 = "null";
				} else {
					$cm3 = $this->db->query("SELECT name AS cm3 FROM members WHERE id = $r->comaker_3")->row()->{'cm3'};
				}

				$res[] = array(
					'comaker_1' => $cm1,
					'comaker_2' => $cm2,
					'comaker_3' => $cm3
				);
			}

			return array('result' => $query->result(), 'comakers' => $res);
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

		public function checkNotif(){	
			$username = $this->input->get('username');	
			$this->db->select('*')->from('notifications a');	
			$this->db->join('members b', 'b.username = a.noti_for');
			$this->db->join('approved_loan_apps c', 'c.id = a.noti_voucher');
			$this->db->join('loan_app_deducs d', 'd.voucher_id = a.noti_voucher');	
			$this->db->group_by('d.voucher_id');
			$this->db->where('noti_for', $username);	
			$query = $this->db->get();	
			return $query->result();	
		}	
		
 		public function notified() {	
			$username = $this->input->get('username');	
			$this->db->set('noti_status', 0);	
			$this->db->where('noti_for', $username);	
			$this->db->update('notifications');	
			if($this->db->affected_rows() > 0) {	
				return true;	
			} else {	
				return false;	
			}	
		}

		public function viewVoucher() {	
			$voucher = $this->input->get('voucher');
			$this->db->select('*')->from('loan_app_deducs a');
			$this->db->join('approved_loan_apps b', 'b.id = a.voucher_id');
			$this->db->join('loan_deductions c', 'c.deduc_id = a.loan_deduc');
			$this->db->join('loan_applications d', 'd.loanapp_id = b.loanapp_id');
			$this->db->join('loan_types e', 'e.id = d.loan_applied');
			$this->db->where('voucher_id', $voucher);
			$query = $this->db->get();
			return $query->result();
		}
	}