<?php
	require_once "Components.php";

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.col-sm-12 { margin: 20px 0;}
		.col-sm-12 h2 { margin: 20px 0;}
	</style>
    <title>Components-php for Bootstrap 4</title>
</head>
<body>
	<div class="container">
		<h1 class="display-1 text-center">Components</h1>
		<div class="row">

			<!-- Alerts -->
			<div class="col-sm-12 col-md-6 col-lg-4">
				<h2>Alerts</h2>
				<?php
					echo (new Alert("A default primary alert – check it out!"));
					echo (new Alert("A constructed secondary alert", "secondary"));
					echo (new Alert("A success alert with method"))->success();
					echo (new Alert("A dismissible danger alert"))->dismissible()->danger();
					echo (new Alert("A dismissible warning alert with custom button"))->dismissible(Bootstrap::CloseIcon("✓"))->warning();
					echo (new Alert('<h4 class="alert-heading">Well done!</h4>'))->addContent('<hr><p>An info alert with additional content</p>')->info();
					echo (new Alert(Element::paragraph("An info alert with additional content")))->addHeading('Dismissing!')->dismissible()->light();
					echo (new Alert(' A simple dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.'))->dark();
				?>
			</div>

			<!-- Badges -->
			<div class="col-sm-12 col-md-6 col-lg-4">
				<h2>Badges</h2>
				<?php
					echo (new Badge("Simple Badge"))."<br>";
					echo (new Badge("Primary Badge", Bootstrap::COLOR_PRIMARY))."<br>";
					echo (new Badge("Secondary Badge", "secondary"))."<br>";
					echo (new Badge("Success Method"))->success()."<br>";
					echo (new Badge("Pill Badge"))->pill()->danger()."<br>";
					echo (new Badge("Clickable"))->action("#")->warning()."<br>";
				?>
				<br>
				<br>
				<h2>Buttons</h2>
				<?php
					echo (new Button("Simple"))." ";
					echo (new Button("Secondary", "secondary"))." ";
					echo (new Button("Success"))->success()."<br><br>";
					echo (new Button("Large Danger", "danger"))->large()." ";
					echo (new Button("Small Warning", "warning"))->small()."<br><br>";
					echo (new Button("Info Block", "info"))->block()."<br>";
					echo (new Button("Primary outline", "primary"))->outline()." ";
					echo (new Button("Danger outline", "danger"))->outline("danger")."<br><br>";
					echo (new Button("Button with achor tag", "light", "#"))->setTag("a")." ";
					echo (new Button("Input button", "dark"))->setTag("input")."<br><br>";
					echo (new Button("Link Button"))->btnlink();
				?>
			</div>

			<!-- Breadcrumb -->
			<div class="col-sm-12 col-md-6 col-lg-4">
				<h2>Breadcrumbs</h2>
				<?php
					echo (new Breadcrumb())->addItem("home", new Anchor("Home", "#"))."<br>";
					$items = array(new Anchor("Home"), new Anchor("Parent"),new Anchor("Child"));
					echo (new Breadcrumb($items))."<br>";
					echo (new Breadcrumb($items))->dark()."<br>";
				?>

				<h2>Button groups</h2>
				<?php
					$items = array(new Button("Home"), (new Button("Garden", "success"))->action("#"), (new Button("Garage"))->secondary());
					echo (new ButtonGroup($items))."<br><br>";
					echo (new ButtonGroup($items))->small()."<br><br>";
					echo (new ButtonGroup($items))->large()."<br><br>";
					echo (new ButtonGroup($items))->vertical()."<br><br>";

				?>
			</div>

			<!-- Cards -->
			<div class="col-sm-12">
				<h1>Cards</h1>
			</div>
			<div class="col-sm-12 col-md-5 col-lg-4">
				<h2>Kitchen sink</h2>
				<?php
					$body = array();
					$body["title"] = Card::CardTitle("Card title");
					$body["text1"] = Card::CardText("Some quick example text to build on the card title and make up the bulk of the card's content.");
					$body["text2"] = Card::CardText("In addition to styling the content within cards, Bootstrap includes a few options for laying out series of cards.");


					$card = new Card($body);
					// $card->addContent($links);
					$card->addHeader("Featured Header");
					$card->addImage("https://via.placeholder.com/420x190.png?text=Visit:placeholder", "Image Alt");
					$card->addFooter("2 days ago");

					echo $card;
				?>
			</div>
			<div class="col-sm-12 col-md-7 col-lg-8">
				<h2>Navigation</h2>
			</div>

			<!-- Carousel -->
			<div class="col-sm-12 col-md-6 col-lg-5">
				<h2>Carousel</h2>
				<?php

					$items = array();
					$items[] = new Image("https://via.placeholder.com/1420x690.png?text=Visit:placeholder", "Image Alt");
					$items[] = new image("https://via.placeholder.com/1420x690.png?text=SecondSlide", "Image Alt");

					$items["caption"] = Carousel::CarouselItem(new Image("https://via.placeholder.com/1420x690.png?text=SlideWithCaption", "Image Alt"), new Heading("Lorem Ipsum Dolor Sit Amet", 5));

					$carousel = new Carousel($items);
					$carousel->controls();
					$carousel->indicators();

					echo $carousel;
				?>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-4">
				<h2>Collapse</h2>
				<?php
					$collapse = new Collapse ("Lorem ipsum dolor sit amet dunno.");
					$button = $collapse->makeControlButton("Toggle");

					echo $button;
					echo $collapse;
				?>
			</div>

			<!-- Dropdown -->
			<div class="col-sm-12 col-md-6 col-lg-3">
				<h2>Dropdown</h2>
				<?php

					$items = array(new Anchor("First item"), new Anchor("Second item"),new Anchor("Last item"));

					$dropdown = new Dropdown($items, "Simple Dropdown");
					echo $dropdown."<br><br>";

					$dropdown = new Dropdown($items);
					$dropdown->splitButton(new Button("Split button"));
					echo $dropdown."<br><br>";
				?>
			</div>


			<!-- Form & Input -->
			<div class="col-sm-12">
				<h1>Form & Input</h1>
			</div>
			<div class="col-sm-12 col-md-7 col-lg-8">
				<h2>Form with complex layout</h2>
					<?php
						$form = new Form ("index.php", "get");
						$mail = new Input ("email", "usermail", "user@example.com", "mailInput");
						$mail->label("Email address", true);
						$mail->explain("We'll never share your email with anyone else.");

						$pass = (new Input ("password", "pass", "",  "mailPassw"))->label("Password");
						$form->addRow(array($mail, $pass), "col-md-6");


						$addr = (new Input ("text", "address", "1234 Main St",  "inputAddress"))->label("Address line 1");
						$form->addGroup($addr);


						$city = (new Input ("text", "city", "Budapest",  "inputCity"))->label("City");

						$options = array("Pest", "Békés", "Fehér", "Fekete");
						$state = (new Select ($options))->label("State");
						$state->addOption("", "Select one please!", NULL, true, true, true);

						$zip = (new Input ("text", "zip", "",  "inputZip"))->label("Zip code");
						$form->addRow(array($city, $state, $zip), array("col-md-6", "col-md-4", "col-md-2"));

						$check = (new Input ("checkbox", "subscribe", "",  "gridCheck"))->label("Check me in!");
						$form->addGroup($check);

						$form->addContent((new Button("Blaze it", "dark"))->setTag("input")); // 420 blaze it fgt

						echo $form;

					?>
			</div>
			<div class="col-sm-12 col-md-5 col-lg-4">
				<h2>Some extras</h2>
					<?php
						$form = new Form ();
						$range = (new Input ("range"))->attr("id", "formControlRange")->label("Example Range input");
						$form->addGroup($range);

						$group = (new Input ("text", "username", "",  "inlineFormInputGroup"))->label("Username", true);
						$group->before = (new Div("@"))->addClass("input-group-text");
						$group->before->wrap = (new Div())->addClass("input-group-prepend");
						$form->addGroup((new Div($group))->addClass("input-group"));

						$group = (new Input ("text", "username", "",  "inlineFormInputGroup"))->label("Financials", true);
						$group->prepend("$");
						$group->append(".00 k");
						$form->addGroup($group);

						$textarea = (new Textarea())->prepend("Input group with textarea");
						$form->addGroup($textarea);

						/**
						 * Form validator code goes here:
						 * @source: https://getbootstrap.com/docs/4.1/components/forms/#server-side
						 * @source: https://www.w3schools.com/html/html_form_attributes.asp
						 *
						 * todo: form generation from information scheme
						 * todo: textareas
						*/


						echo $form;

					?>
			</div>

			<!-- Jumbotron -->
			<div class="col-sm-12 col-lg-5">
				<h2>Jumbotron</h2>
				<?php
					$content = array(new Heading("Hello, world!", 1, 4), new Div ("Random text with <b>formatted</b> HTML."));
					echo new Jumbotron($content)."<br>";
					echo (new Jumbotron($content, true))->addContent("Things can go fluid too!")."<br>";
				?>
			</div>

			<!-- List group -->
			<div class="col-sm-12 col-md-6 col-lg-4">
				<h2>List group</h2>
				<?php

					$items = array();
					$items[] = (new Anchor("Dapibus ac facilisis in", "#"))->success();
					$items[] = (new Anchor("A simple info list group item", "#"))->info();
					$items[] = new Anchor("Morbi leo risus", "#");
					$items[] = (new Anchor("Cras justo odio", "#"))->addClass("active");

					$listgroup = new ListGroup($items);
					// $listgroup->addItem($items);
					echo $listgroup."<br><br>";
				?>
			</div>


			<!-- Modal -->
			<div class="col-sm-12 col-md-6 col-lg-3">
				<h2>Modal</h2>
			</div>

			<!-- Navs -->
			<div class="col-sm-12">
				<h2>Navs</h2>
				<?php

					$items = array();
					$items[] = (new Anchor("Image Alt 2", "https://via.placeholder.com/1420x690.png?text=Visit:placeholder"))->addClass("active");
					$items[] = new Anchor("Image Alt 3", "https://via.placeholder.com/1420x690.png?text=Visit:placeholder");
					$items[] = new Anchor("Image Alt 4", "https://via.placeholder.com/1420x690.png?text=Visit:placeholder");

					$nav = new Nav($items);
					$nav->addItem($items[2]);
					echo $nav."<br><br>";
					echo $nav->pills()."<br><br>";
					echo $nav->tabs()."<br><br>";
				?>
			</div>

			<!-- Navbar -->
			<div class="col-sm-12">
				<h2>Navbar</h2>
			</div>


			<!-- Pagination -->
			<div class="col-sm-12 col-md-6 col-lg-4">
				<h2>Pagination</h2>
			</div>


			<!-- Popovers -->
			<div class="col-sm-12 col-md-6 col-lg-3">
				<h2>Popovers</h2>
			</div>

			<!-- Progress -->
			<div class="col-sm-12 col-lg-5">
				<h2>Progress</h2>
				<?php
					echo (new Progress(array(new ProgressBar(20))))."<br>";
					$bar = new ProgressBar(25);
					echo (new Progress(array($bar->secondary())))."<br>";
					echo (new Progress(array(new ProgressBar(25, "secondary"), $bar->value(50)->success())))."<br>";

				?>
			</div>

			<!-- Scrollspy -->
			<div class="col-sm-12 col-md-6">
				<h2>Scrollspy</h2>
			</div>

			<!-- Tooltips -->
			<div class="col-sm-12 col-md-6">
				<h2>Tooltips</h2>
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
