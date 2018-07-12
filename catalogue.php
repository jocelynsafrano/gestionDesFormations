<?php
session_start();
require_once 'inc/header.php';
require_once 'inc/footer.php';
require_once 'inc/functions.php';
require_once 'inc/connect.php';
?>
	<div class="container">
	<?php
	$db = new db();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		if(isset($_POST['Choisir']))
		{
			if($_SESSION['credit']>=$_POST['creditChoix'])
			{
				if($db->testChoix($_SESSION['id'], $_POST['choix'])==false)
				{
					$db->choixFormation($_SESSION['id'], $_POST['choix']);
					$db->calculCredit($_SESSION['id'], $_POST['choix']);
					echo "<div class='alert alert-success'><strong>Votre demande de formation a été envoyée!</strong></div>";
				}else{ echo "<div class='alert alert-warning'><strong>Vous avez déjà demandé cette formation!</strong></div>"; }
			}else{ echo "<div class='alert alert-danger'><strong>Crédit insuffisant!</strong></div>"; }
		}
	}
	ob_end_flush();
	?>
      <div class="jumbotron">
        <table class="table">
			<thead>
			  <tr>
				<th>Titre</th>
				<th>Date</th>
				<th>Durée</th>
				<th>Coût</th>
				<th>Prestataire</th>
				<th>Crédit restant : <?php 
					$_SESSION['credit'] = $db->selectCredit($_SESSION['id']);
					echo $_SESSION['credit'];
				?></th>
			  </tr>
			</thead>
			<?php
				$formationEmploye = $db->afficherFormation();
				foreach($formationEmploye as $uneFormation)
				{
					echo "<form action='catalogue.php' name='catalogue' role='form'  method='post' accept-charset='utf-8'>";
					echo "<tr>";
					echo "<td>$uneFormation->titre </td>";
					echo "<td class='date'>$uneFormation->dateDebut</td>";
					echo "<td class='duree'>$uneFormation->duree</td>";
					echo "<td>$uneFormation->credit </td>";
					echo "<td>$uneFormation->nomPrestataire</td>";
					echo "<td><a data-toggle='modal' data-target='#modalDescription' href='modal.php?id=$uneFormation->idFormation' class='btn btn-info btn-md'>Détail</a><td>";
					echo "<td><input type='submit' class='btn btn-primary btn-md' name='Choisir' value='Inscription'></input>";
					echo "</tr>";
					echo "<input type='hidden' name='choix' value='$uneFormation->idFormation'/>";
					echo "<input type='hidden' name='creditChoix' value='$uneFormation->credit'/>";
					echo "</form>";
				}
			?>
		</table>	
      </div>
    </div><!-- /container -->

    <div class="modal fade" id="modalDescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">En-tête</h4>
                </div>
                <div class="modal-body">
                    <div class="form-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $('#editBox').on('hidden.bs.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
	<!--<div class="modal fade" id="detail" role="dialog">
		<div class="modal-dialog">-->
		
		  <!-- Modal content-->
		 <!-- <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Détail</h4>
			</div>
			<div class="modal-body">
			  <p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	</div>-->