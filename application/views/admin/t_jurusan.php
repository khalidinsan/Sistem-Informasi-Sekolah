<?php $this->load->view('load/top');?>
<?php $this->load->view('admin/load/nav-side');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Master Data Jurusan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>
        <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Jurusan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <?php echo form_open_multipart('admin/insert_jurusan');?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" class="form-control" required id="exampleInputEmail1" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode</label>
                      <input type="text" name="kode" class="form-control" required id="exampleInputEmail1" placeholder="Masukkan Kode">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ikon</label>
                      <input type="text" name="icon" class="form-control" required id="exampleInputEmail1" placeholder="Masukkan Ikon">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Visi</label>
                      <textarea class="form-control" required name="visi" id="exampleInputEmail1" placeholder="Masukkan Visi"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Misi</label>
                      <textarea class="form-control" required name="misi" id="exampleInputEmail1" placeholder="Masukkan Misi"></textarea>
                      <p class="help-block">Pisahkan dengan tombol [ENTER]</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kompetensi</label>
                      <textarea class="form-control" required name="kompetensi" id="exampleInputEmail1" placeholder="Masukkan Kompetensi"></textarea>
                      <p class="help-block">Pisahkan dengan tombol [ENTER]</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Fasilitas</label>
                      <textarea class="form-control" required name="fasilitas" id="exampleInputEmail1" placeholder="Masukkan Fasilitas"></textarea>
                      <p class="help-block">Pisahkan dengan tombol [ENTER]</p>
                    </div>
            <div align="center" class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Logo</label>
                                        <div class="fileupload fileupload-new g" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail gambar" style="width: 200px; height: 125px;">
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/no_image.png'); ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail gambar" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file btn-block btn-flat">
                                                   <span class="fileupload-new"><i class="fa fa-folder-open"></i> Pilih Gambar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                   <input type="file" name="logo" class="default" required/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists btn-block btn-flat" data-dismiss="fileupload"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
            <div align="center" class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                                        <div class="fileupload fileupload-new g" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail gambar" style="width: 200px; height: 125px;">
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/no_image.png'); ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail gambar" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file btn-block btn-flat">
                                                   <span class="fileupload-new"><i class="fa fa-folder-open"></i> Pilih Gambar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                   <input type="file" name="img" class="default" required/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists btn-block btn-flat" data-dismiss="fileupload"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
            <div align="center" class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Struktur</label>
                                        <div class="fileupload fileupload-new g" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail gambar" style="width: 200px; height: 125px;">
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/no_image.png'); ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail gambar" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file btn-block btn-flat">
                                                   <span class="fileupload-new"><i class="fa fa-folder-open"></i> Pilih Gambar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                   <input type="file" name="struktur" class="default" required/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists btn-block btn-flat" data-dismiss="fileupload"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
<div class="col-md-12">
                    <div class="form-group">
      <input type="submit" name="tambah" class="btn btn-biru btn-flat" value="Tambah">
      <a href="<?php echo site_url('admin/jurusan');?>" class="btn btn-danger btn-flat">Batal</a>
                    </div>
                    </div>
                  <?php form_close();?>
            </div>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
