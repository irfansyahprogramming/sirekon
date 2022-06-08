
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url();?>tools/images/logo_unj.png" type="image/ico" />

    <title>SI-REKON </title>

    <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tools/css/sweetalert2.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css" rel="stylesheet">
	<style>
		.loading-overlay{
			position:fixed;
			z-index:2000;
			background-color:rgba(0,0,0,.4);
			width:100%;
			height:100%;
			text-align:center;
		}
		.loading-box{
			position:relative;
			padding: 20px 15px 0 15px;
			border-radius: 5px;
			display:inline-block;
			margin-top:15%;
			color:#fff;
		}
	</style>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>" class="site_title"><img src="<?php echo base_url();?>tools/images/logo_unj.png" style="width: 30px;height: auto;"> <span>SIRekon - UNJ</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $this->session->userdata('foto');?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php  echo $this->session->userdata('nama');?></h2>
              </div>
            </div>
            <br />
            <?php $this->load->view('blokMenu');?>
          </div>
        </div>
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $this->session->userdata('foto');?>" alt=""><?php echo $this->session->userdata('nama');?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url();?>/home/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              
              </ul>
            </nav>
          </div>
        </div>
        <div class="right_col" role="main" style="background-color: #fff;">
            <?php $this->load->view($konten);?>
        </div>
        <footer>
          <div class="pull-right">
            SIPPM - Power by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>
    <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="<?php echo base_url(); ?>vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="<?php echo base_url(); ?>vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?php echo base_url(); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="<?php echo base_url(); ?>vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.js"></script>
  <script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.pie.js"></script>
  <script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.time.js"></script>
  <script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.stack.js"></script>
  <script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="<?php echo base_url(); ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="<?php echo base_url(); ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="<?php echo base_url(); ?>vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo base_url(); ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="<?php echo base_url(); ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-datetimepicker -->
  <script src="<?php echo base_url(); ?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>vendors/pdfmake/build/vfs_fonts.js"></script>
  <script src="<?php echo base_url();?>tools/js/master_api.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url(); ?>build/js/custom.min.js"></script>
  <script src="<?php echo base_url();?>tools/js/sweetalert2.js"></script>
  <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  <script>
    $('.date').datetimepicker({
      format: 'MM/DD/YYYY'
    });
  </script>
  
    
  </body>
</html>
