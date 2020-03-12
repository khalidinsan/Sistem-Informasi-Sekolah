<?php
  $usr = $this->session->userdata('user');
  $u = $this->m_admin->cUser($usr)->row();
?>
<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1><?php echo $title;?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $title;?></li>
          </ol>
        </section>
        <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $title;?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <?php
            $msg_akun = $this->session->flashdata('akun');
            $msg_pass = $this->session->flashdata('pass');
            ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li<?php if(isset($msg_pass)){
                        }else{
                          echo' class="active"';
                        }; ?>><a href="#akun" data-toggle="tab">Akun</a></li>
                  <li<?php if(isset($msg_pass)){
                          echo' class="active"';
                        }?>><a href="#password" data-toggle="tab">Kata Sandi</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane<?php if(isset($msg_pass)){
                        }else{
                          echo' active';
                        }; ?>" id="akun">
                  <?php echo form_open('admin/update_user');?>
                  <?php echo $msg_akun; ?>
                      <input type="hidden" name="id" class="form-control" value="<?php echo $usr; ?>">
                      <input type="hidden" name="id" class="form-control" value="<?php echo $usr; ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pengguna</label>
                      <input type="text" name="username" class="form-control" value="<?php echo $u->username; ?>" placeholder="Masukkan Nama Pengguna" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $u->nama; ?>" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" class="btn btn-flat btn-biru" value="Simpan Perubahan">
                    </div>
                  <?php echo form_close();?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane <?php if(isset($msg_pass)){
                          echo' active';
                        }?>" id="password">
                  <?php echo form_open('admin/update_password');?>
                  <?php echo $msg_pass; ?>
                      <input type="hidden" name="id" class="form-control" value="<?php echo $usr; ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kata Sandi Lama</label>
                      <input type="password" name="pass_l" class="form-control" placeholder="Masukkan Kata Sandi Lama" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kata Sandi Baru</label>
                      <input type="password" name="pass_b" class="form-control" placeholder="Masukkan Kata Sandi Baru" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Verifikasi Kata Sandi Baru</label>
                      <input type="password" name="vpass_b" class="form-control" placeholder="Ulangi Kata Sandi Baru" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" class="btn btn-flat btn-biru" value="Simpan Perubahan">
                    </div>
                  <?php echo form_close();?>
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
