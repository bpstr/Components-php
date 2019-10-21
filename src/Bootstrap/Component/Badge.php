<?php

namespace Bpstr\Components\Bootstrap\Component;

use Bpstr\Components\Bootstrap\Behaviour\FamilyPrefixedContextualAwareComponent;
use Bpstr\Components\Bootstrap\Contextual;
use Bpstr\Components\Bootstrap\Traits\AnchorableComponentTrait;

/**
 * Badges class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 *
 * @link https://getbootstrap.com/docs/4.2/components/badge/
 * @version 4.2.0
 */
class Badge extends FamilyPrefixedContextualAwareComponent {
	use AnchorableComponentTrait;

	const BADGE_PILL = 'badge-pill';

	protected $tag = 'span';

	protected $family = 'badge';

	public function pill() {
		$this->addClass(self::BADGE_PILL);
		return $this;
	}

}
