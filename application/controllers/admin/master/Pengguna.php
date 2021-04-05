<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            redirect(base_url(''));
        }

    }

    public function index()
    {
        $data = array(
            'title' => 'Data Pengguna',
            'judul' => 'Data Pengguna',
            'user_type' => $this->mod_all->mengambil('user_type'),
        );
        $this->libmk->admin('master/datapengguna/vIndexpengguna', $data);
    }

    public function listData()
    {

        $lier = $this->mod_pengguna->get_data();

        $data = array();

        $no = $_POST['start'];

        $no1 = 1;

        foreach ($lier as $list) {

            $button = '<div class="btn-group">';

            $button .= '<button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">Aksi</button>';

            $button .= '<span class="sr-only">Klik</span>';

            $button .= '</button>';

            $button .= '<ul class="dropdown-menu" role="menu">';

            $button .= '<li><a onclick="return confirm(' . "'Apakah Anda Yakin?'" . ')" href="' . site_url('admin/master/pengguna/hapus/' . md5($list->user_id)) . '">Hapus</a></li>';

            $button .= '<li><a href="' . site_url('admin/master/pengguna/edit/' . md5($list->user_id)) . '">Edit</a></li>';

            $button .= '</ul>';

            $button .= '</div>';

            $row = array();

            $row[] = $no1++ . ".";

            $row[] = ucwords($list->namapengguna);

            $row[] = ucwords($list->email_address);

            $row[] = $this->jenisna($list->idjenispengguna);

            $row[] = $list->terakhirlogin;

            $row[] = $this->statusna($list->status);

            $row[] = $button;

            $data[] = $row;

        }

        $output = array(

            "draw"            => $_POST['draw'],

            "recordsTotal"    => $this->mod_pengguna->count_all(),

            "recordsFiltered" => $this->mod_pengguna->count_filtered(),

            "data"            => $data,

        );

        echo json_encode($output);

    }

    private function jenisna($value)
    {
        switch ($value) {
            case '1':
                return "<p>Admin</p>";
                break;
            case '2':
                return "<p>Pegawai</p>";
                break;
            default:
                return ".<p>-</p/";
                break;
        }
    }

    private function statusna($value)
    {
        switch ($value) {
            case '1':
                return "<p>Aktif</p>";
                break;
            case '2':
                return "<p>Suspend</p>";
                break;
            default:
                return ".<p>-</p/";
                break;
        }
    }

    public function tambah()
    {
        $data = array(
            'title'     => 'Tambah Data Pengguna',
            'judul'     => 'Tambah Data Pengguna',
            'user_type' => $this->mod_all->mengambil('user_type'),
        );
        $this->libmk->admin('master/datapengguna/vIndexTambahpengguna', $data);
    }

    public function simpan()
    {
        $data = array(
            'namapengguna'    => $this->input->post('namapengguna'),
            'email_address'   => $this->input->post('email_address'),
            'katasandi'       => md5($this->input->post('katasandi') ),
            'idjenispengguna' => $this->input->post('idjenispengguna'),
            'status'          => 1,
        );

        $query = $this->mod_all->menambah('pengguna', $data);

        if ($query['status'] == 'berhasil') {
            $this->session->set_flashdata('berhasil', 'Berhasil Manambah Data Pengguna..');
            redirect(base_url('admin/master/pengguna'));
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Manambah Data Pengguna..');
            redirect(base_url('admin/master/pengguna'));
        }

    }

    public function hapus($user_id)
    {
        $q = $this->mod_all->menghapus('pengguna', array('md5(user_id)' => $user_id));

        if ($q['status'] == 'berhasil') {
            $this->session->set_flashdata('berhasil', 'Berhasil Menghapus pengguna..');
            redirect(base_url('admin/master/pengguna'));
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus pengguna..');
            redirect(base_url('admin/master/pengguna'));
        }
    }

    public function edit($user_id = null)
    {
        if ($this->input->post('simpan') != null) {

            if ($this->input->post('katasandi') !== null) {
                $data['katasandi'] = md5($this->input->post('katasandi') ) ;
            }

            // if ($this->input->post('idjenispengguna') !== null) {
            //     $data['idjenispengguna'] = $this->input->post('idjenispengguna');
            // }

            $data = array(
                'namapengguna'    => $this->input->post('namapengguna'),
                'email_address'   => $this->input->post('email_address'),
                'idjenispengguna' => $this->input->post('idjenispengguna'),
                'status'          => 1,
            );

            $q = $this->mod_all->mengubah('pengguna', array('md5(user_id)' => $user_id), $data);

            if ($q['status'] == 'berhasil') {

                $this->session->set_flashdata('berhasil', 'Berhasil Mengubah pengguna..');
                redirect(base_url('admin/master/pengguna'));

            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah pengguna..');
                redirect(base_url('admin/master/pengguna'));
            }

        } else {

            $data = array(
                'title'     => 'Edit Data Pengguna',
                'pengguna'  => $this->mod_pengguna->getAlldatauser($user_id),
                'judul'     => 'Edit Data Pengguna',
                'user_id'   => $user_id,
                'user_type' => $this->mod_all->mengambil('user_type'),

            );
            $this->libmk->admin('master/datapengguna/vEditdatapengguna', $data);
        }

    }

}
