<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li class="active">Data Master Akun</li>
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
					<h3 class="box-title">List Data Akun</h3>
					<div class="box-tools pull-right">
						<a href="javascript:void(0)" class="btn btn-box-tool btn-reload" data-toggle="tooltip" title="Refresh">
							<i class="fa fa-refresh"></i>
						</a>
					</div>
				</div>
				<div class="box-body no-padding">
					<div class="table-responsive">
						<table class="table table-striped table-hover tabel_na" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>No Akun</th>
									<th>Nama Akun</th>
									<th>Referensi</th>
									<th>Debet</th>
									<th>Kredit</th>
								</tr>
							</thead>
							<tfoot>
								<tr><th></th></tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var tabel;
var tabel_data = $('.tabel_na');
var cari = $('[name="cari"]');
var muncul = $('.muncul');
var btn_reload = $('.btn-reload');
var urlWe = window.location.href;
$(() => {
    tabel = tabel_data.DataTable({
        processing: true,
        searching: true,
        ordering: true,
        info: false,
        serverSide: true,
        order: [],
        ajax: {
            url:  urlWe +'/listData',
            type: "POST",
            data: function(data) {
                data.cari = cari.val();
            }
        },
        columnDefs: [{
            targets: [0],
            orderable: false,
        }],
    });
    var colvis = new $.fn.dataTable.ColVis(tabel, {
        buttonText: 'Sembunyikan Kolom',
        activate: "mouseover",
    });
    muncul.html(colvis.button());
    btn_reload.on('click', (e) => {
        tabel.ajax.reload();
        jumlah();
    });
    cari.on('keyup', (e) => {
        tabel.ajax.reload();
    });
    cari.on('change', (e) => {
        tabel.ajax.reload();
    });
});

function total()
{
	
}
</script>