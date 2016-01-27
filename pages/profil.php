<?php
session_start();
require('connexion.php');
require 'header.php';
if(isset($_GET['id']) AND $_GET['id'] > 0){
  $getid = intval($_GET['id']);
  $requser = $bdd -> prepare('SELECT * FROM users WHERE id = ?');
  $requser -> execute(array($getid));
  $userinfo = $requser -> fetch();
}
?>
<!DOCTYPE html>
<html>
  <?php  ?>
    <div class="col-right col-md-offset-1 col-md-10">Profil de <?php echo $userinfo['pseudo']; ?>
    Mail = <?php echo $userinfo['email']; ?> <br>

    <a href="index.php?page=page_product" class="btn btn-primary">Page d'accueil</a><br>

    <?php if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
    ?>
      <a href="#">Edit</a>
      <a href="deconnexion.php">Se deco</a>
      <?php
      } ?>
      </div>
</html>
