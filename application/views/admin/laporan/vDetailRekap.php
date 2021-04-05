<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul_content?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Lpaoran</a></li>
		<li class="active">rekap</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<?php if (@$this->session->flashdata('gagal')): ?>
			<div class="alert alert-danger fade in">
				<?=$this->session->flashdata('gagal'); ?>
			</div>
			<?php endif ?>
			<?php if (@$this->session->flashdata('berhasil')): ?>
			<div class="alert alert-success fade in">
				<?=$this->session->flashdata('berhasil'); ?>
			</div>
			<?php endif ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title"></h3>
					<div class="box-tools pull-right">
						<a href="javascript:void(0)" class="btn btn-box-tool btn-reload" data-toggle="tooltip" title="Refresh">
							<i class="fa fa-refresh"></i>
						</a>
						<a href="javascript:void(0)"  target="_blank" class="btn btn-box-tool btn-reload" data-toggle="tooltip" title="export to excel">
							<i class="fa fa-print"></i>
						</a>
					</div>
				</div>
				<div class="box-body no-padding">
					<input type="hidden" class="form-control" name="no_pos_transaksi" value="<?=@$no_pos_transaksi?>">
					<div class="form-group">
						<table>
							<tr>
								<th>RINCIAN BIAYA TINDAKAN TAHUN 2018</th>
							</tr>
							<tr>
								<th><?=@$detailnya->nama_jenis_tindakan?></th>
							</tr>
							<tr>
								<th><?=@$detailnya->nama_pasien?></th>
							</tr>
						</table>
					</div>
					<div class="table-responsive">
						<table  class="table table tabel_na" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Tindakan Besar</th>
									<th>Kelas III</th>
									<th>Kelas II</th>
									<th>Kelas I</th>
									<th>Kelas VIP</th>
									<th>Kelas VVIP</th>
								</tr>
									<!-- <tr>
										<th colspan="2"></th><th>qty</th><th>satuan</th>
									</tr>
 -->
							</thead>
							<tbody class="data_detail_rekap_ibu">
								
							</tbody>
							<!-- <tfoot class="detail_total_ibu">
								
							</tfoot> -->
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var link = window.location.href;
var url = link.substring(0, link.lastIndexOf('/detail'));
var detail_rekap_ibu 	= $('.detail_tabel');
var detail_total_ibu 	= $('.detail_total_ibu');
var no_pos_transaksi 				= $('[name="no_pos_transaksi"]');
var t_data = $('.data_detail_rekap_ibu');


$(() => {
	// data_kelas();
    listDataNya();
});

var listDataNya = () => {
		var ls = '<tr>';
			ls += '<td colspan="17" class="text-center">Tunggu Sebentar</td>';
			ls += '</tr>';
		t_data.html(ls);
		_listDataNya(no_pos_transaksi.val(),(e) => {
			ls = '';
			var a = 1;
			if (e.length > 0) {
				for (var i = 0; i < e.length; i++) {
					ls += '<tr>';
					ls += `<td>${a++}.</td>`;
					ls += listDetail(e[i].detail);
					ls += '</tr>';
				}
			}else{
				ls = '<tr>';
				ls += '<td colspan="17" class="text-center">Tidak ada data</td>';
				ls += '</tr>';
			}
			t_data.html(ls);
		});
	}

	var listDetail = (data) => {
		var ls = '';
		var a = 1;
		for (var i = 0; i < data.length; i++) {
			ls += `<td>${data[i].nama_akun}</td>`;
			ls += `<td>${data[i].kelas_III}</td>`;
			ls += `<td>${data[i].kelas_II}</td>`;
			ls += `<td>${data[i].kelas_I}</td>`;
			ls += `<td>${data[i].kelas_VIP}</td>`;
			ls += `<td>${data[i].kelas_VVIP}</td>`;
		}
		return ls;
	}

	var _listDataNya = async (no_pos_transaksi,callback = null) => {
		var { data } = await $.ajax({
			url: url + '/ambil_tes_data_detail',
			data: {
            	no_pos_transaksi: no_pos_transaksi,
        	},
			type: "GET",
			dataType: "JSON",
		});

		if (callback != null) {
			callback(data);
		}
	}



</script>