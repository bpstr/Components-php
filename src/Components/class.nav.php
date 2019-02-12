<?php




/**
 * Navs class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class Nav extends Component {
	const NAV_TABS  = "nav-tabs";
	const NAV_PILLS = "nav-pills";

	public $tag = "nav";
	public $family = "nav";

	function __construct ($items = array(), $pills = false, $fill = false) {
		if ($pills) $this->pills();
		if ($fill) $this->addClass("nav-fill");

		if (count($items) > 0) {
			foreach ($items as $itm) {
				$this->addItem($itm);
			}
		}
		return $this;
	}

	// When using a <nav>-based navigation, be sure to include .nav-item on the anchors.


	public function addItem ($item, $active = false, $disabled = false) {
		if ($item instanceof Anchor) {
			$item->addClass("nav-link");
			if ($this->tag == "ul") {
				$item->wrap = new class extends Component { public $tag = 'li'; };
				$item->wrap->addClass("nav-item");
			} else {
				$item->addClass("nav-item");
			}
			$this->addContent($item);
		} elseif (is_subclass_of($item, "Component")) {
			if ($item->tag == "a") {
				$item->addClass("nav-link");
				if ($this->tag == "ul") {
					$item->wrap = new class extends Component { public $tag = 'li'; };
					$item->wrap->addClass("nav-item");
				} else {
					$this->addClass("nav-item");
				}
			} elseif ($item->tag == "li") {
				$this->tag = "ul";
				$item->addClass("nav-item");
			}
			// Add dropdown
			if ($active) $this->addClass("active");
			if ($disabled) $this->addClass("disabled");
			$this->addContent($item);
		} elseif (is_array($item)) {
			foreach ($item as $itm) {
				$this->addItem($itm);
			}
			return $this;
		} else {
			$this->addContent($item);
		}
		return $this;
	}

	public function vertical($s = false, $m = false, $l = false) {
		if ($s || $m || $l) {
			if ($s) $this->addClass("flex-sm-column");
			if ($m) $this->addClass("flex-md-column");
			if ($l) $this->addClass("flex-lg-column");
		} else {
			$this->addClass("flex-column");
		}
	}

	public function tabs($card = false) {
		$this->removeClass("nav-pills");
		$this->addClass("nav-tabs");
		if ($card) $this->addClass("card-header-tabs");
		return $this;
	}

	public function pills($card = false) {
		$this->removeClass("nav-tabs");
		$this->addClass("nav-pills");
		return $this;
	}
}

// Add javascript content manipulation support
?>
