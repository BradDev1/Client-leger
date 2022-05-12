<?php
include 'config.php';

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM ordinateur WHERE id_ordinateur = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();

	$getid = intval($_GET['id']);
	$delete = $bdd->prepare("DELETE FROM ordinateur WHERE id_ordinateur = ".$getid."");
	$delete->execute(array($getid));
	header("Location: profil.php?id=".$user['id_client']);

	



}







?>