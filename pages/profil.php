<?php
session_start();
require('connexion.php');

if(isset($_GET['id']) AND $_GET['id'] > 0){
  $getid = intval($_GET['id']);
  $requser = $bdd -> prepare('SELECT * FROM users WHERE id = ?');
  $requser -> execute(array($getid));
  $userinfo = $requser -> fetch();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="col-md-12">Profil de <?php echo $userinfo['pseudo']; ?></div>
    Mail = <?php echo $userinfo['email']; ?> <br>

    <a href="index.php?page=index.php">Page d'accueil</a><br>

    <?php if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
    ?>
      <a href="#">Edit</a>
      <a href="#">Se deco</a>
      <?php
      } ?>
  </body>
</html>
