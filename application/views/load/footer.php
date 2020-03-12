<footer class="q">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div style="width: 100%;margin-bottom: 10px;" > <img src="<?php echo base_url() ?>assets/images/logo.png"/></div>
        <p><i class="fa fa-map-marker"></i> Jln. Mayor Abdurakhman No.209 Sumedang</p>
        <p><i class="fa fa-phone"></i> 0261-202056 </p>
        <p><i class="fa fa-envelope"></i> smkn1smd@gmail.com</p>
        
      </div>
      <div class="col-md-5 col-sm-6 paddingtop-bottom mitra">
        <h6 class="heading7">MITRA KERJA</h6>
        <?php $mitra = $this->m_admin->gMitra()->result(); ?>
        <div class="col-md-12">
        <?php foreach ($mitra as $m){ ?>
        <i class="icon ikon-<?php echo $m->ikon ?>"></i>
        <?php } ?>
        <div class="pull-right"><a href="<?php echo site_url('mitra') ?>" class="btn btn-flat btn-biru btn-xs"> Lihat Semua</a></div>
        </div>
      </div>
      <!--<div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">TAUNTAN</h6>
        <ul class="footer-ul">
          <li><a class="hvr-forward" href="<?php echo site_url('profil'); ?>"> Profil Sekolah</a></li>
          <li><a class="hvr-forward" href="<?php echo site_url('jurusan'); ?>"> Paket Keahlian</a></li>
          <li><a class="hvr-forward" class="hvr-forward" href="<?php echo site_url('berita'); ?>"> Berita</a></li>
          <li><a class="hvr-forward" href="<?php echo site_url('galeri'); ?>"> Galeri</a></li>
          <li><a class="hvr-forward" class="hvr-forward" href="<?php echo site_url('kontak'); ?>"> Kontak</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">BERITA POPULER</h6>
        <div class="post">
        <?php $hotnews = $this->m_berita->gHotNewsB()->result();
        foreach ($hotnews as $h){ ?>
          <p><?php echo '<a href="'.site_url('berita/view/'.$h->id_berita).'">'.$h->judul.'</a>'; ?><span><?php echo tgl_indo($h->date); ?></span></p>
        <?php } ?>
        </div>
      </div>-->
      <div class="col-md-3 col-sm-6 paddingtop-bottom footer-social">
        <h6 class="heading7">SOSIAL MEDIA</h6>
      <div class="hvr-forward footer-social-c">
            <span class="fa-stack fa-lg">
  <i style="color:#0683c9" class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
        </span> <a href="https://www.facebook.com/SMKN-1-Sumedang-285547298217202">SMKN 1 Sumedang</a>
      </div>
      <div class="hvr-forward footer-social-c">
            <span class="fa-stack fa-lg">
  <i style="color:#0683c9" class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
        </span> <a href="https://www.facebook.com/facebook">@SMKN1Sumedang</a>
      </div><br>
      <div class="footer-social-c hvr-forward ">
            <span class="fa-stack fa-lg">
  <i style="color:#0683c9" class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
        </span> <a href="https://www.facebook.com/facebook">@SMKN1Sumedang</a>
      </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-12">
      <p>&copy; 2018 - SMKN 1 Sumedang All Right Reserved.</a></p>
    </div>
  </div>
</div>
