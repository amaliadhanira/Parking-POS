<?php
namespace App\Controllers;

class controller_welcome extends Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('model_welcome');
		$this->load->model('model_account');
	}

	public function index(){
		$data['title'] = 'Parking-POS';
		$this->load->view('view_welcome', $data);
	}

	public function authentification(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($this->model_welcome->authentification($email, $password)){
			$session_data = array(
				'email' => $email);
		} else {
			$data['error_msg'] = $this->session->set_flashdata('error_msg', 'E-Mail atau kata sandi salah');
		}
	}

	public function signup(){
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|alpha_numeric_space');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email|is_unique[account.email]');
		$this->form_validation->set_rules('password', 'Kata sandi', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Ulangi kata sandi', 'trim|required|matches[password]');

		$input = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post->post('email'),
			'password' => md5($this->input->post('password'))
		);

		if ($this->form_validation->run() == FALSE){
			$this->index();
		} else {
			$cek = $this->model_account->signup($input);
			if ($cek) $data('info_msg'] = $this->session->set_flashdata('Berhasil daftar, silakan masuk');
			$this->index();
		}
	}

	public function logout(){
		$this->session->session_destroy();
		redirect(base_url());
	}

}

?>