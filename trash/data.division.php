<?php
require_once ("inc/abstract.element.php");

/**
 * Division HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 */

class Division extends Element {
	public $tag = "div";

	/**
	 * Construct Div
	 * @param mixed $content	Contents of div tag
	 *
 	 * @return object 			$this
	 */
	function __construct ($content = NULL) {
		if (!empty($content)) $this->addContent($content);
		return $this;
	}

}

class_alias('Division', 'Div');

?>
