<?php

namespace App\Models;
use CodeIgniter\Model;

class model_account extends Model{
	var $column_order = array(null, 'nama_lengkap', 'email');
	var $column_search = array('nama_lengkap');
	var $table = 'account';

	public function __construct(){
		parent::__construct();
	}

	public function get_detail_account(){
		$this->sb->select('*');
		$this->db->from('account');
	}

	public function get_all(){
		$this->get_detail_account();
		return $this->db->get()->result_array();
	}

	public function get_by_id($id_account){
		$this->db->where('id_account', $id_account);
		return $this->db->get('account')->row_array();
	}

	private function _get_datatables_query(){
		$post_ssearch = $this->input->post('search');
		$post_order = $this->input->post('order');

		$this->get_detail_account();

		$i = 0;

		foreach($this->column_search as $item){
			if($post_search['value']){
				if($i===0){
					$this->db->group_start();
					$this->db->like($item, $post_search['value']);
				} else {
					$this->db->or_like($item, $post_search['value']);
				}
				if(count($this->column_search)-1 == $i){
					$this->db->group_end();
				}
			}
			$i++;
		}
		if($post_order){
			$this->db->order_by($this->column_order[$post_order['0']['column']], $post_order['0']['dir']);
		} else if (isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function count_filtered(){
		$this->_get_datatables_query();
		return $this->db->get()->num_rows();
	}

	public function count_all(){
		$this->db->get_detail_account();
		return $this->db->get()->count_all_results();
	}

	public function get_by_email($email){
		$this->db->where('email', $email);
		return $this->db->get('account')->row_array();
	}

	public function match_password($id_account, $password){
		$this->db->where('id_account', $id_account);
		$this->db->where('password', md5($password));
		$count = $this->db->from('account')->count_all_results();
		if ($count > 0){
			return true;
		} else {
			return false;
		}
	}

	public function signup($data){
		return $this->db->insert('account', $data);
	}

	public function update_account($id_account, $data){
		$this->db->where('id_account', $id_account);
		return $this->db->update('account', $data);
	}
}
?>