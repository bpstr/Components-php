<?php
/**
 * Font util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 *
 * @see https://getbootstrap.com/docs/4.2/utilities/text/#font-weight-and-italics
 */

class Font extends Utility {

	const WEIGHT_BOLD 	 = "weight-bold";
	const WEIGHT_BOLDER  = "weight-bolder";
	const WEIGHT_NORMAL  = "weight-normal";
	const WEIGHT_LIGHT 	 = "weight-light";
	const WEIGHT_LIGHTER = "weight-lighter";
	const ITALIC 		 = "italic";

	public function __construct ($style) {
		if (strpos($style, "weight") === false && $style != "italic") $style = "weight-".$style;
		if (in_array($style, FONT_UTILS)) {
			$this->addClass("font-".$style);
		}
		return $this;
	}

	function __toString () {

	}

}


?>
