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
			<h2 class="searchr">Menampilkan berita dengan label "<?php echo $title ?>"</h2>
				 <?php if (($cb) >= 1){ foreach ($b as $r){ ?>				 
					 <div class="content-grid-info">
					 <div class="content-image">
						 <img src="<?php echo base_url($r->thumbnail)?>" alt=""/>
					</div>
						 <div class="post-info">
						 <h4><a href="<?php echo site_url('berita/view/'.$r->id_berita.'') ?>"><?php echo $r->judul?></a> <?php echo $r->time?> <?php echo tgl_indo($r->date);?> / 27 Comments</h4>
						 <p><?php if (strlen($r->isi) > 300){
						 		echo substr($r->isi,0,300).' ...';
						 	}else{
						 			echo $r->isi;
						 			}?>
						 </p>
						 <a class="hvr-icon-forward rm btn btn-biru btn-flat" href="<?php echo site_url('berita/view/'.$r->id_berita.'') ?>"> Selengkapnya</a>
						 </div>
					 </div>
				<?php }
						}else{
							echo '				              <div class="box box-a box-solid">
							<div class="box-body">
					 <div class="no-comment content-grid-info"><h4>HASIL TIDAK DITEMUKAN</h4>
				<span class="fa-stack fa-lg">
  				<i class="fa fa-search fa-stack-1x"></i>
  				<i class="fa fa-ban fa-stack-2x"></i>
				</span></div></div></div><br><br>';
							} ?>

				 </div><hr class="batas">
			  </div>
			  <div class="col-md-4 content-right">
        <?php $this->load->view('berita/side');?>
			  </div>
		  </div>
</div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
