<?php 
require_once ("abstract.class.php");

/**
 * Dropdown class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Dropdown extends Component {
	
	public $tag = "div"; 
	public $family = "dropdown";  
	
	function __construct ($buttons) { 
		$this->addContent($text); 
		return $this;
	}
	
}

class DropdownMenu extends Component {
	public $tag = "div"; 
	public $family = "dropdown-menu";  
}

/*continue.... and clear shite up*/

?>