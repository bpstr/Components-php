<?php 
require_once ("abstract.class.php");

/**
 * Badges class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>  22:30
 */

class Anchor extends Component {
	public $tag = "a";
	
	function __construct ($content, $href = "#") {
		$this->addContent($content);
		$this->href = $href;
	}
	
}

?>