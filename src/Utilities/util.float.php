<?php
/**
 * Float util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class Float extends Utility {

	const NONE			= "none";
	const RIGHT 		= "right";
	const LEFT 		 	= "left";

	/**
	 * Usage: $element->float(Float::RIGHT, Bootstrap::BREAKPOINT_SM);
	 *
	 * @see https://getbootstrap.com/docs/4.2/utilities/float/
	 */

	public function __construct ($direction, $breakpoint = NULL) {
		$float = (in_array($breakpoint, BREAKPOINTS)) ? sprintf("float-%s-%s", $breakpoint, $direction) : sprintf("float-%s", $direction);
		$this->addClass($float);
		return $this;
	}

	function __toString () {

	}

}


?>
