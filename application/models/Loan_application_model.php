<?php

 class Loan_application_model extends CI_Model
 {
 	
 	public function __construct()
 	{
 		$this->load->database();
 	}

 	public function check() 
 	{	
 		$user_name = $this->input->get('user_name');

 		$this->db->where('name', $user_name);
	 	$query = $this->db->get('loan_applications');

 		if ($query->num_rows == 0) {
 			$result = '0';
 			return $result;
 		} else {
 			$result = '1';
 			return $result;
 		}
 	}

 	public function new_user_applicant()
 	{
 		$loan_type = "Regular Loan";

 		$this->db->order_by('date_created', 'DESC');
 		$this->db->where('loan_name', $loan_type);
 		$data = $this->db->get('loan_types');

 		if ($data->num_rows() >= 1) {
 			return $data->first_row();
 		} else {
 			return false;
 		}
 	}

 	public function old_user_applicant() 
 	{
 		$this->db->order_by('date_created', 'DESC');
 		$query = $this->db->get('loan_types');

 		if ($query->num_rows() > 0 ){
 			return $query->result();
 		} else {
 			return false;
 		}

 	}

 	public function getLoanTerms() 
 	{
 		$loan_name = $this->input->get('loan_name');

 		$this->db->order_by('date_created', 'DESC');
 		$this->db->where('loan_name', $loan_name);
 		$data = $this->db->get('loan_types');

 		if ($data->num_rows() >= 1) {
 			return $data->first_row();
 		} else {
 			return false;
 		}	
 	}

 	public function searchMember() 
 	{
 		$key_typed = $this->input->post('key_typed');
 		
 		if($key_typed != '') {
 			$this->db->like('name', $key_typed);
 		}

 		$this->db->order_by('name', 'ASC');
 		$result = $this->db->get('members');

 		return $result->result();
 	}


// newly added
 	public function loanApply() 
 	{
 		// change table columns loan_id to int for testing
 		//needs to update for loan_id and attachments  
 		$loanapp_data = array(
 			'user_id' => $this->input->post('id'),
 			'name' => $this->input->post('name'),
 			'loan_type' => $this->input->get('loan_type'),
 			'loan_term' => $this->input->post('loanapp-term'),
 			'loan_amount' => $this->input->post('loan-amount'),
 			'user_attachment' => $this->input->post('user-attachment'),
 			'status' => 'Pending',
 			'comaker_1' => $this->input->post('co-maker1'),
 			'comaker_2' => $this->input->post('co-maker2'),
 			'comaker_3' => $this->input->post('co-maker3'),
 			'comaker_4' => $this->input->post('co-maker4')
 		);

 		$this->db->insert('loan_applications', $loanapp_data);
 		if($this->db->affected_rows() > 0 ) 
 		{
 			return true;
 		} else {
 			return false;
 		}
 	}
 }
