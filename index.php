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
$id = $_GET["id"];
if ($id) {
  $model = new models\entry($id);
	$view = new views\entry($model);
	$view->show();
}
else {
  echo <<<HTML
	<h1>PIE</h1>
	<!--<p>*<a href="?id=1">h<sub>2</sub>eǵ-</a></p>-->
	<p>*<a href="?id=11">sed-</a></p>
	<h1>Latin</h1>
	<p><a href="?id=113">sédeō</a>, <a href="?id=80">sī́dō</a></p>
	<h1>Old Gaelic</h1>
	<p><a href="?id=202">saidid</a></p>
  <h1>Scottish Gaelic</h1>
	<p><a href="?id=233">suidh</a></p>
HTML;

}
?>

	  </div>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
