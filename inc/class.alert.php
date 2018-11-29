<?php 
require_once ("abstract.class.php");

/**
 * Alerts class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu> 
 */

class Alert extends Component {
	public $tag = "div"; 
	public $type = "alert"; 
	
	public $dismissible = false; 
	
	public $color_prefix = "alert-";
	
	function __construct ($text, $contextual = "primary") {
		$this->attributes["role"] = "alert";
		
		$this->contextual = $contextual;
		$this->addContent($text);
		
		
		return $this;
	}
	
	public function dismissible($btn = NULL, $animate = true) {
		$this->addClass("alert-dismissible");
		if ($animate) {
			$this->addClass("fade");
			$this->addClass("show"); 
		}
		
		if (!empty($btn)) {
			$this->addContent($btn);
		} else {
			$this->addContent('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
		}
		return $this;
	}
	
	
}

?>