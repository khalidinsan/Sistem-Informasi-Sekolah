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
<?php foreach ($mitra as $m) {?>
<div class="col-md-3">
<div class="box-a box-solid">
<div class="box-body g">
<div class="gambar">
<img src="<?php echo base_url('assets/images/mitra/'.$m->logo.'') ?>">
</div>
<center><h3><?php echo $m->nama ?></h3></center>
<!--<a href="" class="btn btn-flat btn-block btn-biru">Detail</a>-->
</div>
</div></div>
<?php } ?>

</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
