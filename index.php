<?php require_once 'inc/connect.php';?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Connexion</title>
<link rel="stylesheet" href="css/index.css" type="text/css" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">
<!-- CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/navbar.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="css/ie-emulation-modes-warning.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- Contenu -->
    <div id="container">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if(TestIdentifiants())
			{
				TestIdentifiants();
			}else{
				echo "<div id='alert' class='alert alert-danger alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				      <strong>Identifiant ou mot de passe incorrect.</strong>
					  </div>";
			}
		} 
		?>
        <form action="index.php" method="POST">
			<span>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" value="Votre identifiant" required onclick='javascript:this.value = "";'>
            <label for="password">Mot de passe:</label>
            <input type="text" tabindex="-1" id="password" name="password" value="Votre mot de passe" required onclick='javascript:this.value = "";this.type="password"'/>
            <a href="newMotDePasse.php" id="MdepOublie">Mot de passe oublié ?</a>
			<div id="lower">
			<?php
				//$var = "Hello";
				//echo password_hash($var, PASSWORD_DEFAULT);
			?>
                <!--<input type="checkbox" name="stayconnect" ><label class="check" for="checkbox">Rester connecté</label>-->
                <input type="submit" name="Connexion" value="Connexion">
            </div><!--/ lower-->
        </form>
    </div><!--/ container-->
    <!-- Fin Contenu -->
</body>
</html>


