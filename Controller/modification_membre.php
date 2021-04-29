<?php 
  include("../Models/connexionbase.php");
  session_start();
   if(!isset($_SESSION['username']))
    {
        header('Location:../index.php');
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Salaire des employers</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- <link href="../Assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />     -->
    <!-- FontAwesome 4.3.0 -->
    <link href="../Assets/https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
     <link href="../Assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
     
    <link href="../Assets/http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../Assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../Assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../Assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../Assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../Assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../Assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../Assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	 <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>Gestion </b> Employer</a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
         


        </nav>




      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

         
           
            <li class="treeview">
              <a href="principale.php?page=ajout">
                <span class="glyphicon glyphicon-list"></span>
                  Ajout Employé(e)
                
              </a>
              
            </li>

            <li >
              <a href="principale.php?page=liste">

                
                 <span class="glyphicon glyphicon-list"></span>
                Liste des employées
                
              </a>
              
            </li>


            <li class="">
              <a href="deconnexion.php">
              <span class="glyphicon glyphicon-log-out"></span>Deconnexion
              </a>

            </li>
           
          
         
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
         
          <?php
            if(isset($_GET['page']))
            {
              if($_GET['page']=="ajout")
              {
                include("ajout.php");
              }
              if($_GET['page']=="liste")
              {
                include("liste.php");
              }
            }
            
          ?>






          <section class="content-header">
    <h1>
    	Modification employé
    </h1>
    <br>
          
</section>
<?php 
	$valeur=$base->QUERY('SELECT * FROM membre where id="'.$_SESSION['position'].'" ');
	if($donne=$valeur->fetch())
	{
					
?>
<form action="modification_membre.php" method="POST">
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Nom : </span> <input type="text" class="form-control" name="nom" value=" <?php echo $donne['nom'] ?> " required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Prénom : </span> <input type="text" class="form-control" name="prenom" value=" <?php echo $donne['prenom'] ?> " required>
			</div>
      <br>
      <div class="input-group">
        <span class="input-group-addon">Heure supplémentaire : </span> <input type="text" class="form-control" name="heure_supplementaire" value=" <?php echo $donne['heure_supplementaire'] ?> " required>
      </div>
			<br>
			<input type="submit" value="Modifier" class="btn btn-primary btn-block" name="">

		</div>

		
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Poste occupé</span> <input type="text" class="form-control" name="poste_occupe" value=" <?php echo $donne['poste'] ?> " required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Salaire de base</span> <input type="text" class="form-control" name="salaire" value=" <?php echo$donne['salaire']?> " required>
			</div>
      <br>
      <div class="input-group">
        <span class="input-group-addon">Jour ferier : </span> <input type="text" class="form-control" name="jour_ferie" value=" <?php echo $donne['jour_ferie'] ?> " required>
      </div>
			<br>
			<input type="reset" value="Annuler" class="btn btn-danger btn-block" name="">
		</div>
		
		
	</div>

		
		
		

</form>
<?php 
}
	include('../Models/connexionbase.php');
	
		if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['poste_occupe'])&&isset($_POST['salaire'])&&isset($_POST['heure_supplementaire'])&&isset($_POST['jour_ferie']))
		{
			
			$mise_a_jour=$base->exec('UPDATE membre set nom="'.$_POST['nom'].'",prenom="'.$_POST['prenom'].'",poste="'.$_POST['poste_occupe'].'",salaire="'.$_POST['salaire'].'",heure_supplementaire="'.$_POST['heure_supplementaire'].'",jour_ferie="'.$_POST['jour_ferie'].'" WHERE id="'.$_SESSION['position'].'"');

				header("Location:principale.php?page=liste");
			
		}
	
	
	


 ?>








         
        </section>
           
   

             
   
    </div><!-- ./wrapper -->
	



   <!-- jQuery 2.1.3 -->
    <script src="../Assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="../Assets/http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="../Assets/http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../Assets/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../Assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../Assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../Assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../Assets/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../Assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../Assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../Assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../Assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../Assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../Assets/dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../Assets/dist/js/pages/dashboard.js" type="text/javascript"></script>

    <script src="../Assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../Assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../Assets/dist/js/demo.js" type="text/javascript"></script>

</body>
</html>