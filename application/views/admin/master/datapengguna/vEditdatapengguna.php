<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	<?=@$judul?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=site_url()?>"><i class="fa fa-table"></i> Master</a></li>
		<li>Pengguna</li>
		<li class="active">Edit Pengguna</li>
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
				<form action="<?=site_url('admin/master/pengguna/edit/'.@$user_id)?>" method="post" class="form-wajib">
					<div class="box-body">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<div>
								<input value="<?=@$pengguna->namapengguna?>" type="text" class="form-control" name="namapengguna" placeholder="Masukan Nama Lengkap">
							</div>
						</div>
						<div class="form-group">
							<label>Email</label>
							<div>
								<input value="<?=@$pengguna->email_address?>" type="email" class="form-control" name="email_address" placeholder="Masukan Email">
							</div>
						</div>
						<div class="form-group">
							<label>Password </label>
							<div>
								<input type="password" class="form-control" name="katasandi" placeholder="Masukan Password">
							</div>
						</div>
						<div class="form-group">
							<label>Re Password</label>
							<div>
								<input type="password" class="form-control" name="repassword" placeholder="Masukan Re Password">
							</div>
						</div>
						<div class="form-group">
							<label>Jenis Pengguna</label>
							<div>
								<select name="idjenispengguna" class="form-control">
									<option value="<?=@$pengguna->user_type_id?>"><?=@$pengguna->user_type_name?></option>
									<?php foreach (@$user_type->result() as $hasil) {?>
									<option value="<?=$hasil->user_type_id?>"><?=ucwords($hasil->user_type_name)?></option>
									<?php }?> 
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-lg-4 col-lg-offset-8">
								<div class="row">
									<div class="col-xs-6">
										<button type="reset" name="ulangi" class="btn btn-danger btn-flat btn-block">Reset</button>
									</div>
									<div class="col-xs-6">
										<input type="submit" name="simpan" value="simpan" class="btn btn-danger btn-flat btn-bloc">
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
					<p style="color: red;">Kosong kan Password Jika tidak ada Perubahan</p>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var url_1 = window.location.href;
var url_2 = url_1.substring(0, url_1.lastIndexOf('/tambah'));
var fw = $('.form-wajib');
var ulangi = $('[name="ulangi"]');
var village_id = $('[name="village_id"]');
var villageid = $('[name="village_id"]');


$(() => {

    fw.bootstrapValidator({
        fields: {
            email_address: {
                validators: {
                    emailAddress: {
                        message: 'Email Belum Benar..'
                    },
                    notEmpty: {
                        message: 'Email Jangan Kosong..'
                    },
                    // remote: {
                    //     message: 'Email Sudah digunakan...',
                    //     url: url_2 + '/cekEmail',
                    //     type: "POST",
                    // }
                }
            },
            nama_lengkap: {
                validators: {
                    notEmpty: {
                        message: 'Nama Lengkap Jangan Kosong..'
                    }
                }
            },
            katasandi: {
                validators: {
                    
                    stringLength: {
                        min: 7,
                        message: 'Harus lebih dari 7 karakter..'
                    }
                }
            },
            repassword: {
                validators: {
                    identical: {
                        field: 'katasandi',
                        message: 'Re Password harus sama dengan Password..'
                    },
                    stringLength: {
                        min: 7,
                        message: 'Harus lebih dari 7 karakter..'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'No Handphone Jangan Kosong..'
                    }
                }
            },
            idjenispengguna: {
                validators: {
                    notEmpty: {
                        message: 'Jenis Pengguna Harus dipilih..'
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