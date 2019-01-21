<?php 
class Loginmodel extends CI_Model {

	public function login_valid ($username, $password) {
		$q = $this->db->where(['uname'=>$username, 'pword'=>$password])
				->get('users');
		/*"SELECT 'username=".$username."', 'password=".$password."' FROM users; */
		if ($q->num_rows()) {
			//return TRUE;
			return $q->row()->id;
		} else {
			return FALSE;
		}
	
	}

}