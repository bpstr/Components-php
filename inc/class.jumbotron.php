<?php 
require_once ("abstract.class.php");

/**
 * Jumbotron class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Jumbotron extends Component {
	public $tag = "div"; 
	public $family = "jumbotron"; 
	
	function __construct ($content, $fluid = false) {
		$this->addContent($content);
		if ($fluid) $this->addClass("jumbotron-fluid");
	}
	
}

?>