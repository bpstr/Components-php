<?php

namespace Bpstr\Components\Bootstrap\Behaviour;

use Bpstr\Components\Bootstrap\Contextual;

abstract class FamilyPrefixedContextualAwareComponent extends ContextualAwareComponent {

	public function __construct ($content, Contextual $contextual = NULL) {
		parent::__construct($content, $contextual ?? Contextual::primary());
		$this->addClass(sprintf('%s-%s', $this->family, $this->contextual));
	}

}
