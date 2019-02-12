<?php
require_once ("abstract.class.php");
require_once ("class.button.php");

/**
 * Dropdown class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class Dropdown extends Component {

	const DROPDOWN_MENU 	= "dropdown-menu";
	const DROPDOWN_TOGGLE 	= "dropdown-toggle";

	public $tag = "div";
	public $family = "dropdown-menu";

	function __construct ($items = array(), $name, $wrapclass = "dropdown") {
		$button = ($name instanceof Button) ? $name : new Button($name);
		$button->addClass(self::DROPDOWN_TOGGLE);
		$button->attr("data-toggle", "dropdown");
		$button->attr("aria-haspopup", "true");
		$button->attr("aria-expanded", "false");
		$this->contents["button"] = $button;

		$this->wrap = (new Div ())->addClass("dropdown");
		if (count($items) > 0) {
			foreach ($items as $itm) {
				$this->addItem($itm);
			}
		}
		return $this;
	}

	public function addItem ($item) {
		if (is_subclass_of($item, "Component")) {
			if ($item->tag == "a")$item->addClass("dropdown-item");
			$this->addContent($item);
		} elseif (is_array($item)) {
			foreach ($item as $itm) {
				$this->addItem($itm);
			}
		} elseif ($item == "divider") {
			$this->addContent((new Div ())->addClass("dropdown-divider"));
		} else {
			$this->addContent($item);
		}
		return $this;
	}

	public function splitButton (Button $btn) {
		$this->wrap->removeClass("dropdown");
		$this->wrap->addClass("btn-group");



		$this->before->before = $btn;
		$this->before->addClass("dropdown-toggle-split");

		$split = new class extends Component { public $tag = 'span'; };
		$split->addClass("sr-only");
		//$split->addContent($this->before->contents);
		$this->before->contents = array($split);
		return $this;
	}

	public function direction ($dir = "bottom") {

	}

}


?>
