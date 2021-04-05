<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datanota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            redirect(base_url(''));
        }
        $this->load->model('mod_data_nota');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Nota Piutang',
            'judul'             => 'Data Nota Piutang',
        );
        $this->libmk->admin('master/datanota/vIndexdatanota', $data);
    }


    public function tambah_nota()
    {
        $data = array(
            'nama'      => $this->input->post('nama'),
            'tanggal'   => $this->input->post('tanggal'),
            'nota'      => $this->input->post('nota'),
            'setoran'   => $this->input->post('setoran'),
            'returan'   => $this->input->post('returan'),
            'sisa_piutang'  => $this->input->post('sisa_piutang'),
            'keterangan'    => $this->input->post('keterangan'),
            'is_hapus'      => 1

        );

        //cek nama artikel
        $cek_barang = $this->mod_all->mengambil('pj_nota_piutang', array('nota'=>$this->input->post('nota')) );

        if($cek_barang->num_rows() > 0){
            $this->session->set_flashdata('gagal', 'Gagal No Nota Sudah Ada...');
            redirect(base_url('admin/master/datastok'));
        }else{

            $query = $this->mod_all->menambah('pj_nota_piutang', $data);

            if ($query['status'] == 'berhasil') {
                $this->session->set_flashdata('berhasil', 'Berhasil Menambah Data Nota..');
                redirect(base_url('admin/master/datanota'));
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambah Data Nota..');
                redirect(base_url('admin/master/datanota'));
            }

        }
    }

     public function listDataNota()
    {

        $lier = $this->mod_data_nota->get_data();

        $data = array();

        $no = $_POST['start'];

        $no1 = 1;

        foreach ($lier as $list) {

            $button = '<div class="btn-group">';

            $button .= '<button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">Aksi</button>';

            $button .= '<span class="sr-only">Klik</span>';

            $button .= '</button>';

            $button .= '<ul class="dropdown-menu" role="menu">';

            $button .= '<li><a  href="' . site_url('admin/master/datanota/editdatanota/' . md5($list->pj_nota_piutang_id)) . '">Edit</a></li>';

            $button .= '<li><a onclick="return confirm(' . "'Apakah Anda Yakin?'" . ')" href="' . site_url('admin/master/datanota/hapusdatanota/' . md5($list->pj_nota_piutang_id)) . '">Hapus</a></li>';

            $button .= '</ul>';

            $button .= '</div>';

            $row = array();

            $row[] = $no1++ . ".";
            $row[] = $list->nama;
            $row[] = $this->libmk->TanggalIndo($list->tanggal);
            $row[] = $list->nota;
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->setoran);
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->returan);
            $row[] = $this->libmk->rupiah_tanpa_rp_2($list->sisa_piutang);
            $row[] = $list->keterangan;
            $row[] = $button;

            $data[] = $row;

        }

        $output = array(

            "draw"            => $_POST['draw'],

            "recordsTotal"    => $this->mod_data_nota->count_all(),

            "recordsFiltered" => $this->mod_data_nota->count_filtered(),

            "data"            => $data,

        );

        echo json_encode($output);

    }

    public function hapusdatanota($pj_nota_piutang_id = null)
    {
        $data = array(
            'is_hapus' => 0
        );

        $query = $this->mod_all->mengubah('pj_nota_piutang',array('md5(pj_nota_piutang_id)'=>$pj_nota_piutang_id) , $data);

        if ($query['status'] == 'berhasil') {
            $this->session->set_flashdata('berhasil', 'Berhasil Menghapus Data Nota..');
            redirect(base_url('admin/master/datanota'));
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data Nota..');
            redirect(base_url('admin/master/datanota'));
        }

    }

    public function editdatanota($pj_nota_piutang_id = null)
    {
        if($this->input->post('simpan') == null ){
            $data = array(
                'title'     => 'Edit Data Nota Piutang',
                'judul'     => 'Edit Data Nota Piutang',
                'pj_nota_piutang_id'    => $pj_nota_piutang_id,
                'datanotapiutang'       => $this->mod_all->mengambil('pj_nota_piutang', array('md5(pj_nota_piutang_id)'=> $pj_nota_piutang_id))->row()
            );

        $this->libmk->admin('master/datanota/vEditdatanota', $data);


        }else{


            $data = array(
                'nama'      => $this->input->post('nama'),
                'tanggal'   => $this->input->post('tanggal'),
                'nota'      => $this->input->post('nota'),
                'setoran'   => $this->input->post('setoran'),
                'returan'   => $this->input->post('returan'),
                'sisa_piutang'=> $this->input->post('sisa_piutang'),
                'keterangan'=> $this->input->post('keterangan')
            );

            $query = $this->mod_all->mengubah('pj_nota_piutang', array('md5(pj_nota_piutang_id)'=> $pj_nota_piutang_id) , $data );

            if ($query['status'] == 'berhasil') {
                $this->session->set_flashdata('berhasil', 'Berhasil Mangubah Data Nota Piutang..');
                redirect(base_url('admin/master/datanota'));
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mangubah Data Nota Piutang..');
                redirect(base_url('admin/master/datanota'));
            }

        }
    }


    

}