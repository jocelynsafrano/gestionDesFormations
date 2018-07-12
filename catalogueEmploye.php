<?php
session_start();
require_once 'inc/headerAdmin.php';
require_once 'inc/footer.php';
require_once 'inc/functions.php';
require_once 'inc/connect.php';
?>
<div class="container">
<?php
	/*$db = new db();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['Modifier']))
		{
			print_r($_POST['choixEmploye']);
			//header('location:modifEmploye.php');
		}
	}*/
?>
	 <div class="jumbotron">
	        <table class="table">
				<thead>
				  <tr>
					<th>Nom</th>
					<th>Statut hierarchique</th>
					<th>Crédit</th>
					<th>Nombre de jours de formation restant</th>
				  </tr>
				</thead>
				<?php
					$db = new db();
					$lesEmployes = $db->afficherEmploye();
					foreach($lesEmployes as $unEmploye)
					{
						echo "<form action='modifEmploye.php' role='form' method='POST' accept-charset='utf8_decode(data)-8'>";
						echo "<tr>";
						echo "<td>$unEmploye->nom </td>";
						// echo "<td>$unEmploye->typeEmploye</td>";
						if($unEmploye->typeEmploye == '1')
						{
							echo "<td>Chef d'équipe</td>";
						}
						else
						{
							echo "<td>Employe</td>";
						}
						echo "<td>$unEmploye->Credit</td>";
						echo "<td>$unEmploye->joursDeFormation</td>";
						echo "<td><input type='submit' class='btn btn-primary btn-md' name='Modifier' value='Modifier'></input>";
						echo "</tr>";
						echo "<input type='hidden' name='choixEmploye' value='$unEmploye->idEmploye'/>";
						echo "</form>";
					}
				?>
			</table>
	</div>
</div>