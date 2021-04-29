<?php 
  include("../Models/connexionbase.php");
  session_start();
   if(!isset($_SESSION['username']))
    {
        header('Location:../index.php');
    } 
    $bonus_ferie=0;
    $bonus_supplementaire=0;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Salaire des employer</title>
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
        <a href="#" class="logo"><b>Gestion </b>Employer</a>

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


<?php 
  $valeur=$base->QUERY('SELECT * FROM membre where id="'.$_SESSION['position'].'" ');
  if($donne=$valeur->fetch())
  {
   
          
?>
<form action="info_perso.php" method="POST">
	

  <div class="row">
    <div class="col-md-12">
              <!-- Danger box -->
      <div class="box box-solid box-warning">
        <div class="box-header">
          <h3 class="box-title"><center>Information personnelle de <?php echo $donne['nom']." ".$donne['prenom'] ?></center></h3>
            
        </div>
      <div class="box-body">
        <div class="row">

          <div class="col-md-6">

            <div class="input-group">
              <span class="input-group-addon">Nom : </span> <input type="text" class="form-control" name="nom" value=" <?php echo $donne['nom'] ?> " disabled="true" required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Prénom : </span> <input type="text" class="form-control" name="nom" value=" <?php echo $donne['prenom']; ?> " disabled="true" required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Salaire de base : </span> <input type="text" class="form-control" name="nom" value=" <?php echo $donne['salaire']." Ariary" ?> " disabled="true" required>
              
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Heure de travaille : </span> <input type="text" class="form-control" name="nom" value=" 
                <?php
                echo $donne['heure_travail']." heure/jour";?> " disabled=true required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">CNAPS : </span> <input type="text" class="form-control" name="nom" value=" <?php 

                $cnaps=$donne['salaire']/100;
                echo $cnaps." Ariary" ;

              ?> " disabled="true" required>
            </div>

            <br>
            <div class="input-group">
              <span class="input-group-addon">OSTIE : </span> <input type="text" class="form-control" name="nom" value=" <?php 

                $ostie=$donne['salaire']/100;
                echo $ostie." Ariary" ;

              ?> " disabled="true" required>
            </div>

          </div>

          <div class="col-md-6">
            
            <div class="input-group">
              <span class="input-group-addon">Bonus supplemenataire : </span> <input type="text" class="form-control" name="nom" value=" <?php 

                $bonus_supplementaire=$bonus_supplementaire+(($donne['salaire']*30)/100)*$donne['heure_supplementaire'];
                echo $bonus_supplementaire." Ariary" ;

              ?> " disabled="true" required>
            </div>

            <br>

            <div class="input-group">
              <span class="input-group-addon">Bonus Jour ferié : </span> <input type="text" class="form-control" name="nom" value=" <?php 

                $bonus_ferie=$bonus_ferie+(($donne['salaire']*50)/100)*$donne['jour_ferie'];
                echo $bonus_ferie." Ariary" ;

              ?> " disabled="true" required>
            </div>

            <br>

              <div class="input-group">
                <span class="input-group-addon">Les surplus : </span>

                      <select class="form-control" name="select">
                        <option value="heure_supplementaire">Heure supplementaire</option>
                        <option value="jour_ferie">Jour ferié</option>
                      </select>
                      <input type="text" name="nombre" class="form-control">
              </div>
              <br>
             
              <input type="submit" value="Valider" class="btn btn-success btn-block" name="">
           
          </div>
        </div>
        <br>
          <div class="callout callout-danger">
              <h4>Hey</h4>
              <p><center>Nous sommes heureux de vous dire que la salaire net de <?php echo $donne['nom']." ".$donne['prenom'] ?> est de <?php 

                $salaire_net=$donne['salaire']+$bonus_ferie+$bonus_supplementaire-$ostie-$cnaps;
                echo "<b>".$salaire_net." Ariary"."</b>";

               ?></center></p>
          </div>
          
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  </div>
		
</form>
<?php 
}

	
		if(isset($_POST['select'])&&isset($_POST['nombre']))
		{

      if(($_POST['select'])=="heure_supplementaire")
      {
        $heure_supplementaire=$donne['heure_supplementaire']+$_POST['nombre'];
        $mise_a_jour=$base->exec('UPDATE membre set heure_supplementaire="'.$heure_supplementaire.'" WHERE id="'.$_SESSION['position'].'"');

        header("Location:principale.php?page=liste");
      }
      else
      {
        $jour_ferie=$donne['jour_ferie']+$_POST['nombre']; 
        $mise_a_jour=$base->exec('UPDATE membre set jour_ferie="'.$jour_ferie.'" WHERE id="'.$_SESSION['position'].'"');

        header("Location:principale.php?page=liste");
      }



		 
			
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