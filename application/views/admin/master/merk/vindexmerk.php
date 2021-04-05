<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li class="active">Merk</li>
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

		<div class="col-lg-8">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title"></h3>
					<div class="box-tools pull-right">
						<a href="javascript:void(0)" class="btn btn-box-tool btn-reload" data-toggle="tooltip" title="Refresh">
							<i class="fa fa-refresh"></i>
						</a>
						<a href="<?=site_url('admin/master/merk/tambah_merk')?>"  class="btn btn-box-tool" data-toggle="tooltip" title="Tambah">
							<i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
        <div class="box-header">
          <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input class="form-control" type="text" name="cari" placeholder="Cari Merk ..">
                </div>
            </div>
          </div>
        </div>
				<div class="box-body no-padding">
					<div class="table-responsive">
						<table class="table table-striped table-hover tabel_merk" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th width="5%">No</th>
					                <th >Merk</th>
					                <th >Aksi</th>
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
var urlWe 		= window.location.href;
var tabel_data 	= $('.tabel_merk');
var cari 		= $('[name="cari"]');
var btn_reload  = $('.btn-reload');


$(() => {

    tabel = tabel_data.DataTable({
        processing: true,
        searching: false,
        ordering: false,
        info: false,
        serverSide: true,
        order: [],
        ajax: {
            url:  urlWe +'/model_merk',
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
    btn_reload.on('click', (e) => {
        tabel.ajax.reload();
    });
    cari.on('keyup', (e) => {
        tabel.ajax.reload();
    });

});

</script>