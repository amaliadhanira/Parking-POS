<?php
namespace App\Controllers;

class controller_checkin extends Controller{
	public function __construct(){
		parent::__construct('controller_checkin');
		$this->load->model('model_vehicle');
		$this->load->model('model_place');
		$this->load->helper('string');
		$this->load->helper('form');
	}

	public function 
}