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

                      <a href="<?php echo site_url('admin/tambah_pos') ?>" class="btn btn-biru btn-flat"><i class="fa fa-pencil"></i> Buat Pos Baru</a><br><br>
<?php echo $this->session->flashdata('pesan'); ?>
<?php foreach ($berita as $b){?>
          <div class="box">
            <div class="box-body">
<?php $komen = $this->m_berita->gKomentar($b->id_berita)->num_rows(); ?>
    <h3><?php echo $b->judul;?></h3>
    <?php if (strlen($b->isi) >= 100){
                                echo substr($b->isi,0,100).' ...';
                            }else{
                                    echo $b->isi;
                                    }?><br><br>
    <div class="post-des">
    <i class="fa fa-clock-o"></i> <?php echo tgl_indo($b->date);?>
<div class="pull-right"><i class="fa fa-user"></i> <?php echo $b->author;?>&nbsp;&nbsp;&nbsp;<i class="fa fa-comments"></i> <?php echo $komen;?>&nbsp;&nbsp;&nbsp;<i class="fa fa-eye"></i> <?php echo $b->lihat;?>
</div>         
     </div>
            </div>
            <div style="padding:0;" class="box-footer">
            <ul class="nav nav-pills nav-justified post-menu">
              <li ><a target="blank" href="<?php echo site_url('berita/view/'.$b->id_berita.'') ?>"><span class="fa fa-eye"></span>Lihat</a></li>
              <li><a href="<?php echo site_url('admin/ubah_pos/'.$b->id_berita.'') ?>"><span class="fa fa-pencil"></span>Ubah</a></li>
              <li><a href="<?php echo site_url('admin/delete_pos/'.$b->id_berita.'') ?>" onclick="return confirm('Are you sure you want to delete this item?');"><span class="fa fa-trash"></span>Hapus</a></li>
            </ul>
            </div>
          </div>
<?php } ?>


        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
