<?php
include 'config.php';

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$reqvec = $bdd->prepare("SELECT * FROM fiche_peg WHERE id_inter = ".$getid."");
	$reqvec->execute(array($getid));
	$vecinfo = $reqvec->fetch();
}


ob_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style type="text/css">
	table{width: 100%;}
</style>

<page backtop="1mm" backleft="5mm" backright="5mm" backbottom="1mm">
	<table>
		<tr>
			<td style="width: 75%;">
				<img style=" width: 115px;max-width: 100%;height: auto;" src="IMG/logo/logo.png" title="Accueil" alt="Retour Accueil ">
				
			</td>

			<td style="width: 30%;">
				<strong style="font-size: 20px; text-align: right;"> Fiche d'intervention</strong><br>
				<strong style="font-weight: normal; text-align: right; font-size: 16px;"> Date PEC : <?php echo $vecinfo['datee']?></strong><br>
				<strong style="font-weight: normal; text-align: right; font-size: 16px;"> Date Remise : <?php echo date("d-m-Y")?></strong><br>
				<strong style="font-weight: normal; text-align: right; font-size: 16px;"> Status : <?php echo $vecinfo['status']?></strong>

			</td>
		</tr>
	</table><br>
	

	<table style="border: 1px solid black; font-size: 18px;
	table-layout: fixed;"  >
	<tr style="text-align: left; background-color: #D4D2D2;">
		<th style="width: 400px; " scope="row">Matériel :</th>
	</tr>
	<tr style="text-align: left;">
		<td scope="row">Type/Marque : <?php echo $vecinfo['type']; ?> <?php echo $vecinfo['marque']; ?></td>
	</tr>
	<tr style="text-align: left;">
		<td scope="row">Mdp : <?php echo $vecinfo['mdp']; ?></td>
	</tr>
	<tr style="text-align: left;">
		<td style="word-break: break-all;" scope="row">Symptôme : <?php echo $vecinfo['symptome']; ?></td>
	</tr>
	<tr style="text-align: left;">
		<td scope="row" style="overflow-y: scroll; text-decoration: underline;">Récupération de données : <?php echo $vecinfo['recup']; ?></td>
	</tr>
</table>

<table style="font-size: 18px; margin-left: 420px; margin-top: -120px; " >
	<tr style="text-align: Left; ">
		<th scope="row">Contact :</th>
	</tr>
	<tr style="text-align: left; width: 20%;">
		<td scope="row"><?php echo $vecinfo['nom']; ?> <?php echo $vecinfo['prenom']; ?></td>
	</tr>
	<tr style="text-align: left;">
		<td scope="row"><?php echo $vecinfo['telephone']; ?></td>
	</tr>
</table><br><br><br><br>

<table style="font-size: 12px; width: 155px;">
	<tr style="text-align: left;">
		<td scope="row bg-danger">- J'accepte de donner mon accord par téléphone si je ne peux pas me déplacer en magasin</td>
	</tr>
	<tr style="text-align: left;">
		<td scope="row">- Je donne volontairement plein accès à mon appareil pour procéder au diagnostic</td>
	</tr>
	<tr style="text-align: left;">
		<td scope="row">- Je donne mon accord pour faire tout ce qui est nécessaire à la réparation, conformément au devis établi</td>
	</tr>
	<tr style="text-align: left;">
		<td scope="row">- J'ai une semaine pour le récupérer et j'accepte de payer les frais de stockage de 15€ par semaine si je tarde à venir</td>
	</tr>
	<tr style="text-align: left; width: 200%;">
		<td scope="row">- Je reconnais avoir laissé le matériel cité et ses accessoires pour un diagnostic et j'accepte de payer les frais indiqués</td>
	</tr>
</table>

