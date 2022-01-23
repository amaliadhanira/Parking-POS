<?php

namespace App\Models;
use CodeIgniter\Model;

class model_vehicle extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_all($page = 1){
		return $this->db->get('vehicle')->result_array();
	}

	public function search_type(vehicle_type){
		$this->db->like('vehicle_type', $vehicle_type);
		return $this->db->get('vehicle')->ow_array();
	}

	public function search_brand(brand){
		$this->db->like('brand', $brand);
		return $this->db->get('vehicle')->ow_array();
	}

	public function search_model(model){
		$this->db->like('model', $model);
		return $this->db->get('vehicle')->ow_array();
	}

	public function search_plate_number(plate_number){
		$this->db->like('plate_number', $plate_number);
		return $this->db->get('vehicle')->ow_array();
	}

	public function insert_vehicle($data_vehicle){
		$data = array(
			'vehicle_type' => $data_vehicle['vehicle_type'],
			'brand' => $data_vehicle['brand'],
			'model' => $data_vehicle['model'],
			'plate_number' => $data_vehicle['plate_number']
		);

		$this->db->insert('vehicle', $data_vehicle);
	}

	public function delete_vehicle($id_vehicle){
		if(is_array($id_vehicle)){
			$this->db->where_in('id_vehicle', $id_vehicle);
		} else {
			$this->db->where('id_vehicle', $id_vehicle);
		}
	}

	public function all_rows_count(){
		$query = $this->db->get('vehicle');
		return $query->num_rows();
	}
}