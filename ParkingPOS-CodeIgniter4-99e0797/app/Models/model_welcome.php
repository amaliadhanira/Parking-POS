<?php

namespace App\Models;
use CodeIgniter\Model;

class model_welcome extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function authentification($email, $password){
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$count = $this->db->from('account')->count_all_results();
		if ($count > 0){
			return true;
		} else {
			return false;
		}
	}
}
?>