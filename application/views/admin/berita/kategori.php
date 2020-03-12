<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1><?php echo $title;?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Berita</a></li>
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
                      <button class="btn btn-biru btn-flat"  onclick="tambah()"><i class="fa fa-plus"></i> Tambah Kategori</button><br><br>        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              foreach ($kategori as $k){
               ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $k->nama ?></td>
                  <td><button href="javascript:void(0)" onclick="edit(<?php echo "'".$k->id_kat."'"?>)" class="btn btn-flat btn-biru">Ubah</button> <button href="javascript:void(0)" onclick="hapus(<?php echo "'".$k->id_kat."'"?>)" class="btn btn-flat btn-danger">Hapus</button></td>
                </tr>
              <?php $i=$i+1; } ?>
            </tbody>
        </table>
            </div>
            <div class="box-footer">
              Footer
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
    $('.modal-title').text('Tambah Kategori'); 
}
function edit(id){
    $('#form')[0].reset();
    $.ajax({
        url : "<?php echo base_url('admin/edit_kategori/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id_kat);
            $('[name="nama"]').val(data.nama);
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
function hapus(id){
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
            url : "<?php echo base_url('admin/delete_kategori')?>/"+id,
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
                <form action="<?php echo site_url('admin/p_kategori');?>" id="form" method="post" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="" name="method"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama" placeholder="Masukkan Nama Kategori" class="form-control" required type="text">
                                <span class="help-block"></span>
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
</div><!-- /.modal -->

