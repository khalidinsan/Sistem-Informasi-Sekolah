<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Master Data Jurusan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dasbor</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active"><?php echo $title;?></li>
          </ol>
        </section>
        <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Jurusan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
        <a href="<?php echo site_url('admin/tambah_jurusan') ?>" class="btn btn-biru btn-flat"><i class="fa fa-plus"></i> Tambah Jurusan</a>
        <button class="btn btn-default btn-flat" onclick="reload_table()"><i class="fa fa-refresh"></i> Segarkan</button>
        <a href="<?php echo site_url('admin/backup_db/jurusan') ?>" class="btn btn-biru btn-flat"><i class="fa fa-hdd-o"></i> Cadangkan Data</a>
        <a href="<?php echo site_url('admin/export_db/jurusan') ?>" class="btn btn-default btn-flat"><i class="fa fa-file-excel-o"></i> Ekspor CSV</a>
        <br />
        <br /><div class="table-responsive"> 
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th style="width: 10px">Kode</th>
                    <th>Nama</th>
                    <th style="width:100px;">Logo</th>
                    <th style="width:200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
            </div>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
<script type="text/javascript">
 
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/jurusan_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
 
    });
 
});
 
 function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
function delete_person(id){
   swal({
        title: "Hapus Data",
        text: "Apakah anda yakin akan menghapus data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Ya',
        cancelButtonText: "Tidak",
        closeOnConfirm: false
    },
    function(isConfirm){
    if (isConfirm){
        $.ajax({
            url : "<?php echo base_url('admin/jurusan_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                $('#modal_form').modal('hide');
                reload_table();
                swal("Berhasil", "Data Berhasil Dihapus!", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
    });
}

<?php echo $this->session->flashdata('alert'); ?>
</script>
