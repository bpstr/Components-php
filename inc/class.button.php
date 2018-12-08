<?php 
require_once ("abstract.class.php");

/**
 * Button class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Button extends Component {
	public $tag = "button"; 
	public $family = "btn"; 
	
	public $valid_tags = array("a", "button", "input");
	
	public $color_prefix = "btn-";
	
	function __construct ($text, $contextual = "", $href = NULL) {
		/*create proper a btn or button*/
		if (!empty($href)) {
			$this->setTag("a");
			$this->href = $href;
		}
		
		
		$this->contextual = $contextual;
		$this->addContent($text);
		
		
		return $this;
	}
	
	public function setTag($tag) {
		if (in_array($tag, $this->valid_tags)) {
			if ($tag == "a") {
				$this->attributes["role"] = "button";
			} elseif ($tag == "button") {
				$this->attributes["type"] = "submit";
			} elseif ($tag == "input") {
				$this->attributes["type"] = "button";
				$this->attributes["value"] = strip_tags(implode("", $this->contents)); 
			}
			$this->tag = $tag;
		}
		return $this;
	}
	
	public function outline($contextual = NULL) {
		if (!empty($contextual)) $this->contextual = $contextual;
		$this->addClass("btn-outline-".$this->contextual);
		return $this;
	}
	
	public function large() {
		$this->addClass("btn-lg");
		return $this;
	}
	
	public function small() {
		$this->addClass("btn-sm");
		return $this;
	}	
	
	public function block() {
		$this->addClass("btn-block");
		return $this;
	}	
	
	public function active() {
		$this->attributes["aria-pressed"] = "true";
		$this->addClass("active");
		return $this;
	}	
	
	public function disable() {
		if ($this->tag == "a") {
			$this->attributes["aria-disabled"] = "true";
			$this->attributes["tabindex"] = "-1";
			$this->addClass("disabled");
		} else {
			$this->attributes["disabled"] = "disabled";
		}
		return $this;
	}	
	
	public function btnlink() {
		$this->addClass("btn-link");
		return $this;
	}
	
	
	// Collapses easy setup 
	public function collapse($selector) {
		$this->attr("data-toggle", "collapse");
		if (strpos($selector, "#") === false && strpos($selector, ".") === false) $selector = "#".$selector;
		$this->attr("data-target", $selector);
		
		return $this;
	}
	
	
}

?>