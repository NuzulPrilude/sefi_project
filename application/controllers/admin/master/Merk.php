<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_null($this->session->admin)) {
            redirect(base_url(''));
        }
        $this->load->model('model_merk','mm');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Merk',
            'judul'             => 'Data Merk',
        );
        $this->libmk->admin('master/merk/vindexmerk', $data);
    }

    public function model_merk()
    {
        $data = $this->mm->getDataTables();
        echo json_encode($data);
    }


    public function tambah_merk()
    {

         if($this->input->post('simpan') == null ){
            
            $data = array(
                'title'             => 'Tambah Merk',
                'judul'             => 'Tambah Merk',
            );

        $this->libmk->admin('master/merk/vtambahmerk', $data);


        }else{

            $data = array(
                'merk'      => $this->input->post('merk'),
                'dihapus'   => 'tidak',
            );

            $query = $this->mod_all->menambah('pj_merk_barang', $data);

            $this->session->set_flashdata($query['status'], ucwords($query['status']).' Menambah Merk..');
            redirect(base_url('admin/master/merk'));


        }

    }

    public function hapusmerk($id_merk_barang = null)
    {
        $query = $this->mod_all->menghapus('pj_merk_barang',['md5(id_merk_barang)'=>$id_merk_barang]);

        $this->session->set_flashdata($query['status'], ucwords($query['status']).' Menghapus Merk..');
        redirect(base_url('admin/master/merk'));
    }


    public function editmerk($id_merk_barang = null)
    {
        if($this->input->post('simpan') == null ){
            
            $data = array(
                'title'                 => 'Edit merk',
                'judul'                 => 'Edit merk',
                'id_merk_barang'        => $id_merk_barang,
                'data_merk'         => $this->mod_all->mengambil('pj_merk_barang',array('md5(id_merk_barang)'=>$id_merk_barang))->row(),
            );

        $this->libmk->admin('master/merk/veditmerk', $data);


        }else{

        $data = array(
            'merk'      => $this->input->post('merk'),
        );

        $query = $this->mod_all->mengubah('pj_merk_barang', array('md5(id_merk_barang)'=>$id_merk_barang) , $data);

        $this->session->set_flashdata($status['status'], ucwords($status['status']).' Mengubah Merk..');
        redirect(base_url('admin/master/merk'));

        }
    }

}