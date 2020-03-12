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
<div class="col-md-3">
              <div class="box box-a box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">ALBUM</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php foreach ($albuma as $al){?>
				<a href="<?php echo site_url('galeri/index/'.$al->id_al.'') ?>" class="btn btn-biru btn-flat btn-block"><?php echo $al->nama;?></a>
				<?php
                }
                ?>
                </div>
                </div>
</div>
<div class="col-md-9">
              <div class="box box-a box-solid">
               <div class="box-body">
<?php if (empty($album)){?>
<div class="col-md-12"><h4>Semua Foto</h4></div>
<?php foreach ($galeria as $gala){ ?>
<div class="galerii col-lg-4 col-md-4 col-xs-6">
<a rel="gallery-1" href="<?php echo base_url($gala->img) ?>" class="swipebox thumbnail" title="<?php echo $gala->caption ?>">
 <div class="gambar">
	<img class="img-responsive" src="<?php echo base_url($gala->img) ?>" alt="image">
  </div>
</a> </div> 
<?php }
}else if (isset($album)){?>
<ul class="post-inf">
<li style="font-size: 15px;">Menampilkan foto dari album <b><?php echo $a->nama ?></b></li></ul>
<div class="col-md-12"><a href="<?php echo site_url('galeri') ?>" class="btn btn-biru btn-flat"><i class="fa fa-chevron-left"></i> Kembali </a></div><br>
<hr> 
	<?php foreach ($galeri as $gal){ ?>

<div class="galerii col-lg-4 col-md-4 col-xs-6">
<a rel="gallery-1" href="<?php echo base_url($gal->img) ?>" class="swipebox thumbnail" title="<?php echo $gal->caption ?>">
	 <div class="gambar">
  <img class="img-responsive" src="<?php echo base_url($gal->img) ?>" alt="image">
  </div>
</a>     
</div> 	
	<?php
	}
	}?>


      </div></div>
</div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>	
<script type="text/javascript">
	$( document ).ready(function() {
			$( '.swipebox' ).swipebox();

      });
	</script>
