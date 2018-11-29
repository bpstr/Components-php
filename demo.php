<?php 
	require_once("Components.php"); 
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Components-php for Bootstrap 4</title>
</head>
<body>
	<div class="container">
		<h1 class="display-1 text-center">Components</h1>
		<div class="row">
		
			<!-- Alerts -->
			<div class="col">
				<h2>Alerts</h2>
				<?php 
					echo (new Alert("A default primary alert – check it out!"));
					echo (new Alert("A constructed secondary alert", "secondary"));
					echo (new Alert("A success alert with method"))->success();
					echo (new Alert("A dismissible danger alert"))->dismissible()->danger();
					echo (new Alert("A dismissible warning alert with custom button"))->dismissible('<button type="button" class="close" data-dismiss="alert" aria-label="Close">[close]</button>')->warning();
					echo (new Alert('<h4 class="alert-heading">Well done!</h4>'))->addContent('<hr><p>An info alert with additional content</p>')->info();
					echo (new Alert('<h4 class="alert-heading">Dismissing!</h4>'))->addContent('<hr><p>An info alert with additional content</p>')->dismissible()->light();
					echo (new Alert(' A simple dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.'))->dark();
				?>
			</div>
			
			<!-- Badges -->
			<div class="col">
				<h2>Badges</h2>
				<?php 
					echo (new Badge("Simple Primary Badge"))."<br>"; 
					echo (new Badge("Secondary Badge", "secondary"))."<br>";
					echo (new Badge("Success Method"))->success()."<br>";
					echo (new Badge("Pill Badge"))->pill()->danger()."<br>";
					echo (new Badge("Clickable"))->action("#")->warning()."<br>";
				?>
			</div>
			
			<!-- Breadcrumb -->
			<div class="col">
				<h2>Badges</h2>
				<?php 
					echo (new Badge("Simple Primary Badge"))."<br>"; 
					echo (new Badge("Secondary Badge", "secondary"))."<br>";
					echo (new Badge("Success Method"))->success()."<br>";
					echo (new Badge("Pill Badge"))->pill()->danger()."<br>";
					echo (new Badge("Clickable"))->action("#")->warning()."<br>";
				?>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>