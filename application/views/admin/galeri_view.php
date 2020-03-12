<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Galeri
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Galeri</a></li>
            <li class="active"><?php echo $title;?></li>
          </ol>
        </section>
        <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Foto</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body"> <ul class="post-inf">
<li style="font-size: 15px;">Menampilkan foto dari album <b><?php echo $album->nama ?></b></li></ul> 
                      <a href="<?php echo site_url('admin/galeri') ?>" class="btn btn-biru btn-flat"><i class="fa fa-chevron-left"></i> Kembali </a>
                      <button class="btn btn-biru btn-flat"  onclick="tambah()"><i class="fa fa-plus"></i> Tambah Foto</button>
                      <br><Br>
      <?php if ($cfoto >= 1){?>
            <div class="galeri">
            <?php foreach ($foto as $f) {
             ?>           
             <div class="col-sm-4">
                <div class="col-sm-12 thumbnail text-center"> 
           <div class="gambar">
                    <img alt="" class="img-responsive" src="<?php echo base_url($f->img) ?>">
          </div>
                        <h4><?php echo $f->caption; ?></h4>
                    <a rel="gallery-1" href="<?php echo base_url($f->img) ?>" title="<?php echo $f->caption; ?>" class="swipebox btn btn-flat btn-success">Lihat</a>
                    <a href="javascript:void(0)" onclick="edit(<?php echo "'".$f->id_gal."'"?>)" class="btn btn-flat btn-biru">Ubah</a>
                    <a href="javascript:void(0)" onclick="hapus(<?php echo "'".$f->id_gal."'"?>)" class="btn btn-flat btn-danger">Hapus</a>
                </div>
              </div>
              <?php } ?>
              </div>
      <?php }else{
          echo'
        <div class="no-comment">
        <h4>BELUM ADA FOTO</h4>
        <span class="fa-stack fa-lg">
          <i class="fa fa-picture-o fa-stack-1x"></i>
          <i class="fa fa-ban fa-stack-2x"></i>
        </span>
        </div>';
        }
        ?>
            </div>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
  $( document ).ready(function() {
      $( '.swipebox' ).swipebox();

      });
function tambah(){
    $('#form')[0].reset();
    $('#form-album').modal('show');
    $('[name="method"]').val('add'); 
    $('.modal-title').text('Tambah Foto'); 
    $('#photo-preview').hide(); 
 
    $('#label-photo').text('Unggah Foto'); 
}
function edit(id){
    $('#form')[0].reset();
    $.ajax({
        url : "<?php echo base_url('admin/edit_foto/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id_gal);
            $('[name="caption"]').val(data.caption);
            $('[name="method"]').val('update');
            $('#form-album').modal('show');
            $('.modal-title').text('Ubah Foto');
            $('#photo-preview').show();         
            if(data.img){
                $('#label-photo').text('Ganti Foto');
                $('#photo-preview div').html('<img src="'+base_url+''+data.img+'" class="img-responsive"><input type="hidden" name="image" value="'+data.img+'"/>');
 
            }else{
                $('#label-photo').text('Unggah Foto');
                $('#photo-preview div').text('(No photo)');
            }
 
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
            url : "<?php echo base_url('admin/delete_foto')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                window.location.reload();
            //window.location = "redirectURL";
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
                <form action="<?php echo site_url('admin/p_foto');?>" enctype="multipart/form-data" id="form" method="post" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <input type="hidden" value="<?php echo $album->id_al ?>" name="id_al"/>
                    <input type="hidden" value="<?php echo $album->nama ?>" name="album"/> 
                    <input type="hidden" value="" name="method"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Caption</label>
                            <div class="col-md-9">
                                <input name="caption" placeholder="Masukkan Caption Foto" class="form-control" required type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                      <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="img" class="form-control" type="file">
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
