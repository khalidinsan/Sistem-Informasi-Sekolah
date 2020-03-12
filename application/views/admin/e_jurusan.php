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
              <h3 class="box-title">Ubah Jurusan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <?php echo form_open_multipart('admin/update_jurusan');?>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $hasil->id; ?>">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" value="<?php echo $hasil->nama; ?>" class="form-control" required id="exampleInputEmail1" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode</label>
                      <input type="text" name="kode" value="<?php echo $hasil->kode; ?>" class="form-control" required id="exampleInputEmail1" placeholder="Masukkan Kode">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ikon</label>
                      <input type="text" name="icon" value="<?php echo $hasil->icon; ?>" class="form-control" required id="exampleInputEmail1" placeholder="Masukkan Ikon">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Visi</label>
                      <textarea class="form-control" required name="visi" id="exampleInputEmail1" placeholder="Masukkan Visi"><?php echo $hasil->visi; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Misi</label>
                      <textarea class="form-control" required name="misi" id="exampleInputEmail1" placeholder="Masukkan Misi"><?php echo str_replace("|","\n",$hasil->misi); ?></textarea>
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kompetensi</label>
                      <textarea class="form-control" required name="kompetensi" id="exampleInputEmail1" placeholder="Masukkan Kompetensi"><?php echo str_replace("|","\n",$hasil->kompetensi); ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Fasilitas</label>
                      <textarea class="form-control" required name="fasilitas" id="exampleInputEmail1" placeholder="Masukkan Fasilitas"><?php echo str_replace("|","\n",$hasil->fasilitas); ?></textarea>
                    </div>
                      <input type="hidden" name="l" value="<?php echo $hasil->logo; ?>">
                      <input type="hidden" name="i" value="<?php echo $hasil->img; ?>">
                      <input type="hidden" name="s" value="<?php echo $hasil->struktur; ?>">            <div align="center" class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Logo</label>
                                        <div class="fileupload fileupload-new g" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail gambar" style="width: 200px; height: 125px;">
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/jurusan/'.$hasil->logo) ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail gambar" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file btn-block btn-flat">
                                                   <span class="fileupload-new"><i class="fa fa-folder-open"></i> Ganti Gambar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                   <input type="file" name="logo" class="default"/>
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
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/jurusan/'.$hasil->img) ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail gambar" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file btn-block btn-flat">
                                                   <span class="fileupload-new"><i class="fa fa-folder-open"></i> Ganti Gambar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                   <input type="file" name="img" class="default"/>
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
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/jurusan/'.$hasil->struktur) ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail gambar" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file btn-block btn-flat">
                                                   <span class="fileupload-new"><i class="fa fa-folder-open"></i> Ganti Gambar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                   <input type="file" name="struktur" class="default"/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists btn-block btn-flat" data-dismiss="fileupload"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
<div class="col-md-12">
                    <div class="form-group">
      <input type="submit" name="ubah" class="btn btn-biru btn-flat" value="Ubah">
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
