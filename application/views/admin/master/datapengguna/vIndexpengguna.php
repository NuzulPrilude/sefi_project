<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li class="active">Data Pengguna</li>
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
				<div class="box-body">
					<div class="row">
						<div class="col-lg-7 col-xs-8 col-xs-12">
							<div class="form-group">
								<div>
									<input class="form-control" type="text" name="cari" placeholder="Cari..">
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-xs-4 col-xs-12">
							<select name="id_jenis_pengguna" class="form-control">
									<option value="">Pilih Jenis Pengguna</option>
									<?php foreach (@$user_type->result() as $hasil) {?>
									<option value="<?=$hasil->user_type_id?>"><?=ucwords($hasil->user_type_name)?></option>
									<?php }?> 
							</select>
						</div>
						<div class="col-lg-2 hidden-xs hidden-md hidden-sm">
							<div class="muncul"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">List Data Pengguna</h3>
					<div class="box-tools pull-right">
						<a href="javascript:void(0)" class="btn btn-box-tool btn-reload" data-toggle="tooltip" title="Refresh">
							<i class="fa fa-refresh"></i>
						</a>
						<a href="<?=site_url('admin/master/pengguna/tambah')?>" class="btn btn-box-tool" data-toggle="tooltip" title="Tambah">
							<i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
				<div class="box-body no-padding">
					<div class="table-responsive">
						<table class="table table-striped table-hover tabel_na" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th >No</th>
									<th >Nama Pengguna</th>
									<th >Email</th>
									<th >Jenis</th>
									<th >Terakhir Login</th>
									<th >Status</th>
									<th width="5%">Aksi</th>
								</tr>
							</thead>
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
var id_jenis_pengguna = $('[name="id_jenis_pengguna"]');
var muncul = $('.muncul');
var btn_reload = $('.btn-reload');
var urlWe = window.location.href;
$(() => {
    tabel = tabel_data.DataTable({
        processing: true,
        searching: false,
        ordering: true,
        info: false,
        serverSide: true,
        order: [],
        ajax: {
            url:  "<?php echo site_url('admin/master/pengguna/listData')?>",
            type: "POST",
            data: function(data) {
                data.cari = cari.val();
                data.id_jenis_pengguna = id_jenis_pengguna.val();
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
    id_jenis_pengguna.on('change', (e) => {
        tabel.ajax.reload();
    });
});
</script>