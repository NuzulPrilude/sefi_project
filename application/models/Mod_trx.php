<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_trx extends CI_Model
{
    private $tabel       = 'pos_transaksi';

    private $column_order  = array('no_pos_transaksi', 'nama_pos_transaksi', 'keterangan');
    private $column_search = array('no_pos_transaksi', 'nama_pos_transaksi', 'keterangan');
    private $order         = array('no_pos_transaksi' => 'DESC');

    private function _get_data()
    {

        $mencari = $this->input->post('cari');

        if ($mencari != null || $mencari != '') {

            $this->db->like('no_pos_transaksi', $mencari);
            $this->db->or_like('nama_pos_transaksi', $mencari);
            $this->db->or_like('keterangan', $mencari);
        } 
        
        $this->db->from($this->tabel);

        $i = 0;

        foreach ($this->column_search as $item) {

            if ($_POST['search']['value']) {

                if ($i === 0) {

                    $this->db->group_start();

                    $this->db->like($item, $_POST['search']['value']);

                } else {

                    $this->db->or_like($item, $_POST['search']['value']);

                }

                if (count($this->column_search) - 1 == $i) {

                    $this->db->group_end();

                }

            }

            $i++;

        }

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

    public function get_no_bkm()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(bkm.no_bkm,1)) AS no_bkm FROM bukti_kas_masuk bkm  WHERE DATE(bkm.tanggal_bkm)=CURDATE()");
        $kd = "";
        $dt = date('Y-m-d');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_bkm) + 1;
                $kd  = sprintf("%03s","BKM.". $dt ."-". $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        // return $q->result();
        return $kd;

    }

    public function get_no_pos_trx()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(pt.no_pos_transaksi,1)) AS no_pos_transaksi FROM pos_transaksi pt");
        $kd = "";
        $dt = date('Y-m-d');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_pos_transaksi) + 1;
                $kd  = sprintf("%03s","POS.".$tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }

    public function get_no_bkk()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(bkk.no_bkk,1)) AS no_bkk FROM bukti_kas_keluar bkk  WHERE DATE(bkk.tanggal_bkk)=CURDATE()");
        $kd = "";
        $dt = date('Y-m-d');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_bkk) + 1;
                $kd  = sprintf("%03s","BKK.". $dt ."-". $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        // return $q->result();
        return $kd;

    }

    public function get_no_pos_bkk()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(pt.no_pos_transaksi,1)) AS no_pos_transaksi FROM pos_transaksi pt");
        $kd = "";
        $dt = date('Y-m-d');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_pos_transaksi) + 1;
                $kd  = sprintf("%03s","POS.".$tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }

    

    public function carijenisakun($limit, $cari =null)
    {
        $this->db->select('left(id_akun,1) as id , id_akun , nama_akun');
        $this->db->having('id =', 4 );
        $this->db->like('nama_akun', $cari);
        $this->db->or_like('id_akun', $cari);
        $this->db->limit($limit);

        return $this->db->get('jenis_akun');
    }

    public function cari_pasien($limit, $cari)
    {
        $this->db->like('nama_pasien', $cari);
        $this->db->where('type', 1);
        $this->db->limit($limit);

        return $this->db->get('pasien');
    }

    public function cari_jenis_pasien($limit, $cari)
    {
        $this->db->like('nama_jenis_pasien', $cari);
        $this->db->limit($limit);

        return $this->db->get('jenis_pasien');
    }

    public function cari_jenis_tindakan($limit, $cari)
    {
        $this->db->like('nama_jenis_tindakan', $cari);
        $this->db->limit($limit);

        return $this->db->get('jenis_tindakan');
    }

    public function cari_kelas($limit, $cari= null)
    {   
        $this->db->select('hl.id_kelas , k.nama_kelas , jt.id_jenis_tindakan , jt.nama_jenis_tindakan');
        $this->db->group_start();
        $this->db->like('nama_kelas', $cari);
        $this->db->or_like('jt.id_jenis_tindakan', $cari);
        $this->db->or_like('jt.nama_jenis_tindakan', $cari);
        $this->db->group_end();
        $this->db->limit($limit);
        $this->db->join('jenis_tindakan jt', 'jt.id_jenis_tindakan = hl.id_jenis_tindakan', 'left');
        $this->db->join('kelas k', 'k.id_kelas = hl.id_kelas', 'left');
        return $this->db->get('harga_layanan hl');
    }

    public function cari_dokter($limit, $cari)
    {
        $this->db->like('nama_dokter', $cari);
        $this->db->limit($limit);
        return $this->db->get('dokter');
    }

    public function cari_perawat($limit, $cari)
    {
        $this->db->like('nama_perawat', $cari);
        $this->db->limit($limit);
        return $this->db->get('perawat');
    }

    public function cari_jenis_tindakan_anak($limit, $cari)
    {
        $this->db->like('nama_jenis_tindakan', $cari);
        $this->db->limit($limit);

        return $this->db->get('jenis_tindakan');
    }

    public function cari_pasien_anak($limit, $cari)
    {
        $this->db->like('nama_pasien', $cari);
        $this->db->where('type', 2);
        $this->db->limit($limit);

        return $this->db->get('pasien');
    }

    public function cari_kelas_anak($limit, $cari= null)
    {   
        $this->db->select('hl.id_kelas , k.nama_kelas , jt.id_jenis_tindakan , jt.nama_jenis_tindakan');
        $this->db->group_start();
        $this->db->like('nama_kelas', $cari);
        $this->db->or_like('jt.id_jenis_tindakan', $cari);
        $this->db->or_like('jt.nama_jenis_tindakan', $cari);
        $this->db->group_end();
        $this->db->limit($limit);
        $this->db->join('jenis_tindakan jt', 'jt.id_jenis_tindakan = hl.id_jenis_tindakan', 'left');
        $this->db->join('kelas k', 'k.id_kelas = hl.id_kelas', 'left');
        return $this->db->get('harga_layanan_anak hl');
    }

    public function get_no_kwitansi_bkm()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(bkm.no_bkm,1)) AS no_bkm FROM bukti_kas_masuk bkm  WHERE DATE(bkm.tanggal_bkm)=CURDATE()");
        $kd = "";
        $dt = date('Y-m-d');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_bkm) + 1;
                $kd  = sprintf("%03s","KW.". $dt ."-". $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        // return $q->result();
        return $kd;

    }
    public function get_no_rm()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(p.no_rm,1)) AS no_rm FROM pasien p");
        $kd = "";
        $dt = date('Y-m-d');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_rm) + 1;
                $kd  = sprintf("%03s","00".$tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        // return $q->result();
        return $kd;

    }
}
