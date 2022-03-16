<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Auth');
		$this->load->library('form_validation');
	}
	public function index()
	{
        $this->load->view('auth/templates/auth_header');
		$this->load->view('auth/login');
        $this->load->view('auth/templates/auth_footer');
	}
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]');

		$this->form_validation->set_message('is_unique' , '{field} ini sudah di pakai,silahkan ganti');
		$this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">' , '</span>');
		
		if ($this->form_validation->run() == false) 
		{
			$this->load->view('auth/templates/auth_header');
			$this->load->view('auth/login');
			$this->load->view('auth/templates/auth_footer');
		}else 
		{
			$username = $this->input->post('username');
        	$password = $this->input->post('password');
			$cek = $this->M_Auth->login($username,$password)->num_rows();
			
			if($cek > 0){
				$data_session = [
					'nama' => $username,
					'status' => "login"
				];
				$this->session->set_userdata($data_session);
				?>
                <link rel="stylesheet" href="<?= base_url('assets/sweet-allert/sweetalert2.min.css')  ?>">
                  <script src="<?= base_url('assets/sweet-allert/sweetalert2.min.js')  ?>"></script>
                  <body></body>
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Anda berhasil Login'
                  }).then((result) => {
                      window.location = '<?= base_url('home')?>'
                  })
                </script>
            <?php 
			}else {
				?>
				<link rel="stylesheet" href="<?= base_url('assets/sweet-allert/sweetalert2.min.css')  ?>">
                  <script src="<?= base_url('assets/sweet-allert/sweetalert2.min.js')  ?>"></script>
                  <body></body>
				<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Failure',
                    text: 'Login gagal username / password salah'
                  }).then((result) => {
                      window.location = '<?= base_url('login')?>';
                  })
                </script>
				<?php
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
