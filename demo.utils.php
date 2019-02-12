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
		<div class="container pt-5">
<?php


	$body = array();
	$body["title"] = Card::CardTitle("Card title");
	$body["text1"] = Card::CardText("Some quick example text to build on the card title and make up the bulk of the card's content.")->display(Display::INLINE_BLOCK);
	$body["text2"] = Card::CardText("In addition to styling the content within cards, Bootstrap includes a few options for laying out series of cards.");


	$card = new Card($body);
	// $card->addContent($links);
	$card->addHeader("Featured Header"); //->border();
	$card->addImage("https://via.placeholder.com/700x190.png?text=Visit:placeholder", "Image Alt");
	$card->addFooter("2 days ago");

	// $card->content("header")->

	$card->shadow(Shadow::NORMAL);
	$card->width(95);

	echo $card;
?>
"display",
"float",
"border",
"overflow",
"position",
"height",
"padding",
"margin",
"font",
"text"
