<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            $this->session->set_flashdata('gagal', 'Maaf anda harus login dahulu..');
            redirect(site_url());
        }
        $this->load->model('mod_user');
    }

    public function index()
    {
        $total_pengguna = $this->mod_all->menghitung('pj_user', array('status'=> 'Aktif') );
        $total_barang   = $this->mod_all->menghitung('pj_barang', array('dihapus'=> 'tidak') );
        $stok_hampir_habis   = $this->mod_all->menghitung('pj_data_stok', array('stok <= '=>10 ) );

        $data = array(
            'title'             => 'Aplkasi Data Stok Barang',
            'judul_content'     => 'Halaman Utama',
            'total_pengguna'    => $total_pengguna,
            'total_barang'      => $total_barang,
            'stok_hampir_habis' => $stok_hampir_habis,
        );
        $this->libmk->admin('dashboard', $data);

    }

    public function list_databaru()
    {
        $lier = $this->mod_trx->get_data();
        $data = array();
        $no   = $_POST['start'];
        $no1  = 0;
        foreach ($lier as $list) {
            $no++;
            $no1    = $no1 + 1;
            $button = '<div class="btn-group">';
            $button .= '<button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">';
            $button .= 'Aksi';
            $button .= '</button>';
            $button .= '<ul class="dropdown-menu" role="menu">';
            $button .= '<li><a href="' . site_url('admin/master/transaksi/edit/' . md5($list->no_pos_transaksi)) . '">Edit</a></li>';
            $button .= '<li class="divider"></li>';
            $button .= '<li><a href="' . site_url('admin/master/transaksi/detail/' . md5($list->no_pos_transaksi)) . '">Detail</a></li>';
            $button .= '<li class="divider"></li>';
            $button .= '<li><a onclick="return confirm(' . "'Apakah Anda Yakin?'" . ')" href="' . site_url('admin/master/transaksi/hapus/' . md5($list->no_pos_transaksi)) . '">Hapus</a></li>';
            $button .= '</ul>';
            $button .= '</div>';
            $row    = array();
            $row[]  = $no1;
            $row[]  = $list->no_pos_transaksi;
            $row[]  = $list->nama_pos_transaksi;
            $row[]  = $list->keterangan;
            $row[]  = $button;
            $data[] = $row;
        }
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->mod_trx->count_all(),
            "recordsFiltered" => $this->mod_trx->count_filtered(),
            "data"            => $data,
        );
        echo json_encode($output);
    }


    public function data_grafik_dashboard()
    {

        $q = $this->mod_user->data_grafik();
        $peng = $this->mod_user->data_grafik_2();
        // $total_kas_keluar = $this->mod_all->mencari_total('bukti_kas_keluar','total_bkk','total_bkk')->result();

        $data = array();
        foreach ($q->result() as $key) {
            $row['penerimaan']  = $key->total_bkm;
            // $row['pengeluaran'] = $key->total_bkm;
            $row['tahun']       = $key->tahun;
            $data[] = $row;
        }

        echo json_encode($data);
    }
    

    public function data_grafik_percobaan()
    {

        $q = $this->mod_user->data_grafik()->result_array();
        $peng = $this->mod_user->data_grafik_2()->result_array();
   

        $output = array(
            "penjualan"        => $this->mod_user->data_grafik()->result(),
            "pembelian"       => $this->mod_user->data_grafik_2()->result(),
        );  

        $hasilGabung = array_merge($q , $peng);
        
        echo json_encode($hasilGabung);
    }

    public function data_pencapaian_penerimaan()
    {
        $q = $this->mod_all->mengambil('jenis_akun');

        $data = array();
        foreach ($q->result() as $key) {
            $row['target']      = $key->total_bkm;
            $row['pencapaian']  = $key->tahun;
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function tes_data()
    {
        $q = $this->mod_user->data_progress();
        $persen = 0;
        $data = array();
        foreach ($q as $key) {

            $a = ($key->total_saldo_dpk / $key->target_pencapaian ) * 100; 
            $b = $a / $key->target_pencapaian;
            $rupiah = $b * $key->target_pencapaian;

            $row['id_akun']         = $key->id_akun;
            $row['nama_akun']       = $key->nama_akun;
            $row['pencapaian']      = $a;
            $row['tahun']           = $key->tahun;
            //$row['pencapaian']      = $key->total_saldo_dpk;
            //$row['pencapaian']   = $key->tahun;
            $data[] = $row;
        }

        if($q == true){
            $status = "ada";
        }else{
            $status = "tidak ada";

        }

        echo json_encode(array(
            'status' => $status,
            'data'   => $data,
        )) ;

        // echo json_encode($data);
    }

    function progress_pengeluaran()
    {
        $q = $this->mod_user->data_progress_pengeluaran();
        $persen = 0;
        $data = array();
        foreach ($q as $key) {

            $a = ($key->total_saldo_dp / @$key->batas_pengeluaran) * 100; 
            $b = $a / 100;
            $rupiah = $b * @$key->batas_pengeluaran;

            $row['nama_akun']       = $key->nama_akun;
            $row['pencapaian']      = $a;
            $row['tahun']           = $key->tahun;
            $data[] = $row;
        }

        if($q == true){
            $status = "ada";
        }else{
            $status = "tidak ada";

        }

        echo json_encode(array(
            'status' => $status,
            'data'   => $data,
        )) ;

        // echo json_encode($data);
    }

}
