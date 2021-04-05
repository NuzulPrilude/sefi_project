<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Nota</a></li>
		<li class="active"> Nota Piutang</li>
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

        <div id="tambah_nota" class="modal fade form-proses" role="dialog">
         
            <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close hilang" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Nota</h4>
              </div>
              <div class="modal-body">

                <form  method="POST" action="<?=site_url('admin/master/datanota/tambah_nota')?>">
                  
                  <div class="row">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Tanggal</label>
                                <input  type="date" name="tanggal" class="form-control">
                          </div>

                          <div>
                              <label>Nama</label>
                             <input type="text" name="nama" class="form-control">
                          </div>

                          <div>
                              <label>Nota</label>
                              <input type="text" name="nota" class="form-control">
                          </div>

                          <div>
                              <label>Setoran</label>
                              <input type="text" name="setoran" class="form-control">
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Returan</label>
                                <input placeholder="Returan" type="number" name="returan" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Jumlah Sisa</label>
                                <input placeholder="Jumlah Sisa" type="number" name="sisa_piutang" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="5"></textarea>
                          </div>
                    </div>

                  </div>

                  <div class="modal-footer">
                     <button type="reset"  data-dismiss="modal" class="btn btn-danger hilang">Batal</button>
                     <button type="Submit" name="simpan"  class="btn btn-success">Simpan</button>
                  </div>
                    </form>
                  </div>


                </div>
            </div>
                   

        </div>


        <section class="col-lg-12 col-xs-12">

            <div>

              <div class="box">

                  <div class="box-header with-border">

                    <h3 class="box-title">Cari</h3>

                  </div>

                  <div class="box-body">

                    <div class="form-group">

                      <div>

                        <input class="form-control" type="text" name="cari" placeholder="Cari Nama & Nota ..">

                      </div>

                    </div>
                    <hr>

                  </div>

              </div>

            </div>

          </section>

    </div>

	<div class="row">

		<div class="col-lg-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">List Data Nota</h3>
					<div class="box-tools pull-right">
						<a href="javascript:void(0)" class="btn btn-box-tool btn-reload" data-toggle="tooltip" title="Refresh">
							<i class="fa fa-refresh"></i>
						</a>
						<a href="javascript:void(0)"  onclick="tambah_nota()"  class="btn btn-box-tool" data-toggle="tooltip" title="Tambah">
							<i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
				<div class="box-body no-padding">
					<div class="table-responsive">
						<table class="table table-striped table-hover tabel_nota_piutang" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th width="5%">No</th>
                  <th width="5%">Nama</th>
									<th width="5%">Tanggal</th>
                  <th width="5%">Nota</th>
									<th width="5%">Setoran</th>
                  <th width="5%">Returan</th>
                  <th width="5%">Jumlah Sisa</th>
                  <th width="5%">Ket.</th>
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
var tabel_data 			= $('.tabel_nota_piutang');
var cari 				= $('[name="cari"]');
var muncul 				= $('.muncul');
var btn_reload 			= $('.btn-reload');



$(() => {
    tabel = tabel_data.DataTable({
        processing: true,
        searching: false,
        ordering: true,
        info: false,
        serverSide: true,
        order: [],
        ajax: {
            url:  urlWe +'/listDataNota',
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
    });
    cari.on('keyup', (e) => {
        tabel.ajax.reload();
    });
    cari.on('change', (e) => {
        tabel.ajax.reload();
    });

});

function tambah_nota()
{
    $('#tambah_nota').modal('show');
}


function ambil_kategori() {
    id_kategori_barang.select2({
        placeholder: 'Pilih Nama',
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