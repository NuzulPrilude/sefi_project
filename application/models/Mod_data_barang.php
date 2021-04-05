<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_data_barang extends CI_Model
{
    private $tabel         = 'pj_barang pj';
    private $column_order  = array(null,'pj.kode_barang','pj.nama_barang',null);
    private $order         = array('pj.id_barang' => 'DESC');

    private function _get_data()
    {

        $mencari            = $this->input->post('cari');
        $id_merk_barang     = $this->input->post('id_merk_barang');
        $id_kategori_barang = $this->input->post('id_kategori_barang');

        if ($mencari != null || $mencari != '') {

            $this->db->like('pj.kode_barang', $mencari);
            $this->db->or_like('pj.nama_barang', $mencari);

        } 

        if ($id_merk_barang != '') {

            $this->db->where('pj.id_merk_barang', $id_merk_barang);

        }

        if ($id_kategori_barang != '') {

            $this->db->where('pj.id_kategori_barang', $id_kategori_barang);

        } 

        $this->db->select('pj.*');
        $this->db->select('mb.merk');
        $this->db->join('pj_merk_barang mb','mb.id_merk_barang = pj.id_merk_barang','left');
        $this->db->from($this->tabel);

        $i = 0;

        if (isset($_POST['order'])) {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

        } else if (isset($this->order)) {

            $order = $this->order;

            $this->db->order_by(key($order), $order[key($order)]);

        }

    }

    public function get_data()
    {
        $this->_get_data();

        if ($_POST['length'] != -1) {

            $this->db->limit($_POST['length'], $_POST['start']);

        }
        $query = $this->db->get();

        return $query->result();
    }

    public function count_filtered()
    {

        $this->_get_data();

        $query = $this->db->get();

        return $query->num_rows();

    }

      public function count_all()
    {

        $this->db->from($this->tabel);

        return $this->db->count_all_results();

    }

}