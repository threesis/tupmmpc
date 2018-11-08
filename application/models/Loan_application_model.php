<?php

 class Loan_application_model extends CI_Model
 {
 	
 	public function __construct()
 	{
 		$this->load->database();
 	}

 	public function verify($id) 
 	{	

 		$this->db->order_by('id', 'DESC');
 		$this->db->where('id', $id);

 		

 	}

 	public function insert() 
 	{

 	}
 }
