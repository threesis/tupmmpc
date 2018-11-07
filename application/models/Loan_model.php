<?php
	class Loan_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_pending_loans() {
			// Get all rows with pending status
			$this->db->where('status', 'Pending');
			$this->db->order_by('created_date', 'DESC');
			$query = $this->db->get('loan_applications');
			return $query->result_array();
		}

		public function get_approved_loans() {
			// Get all rows with approved status
			$this->db->where('status', 'Approved');
			$this->db->order_by('created_date', 'DESC');
			$query = $this->db->get('loan_applications');
			return $query->result_array();
		}

		public function get_disapproved_loans() {
			// Get all rows with disapproved status
			$this->db->where('status', 'Disapproved');
			$this->db->order_by('created_date', 'DESC');
			$query = $this->db->get('loan_applications');
			return $query->result_array();
		}
	}