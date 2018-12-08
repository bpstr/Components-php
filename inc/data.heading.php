<?php 
require_once ("abstract.class.php");

/**
 * Badges class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>  22:30
 */

class Heading extends Component {
	
	function __construct ($text, int $size = 1) {
		$size = max(1, min(6, $size));
		$this->tag = "h$size";
		$this->addContent($text);
		return $this;
	}
	
}

?>