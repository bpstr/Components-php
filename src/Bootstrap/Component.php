<?php

namespace Bpstr\Components\Bootstrap;

use Bpstr\Elements\Html\Element;

abstract class Component extends Element implements ComponentInterface {

	public $family;

	public function __construct() {
		parent::__construct($this->tag);
	}

	public function render(): string {
		// @todo RenderException
		if (empty($this->family)) throw new \LogicException('Component family must be defined!');
		array_unshift($this->classes, $this->family);

		return parent::render();
	}

}
