<?php
$this->m_berita->uView($b->id_berita);
$this->load->view('load/top'); ?>
<body class="skin-blue layout-top-nav">
<?php $this->load->view('load/navbar-s');?>

<div style="margin-top: 50px;margin-bottom: 20px;">

<div class="page-heading">
<div class="container">
<div class="col-md-12">
<h2><?php echo $title; ?></h2>
</div>
<div class="col-md-6">
          <ol class="breadcrumb">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Berita</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
  </div>
</div>
</div>
<div class="container">
<div style="margin-top: -30px;" class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">
		  <ul class="post-inf">
  <li><i class="fa fa-user"></i> <?php echo $b->author; ?></li>
  <li><i class="fa fa-calendar"></i> <?php echo tgl_indo($b->date); ?></li>
  <li><i class="fa fa-eye"></i> <?php echo $b->lihat; ?></li>
  <li><i class="fa fa-comments"></i> <?php echo $ckomen ?></li>
  <li class="right"><a target="blank" href="https://www.facebook.com/sharer.php?u=<?php echo site_url('berita/view/'.$b->id_berita.'');?>" class="btn btn-biru btn-xs btn-flat"><i class="fa fa-facebook"></i> Facebook</a></li>
  <li class="right"><a target="blank" href="http://twitter.com/share?url=<?php echo site_url('berita/view/'.$b->id_berita.'');?>" class="btn btn-biru btn-xs btn-flat"><i class="fa fa-twitter"></i> Twitter</a></li>
 <li class="right"><a target="blank" href="https://plus.google.com/share?url=<?php echo site_url('berita/view/'.$b->id_berita.'');?>" class="btn btn-biru btn-xs btn-flat"><i class="fa fa-google-plus"></i> Google+</a></li>
</ul>			 
			  <div class="single-grid">
					<img src="<?php echo base_url($b->thumbnail)?>" alt=""/>
					<?php echo $b->isi?>
			  </div>
		  <ul class="post-inf">
		  <li><i class="fa fa-tags"></i>Label : 
<?php foreach ($tag as $t){
	$a = $this->m_berita->gLabel($t)->result();
	foreach ($a as $r){
	echo'<a href="'.site_url('berita/label/'.$r->id_kat.'').'">'.$r->nama.'</a> ';
		}		
	} ?>
  </li>
  <li class="right"><a target="blank" href="https://www.facebook.com/sharer.php?u=<?php echo site_url('berita/view/'.$b->id_berita.'');?>" class="btn btn-biru btn-xs btn-flat"><i class="fa fa-facebook"></i> Facebook</a></li>
  <li class="right"><a target="blank" href="http://twitter.com/share?url=<?php echo site_url('berita/view/'.$b->id_berita.'');?>" class="btn btn-biru btn-xs btn-flat"><i class="fa fa-twitter"></i> Twitter</a></li>
 <li class="right"><a target="blank" href="https://plus.google.com/share?url=<?php echo site_url('berita/view/'.$b->id_berita.'');?>" class="btn btn-biru btn-xs btn-flat"><i class="fa fa-google-plus"></i> Google+</a></li>
  <li class="right">Bagikan : </li>
</ul>	
		  <ul class="post-inf">
<?php 
 if (($cpberita)>=1){
 	echo'<li><b>Sebelumnya</b><br><a href="'.site_url('berita/view/'.$pberita->id_berita).'">'.$pberita->judul.'</a></li>';
 }elseif (($cnberita)>=1){
 	echo'<li class="right"><b>Selanjutnya</b><br><a href="'.site_url('berita/view/'.$nberita->id_berita).'">'.$nberita->judul.'</a></li>';
 }
 ?>
</ul>		
              <div class="box box-a box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-comments"></i> <?php echo $ckomen ?> Komentar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
<?php if (($ckomen) >= 1){ ?>
            <?php foreach ($komen as $k) {?>
            <div id="komen-<?php echo $k->id_kom?>" class="panel panel-white post">
                <div class="post-heading">
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b><?php echo $k->nama?></b></a>
                            <?php echo $k->email?>
                        </div>
                        <h6 class="text-muted time"><?php echo $this->m_berita->time_elapsed_string($k->date.$k->time);?></h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p><?php echo $k->isi?></p>
                </div>
            </div>
			<?php }
			}else{
				echo'
				<div class="no-comment">
				<h4>BELUM ADA KOMENTAR</h4>
				<span class="fa-stack fa-lg">
  				<i class="fa fa-comments fa-stack-1x"></i>
  				<i class="fa fa-ban fa-stack-2x"></i>
				</span>
				</div>';
				} ?>

            </div></div>

              <div class="box box-a box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-comment"></i> Tambah Komentar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php echo $this->session->flashdata('pesan'); ?>
									<?php echo form_open('berita/post_komen'); ?>
									<input type="hidden" name="id_berita" value="<?php echo $b->id_berita?>">
						<div class="col-md-6"><input type="text" name="nama" class="form-control" placeholder="Nama" /></div>
						<div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="E-Mail" /></div>
    						<div class="col-md-12"><div class="widget-area no-padding blank">
								<div class="status-upload">
										<textarea name="isi" class="form-control" placeholder="Masukkan komentar Anda ..." ></textarea>
										<button type="submit" name="komen" class="btn btn-flat btn-biru green"><i class="fa fa-comment"></i> Komentar</button>
									<?php echo form_close();?>
								</div><!-- Status Upload  -->
							</div></div><!-- Widget Area -->
                </div></div>

		  </div>

			  <div class="col-md-4 side-content">
			 
        <?php $this->load->view('berita/side');?>
			  </div>
			  <div class="clearfix"></div>
		  </div>
	  </div>
</div>

</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
