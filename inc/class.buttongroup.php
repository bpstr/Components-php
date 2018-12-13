<?php 
require_once ("abstract.class.php");

/**
 * ButtonGroup class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class ButtonGroup extends Component {
	public $tag = "div"; 
	public $family = "btn-group"; 
	
	// public $color_prefix = "btn-";
	
	function __construct (array $items = array(), $contextual = "") {
		$this->attributes["role"] = "group";
		$this->attributes["aria-label"] = "Button Group"; // Label Should be label
		
		foreach ($items as $button) {
			$this->addItem($button);
		}
		
		
		return $this;
	}
	
	// Use with Button element.
	public function addItem(Button $button, $active = false) {
		$this->addContent($button);
		return $this;
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

?>