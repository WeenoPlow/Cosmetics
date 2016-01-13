<?php
require('pages/connexion.php');


if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	echo '<ul style="padding:0; color:red;">';
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<li>',$msg,'</li>';
	}
	echo '</ul>';
	unset($_SESSION['ERRMSG_ARR']);
}


$page = htmlentities($_GET['page']);
$scanPages = scandir('pages');



if (!empty($page) && in_array($_GET['page'].".php", $scanPages)) {
  $content = 'pages/'.$_GET['page'].".php";
}else {
  header("Location:index.php?page=login");
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php  include($content); ?>
   </body>
 </html>
