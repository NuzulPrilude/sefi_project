<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_data_harga_barang extends CI_Model
{
    private $tabel       = 'detail_daftar_harga ddh';

    private $column_order  = array(null,'mb.merk','mb.merk','mb.merk','ddh.modal','ddh.harga_sp','ddh.harga_sales', 'ddh.harga_umum',null);
    private $order         = array('ddh.id_detail_daftar_harga' => 'DESC');

    private function _get_data()
    {

        $mencari                = $this->input->post('cari');
        $id_merk_barang         = $this->input->post('id_merk_barang');
        $id_kategori_barang     = $this->input->post('id_kategori_barang');
        
         if ($mencari != null || $mencari != '') {

            $this->db->like('ddh.artikel', $mencari);
            $this->db->or_like('pb.nama_barang', $mencari);
            $this->db->or_like('mb.merk', $mencari);
            $this->db->or_like('pkb.kategori', $mencari);

        } 

        if ($id_kategori_barang != null || $id_kategori_barang != '') {

            $this->db->where('pb.id_kategori_barang', $id_kategori_barang);

        }

        if ($id_merk_barang != null || $id_merk_barang != '') {

            $this->db->where('pb.id_merk_barang', $id_merk_barang);

        } 


        $this->db->select('ddh.*');
        $this->db->select('pb.nama_barang');
        $this->db->select('pkb.kategori');
        $this->db->select('mb.merk');
        $this->db->join('pj_barang pb','pb.id_barang = ddh.id_barang','left');
        $this->db->join('pj_kategori_barang pkb','pkb.id_kategori_barang = pb.id_kategori_barang','left');
        $this->db->join('pj_merk_barang mb','mb.id_merk_barang = pb.id_merk_barang','left');
        $this->db->from('detail_daftar_harga ddh');

        $i = 0;

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

    public function ambil_harga_layanan_ibu($id_jenis_tindakan = null ,$id_kelas = null)
    {
        $this->db->select('hl.*');
        $this->db->select('ja.id_akun');
        $this->db->select('ja.nama_akun');
        $this->db->select('k.nama_kelas');
        $this->db->select('jt.nama_jenis_tindakan');
        $this->db->join('jenis_tindakan jt', 'hl.id_jenis_tindakan = jt.id_jenis_tindakan');
        $this->db->join('jenis_akun ja', 'hl.id_akun = ja.id_akun','LEFT');
        $this->db->join('kelas k', 'hl.id_kelas = k.id_kelas','LEFT');
        $this->db->order_by('ja.id_akun', 'desc');

        if($id_jenis_tindakan !== null){
            $this->db->where('hl.id_jenis_tindakan',$id_jenis_tindakan);
        }

        if($id_kelas !== null){
            $this->db->where('hl.id_kelas',$id_kelas);
        }

        return $this->db->get('harga_layanan hl');
    }

    public function tes_tes($id_jenis_tindakan = null ,$id_kelas = null)
    {
        $query = "SELECT jt.id_jenis_tindakan , jt.nama_jenis_tindakan,
        (select sum(harga) AS kelas_1 from harga_layanan_anak where ((id_kelas = '1') and (harga_layanan_anak.id_jenis_tindakan = jt.id_jenis_tindakan))) AS kelas_1,
        (select sum(harga) AS kelas_2 from harga_layanan_anak where ((id_kelas = '2') and (harga_layanan_anak.id_jenis_tindakan = jt.id_jenis_tindakan))) AS kelas_2,
        (select sum(harga) AS kelas_3 from harga_layanan_anak where ((id_kelas = '3') and (harga_layanan_anak.id_jenis_tindakan = jt.id_jenis_tindakan))) AS kelas_3,
        (select sum(harga) AS kelas_vip from harga_layanan_anak where ((id_kelas = '4') and (harga_layanan_anak.id_jenis_tindakan = jt.id_jenis_tindakan))) AS kelas_vip,
        (select sum(harga) AS kelas_vvip from harga_layanan_anak where ((id_kelas = '5') and (harga_layanan_anak.id_jenis_tindakan = jt.id_jenis_tindakan))) AS kelas_vvip
         from jenis_tindakan jt";


        return $this->db->query($query);
    }

    function ambil_nama_akun($id_harga_layanan = null)
    {
        $this->db->select('hl.*,ja.nama_akun');
        $this->db->join('jenis_akun ja', 'ja.id_akun = hl.id_akun', 'RIGHT');
        if($id_harga_layanan !== null){
            $this->db->where('hl.id_harga_layanan',$id_harga_layanan);
        }
        return $this->db->get('harga_layanan hl');
    }

}