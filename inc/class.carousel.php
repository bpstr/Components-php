<?php 
require_once ("abstract.class.php");

/**
 * Carousel class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Carousel extends Component {
	public $tag = "div"; 
	public $family = "carousel"; 
	
	
	function __construct ($items, $id, $fade = false) {
		$this->attributes["data-ride"] = "carousel";
		$this->addClass("slide");
		if ($fade) $this->addClass("carousel-fade");
		
		$this->id = $id;
		
		$this->contents["carousel-inner"] = (new Div(""))->addClass("carousel-inner");
		
		$active = true;
		foreach ($items as $item) {
			// The .active class needs to be added to one of the slides otherwise the carousel will not be visible.
			if ($active && gettype($item) == "object" && get_class($item) == "CarouselItem") $item->addClass("active");
			$this->contents["carousel-inner"]->addContent($item);
			$active = false;
		}
		
		return $this;
	}
	
	public function addCarouselItem(CarouselItem $item) {
		$this->contents["carousel-inner"]->addContent($item);
	}
	
	public function controls () {
		$prev_icon = (new class extends Component { public $tag = 'span'; })->addClass("carousel-control-prev-icon")->attr("aria-hidden", "true");
		$prev_text = (new class extends Component { public $tag = 'span'; })->addClass("sr-only")->addContent("Previous");
		$prev = new Anchor ($prev_icon.$prev_text, "#".$this->id);
		$prev->addClass("carousel-control-prev");
		$prev->attr("role", "button");
		$prev->attr("data-slide", "prev");
		$this->addContent($prev);
		
		$next_icon = (new class extends Component { public $tag = 'span'; })->addClass("carousel-control-next-icon")->attr("aria-hidden", "true");
		$next_text = (new class extends Component { public $tag = 'span'; })->addClass("sr-only")->addContent("Next");
		$next = new Anchor ($next_icon.$next_text, "#".$this->id);
		$next->addClass("carousel-control-next");
		$next->attr("role", "button");
		$next->attr("data-slide", "next");
		$this->addContent($next);
	}
	
	public function indicators () {
		$indicators = (new class extends Component { public $tag = 'ol'; public $family = 'carousel-indicators'; });
		$n = 0;
		foreach ($this->contents["carousel-inner"]->contents as $item) {
			$li = (new class extends Component { public $tag = 'li'; })->attr("data-target", "#".$this->id)->attr("data-slide-to", $n);
			if ($n == 0 && gettype($item) == "object" && get_class($item) == "CarouselItem") $li->addClass("active");
			$indicators->addContent($li);
			$n ++;
		}
		$this->addContent($indicators, true);
	}
	
}

class CarouselItem extends Component {
	public $tag = "div";
	public $family = "carousel-item"; 
	
	function __construct ($src, $alt) {
		$image = new class extends Component { public $tag = 'img'; };
		$image->attributes["src"] = $src;
		$image->attributes["alt"] = $alt;
		$image->addClass("d-block w-100");
		
		$this->addContent($image);
		
	}
	
	public function addCaption ($text) {
		$this->addContent((new Div($text))->addClass("carousel-caption d-none d-md-block"));
		return $this;
	}
	
}

?>