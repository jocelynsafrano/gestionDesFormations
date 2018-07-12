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
		$db = new db();
		$db->ajoutAdmin($_POST['identifiant'], crypt($_POST['passwrd'], 'rl'), (int)$_POST['typeEmploye'], $_POST['credit'], $_POST['joursFormation']);
		echo "<div class='alert alert-success'><strong>La création du profil a été effectuée!</strong></div>";
	}
	?>
	<div class="jumbotron">
	
	<h3><center>Création d'un nouveau profil</center></h3><br />
	
	<form action="ajoutAdmin.php" method="POST">
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input id="identifiant" type="text" class="form-control" name="identifiant" placeholder="Identifiant" required>
    </div><br />
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<input id="passwrd" type="password" class="form-control" name="passwrd" placeholder="Mot de passe" required>
    </div><br />
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<input id="confirmPassword" type="password" class="form-control" name="confirmPassword"  placeholder="Confirmez le mot de passe" required>
    </div>
	<style>
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

	
	</script>
	<br />
	
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
			<select class="form-control" name="typeEmploye" id="typeEmploye">
			<option value="1">Chef d'equipe</option>
			<option value="2">Employe</option>
			</select>
		</div>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-btc"></i></span>
		<input id="credit" type="text" class="form-control" name="credit" placeholder="Crédit" required>
	</div><br />
	
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		<input id="joursFormation" type="text" class="form-control" name="joursFormation" placeholder="Nombre de jours de formation disponible" required>
	</div><br />
	
	<div>
	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Envoyer">
	</div>
	
	</form>
	</div>
</div>
