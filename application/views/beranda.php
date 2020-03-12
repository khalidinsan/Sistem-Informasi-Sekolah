<?php $this->load->view('load/top') ?>
<body class="skin-blue layout-top-nav">
<?php $this->load->view('load/navbar'); ?>          

<div class="content-wrapper"> <br><br>
<div class="img-parallax">
<div class="ha-bg-parallax text-center block-marginb-none" data-type="background" data-speed="20">

        <div class="ha-parallax-body">
            <img style="margin-bottom:10px;width: 20%" src="<?php echo base_url('assets/images/logo2.png') ?>">
            <div class="ha-content ha-content-head">
            <span>SMK NEGERI 1 SUMEDANG</span>
            </div>

        </div>
        </div>
        </div>
 <!--<img src="<?php echo base_url();?>assets/images/nesas.png" style="
width: 100%;">-->
        <section class="section-primary">
    <div class="container">
            <div class="row text-center pad-botom">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 ">
                    <h1 class="title">SELAMAT DATANG !</h1>
                    <h4>
                       Selamat Datang di Website SMK Negeri 1 Sumedang, tujuan dibuatnya website ini adalah sebagai sarana informasi bagi para siswa dan siswi SMKN 1 Sumedang.<br><br><br>
                    Di website ini anda dapat mengakses fitur diantaranya :
                    </h4>
                </div>

                </div            <div class="row text-center pad-botom">
                    <div align="center" class="col-md-3 col-sm-3 col-xs-6">
                    <img style="width: 40%" src="<?php echo base_url();?>assets/images/berita.png">
                    <h3>BERITA TERBARU</h3>
                </div>
                    <div align="center" class="col-md-3 col-sm-3 col-xs-6">
                    <img style="width: 40%" src="<?php echo base_url();?>assets/images/agenda.png">
                    <h3>AGENDA KEGIATAN</h3>
                </div>
                    <div align="center" class="col-md-3 col-sm-3 col-xs-6">
                    <img style="width: 40%" src="<?php echo base_url();?>assets/images/murid-s.png">
                    <h3>CARI SISWA</h3>
                </div>
                    <div align="center" class="col-md-3 col-sm-3 col-xs-6">
                    <img style="width: 40%" src="<?php echo base_url();?>assets/images/galeri.png">
                    <h3>GALERI FOTO</h3>
                </div>
            </div>
            <!-- ROW END -->
    </div>
    <!-- CONATINER END -->
        </section> 
        <section>
        <div class="container">
    <div class="row">
        <div class="col-md-8">
        <div class="news-title"><h3><i class="fa fa-newspaper-o"></i> BERITA TERBARU</h3></div>
        <div class="panel panel-default">
        <div  class="panel-body">
                 <?php foreach ($b as $r){ ?>        
        <div class="col-md-6">
          <div class="thumbnails">
          <div class="gambar">
            <img class="img-responsive" src="<?php echo base_url($r->thumbnail)?>" alt="">
            </div>
              <div class="caption">
                <h4><?php echo $r->judul; ?></h4>
                <p><?php if (strlen($r->isi) >= 100){
                                echo substr($r->isi,0,100).' ...';
                            }else{
                                    echo $r->isi;
                                    }?></p>
                <p><a href="<?php echo site_url('berita/view/'.$r->id_berita.'') ?>" class="btn btn-biru btn-flat btn-small" role="button">Selengkapnya</a></p>
            </div>
          </div>
        </div>
        <?php } ?>
</div>
<div class="panel-footer">
<a href="<?php echo site_url('berita'); ?>" class="btn btn-block btn-biru btn-flat">Lihat Semua Berita</a></div></div></div>
<div class="col-md-4" >
        <div class="right-arrow news-title"><h3><i class="fa fa-calendar"></i> AGENDA</h3></div>
            <div class="panel panel-default">
                    <div class="panel-body">

                <ul class="event-list">
                <?php foreach ($a as $ag){
                    $date_s = $ag->date_s;
                    $timestamp = strtotime($date_s);
                    $tgl = date("d",$timestamp);
                    $bln = date("m",$timestamp);
                ?>

                    <li>
                        <time datetime="<?php echo $ag->date_s; ?>">
                            <span class="day"><?php echo $tgl ?></span>
                            <span class="month"><?php echo bln_hungkul($bln) ?></span>
                            <span class="year">2014</span>
                            <span class="time">ALL DAY</span>
                        </time>
                        <div class="info">
                            <a href="<?php echo site_url('agenda/detail/'.$ag->id_agenda.'') ?>"><h2 class="title"><?php echo $ag->tema;?></h2></a>
                        </div>
                    </li>
                <?php } ?>
                </ul>
                <a href="<?php echo site_url('agenda') ?>" class="btn btn-biru btn-flat btn-block">Lihat Semua Agenda</a>

                    </div>
            </div>

        </div>
    </div>
    </div>
        </section>
      </div><!-- /.content-wrapper -->
<?php $this->load->view('load/footer') ?>

    <script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 545,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.remove(header,"header-big")
                classie.add(header,"header-small");
            } else {
                if (classie.has(header,"header-small")) {
                    classie.remove(header,"header-small")
                    classie.add(header,"header-big");
                }
            }
        });
    }
    window.onload = init();
    $(function () {

    "use strict";

    var $bgobj = $(".ha-bg-parallax"); // assigning the object

    $(window).on("scroll", function () {

        var yPos = -($(window).scrollTop() / $bgobj.data('speed'));

        // Put together our final background position

        var coords = '100% ' + yPos + 'px';

        // Move the background

        $bgobj.css({ backgroundPosition: coords });

    });
        $('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function(){
        $(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
        $(this).addClass('selected');
        $(this).find('input[type="radio"]').prop("checked", true);
        
    });

});

    </script>
<?php $this->load->view('load/bottom') ?>
