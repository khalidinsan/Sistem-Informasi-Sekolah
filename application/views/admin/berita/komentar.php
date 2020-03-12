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
            <div class="box-body"> <div class="col-md-12"><div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#approve" data-toggle="tab">Diterima</a></li>
                  <li><a href="#pending" data-toggle="tab">Ditunda <?php echo '('.$ckomenN.')' ?></a></li>
                </ul>
                <div class="tab-content">
                  <div align="center" class="tab-pane active" id="approve"><table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Berita</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Isi</th>
                    <th>Waktu</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              foreach ($komenY as $k){
              $b = $this->m_berita->gBerita($k->id_berita)->row();
               ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $b->judul ?></td>
                  <td><?php echo $k->nama ?></td>
                  <td><?php echo $k->email ?></td>
                  <td><?php echo $k->isi ?></td>
                  <td><?php echo tgl_indo($k->date).' '.$k->time ?></td>
                  <td><button href="javascript:void(0)" onclick="hapus(<?php echo "'".$k->id_kom."'"?>)" class="btn btn-flat btn-danger">Hapus</button></td>
                </tr>
              <?php $i=$i+1; } ?>
            </tbody>
        </table>
                  </div><!-- /.tab-pane -->
                  <div align="center" class="tab-pane" id="pending"><table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Berita</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Isi</th>
                    <th>Waktu</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              foreach ($komenN as $n){
              $b = $this->m_berita->gBerita($n->id_berita)->row();
               ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $b->judul ?></td>
                  <td><?php echo $n->nama ?></td>
                  <td><?php echo $n->email ?></td>
                  <td><?php echo $n->isi ?></td>
                  <td><?php echo tgl_indo($n->date).' '.$n->time ?></td>
                  <td><a href="<?php echo site_url('admin/accept_comment/'.$n->id_kom.'') ?>" class="btn btn-flat btn-biru">Terima</a> <button href="javascript:void(0)" onclick="hapus(<?php echo "'".$n->id_kom."'"?>)" class="btn btn-flat btn-danger">Hapus</button></td>
                </tr>
              <?php $i=$i+1; } ?>
            </tbody>
        </table></div>
              </div><!-- nav-tabs-custom -->


              </div>
</div>     
            </div>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
<script type="text/javascript">
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
            url : "<?php echo base_url('admin/delete_komentar')?>/"+id,
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
<?php echo $this->session->flashdata('alert');?>
</script>

