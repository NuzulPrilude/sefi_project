	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penyesuaian Aktiva
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>"><i class="fa fa-bank"></i> Kas Masuk</a></li>
        <li class="active">Penyesuaian</li>
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
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$aktiva_setara->id )?>"  class="form-horizontal" method="POST">
              <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$aktiva_setara->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$aktiva_setara->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$kas_dibank->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$kas_dibank->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$kas_dibank->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>

            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$Petty_Cash->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$Petty_Cash->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$Petty_Cash->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$kimia_farma->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$kimia_farma->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$kimia_farma->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$piutang_bpjs->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$piutang_bpjs->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$piutang_bpjs->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$persedian_obat->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$persedian_obat->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$persedian_obat->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$persedian_obat_apotik->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$persedian_obat_apotik->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$persedian_obat_apotik->saldo?>">
              </div>

               <div class="form-group col-lg-4 col-xs-4">
                <label for="Aksi">Aksi</label><div></div>
                  <button class="btn btn-flat btn-success btn-block" type="submit">Sesuaikan</button>
               </div>
               </div>

              </form>
            </div>
            <div class="box-body">
              <form action="<?=site_url('admin/masterakun/kasmasuk/sesuaikan_saldo_aktiva/'.@$persedian_gift->id )?>"  class="form-horizontal" method="POST">

               <div>
              <div class="form-group col-lg-7 col-xs-7">
                <label for="Mobil"><?=@$persedian_gift->nama_akun?></label>
                    <input type="number" name="saldo" class="form-control"  placeholder="Aset dan Kas Setara" value="<?=@$persedian_gift->saldo?>">
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