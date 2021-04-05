<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li class="active">Data Barang</li>
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
						<a href="<?=site_url('admin/master/databarang/tambah_barang')?>"  class="btn btn-box-tool" data-toggle="tooltip" title="Tambah">
							<i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
        <div class="box-header">
          <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input class="form-control" type="text" name="cari" placeholder="Cari Barang ..">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <select class="form-control select2" name="id_kategori_barang" style="width: 100%"></select>
              </div>    
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <select class="form-control select2" name="id_merk_barang" style="width: 100%"></select>
              </div>
            </div>
          </div>
        </div>
				<div class="box-body no-padding">
					<div class="table-responsive">
						<table class="table table-striped table-hover tabel_na" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th width="5%">No</th>
                                      <th width="5%">Kode Barang</th>
                    				  <th width="5%">Nama Barang</th>
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
var urlWe = window.location.href;
var tabel_data 			= $('.tabel_na');
var cari 				= $('[name="cari"]');
var muncul 				= $('.muncul');
var btn_reload 			= $('.btn-reload');
var id_jt 				= $('[name="id_jt"]');
var id_k 				= $('[name="id_k"]');
var harga 				= $('[name="harga"]');
var loading 			= $('.loading');
var noloading 			= $('.noloading');
var nama_barang         = $('[name="nama_barang"]');
var harga_modal         = $('[name="harga_modal"]');
var harga_sp            = $('[name="harga_sp"]');
var harga_sales         = $('[name="harga_sales"]');
var harga_umum          = $('[name="harga_umum"]');
var harga_warung        = $('[name="harga_warung"]');
var det_barang          = $('.tabel_detail_harga');
//untuk form tambah
var id_kategori_barang_2  = $('[name="id_kategori_barang_2"]');
var id_merk_barang_2      = $('[name="id_merk_barang_2"]');
//untuk pencarian
var id_kategori_barang  = $('[name="id_kategori_barang"]');
var id_merk_barang      = $('[name="id_merk_barang"]');


$(() => {
    
    //untuk pencarian
    ambil_merk();
    ambil_kategori();

    tabel = tabel_data.DataTable({
        processing: true,
        searching: false,
        ordering: false,
        info: false,
        serverSide: true,
        order: [],
        ajax: {
            url:  urlWe +'/listData',
            type: "POST",
            data: function(data) {
                data.cari = cari.val();
                data.id_merk_barang = id_merk_barang.val();
                data.id_kategori_barang = id_kategori_barang.val();
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
        // jumlah();
    });
    cari.on('keyup', (e) => {
        tabel.ajax.reload();
    });

    id_merk_barang.on('change', (e) => {
        tabel.ajax.reload();
    });

    id_kategori_barang.on('change', (e) => {
        tabel.ajax.reload();
    });

});

function tambah_barang()
{
    $('#tambah_data_barang').modal('show');
    //untuk form tambah
    ambil_kategori_tambah();
    ambil_merk_tambah();
}

function ambil_kategori_tambah() {
    id_kategori_barang_2.select2({
        placeholder: 'Pilih Kategori',
        allowClear: true,
        ajax: {
            url: urlWe + "/cari_kategori",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data,
                };
            },
            cache: false
        }
    });
}

function ambil_merk_tambah() {
    id_merk_barang_2.select2({
        placeholder: 'Pilih Merk',
        allowClear: true,
        ajax: {
            url: urlWe + "/cari_merk",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data,
                };
            },
            cache: false
        }
    });
}

function ambil_merk() {
    id_merk_barang.select2({
        placeholder: 'Pilih Merk',
        allowClear: true,
        ajax: {
            url: urlWe + "/cari_merk",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data,
                };
            },
            cache: false
        }
    });
}

function ambil_kategori() {
    id_kategori_barang.select2({
        placeholder: 'Pilih Kategori',
        allowClear: true,
        ajax: {
            url: urlWe + "/cari_kategori",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data,
                };
            },
            cache: false
        }
    });
}

</script>