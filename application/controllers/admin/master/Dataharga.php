<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataharga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            redirect(base_url(''));
        }
        $this->load->model('mod_data_harga_barang');
        $this->load->model('mod_trx');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Daftar Harga Barang',
            'judul'             => 'Daftar Harga Barang',
            'list_data_barang'  => $this->mod_all->mengambil('pj_barang')->result(),
        );
        $this->libmk->admin('master/dataharga/vIndexdataharga', $data);
    }

    public function listData()
    {

        $lier = $this->mod_data_harga_barang->get_data();

        $data = array();

        $no = $_POST['start'];

        $no1 = 1;

        foreach ($lier as $list) {

            $button = '<div class="btn-group">';

            $button .= '<button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">Aksi</button>';

            $button .= '<span class="sr-only">Klik</span>';

            $button .= '</button>';

            $button .= '<ul class="dropdown-menu" role="menu">';

            $button .= '<li><a  href="' . site_url('admin/master/dataharga/edithargabarang/' . md5($list->id_detail_daftar_harga)) . '">Edit</a></li>';

            $button .= '<li><a onclick="return confirm(' . "'Apakah Anda Yakin?'" . ')" href="' . site_url('admin/master/dataharga/hapus/' . md5($list->id_detail_daftar_harga)) . '">Hapus</a></li>';

            $button .= '</ul>';

            $button .= '</div>';

            $row = array();

            $row[] = $no1++ . ".";
            $row[] = $list->nama_barang.' - <span style="color:red;">'.$list->merk.'</span>';
            $row[] = $list->artikel;
            $row[] = $list->ukuran;
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->modal);
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->harga_sales);
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->harga_sp);
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->harga_umum);
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->harga_warung);
            $row[] = $button;

            $data[] = $row;

        }

        $output = array(

            "draw"            => $_POST['draw'],

            "recordsTotal"    => $this->mod_data_harga_barang->count_all(),

            "recordsFiltered" => $this->mod_data_harga_barang->count_filtered(),

            "data"            => $data,

        );

        echo json_encode($output);

    }

    public function hapus($id_data_stok = null)
    {
        $data   = array(
            'is_hapus'=> 'ya',
        );

        $query = $this->mod_all->mengubah('pj_data_stok', array('md5(id_data_stok)'=> $id_data_stok ) , $data );


        if ($query['status'] == 'berhasil') {
            $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Barang..');
            redirect(base_url('admin/master/dataharga'));
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data Barang..');
            redirect(base_url('admin/master/dataharga'));
        }
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

    public function cari_barang()
    {
        $cari = $this->input->get('q', true);
        $cari_na = array('pb.nama_barang'=> $cari);
        $this->db->join('pj_kategori_barang pkb','pkb.id_kategori_barang = pb.id_kategori_barang');
        $this->db->join('pj_merk_barang pmb','pmb.id_merk_barang = pb.id_merk_barang');

        $q    = $this->mod_all->mengambil('pj_barang pb', array('pb.dihapus'=>'tidak') ,50 ,$cari_na);
        $json = array();
        foreach ($q->result() as $data) {
            $json[] = array('id' => $data->id_barang, 'text' => $data->nama_barang.' - '.$data->kategori.' - '.$data->merk);
        }
        echo json_encode($json);
    }

     public function edithargabarang($id_detail_daftar_harga = null)
    {
        if($this->input->post('simpan') !== null ){

            $data = array(
            'id_barang'         => $this->input->post('id_barang'),
            'artikel'           => $this->input->post('artikel'),
            'ukuran'            => $this->input->post('ukuran'),
            'modal'             => $this->input->post('modal'),
            'harga_sp'          => $this->input->post('harga_sp'),
            'harga_sales'       => $this->input->post('harga_sales'),
            'harga_umum'        => $this->input->post('harga_umum'),
            'harga_warung'      => $this->input->post('harga_warung'),
            'harga_jual'        => $this->input->post('harga_jual'),
            'keterangan'        => $this->input->post('keterangan'),
        );
            

        $query_edit = $this->mod_all->mengubah('detail_daftar_harga', array('md5(id_detail_daftar_harga)'=> $id_detail_daftar_harga), $data);

        $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data Harga..');
        redirect(base_url('admin/master/dataharga'));

        }else{

        $data = array(
            'title'               => 'Edit Data Harga Barang',
            'judul'               => 'Edit Data Harga Barang',
            'data_harga'         => $this->mod_all->mengambil('detail_daftar_harga',array('md5(id_detail_daftar_harga)'=>$id_detail_daftar_harga))->row(),
            'id_detail_daftar_harga'    => $id_detail_daftar_harga,
        );

        $this->db->join('pj_kategori_barang pkb','pkb.id_kategori_barang = pb.id_kategori_barang');
        $this->db->join('pj_merk_barang pmb','pmb.id_merk_barang = pb.id_merk_barang');

        $data['harga'] = $this->mod_all->mengambil('pj_barang pb');

        $this->libmk->admin('master/dataharga/veditdatahargabarang', $data);

        }

    }

    function ambil_detail_barang()
    {
        $id_barang       = $this->input->get('id_barang');
        $this->db->select('pb.nama_barang ,pjs.* ');
        $this->db->join('pj_barang pb','pb.id_barang = pjs.id_barang');
        $q1 = $this->mod_all->mengambil('pj_data_stok pjs', array('pjs.id_barang'=>$id_barang) );

        $json1 = array();
        if ($q1->num_rows() == true) {
            $status = 'ada';
            foreach ($q1->result() as $k) {
                $r              = array();
                $r['id_barang'] = $k->id_barang;
                $r['artikel']   = $k->artikel;
                $r['ukuran']    = $k->ukuran;
                $r['warna']     = $k->warna;
                $r['sampel']    = $k->sampel;
                $r['stok']      = $k->stok;

                $json1[]        = $r;
            }
        } else {
            $status = 'tidak_ada';
        }

        echo json_encode(array(
            'status'    => $status,
            'data'      => $json1,
            'nama_barang' => $q1->row()->nama_barang,
            'id_barang'   => $q1->row()->id_barang,
        ));
    }

    public function tambahhargabarang()
    {
        if($this->input->post('simpan') == null ){
            
            $data = array(
                'title'             => 'Tambah Data Harga Barang',
                'judul'             => 'Tambah Data Harga Barang',
            );

        $this->libmk->admin('master/dataharga/vtambahdatahargabarang', $data);

        }else{

            $data = array(
                'id_barang'     => $this->input->post('id_barang'),
                'artikel'       => $this->input->post('artikel'),
                'ukuran'        => $this->input->post('ukuran'),
                'modal'         => $this->input->post('modal'),
                'harga_sp'      => $this->input->post('harga_sp'),
                'harga_sales'   => $this->input->post('harga_sales'),
                'harga_umum'    => $this->input->post('harga_umum'),
                'harga_warung'  => $this->input->post('harga_warung'),
                'harga_jual'    => $this->input->post('harga_jual'),
                'keterangan'    => $this->input->post('keterangan'),
            );

            $query = $this->mod_all->menambah('detail_daftar_harga', $data);

            $this->session->set_flashdata($query['status'], ucwords($query['status']).' Manambah Data Harga Barang..');
            redirect(base_url('admin/master/dataharga'));


        }
    }

}
