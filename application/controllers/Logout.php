<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		if ($this->session->admin) {
			// $idpengguna = $this->session->admin->idpengguna;
		}
		// $this->mod_user->ubah(md5($idpengguna),$data = array('terakhirlogin'	=>	date('Y-m-d H:i:s')));
		$this->session->sess_destroy();
		redirect(site_url());
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */
