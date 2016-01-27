<?php
// configuration
require 'header.php';
require('connexion.php');


  if (isset($_POST['submitproduct'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['password']);
    $repeatpassword = sha1($_POST['repeatpassword']);
    $email = htmlspecialchars($_POST['email']);
    $sexe = $_POST['sexe'];



    if (!empty($pseudo) AND !empty($password) AND !empty($repeatpassword) AND !empty($email)) {

      $pseudolength = strlen($pseudo);

      if ($pseudolength <= 40) {

        $verifaccount = $bdd ->prepare("SELECT * FROM users WHERE pseudo = ?");
        $verifaccount -> execute(array($pseudo));
        $pseudoexist = $verifaccount->rowCount();

        if ($pseudoexist == 0) {
          if ($password == $repeatpassword) {

            $insertuser = "INSERT INTO users ( pseudo, password, email, sexe) VALUES (:pseudo, :password, :email, :sexe)";
            $query = $bdd->prepare( $insertuser );
            $result = $query->execute( array( ':pseudo'=>$pseudo, ':password'=>$password, ':email'=>$email, ':sexe'=>$sexe) );
            $erreur = "Votre compte a bien été créé";
          }else{
            $erreur = "Vos passwords sont différents";
          }
        }else {
          $erreur = "Pseudo esiste déjà";
        }
      }else {
        $erreur = " Pseudo trop long";
      }
  }else {
  $erreur = "Tous les champs ne sont pas complétés";
}
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


   <form class="form-horizontal" method="post">
     <fieldset>

       <!-- Form Name -->
       <legend>Form Name</legend>

       <!-- Text input-->
       <div class="form-group">
         <label class="col-md-4 control-label" for="productName">Nom du produit</label>
         <div class="col-md-4">
           <input id="productName" name="productName" type="text" placeholder="produit" class="form-control input-md" required="">

         </div>
       </div>

       <!-- Textarea -->
       <div class="form-group">
         <label class="col-md-4 control-label" for="productDescribe">Description du produit</label>
         <div class="col-md-4">
           <textarea class="form-control" id="productDescribe" name="productDescribe"></textarea>
         </div>
       </div>

       <!-- File Button -->
       <div class="form-group">
         <label class="col-md-4 control-label" for="productVignette">Vignette</label>
         <div class="col-md-4">
           <input id="productVignette" name="productVignette" class="input-file" type="file">
         </div>
       </div>


          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
              <input id="submit" type="submit" name="productSubmit" typeclass="btn btn-success">Submit</button>
            </div>
          </div>
    </fieldset>
  </form>
    <?php if (isset($erreur)) {
      echo $erreur;
    } ?><br>
      <a href="index.php?page=page_product">Page de catalogue</a>
  </body>
</html>
