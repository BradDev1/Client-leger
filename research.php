<?php if(!empty($_GET['nom'])) { ?>

	<section class="">
		<?php 
		if($requser->RowCount() > 0){
			while($user = $requser-> fetch()){
				?>
				<p style="text-align: left;">
					<?= $user['nom']; ?>
					|
					<?= $user['prenom']; ?>
					|
					<?= $user['telephone']; ?>
					<a href="profil.php?id=<?php echo $user['id_client'] ?>"><img style ="background-size: cover;
					width: 20px;
					height: auto; "src="https://img.icons8.com/color/48/000000/user.png"/></a><br>
				</td>
			</p>



			<?php 
		}
	}else{
		?>
		<p>Aucun client trouvé</p>
		<a href="inscription.php">Enregistrer</a>
		<?php
	}
	?>
	<?php

}

?>