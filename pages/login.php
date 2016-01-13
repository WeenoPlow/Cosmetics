
<?php

if (isset($_POST['submit'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($login_valide == $_POST['pseudo'] && $pwd_valide == $_POST['password']) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		// on la démarre :)
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['password'] = $_POST['password'];

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: page_membre.php');
		}
		else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <form class="form-horizontal" method="post" action="">
        <fieldset>

        <!-- Form Name -->
        <legend>Form Name</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="pseudo">Pseudo</label>
          <div class="col-md-4">
          <input id="pseudo" name="pseudo" type="text" placeholder="Pseudo" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password">Password</label>
          <div class="col-md-4">
            <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">

          </div>
        </div>
          <input type="submit" name="submit" value="Se Connecter">
        </fieldset>
      </form>
      <a href="index.php?page=register">S'inscrire</a>

    </form>
  </body>
</html>
