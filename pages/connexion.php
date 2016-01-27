<?php

// try
// {
//   $bdd = new PDO('mysql:host=localhost;dbname=php;charset=utf8', 'root', 'root');
// }
// catch (Exception $e)
// {
//         die('Erreur : ' . $e->getMessage());
// }



  $host = 'localhost';
  $username = 'root';
  $password = 'root';
  $database = 'php';
  $bdd;

    try{
      $bdd = new PDO('mysql:host='.$host.';dbname='.$database, $username,
        $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
        );
    }catch(PDOException $e){
        die('<h1>Impossible de se connecter a la base de donnee</h1>');
    }

?>
