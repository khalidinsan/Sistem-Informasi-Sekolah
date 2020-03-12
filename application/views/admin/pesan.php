<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1><?php echo $title;?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
            <div class="box-body"><div class="table-responsive"> <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Waktu</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              foreach ($pesan as $p){
               ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $p->nama ?></td>
                  <td><?php echo $p->email ?></td>
                  <td><?php echo $p->subject ?></td>
                  <td><?php echo $p->time.", ".tgl_indo($p->date) ?></td>
                  <td><button href="javascript:void(0)" onclick="lihat(<?php echo "'".$p->id."'"?>)" class="btn btn-flat btn-success">Detail</button>  <button href="javascript:void(0)" onclick="hapus(<?php echo "'".$p->id."'"?>)" class="btn btn-flat btn-danger">Hapus</button></td>
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
function lihat(id){
    $.ajax({
        url : "<?php echo base_url('admin/lihat_pesan/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#form-lihat').modal('show');
            $('.modal-title').text('Detail Pesan');
            $('.nama').html(data.nama);
            $('.email').html(data.email);
            $('.subject').html(data.subject);
            $('.date').html(data.date);
            $('.time').html(data.time);
            $('.isi').html(data.isi);
 
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
            url : "<?php echo base_url('admin/delete_pesan')?>/"+id,
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
</script>
<!--BATAS-->
<div class="modal fade" id="form-lihat" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
                  <div class="mailbox-read-info">
                    <h3 class="subject"></h3>
                    <h5>Dari : <span class="nama"></span> [<span class="email"></span>]
                    <span class="mailbox-read-time pull-right"><span class="date"></span> <span class="time"></span></span> </h5> 
                  </div><br>
            <p class="isi"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
