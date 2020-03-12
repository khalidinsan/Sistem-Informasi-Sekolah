<?php $this->load->view('load/top');?>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="<?php echo base_url('assets/images/logo.png') ?>"/>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
<?php echo $this->session->flashdata('pesan'); ?>
<?php echo validation_errors(); ?>
        <?php echo form_open('admin_masuk/verifikasi');?>
          <div class="form-group has-feedback">
            <input name="username" type="text" class="form-control" placeholder="Nama Pengguna">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Kata Sandi">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Ingat Saya
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" name="masuk" class="btn btn-biru btn-block btn-flat" value="Masuk">
            </div><!-- /.col -->
          </div>
        <?php echo form_close();?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $this->load->view('load/bottom');?>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
