    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-fileupload.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/classie.js"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/swipebox/js/jquery.swipebox.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/typeahead.js/script.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/moment.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/sweetalert/dist/sweetalert.min.js');?>"></script>
  <script>
  // ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
  </script>
  </body>
</html>
