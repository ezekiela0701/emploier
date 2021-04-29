<?php 
	session_start();
	require_once("Models/connexionbase.php");
	if(isset($_POST)& !empty($_POST))
	{
		$username=$_POST['user'];
		$password=$_POST['password'];

		$tirer=$base->QUERY('SELECT * from admin where user="'.$username.'"AND password="'.$password.'" ');
		$num_rows = $tirer->fetchColumn();
		if($donne=$tirer->fetch())
		{
			$utilisateur=$donne['utilisateur'];
		}
		
			if($num_rows==1)
			{
				$_SESSION['username']=$username;	
			}
			if($num_rows==2)
			{
				$_SESSION['utilisateur']=$username;
			}
			else
			{
				$fmsg="Identificateur inconnue";
			}
	

	}
	if(isset($_SESSION['username']))
	{
		$smg="connexion etablie";
		
	}
	if(isset($_SESSION['utilisateur']))
	{
		$msg="etablie";
	}

?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <title>Salaire des employers</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="Assets/https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="Assets/http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="Assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="Assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="Assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="Assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="Assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="Assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="Assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
</head>
<body  class="skin-blue">
<div class="containr">
	<?php if(isset($smg)){ header('Location:Controller/principale.php?page=liste');}?>
	
	<header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>Gestion</b> Employer</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a> -->
         
        </nav>
      </header>
      <br>
      <br>
      <br>
      <div class="row">
          <div class="col-lg-offset-3 col-lg-5">
              <?php if(isset($fmsg)){ ?> <div class="alert alert-danger col-lg-5"><?php  echo $fmsg; ?> </div> <?php } ?>

          </div>
      </div>
      
	<section>
		<div class="row">
			<div class="col-lg-offset-3 col-lg-5 col-md-offset-3 col-md-5 col-sm-offset-3 col-sm-3 col-xs-offset-3 col-xs-5">
				<form action="index.php" method="POST">
                <br><br><br><br>
				<div class="panel" style="border-color: #3c8dbc">
					<div class="panel-heading" style="background-color: #3c8dbc">
						<h3 class="panel-title"><center><b>Authentification</b></center></h3>
					</div>
					<div class="panel-body">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" name="user" placeholder="user" class="form-control" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" name="password" placeholder="*********" class="form-control" required>
						</div>
						<br>
							<input type="submit" class="btn btn-primary" value="Connecter">
						</div>
				</div>			
			</form>
			</div>
		</div>
	</section>
</div>
    <!-- jQuery 2.1.3 -->
    <script src="Assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="Assets/http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="Assets/http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="Assets/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="Assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="Assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="Assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="Assets/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="Assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="Assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="Assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="Assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='Assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="Assets/dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="Assets/dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="Assets/dist/js/demo.js" type="text/javascript"></script>
</body>
</html>