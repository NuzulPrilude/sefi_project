<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li>Data Stok</li>
		<li class="active">Edit Data Stok</li>
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
				<form action="<?=site_url('admin/master/datastok/editdatastok/'.@$id_data_stok)?>" method="post" class="form-wajib">
					<div class="box-body">

						<div class="form-group">
							<label>Kode Barang - Nama Barang - Kategori - Merk</label>
							<div>
								<select name="id_barang" style="width: 100%" class="form-control select2">
									<option value="">Pilih Barang</option>
									<?php foreach ($databarang->result() as $key ) {  ?>
										<option <?php  if($key->id_barang == $datastok->id_barang){echo "selected";}  ?> value="<?=$key->id_barang?>"><?=$key->kode_barang.' - '.$key->nama_barang.' - '.$key->kategori.' - '.$key->merk?></option>
									<?php }  ?>
									<option value=""></option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label>Artikel</label>
							<div>
								<input value="<?=@$datastok->artikel?>" type="text" class="form-control" name="artikel" placeholder="Masukan Artikel">
							</div>
						</div>

						<div class="form-group">
							<label>Ukuran</label>
							<div>
								<input value="<?=@$datastok->ukuran?>" type="text" class="form-control" name="ukuran" placeholder="Masukan Ukuran">
							</div>
						</div>

						<div class="form-group">
							<label>Warna</label>
							<div>
								<input value="<?=@$datastok->warna?>" type="text" class="form-control" name="warna" placeholder="Masukan Warna">
							</div>
						</div>

						<div class="form-group">
							<label>Sampel</label>
							<div>
								<input value="<?=@$datastok->sampel?>" type="text" class="form-control" name="sampel" placeholder="Masukan Sampel">
							</div>
						</div>


						<div class="form-group">
							<label>Stok</label>
							<div>
								<input value="<?=@$datastok->stok?>" type="number" class="form-control" name="stok" placeholder="Masukan Stok">
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
					<p></p>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var url_1 = window.location.href;
var url_2 = url_1.substring(0, url_1.lastIndexOf('/editdatastok/'));
var fw = $('.form-wajib');
var ulangi = $('[name="ulangi"]');


$(() => {

	ambail_barang_all();

    fw.bootstrapValidator({
        fields: {
        	id_barang: {
                validators: {
                    notEmpty: {
                        message: 'Barang Jangan Kosong..'
                    }
                }
            },
            artikel: {
                validators: {
                    notEmpty: {
                        message: 'Artikel Jangan Kosong..'
                    }
                }
            },
            ukuran: {
                validators: {
                    notEmpty: {
                        message: 'Ukuran Jangan Kosong..'
                    }
                }
            },
            stok: {
                validators: {
                    notEmpty: {
                        message: 'Stok Jangan Kosong..'
                    }
                }
            },
            warna: {
                validators: {
                    notEmpty: {
                        message: 'Warna Jangan Kosong..'
                    }
                }
            },
            sampel: {
                validators: {
                    notEmpty: {
                        message: 'Sampel Jangan Kosong..'
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