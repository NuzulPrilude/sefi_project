<!-- Sidebar user panel -->
<div class="user-panel">
  <div class="pull-left image">
    <img src="<?=base_url('assets/dist/img/avatar04.png')?>" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p><?=substr($this->session->admin->nama, 0, 17);?></p>
    <a href="#">
      <i class="fa fa-circle text-success"></i> Aktif
    </a>
  </div>
</div>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <!-- <li class="header">MENU ADMIN</li> -->
  <li class="treeview">
    <a href="#">
      <i class="fa fa-home"></i> <span>Halaman Utama</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?=site_url('admin/dashboard')?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-table"></i> <span>Master</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?=site_url('admin/master/kategori')?>"><i class="fa fa-circle-o"></i>Kategori</a></li>
      <li><a href="<?=site_url('admin/master/merk')?>"><i class="fa fa-circle-o"></i>Merk</a></li>
      <li><a href="<?=site_url('admin/master/databarang')?>"><i class="fa fa-circle-o"></i>Data Barang</a></li>
      <li><a href="<?=site_url('admin/master/dataharga')?>"><i class="fa fa-circle-o"></i>Data Harga Barang</a></li>
      <li><a href="<?=site_url('admin/master/datastok')?>"><i class="fa fa-circle-o"></i>Data Stok</a></li>
    </ul>
  </li>
   <li class="treeview">
    <a href="#">
      <i class="fa fa-table"></i> <span>Data Nota</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?=site_url('admin/master/datanota')?>"><i class="fa fa-circle-o"></i>Nota Piutang</a></li>
    </ul>
  </li>
  <!-- <li class="treeview">
    <a href="#">
      <i class="fa fa-print"></i> <span>Laporan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Stok</a></li>
    </ul>
  </li> -->
  <li>
    <a href="<?=site_url('logout')?>">
      <i class="fa fa-sign-out"></i> <span> Keluar</span>
    </a>
  </li>
</ul>