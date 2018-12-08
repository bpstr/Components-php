<?php 
require_once ("abstract.class.php");

/**
 * Badges class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>  22:30
 */

class ListWrap extends Component {
	public $tag = "ul";
	
	function __construct ($ordered = false) {
		if ($ordered) $this->tag = "ol";
		return $this;
	}
	
}

?>