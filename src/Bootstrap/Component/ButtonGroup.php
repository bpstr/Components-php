<?php

namespace Bpstr\Components\Bootstrap\Component;

use Bpstr\Components\Bootstrap;
use Bpstr\Components\Bootstrap\Behaviour\NestedComponent;
use Bpstr\Components\Bootstrap\Traits\ScalableComponentTrait;
/**
 * Button group class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/button-group/
 * @version 4.2.0
 */
class ButtonGroup extends NestedComponent {
	use ScalableComponentTrait;

	const BUTTON_GROUP_VERTICAL = 'btn-group-vertical';

	public $tag = 'div';

	public $family = 'btn-group';

	function __construct($items = array(), $active_item = NULL) {
		parent::__construct($items, Bootstrap\Component::create('div'), $active_item);
		$this->attributes->set('role', 'group');
	}

	public function vertical() {
		$this->addClass(self::BUTTON_GROUP_VERTICAL);
		return $this;
	}



}
