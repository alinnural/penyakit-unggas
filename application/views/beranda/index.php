<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Penyakit Unggas</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url()?>asset/be/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url()?>asset/be/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url()?>asset/be/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?php echo base_url()?>asset/be/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="<?php echo base_url()?>asset/be/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url()?>asset/be/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- bootstrap wysihtml5 - text editor -->
        <!--
        <link href="<?php echo base_url()?>asset/be/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/be/js/wysiwyg/lib/css/bootstrap.min.css" />
		-->


		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/be/js/wysiwyg/src/bootstrap-wysihtml5.css" />

		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/be/css/jquery.fileupload-ui.css" />
        <script type='text/javascript' src='<?php echo base_url();?>asset/assets/js/jquery-1.8.2.min.js'></script>
        
        <script src="<?php echo base_url()?>asset/be/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

		<!-- bootstrap datepicker -->
		<link href="<?php echo base_url()?>asset/be/css/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    </head>
    <body class="skin-blue">
        <div class="wrapper row-offcanvas row-offcanvas-left">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
				  <div class="container">
					  <div class="navbar-header" style="float:left;">
						  <div class="navbar-brand">
							  <a style="color:#FFFFFF;" href="<?php echo base_url('beranda')?>"><b>Deteksi Penyakit Unggas</b></a>
						  </div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					  </div><!-- /.container-fluid -->

					  <div style="float: right">
						  <div class="navbar-brand" style="color:#FFFFFF;">
							  <?php if($this->session->userdata('LOGGED_IN') == TRUE){?>
								  <a href="<?php echo base_url('gejala')?>" class="btn btn-default">Pengolahan Data</a>
							  <?php }else{?>
								  <a href="<?php echo base_url('login')?>" class="btn btn-default">Login</a>
							  <?php }?>
						  </div>
					  </div>
					  <div style="clear: both"></div>
				</nav>
			  </header>  

			  <div class="jumbotron" style="background: url('<?php echo base_url()?>asset/img/bg-ayam.png'); margin-bottom: -100px; margin-top: -20px; height:200px;">
			  </div>
			  <!-- Full Width Column -->
			  <div class="content-wrapper">
				<div class="container">
				  <!-- Main content -->
					<div class="col-md-offset-1 col-md-10">
						<?php $this->load->view($view)?>
					</div>
				</div><!-- /.container -->
			  </div><!-- /.content-wrapper -->
			</div><!-- ./wrapper -->
        </div><!-- ./wrapper -->
	<!-- add new calendar event modal -->
	<!-- page script -->
	<!-- jQuery 2.0.2 -->
	 <script type='text/javascript' src='<?php echo base_url();?>asset/assets/js/jquery-1.8.2.min.js'></script>

	<!-- Bootstrap -->
	<script src="<?php echo base_url()?>asset/be/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- DATA TABES SCRIPT -->
	<script src="<?php echo base_url()?>asset/be/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>asset/be/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>asset/be/js/plugins/datatables/dataTables.reload.js" type="text/javascript"></script>
	<!-- bootstrap color picker -->
	<script src="<?php echo base_url()?>asset/be/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url() ?>asset/be/js/jquery.form.js" type="text/javascript" ></script>

	<!-- AdminLTE App -->
	<script src="<?php echo base_url()?>asset/be/js/AdminLTE/app.js" type="text/javascript"></script>

	<!-- BootBox -->
	<script src="<?php echo base_url()?>asset/be/js/bootbox.min.js" type="text/javascript"></script>

	 <!-- Bootstrap WYSIHTML5 -->
	 <!--
	<script src="<?php echo base_url()?>asset/be/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
	-->


	<script src="<?php echo base_url()?>asset/be/js/wysiwyg/lib/js/wysihtml5-0.3.0.js"></script>
	<script src="<?php echo base_url()?>asset/be/js/wysiwyg/src/bootstrap3-wysihtml5.js"></script>


	 <!-- Date Picker -->

	<script type="text/javascript" src="<?php echo base_url()?>asset/be/js/plugins/datepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>asset/be/js/plugins/datepicker/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>

            
           <!-- auto complete--> 
    <script type='text/javascript' src='<?php echo base_url();?>asset/assets/js/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>asset/assets/js/jquery.autocomplete.css' rel='stylesheet' />

    <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
    <link href='<?php echo base_url();?>asset/assets/css/default.css' rel='stylesheet' />

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();
    			$(".textarea").wysihtml5();
				//$('.textarea').wysihtml5();
            });
        </script>
    </body>
</html>
