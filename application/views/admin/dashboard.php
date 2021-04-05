<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=$judul_content?> 
	</h1>
	<ol class="breadcrumb">
							
		<li><a href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<?php if (@$this->session->flashdata('gagal')): ?>
			<div class="alert alert-danger fade in">
				<?=$this->session->flashdata('gagal');?>
			</div>
			<?php endif?>
			<?php if (@$this->session->flashdata('berhasil')): ?>
			<div class="alert alert-success fade in">
				<?=$this->session->flashdata('berhasil');?>
			</div>
			<?php endif?>
		</div>
		<div class="col-lg-4 col-xs-12">
			<div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">JUMLAH PENGGUNA</span>
              <span class="info-box-number"><?=@$total_pengguna?> Orang</span>
            </div>
            <!-- /.info-box-content -->
          </div>
		</div>
		<div class="col-lg-4 col-xs-12">
			<div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-info"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">JUMLAH BARANG</span>
              <span class="info-box-number"><?=@$total_barang?> item</span>
            </div>
            <!-- /.info-box-content -->
          </div>
		</div>
		<div class="col-lg-4 col-xs-12">
			<div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-minus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">STOK < 10</span>
              <span class="info-box-number"><?=@$stok_hampir_habis?> item</span>
            </div>
            <!-- /.info-box-content -->
          </div>
		</div>
	</div>

   <!--  <div class="row">
          <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Pembelian Dan Penjualan Barang </h3>
            </div>
            <div class="box-body">
              <div id="graph"></div>
            </div>
          </div>
        </div>
    </div> -->

</section>
<link rel="stylesheet" href="<?=base_url('assets/bower_components/morris.js/morris.css')?>">
<script src="<?=base_url('assets/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/morris.js/morris.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/chart.js/Chart.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/chart.js/Chart.js')?>"></script>
<script>
var url = window.location.href;
var data_nya_pencapaian_penerimaan  = $('.data_nya_pencapaian_penerimaan');
var data_nya_pengeluaran            = $('.data_nya_pengeluaran');


$(function() {
// grafik();
// pencapaian_penerimaan();
// pencapaian_pengeluaran();

});

function grafik() {
    $.ajax({
        url: url + "/data_grafik_percobaan",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            var grafik_na = new Morris.Bar({
                element: 'graph',
                data: data,
                xkey: 'tahun',
                ykeys: ['penjualan', 'pembelian'],
                labels: ['Penjualan', 'Pembelian']
            }).on('click', function(i, row){
              // console.log(i, row);
            });
            // console.log(data);
        }
    });
}

function pencapaian_penerimaan() {
    var ls = '<p>' + 'Tunggu Sebentar' + '</p>';
    data_nya_pencapaian_penerimaan.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/tes_data',
        type: "GET",
        dataType: "JSON",
        data: {
            // id_akun: 401,
            // tanggala: first_date.val(),
            // tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    // aria-valuenow="20"
                    ls += '<p>' + r.data[i].nama_akun + '<p>';
                    ls += '<div class="progress progress-sm active">';
                    ls += '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="' + r.data[i].pencapaian +' "  aria-valuemin="0" aria-valuemax="100" style="' + 'width:' + r.data[i].pencapaian + '%' +' ">';
                    ls += '<span class="sr-only">'+ r.data[i].pencapaian + '%'   +'</span>';
                    ls += '</div>';
                    ls += '</div>';
                    
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            data_nya_pencapaian_penerimaan.html(ls);
           
        }
    });
}

function pencapaian_pengeluaran(){
  var ls = '<p>' + 'Tunggu Sebentar' + '</p>';
    data_nya_pengeluaran.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/progress_pengeluaran',
        type: "GET",
        dataType: "JSON",
        data: {
            // id_akun: 401,
            // tanggala: first_date.val(),
            // tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    
                    ls += '<p>' + r.data[i].nama_akun + '<p>';
                    ls += '<div class="progress progress-sm active">';
                    ls += '<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="' + 'width:' + r.data[i].pencapaian + '%' +' ">';
                    ls += '<span class="sr-only">20% Complete</span>';
                    ls += '</div>';
                    ls += '</div>';
                    
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            data_nya_pengeluaran.html(ls);
           
        }
    });
}

</script>