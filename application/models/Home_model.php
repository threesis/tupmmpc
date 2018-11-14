<?php
	class Home_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function get_all_loan_types() {
			// Get all loans in the table descending by date
			$this->db->order_by('date_created', 'DESC');
			$query = $this->db->get('loan_types');
			if($query->num_rows() > 0) {
				// If there are data detected in the db, return the rows to the controller
				return $query->result();
			} else {
				return false;
			}
		}

		public function get_all_web_infos() {
			$query = $this->db->get('website_info');
			if($query->num_rows() > 0) {
				return $query->result();
			} else { 
				return false;
			}
		}

	}