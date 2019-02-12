<?php 
require_once ("abstract.class.php");
require_once ("class.dropdown.php");

/**
 * Navbar class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Navbar extends Component {
	
	public $tag = "nav"; 
	public $family = "navbar";  
	
	function __construct ($items = array(), $expand = "lg") { 
		if ($expand) $this->addClass("navbar-expand-$expand");  
		
		if (count($items) > 0) {
			foreach ($items as $itm) {
				$this->addItem($itm);
			} 
		}
		return $this;
	}
	
	public function addBrand (Anchor $brand) {
		$brand->addClass("navbar-brand");
		$this->addContent($brand, true);
	}
	
	public function addItem ($item, $active = false, $disabled = false) {
		if ($item instanceof Anchor) {

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
				$this->tag == "ul";
				$this->addClass("nav-item");
			}
			// Add dropdown
			if ($active) $this->addClass("active");
			if ($disabled) $this->addClass("disabled"); 
			$this->addContent($item);
		} elseif (is_array($item)) {
			foreach ($item as $itm) {
				$this->addItem($itm);
			}
		} else {
			$this->addContent($item); 
		}
		return $this;
	}
	
	
}

// Add predefined content fields! 
?>