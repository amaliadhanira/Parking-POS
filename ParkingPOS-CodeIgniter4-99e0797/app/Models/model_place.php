<?php

namespace App\Models;
use CodeIgniter\Model;

class model_place extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_all($page = 1){
		return $this->db->get('place')->result_array();
	}

	public function search_place(place){
		$this->db->like('place_type', $place_type);
		return $this->db->get('place')->ow_array();
	}

	public function insert_place($data_place){
		$data = array(
			'name_of_place' => $data_place['name_of_place'],
			'location' => $data_place['location'],
			'price' => $data_place['price'],
			'capacity' => $data_place['capacity']
		);

		$this->db->insert('vehicle', $data_vehicle);
	}

	public function delete_place($id_place){
		if(is_array($id_place)){
			$this->db->where_in('id_place', $id_place);
		} else {
			$this->db->where('id_place', $id_place);
		}
	}

	public function all_rows_count(){
		$query = $this->db->get('place');
		return $query->num_rows();
	}
}