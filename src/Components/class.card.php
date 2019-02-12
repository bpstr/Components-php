<?php
/**
 * Card class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/card/
 * @version 4.2.0
 */

class Card extends Component {
	use Complex;

	const CARD_BODY 	= "card-body";
	const CARD_IMAGE 	= "card-img";
	const CARD_HEADER 	= "card-header";
	const CARD_FOOTER 	= "card-footer";
	const CARD_TITLE 	= "card-title";
	const CARD_SUBTITLE	= "card-subtitle";
	const CARD_TEXT 	= "card-text";
	const CARD_LINK 	= "card-link";

	const CARD_IMG_OVERLAY  = "card-img-overlay";
	const CARD_HEADER_TABS  = "card-header-tabs";
	const CARD_HEADER_PILLS = "card-header-pills";

	public $tag = "div";
	public $family = "card";

	public $chunk_name = "card-body";

	function __construct (...$items) {

		$this->addChunk("base", $items);
		

		return $this;
	}

	public function addChunk ($key, $chunk) {
		if ($chunk instanceof ListGroup) {
			$item = $chunk->addClass(ListGroup::LIST_GROUP_FLUSH);
		} else {
			$item = $this->enfoldChunk($chunk);
		}
		$this->addContent($item, $key);

		return $this;
	}

	public function addBody($items, $key = NULL) {
		$body = Element::create("div")->addClass(self::CARD_BODY)->addContent($items);
		$this->addContent($body, $key);
		return $this;
	}

	public function addImage($src, $alt = "", $position = "top") {
		$image = new Image($src, $alt);
		$image->addClass("card-img-$position");
		$this->addContent($image, ($position == "top"));

		return $this;
	}

	public function addImageOverlay($items, $key = NULL) {
		$body = Element::create("div")->addClass(self::CARD_IMG_OVERLAY)->addContent($items);
		$this->addContent($body, $key);

		return $this;
	}


	public function addHeader($content, $key = true) {
		if ($content instanceof Nav) {
			if ($content->hasClass(Nav::NAV_TABS))  $content->addClass(self::CARD_HEADER_TABS);
			if ($content->hasClass(Nav::NAV_PILLS)) $content->addClass(self::CARD_HEADER_PILLS);
		}
		$header = Element::create("div")->addClass(self::CARD_HEADER)->addContent($content);
		$this->addContent($header, $key);

		return $this;
	}

	public function addFooter($content, $key = NULL, $muted = true) {
		$footer = Element::create("div")->addClass(self::CARD_FOOTER)->addContent($content);
		if ($muted) $footer->addClass(Bootstrap::TEXT_MUTED);
		$this->addContent($footer, $key);

		return $this;
	}




	public static function CardTitle  ($title, int $size = 5, $sub = false) {
		$title = new Heading($title, $size);
		$title->addClass( ($sub) ? self::CARD_SUBTITLE." ".Bootstrap::TEXT_MUTED : self::CARD_TITLE);
		return $title;
	}

	public static function CardText ($text) {
		return Element::paragraph($text)->addClass(self::CARD_TEXT);
	}

	public static function CardLink ($content, $href = "#") {
		$link = new Anchor ($content, $href);
		$link->addClass(self::CARD_LINK);
		return $link;
	}


}



?>
