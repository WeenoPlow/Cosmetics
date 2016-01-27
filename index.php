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
  header("Location:index.php?page=page_product");
}
 ?>
 <!DOCTYPE html>
 <html>
   <body>
     <?php  include($content); ?>
   </body>
 </html>
