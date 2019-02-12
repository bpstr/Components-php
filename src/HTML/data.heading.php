<?php
/**
 * Heading HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 * @version 5.0 HTML5
 */

class Heading extends Element {

	/**
	 * Construct Heading
	 * @param mixed $content	Contents of heading tag
	 * @param int $size 		Size of heading tag
	 *
 	 * @return object 			$this
	 */

	function __construct ($content, int $size = 1) {
		$size = max(1, min(6, $size));
		$this->tag = "h$size";
		$this->addContent($content);
		return $this;
	}

}

?>
