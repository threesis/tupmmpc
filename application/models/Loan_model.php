<?php
	class Loan_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function checkVerifiedApp() {
			$cc = $this->input->get('cc');
			$id = $this->input->get('id');
			$where = "cc_approval_1 = '$cc' OR cc_approval_2= '$cc' OR cc_approval_3= '$cc'";
			$this->db->where('loanapp_id', $id);
			$this->db->where($where);
			$this->db->order_by('date_created', 'DESC');
			$query = $this->db->from('loan_applications')->get();

			if($query->num_rows() > 0) {
				return array('result' => $query->result(), 'numrows' => $query->num_rows());
			} else {
				return array('result' => $query->result(), 'numrows' => $query->num_rows());
			}
		}

		public function getPendingLoans() {
			$input = $this->input->get('query');
			if($input != '') {
				$this->db->like('name', $input);
			}
			$this->db->select('*')->from('loan_applications a');
			$this->db->join('loan_types b', 'b.id = a.loan_applied');
			$this->db->join('members c', 'c.id = a.member_id', 'left');
			$this->db->where('status', 'Pending');
			$this->db->order_by('a.take_home_pay', 'ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function getApprovedLoans() {
			$input = $this->input->get('query');
			if($input != '') {
				$this->db->like('name', $input);
			}
			$this->db->select('*')->from('approved_loan_apps a');
			$this->db->join('loan_applications b', 'b.loanapp_id = a.loanapp_id');
			$this->db->join('members c', 'c.id = b.member_id');
			$this->db->join('loan_types d', 'd.id = b.loan_applied', 'left');
			$this->db->order_by('a.date_approved', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		public function getDisapprovedLoans(){
			$input = $this->input->get('query');
			if($input != '') {
				$this->db->like('loan_applications.name', $input);
			}
			$this->db->select('*')->from('loan_applications a');
			$this->db->join('loan_types b', 'b.id = a.loan_applied');
			$this->db->join('members c', 'c.id = a.member_id', 'left');
			$this->db->where('status', 'Cancelled');
			$this->db->order_by('a.date_created', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		public function getLoanAppDetails() {
			$id = $this->input->get('id');
			$this->db->select('*')->from('loan_applications a');
			$this->db->join('members b', 'b.id = a.member_id');
			$this->db->join('loan_types c', 'c.id = a.loan_applied', 'left');
			$this->db->where('loanapp_id', $id);
			$query = $this->db->get();
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}

		public function addLoan() {
			date_default_timezone_set('Asia/Manila');

			$loan_data = array(
				'loan_name' => $this->input->post('loan_name'),
				'loan_max_amt' => $this->input->post('loan_max_amt'),
				'loan_max_term' => $this->input->post('loan_max_term'),
				'loan_interest' => $this->input->post('loan_interest'),
				'loan_status' => 'active',
				'date_created' => date('Y-m-d H:i:s')
			);
			// Insert loan to db
			$this->db->insert('loan_types', $loan_data);
			if($this->db->affected_rows() > 0) {
				return true;
			} else { 
				return false;
			}
		}

		public function editLoan() {
			$id = $this->input->get('id');
			$this->db->where('id', $id);
			$query = $this->db->get('loan_types');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return false;
			}
		}

		public function updateLoan() {
			date_default_timezone_set('Asia/Manila'); 
			$id = $this->input->post('loan_id');

			$loan_update_data = array(
				'loan_name' => $this->input->post('loan_name'),
				'loan_max_amt' => $this->input->post('filteredAmt'),
				'loan_max_term' => $this->input->post('loan_max_term'),
				'loan_interest' => $this->input->post('loan_interest'),
				'date_updated' => date('Y-m-d H:i:s')
			);

			$this->db->where('id', $id);
			$this->db->update('loan_types', $loan_update_data);
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function showLoansArchive() {
			$this->db->where('loan_status', 'archived');
			$query = $this->db->get('loan_types');
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function archiveLoan() {
			$id = $this->input->get('id');
			$this->db->set('loan_status', 'archived');
			$this->db->where('id', $id);
			$this->db->update('loan_types');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function unarchiveLoan() {
			$id = $this->input->get('id');
			$this->db->set('loan_status', 'active');
			$this->db->where('id', $id);
			$this->db->update('loan_types');
			if($this->db->affected_rows() > 0) {
				$this->db->where('id', $id);
				$query = $this->db->get('loan_types');
				return $query->row();
			} else {
				return false;
			}
		}

		public function deleteLoan() {
			$id = $this->input->get('id');
			$this->db->where('id', $id);
			$this->db->delete('loan_types');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function checkCreditCommiteeApprovals() {
			$id = $this->input->get('id');
			$this->db->where('loanapp_id', $id);
			$query = $this->db->get('loan_applications');
			return $query->row();
		}

		public function manageLoanApps() {
			$id = $this->input->get('id');
			$cc = $this->input->get('cc');
			$check = $this->input->get('check');
			$thp = $this->input->get('thp');
			if($check <= 3) {
				if($check == 0) {
					$this->db->set('take_home_pay', $thp);
					$this->db->set('thp_verified_by', $cc);
					$this->db->where('loanapp_id', $id);
					$this->db->update('loan_applications');
					$check = $check + 1;
				} if($check > 0) {
					$this->db->set("cc_approval_".$check, $cc);
					$this->db->where('loanapp_id', $id);
					$this->db->update('loan_applications');
					if($this->db->affected_rows() > 0) {
						if($check == 3) {
							date_default_timezone_set('Asia/Manila');

							$this->db->set('status', 'Approved');
							$this->db->where('loanapp_id', $id);
							$this->db->update('loan_applications');
							$approved = array(
								'loanapp_id' => $id,
								'date_approved' => date('Y-m-d H:i:s')
							);
							$this->db->insert('approved_loan_apps', $approved);
							if($this->db->affected_rows() > 0) {
								return false;
							}
						} else {
							return true;
						}
					}
				}
			}
		}

		public function insertChequeNo(){
			date_default_timezone_set('Asia/Manila');

			$id = $this->input->get('id');
			$cheque_no = $this->input->get('cheque_no');
			$this->db->set('cheque_no', $cheque_no);
			$this->db->set('date_approved', date('Y-m-d H:i:s'));
			$this->db->where('loanapp_id', $id);
			$this->db->update('approved_loan_apps');
			if($this->db->affected_rows() > 0) {
				return true;
			} else { 
				return false;
			}
		}

		public function cancelLoanApp() {
			$id = $this->input->get('id');
			$this->db->set('status', 'Cancelled');
			$this->db->where('loanapp_id', $id);
			$this->db->update('loan_applications');
			if($this->db->affected_rows() > 0) {
				$this->db->where('loanapp_id', $id);
				$query = $this->db->get('loan_applications');
				return $query->row();
			} else {
				return false;
			}
		}

	}