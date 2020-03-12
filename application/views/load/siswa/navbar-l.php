<header class="header-small">
<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="SMKN 1 Sumedang">
        </a>
      </div>
      <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

           <li><a href="<?php echo site_url('beranda'); ?>"> Beranda</a></li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-murid"></i>
                  <span class="hidden-xs">Khalid Insan Tauhid</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('assets/images/murid.png') ?>" alt="User Image">
                    <p>Khalid Insan Tauhid
                      <small>XI RPL-2</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
           <li><a href="<?php echo site_url('beranda'); ?>"><i class="fa fa-cogs"></i></a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</header>
<?php $this->load->view('load/bottom');      
