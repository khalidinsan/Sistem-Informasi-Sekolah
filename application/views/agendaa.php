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
<div class="box box-a box-solid">
<div class="box-body">
<div class="agenda">
        <div class="table-responsive">
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tema</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    </tr>
                    <?php foreach ($ag as $a){
                    $date_s = $a->date_s;
                    $timestamp = strtotime($date_s);
                    $tgl = date("d",$timestamp);
                    $day = date("N",$timestamp);
                    $bln = date("m",$timestamp);
                    $year = date('Y',$timestamp); ?>
                    <tr>
                        <td class="agenda-date" class="active">
                            <div class="dayofmonth"><?php echo $tgl; ?></div>
                            <div class="dayofweek"><?php echo poe($day); ?></div>
                            <div class="shortdate text-muted"><?php echo bulan($bln); ?>, <?php echo $year; ?></div>
                        </td>
                        <td class="agenda-time">
                            <?php echo $a->time_s.' s.d. '.$a->time_e.'WIB'; ?> 
                        </td>
                        <td class="agenda-events">
                            <div class="agenda-event">
                               <?php echo $a->tema ?>
                            </div>
                        </td>
                        <td><a href="<?php echo site_url('agenda/detail/'.$a->id_agenda.'') ?>" class="btn btn-flat btn-block btn-biru">Detail</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div></div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
