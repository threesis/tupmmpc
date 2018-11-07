<?php

 class Loan_application_model extends CI_Model
 {
 	
 	public function __construct()
 	{
 		$this->load->database();
 	}

 	public function verify() 
 	{
 		$this->input->post('');
 		$this->db->order_by('name', 'DESC');
 	}

 	public function insert() 
 	{

 	}
 }
