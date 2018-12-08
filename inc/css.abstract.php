<?php 
require_once ("abstract.class.php");

class Style extends Component  {
	public $tag = "style";
		
	public function addCSS (CSS $stylesheet) {
		$this->addContent((string) $stylesheet);
	}
	
}


?>