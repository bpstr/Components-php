<?php
/**
 * Carousel class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/carousel/
 * @version 4.2.0
 */

class Carousel extends Component {
	use Nested;

	const CAROUSEL_SLIDE = "slide";
	const CAROUSEL_FADE  = "carousel-fade";
	const CAROUSEL_INNER = "carousel-inner";
	const CAROUSEL_ITEM  = "carousel-item";

	const CAROUSEL_CAPTION  		 = "carousel-caption";
	const CAROUSEL_CONTROL_PREV 	 = "carousel-control-prev";
	const CAROUSEL_CONTROL_PREV_ICON = "carousel-control-prev-icon";
	const CAROUSEL_CONTROL_NEXT 	 = "carousel-control-next";
	const CAROUSEL_CONTROL_NEXT_ICON = "carousel-control-next-icon";
	const CAROUSEL_INDICATORS 		 = "carousel-indicators";

	public $tag = "div";
	public $family = "carousel";

	public $id = true;

	public $chunk_name = "carousel-item";

	function __construct ($items = array(), $active = NULL, $id = NULL, $fade = false) {
		$this->data("ride", "carousel");
		$this->addClass(self::CAROUSEL_SLIDE);
		if ($fade) $this->addClass(self::CAROUSEL_FADE);

		$this->id = $id ?? $this->family.rand(110,420);

		$this->contents[self::CAROUSEL_INNER] = Element::div()->addClass(self::CAROUSEL_INNER);
		foreach ($items as $key => $item) {
			$this->addItem($key, $item, $active);
		}

		return $this;
	}

	public function addItem ($key, $item, $active = NULL) {
		$slide = self::CarouselItem($item);
		if ($key == $active) $slide->addClass(Bootstrap::CLASS_ACTIVE);
		$this->contents[self::CAROUSEL_INNER]->addContent($slide, $key);

		return $this;
	}

	public static function CarouselItem ($item, $caption = NULL) {
		if ($item instanceof Element && $item->tag == "div") {
			$slide = $item->addClass(self::CAROUSEL_ITEM);
		} else {
			if ($item instanceof Element && $item->tag == "img") $item->addClass("d-block w-100"); // @todo: replace with utils
			$slide = Element::div($item)->addClass(self::CAROUSEL_ITEM);
		}

		if (!empty($caption)) {
			if ($caption instanceof Element && $caption->tag == "div") {
				$caption->addClass(self::CAROUSEL_CAPTION);
			} else {
				$caption->wrap(Element::div($item)->addClass(self::CAROUSEL_CAPTION));
			}
			$slide->addContent($caption);
		}

		return $slide;
	}

	public function activeItem ($key) {
		if (is_null($key)) $key = array_shift(array_keys($this->contents[self::CAROUSEL_INNER]));
		if (isset($this->contents[self::CAROUSEL_INNER][$key]) && $this->contents[self::CAROUSEL_INNER][$key] instanceof Element) {
			$this->contents[self::CAROUSEL_INNER][$key]->addClass(Bootstrap::CLASS_ACTIVE);
		}

		return $this;
	}

	public function controls () {
		$prev_icon = Element::span()->addClass(self::CAROUSEL_CONTROL_PREV_ICON)->attr("aria-hidden", "true");
		$prev_text = Element::span()->addClass("sr-only")->addContent(Bootstrap::LABEL_PREVIOUS);
		$prev = new Anchor ($prev_icon.$prev_text, "#".$this->id);
		$prev->addClass(self::CAROUSEL_CONTROL_PREV);
		$prev->attr("role", "button");
		$prev->data("slide", "prev");
		$this->addContent($prev);

		$next_icon = Element::span()->addClass(self::CAROUSEL_CONTROL_NEXT_ICON)->attr("aria-hidden", "true");
		$next_text = Element::span()->addClass("sr-only")->addContent(Bootstrap::LABEL_NEXT);
		$next = new Anchor ($next_icon.$next_text, "#".$this->id);
		$next->addClass(self::CAROUSEL_CONTROL_NEXT);
		$next->attr("role", "button");
		$next->data("slide", "next");
		$this->addContent($next);
	}

	public function indicators () {
		$indicators = Element::create("ol")->addClass(self::CAROUSEL_INDICATORS);
		$n = 0;
		foreach ($this->contents[self::CAROUSEL_INNER]->contents as $item) {
			$li = Element::create("li")->data("target", "#".$this->id)->data("slide-to", $n);
			if ($item instanceof Element && $item->hasClass(Bootstrap::CLASS_ACTIVE)) $li->addClass(Bootstrap::CLASS_ACTIVE);
			$indicators->addContent($li);
			$n ++;
		}
		$this->addContent($indicators, true);
	}

}

?>
