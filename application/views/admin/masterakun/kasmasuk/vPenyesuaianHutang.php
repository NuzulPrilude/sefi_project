	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penyesuaian Hutang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>"><i class="fa fa-bank"></i> Kas Masuk</a></li>
        <li class="active">Penyesuaian Hutang</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-6">
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
          <div class="box">
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_hutang/'.@$hutang_dagang->id )?>"  class="form-horizontal" method="POST">
              <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$hutang_dagang->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$hutang_dagang->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_hutang/'.@$alat_perlengkapan->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$alat_perlengkapan->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$alat_perlengkapan->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>

            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_hutang/'.@$hutang_pajak->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$hutang_pajak->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$hutang_pajak->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_hutang/'.@$sewa_alkes->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$sewa_alkes->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$sewa_alkes->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <script>
      
    </script>