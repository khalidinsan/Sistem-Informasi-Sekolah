<?php
  $usr = $this->session->userdata('user');
  $u = $this->m_admin->cUser($usr)->row();
?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="../../index2.html" class="logo">
          <span class="logo-mini"><img style="width: 70%" src="<?php echo base_url('assets/images/favicon.png'); ?>"></span>
          <span class="logo-lg"><img class="img-responsive-2" src="<?php echo base_url('assets/images/logo.png'); ?>"></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li><a target="blank" href="<?php echo base_url() ?>"><i class="fa fa-globe"></i> Lihat Situs</a></li>
              <li><a href="<?php echo site_url('admin/keluar') ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
        <div class="hidden-xs user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/images/user.png') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $u->nama; ?></p>
              <a href="#"> Administrator</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">NAVIGASI UTAMA</li>
            <li<?php if (($page)=="dasbor"){echo' class="active"';} ?>>
              <a href="<?php echo site_url('admin/index')?>">
                <i class="fa fa-dashboard"></i> <span>Dasbor</span>
              </a>
            </li>
            <li class="treeview<?php if (($page)=="jurusan"||($page)=="siswa"||($page)=="ptk"||($page)=="kelas"){echo' active';} ?>">
              <a href="#">
                <i class="fa fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li<?php if (($page)=="jurusan"){echo' class="active"';} ?>><a href="<?php echo site_url('admin/jurusan') ?>"><i class="fa fa-circle-o"></i> Jurusan</a></li>
                <li<?php if (($page)=="siswa"){echo' class="active"';} ?>><a href="<?php echo site_url('admin/siswa') ?>"><i class="fa fa-circle-o"></i> Siswa</a></li>
                <li<?php if (($page)=="ptk"){echo' class="active"';} ?>><a href="<?php echo site_url('admin/ptk') ?>"><i class="fa fa-circle-o"></i> PTK</a></li>
                <li<?php if (($page)=="kelas"){echo' class="active"';} ?>><a href="<?php echo site_url('admin/kelas') ?>"><i class="fa fa-circle-o"></i> Kelas</a></li>
              </ul>
            </li>
            <li<?php if (($page)=="galeri"){echo' class="active"';} ?>>
              <a href="<?php echo site_url('admin/galeri') ?>">
                <i class="fa fa-picture-o"></i> <span>Galeri</span>
              </a>
            </li>
            <li class="treeview<?php if (($page)=="pos"||($page)=="kategori"||($page)=="komentar"){echo' active';} ?>">
              <a href="#">
                <i class="fa fa fa-newspaper-o"></i> <span>Berita</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li<?php if (($page)=="pos"){echo' class="active"';} ?>><a href="<?php echo site_url('admin/berita_pos')?>"><i class="fa fa-circle-o"></i> Pos</a></li>
                <li<?php if (($page)=="kategori"){echo' class="active"';} ?>><a href="<?php echo site_url('admin/berita_kategori')?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
                <li<?php if (($page)=="komentar"){echo' class="active"';} ?>><a href="<?php echo site_url('admin/berita_komentar')?>"><i class="fa fa-circle-o"></i> Komentar</a></li>
              </ul>
            </li>
            <li<?php if (($page)=="agenda"){echo' class="active"';} ?>>
              <a href="<?php echo site_url('admin/agenda')?>">
                <i class="fa fa-calendar"></i> <span>Agenda</span>
              </a>
            </li>
            <li<?php if (($page)=="pesan"){echo' class="active"';} ?>>
              <a href="<?php echo site_url('admin/pesan')?>">
                <i class="fa fa-envelope"></i> <span>Pesan</span> 
              </a>
            </li>
            <li<?php if (($page)=="pengaturan"){echo' class="active"';} ?>>
              <a href="<?php echo site_url('admin/pengaturan')?>">
                <i class="fa fa-cog"></i> <span>Pengaturan Akun</span> 
              </a>
            </li>
          </ul>
        </section>
      </aside>
