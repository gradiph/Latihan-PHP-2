<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        <!-- search form -->
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="<?php echo site_url('HOME_COL/Home_col'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('MASTER_PEGAWAI_COL/Master_pegawai_col'); ?>">
                    <i class="fa fa-files-o"></i>
                    <span>Master Pegawai</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url(''); ?>">
                    <i class="fa fa-th"></i>
                    <span>Input Pesanan</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('INPUT_PESANAN_COL/Input_pesanan_col') ?>"><i class="fa fa-circle-o"></i> Input Pesanan Satuan</a></li>
                    <li><a href="<?php echo site_url('INPUT_PESANAN_COL/Input_pesanan_campuran_col') ?>"><i class="fa fa-circle-o"></i> Input Pesanan Campuran</a></li>
                </ul>
            </li>            
            <li class="treeview">
               <a href="<?php echo site_url('KELOLA_PESANAN_COL/Kelola_pesanan_col'); ?>">
                    <i class="fa fa-pie-chart"></i>
                    <span>Kelola Pesanan</span>
                </a>
            </li>            
            <li class="treeview">
                <a href="<?php echo site_url(''); ?>">
                    <i class="fa fa-laptop"></i>
                    <span>Laporan</span>
                </a>
                 <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('LAPORAN_COL/Laporan_col') ?>"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
                    <li><a href="<?php echo site_url('LAPORAN_COL/Laporan_bulanan_col') ?>"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('MASTER_JENIS_LAUNDRY_COL/master_jenis_laundry_col'); ?>">
                    <i class="fa fa-th"></i>
                    <span>Master Jenis Laundry</span>
                </a>
            </li>     
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">