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

 		if ($data->num_rows() > 1) {
 			return $data->first_row();
 		} else if ( $data->num_rows() == 1 ){
 			return $data;
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

 	public function insert() 
 	{

 	}
 }
