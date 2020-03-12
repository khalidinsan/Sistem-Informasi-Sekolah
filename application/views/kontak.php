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
<div class="contact-f col-md-6">
              <div class="box box-a box-solid">
                <div style="padding-bottom: 15px;" class="box-body">
                <div class="col-md-3">
                <img style="width: 100%" src="<?php echo base_url('assets/images/favicon.png') ?>"/>
                </div>
                <div class="col-md-8">
                	<h3><b>SMK NEGERI 1 SUMEDANG</b></h3><h4>TEKNOLOGI DAN REKAYASA<br>TEKNOLOGI INFORMASI DAN KOMUNIKASI</h4>
                </div>
                <div class="col-md-12">
                <div class="contact-info">
                	<div class="a">Email</div>
                	<div class="b">smkn1smd@gmail.com</div>
                	<div class="a">Telepon</div>
                	<div class="b">(0261) 202056 – 203646</div>
                	<div class="a">Fax</div>
                	<div class="b">(0261) 203646</div>
                	<div class="a">ALAMAT</div>
                	<div class="b">Jl. Mayor Abdurakhman No. 209 Kode Pos. 45322 Kec. Sumedang Utara Kab. Sumedang Provinsi Jawa Barat</div>
                </div>
                </div>
                </div></div>
        </div>
        <div class="col-md-6">              <div class="box box-a box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">KRITIK DAN SARAN</h3>
                </div>
                <div class="box-body krisar">
                  Jika anda memiliki Pertanyaan, Pendapat, Kritik atau Saran, Silahkan isi form dibawah dan kami akan menjawab secepatnya.<br><br>
                  <?php echo $this->session->flashdata('pesan'); ?>
                  <?php echo form_open('kontak/post_krisar'); ?>
                  <div class="col-md-6 a">
                  <input type="text" name="nama" class="form-control" placeholder="Nama">
                  </div>
                  <div class="col-md-6 a">
                  <input type="text" name="email" class="form-control" placeholder="E-Mail">
                  </div>
                  <div class="col-md-12 a">
                  <input type="text" name="subjek" class="form-control" placeholder="Subjek">
                  </div>
                  <div class="col-md-12 a">
                  	<textarea rows="7" name="isi" class="form-control" placeholder="Masukkan Pesan Anda ..."></textarea>
                  </div>
                  <div class="col-md-12 a">
                  	<input type="submit" name="kirim" class="btn btn-biru btn-flat btn-block" value="Kirim">
                  </div>
                  <?php echo form_close(); ?>
                	</div></div>
                </div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
