<?php
	class User_model extends CI_Model {
		public function register($enc_password) {
			// User data array
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $enc_password,
				'name' => $this->input->post('name'),
				'birthday' => $this->input->post('birthday'),
				'address' => $this->input->post('address'),
				'zipcode' => $this->input->post('zipcode'),
				'college' => $this->input->post('college')
			);

			// Insert user to db
			return $this->db->insert('members', $data);
		}

		public function signin($username, $password) {
			// Validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$result = $this->db->from('members')->join('roles', 'roles.role_id = members.position')->get();

			if(count($result) == 1) {
				return $result->result_array();
			} else {
				return false;
			}
		}
	}