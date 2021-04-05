<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            redirect(base_url(''));
        }
        $this->load->model('model_kategori','mk');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Kategori',
            'judul'             => 'Data Kategori',
        );
        $this->libmk->admin('master/kategori/vindexkategori', $data);
    }

    public function model_kategori()
    {
        $data = $this->mk->getDataTables();
        echo json_encode($data);
    }


    public function tambah_kategori()
    {

         if($this->input->post('simpan') == null ){
            
            $data = array(
                'title'             => 'Tambah Kategori',
                'judul'             => 'Tambah Kategori',
            );

        $this->libmk->admin('master/kategori/vtambahkategori', $data);


        }else{

            $data = array(
                'kategori'  => $this->input->post('kategori'),
                'dihapus'   => 'tidak',
            );

            $query = $this->mod_all->menambah('pj_kategori_barang', $data);

            $this->session->set_flashdata(ucwords($query['status']), ucwords($query['status']).' Manambah Kategori..');
            redirect(base_url('admin/master/kategori'));


        }

    }

    public function hapuskategori($id_kategori_barang = null)
    {
        $query = $this->mod_all->menghapus('pj_kategori_barang',['md5(id_kategori_barang)'=>$id_kategori_barang]);

        $this->session->set_flashdata($query['status'], ucwords($query['status']).' Menghapus Kategori..');
        redirect(base_url('admin/master/kategori'));
    }


    public function editkategori($id_kategori_barang = null)
    {
        if($this->input->post('simpan') == null ){
            
            $data = array(
                'title'                 => 'Edit kategori',
                'judul'                 => 'Edit kategori',
                'id_kategori_barang'    => $id_kategori_barang,
                'data_kategori'         => $this->mod_all->mengambil('pj_kategori_barang',array('md5(id_kategori_barang)'=>$id_kategori_barang))->row(),
            );

        $this->libmk->admin('master/kategori/veditkategori', $data);


        }else{

        $data = array(
            'kategori'      => $this->input->post('kategori'),
        );

        $query = $this->mod_all->mengubah('pj_kategori_barang', array('md5(id_kategori_barang)'=>$id_kategori_barang) , $data);

        $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Kategori..');
        redirect(base_url('admin/master/kategori'));

        }
    }

}