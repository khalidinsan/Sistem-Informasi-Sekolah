
			  <div class="box box-a box-solid">
			  	<div class="box-header with-border">
			  		<h3 class="box-title">CARI BERcceeeeeeeeeeeeeeeeeeeeeeeeeITA</h3>
			  	</div>
			  	<div class="box-body">
                  <div onKeyPress="return checkSubmit(event)" class="input-group">
                  <form name="search" action="<?php site_url('berita/cari') ?>" method="GET">
                    <input type="text" name="keyword" placeholder="Masukkan kata kunci ..." class="form-control">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input name="cari" type="submit" style="display:none"/>
                  </form>
                  </div></div>
			  </div>
              <div class="box box-a box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">POST POPULER</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="media-list">
                    <?php foreach ($hotnews as $hn){ ?>
                    <a href="<?php echo site_url('berita/view/'.$hn->id_berita) ?>">
                        <li class="hot-news media hvr-forward">
                            <div class="media-body">
                            <div class="col-md-5"><img style="width: 100%" src="<?php echo base_url($hn->thumbnail); ?>"/></div>
                                <h4 class="media-heading"><?php echo $hn->judul;?>
                                    <br>
                                </h4>
                            </div>
                        </li></a>
				<?php } ?>
                    </ul>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-a box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">KATEGORI</h3>
                </div><!-- /.box-header -->
                <div class="box-body" >
                <?php foreach ($kategori as $k){ ?>
<a href="" class="btn btn-biru btn-flat kat"><?php echo $k->nama;?></a>
<?php } ?>
                </div></div>
