<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Laporan</a></li>
		<li class="active">Rekap Anak</li>
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
					</div>
				</div>
				<div class="box-body no-padding">
					<div class="table-responsive">
						<table class="table table-striped table-hover" cellspacing="0" width="100%">
							<thead>
									<tr class="dkelas"></tr>
							</thead>
							<tbody class="data_rekap_anak"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var tabel;
var t_data = $('.data_rekap_anak');
var dkelas = $('.dkelas');
var cari = $('[name="cari"]');
var muncul = $('.muncul');
var btn_reload = $('.btn-reload');
var url = window.location.href;

$(() => {
	data_kelas();
    listDataNya();
});

var data_kelas = () => {
        var th = '<th>No</th>' + '<th>Nama Pasien</th>' + ' <th>Jenis Tindakan</th> ';
                th += '<th>' + 'Kelas III' + '</th>';
                th += '<th>' + 'Kelas II' + '</th>';
                th += '<th>' + 'Kelas I' + '</th>';
                th += '<th>' + 'Kelas VIP' + '</th>';
                th += '<th>' + 'Kelas VVIP' + '</th>';

        dkelas.html(th);
}

var _listDataNya = async (callback = null) => {
		var { data } = await $.ajax({
			url: url + '/ambil_tes_data',
			type: "GET",
			dataType: "JSON",
		});

		if (callback != null) {
			callback(data);
		}
	}
	
var listDataNya = () => {
		var ls = '<tr>';
			ls += '<td colspan="17" class="text-center">Tunggu Sebentar</td>';
			ls += '</tr>';
		t_data.html(ls);
		_listDataNya((e) => {
			ls = '';
			var a = 1;
			if (e.length > 0) {
				for (var i = 0; i < e.length; i++) {
					ls += '<tr>';
					ls += `<td>${a++}.</td>`;
					ls += `<td>${e[i].nama_pasien}</td>`;
					ls += `<td>${e[i].nama_jenis_tindakan}</td>`;
					ls += `<td>${e[i].Kelas_III}</td>`;
					ls += `<td>${e[i].Kelas_II}</td>`;
					ls += `<td>${e[i].Kelas_I}</td>`;
					ls += `<td>${e[i].Kelas_VIP}</td>`;
					ls += `<td>${e[i].Kelas_VVIP}</td>`;
					// ls += `<td><a class="btn btn-flat btn-danger" href="`+ url +'/detail/'+data[i].no_pos_transaksi + `">Detail</a></td>`;
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


</script>