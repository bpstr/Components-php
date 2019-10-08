<?php

namespace Bpstr\Components\Bootstrap\Component;

use Bpstr\Components\Bootstrap;
use Bpstr\Components\Bootstrap\Behaviours\ContextualAvareFamilyPrefixedComponent;
use Bpstr\Components\Bootstrap\Contextual;
use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Heading;

/**
 * Alert class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 *
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/alerts/
 * @version 4.2.0
 */
class Alert extends ContextualAvareFamilyPrefixedComponent {

	const ALERT_DISMISSIBLE = 'alert-dismissible';
	const ALERT_HEADING		= 'alert-heading';

	public $tag = 'div';

	public $family = 'alert';

	/**
	 * Creates an Alert component
	 *
	 * @param mixed $content
	 * @param \Bpstr\Components\Bootstrap\Contextual $contextual (default: primary)
	 */
	public function __construct ($content, $contextual = NULL) {
		parent::__construct($content, $contextual ?? Contextual::primary());

		$this->attributes['role'] = 'alert';

		$this->appendContent($content);
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
	public function dismissible($button = NULL, $animate = true): self {
		$this->addClass(self::ALERT_DISMISSIBLE);
		if ($animate) {
			$this->addClass(Bootstrap::ANIMATE_FADE, Bootstrap::ANIMATE_SHOW);
		}

		if (empty($button)) {
			$button = Bootstrap::CloseIcon();
		}

		if ($button instanceof Element) {
			$button->addClass(Bootstrap::CLASS_CLOSE);
		}

		$this->appendContent($button);

		return $this;
	}


}

?>
