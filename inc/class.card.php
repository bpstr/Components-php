<?php 
require_once ("abstract.class.php");

/**
 * Card class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Card extends Component {
	public $tag = "div"; 
	public $family = "card"; 
		
	function __construct (array $items = array(), $contextual = "") { 
		
		foreach ($items as $content) {
			$this->addContent($content);
		}
		
		
		return $this;
	} 
	
	public function addContent ($html, $top = false) {
		if (gettype($html) == "object") {
			if (get_class($html) == "ListGroup") $html->addClass("list-group-flush");
		}
		if ($top) {
			array_unshift($this->contents, $html);
		} else {
			array_Push($this->contents, $html);
		}
		return $this;
	}
	
	public function addImage($src, $alt = "", $position = "top") {
		$image = new class extends Component { public $tag = 'img'; };
		$image->attributes["src"] = $src;
		$image->attributes["alt"] = $alt;
		$image->addClass("card-img-$position");
		
		$this->addContent($image, ($position == "top"));
	}
	
	public function addHeader($text, $size = NULL) {  
		$header = ($size > 0) ? new Heading($text, $size) : (new Div($text))->addClass("card-header");
		$this->addContent($header, true);
	}
	
	public function addFooter($text, $muted = true) {
		$footer = (new Div($text))->addClass("card-footer");
		if ($muted) $footer->addClass("text-muted");
		$this->addContent($footer);
	}
	
	public function large() {
		$this->addClass("btn-group-lg");
		return $this;
	}
	
	public function small() {
		$this->addClass("btn-group-sm");
		return $this;
	}	
	
	public function vertical() {
		$this->addClass("btn-group-vertical");
		return $this;
	}	
	
	
	
}

/* Card Body */

class CardBody extends Component { 
	public $tag = "div"; // Should be given in abstract class
	
	function __construct ($text = "", $overlay = false) {
		$this->addClass( ($overlay) ? "card-img-overlay" : "card-body" );
		$this->addContent($text);
		// $this->wrap = new class extends Component { public $tag = 'div'; };
		return $this;
	}
	
	public function addTitle ($title, int $size = 6, $sub = false) {
		$title = new Heading($title, $size);
		$title->addClass( ($sub) ? "card-subtitle text-muted" : "card-title");
		$this->addContent($title);
		return $this;
	}
	
	public function addText ($text) {
		$paragraph = new class extends Component { public $tag = 'p'; };
		$paragraph->addClass("card-text");
		$paragraph->addContent($text);
		$this->addContent($paragraph);
		return $this;
	}
	
	public function addLink ($content, $href = "#") {
		$link = new Anchor ($content, $href);
		$link->addClass("card-link");
		$this->addContent($link);
		return $this; 
	} 
	
}

/* Card Holders */

class CardGroup extends Div {
	function __construct ($content) {
		$this->addClass("card-group");
		$this->addContent($content);
	}
}

class CardDeck extends Div {
	function __construct ($content) {
		$this->addClass("card-deck");
		$this->addContent($content);
	}
}

class CardColumns extends Div {
	function __construct ($content) {
		$this->addClass("card-columns");
		$this->addContent($content);
	}
}



?>