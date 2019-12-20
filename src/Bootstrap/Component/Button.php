<?php

namespace Bpstr\Components\Bootstrap\Component;

use Bpstr\Components\Bootstrap;
use Bpstr\Components\Bootstrap\Behaviour\FamilyPrefixedContextualAwareComponent;
use Bpstr\Components\Bootstrap\Contextual;
use Bpstr\Components\Bootstrap\Traits\AnchorableComponentTrait;
use Bpstr\Components\Bootstrap\Traits\ScalableComponentTrait;

/**
 * Button class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 *
 * @link https://getbootstrap.com/docs/4.2/components/buttons/
 * @version 4.2.0
 */
class Button extends FamilyPrefixedContextualAwareComponent {
	use AnchorableComponentTrait, ScalableComponentTrait;

	const BUTTON_OUTLINE_COLOR = 'btn-outline-%s';
	const BUTTON_BLOCK = 'btn-block';
	const BUTTON_LINK = 'btn-link';

	protected $tag = 'button';

	protected $family = 'btn';

	public function __construct ($content, Contextual $contextual = NULL, $href = NULL) {
		parent::__construct($content, $contextual);

		if (!empty($href)) {
			$this->href($href);
		}
	}

	public function outline(Contextual $contextual = NULL) {
		if ($contextual !== NULL) {
			$this->contextual = $contextual;
		}
		$this->addClass(sprintf(self::BUTTON_OUTLINE_COLOR, $this->contextual));
		return $this;
	}

	public function block() {
		$this->addClass(self::BUTTON_BLOCK);
		return $this;
	}

	public function active() {
		$this->attributes['aria-pressed'] = 'true';
		$this->addClass(Bootstrap::CLASS_ACTIVE);
		return $this;
	}

	public function disable() {
		if ($this->tag === 'a') {
			$this->setAttribute('aria-disabled', 'true');
			$this->setAttribute('tabindex', '-1');
			$this->addClass(Bootstrap::CLASS_DISABLED);
		}
		$this->setAttribute('disabled', true);
		return $this;
	}

	public function btnlink() {
		$this->addClass(self::BUTTON_LINK);
		return $this;
	}

}
