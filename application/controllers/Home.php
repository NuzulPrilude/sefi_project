<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if (($this->session->admin)) {
			redirect(base_url('admin/dashboard'));
		}elseif (($this->session->kasir)) {
			redirect(base_url('kasir/dashboard'));
		}
	}
	
	public function index()
	{
		$data = array(
			'title' => 'Masuk ke Aplikasi Data Barang'
		);
		
		$this->libmk->page('login',$data);
	}


	public function ceklog()
	{
		$username = $this->input->post('username');
		$katasandi = md5($this->input->post('katasandi'));
		$q = $this->mod_user->masukLog($username, $katasandi);
		if ($q->num_rows() == false) {
			$q3 = $this->mod_user->masukLog($username);
			if ($q3->num_rows() == true) {
				$this->session->set_flashdata('gagal', 'Password Salah..');
				redirect(site_url());
			}else{
				$this->session->set_flashdata('gagal', 'Pengguna tidak ditemukan..');
				redirect(site_url());
			}
		}else{
			$q2 = $q->row();
			$this->pengguna($q2);
		}
	}


	private function pengguna($data)
	{
		switch ($data->id_akses) {
			case '1':
			$this->session->set_flashdata('berhasil', "Assalamu'alaikum , Selamat Datang Di Sistem Data Stok");
				$this->session->set_userdata('admin', $data);
					redirect(site_url('admin/dashboard'));
			break;
			case '2':
			$this->session->set_flashdata('berhasil', "Assalamu'alaikum ".@$this->session->nama." Selamat Datang di Aplikasi kasir");
				$this->session->set_userdata('kasir', $data);
					redirect(site_url('kasir/dashboard'));
			break; 
		}
	}

}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */