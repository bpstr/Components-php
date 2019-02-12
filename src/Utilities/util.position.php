<?php
/**
 * Overflow util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class Position extends Utility {

	const {"STATIC"} = "static";
	const RELATIVE	 = "relative";
	const ABSOLUTE   = "absolute";
	const FIXED		 = "fixed";
	const STICKY 	 = "sticky";


	/**
	 * Position of the component
	 * @param  string $pos 		Value of POSITIONS
	 * @return $this      		Current element
	 *
	 * @see: https://getbootstrap.com/docs/4.2/utilities/position/
	 * @todo: support fixed-top|fixed-bottom|sticky-top
	 */

	public function __construct (string $pos) {
		// -
		//  sprintf("position-%s", $direction);
		return $this;
	}


	function __toString () {

	}

}


?>
