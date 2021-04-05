<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Nota</a></li>
		<li>Nota Piutang</li>
		<li class="active">Edit Nota Piutang</li>
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
				<form action="<?=site_url('admin/master/datanota/editdatanota/'.@$pj_nota_piutang_id)?>" method="post" class="form-wajib">
					<div class="box-body">

						<div class="form-group">
							<label>Nama</label>
							<div>
								<input value="<?=@$datanotapiutang->nama?>" type="text" class="form-control" name="nama" placeholder="Masukan Nama">
							</div>
						</div>

						<div class="form-group">
							<label>Tanggal</label>
							<div>
								<input value="<?=@$datanotapiutang->tanggal?>" type="date" class="form-control" name="tanggal">
							</div>
						</div>

						<div class="form-group">
							<label>Nota</label>
							<div>
								<input value="<?=@$datanotapiutang->nota?>" type="text" class="form-control" name="nota" placeholder="Masukan Nota">
							</div>
						</div>

						<div class="form-group">
							<label>Setoran</label>
							<div>
								<input value="<?=@$datanotapiutang->setoran?>" type="number" class="form-control" name="setoran" placeholder="Masukan Setoran">
							</div>
						</div>


						<div class="form-group">
							<label>Returan</label>
							<div>
								<input value="<?=@$datanotapiutang->returan?>" type="number" class="form-control" name="returan" placeholder="Masukan Returan">
							</div>
						</div>

						<div class="form-group">
							<label>Sisa Piutang</label>
							<div>
								<input value="<?=@$datanotapiutang->sisa_piutang?>" type="number" class="form-control" name="sisa_piutang" placeholder="Masukan Sisa Piutang">
							</div>
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<div>
								<textarea name="keterangan" class="form-control" rows="5"><?=$datanotapiutang->keterangan?>
								</textarea>
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
					<p style="color: red;">-</p>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var url_1 = window.location.href;
var url_2 = url_1.substring(0, url_1.lastIndexOf('/editdatanota/'));
var fw = $('.form-wajib');
var ulangi = $('[name="ulangi"]');


$(() => {

    fw.bootstrapValidator({
        fields: {
            nama: {
                validators: {
                    notEmpty: {
                        message: 'Nama Jangan Kosong..'
                    }
                }
            },
            nota: {
                validators: {
                    notEmpty: {
                        message: 'Nota Jangan Kosong..'
                    }
                }
            },
            setoran: {
                validators: {
                    notEmpty: {
                        message: 'Setoran Jangan Kosong..'
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