<table style="border: 1px solid black; font-size: 18px; width: 136.1%;">
	<tr style="text-align: center; background-color: #D4D2D2; ">
		<th style="width:25%" scope="row">Stockage :</th>
		<th style="width:25%" scope="row">Ram :</th>
		<th style="width:25%" scope="row">Système :</th>
	</tr>
	<tr style="text-align: center; width: 20%;">
		<td scope="row">Type : <?php echo $vecinfo['stockage']; ?></td> 
		<td scope="row">Nombre de barrette : <?php echo $vecinfo['nbr_ram']; ?></td> 
		<td scope="row"><?php echo $vecinfo['system'];?>  <?php echo $vecinfo['system2']; ?></td> 

	</tr>
	<tr style="text-align: center;">
		<td scope="row">Capacité : <?php echo $vecinfo['taille']; ?></td>
		<td scope="row">Capacité de Go : <?php echo $vecinfo['nbr_go']; ?></td>
		<td><?php echo $vecinfo['system3'];?> <?php echo $vecinfo['system4'];?> <?php echo $vecinfo['system5'];?></td>

	</tr>
	<?php  if(!empty($vecinfo['stockage2'])) { ?>
		<tr style="text-align: center; width: 20%;">
			<td scope="row">Type : <?php echo $vecinfo['stockage2']; ?></td>
		</tr>
		<tr style="text-align: center;">
			<td scope="row">Capacité : <?php echo $vecinfo['taille2']; ?></td>
		</tr>
	<?php } ?>
	<?php  if(!empty($vecinfo['problemes'])) { ?>
		<tr style="text-align: center;">
			<td scope="row">Problèmes: <?php echo $vecinfo['problemes']; ?></td>
		</tr>
	<?php }
	?>
</table><br>

<table style="border: 1px solid black; font-size: 17px; width: 108.2%; ">
	<tr style="text-align: left; width: 50%;">
		<th style="width:190%;" scope="row">Licences windows :<div style="font-weight: normal;"><?php echo $vecinfo['licence']; ?></div></th>
	</tr>
</table><br>
<div style="border: 1px solid black; font-size: 17px; width:91.6%; ">
	<strong>Matériel : <div style="font-weight: normal;"><?php echo $vecinfo['materiel']; ?></div></strong>
</div><br>
<div style="border: 1px solid black; font-size: 17px; width:94%; ">
	<strong>Notes : <div style="font-weight: normal;"><?php echo $vecinfo['notes']; ?></div></strong>
</div><br>

