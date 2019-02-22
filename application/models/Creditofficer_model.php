<?php
	class Creditofficer_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function getPendingLoans() {
			$this->db->where('status', 'Pending');
			$this->db->order_by('created_date', 'DESC');
			$query = $this->db->get('loan_applications');

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getApprovedLoans() {
			$this->db->where('status', 'Approved');
			$this->db->order_by('created_date', 'DESC');
			$query = $this->db->get('loan_applications');

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function getDisapprovedLoans(){
			$this->db->where('status', 'Disapproved'); 
			$this->db->order_by('created_date', 'DESC');
			$query = $this->db->get('loan_applications');

			if($query->num_rows() > 0) {
				return $query->result();
			} else { 
				return false;
			}
		}
		
	}