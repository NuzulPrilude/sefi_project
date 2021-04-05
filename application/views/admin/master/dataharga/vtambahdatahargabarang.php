<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li>Data Barang</li>
		<li class="active">Tambah Harga Barang</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-lg-8">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Form</h3>
					<div class="box-tools pull-right">
						<a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-box-tool" data-toggle="tooltip" title="Kembali">
							<i class="fa fa-arrow-left"></i>
						</a>
					</div>
				</div>
				<form action="<?=site_url('admin/master/dataharga/tambahhargabarang')?>" method="post" class="form-wajib">
					<div class="box-body">
						<div class="row">
                    <div class="col-md-6">

                          <div class="form-group">
                              <label>Nama Barang - Kategori - Merk</label>
                              <select name="id_barang" style="width: 100%" class="form-control select2" ></select>
                          </div>

                          <div class="form-group">
                            <label>Artikel</label>
                                <input placeholder="Artikel" type="text" name="artikel" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Ukuran</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" placeholder="Ukuran" type="text" name="ukuran" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Harga Beli / Modal</label>
                                <input placeholder="Harga Beli / Modal" type="number" name="modal" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Harga Jual</label>
                                <input placeholder="Harga Jual" type="number" name="harga_jual" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Harga Member</label>
                                <input placeholder="Harga Member" type="number" name="harga_sp" class="form-control">
                          </div>

                          
                    </div>

                    <div class="col-md-6">

                          <div class="form-group">
                            <label for="">Harga Sales</label>
                                <input placeholder="Harga Sales" type="number" name="harga_sales" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Harga Umum</label>
                                <input placeholder="Harga Umum" type="number" name="harga_umum" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Harga Warung</label>
                                <input placeholder="Harga Warung" type="number" name="harga_warung" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Keterangan</label>
                              <textarea  name="keterangan" class="form-control" ></textarea>
                          </div>
                    </div>
                  </div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-md-6">
										<a  onclick="window.history.back()" href="javascript:void(0)" class="btn btn-danger btn-flat btn-block">Batal</a>
									</div>
									<div class="col-md-6">
										<input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-flat btn-block">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Jam</h3>
				</div>
				<div class="box-body text-center">
					<h2 class="waktu"></h2>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Info</h3>
				</div>
				<div class="box-body text-left">
					<p style="color: red;"></p>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var url_1 = window.location.href;
var url_2 = url_1.substring(0, url_1.lastIndexOf('/tambahhargabarang'));
var fw = $('.form-wajib');
var ulangi = $('[name="ulangi"]');
var id_merk = $('[name="id_merk"]');
var id_barang           = $('[name="id_barang"]');



$(() => {
    ulangi.on('click', (e) => {
        fw[0].reset();
        fw.bootstrapValidator('resetForm', true);
    });

    ambil_barang();

});


function ambil_barang() {
    id_barang.select2({
        placeholder: 'Pilih Barang',
        allowClear: true,
        ajax: {
            url: url_2 + "/cari_barang",
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