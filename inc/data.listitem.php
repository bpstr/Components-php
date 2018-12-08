<?php 
require_once ("abstract.class.php");

/**
 * Badges class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>  22:30
 */

class ListItem extends Component {
	public $tag = "li";
	
	function __construct ($text, $contextual = "") {
		$this->addContent($text);
		$this->contextual = $contextual;
		
		return $this;
	}
	
}

?>