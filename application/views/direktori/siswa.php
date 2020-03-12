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
            <li><a href="#">Direktori</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
  </div>
</div>
</div>
<div class="container">
<div class="row">
            <div class="col-lg-4 col-md-4 ">
              <!-- small box -->
              <div class="small-box bg-biru">
                <div class="inner">
                  <h3><?php
                  echo $this->m_siswa->gJumlahL();
                  ?></h3>
                  <p>Jumlah Siswa</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer"><br>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-md-4 ">
              <!-- small box -->
              <div class="small-box bg-biru">
                <div class="inner">
                  <h3><?php
                  echo $this->m_siswa->gJumlahP();
                  ?></h3>
                  <p>Jumlah Siswi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer"><br>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-md-4">
              <!-- small box -->
              <div class="small-box bg-biru">
                <div class="inner">
                  <h3><?php
                  echo $this->m_siswa->gJumlahA();
                  ?></h3>
                  <p>Jumlah Peserta Didik</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer"><br>
                </a>
              </div>
            </div><!-- ./col -->
</div>
<div class="panel panel-default">
<div class="panel-body">
<div class="page-content-b right">
                          Tampilkan Berdasarkan : 
                        <div class="btn-group">
                          <a href="<?php echo site_url('direktori/siswa/j');?>" class="btn btn-biru .btn-flat">Jurusan</a>
                          <a href="<?php echo site_url('direktori/siswa/s');?>" class="btn btn-biru .btn-flat">Siswa</a>
                        </div></div>
<?php if ($s=='j') {
foreach ($c as $h){ ?>
        <div class="page-title-a"><h3 style="text-align: left;"><i class="icon icon-<?php echo $h->icon ?>"></i> <?php echo $h->nama?> </h3></div>
        <div class="page-content-a"><div class="table-responsive">          
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="5%">Tingkat</th>
        <th width="5%">Kelas</th>
        <th width="15%">Paket Keahlian</th>
        <th width="5%">Jumlah Siswa</th>
        <th align="center" width="10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
      $jur = $h->kode;
      $q = $this->m_kelas->gKelas($jur)->result();
      $i = 1;
      foreach ($q as $w){
      $v = $this->m_siswa->gJumlah($w->kelas);
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $w->tingkat ?></td>
        <td><?php echo $w->kelas ?></td>
        <td><?php echo $h->nama ?></td>
        <td><?php echo $v ?></td>
        <td align="center"><?php 
        $z = str_replace(" ","-",$w->kelas);
                echo '<a class="btn btn-biru btn-flat" href="'. site_url('direktori/kelas/'.$z.'').'">Detail</a>'; ?></td>
      </tr>
    <?php $i++; } ?>
    </tbody>
  </table>
  </div>
        </div>
<?php }

}elseif ($s=='s') {
?>
    <table class="table table-bordered table-striped" id="datasiswa" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th>NISN</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>NISN</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
          </tr>
      </tfoot>
  </table>
<?php
} ?>

</div></div>

        <div class="row">

</div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?> <script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    // No. 1
    $('#datasiswa tfoot th').each( function () {
        var title = $(this).text();
        var inp   = '<input type="text" class="form-control" placeholder="Cari  '+ title +'" />';
        $(this).html(inp);
    } );
 
    // DataTable
    // No. 2
    var table = $('#datasiswa').DataTable({
                    "order": [[ 2, "asc" ]],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "<?php echo base_url('direktori/datatables_ajax');?>",
                        "type": "POST"
                    }

                });
 
    // Apply the search
    // No. 3
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
  </script>

