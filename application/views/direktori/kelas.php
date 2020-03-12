
<?php
  $z = str_replace("-"," ",$title);
  $g = $this->m_kelas->gKelasK($z)->row();
  $h = $g->jurusan;
  $k = $this->m_jurusan->gJurusan($h)->row();
?>
<?php $this->load->view('load/top'); ?>
<body class="skin-blue layout-top-nav">
<?php $this->load->view('load/navbar-s');?>

<div style="margin-top: 50px;margin-bottom: 20px;">

<div class="page-heading">
<div class="container">
<div class="col-md-12">
<h2>Kelas <?php echo $title; ?></h2>
</div>
<div class="col-md-6">
          <ol class="breadcrumb">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Direktori</a></li>
            <li><a href="#">Direktori Siswa</a></li>
            <li class="active">Kelas <?php echo $title; ?></li>
          </ol>
  </div>
</div>
</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<div class="col-md-6">
<a href="<?php echo site_url('direktori/siswa') ?>" class="btn btn-biru btn-flat btn-block">Kembali</a>
<a href="<?php echo site_url('direktori/export_siswa/'.$title.'') ?>" class="btn btn-biru btn-flat btn-block">Download Excel</a>
</div>
<div class="col-md-6"><table class='table table-hover table-striped table-bordered' >
      <tr><td>Kelas </td><td><b><?php echo $g->kelas ?></b></td></tr>        
      <?php
          $h = $g->jurusan;
          $k = $this->m_jurusan->gJurusan($h)->row();
        ?>
      <tr><td>Paket Keahlian </td><td><b> <?php echo $k->nama ?></b></td></tr>
      </table></div>
      <div class="col-md-12">
  <div class="page-content-a">
    <div class="table-responsive">          
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th width="1%">No.</th>
        <th width="5%">NISN</th>
        <th width="5%">NIS</th>
        <th width="15%">Nama</th>
        <th width="10%">Jenis Kelamin</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if ($b > 1){
        $i = 1;
      foreach ($a as $w){
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $w->nisn ?></td>
        <td><?php echo $w->nis ?></td>
        <td><?php echo $w->nama ?></td>
        <td><?php echo $w->jk ?></td>
      </tr>
    <?php $i++; } 
  }else{
    echo'<tr align="center"><td colspan="5"><h2>Data Tidak Ditemukan</h2></td></tr>';
  }


    ?>
    </tbody>
  </table>
  </div>
  </div>
  </div>
</div></div>

        <div class="row">

</div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
