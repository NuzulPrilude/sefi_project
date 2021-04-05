<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_data_stok extends CI_Model
{
    private $tabel       = 'pj_data_stok pds';

    private $column_order  = array(null,'pds.artikel','pds.ukuran', 'pds.size','pds.warna', 'pds.sampel','pds.stok',null);
    private $order         = array('pds.id_data_stok' => 'DESC');

    private function _get_data()
    {

        $mencari = $this->input->post('cari');
        $id_barang = $this->input->post('id_barang');

        if ($mencari != null || $mencari != '') {

            $this->db->like('pds.artikel', $mencari);

        } 

        if ($id_barang != null || $id_barang != '') {

            $this->db->where('pds.id_barang', $id_barang);

        } 

        $this->db->select('pds.*');
        $this->db->select('mb.merk');
        $this->db->join('pj_merk_barang mb','mb.id_merk_barang = pds.id_merk_barang','left');
        $this->db->from('pj_data_stok pds');

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