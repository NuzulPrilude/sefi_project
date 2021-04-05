<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_data_nota extends CI_Model
{
    private $tabel       = 'pj_nota_piutang np';

    private $column_order  = array(null,'np.nama','np.tanggal', 'np.nota','np.setoran', 'np.returan','np.sisa_piutang',null);
    private $order         = array('np.pj_nota_piutang_id' => 'DESC');

    private function _get_data()
    {

        $mencari = $this->input->post('cari');

        if ($mencari != null || $mencari != '') {

            $this->db->like('np.nota', $mencari);
            $this->db->or_like('np.nama', $mencari);
        } 


        $this->db->select('np.*');

        $this->db->where('np.is_hapus', 1);

        $this->db->from('pj_nota_piutang np');

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