<?php $this->load->view('load/top'); ?>
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
            <li class="active"><?php echo $title; ?></li>
          </ol>
  </div>
</div>
</div>
<div class="container">
<div class="content">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">	
				 <?php
          $no = $offset;
          foreach ($results as $r){
            $no++; ?>				 
					 <div class="content-grid-info">
					 <div class="content-image">
						 <img src="<?php echo base_url($r->thumbnail)?>" alt=""/>
					</div>
						 <div class="post-info">
						 <h4><a href="<?php echo site_url('berita/view/'.$r->id_berita.'') ?>"><?php echo $r->judul?></a> <?php echo $r->time?> WIB,  <?php echo tgl_indo($r->date);?> / 
            <?php
            $g = $this->m_berita->gKomentar($r->id_berita)->num_rows();
            echo '<b>'.$g.'</b>';
            ?> Komentar</h4>
						 <p><?php if (strlen($r->isi) >= 300){
						 		echo substr($r->isi,0,300).' ...';
						 	}else{
						 			echo $r->isi;
						 			}?>
						 </p>
						 <a class="hvr-icon-forward rm btn btn-biru btn-flat" href="<?php echo site_url('berita/view/'.$r->id_berita.'') ?>"> Selengkapnya</a>
						 </div>
					 </div>
				<?php } ?>
				 </div><?php echo $links; ?>
			  </div>
			  <div class="col-md-4 content-right">
        <?php $this->load->view('berita/side');?>
			  </div>
		  </div>
</div></div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
