<?php
session_start();
// configuration
require('connexion.php');

  if (isset($_POST['submit'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['password']);
    $repeatpassword = sha1($_POST['repeatpassword']);
    $email = htmlspecialchars($_POST['email']);
    $sexe = $_POST['sexe'];

    if (empty($pseudo)) {
      $errors[]="Pseudo svp";
    }
    if (empty($password)) {
      $errors[]="Password svp";
    }
    if ($password != $repeatpassword) {
      $errors[] = "Vos deux password sont différents";
    }
    if (empty($email)) {
      $errors[]="Email incorrecte";
    }
    if (!empty($errors)) {
      foreach ($errors as $error) {
        echo "<div class='error'>".$error."</div>";
      }
    }

      //Insert des données
      $sql = "INSERT INTO users ( pseudo, password, email, sexe) VALUES (:pseudo, :password, :email, :sexe)";
      $query = $bdd->prepare( $sql );
      $result = $query->execute( array( ':pseudo'=>$pseudo, ':password'=>$password, ':email'=>$email, ':sexe'=>$sexe) );
      // puis on le redirige vers la page d'accueil
      //header('Location: index.php');
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
              <span class="help-block">8 mini</span>
            </div>
          </div>
          <!-- Password input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="repeatpassword">Password again !</label>
            <div class="col-md-4">
              <input id="password" name="repeatpassword" type="password" placeholder="Password" class="form-control input-md" required="">
              <span class="help-block">8 mini</span>
            </div>
          </div>
          <!-- email input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="email">email</label>
            <div class="col-md-4">
              <input id="email" name="email" type="email" placeholder="email" class="form-control input-md" required="">
            </div>
          </div>

          <!-- Multiple Radios -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="sexe">Sexe</label>
            <div class="col-md-4">
            <div class="radio">
              <label for="sexe-0">
                <input type="radio" name="sexe" id="sexe-0" value="femme" checked="checked">
                Femme
              </label>
          	</div>
            <div class="radio">
              <label for="sexe-1">
                <input type="radio" name="sexe" id="sexe-1" value="homme">
                Homme
              </label>
          	</div>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
              <input id="submit" type="submit" name="submit" typeclass="btn btn-success">Submit</button>
            </div>
          </div>

    </fieldset>
  </form>
      <a href="index.php?page=login">Page de connexion</a>
  </body>
</html>
