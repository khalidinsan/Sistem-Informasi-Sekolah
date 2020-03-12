<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1><?php echo $title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $title; ?></a></li>
          </ol>
        </section>
        <section class="content"><div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-biru"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pesan Diterima</span>
                  <span class="info-box-number"><?php echo $pesan ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-biruu"><i class="fa fa-newspaper-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pos Diterbirkan</span>
                  <span class="info-box-number"><?php echo $pos ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="box">
            <div class="box-body" align="center"> 
          <h2>Hai, <?php echo $u->nama; ?></h2>Selamat Datang di Halaman Administrator<br>
          Login Terakhir : Dari <?php echo $u->last_login_f; ?>, Pada <?php echo tgl_indo_timestamp($u->last_login_a); ?> WIB<br><br>
                <a href="<?php echo site_url('admin/index') ?>" class="btn btn-app btn-flat"><i class="fa fa-dashboard"></i> Dasbor</a> 
                <a href="<?php echo site_url('admin/tambah_pos') ?>" class="btn btn-app btn-flat"><i class="fa fa-pencil"></i> Buat Pos</a>
                <a href="<?php echo site_url('admin/pesan') ?>" class="btn btn-app btn-flat"><i class="fa fa-envelope-o"></i> Pesan</a>
                <a href="<?php echo site_url('admin/pengaturan') ?>" class="btn btn-app btn-flat"><i class="fa fa-cog"></i> Pengaturan</a>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
