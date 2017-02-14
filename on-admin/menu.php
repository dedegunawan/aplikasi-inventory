  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
          <?php $page = get_page();?>
        <li class="<?=($page=='home' ? 'active' : '');?>">
          <a href="<?=admin_page('home');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>

        </li>

        <li class="<?=($page=='data-barang' ? 'active' : '');?>">
          <a href="<?=admin_page('data-barang');?>">
            <i class="fa fa-database"></i> <span>Data Barang</span>

          </a>

        </li>

        <li class="<?=($page=='barang-masuk' ? 'active' : '');?>">
          <a href="<?=admin_page('barang-masuk');?>">
            <i class="fa fa-dashboard"></i> <span>Barang Masuk</span>

          </a>

        </li>
        <li class="<?=($page=='barang-keluar' ? 'active' : '');?>">
          <a href="<?=admin_page('barang-keluar');?>">
            <i class="fa fa-dashboard"></i> <span>Barang Keluar</span>

          </a>

      </li>
        <li class="<?=($page=='keluhan' ? 'active' : '');?>">
          <a href="<?=admin_page('keluhan');?>">
            <i class="fa fa-dashboard"></i> <span>Data Keluhan</span>

          </a>

      </li>
        <li class="treeview <?=(in_array($page, array('master-jenis-barang', 'master-ruangan', 'master-satuan')) ? 'active' : '');?>">
          <a href="#">
            <i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="<?=($page=='master-jenis-barang' ? 'active' : '');?>">
          <a href="<?=admin_page('master-jenis-barang');?>">
            <i class="fa fa-dashboard"></i> <span>Master Jenis Barang</span>

          </a>

        </li>

         <li class="<?=($page=='master-ruangan' ? 'active' : '');?>">
          <a href="<?=admin_page('master-ruangan');?>">
            <i class="fa fa-dashboard"></i> <span>Master Ruangan</span>

          </a>

        </li>

         <li class="<?=($page=='master-satuan' ? 'active' : '');?>">
          <a href="<?=admin_page('master-satuan');?>">
            <i class="fa fa-dashboard"></i> <span>Master Satuan</span>

          </a>

        </li>
          </ul>
        </li>


        <li class="<?=($page=='anggota' ? 'active' : '');?>">
          <a href="<?=admin_page('anggota');?>">
            <i class="fa fa-dashboard"></i> <span>Member</span>

          </a>

        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
