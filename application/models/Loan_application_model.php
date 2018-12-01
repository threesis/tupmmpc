<?php 
	class Loan_application_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function check() 
		{
			$username = $this->input->get('username');
			
			$this->db->where('username', $username);
			$query = $this->db->get('loan_applications');

			if ($query->num_rows() == 0 ) {
				return true;
			} else {
				return false;
			}
		}

		public function oldUser()
		{
			$this->db->order_by('date_updated', 'DESC');
			$query = $this->db->get('loan_types');

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}	
		} 

		public function newUser()
		{
			$this->db->order_by('date_updated', 'DESC limit 1');
			$this->db->where('loan_name', 'Regular Loan');
			$query = $this->db->get('loan_types');

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getLoanTerm()
		{
			$loan_name = $this->input->get('loan_name');
			$this->db->order_by('date_updated', 'DESC limit 1');
			$this->db->where('loan_name', $loan_name);
			$query = $this->db->get('loan_types');

			if ($query->num_rows() > 0 ) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getLoanAmount() 
		{
			$loan_name = $this->input->get('loan_name');
			$this->db->order_by('date_updated', 'DESC limit 1');
			$this->db->where('loan_name', $loan_name);
			$query = $this->db->get('loan_types');

			if ($query->num_rows() > 0 ) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function insertLoanApp()
		{
			$loanapp_data = array(
				'username' => $this->input->post('loanapp_username'),
				'name' => $this->input->post('loanapp_name'),
				'loan_type' => $this->input->post('loan_type'),
				'loan_term' => $this->input->post('loan_term'),
				'loan_amount' => $this->input->post('loan_amount'),
				'user_attachment' => $this->input->post('user_attachment'),
				'status' => 'Pending',
				'comaker_1' => $this->input->post('comaker_1'),
				'comaker_2' => $this->input->post('comaker_2'),
				'comaker_3' => $this->input->post('comaker_3'),
				'comaker_4' => $this->input->post('comaker_4')
			);

			$this->db->insert('loan_applications', $loanapp_data);
			if($this->db->affected_rows() > 0){
				return true;
			}else {
				return false;
			}
		}
	}