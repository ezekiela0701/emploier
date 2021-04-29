<section class="content-header">
    <h1>
    	Ajout de nouveau employé
    </h1>
    <br>
          
</section>

<form action="ajout.php" method="POST">
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Nom : </span> <input type="text" class="form-control" name="nom" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Prénom : </span> <input type="text" class="form-control" name="prenom" required>
			</div>
			<br>
			<input type="submit" value="Ajouter" class="btn btn-info btn-block" name="">

		</div>

		
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">Poste occupé</span> <input type="text" class="form-control" name="poste_occupe" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Salaire de base</span> <input type="number" class="form-control" name="salaire" required>
			</div>
			<br>
			<input type="reset" value="Annuler" class="btn btn-danger btn-block" name="">
		</div>
		
		
	</div>

		
		
		

</form>
<?php 
	include('../Models/connexionbase.php');
	
		if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['poste_occupe'])&&isset($_POST['salaire']))
		{
			$heure_travail=8;
			$jour_ferie=0;
			$heure_supplementaire=0;
			
			$ajout=$base->PREPARE('INSERT INTO membre(nom,prenom,poste,salaire,heure_travail,heure_supplementaire,jour_ferie) VALUES(?,?,?,?,?,?,?) ');
			$ajout->execute(array(
				strtoupper($_POST['nom']),
				$_POST['prenom'],
				$_POST['poste_occupe'],
				$_POST['salaire'],
				$heure_travail,
				$heure_supplementaire,
				$jour_ferie
				

			));
			header('Location:principale.php?page=liste');
			
		}
	
	
	


 ?>
	
