<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Databarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            redirect(base_url(''));
        }
        $this->load->model('mod_data_barang');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Barang',
            'judul'             => 'Data Barang',
        );
        $this->libmk->admin('master/databarang/vIndexdatabarang', $data);
    }


      public function listData()
    {

        $lier = $this->mod_data_barang->get_data();

        $data = array();

        $no = $_POST['start'];

        $no1 = 1;

        foreach ($lier as $list) {

            $button = '<div class="btn-group">';

            $button .= '<button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">Aksi</button>';

            $button .= '<span class="sr-only">Klik</span>';

            $button .= '</button>';

            $button .= '<ul class="dropdown-menu" role="menu">';

            $button .= '<li><a  href="' . site_url('admin/master/databarang/editdatabarang/' . md5($list->id_barang)) . '">Edit</a></li>';

            $button .= '<li><a onclick="return confirm(' . "'Apakah Anda Yakin?'" . ')" href="' . site_url('admin/master/databarang/hapusdatabarang/' . md5($list->id_barang)) . '">Hapus</a></li>';

            $button .= '</ul>';

            $button .= '</div>';

            $row = array();

            $row[] = $no1++ . ".";
            $row[] = $list->kode_barang;
            $row[] = $list->nama_barang;
            $row[] = $button;

            $data[] = $row;

        }

        $output = array(

            "draw"            => $_POST['draw'],

            "recordsTotal"    => $this->mod_data_barang->count_all(),

            "recordsFiltered" => $this->mod_data_barang->count_filtered(),

            "data"            => $data,

        );

        echo json_encode($output);

    }

    public function hapusdatabarang($id_barang = null)
    {
        $query = $this->mod_all->menghapus('pj_barang',['md5(id_barang)'=>$id_barang]);

        $this->session->set_flashdata($query['status'], ucwords($query['status']).' Menghapus Barang..');
        redirect(base_url('admin/master/databarang'));
    }

    public function editdatabarang($id_barang = null)
    {
        if($this->input->post('simpan') == null ){
            
            $data = array(
                'title'             => 'Edit Data Barang',
                'judul'             => 'Edit Data Barang',
                'id_barang'         => $id_barang,
                'data_barang'       => $this->mod_all->mengambil('pj_barang',array('md5(id_barang)'=>$id_barang))->row(),
                'kategori'          => $this->mod_all->mengambil('pj_kategori_barang'),
                'merk'              => $this->mod_all->mengambil('pj_merk_barang'),
            );

        $this->libmk->admin('master/databarang/vEditdatabarang', $data);


        }else{

            $data = array(
                'kode_barang'   => $this->input->post('kode_barang'),
                'nama_barang'   => $this->input->post('nama_barang'),
                'keterangan'    => $this->input->post('keterangan'),
            );

            if($this->input->post('kode_barang') != ''){
                $data['kode_barang'] = $this->input->post('kode_barang');
            }

            if($this->input->post('id_kategori_barang') != ''){
                $data['id_kategori_barang'] = $this->input->post('id_kategori_barang');
            }

            if($this->input->post('id_merk_barang') != ''){
                $data['id_merk_barang'] = $this->input->post('id_merk_barang');
            }

            $query = $this->mod_all->mengubah('pj_barang', array('md5(id_barang)'=>$id_barang) , $data);

            if ($query['status'] == 'berhasil') {
                $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data barang..');
                redirect(base_url('admin/master/databarang'));
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah Data barang..');
                redirect(base_url('admin/master/databarang'));
            }


        }
    }


    public function cari_kategori()
    {
        $cari = $this->input->get('q', true);
        $cari_na = array('kategori'=> $cari);
        $q    = $this->mod_all->mengambil('pj_kategori_barang', array('dihapus'=>'tidak') ,50 ,$cari_na);
        $json = array();
        foreach ($q->result() as $data) {
            $json[] = array('id' => $data->id_kategori_barang, 'text' => $data->kategori);
        }
        echo json_encode($json);
    }

    public function cari_merk()
    {
        $cari = $this->input->get('q', true);
        $cari_na = array('merk'=> $cari);
        $q    = $this->mod_all->mengambil('pj_merk_barang', array('dihapus'=>'tidak') ,50 ,$cari_na);
        $json = array();
        foreach ($q->result() as $data) {
            $json[] = array('id' => $data->id_merk_barang, 'text' => $data->merk);
        }
        echo json_encode($json);
    }


    public function tambah_barang()
    {

         if($this->input->post('simpan') == null ){
            
            $data = array(
                'title'             => 'Tambah Data Barang',
                'judul'             => 'Tambah Data Barang',
                'kategori'          => $this->mod_all->mengambil('pj_kategori_barang'),
                'merk'              => $this->mod_all->mengambil('pj_merk_barang'),
            );

        $this->libmk->admin('master/databarang/vtambahdatabarang', $data);


        }else{

            $data = array(
                'kode_barang'           => $this->input->post('kode_barang'),
                'nama_barang'           => $this->input->post('nama_barang'),
                'id_kategori_barang'    => $this->input->post('id_kategori_barang'),
                'id_merk_barang'        => $this->input->post('id_merk_barang'),
                'keterangan'            => $this->input->post('keterangan'),
                'dihapus'               => 'tidak',
            );

            $query = $this->mod_all->menambah('pj_barang', $data);

            $this->session->set_flashdata(ucwords($query['status']), ucwords($query['status']).' Manambah Data Barang..');
            redirect(base_url('admin/master/databarang'));


        }

    }

}