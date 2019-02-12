<?php 
require_once ("abstract.class.php");

/**
 * Pagination class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Pagination extends Component {
	public $tag = "ul"; 
	public $family = "pagination"; 
	
	function __construct ($start = 1, $end = 10, $current = 1, $shw = 5) {
		$this->wrap = (new class extends Component { public $tag = 'nav'; })->attr("aria-label", "Page navigation"); /* optional */
		
		foreach ($bars as $bar) {
			$this->addContent($bar);
		}
	}
	
	public function addSymbols () {
		
	}
}
 

?>