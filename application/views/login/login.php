<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>KOPMA</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url()?>asset/be/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url()?>asset/be/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url()?>asset/be/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header"><b>KOPMA</ b>
            </div>
            <?php echo form_open(base_url()."root/verify",array('name'=>'frmlogin','id'=>'frmlogin','method'=>'POST'));?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User Name"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                    	<!--
                        <input type="checkbox" name="remember_me"/> Remember me
                        -->
                        <span id="info" name="info"> </span>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    <!--                    
                    <p><a href="#">I forgot my password</a></p>
                    <a href="register.html" class="text-center">Register a new membership</a>
                    -->
                    <p class="text-center"><font color="#FF0000"><?php print($msg); ?></font></p>
                    
                </div>
              <?php echo form_close(); ?>

            <div class="margin text-center">
            	<span>&copy; <a href="http://www.Kopma.com">Kopma</a>
				<br /><?php print(date('Y')); ?>
                </span>
            	<!--
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
`				-->
            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <!--
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        -->
        <script src="<?php echo base_url()?>asset/be/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url()?>asset/be/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>