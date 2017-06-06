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
        
        <!--  Modal change password --> 
		<div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
   <!-- <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Launch Demo Modal</a> -->
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
				<?php echo form_open(base_url()."root/changepassword",array('name'=>'frmhome','id'=>'frmhome','method'=>'POST'));?>
                <div class="modal-body">
                 <div class="form-group">
                        <label>Password Lama </label>
                        <input type="password" name="old_password" class="form-control" placeholder="Password Lama"  required/>
                    </div>
                    <div class="form-group">
                        <label> Password Baru </label>
                        <input type="password" name="password" class="form-control" placeholder="Password Baru"  required/>
                    </div>    
                     <div class="form-group">
                          <label>Re Type Password Baru </label>
                        <input type="password" name="retype_password" class="form-control" placeholder="Re Type Password Baru"  required/>
                    </div>                       
                </div>
                <div class="modal-footer">                                     
					<div class="row">
								<div class="col-md-4 pull-right">
								    <button type="button" class="btn bg-olive btn-block" data-dismiss="modal">Cancel</button>
								</div>
								<div class="col-md-4 pull-right">
								  <button type="submit" class="btn bg-olive btn-block">Change Password</button>  
								</div>								
					</div>
					<!--                    
                    <p><a href="#">I forgot my password</a></p>
                    <a href="register.html" class="text-center">Register a new membership</a>
                    -->                                        
                </div>
				<?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>  
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url()?>root" class="logo" style="font-family:'Calibri',Arial,Verdana;font-weight:bold">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                 Penyakit Unggas
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php print($this->session->userdata('m_user_fullname')) ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url()?>asset/be/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php print($this->session->userdata('m_user_fullname')) ?> - <?php print($this->session->userdata('m_user_role_name')) ?>
                                        <small><?php print($this->session->userdata('m_user_email')) ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                     <div class="pull-left">
                                        <a href="#myModal" data-toggle="modal" class="btn btn-default btn-flat">Change Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url()?>root/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>asset/be/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php print($this->session->userdata('m_user_fullname')) ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>  
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
						<li class="active">
                            <a href="<?php echo base_url()?>gejala">
                                <i class="fa fa-dashboard"></i> <span>Gejala</span>
                            </a>
                        </li>
						<li class="active">
                            <a href="<?php echo base_url()?>penyakit">
                                <i class="fa fa-dashboard"></i> <span>Penyakit</span>
                            </a>
                        </li>
						<li class="active">
                            <a href="<?php echo base_url()?>gejala_penyakit">
                                <i class="fa fa-dashboard"></i> <span>Gejala Penyakit</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
				<?php
					if(!empty($content)){
						echo $content;
					}
                ?>
            </aside><!-- /.right-side -->
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
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url()?>asset/be/js/AdminLTE/demo.js" type="text/javascript"></script>

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
