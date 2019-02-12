<?php
/**
 * Button group class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/button-group/
 * @version 4.2.0
 */

class ButtonGroup extends Component {
	use Nested, Scalable;

	const BUTTON_GROUP_VERTICAL = "btn-group-vertical";

	public $tag = "div";
	public $family = "btn-group";

	function __construct ($items = array(), $active = NULL) {
		$this->attributes["role"] = "group";

		$this->addItems($items);
		if (!empty($active)) $this->activeItem($active);

		return $this;
	}

	public function addItem ($key, $item) {
		if ($item instanceof Dropdown || ($item instanceof Element && $item->hasClass("dropdown"))) {
			$item->removeClass("dropdown");
			$item->addClass("btn-group");
		}
		$this->addContent($item, $key);

		return $this;
	}

	public function vertical() {
		$this->addClass(self::BUTTON_GROUP_VERTICAL);
		return $this;
	}



}

?>
