<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Master Data Kelas
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dasbor</a></li>
            <li><a href="#">Master Kelas</a></li>
            <li class="active"><?php echo $title;?></li>
          </ol>
        </section>
        <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Kelas</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                      <button class="btn btn-biru btn-flat" onclick="add_person()"><i class="fa fa-user-plus"></i> Tambah Kelas</button>
        <button class="btn btn-default btn-flat" onclick="reload_table()"><i class="fa fa-refresh"></i> Segarkan</button>
        <a href="<?php echo site_url('admin/backup_db/kelas') ?>" class="btn btn-biru btn-flat"><i class="fa fa-hdd-o"></i> Cadangkan Data</a>
        <a href="<?php echo site_url('admin/export_db/kelas') ?>" class="btn btn-default btn-flat"><i class="fa fa-file-excel-o"></i> Ekspor CSV</a>
        <br />
        <br /><div class="table-responsive"> 
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Tingkat</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th style="width:125px;">Aksi</th>
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
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('admin/kelas_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
 
});
 
 
 
function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah kelas'); // Set Title to Bootstrap modal title
}
 
function edit_person(id){
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('admin/kelas_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="tingkat"]').val(data.tingkat);
            $('[name="jurusan"]').val(data.jurusan);
            $('[name="kelas"]').val(data.kelas);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah kelas'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal mendapatkan data");
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo base_url('admin/kelas_add')?>";
    } else {
        url = "<?php echo base_url('admin/kelas_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
                swal("Berhasil", "Data Berhasil Disimpan!", "success");
            }
 
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
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
            url : "<?php echo base_url('admin/kelas_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
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
 
 
</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tingkat</label>
                            <div class="col-md-9">
                                <select name="tingkat" class="form-control" required >
                                    <option value="">Pilih Tingkat</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jurusan</label>
                            <div class="col-md-9">
                                <select name="jurusan" class="form-control" required >
                                    <option value="">Pilih Jurusan</option>
                                    <?php foreach ($jurusan as $j) {?>
                                    <option value="<?php echo $j->kode;?>"><?php echo $j->nama;?></option>
                                    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kelas</label>
                            <div class="col-md-9">
                                <input name="kelas" placeholder="Masukkan Kelas" class="form-control" required  type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-biru btn-flat">Simpan</button>
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
