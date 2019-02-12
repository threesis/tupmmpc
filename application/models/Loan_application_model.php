<?php 
	class Loan_application_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
 		public function check() 
		{
			$member_id = $this->input->get('member_id');
			
			$this->db->select('*')->from('loan_applications a');
			$this->db->join('members b', 'b.id = a.member_id', 'left');
			$this->db->where('a.member_id', $member_id);
 			$query = $this->db->get();
 			if ($query->num_rows() == 0) {
				return true;
			} else {
				return false;
			}
		}
 		public function oldUser_exsistingData() 
		{
			$data = $this->input->get('get_oldUser_loanData');
 			$this->db->select('loan_applied');
			$this->db->order_by('loan_applied', 'ASC');
			$this->db->where('member_id', $data);
			$query = $this->db->get('loan_applications');
 			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}			
		}
 		public function oldUser()
		{
			$data = $this->input->get('loan_applied_id');
			
			$this->db->where_not_in('id', $data);
			$this->db->order_by('date_updated', 'ASC');
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
			$this->db->where('id', '71');
 			$query = $this->db->get('loan_types');
 			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
 		public function getShareCapital() 
		{
			$userSC = $this->input->get('member_id');
 			$data = "Select total_share_capital from share_capital where user_id = '$userSC' order by user_id ASC limit 1";
			$query = $this->db->query($data);
 			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
 		public function generateLoanAppId()
		{
			$id = $this->input->get('loanapp_id');	
 			// "Select count(*) as num_of_rows from (Select * from loan_applications where loanapp_id like '$id%' order by date_created ASC) loan_applications"
 			// "Select * from loan_applications where loanapp_id like '$id%' order by date_created ASC"
 			$loanapp_id = "Select count(*) as num_of_rows from (Select * from loan_applications where loanapp_id like '$id%' order by date_applied ASC) loan_applications";
			$query = $this->db->query($loanapp_id);
 			if($query->num_rows() >= 0) {
				return $query->result();
			}
		}
 		public function getLoanTerm()
		{
			$loan_id = $this->input->get('loan_id');
			$this->db->order_by('date_updated', 'DESC limit 1');
			$this->db->where('id', $loan_id);
 			$query = $this->db->get('loan_types');
 			if ($query->num_rows() > 0 ) {
				return $query->result();
			} else {
				return false;
			}
		}
 		public function getLoanAmount() 
		{
			$loan_id = $this->input->get('loan_id');
			$this->db->order_by('date_updated', 'DESC limit 1');
			$this->db->where('id', $loan_id);
 			$query = $this->db->get('loan_types');
 			if ($query->num_rows() > 0 ) {
				return $query->result();
			} else {
				return false;
			}
		}
 		public function insertLoanApp($post_image)
		{
			$loanapp_data = array(
				'loanapp_id' => $this->input->post('loanapp-id-no'),
				'member_id' => $this->input->post('loanapp-user-id'),
				'loan_applied' => $this->input->post('loan-selector-data'),
				'loan_term' => $this->input->post('loan-term'),
				'loan_amount' => $this->input->post('loan-amount'),
				'user_payslip' => $post_image,
				'status' => 'Pending',
				'remarks' => $this->input->post('loanapp-remarks'),
				'comaker_1' => $this->input->post('user_username1'),
				'comaker_2' => $this->input->post('user_username2'),
				'comaker_3' => $this->input->post('user_username3'),
				// 'comaker_4' => $this->input->post('co-maker4')
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
			// $comaker4 = $this->input->post('cmk4');
 			if($key_typed != '') {
				$this->db->like('name', $key_typed);
				$this->db->where('id !=', $user);
				$this->db->where('id !=', $comaker1);
				$this->db->where('id !=', $comaker2);
				$this->db->where('id !=', $comaker3);
				// $this->db->where('username !=', $comaker4);
			}
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('members');
 			return $query->result();			
		}
 		public function fetchAllMembers() {
			$this->db->select('id');
			$this->db->order_by('register_date', 'ASC');
			$query = $this->db->get('members');
 			if ($query->num_rows() > 0 ) {
				return $query->result();
			} else {
				return false;
			}
		}
 		// public function MemberLimit() {
		// 	$Allmembers = $this->input->get('memberlimit');
 		// 	$this->db->select('comaker_1, comaker_2, comaker_3');
		// 	$this->db->order_by('loanapp_id', 'ASC');
		// 	$this->db->where_in('comaker_1', $Allmembers);
		// 	$this->db->or_where_in('comaker_2', $Allmembers);
		// 	$this->db->or_where_in('comaker_3', $Allmembers);
			
		// 	$this->db->
		// }
 		public function coMakersApplication() 
		{
			$coMakerApply = $this->input->get('user_id');
 			$this->db->order_by('loan_applications.date_applied', 'DESC');
			$this->db->where('comaker_1', $coMakerApply );
			$this->db->or_where('comaker_2', $coMakerApply );
			$this->db->or_where('comaker_3', $coMakerApply );
			$query = $this->db->from('loan_applications')->join('members', 'members.id=loan_applications.member_id')->join('loan_types', 'loan_types.id=loan_applications.loan_applied')->get();
 			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		}
		
		public function cmloanappData() 
		{
			$loanapp_data = $this->input->get('loanapp_data');
 			$this->db->where('loanapp_id', $loanapp_data);
			$query = $this->db->from('loan_applications')->join('members', 'members.id=loan_applications.member_id')->join('loan_types', 'loan_types.id=loan_applications.loan_applied')->get();
			
			return $query->result();
		}
 		public function findCmName() {
			$cmId = $this->input->get('cm');
 			$this->db->select('name, id');
			$this->db->where('id', $cmId);
			$query = $this->db->get('members');
 			return $query->result();
		}
 		public function getAllMembers() {
			$searchMember = $this->input->post('ULsearchMember');
 			if($searchMember != '') {
				$this->db->like('name', $searchMember);
			} 
			$this->db->order_by('id', 'ASC');
			$query = $this->db->get('members');
 			if ($query->num_rows() > 0 ) {
				return $query->result();
			} else {
				return false;
			}
		}
 		public function cmUpdateAttachment($user_image) {
			$id = $this->input->post('cm_id');
			$lid = $this->input->post('loan_App_id');
 			$this->db->where('loanapp_id', $lid);
 			if($this->db->where('comaker_1', $id)) {
				$this->db->set('cm_payslip_1', $user_image);
			} 
			else if($this->db->where('comaker_2', $id)) {
				$this->db->set('cm_payslip_2', $user_image);
			}
			else {
				$this->db->set('cm_payslip_3', $user_image);
			} 
 			$this->db->update('loan_applications'); 
 			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
 		// public function ledgerData() {
		// 	$ledgerMemberData = $this->input->get('sc_member_id');
 		// 	$this->db->order_by('ledgerData', 'DESC');
		// 	$this->db->where('ledger_member_id', $ledgerMemberData);
		// 	$this->db->from('ledgers')->join('members', 'members.id=ledgers.ledger_member_id')->join('share_capital', 'share_capital.user_id=ledgers.ledger_member_id')->join('loan_types', 'loan_types.id=ledgers.loan_id')->join('loan_applications', 'Loan_applications.loanapp_id=ledgers.ledger_loanapp_id ')->get();
 		// 	return $query->result();
		// }
	}