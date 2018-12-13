<?php 
require_once ("abstract.class.php");

/**
 * Anchor class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Anchor extends Component {
	public $tag = "a";
	
	function __construct ($content, $href = "#") { // Switch it later
		$this->addContent($content);
		$this->href = $href;
	}
	
}

?>