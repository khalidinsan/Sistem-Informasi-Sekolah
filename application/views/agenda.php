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
            <li><a href="#">Agenda</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
  </div>
</div>
</div>
<div class="container">
<div class="box box-a box-solid">
<div class="box-body">
<div class="col-md-6">
<table class="table agendaa">
			<?php
			$date_s = $da->date_s;
			$date_e = $da->date_e;
			$dates = strtotime($date_s);
			$datee = strtotime($date_e);
			$tgl_mulai = date("N",$dates);
			$tgl_selesai = date("N",$datee);
			?>
	<tr>
		<td><h4>Tema</h4></td>
		<td class="isi"><p><?php echo $da->tema; ?></p></td>
	</tr>
	<tr>
		<td><h4>Hari</h4></td>
		<td class="isi"><p><?php echo poe($tgl_mulai); ?> s.d. <?php echo poe($tgl_selesai); ?></p></td>
	</tr>
	<tr>
		<td><h4>Tanggal</h4></td>
		<td class="isi"><p><?php echo tgl_indo($da->date_s); ?> s.d. <?php echo tgl_indo($da->date_e); ?></p></td>
	</tr>
	<tr>
		<td><h4>Waktu</h4></td>
		<td class="isi"><p><?php echo $da->time_s; ?> WIB s.d. <?php echo $da->time_e; ?> WIB</p></td>
	</tr>
	<tr>
		<td><h4>Tempat</h4></td>
		<td class="isi"><p><?php echo $da->tempat; ?></p></td>
	</tr>
	<tr>
		<td><h4>Isi</h4></td>
		<td class="isi"><p><?php echo $da->isi; ?></p></td>
	</tr>
</table>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
