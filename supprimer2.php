<?php
include 'config.php';

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM fiche_peg WHERE id_inter = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();

	$getid = intval($_GET['id']);
	$delete = $bdd->prepare("DELETE FROM fiche_peg WHERE id_inter = ".$getid."");
	$delete->execute(array($getid));
	header("Location: accueil.php");

}


?>