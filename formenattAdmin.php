<?php
session_start();
require_once 'inc/headerAdmin.php';
require_once 'inc/footer.php';
require_once 'inc/functions.php';
require_once 'inc/connect.php';
?>
	<div class="container">
      <div class="jumbotron">
        <table class="table">
			<thead>
			  <tr>
			  	<th>Utilisateur</th>
			  	<th>Statut</th>
			  	<th>Responsable</th>
				<th>Titre</th>
				<th>Date</th>
				<th>Durée</th>
				<th>État</th>
			  </tr>
			</thead>
		<?php
			$db = new db();
			$formationEmploye = $db->formationEnAtt($_SESSION['id']);
			foreach($formationEmploye as $uneFormation)
			{
				echo "<tr>";
				echo "<td>";
				echo $_SESSION['nom'];
				echo "</td>";
				//echo "<td>$uneFormation->typeEmploye</td>";
				echo"<td>";
				$res = $db->selectResp();
				echo $res;
				echo "</td>";
				if($_SESSION['type'] == 1)
				{
					echo "<td>Chef d'équipe</td>";
				}
				else
				{
					echo "<td>Employe</td>";
				}
				echo "<td>$uneFormation->titre </td>";
				echo "<td class='date'>$uneFormation->date</td>";
				echo "<td class='duree'>$uneFormation->duree</td>";
				echo "<td>$uneFormation->etat</td>";
				echo "</tr>";
			}
		?>
		</table>
	  </div>
	</div>