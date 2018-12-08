<?php 
require_once ("abstract.class.php");

/**
 * Collapse class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Collapse extends Component {
	
	public $tag = "div"; 
	public $family = "collapse";  
	
	function __construct ($text, $id) { 
		$this->addContent($text); 
		return $this;
	}
	
}

?>