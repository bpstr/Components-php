<?php

namespace Bpstr\Components\Bootstrap\Component;

use Bpstr\Components\Bootstrap;
use Bpstr\Components\Bootstrap\Behaviour\ContextualAwareComponent;
use Bpstr\Components\Bootstrap\ComponentInterface;
use Bpstr\Elements\Base\ElementInterface;
use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Image;

/**
 * Card class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/card/
 * @version 4.2.0
 */
class Card extends ContextualAwareComponent {
	const CKEY_DEFAULT_HEADER = 0xE0000;

	const CARD_BODY 	= 'card-body';
	const CARD_IMAGE 	= 'card-img';
	const CARD_HEADER 	= 'card-header';
	const CARD_FOOTER 	= 'card-footer';
	const CARD_TITLE 	= 'card-title';
	const CARD_SUBTITLE	= 'card-subtitle';
	const CARD_TEXT 	= 'card-text';
	const CARD_LINK 	= 'card-link';

	const CARD_IMG_OVERLAY  = 'card-img-overlay';
	const CARD_HEADER_TABS  = 'card-header-tabs';
	const CARD_HEADER_PILLS = 'card-header-pills';

	public $tag = 'div';
	public $family = 'card';

	function __construct (...$items) {
		parent::__construct(array_shift($items));
		$this->prepareContent($items);
	}

	public function prepareContent ($items) {
		if (!is_array($items)) {
			$items = [$items];
		}

		foreach ($items as $item) {
			if ($item instanceof ListGroup) {
				$item = $item->addClass(ListGroup::LIST_GROUP_FLUSH);
			}

			parent::prepareContent($item);
		}

		return $this;
	}

	/**
	 * @param $items
	 * @param null $key
	 *
	 * @return $this
	 */
	public function addBody($items, $key = NULL) {
		$body = Element::create('div')->addClass(self::CARD_BODY)->appendContent($items);
		$this->placeContent($key, $body);
		return $this;
	}

	/**
	 * @param $src
	 * @param string $alt
	 * @param string $placement
	 *
	 * @return $this
	 */
	public function addImage($src, $alt = '', $placement = 'top') {
		$image = Image::init($src, $alt);

		$image->addClass(sprintf('%s-%s',  self::CARD_IMAGE, $placement));

		if ($placement === 'top') {
			$this->prepareContent($image);
			return $this;
		}

		if ($placement === 'bottom') {
			$this->appendContent($image);
			return $this;
		}

		$this->placeContent($placement, $image);

		return $this;
	}


	public function addImageOverlay($items, $key = NULL) {


		return $this;
	}

	/**
	 * @param $content
	 * @param null $key
	 *
	 * @return $this
	 */
	public function wrapHeader($content, $key = NULL) {
		$header = Element::create('div', $content);
		return $this->addHeader($header, $key);
	}

	/**
	 * @param \Bpstr\Elements\Base\ElementInterface $content
	 * @param string|NULL $key
	 *
	 * @return $this
	 */
	public function addHeader(ElementInterface $content, string $key = NULL) {
		if ($content->hasClass(Nav::NAV_TABS)) {
			$content->addClass(self::CARD_HEADER_TABS);
		}

		if ($content->hasClass(Nav::NAV_PILLS)) {
			$content->addClass(self::CARD_HEADER_PILLS);
		}

		$content->addClass(self::CARD_HEADER);
		$this->placeContent($key ?? self::CKEY_DEFAULT_HEADER, $content);

		return $this;
	}

	/**
	 * @param $content
	 * @param null $key
	 * @param bool $text_muted
	 *
	 * @return $this
	 */
	public function addFooter($content, $key = NULL, $text_muted = true) {
		$footer = Element::create('div', $content)->addClass(self::CARD_FOOTER);
		if ($text_muted) {
			$footer->addClass(Bootstrap::TEXT_MUTED);
		}
		$this->placeContent($key, $footer);
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
