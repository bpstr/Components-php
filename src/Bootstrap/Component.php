<?php

namespace Bpstr\Components\Bootstrap;

use Bpstr\Components\Exception\BootstrapRenderException;
use Bpstr\Elements\Html\Element;

abstract class Component extends Element implements ComponentInterface {

	protected $family;

	public function __construct() {
		parent::__construct($this->tag);
		$this->addClass($this->family);
	}

	public function render(array $element = [], array $additional_attributes = []): string {
		if (empty($this->family)) {
			throw new BootstrapRenderException('Component family must be defined!');
		}

		return parent::render();
	}

}
