<?php
session_start();
require_once 'includes/include.php';
?>

<!doctype html>
<html lang="en">
  <head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	  <script src="js/main.js"></script>
    <title>Lexicopia</title>
  </head>
  <body style="padding-top: 100px;">
	  <nav class="navbar navbar-dark bg-primary fixed-top navbar-expand-lg">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php">Lexicopia</a>
	    </div>
	  </nav>
    <div class="container-fluid">

<?php
if (isset($_GET["id"])) { 
  $id = $_GET["id"]; 
  $model = new models\entry($id);
	$view = new views\entry($model);
	$view->show();
}
else if (isset($_GET["lang"])) {
  $lang = $_GET["lang"];
  $model = new models\language($lang);
  $view = new views\language($model);
  $view->show();
}
else {
  echo "<ul style=\"list-style-type:none; padding-left: 0;\">";
  echo "<li><a href=\"?lang=de\">German</a></li>";
  echo "<li><a href=\"?lang=sga\">Old Gaelic</a></li>";
  echo "</ul>";
/*
  (new views\entry(new models\entry("1188")))->showTree();
  (new views\entry(new models\entry("1291")))->showTree();
  (new views\entry(new models\entry("1293")))->showTree();
  (new views\entry(new models\entry("1331")))->showTree();
  (new views\entry(new models\entry("1337")))->showTree();
  */
  
}
?>

	  </div>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
