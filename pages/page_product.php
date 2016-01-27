<?php
session_start();
require 'header.php';
 ?>



    <?php
    $req = $bdd->prepare('SELECT * FROM produit');
    $req->execute();
    ?>
    <div class="container">
        <div class="custom-margin"><input type="text" class="form-control" placeholder="Placeholder text"></div>
        <div class="row custom-margin">
          <?php while ($productinfo = $req->fetch(PDO::FETCH_OBJ)) {?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="./img/blackxs.jpg" alt="">
                    <div class="caption">
                        <h3><?php echo $productinfo->name; ?></h3>
                        <p>Douce senteur de vanille est recommandé pour les peaux sensibles</p>
                        <p><a href="#" class="btn btn-primary" role="button"><?php echo $productinfo->price; ?> €</a> </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
      </div>

<?php require 'footer.php'; ?>
