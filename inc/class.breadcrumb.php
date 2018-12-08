<?php 
require_once ("abstract.class.php");

/**
 * Breadcrumb class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>
  
 FIX: element ID bug
 
 */

class Breadcrumb extends Component {
	public $tag = "ol"; 
	public $family = "breadcrumb"; 
	
	public $separator = ">";
	
	public $items = array();
	
	function __construct (array $items = array(), $contextual = "primary") {
		$this->wrap = new class extends Component { public $tag = 'nav'; };
		$this->wrap->attributes["aria-label"] = "breadcrumb";
		
		
		// $this->contextual = $contextual; 
		
		foreach ($items as $anchor) {
			$this->addItem($anchor);
		}
		
		
		return $this;
	}
	
	// Possible use with Anchor element or html <a> tag.
	public function addItem($anchor, $active = false) {
		$li = new ListItem($anchor);
		$li->addClass("breadcrumb-item");
		if ($active) {
			$li->addClass("active");
			$this->attributes["aria-current"] = "page";
		}
		$this->addContent($li);
		return $this;
	}	
	
	public function setSeparator ($divider, $id = NULL) {
		if (!empty($this->id)) $this->id = $id;
		$IDselector = (!empty($this->id)) ? '#'.$this->id.' ' : '';
		if (empty($IDselector)) {
			$this->style = '.breadcrumb-item+.breadcrumb-item::before { content: "'.$divider.'"; }';
		} else {
			$this->style = $IDselector.'.breadcrumb-item:before { content: "'.$divider.'"; } '.$IDselector.'.breadcrumb-item:first-of-type:before { content: ""; }';
		}
		return $this;
	}
	
}

?>