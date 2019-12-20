<?php

namespace Bpstr\Components;

use Bpstr\Components\Bootstrap\Component;
use Bpstr\Elements\Html\Element;

class Bootstrap {

	/**
	 * @todo Separate translations
	 */
	const LABEL_CLOSE = 'Close';
	const LABEL_PREVIOUS = 'Previous';
	const LABEL_NEXT = 'Next';

	/**
	 * Bootstrap sizes.
	 */
	const SIZE_XSMALL = 'xs';
	const SIZE_SMALL  = 'sm';
	const SIZE_MEDIUM = 'md';
	const SIZE_LARGE  = 'lg';
	const SIZE_XLARGE = 'xl';

	/**
	 * Bootstrap breakpoints.
	 * @link https://getbootstrap.com/docs/4.2/layout/grid/#all-breakpoints
	 * @link https://getbootstrap.com/docs/4.2/layout/overview/#responsive-breakpoints
	 *
	 * @see utils.display
	 * @todo
	 */
	const BREAKPOINT_SMALL  = 'sm';
	const BREAKPOINT_MEDIUM = 'md';
	const BREAKPOINT_LARGE  = 'lg';
	const BREAKPOINT_XLARGE = 'xl';

	/**
	 * Bootstrap Colors.
	 *
	 * @link https://getbootstrap.com/docs/4.2/utilities/colors/
	 * Used: utils.text
	 */
	const TEXT_PRIMARY 	 = 'text-primary';
	const TEXT_SECONDARY = 'text-secondary';
	const TEXT_SUCCESS 	 = 'text-success';
	const TEXT_DANGER	 = 'text-danger';
	const TEXT_WARNING	 = 'text-warning';
	const TEXT_INFO 	 = 'text-info';
	const TEXT_LIGHT	 = 'text-light';
	const TEXT_DARK 	 = 'text-dark';
	const TEXT_BODY 	 = 'text-body';
	const TEXT_MUTED 	 = 'text-muted';
	const TEXT_WHITE 	 = 'text-white';
	const TEXT_WHITE_50	 = 'text-white-50';
	const TEXT_BLACK 	 = 'text-black';
	const TEXT_BLACK_50	 = 'text-black-50';

	const BG_PRIMARY	 = 'bg-primary';
	const BG_SECONDARY	 = 'bg-secondary';
	const BG_SUCCESS	 = 'bg-success';
	const BG_DANGER		 = 'bg-danger';
	const BG_WARNING 	 = 'bg-warning';
	const BG_INFO 		 = 'bg-info';
	const BG_LIGHT 		 = 'bg-light';
	const BG_DARK 		 = 'bg-dark';
	const BG_WHITE 		 = 'bg-white';
	const BG_TRANSPARENT = 'bg-transparent';

	const GRADIENT_PRIMARY 	 = 'bg-gradient-primary';
	const GRADIENT_SECONDARY = 'bg-gradient-secondary';
	const GRADIENT_SUCCESS	 = 'bg-gradient-success';
	const GRADIENT_DANGER	 = 'bg-gradient-danger';
	const GRADIENT_WARNING	 = 'bg-gradient-warning';
	const GRADIENT_INFO		 = 'bg-gradient-info';
	const GRADIENT_LIGHT	 = 'bg-gradient-light';
	const GRADIENT_DARK 	 = 'bg-gradient-dark';

	/**
	 * Bootstrap DIRECTIONS
	 * @link https://getbootstrap.com/docs/4.2/utilities/borders/
	 * @link https://getbootstrap.com/docs/4.2/utilities/spacing/
	 */
	const DIRECTION_TOP    = 'top';
	const DIRECTION_RIGHT  = 'right';
	const DIRECTION_BOTTOM = 'bottom';
	const DIRECTION_LEFT   = 'left';

	const SIDE_TOP	  = 't';
	const SIDE_RIGHT  = 'r';
	const SIDE_BOTTOM = 'b';
	const SIDE_LEFT   = 'l';
	const SIDE_X	  = 'x';
	const SIDE_Y	  = 'y';

	/**
	 * Common Bootstrap classes
	 */
	const CLASS_CLOSE	 = 'close';

	const CLASS_ACTIVE	 = 'active';
	const CLASS_DISABLED = 'disabled';

	const CLASS_SHOW	 = 'show';

	/**
	 * Bootstrap Animations
	 *
	 * @see class.alerts.php
	 */
	const ANIMATE_FADE = 'fade';
	const ANIMATE_SHOW = 'show';


	/**
	 * @param null $content
	 *
	 * @return \Bpstr\Elements\Html\ElementInterface
	 * @todo Find source
	 */
	public static function ButtonToolbar ($content = NULL) {
		$toolbar = Element::create('div', $content);
		$toolbar->addClass('btn-toolbar');
		$toolbar->attr('role', 'toolbar');
		return $toolbar;
	}

	/**
	 * Create Bootstrap Close Icon
	 *
	 * Note: Using ASCII Multiplication X by default to properly fit inline
	 *
	 * @link https://getbootstrap.com/docs/4.2/utilities/close-icon/
	 * @todo Move?
	 *
	 * @see \Bpstr\Components\Bootstrap\Component\Alert::dismissible
	 *
	 * @param string $symbol
	 * @param string $label
	 *
	 * @return \Bpstr\Elements\Html\ElementInterface
	 */
	public static function CloseIcon ($symbol = '&#x2715;', $label = self::LABEL_CLOSE) {
		$span = Element::create('span', $symbol)->attr('aria-hidden', 'true');
		return Element::create('button', $span)
			->addClass(self::CLASS_CLOSE)
			->attr('type', 'button')
			->attr('aria-label', $label);
	}



	public static function sprefix ($prefix, $string, $delimiter = '-') {
		if (strpos($string, $prefix.$delimiter) === 0) return $string;
		return $prefix.$delimiter.$string;
	}
}
