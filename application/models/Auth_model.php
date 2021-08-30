<?php
/**
* 
*/
class Auth_model extends CI_Model
{
	public function login_verify($data)
	{
		$username = $data['username'];
	    $password = $this->encryptPassword($data['password']);

		$query = $this->db->get_where('admin', array('username' => $username));
		$user_data = $query->row();
		if (!empty($user_data)) {
			$res = array();
			if ($password == $user_data->password) {
				if ($user_data->is_active == 0) {
					$result['m_validateidentifier(conn, tf)d'] = false;
					$result['error'] = 'Your account is suspended! Please contact to Administrator!'; 
				}else{
					$result['valid'] = true;
					$result['user_id'] = $user_data->id;
					$result['username'] = $user_data->username;
					$result['user_role'] = $user_data->user_role;
				}	
			}else{
				$result['valid'] = false;
                $result['error'] = 'Invalid Password!';
			}

			return $result;
		}else{
			  $result['valid'] = false;
              $result['error'] = 'Username do not exist at the system!';

            return $result;
		}
	}

	public function encryptPassword($password)
	{
		return md5("$password");
	}

	public function get_std_fee_data($class_id,$sec_id)
	{
		# code...
	}
}

?>