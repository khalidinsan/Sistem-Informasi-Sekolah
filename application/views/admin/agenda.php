<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1><?php echo $title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $title; ?></li>
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
                      <button class="btn btn-biru btn-flat"  onclick="tambah()"><i class="fa fa-plus"></i> Tambah Agenda</button><br><br>      
                      <div class="table-responsive">   
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tema</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              foreach ($agenda as $a){
               ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $a->tema ?></td>
                  <td><?php echo tgl_indo($a->date_s).' s.d '.tgl_indo($a->date_e); ?></td>
                  <td><?php echo $a->time_s.' s.d '.$a->time_e; ?></td>
                  <td><button href="javascript:void(0)" onclick="lihat(<?php echo "'".$a->id_agenda."'"?>)" class="btn btn-flat btn-success">Detail</button> <button href="javascript:void(0)" onclick="edit(<?php echo "'".$a->id_agenda."'"?>)" class="btn btn-flat btn-biru">Ubah</button> <button href="javascript:void(0)" onclick="hapus(<?php echo "'".$a->id_agenda."'"?>)" class="btn btn-flat btn-danger">Hapus</button></td>
                </tr>
              <?php $i=$i+1; } ?>
            </tbody>
        </table></div>
            </div>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
<script type="text/javascript">
function tambah(){
    $('#form')[0].reset();
    $('#form-album').modal('show');
    $('[name="method"]').val('add'); 
    $('.modal-title').text('Tambah Agenda'); 
}
function edit(id){
    $('#form')[0].reset();
    $.ajax({
        url : "<?php echo base_url('admin/edit_agenda/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id_agenda);
            $('[name="tema"]').val(data.tema);
            $('[name="tempat"]').val(data.tempat);
            $('[name="isi"]').val(data.isi);
            $('[name="waktu"]').val(data.date_s+" "+data.time_s+" - "+data.date_e+" "+data.time_e);
            $('[name="method"]').val('update');
            $('#form-album').modal('show');
            $('.modal-title').text('Ubah Kategori');
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal mendapatkan data");
        }
    });
}
function lihat(id){
    $('#form')[0].reset();
    $.ajax({
        url : "<?php echo base_url('admin/edit_agenda/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#form-lihat').modal('show');
            $('.modal-title').text('Detail Agenda');
            $('.tema').html(data.tema);
            $('.tempat').html(data.tempat);
            $('.waktu').html(data.date_s+" "+data.time_s+" - "+data.date_e+" "+data.time_e);
            $('.isi').html(data.isi);
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal mendapatkan data");
        }
    });
}function hapus(id){
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
            url : "<?php echo base_url('admin/delete_agenda')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                window.location.reload();
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
<div class="modal fade" id="form-album" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo site_url('admin/p_agenda');?>" id="form" method="post" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="" name="method"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tema</label>
                            <div class="col-md-9">
                                <input name="tema" placeholder="Masukkan Tema Kegiatan" class="form-control" required type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Waktu</label>

                            <div class="col-md-9">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" placeholder="Masukkan Waktu Kegiatan" class="form-control" required name="waktu" id="reservationtime">
                    </div></div><!-- /.input group -->
                  </div><!-- /.form group -->
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat</label>
                            <div class="col-md-9">
                                <input name="tempat" placeholder="Masukkan Tempat" class="form-control" required type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Isi</label>
                            <div class="col-md-9">
                                <textarea rows="5" name="isi" placeholder="Masukkan Deskripsi Kegiatan" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="simpan" class="btn btn-biru btn-flat" value="Simpan"/>
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Batal</button>
            </div>

                </form>
        </div>
    </div>
</div>
<!--BATAS-->
<div class="modal fade" id="form-lihat" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
            <div class="col-md-3"><b>Tema</b></div><div class="col-md-9"><p class="tema"></p></div><br><br>
            <div class="col-md-3"><b>Waktu</b></div><div class="col-md-9"><p class="waktu"></p></div><br><br>
            <div class="col-md-3"><b>Tempat</b></div><div class="col-md-9"><p class="tempat"></p></div><br><br>
            <div class="col-md-3"><b>Isi</b></div><div class="col-md-9"><p class="isi"></p></div><br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 $(function () {
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, use24hours: true, format: 'YYYY-MM-DD HH:mm:ss'});
      });
</script>

