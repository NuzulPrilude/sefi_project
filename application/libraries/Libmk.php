<?php

/**
 *  Create By Nuzul
 */
class Libmk
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function page($content, $data = null)
    {
        return $this->ci->load->view($content, $data);
    }

    public function admin($content, $data = null)
    {
        $datas = array(
            'header'  => $this->ci->load->view('admin/header', $data, true),
            'sidebar' => $this->ci->load->view('admin/sidebar', $data, true),
            'footer'  => $this->ci->load->view('admin/footer', $data, true),
            'content' => $this->ci->load->view('admin/' . $content, $data, true),
        );
        return $this->ci->load->view('admin/page', $datas);
    }

    public function kasir($content, $data = null)
    {
        $datas = array(
            'header'  => $this->ci->load->view('kasir/header', $data, true),
            'sidebar' => $this->ci->load->view('kasir/sidebar', $data, true),
            'footer'  => $this->ci->load->view('kasir/footer', $data, true),
            'content' => $this->ci->load->view('kasir/' . $content, $data, true),
        );
        return $this->ci->load->view('kasir/page', $datas);
    }

    public function waktu_lalu($timestamp)
    {
        $selisih = time() - strtotime($timestamp);

        $detik  = $selisih;
        $menit  = round($selisih / 60);
        $jam    = round($selisih / 3600);
        $hari   = round($selisih / 86400);
        $minggu = round($selisih / 604800);
        $bulan  = round($selisih / 2419200);
        $tahun  = round($selisih / 29030400);

        if ($detik <= 60) {
            $waktu = $detik . ' detik yang lalu';
        } else if ($menit <= 60) {
            $waktu = $menit . ' menit yang lalu';
        } else if ($jam <= 24) {
            $waktu = $jam . ' jam yang lalu';
        } else if ($hari <= 7) {
            $waktu = $hari . ' hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu . ' minggu yang lalu';
        } else if ($bulan <= 12) {
            $waktu = $bulan . ' bulan yang lalu';
        } else {
            $waktu = $tahun . ' tahun yang lalu';
        }

        return $waktu;
    }

    public function TanggalIndo($date)
    {
        if ($date == null) {
            $date = date('Y-m-d');
        }
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return ($result);
    }

    public function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        );

        $bulan = array(1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

    public function tanggal_indo_2($tanggal, $cetak_hari = false)
    {
        $hari = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        );

        $bulan = array(1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . '/' . $split[1] . '/' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . '&nbsp;,&nbsp;' . $tgl_indo;
        }
        return $tgl_indo;
    }

    public function TanggalIndo2($date)
    {
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . "/" . $bulan . "/" . $tahun;
        return ($result);
    }

    public function tanggalIndoToEng($date)
    {
        $pecah  = explode("/", $date);
        $tahun  = $pecah[2];
        $bulan  = $pecah[1];
        $tgl    = $pecah[0];
        $result = $tahun . "-" . $bulan . "-" . $tgl;
        return ($result);
    }

    public function tanggalEndToIndForm($date)
    {
        $pecah  = explode("-", $date);
        $tahun  = $pecah[0];
        $bulan  = $pecah[1];
        $tgl    = $pecah[2];
        $result = $tgl . "-" . $bulan . "-" . $tahun;
        return ($result);
    }

    public function tanggalEndToIndForm2($date)
    {
        $pecah  = explode("-", $date);
        $tahun  = $pecah[0];
        $bulan  = $pecah[1];
        $tgl    = $pecah[2];
        $result = $tgl . "/" . $bulan . "/" . $tahun;
        return ($result);
    }

    public function ubah_waktu($waktu)
    {
        $tgl_nonformating = $waktu;
        $tgl              = date("D,d M Y g:i:s a", strtotime($tgl_nonformating));
        return $tgl;
    }

    public function text_ucwords($text)
    {
        return ucwords($text);
    }

    public function kelamin($value)
    {
        if ($value == 'M') {
            $kelamin = 'Laki-laki';
        } else {
            $kelamin = 'Perempuan';
        }
        return $kelamin;
    }

    public function kelamin_dua($value)
    {
        if ($value == 'lk') {
            $kelamin = 'Laki-laki';
        } else {
            $kelamin = 'Perempuan';
        }
        return $kelamin;
    }

    public function rating($value)
    {
        if ($value >= 4.6 && $value <= 5) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>';
        } elseif ($value >= 4.1 && $value <= 4.5) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>';
        } elseif ($value >= 3.6 && $value <= 4) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value >= 3.1 && $value <= 3.5) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value >= 2.6 && $value <= 3) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value >= 2.1 && $value <= 2.5) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value >= 1.6 && $value <= 2) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value >= 1.1 && $value <= 1.5) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value >= 0.6 && $value <= 1) {
            return '<i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value >= 0.1 && $value <= 0.5) {
            return '<i class="fa fa-star-half"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        } elseif ($value == 0) {
            return '<i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        } else {
            return 'Jelek Sangat';
        }
    }

    

    public function cek_rupiah_null($value = null)
    {
        if ($value != null) {
            return $this->rupiah($value);
        } else {
            return $this->rupiah(0);
        }
    }

    public function rupiah($value)
    {
        return "Rp." . number_format($value, 0, ",", ".");
    }

    public function cek_rupiah_tanpa_rp_null($value = null)
    {
        if ($value != null) {
            return $this->rupiah_tanpa_rp($value);
        } else {
            return $this->rupiah_tanpa_rp(0);
        }
    }

    public function rupiah_tanpa_rp($value)
    {
        return number_format($value, 2, ",", ".");
    }

    public function rupiah_tanpa_rp_2($value)
    {
        return number_format($value, 0, ",", ".");
    }

    public function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp  = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai)) . " Rupiah";
        }
        return $hasil;
    }

    public function bulan_alfabet($bulan)
    {
        $data = array(
            'A','B','C','D','E','F','G','H','I','J','K','L',
        );
        return $data[(int) $bulan - 1];
    }

    public function jenis_pasien($value = null)
    {
        if ($value == 1) {
            return "IBU";
        } else {
            return "ANAK";
        }
    }

    public function cek_nama_null($value = null)
    {
        if ($value != null) {
            return $value;
        } else {
            return "-";
        }
    }
}
