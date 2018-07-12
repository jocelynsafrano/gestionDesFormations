<?php
require 'db.php';

function debug($variable)
{
	echo '<pre>' . print_r($variable, true) . '</pre>';
}
class db
{
	private $db;
	public function __construct()
	{
		$this->db=new PDO('mysql:host=localhost;dbname=formationppe;charset=utf8', 'root', '');
	}
	
public function afficherFormation(){
    $sth=$this->db->prepare("SELECT * from formation join prestataire on formation.idPrestataire=prestataire.idPrestataire ");
	$sth->execute();
	$result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}


public function formationUser($id){
    $sth=$this->db->prepare("SELECT formation.idFormation,employe.idEmploye, titre, date, etat, duree,etat from employe join selectionner on employe.idEmploye = selectionner.idEmploye
					   join formation on formation.idFormation = selectionner.idFormation where employe.idEmploye='$id'");
    $sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function choixFormation($id, $idform){
    $sql="insert into selectionner values (:idEmploye, :idFormation, 'Attente Validation')";
    $stmt = $this->db->prepare($sql);
    $stmt->BindValue(':idEmploye', $id);
	$stmt->BindValue(':idFormation',$idform);
    $stmt->execute();

}

public function updateEtat($id,$idForm){
	$sql="Update selectionner SET etat='Attente Validation' WHERE idEmploye='$id' AND idFormation='$idForm'";
	$stmt = $this->db->prepare($sql);
	$result = $stmt->execute();
	return $result;
}

public function formationEnAtt($id){
    $sth=$this->db->prepare("SELECT formation.idFormation,employe.idEmploye,employe.typeEmploye, titre, date, etat, duree,etat from employe JOIN selectionner on employe.idEmploye = selectionner.idEmploye
					   JOIN formation on formation.idFormation = selectionner.idFormation WHERE employe.idEmploye='$id' AND selectionner.etat='Attente Validation'");
    $sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function formValidees($id){
    $sth=$this->db->prepare("SELECT formation.idFormation,employe.idEmploye, titre, date, etat, duree,etat from employe JOIN selectionner on employe.idEmploye = selectionner.idEmploye
					   JOIN formation on formation.idFormation = selectionner.idFormation WHERE employe.idEmploye='$id' AND selectionner.etat='Formation Validée'");
    $sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function formRefusees($id){
    $sth=$this->db->prepare("SELECT formation.idFormation,employe.idEmploye, titre, date, etat, duree,etat from employe JOIN selectionner on employe.idEmploye = selectionner.idEmploye
					   JOIN formation on formation.idFormation = selectionner.idFormation WHERE employe.idEmploye='$id' AND selectionner.etat='Formation Refusée'");
    $sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function calculCredit($id, $idform){
	$sql="Update employe AS e JOIN selectionner AS s on e.idEmploye = s.idEmploye JOIN formation AS f ON f.idFormation = s.idFormation 
		  SET e.Credit = e.Credit - f.credit WHERE e.idEmploye = :idEmploye AND f.idFormation = :idFormation";
	$stmt = $this->db->prepare($sql);
	$stmt->BindValue(':idEmploye',$id);
	$stmt->BindValue(':idFormation',$idform);
	$result = $stmt->execute();
	return $result;
	header('Location:catalogue.php');
}

public function selectCredit($id){
	$sth=$this->db->prepare("SELECT credit FROM employe where idEmploye = '$id'");
	$sth->execute();
	$result = $sth->fetch();
    return $result['credit'];
}

public function afficherFormationAValider(){
    $sth=$this->db->prepare("SELECT formation.idFormation, selectionner.etat, employe.idEmploye, employe.nom, formation.titre, formation.date, formation.duree, prestataire.nomPrestataire FROM selectionner JOIN employe on employe.idEmploye = selectionner.idEmploye
					   JOIN formation on formation.idFormation = selectionner.idFormation JOIN prestataire on formation.idPrestataire = prestataire.idPrestataire WHERE selectionner.etat = 'Attente Validation'");
	$sth->execute();
	$result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function validerFormation($id, $idform){
    $sql="UPDATE selectionner SET etat='Formation Validée' where idEmploye=:idEmploye and idFormation=:idFormation";
    $stmt = $this->db->prepare($sql);
    $stmt->BindValue(':idFormation',$idform);
    $stmt->BindValue(':idEmploye',$id);
    $result=$stmt->execute();
    return $result;
	header('Location:validationAdmin.php');
}

public function refusFormation($id, $idform){
    $sql="UPDATE selectionner set etat='Formation Refusée' WHERE idFormation=:idform AND idEmploye=:id";
    $stmt = $this->db->prepare($sql);
    $stmt->BindValue(':idform',$idform);
    $stmt->BindValue(':id',$id);
    $result=$stmt->execute();
    return $result;
	header('Location:validationAdmin.php');
}

public function refusCalcul($id, $idform){
	$sql="Update employe AS e JOIN selectionner on e.idEmploye = selectionner.idEmploye JOIN formation ON formation.idFormation = selectionner.idFormation 
		  SET e.Credit = e.Credit + formation.credit WHERE e.idEmploye = :idEmploye AND formation.idFormation = :idFormation";
	$stmt = $this->db->prepare($sql);
	$stmt->BindValue(':idFormation',$idform);
	$stmt->BindValue(':idEmploye', $id);
	$result=$stmt->execute();
	return $result;
}

public function testChoix($id, $idForm){
	$result = false;
	$sth=$this->db->prepare("SELECT idEmploye, idFormation FROM selectionner WHERE idEmploye='$id' AND idFormation='$idForm' AND etat='Attente Validation'");
	$sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_OBJ);
	if($result)
	{
		$result = true;
	}
	return $result;
}

public function refusCalculJrsDeFormation($id, $idform){
    $sql="Update employe AS e JOIN selectionner on e.idEmploye = selectionner.idEmploye JOIN formation ON formation.idFormation = selectionner.idFormation 
		  SET e.joursDeFormation = e.joursDeFormation + formation.duree WHERE e.idEmploye = :idEmploye AND formation.idFormation = :idFormation";
    $stmt = $this->db->prepare($sql);
    $stmt->BindValue(':idFormation',$idform);
    $stmt->BindValue(':idEmploye', $id);
    $result=$stmt->execute();
    return $result;
}

public function afficherEmploye(){
	$sth=$this->db->prepare("Select * from employe");
	$sth->execute();
	$result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function ajoutAdmin($nom, $pass, $typeEmploye, $credit, $joursDeFormation){
	$sql="INSERT INTO employe (`nom`, `mdp`, `typeEmploye`, `Credit`, `joursDeFormation`) VALUES (:nom, :pass, :typeEmploye, :credit, :joursDeFormation)";
	$stmt = $this->db->prepare($sql);
	$stmt->BindValue(':nom', $nom);
	$stmt->BindValue(':pass', $pass);
	$stmt->BindValue(':typeEmploye', $typeEmploye);
	$stmt->BindValue(':credit', $credit);
	$stmt->BindValue(':joursDeFormation', $joursDeFormation);
	$stmt->execute();
}

public function ajoutForm($titre, $detail, $dateDebut, $duree, $credit, $idPrestataire){
	$sql="INSERT INTO formation (`titre`, `detail`, `dateDebut`, `duree`, `credit`, 'idPrestataire') VALUES (:titre, :detail, :dateDebut, :duree, :credit, :idPrestataire)";
	$stmt = $this->db->prepare($sql);
	$stmt->BindValue(':titre', $titre);
	$stmt->BindValue(':detail', $detail);
	$stmt->BindValue(':dateDebut', $dateDebut);
	$stmt->BindValue(':duree', $duree);
	$stmt->BindValue(':credit', $credit);
	$stmt->BindValue(':idPrestataire', $idPrestataire);
	$stmt->execute();
}

public function calculJrsDeFormation($id, $idform){
    $sql="Update employe AS e JOIN selectionner AS s on e.idEmploye = s.idEmploye JOIN formation AS f ON f.idFormation = s.idFormation 
      SET e.joursDeFormation = e.joursDeFormation - f.duree WHERE e.idEmploye = :idEmploye AND f.idFormation = :idFormation";
    $stmt = $this->db->prepare($sql);
    $stmt->BindValue(':idEmploye',$id);
    $stmt->BindValue(':idFormation',$idform);
    $result = $stmt->execute();
    return $result;
    header('Location:catalogue.php');
}

public function modifierEmploye($id, $nom, $typeEmploye, $credit, $joursDeFormation){
	$sql="Update employe SET nom = :nom, typeEmploye = :typeEmploye, Credit = :credit, joursDeFormation = :joursDeFormation WHERE idEmploye = :id";
	$stmt = $this->db->prepare($sql);
	$stmt->BindValue(':nom', $nom);
	$stmt->BindValue(':typeEmploye', $typeEmploye);
	$stmt->BindValue(':Credit', $credit);
	$stmt->BindValue(':joursDeFormation', $joursDeFormation);
	$stmt->BindValue(':id', $id);
	$result = $stmt->execute();
    return $result;
}

public function selectIdEmploye($id){
	$sth=$this->db->prepare("Select idEmploye from employe where idEmploye = '$id'");
	$sth->execute();
	$result= $sth->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

public function newPass($email)
{
	$chrs = 8;

	$list = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	mt_srand((double)microtime()*1000000);

	$newString="";

	while( strlen($newString)< $chrs ) {

		$newString .= $list[mt_rand(0, strlen($list)-1)];

	}

	$sql="Update employe SET mdp = :newString where email = :email";
	$stmt = $this->db->prepare($sql);
	$stmt->BindValue(':newString', $newString);
	$stmt->BindValue(':email', $email);
	$result = $stmt->execute();
	return $result;

}

public function sendPass($email)
{
	$sth = $this->db->prepare("SELECT email FROM employe where email = :email");
	$sth->BindValue(':email', $email);
	$email = $sth->execute();
	return $email;
	$sth = $this->db->prepare("SELECT mdp FROM employe where email = :email");
	$sth->BindValue(':email', $email);
	$mdp = $sth->execute();
	return $mdp;
	mail($email, 'NewMdp', $mdp); 
}

public function selectResp(){
	$sth = $this->db->prepare("SELECT nom FROM employe WHERE typeEmploye=1 AND idEmploye=8");
	$sth->execute();
	$result = $sth->fetch();
	return $result;
}
}
/*public function formParAnnee($id, $form){
		$sth=$this->db->prepare("
}*/
