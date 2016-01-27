
<?php
session_start();
require_once 'connexion.php';
if (isset($_POST['submit'])) {

	$pseudoconnect = htmlspecialchars($_POST['pseudo']);
	$passwordconnect = sha1($_POST['password']);

echo $passwordconnect;
		if (!empty($pseudoconnect) AND !empty($passwordconnect)) {

			$verifaccount = $bdd-> prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
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
<?php require 'header.php'; ?>
    <form class="form-horizontal col-md-offset-4 col-md-4 col-right" method="post" action="">
        <fieldset>

        <!-- Form Name -->
        <legend>Form Name</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-3 control-label" for="pseudo">Pseudo</label>
          <div class="col-md-9">
          <input id="pseudo" name="pseudo" type="text" placeholder="Pseudo" class="form-control input-md" required="">
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-3 control-label" for="password">Password</label>
          <div class="col-md-9">
            <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">

          </div>
        </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Se Connecter">
        </fieldset><br>
				  <a class="btn btn-primary" href="index.php?page=register">S'inscrire</a><br>
      </form>

			<?php if (isset($erreur)) {
				echo $erreur;
			} ?>

    </form>
  </body>
</html>
