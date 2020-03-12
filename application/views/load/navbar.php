<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
<header class="header-big">

  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="navbar-top-menu">
  Hubungi Kami : &nbsp;&nbsp;
   <a href="kontak.php"><i class="fa fa-phone"></i> 0261-202056</a>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="kontak.php"><i class="fa fa-envelope"></i> smkn1smd@gmail.com</a>
  </div>
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="SMKN 1 Sumedang">
        </a>
      </div>
            <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li<?php if (($page)=="beranda"){echo' class="active"';} ?>><a href="<?php echo site_url('beranda'); ?>">Beranda</a></li>
          <li<?php if (($page)=="profil"){echo' class="active"';} ?>><a href="<?php echo site_url('profil'); ?>">Profil Sekolah</a></li>
          <li class="dropdown<?php if (($page)=="jurusan"){echo' active';} ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Paket Keahlian <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            <?php 
              $query = $this->m_jurusan->gJurusanA();
              $hasil = $query->result();
              foreach ($hasil as $h){
                if(isset($page2)){
                if(($page2)==$h->kode){
                  $active = ' class="active"';
                }else{
                  $active = '';
                }
              }else{
                  $active = '';
                }
                echo '<li'.$active .'> <a href="'. site_url('jurusan/p/'.$h->kode.'').'"><i class="icon icon-'.$h->icon.'"></i>'.$h->nama.'</a></li>';
                }
            ?>
            </ul>
          </li>
          <li class="dropdown<?php if (($page)=="siswa"||($page)=="ptk"){echo' active';} ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Direktori <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li<?php if (($page)=="siswa"){echo' class="active"';} ?>><a href="<?php echo site_url('direktori/siswa') ?>"><i class="icon icon-murid"></i> Siswa</a></li>
              <li<?php if (($page)=="ptk"){echo' class="active"';} ?>><a href="<?php echo site_url('direktori/ptk') ?>"><i class="icon icon-guru"></i> PTK</a></li>
            </ul>
          </li>
          <li<?php if (($page)=="berita"){echo' class="active"';} ?>><a href="<?php echo site_url('berita') ?>">Berita</a></li>
          <li<?php if (($page)=="galeri"){echo' class="active"';} ?>><a href="<?php echo site_url('galeri') ?>">Galeri</a></li>
          <li<?php if (($page)=="kontak"){echo' class="active"';} ?>><a href="<?php echo site_url('kontak') ?>">Kontak</a></li>
          <li><a href="<?php echo site_url('admin') ?>">Masuk</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</header>      
