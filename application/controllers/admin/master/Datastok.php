<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datastok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            redirect(base_url(''));
        }
        $this->load->model('mod_data_stok');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Stok Barang',
            'judul'             => 'Data Stok Barang',
        );
        $this->libmk->admin('master/datastok/vIndexdatastok', $data);
    }

     public function listDataStok()
    {

        $lier = $this->mod_data_stok->get_data();

        $data = array();

        $no = $_POST['start'];

        $no1 = 1;

        foreach ($lier as $list) {

            $button = '<div class="btn-group">';

            $button .= '<button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">Aksi</button>';

            $button .= '<span class="sr-only">Klik</span>';

            $button .= '</button>';

            $button .= '<ul class="dropdown-menu" role="menu">';

            $button .= '<li><a  href="' . site_url('admin/master/datastok/editdatastok/' . md5($list->id_data_stok)) . '">Edit</a></li>';

            $button .= '<li><a onclick="return confirm(' . "'Apakah Anda Yakin?'" . ')" href="' . site_url('admin/master/datastok/hapusdatastok/' . md5($list->id_data_stok)) . '">Hapus</a></li>';

            $button .= '</ul>';

            $button .= '</div>';

            $row = array();

            $row[] = $no1++ . ".";
            $row[] = $list->artikel;
            $row[] = $list->ukuran;
            $row[] = $list->warna;
            $row[] = $list->sampel;
            $row[] = $list->stok;
            $row[] = $button;

            $data[] = $row;

        }

        $output = array(

            "draw"            => $_POST['draw'],

            "recordsTotal"    => $this->mod_data_stok->count_all(),

            "recordsFiltered" => $this->mod_data_stok->count_filtered(),

            "data"            => $data,

        );

        echo json_encode($output);

    }

    // public function ambil_kanKategori()
    // {
        
    // }

    public function editdatastok($id_data_stok = null)
    {
        if($this->input->post('simpan') == null ){
            
            $data = array(
                'title' => 'Edit Data Stok',
                'judul' => 'Edit Data Stok',
                'id_data_stok'  => $id_data_stok,
                'datastok'      => $this->mod_all->mengambil('pj_data_stok',array('md5(id_data_stok)'=>$id_data_stok))->row(),
            );

        $this->db->join('pj_kategori_barang pkb','pkb.id_kategori_barang = pb.id_kategori_barang');
        $this->db->join('pj_merk_barang pmb','pmb.id_merk_barang = pb.id_merk_barang');

        $data['databarang'] = $this->mod_all->mengambil('pj_barang pb');

        $this->libmk->admin('master/datastok/vEditdatastok', $data);


        }else{

            $data = array(
                'artikel'   => $this->input->post('artikel'),
                'ukuran'    => $this->input->post('ukuran'),
                'warna'     => $this->input->post('warna'),
                'sampel'    => $this->input->post('sampel'),
                'stok'      => $this->input->post('stok'),
            );

            if($this->input->post('id_barang') !== null){
                $data['id_barang']  = $this->input->post('id_barang');
            }

            $query = $this->mod_all->mengubah('pj_data_stok', array('md5(id_data_stok)'=>$id_data_stok) , $data);

            if ($query['status'] == 'berhasil') {
                $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data Stok..');
                redirect(base_url('admin/master/datastok'));
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah Data Stok..');
                redirect(base_url('admin/master/datastok'));
            }


        }
    }

    public function hapusdatastok($id_data_stok = null)
    {
        $query = $this->mod_all->menghapus('pj_data_stok',array('md5(id_data_stok)'=>$id_data_stok));

        if ($query['status'] == 'berhasil') {
            $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Stok..');
            redirect(base_url('admin/master/datastok'));
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data Stok..');
            redirect(base_url('admin/master/datastok'));
        }


    }

    public function cari_barang()
    {
        $cari = $this->input->get('q', true);
        $cari_na = array('pb.nama_barang'=> $cari);
         $this->db->join('pj_kategori_barang pkb','pkb.id_kategori_barang = pb.id_kategori_barang');
        $this->db->join('pj_merk_barang pmb','pmb.id_merk_barang = pb.id_merk_barang');

        $q    = $this->mod_all->mengambil('pj_barang pb', array('pb.dihapus'=>'tidak') ,50 ,$cari_na);
        $json = array();
        foreach ($q->result() as $data) {
            $json[] = array('id' => $data->id_barang, 'text' => $data->kode_barang . ' - '. $data->nama_barang . ' - '.$data->kategori.' - '.$data->merk);
        }
        echo json_encode($json);
    }


    public function tambahstok()
    {

         if($this->input->post('simpan') == null ){
            
            $data = array(
                'title' => 'Tambah Data Stok',
                'judul' => 'Tambah Data Stok',
            );

        $this->libmk->admin('master/datastok/vtambahdatastok', $data);


        }else{

        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'artikel'   => $this->input->post('artikel'),
            'ukuran'    => $this->input->post('ukuran'),
            'warna'     => $this->input->post('warna'),
            'sampel'    => $this->input->post('sampel'),
            'stok'      => $this->input->post('stok')
        );

        $cek_barang = $this->mod_all->mengambil('pj_data_stok', array('artikel'=>$this->input->post('artikel')) );

        if($cek_barang->num_rows() > 0){
            $this->session->set_flashdata('gagal', 'Gagal Nama Artikel Sudah Ada...');
            redirect(base_url('admin/master/datastok'));
        }else{

            $query = $this->mod_all->menambah('pj_data_stok', $data);

            if ($query['status'] == 'berhasil') {
                $this->session->set_flashdata('berhasil', 'Berhasil Menambah Data Stok..');
                redirect(base_url('admin/master/datastok'));
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambah Data Stok..');
                redirect(base_url('admin/master/datastok'));
            }

        }

      }   

    }

}