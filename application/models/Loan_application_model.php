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
			
			$this->db->select('*')->from('loan_applications a');
			$this->db->join('members b', 'b.id = a.member_id', 'left');
			$this->db->where('b.username', $username);
			$query = $this->db->get();

			if ($query->num_rows() == 0) {
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
				'username' => $this->input->post('loanapp-username'),
				'name' => $this->input->post('loanapp-name'),
				'loan_type' => $this->input->post('loan-type'),
				'loan_term' => $this->input->post('loan-term'),
				'loan_amount' => $this->input->post('loan-amount'),
				'status' => 'Pending',
				'comaker_1' => $this->input->post('co-maker1'),
				'comaker_2' => $this->input->post('co-maker2'),
				'comaker_3' => $this->input->post('co-maker3'),
				'comaker_4' => $this->input->post('co-maker4')
			);

			$this->db->insert('loan_applications', $loanapp_data);
			if($this->db->affected_rows() > 0){
				return true;
			}else {
				return false;
			}
		}

		public function searchCoMaker() 
		{
			$key_typed = $this->input->post('key_entered');
			$user = $this->input->post('user');
			$comaker1 = $this->input->post('cmk1');
			$comaker2 = $this->input->post('cmk2');
			$comaker3 = $this->input->post('cmk3');
			$comaker4 = $this->input->post('cmk4');

			if($key_typed != '') {
				$this->db->like('name', $key_typed);
				$this->db->where('username !=', $user);
				$this->db->where('username !=', $comaker1);
				$this->db->where('username !=', $comaker2);
				$this->db->where('username !=', $comaker3);
				$this->db->where('username !=', $comaker4);
			}
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('members');

			return $query->result();			
		}

		public function coMakersApplication() 
		{
			$coMakerApply = $this->input->get('username');

			$this->db->order_by('date_created', 'DESC');
			$this->db->where('comaker_1', $coMakerApply );
			$this->db->or_where('comaker_2', $coMakerApply );
			$this->db->or_where('comaker_3', $coMakerApply );
			$this->db->or_where('comaker_4', $coMakerApply );
			$query = $this->db->get('loan_applications');

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
	}