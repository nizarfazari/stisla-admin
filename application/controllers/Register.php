<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Auth');
	}

	public function registration_simpan()
	{

		$this->form_validation->set_rules('username', 'username', 'required|trim|min_length[5]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]');

		$this->form_validation->set_message('is_unique' , '{field} ini sudah di pakai,silahkan ganti');
		$this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">' , '</span>');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/templates/auth_header');
			$this->load->view('auth/register');
			$this->load->view('auth/templates/auth_footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = [
				'username' => $username,
				'password' => $password
			];

			$this->M_Auth->insert_register($data);
			if ($this->db->affected_rows()) {
				redirect('login/index');
			} else {
				redirect('registere/registration');
			}
		}
	}

	public function index()
	{
        $this->load->view('auth/templates/auth_header');
		$this->load->view('auth/register');
        $this->load->view('auth/templates/auth_footer');
	}



}
