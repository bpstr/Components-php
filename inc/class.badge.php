<?php 
require_once ("abstract.class.php");

/**
 * Badges class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Badge extends Component {
	public $tag = "span"; 
	public $family = "badge"; 
	
	
	public $color_prefix = "badge-";
	
	function __construct ($text, $contextual = "primary") {
		$this->attributes["role"] = "alert";
		
		$this->contextual = $contextual;
		$this->addContent($text);
		
		
		return $this;
	}
	
	public function pill() {
		$this->addClass("badge-pill");
		return $this;
	}	
	
}

?>