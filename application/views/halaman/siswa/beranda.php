<?php $this->load->view('load/top');?>
<body class="skin-blue layout-top-nav">
<?php $this->load->view('load/siswa/navbar-l.php') ?>
	<div class="navbar-user-nav">
            <nav class="nav navbar-default" role="navigation">
                <div class="nav navbar-collapse">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                 </button>
                </div>
              <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                <li><a href="default.aspx"><br /><center><span class="glyphicon glyphicon-home" style="font-size:22px"></span></center><br /><span class="font-head">Beranda</span></a></li>
                <li><a href="default.aspx"><br /><center><span class="glyphicon glyphicon-home" style="font-size:22px"></span></center><br /><span class="font-head">Jadwal Pelajaran</span></a></li>
                <li><a href="default.aspx"><br /><center><span class="glyphicon glyphicon-home" style="font-size:22px"></span></center><br /><span class="font-head">Nilai</span></a></li>
                <li><a href="default.aspx"><br /><center><span class="glyphicon glyphicon-home" style="font-size:22px"></span></center><br /><span class="font-head">Tugas</span></a></li>
                	<li class="dropdown  show-on-hover">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><br /><center><span class="glyphicon glyphicon-align-justify" style="font-size:22px"></span></center><br /><span class="font-head">ASAS</span><span class="caret"></span></a>
                      <ul class="dropdown-menu text-right" role="menu">
                        <li><a href="gavsandogh.aspx">bAAKAA</a></li>
                      </ul>
                    </li>  
                </ul>
               </div>  
             </nav>
             </div>
             <div class="content-wrapper">
             <div class="container">
                     <section class="content-header">
          <h1>
            Buttons
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UI</a></li>
            <li class="active">Buttons</li>
          </ol>
        </section>
        <div class="col-md-8">
        <div class="box box-b box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">POST POPULER</h3>
                </div><!-- /.box-header -->
        <div class="box-body">
			
        </div>
        </div>
        </div>
        <div class="col-md-4">
			
        </div>
             </div>
				</div>
<?php
$this->load->view('load/bottom.php')
?>