<table style="border: 1px solid black; font-size: 18px; margin-top: 20px;">
	<thead>
		<tr style="text-align: left; background-color: #D4D2D2;">
			<th style="width: 286px;" scope="col">Proposition</th>
			<th scope="col"></th>
			<th scope="col">Prix</th>
			<th  style="width: 20px;background-color: transparent;" scope="col"></th>
			<th style="width: 20px;background-color: transparent;" scope="col">|</th>
			<th style="width: 286px;" scope="col">Intervention</th>
			<th scope="col"></th>
			<th scope="col">Prix</th>
			<th style=" background-color: transparent;" scope="col"></th>
		</tr>
	</thead>
	<tbody style=" width: 250px;">
		<?php  if(!empty($vecinfo['intervention'])) { ?>
			<tr style="text-align: left;">
				<td scope="row">Frais de PEC</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row">Frais de PEC</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix_inter']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['intervention2'])) { ?>
			<tr style="text-align: left;">
				<td scope="row">Révision Complète</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix2']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row">Révision Complète</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix_inter2']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['intervention3'])) { ?>
			<tr style="text-align: left;">
				<td scope="row">Révision Partielle</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix3']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row">Révision Partielle</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix_inter3']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['intervention4'])) { ?>
			<tr style="text-align: left;">
				<td scope="row">Récupération de données</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix4']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row">Récupération de données</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix_inter4']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['intervention5'])) { ?>
			<tr style="text-align: left;">
				<td scope="row">Nettoyage Physique</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix5']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row">Nettoyage Physique</td>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['prix_inter5']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['otherpropo'])) { ?>
			<tr style="text-align: left;">
				<td scope="row"><?php echo $vecinfo['otherpropo']; ?></td>
				<td scope="row"></td>
				<td style="text-align: right;"><?php echo $vecinfo['prixother']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row"><?php echo $vecinfo['otherinterv']; ?></td>
				<td scope="row"></td>
				<td style="text-align: right;"><?php echo $vecinfo['prixintervo']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['otherpropo2'])) { ?>
			<tr style="text-align: left;">
				<td scope="row"><?php echo $vecinfo['otherpropo2']; ?></td>
				<td scope="row"></td>
				<td style="text-align: right;"><?php echo $vecinfo['prixother2']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row"><?php echo $vecinfo['otherinterv2']; ?></td>
				<td scope="row"></td>
				<td style="text-align: right;"><?php echo $vecinfo['prixintervo2']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['otherpropo3'])) { ?>
			<tr style="text-align: left;">
				<td scope="row"><?php echo $vecinfo['otherpropo3']; ?></td>
				<td scope="row"></td>
				<td style="text-align: right;"><?php echo $vecinfo['prixother3']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<td scope="row"><?php echo $vecinfo['otherinterv3']; ?></td>
				<td scope="row"></td>
				<td style="text-align: right;"><?php echo $vecinfo['prixintervo3']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
		<?php  if(!empty($vecinfo['devis'])) { ?>
			<tr style="text-align: left;">
				<th scope="row">Prix Total DEVIS :</th>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['devis']; ?></td>
				<th scope="row">€</th>
				<th scope="col">|</th>
				<th scope="row">Prix Total Facture :</th>
				<th scope="row"></th>
				<td style="text-align: right;"><?php echo $vecinfo['total']; ?></td><th scope="row">€</th>
			</tr>
			<?php
		}
		?>
	</tbody>
</table><br>

<table style="border: 1px solid black; font-size: 15px; text-align: center;" >
	<tr style="text-align: left;">
		<th scope="row">Contrôle qualité :</th>
		<th style="text-align: left; width: 150px " scope="row"></th>
		<th style="text-align: left; width: 428px " scope="row">| Notes :</th>
	</tr>
	<tr style="text-align: left;">
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Drivers </td>
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Activation</td>
		<th>|</th>
	</tr>
	<tr style="text-align: left;">

	</tr>
	<tr style="text-align: left;">
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Test Wifi</td>
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Win Update</td>
		<th>|</th>
	</tr>
	<tr style="text-align: left;">
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Sécurisation (AV)</td>
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Test USB'S</td>
		<th>|</th>
	</tr>
	<tr style="text-align: left;">
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Nettoyage</td>
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Vérifier Lecteurs</td>
		<th>|</th>
	</tr>
	<tr style="text-align: left;">
		<td><img  style="width: 15px; height: auto;"src="https://img.icons8.com/material-outlined/24/000000/rounded-square.png"/>Test Jack Son</td>
		<td></td>
		<th>|</th>
	</tr>
</table><br>

<table style="border: 1px solid black; font-size: 15px; width: 136.1%;">
	<tr style="text-align: ; left: ;">
		<th style="width:25%" scope="row">Visa LESTECHNICIENS :</th>
		<th style="width:50%; text-align: center; background-color: #D4D2D2; font-weight: normal; " scope="row">" J'atteste avoir vérifié et validé l'intervention faite sur mon matériel et je le récupère ce jour "</th>
	</tr>
	<tr><td></td>
		<td style="font-weight: bold; font-size:15px; background-color: #D4D2D2; height: 50px;">Date et signature :</td>
	</tr>

</table><br>
</page>



<?php
$content = ob_get_clean();
date("Y-m-d");
$nom=$vecinfo['nom'];
$prenom=$vecinfo['prenom'];  
require('html2pdf/html2pdf.class.php');
try{
	$pdf = new HTML2PDF('p','A4','fr');
	$pdf->writeHTML($content);
	$pdf->Output(date('Ymd')." "."-"." "."FPEC"." "."-".$nom.$prenom.".pdf");
}catch(HTML2PDF_exception $e){
	die ($e);
}
?>