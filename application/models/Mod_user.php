<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_user extends CI_Model
{

    private $tabel       = 'pj_user';

     public function masukLog($namapengguna, $katasandi = null)
    {
        if ($katasandi != null) {
            $this->db->where('password', $katasandi);
        }
        $this->db->where('status', 'Aktif');
        $this->db->where('username', $namapengguna);
        return $this->db->get($this->tabel);
    }

    public function ubah($idpengguna, $data)
    {
        $this->db->where('md5(idpengguna)', $idpengguna);
        if ($this->db->update($this->tabel, $data)) {
            return "berhasil";
        } else {
            return "gagal";
        }
    }

    public function data_grafik()
    {
        $this->db->select(' year(pm.tanggal) as tahun ,  sum(pm.grand_total) as penjualan ');
       
        return $this->db->get('pj_penjualan_master pm');
    }

    public function data_grafik_2()
    {
        $this->db->select(' year(pmm.tanggal) as tahun ,  sum(pmm.grand_total) as pembelian ');
       
        return $this->db->get('pj_pembelian_master pmm');
    }

    // public function data_progress()
    // {
    //     $this->db->select('ja.*');
    //     $this->db->join('Table', 'table.column = table.column', 'left');
    //     $this->db->get('jenis_akun ja');
    // }

    public function data_progress($id = null , $tanggala = null , $tanggalb = null)
    {

        $this->db->select('ja.id,ja.id_akun,ja.nama_akun');
        $this->db->select('bkm.tanggal_bkm');
        $this->db->select('dpk.no_bkm,ja.saldo as total_saldo');
        $this->db->select('sum(dpk.total) as total_saldo_dpk');
        $this->db->select('pt.target_pencapaian,pt.tahun');

        // $this->db->select('sum(bkm.total_bkm) as total_saldo_nya');
        $this->db->from('jenis_akun ja');
        $this->db->group_by('id_akun');
        $r = array('40308','40307','40203','40204','40205','40304','40305','40306','40307','40309');
        $this->db->where_in('ja.id_akun', $r);
        // $this->db->where('parent_id', $id);
        if ($tanggala != null && $tanggalb != null) {
                $this->db->where('date(bkm.tanggal_bkm) between "' . $tanggala . '" and "' . $tanggalb . '"');
            }elseif ($tanggala != null) {
                $this->db->where('date(bkm.tanggal_bkm)', $tanggala);
            }elseif ($tanggalb != null) {
                $this->db->where('date(bkm.tanggal_bkm)', $tanggalb);
            }
        $this->db->join('detail_penerimaan_kas dpk', 'dpk.id_akun = ja.id_akun','LEFT');
        $this->db->join('bukti_kas_masuk bkm', 'bkm.no_bkm = dpk.no_bkm','LEFT');
        $this->db->join('pencapaian_target pt', 'pt.id_akun = ja.id_akun');


        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id , $tanggala ,$tanggalb );
            $i++;
        }
        return $categories;       
    }

    public function sub_categories($id , $tanggala = null , $tanggalb = null)
    {

        $this->db->select('ja.*');
        $this->db->select('bkm.tanggal_bkm');

        // $this->db->select('dpk.no_bkm,dpk.total as total_saldo_s');
        // $this->db->select('sum(bkm.total_bkm) as total_saldo_nya');
        $this->db->from('jenis_akun ja');
        $this->db->group_by('id_akun');
        $this->db->where('parent_id', $id);
        if ($tanggala != null && $tanggalb != null) {
                $this->db->where('date(bkm.tanggal_bkm) between "' . $tanggala . '" and "' . $tanggalb . '"');
            }elseif ($tanggala != null) {
                $this->db->where('date(bkm.tanggal_bkm)', $tanggala);
            }elseif ($tanggalb != null) {
                $this->db->where('date(bkm.tanggal_bkm)', $tanggalb);
            }
        $this->db->join('detail_penerimaan_kas dpk', 'dpk.id_akun = ja.id_akun','LEFT');
        $this->db->join('bukti_kas_masuk bkm', 'bkm.no_bkm = dpk.no_bkm','LEFT');

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id , $tanggala ,$tanggalb );
            $i++;
        }
        return $categories;       
    }

    public function data_progress_pengeluaran($id = null , $tanggala = null , $tanggalb = null)
    {

        $this->db->select('ja.id,ja.id_akun,ja.nama_akun');
        $this->db->select('bkk.tanggal_bkk');
        $this->db->select('dp.no_bkk,ja.saldo as total_saldo');
        $this->db->select('sum(dp.total_bkk) as total_saldo_dp');
        $this->db->select('ap.batas_pengeluaran,ap.tahun');

        // $this->db->select('sum(bkk.total_bkk) as total_saldo_nya');
        $this->db->from('jenis_akun ja');
        $this->db->group_by('id_akun');
        $r = array('50103','50104','50105','50106','50108');
        $this->db->where_in('ja.id_akun', $r);
        // $this->db->where('parent_id', $id);
        if ($tanggala != null && $tanggalb != null) {
                $this->db->where('date(bkk.tanggal_bkk) between "' . $tanggala . '" and "' . $tanggalb . '"');
            }elseif ($tanggala != null) {
                $this->db->where('date(bkk.tanggal_bkk)', $tanggala);
            }elseif ($tanggalb != null) {
                $this->db->where('date(bkk.tanggal_bkk)', $tanggalb);
            }
        $this->db->join('detail_pengeluaran dp', 'dp.id_akun = ja.id_akun','LEFT');
        $this->db->join('bukti_kas_keluar bkk', 'bkk.no_bkk = dp.no_bkk','LEFT');
        $this->db->join('anggaran_pengeluaran ap', 'ap.id_akun = ja.id_akun');



        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories_pengeluaran($p_cat->id , $tanggala ,$tanggalb );
            $i++;
        }
        return $categories;       
    }

    public function sub_categories_pengeluaran($id , $tanggala = null , $tanggalb = null)
    {

        $this->db->select('ja.*');
        $this->db->select('bkk.tanggal_bkk');

        // $this->db->select('dpk.no_bkk,dpk.total as total_saldo_s');
        // $this->db->select('sum(bkk.total_bkk) as total_saldo_nya');
        $this->db->from('jenis_akun ja');
        $this->db->group_by('id_akun');
        $this->db->where('parent_id', $id);
        if ($tanggala != null && $tanggalb != null) {
                $this->db->where('date(bkk.tanggal_bkk) between "' . $tanggala . '" and "' . $tanggalb . '"');
            }elseif ($tanggala != null) {
                $this->db->where('date(bkk.tanggal_bkk)', $tanggala);
            }elseif ($tanggalb != null) {
                $this->db->where('date(bkk.tanggal_bkk)', $tanggalb);
            }
        $this->db->join('detail_pengeluaran dp', 'dp.id_akun = ja.id_akun','LEFT');
        $this->db->join('bukti_kas_keluar bkk', 'bkk.no_bkk = dp.no_bkk','LEFT');

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories_pengeluaran($p_cat->id , $tanggala ,$tanggalb );
            $i++;
        }
        return $categories;       
    }



  }