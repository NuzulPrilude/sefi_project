	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penyesuaian Aktiva
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>"><i class="fa fa-bank"></i> Kas Masuk</a></li>
        <li class="active">Penyesuaian Aktiva Tetap</li>
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
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_aset_tetap/'.@$bangunan->id )?>"  class="form-horizontal" method="POST">
              <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$bangunan->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$bangunan->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_aset_tetap/'.@$peralatan->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$peralatan->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$peralatan->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>

            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_aset_tetap/'.@$inventaris->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$inventaris->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$inventaris->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_aset_tetap/'.@$mobil_motor->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$mobil_motor->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$mobil_motor->saldo?>">
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