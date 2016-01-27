<?php
require 'connexion.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Cosmetic</title>
    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <meta charset="utf-8">
          <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    <header>
      <nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                      <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#">Cosmetic</a>
                      </div>
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                              <li class="active">
                                  <a href="index.php?page=register">Inscription</a>
                              </li>
                              <li>
                                  <a href="index.php?page=login">Connexion</a>
                              </li>
                              <li>
                                  <a href="index.php?page=page_product">Catalogue</a>
                              </li>

                          </ul>
                          <form class="navbar-form navbar-left" role="search">
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search">
                              </div>
                              <button type="submit" class="btn btn-default">Submit</button>
                          </form>
                          <ul class="nav navbar-nav navbar-right">
                              <li>
                                  <a href="#"><i class="fa fa-2x fa-shopping-cart"></i></a>
                              </li>
                              <li>
                                  <a href="index.php?page=profil">Profil</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
    </header>
