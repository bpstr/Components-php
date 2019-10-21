<?php

namespace Bpstr\Components\Bootstrap\Component;

use Bpstr\Components\Bootstrap;
use Bpstr\Components\Bootstrap\Behaviour\FamilyPrefixedContextualAwareComponent;
use Bpstr\Components\Bootstrap\Contextual;
use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Heading;

/**
 * Alert class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 *
 * @link https://getbootstrap.com/docs/4.2/components/alerts/
 * @version 4.2.0
 */
class Alert extends FamilyPrefixedContextualAwareComponent {

	const ALERT_DISMISSIBLE = 'alert-dismissible';
	const ALERT_HEADING	= 'alert-heading';

	protected $tag = 'div';

	protected $family = 'alert';

	/**
	 * Creates an Alert component
	 *
	 * @param mixed $content
	 * @param \Bpstr\Components\Bootstrap\Contextual $contextual (default: primary)
	 */
	public function __construct ($content, $contextual = NULL) {
		parent::__construct($content, $contextual);

		$this->setAttribute('role', 'alert');
	}

	/**
	 * Adds heading to the alert
	 *
	 * @param mixed $content
	 *   Content of header tag
	 * @param integer $size
	 *   Size of header (<h*>)
	 *
	 * @return $this
	 */
	public function addHeading($content, $size = 4): self {
		$heading = ($content instanceof Heading) ? $content : new Heading($content, $size);

		$heading->addClass(self::ALERT_HEADING);

		$this->prependContent($heading);

		return $this;
	}

	/**
	 * Create dismissible alerts
	 *
	 * @param mixed $button
	 * @param boolean $animate
	 *
	 * @return $this
	 *
	 * @see https://getbootstrap.com/docs/4.2/components/alerts/#dismissing
	 */
	public function dismissible($button = '&times;', $animate = true): self {
		$this->addClass(self::ALERT_DISMISSIBLE);
		if ($animate) {
			$this->addClass(Bootstrap::ANIMATE_FADE, Bootstrap::ANIMATE_SHOW);
		}

		if (!$button instanceof Element) {
			$button = Bootstrap::CloseIcon($button);
		}

		$button->addClass(Bootstrap::CLASS_CLOSE);
		$button->data('dismiss', 'alert');

		$this->appendContent($button);

		return $this;
	}


}
