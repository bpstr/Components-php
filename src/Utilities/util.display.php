<?php
/**
 * Display util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 */

/**
 * @dafaq: How display classes will be used?
 * 	$element->display(Display::BLOCK, BREAKPOINT_SM);
 *
 * @todo: support print DISPLAY
 * 	$element->display(Display::BLOCK, Display::PRINT);
 *
 * @todo: https://getbootstrap.com/docs/4.2/utilities/display/#hiding-elements -> convert to functions
 * @todo: DONT support empty constructors: $element->display()->hideOnSmallOnly();
 * 									INSTEAD: $element->display->hideOnSmallOnly();!!!
 *
 */

class Display extends Utility {

	const NONE			= "none";
	const INLINE 		= "inline";
	const INLINE_BLOCK 	= "inline-block";
	const BLOCK 		= "block";
	const TABLE 		= "table";
	const TABLE_CELL	= "table-cell";
	const TABLE_ROW		= "table-row";
	const FLEX 			= "flex";
	const INLINE_FLEX	= "inline-flex";

	/**
	 * Set display class to the component
	 * @param  string $value     	Any valid display value (see DISPLAY_VALUES)
	 * @param  string $breakpoint	Breakpoint value (BREAKPOINTS|print)
	 * @return $this             	Current element
	 *
	 * @see https://getbootstrap.com/docs/4.2/utilities/display/
	 * @todo Validate breakpoint values
	 */

	public function __construct (string $value, string $breakpoint = NULL) {
		$class = empty($breakpoint) ? sprintf('d-$s', $value) : sprintf('d-$s-$s', $breakpoint, $value);
		$this->addClass($class);

		return $this; // Important
	}

}


?>
