<?php
/**
 * Breadcrumb class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/breadcrumb/
 * @version 4.2.0
 */

class Breadcrumb extends Component  {
	use Nested;

	const BREADCRUMB_ITEM = "breadcrumb-item";

	public $tag = "ol";
	public $family = "breadcrumb";

	public $items = array();

	function __construct ($items = array(), $active = NULL) {
		$this->wrap = new class extends Component { public $tag = 'nav'; };
		$this->wrap->attributes["aria-label"] = "breadcrumb";

		$this->addItems($items);
		if (!empty($active)) $this->activeItem($active);


		return $this;
	}

	public function addItem($key, $item, $active = false) {
		if ($item instanceof Element) {
			switch ($item->tag) {
				case 'a':
					$prepared = $item->wrap(Element::create("li")->addClass(self::BREADCRUMB_ITEM));
					break;
				case 'li':
					$prepared = $item->addClass(self::BREADCRUMB_ITEM);
					break;
				default:
					$prepared = Element::create("li")->addContent($item)->addClass(self::BREADCRUMB_ITEM);
					break;
			}
			if ($active) {
				$prepared->addClass("active");
				$this->attr("aria-current", "page");
			}
			$this->addContent($prepared, $key);
		} else {
			$this->addContent($item, $key);
		}
		return $this;
	}

}

?>
