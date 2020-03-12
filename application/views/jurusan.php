<?php $this->load->view('load/top'); ?>
<body class="skin-blue layout-top-nav">
<?php $this->load->view('load/navbar-s');?>

<div style="margin-top: 50px;margin-bottom: 20px;">

<div class="page-heading">
<div class="container">
<div class="col-md-12">
<h2><?php if($a == 'gJur'){?><i class="icon icon-<?php echo $c->icon?>"></i>
            <?php
            }
            ?><?php echo $title; ?></h2>
</div>
<div class="col-md-6">
          <ol class="breadcrumb">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Paket Keahlian</a></li>
            <?php if($a == 'gJur'){?>
            <li class="active"><?php echo $title; ?></li>
            <?php
            }
            ?>
          </ol>
  </div>
</div>
</div>
<div class="container">
<?php if($a == 'gJur') {?>
<div class="row">
<div align="center" class="col-md-4">
<img class="thumbnail" style="width: 50%;" src="<?php echo base_url().'assets/images/jurusan/'.$c->logo;?>"/>

<div class="page-title-a"><h3>DAFTAR STAF PENGAJAR</h3></div>
<div align="center" class="page-content-a">
                  <ol class="rectangle-list">
<?php
foreach ($s as $f){
    echo '<li><a href="">'.$f->nama.'</a></li>'; 
}
?>
</ol>
</div>
<div class="page-title-a"><h3>FASILITAS</h3></div>
<div class="page-content-a">
                  <ol class="rectangle-list">
<?php
$myString = $c->fasilitas;
$myArray = explode('|', $myString); 
foreach($myArray as $my_Array){
    echo '<li><a href="">'.$my_Array.'</a></li>';  
}
?>
</ol>
</div>
</div>
<div class="col-md-8"><div class="col-md-12">
<div class="page-title-a"><h3>VISI</h3></div>
<div align="center" class="page-content-a"><?php echo $c->visi;?></div>
<div class="page-title-a"><h3>MISI</h3></div>
<div align="center" class="page-content-a">
                  <ol class="rectangle-list">
<?php
$myString = $c->misi;
$myArray = explode('|', $myString); 
foreach($myArray as $my_Array){
    echo '<li><a href="">'.$my_Array.'</a></li>';  
}
?>
</ol>
</div></div>
<div class="col-md-6"><img class="img-responsive" src="<?php echo base_url().'assets/images/jurusan/'.$c->img;?>"/></div>
<div class="col-md-6"><div class="page-title-a"><h3>KOMPETENSI</h3></div>
<div align="center" class="page-content-a">
                  <ol class="rectangle-list">
<?php
$myString = $c->kompetensi;
$myArray = explode('|', $myString); 
foreach($myArray as $my_Array){
    echo '<li><a href="">'.$my_Array.'</a></li>';  
}
?>
</ol>
</div></div>
</div>
<div class="col-md-12">
<div class="page-title-a"><h3>STRUKTUR ORGANISASI</h3></div>
<div align="center" class="page-content-a">
<img class="img-responsive" src="<?php echo base_url().'assets/images/jurusan/'.$c->struktur;?>"/>
</div>
</div>
</div>
<?php 
}elseif($a == 'gAll'){
foreach (array_chunk($b, 4, true) as $f){
echo'<div class="row">';
foreach ($f as $j){ ?>
<div class="list-jur col-md-3">
<div class="box-a box-solid">
<div class="box-body">
<img class="img-responsive" src="assets/images/jurusan/<?php echo $j->logo ?>"/>
<center><h2><?php echo $j->nama ?></h2></center>
<a href="<?php echo site_url('jurusan/p/'.$j->kode.'') ?>" class="btn btn-flat btn-block btn-biru">Detail</a>
</div>
</div>
</div>
<?php 
}
echo'</div>';
  }
} ?>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
