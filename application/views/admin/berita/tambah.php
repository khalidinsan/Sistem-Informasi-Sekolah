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
            <?php echo form_open_multipart('admin/insert_pos');?> 
            <div class="col-md-8">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul</label>
                      <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Berita" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Kategori</label>
                        <input type="text" id="kategori" name="label" class="form-control" class="tagsinput"  data-role="tagsinput" placeholder="Masukkan Kategori Berita" required/>
                    </div>
            </div>
            <div align="center" class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar Fitur</label>
                                        <div class="fileupload fileupload-new g" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail gambar" style="width: 200px; height: 125px;">
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/no_image.png'); ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail gambar" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file btn-block btn-flat">
                                                   <span class="fileupload-new"><i class="fa fa-folder-open"></i> Pilih Gambar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                   <input type="file" name="thumbnail" class="default" required/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists btn-block btn-flat" data-dismiss="fileupload"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Isi</label>
                    <textarea class="textarea" name="isi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="pos" class="btn btn-biru btn-flat" value="Simpan" />
                        <a href="<?php echo site_url('admin/berita_pos') ?>" class="btn btn-flat btn-danger">Batal</a>
                    </div>
              <?php echo form_close();?>
            </div>
          </div>

        </section>
      </div>
<?php $this->load->view('admin/load/footer');?>
    </div>
<?php $this->load->view('load/bottom');?>
    <script>
      $(function () {
        $(".textarea").wysihtml5();
      });
        $('#kategori').tagsinput({
          typeahead: { 
    source: [<?php foreach ($kategori as $k){
      echo "'".$k->nama."',";
    }?>]
          }
        });
        $('#kategori').on('itemAdded', function(event) {
            setTimeout(function(){
                $(">input[type=text]",".bootstrap-tagsinput").val("");
            }, 1);
        });
    </script>
