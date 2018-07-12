<?php
session_start();
require_once 'inc/headerAdmin.php';
require_once 'inc/footer.php';
require_once 'inc/functions.php';
require_once 'inc/connect.php';
?>

<div class="container">
	<?php
	if (isset($_POST['submit']))
	{
		(int)$_POST['duree'];
		var_dump($_POST['duree']);
		var_dump($_POST);
		$db = new db();
		$db->ajoutForm($_POST['titre'], $_POST['detail'], (string)$_POST['dateDebut'], (int)$_POST['duree'], (int)$_POST['credit'], $_POST['idPrestataire']);
		echo "<div class='alert alert-success'><strong>La création de la formation a été effectuée!</strong></div>";
	}
	?>
	<div class="jumbotron">
	
	<h3><center>Création d'une nouvelle formation</center></h3><br />
	
	<form action="ajoutForm.php" method="POST">
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input id="identifiant" type="text" class="form-control" name="titre" placeholder="Titre de la formation" required>
    </div><br />
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<input id="passwrd" type="text" class="form-control" name="detail" placeholder="Détail de la formation" required>
    </div><br />
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<input id="confirmPassword" type="date" class="form-control" name="dateDebut"  placeholder="Saisissez la date de début de la formation" required>
    </div>
	<!--<style>
	.error_input{
		border: red solid 1px;
	}
	</style>
	<script>
	
    var password = document.getElementById("passwrd");
	var confirm_password = document.getElementById("confirmPassword");
	
	confirm_password.addEventListener('blur',validatePassword);
	password.addEventListener('blur',validatePassword);
	
	function validatePassword(){
		if(confirm_password.value !== ''){	
		  if(password.value != confirm_password.value) {
			  confirm_password.classList.add('error_input');
			  password.classList.add('error_input');
			  console.log('pas bon');
			//confirm_password.setCustomValidity("Les mots de passe de ne correspondent pas");
		  } else {
			  confirm_password.classList.remove('error_input');
			  password.classList.remove('error_input');
			  console.log('bon');
		  }
		}
	}

	
	</script>-->
	<br />
		
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-btc"></i></span>
		<input id="credit" type="text" class="form-control" name="duree" placeholder="Durée de la formation" required>
	</div><br />
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		<input id="joursFormation" type="text" class="form-control" name="credit" placeholder="Coût de la formation" required>
	</div><br />
	
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
			<select class="form-control" name="idPrestataire" id="typeEmploye">
			<option value="1">Microsoft Training</option>
			<option value="2">Sage Training</option>
			</select>
		</div>
	</div>


	<div>
	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Envoyer">
	</div>
	
	</form>
	</div>
</div>
