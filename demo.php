<?php

use Bpstr\Elements\Html\Document;

require_once "vendor/autoload.php";

$document = new Document('Checkout example · Bootstrap');
$document->meta('author', 'bpstr.dev');




echo $document;
