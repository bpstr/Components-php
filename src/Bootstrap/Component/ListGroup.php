<?php

use Bpstr\Components\Bootstrap\Behaviour\ContextualAwareComponent;
use Bpstr\Components\Bootstrap\Behaviour\FamilyPrefixedContextualAwareComponent;
use Bpstr\Components\Bootstrap\Behaviour\NestedComponent;
use Bpstr\Components\Bootstrap\Component;
use Bpstr\Elements\Html\Element;

/**
 * Alert class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 *
 * @link
 * @version 4.2.0
 */
class ListGroup extends NestedComponent {

	const LIST_GROUP_FLUSH = 'list-group-flush';

	public $tag = 'ul';
	public $family = 'list-group';

	function __construct (string $tag, array $items, string $active_item = '') {

		parent::__construct($items, );
	}

	public function addItem ($item) {
		if (is_subclass_of($item, "Component")) {
			$item->family = "list-group-item";
			$item->color_prefix = "list-group-item-";
			if ($item->tag == "li") $item->addClass("list-group-item");
			if ($item->tag == "a" || $item->tag == "button") {
				$this->tag = "div";
				$item->addClass("list-group-item-action");
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
