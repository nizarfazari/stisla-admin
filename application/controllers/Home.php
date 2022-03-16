<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Select');
        $this->load->model('M_Jurusan');
        $this->load->model('M_Mahasiswa');
        $this->load->library('form_validation');
        if($this->session->userdata('status') != "login"){
            redirect(base_url('login'));
        }
    }


	public function index()
	{

        $getmhs1 = $this->M_Mahasiswa->mahasiswa()->result_array();
        $data['getmhs'] = $getmhs1;
        $this->load->view('home/templates/home_header');
        $this->load->view('home/templates/home_aside');
		$this->load->view('home/index',$data);
        $this->load->view('home/templates/home_footer');
	}

	public function tambah()
	{
        
        $getdata = $this->M_Select->getdataprov();
        $getjurusan = $this->M_Jurusan->jurusan();
        $data['dataprov'] = $getdata;
        $data['datajurusan'] = $getjurusan;
		$this->load->view('home/templates/home_header');
        $this->load->view('home/templates/home_aside');
		$this->load->view('home/create',$data);
		$this->load->view('home/templates/home_footer');
	}

    function getdatakabupaten()
    {
        $id_prov = $this->input->post('provinsi');
        $getdatakab = $this->M_Select->getdatakab($id_prov);
        
        echo json_encode($getdatakab);
    }

    function getdatakecamatan()
    {
        $id_kab = $this->input->post('kabupaten');
        $getdatakec = $this->M_Select->getdatakec($id_kab);
        
        echo json_encode($getdatakec);
    }

	public function tambah_simpan()
    {
        $this->form_validation->set_rules('namaMhs', 'Nama' , 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten' , 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan' , 'required');
        $this->form_validation->set_rules('nim', 'nim' , 'required|min_length[8]');
        $this->form_validation->set_rules('tglLahir', 'tanggal lahir' , 'required');
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000'; //maksimal ukuran
        $config['max_width'] = '1000'; //lebar maksimal
        $config['max_height'] = '1000'; //tinggi maksimal
        $this->load->library('upload',$config);

        $this->form_validation->set_message('required', '%s masih kosong,silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 8 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">' , '</span>');

        if($this->form_validation->run() == false)
        {
            $getdata = $this->M_Select->getdataprov();
            $getjurusan = $this->M_Jurusan->jurusan();
            $data['dataprov'] = $getdata;
            $data['datajurusan'] = $getjurusan;
            $this->load->view('home/templates/home_header');
            $this->load->view('home/templates/home_aside');
            $this->load->view('home/create',$data);
            $this->load->view('home/templates/home_footer');
        }else   
        {
            if(! $this->upload->do_upload('gambar')){
                ?>
                <link rel="stylesheet" href="<?= base_url('assets/sweet-allert/sweetalert2.min.css')  ?>">
                <body></body>
                <script src="<?= base_url('assets/sweet-allert/sweetalert2.min.js')  ?>"></script>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: 'Gagal mengupload gambar'
                  }).then((result) => {
                      window.location = '<?= base_url('home/tambah')?>';
                  })
                </script>
            <?php  
            }else{ 

            $gambar  = $this->upload->data();     
            $gambar = $gambar['file_name'];
            $nama_mhs= $this->input->post('namaMhs');
            $nim = $this->input->post('nim');
            $jurusan = $this->input->post('jurusan');
            $tglLahir = $this->input->post('tglLahir');
            $provinsi = $this->input->post('provinsi');
            $kabupaten = $this->input->post('kabupaten');
            $kecamatan = $this->input->post('kecamatan');
            $data = [
                'nama' => $nama_mhs,
                'id_provinsi' => $provinsi,
                'id_kabkot' => $kabupaten,
                'id_kecamatan' => $kecamatan,
                'tanggal_lahir' => $tglLahir,
                'nim' => $nim,
                'gambar' => $gambar,
                'jurusan' => $jurusan, 
            ];

                $this->M_Mahasiswa->insert_data($data);
                if($this->db->affected_rows()){
                    $this->session->set_flashdata('success', 'Data berhasil di simpan');
                    redirect('home');
                } else{
                    redirect('home/tambah');
                }
            }
        }
        
    }


    public function edit($id)
    {

        $getdata = $this->M_Select->getdataprov();
        $getjurusan = $this->M_Jurusan->jurusan();
        $data['dataprov'] = $getdata;
        $data['datajurusan'] = $getjurusan;
        $data['mhs'] = $this->M_Mahasiswa->get_data_by_id($id)->row_array();
        $this->load->view('home/templates/home_header');
        $this->load->view('home/templates/home_aside');
		$this->load->view('Home/edit',$data);
		$this->load->view('home/templates/home_footer');
    }

    public function edit_simpan()
    {
        $this->form_validation->set_rules('namaMhs', 'Nama' , 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten' , 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan' , 'required');
        $this->form_validation->set_rules('nim', 'nim' , 'required|min_length[8]');
        $this->form_validation->set_rules('tglLahir', 'tanggal lahir' , 'required');

        $id = $this->input->post('id');   
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000'; //maksimal ukuran
        $config['max_width'] = '1000'; //lebar maksimal
        $config['max_height'] = '1000'; //tinggi maksimal
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('gambar')){
            $nama_mhs= $this->input->post('namaMhs');
            $nim = $this->input->post('nim');
            $jurusan = $this->input->post('jurusan');
            $tglLahir = $this->input->post('tglLahir');
            $provinsi = $this->input->post('provinsi');
            $kabupaten = $this->input->post('kabupaten');
            $kecamatan = $this->input->post('kecamatan');
            $data = [
                'nama' => $nama_mhs,
                'id_provinsi' => $provinsi,
                'id_kabkot' => $kabupaten,
                'id_kecamatan' => $kecamatan,
                'tanggal_lahir' => $tglLahir,
                'nim' => $nim,
                'jurusan' => $jurusan, 
            ];
    
                $this->M_Mahasiswa->update_data($id,$data);
                if($this->db->affected_rows()){
                    $this->session->set_flashdata('success', 'Data berhasil di simpan');
                    redirect('home');
                } else{
                    redirect('home/edit');
                }

        }else{
 
        $gambar  = $this->upload->data();
        $gambar = $gambar['file_name'];
        $nama_mhs= $this->input->post('namaMhs');
        $nim = $this->input->post('nim');
        $jurusan = $this->input->post('jurusan');
        $tglLahir = $this->input->post('tglLahir');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $data = [
            'nama' => $nama_mhs,
            'id_provinsi' => $provinsi,
            'id_kabkot' => $kabupaten,
            'id_kecamatan' => $kecamatan,
            'tanggal_lahir' => $tglLahir,
            'nim' => $nim,
            'gambar' => $gambar,
            'jurusan' => $jurusan, 
        ];

            $this->M_Mahasiswa->update_data($id,$data);
            if($this->db->affected_rows()){
                redirect('home');
            } else{
                redirect('home/edit');
            }
        }
    }


    public function hapus($id)
    {
        $this->M_Mahasiswa->hapus_data($id);
        if($this->db->affected_rows()){
            redirect('home');
        }else{
            $this->session->set_flashdata('success', 'Data berhasil di hapus'); 
        }

    }

   

   public function info($id)
	{
        $data['mhs'] = $this->M_Mahasiswa->get_data_by_id($id)->row_array();
        $this->load->view('home/templates/home_header');
        $this->load->view('home/templates/home_aside');
		$this->load->view('home/info',$data);
        $this->load->view('home/templates/home_footer');
	}
   
    public function all_mhs()
	{
     
        $data['mhs'] = $this->M_Mahasiswa->mahasiswa()->result_array();
        $this->load->view('home/templates/home_header');
        $this->load->view('home/templates/home_aside');
		$this->load->view('home/all_mhs',$data);
        $this->load->view('home/templates/home_footer');
	}
}
