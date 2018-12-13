<?php 
require_once ("abstract.class.php");

/**
 * ListGroup class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class ListGroup extends Component {
	public $tag = "ul";
	public $family = "list-group";
	
	function __construct ($items = array()) {
		if (count($items) > 0) {
			foreach ($items as $itm) {
				$this->addItem($itm);
			} 
		}
		return $this;
	}
	
	public function addItem ($item) {
		if (is_subclass_of($item, "Component")) {
			if ($item->tag == "li") $item->addClass("list-group-item");
			if ($item->tag == "a" || $item->tag == "button") {
				$this->tag = "div";
				$item->addClass("list-group-item list-group-item-action");
			}
			$this->addContent($item);  
		} elseif (is_array($item)) {
			foreach ($item as $itm) {
				$this->addItem($itm);
			}
		} else {
			$this->addContent($item); 
		}
		return $this;
	}
	
	
}

?>