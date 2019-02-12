<?php
/**
 * Spacing.Padding util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 *
 * @see https://getbootstrap.com/docs/4.2/utilities/spacing/
 */

class Padding extends Utility {

	/**
	 * Set padding of component (same as margin except there negative values are also handled)
	 * @param  mixed $size        Size of padding
	 * 								1-5|auto will add bootstrap spacing class
	 * 								Any other numeric value will set inline style padding: $size px
	 * 								Any other values can be passed as string
	 * @param  string $edge       Must be a valid SPACING_SIDES or DIRECTIONS value! (Ignored otherwise)
	 * @param  string $breakpoint Restrict application to certain breakpoints. (Will not be handled on inline style paddings!)
	 * @return $this      		  Current element
	 *
	 *
	 */

	public function __construct ($size, string $edge = NULL, string $breakpoint = NULL) {
		if (in_array($edge, DIRECTIONS)) $edge = substr($edge, 0, 1);

		if (in_array($size, array(1, 2, 3, 4, 5, "auto"))) {
			$class = "p-";
			if (in_array($edge, SPACING_SIDES)) $class .= $edge."-";
			if (in_array($breakpoint, BREAKPOINTS)) $class .= $breakpoint."-";
			$class .= $size;
			$this->addClass($class);
		} else {
			if (is_numeric($size)) $size .= "px";
			if (empty($edge)) {
				$property = array("padding");
			} else {
				$index = array_search($edge, SPACING_SIDES);
				$property = ($index) ? ($property = (in_array($index, DIRECTIONS)) ? array("padding-".DIRECTIONS[$index]) : (($edge == "x") ? array("padding-left", "padding-right") : array("padding-top", "padding-bottom"))) : $property = array("padding");
			}
			foreach ($property as $prop) {
				$this->style($prop, $size);
			}
		}
		return $this;
	}

	function __toString () {

	}

}


?>
