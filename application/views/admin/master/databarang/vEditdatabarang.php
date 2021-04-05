<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li>Data Barang</li>
		<li class="active">Edit Data Barang</li>
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
				<form action="<?=site_url('admin/master/databarang/editdatabarang/'.$id_barang)?>" method="post" class="form-wajib">
					<div class="box-body">

						<div class="form-group">
							<label>Kode barang</label>
							<div>
								<input value="<?=@$data_barang->kode_barang?>" type="text" class="form-control" name="kode_barang" placeholder="Kode Barang">
							</div>
						</div>

						<div class="form-group">
							<label>Nama barang</label>
							<div>
								<input value="<?=@$data_barang->nama_barang?>" type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
							</div>
						</div>

						<div class="form-group">
							<label>Kategori</label>
								<select name="id_kategori_barang" style="width: 100%" class="form-control select2">
									<option value="">Pilih Kategori</option>
									<?php foreach ($kategori->result() as $key) { ?>
										<option <?php if($key->id_kategori_barang == @$data_barang->id_kategori_barang){  echo "selected";  }?> value="<?=$key->id_kategori_barang?>"><?=$key->kategori?></option>
									<?php } ?>
								</select>
						</div>

						<div class="form-group">
							<label>Merk</label>
								<select name="id_merk_barang" style="width: 100%" class="form-control select2">
									<option value="">Pilih Merk</option>
									<?php foreach ($merk->result() as $key) { ?>
										<option <?php if($key->id_merk_barang == @$data_barang->id_merk_barang ){  echo "selected";  }?> value="<?=$key->id_merk_barang?>"><?=$key->merk?></option>
									<?php } ?>
								</select>
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<div>
								<textarea name="keterangan" rows="4" class="form-control"><?=$data_barang->keterangan?></textarea>
							</div>
						</div>
						
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-lg-4 col-lg-offset-8">
								<div class="row">
									<div class="col-xs-6">
										<a  onclick="window.history.back()" href="javascript:void(0)" class="btn btn-danger btn-flat btn-block">Batal</a>
									</div>
									<div class="col-xs-6">
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
var url_2 = url_1.substring(0, url_1.lastIndexOf('/editdatabarang/'));
var fw = $('.form-wajib');
var ulangi = $('[name="ulangi"]');
var id_kategori = $('[name="id_kategori"]');
var id_merk = $('[name="id_merk"]');


$(() => {

    fw.bootstrapValidator({
        fields: {
            kode_barang: {
                validators: {
                    notEmpty: {
                        message: 'Kode Barang Jangan Kosong..'
                    }
                }
            },
            nama_barang: {
                validators: {
                    notEmpty: {
                        message: 'Nama Barang Jangan Kosong..'
                    }
                }
            },
            id_kategori: {
                validators: {
                    notEmpty: {
                        message: 'Kategori Jangan Kosong..'
                    }
                }
            },
            id_merk: {
                validators: {
                    notEmpty: {
                        message: 'Merk Jangan Kosong..'
                    }
                }
            },
        }
    });
    ulangi.on('click', (e) => {
        fw[0].reset();
        fw.bootstrapValidator('resetForm', true);
    });
});

</script>