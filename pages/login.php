
<?php
session_start();
require_once('connexion.php');
if (isset($_POST['submit'])) {

	$pseudoconnect = htmlspecialchars($_POST['pseudo']);
	$passwordconnect = sha1($_POST['password']);

echo $passwordconnect;
		if (!empty($pseudoconnect) AND !empty($passwordconnect)) {

			$verifaccount = $bdd -> prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
			$verifaccount -> execute(array($pseudoconnect, $passwordconnect));
			$numberofline = $verifaccount->rowCount();
		  $userinfo = 	$verifaccount->fetch();
			echo count($userinfo);
				if ($numberofline == 1) {
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['pseudo'] = $userinfo['pseudo'];
					$_SESSION['mail'] =  $userinfo['mail'];
					header('Location: pages/profil.php?id='.$_SESSION['id']);
				}else {
					$erreur = "Bad Password Ou MDP";
				}
		}else {
			$erreur ="Tous les champs ne sont pas remplis";
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
      <a href="index.php?page=register">S'inscrire</a><br>
			<?php if (isset($erreur)) {
				echo $erreur;
			} ?>

    </form>
  </body>
</html>
