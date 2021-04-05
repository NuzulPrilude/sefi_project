<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_pengguna extends CI_Model
{
    private $tabel       = 'pengguna';

    private $column_order  = array('user_id', 'namapengguna', 'email_address','status',null);
    private $order         = array('user_id' => 'DESC');

    private function _get_data()
    {

        $mencari = $this->input->post('cari');
        $id_jenis_pengguna = $this->input->post('id_jenis_pengguna');



        if ($mencari != null || $mencari != '') {

            $this->db->like('user_id', $mencari);
            $this->db->or_like('namapengguna', $mencari);
            $this->db->or_like('email_address', $mencari);
        } 

        if ($id_jenis_pengguna != null) {
            $this->db->where('idjenispengguna', $id_jenis_pengguna);
        }

        
        $this->db->from($this->tabel);


        if (isset($_POST['order'])) {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

        } else if (isset($this->order)) {

            $order = $this->order;

            $this->db->order_by(key($order), $order[key($order)]);

        }

    }

    //untuk data

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

    public function getAlldatauser($user_id = null)
    {
        if($user_id !== null){
            $this->db->where('md5(p.user_id)', $user_id);
        }
        $this->db->join('user_type ut', 'ut.user_type_id = p.idjenispengguna', 'left');
        $query = $this->db->get('pengguna p');
        return $query->row();
    }

}
