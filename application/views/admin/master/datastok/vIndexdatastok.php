<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li class="active">Data Stok Barang</li>
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

        <section class="col-lg-3">

            <div>

              <div class="box">

                  <div class="box-header with-border">

                    <h3 class="box-title">Cari</h3>

                  </div>

                  <div class="box-body">

                    <div class="form-group">

                      <div>

                        <input class="form-control" type="text" name="cari" placeholder="Cari Artikel ..">

                      </div>

                    </div>

                    <div class="form-group">

                      <span style="font-size: 10px;">Kd.Barang - Nama Barang - Kategori - Merk</span>

                        <select class="form-control" name="id_barang" style="width: 100%"></select>

                    </div>

                    <hr>

                  </div>

              </div>

            </div>

          </section>

          <section class="col-lg-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">List Data Stok</h3>
                    <div class="box-tools pull-right">
                        <a href="javascript:void(0)" class="btn btn-box-tool btn-reload" data-toggle="tooltip" title="Refresh">
                            <i class="fa fa-refresh"></i>
                        </a>
                        <a href="<?=site_url('admin/master/datastok/tambahstok/')?>" class="btn btn-box-tool" data-toggle="tooltip" title="Tambah">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover tabel_na" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="5%">Artikel</th>
                                    <th width="5%">Ukuran</th>
                                    <th width="5%">Warna</th>
                                    <th width="5%">Sampel</th>
                                    <th width="5%">Stok</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>

      </div>


</section>
<script>

var tabel;
var urlWe               = window.location.href;
var tabel_data 			    = $('.tabel_na');
var cari 				        = $('[name="cari"]');
var btn_reload          = $('.btn-reload');
var id_barang           = $('[name="id_barang"]');
var id_barang_tambah    = $('[name="id_barang_tambah"]');



$(() => {
    
    ambail_barang_all();

    tabel = tabel_data.DataTable({
        processing: true,
        searching: false,
        ordering: true,
        info: false,
        serverSide: true,
        order: [],
        ajax: {
            url:  urlWe +'/listDataStok',
            type: "POST",
            data: function(data) {
                data.cari = cari.val();
                data.id_barang = id_barang.val();
            }
        },
        columnDefs: [{
            targets: [0],
            orderable: false,
        }],
    });
    btn_reload.on('click', (e) => {
        tabel.ajax.reload();
    });
    cari.on('keyup', (e) => {
        tabel.ajax.reload();
    });
    cari.on('change', (e) => {
        tabel.ajax.reload();
    });
     id_barang.on('change', (e) => {
        tabel.ajax.reload();
    });
});

function ambail_barang_all() {
    id_barang.select2({
        placeholder: 'Pilih Barang',
        allowClear: true,
        ajax: {
            url: urlWe + "/cari_barang",
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