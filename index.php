<?php
include "config.php";
try{
	if (isset($_POST['connexion'])) {
		$login = htmlspecialchars($_POST['login']);
		$pass = sha1($_POST['mdp']);
		if(!empty($login) AND !empty($pass)) {
			$reqlog = $bdd->prepare("SELECT * FROM admin WHERE login = ? AND mdp = ?");
			$reqlog->execute(array($login, $pass));
			$userexit = $reqlog->rowCount();
			if($userexit == 1) {
				$_SESSION['login'] = $reqlog->fetch();
				$_SESSION['login']['id'];
				header("Location: accueil.php");

			}else{
				$message = "Mauvais utilisateur ou mot de passe !";
			}
		}else{
			$message = "Veuillez completer les informations demander !";
		}
	}

}catch(PDOException $message){
	"Erreur : ". $message->getMessage();

}






?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
	<title>Connexion</title>
</head>
<body>
	<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5 text-uppercase">connectez-vous</h2>
        <div class="text-center mb-5 text-dark">Les techniciens informatique</div>
        <div class="card my-5">
          <form method="post" class="card-body cardbody-color p-lg-5">
            <div class="text-center">
              <img src="IMG/logo/logo.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>
            <div class="mb-3">
              <input type="text" name="login" class="form-control" placeholder="Identifiant">
            </div>
            <div class="mb-3">
              <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
            </div>
            <div class="text-center"><input type="submit" name="connexion" value="Connexion" class="btn btn-color px-5 mb-5 w-100"></div>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>