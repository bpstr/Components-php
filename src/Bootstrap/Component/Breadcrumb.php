<?php

namespace Bpstr\Components\Bootstrap\Component;

use Bpstr\Components\Bootstrap\Behaviour\NestedComponent;
use Bpstr\Elements\Base\ElementContentCollection;
use Bpstr\Elements\Base\ElementInterface;
use Bpstr\Elements\Html\Element;

/**
 * Breadcrumb class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 *
 * @link https://getbootstrap.com/docs/4.2/components/breadcrumb/
 * @version 4.2.0
 */
class Breadcrumb extends NestedComponent {

	const BREADCRUMB_ITEM = 'breadcrumb-item';

	protected $tag = 'ol';

	protected $family = 'breadcrumb';

	public function __construct ($items = array(), $activeItem = NULL) {
		parent::__construct();
		$this->wrap(Element::create('nav'));
		$this->wrap->setAttribute('aria-label', 'breadcrumb');

		$this->prepareContent(new ElementContentCollection($items, Element::create('li')->addClass(self::BREADCRUMB_ITEM)));
		if ($activeItem instanceof ElementInterface) {
			$this->activateItem($activeItem);
		}
	}

}
