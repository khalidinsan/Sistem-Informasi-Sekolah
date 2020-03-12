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
<div class="box-a box-solid">
<div class="box-body">
    <table class="table table-bordered table-striped" id="dataptk" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Jabatan</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Jabatan</th>
          </tr>
      </tfoot>
  </table>
</div>
</div>
</div>
</div>
<?php $this->load->view('load/footer');?>
<?php $this->load->view('load/bottom');?>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    // No. 1
    $('#dataptk tfoot th').each( function () {
        var title = $(this).text();
        var inp   = '<input type="text" class="form-control" placeholder="Cari  '+ title +'" />';
        $(this).html(inp);
    } );
 
    // DataTable
    // No. 2
    var table = $('#dataptk').DataTable({
                    "order": [[ 2, "asc" ]],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "<?php echo base_url('direktori/datatables_ajax_ptk');?>",
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

