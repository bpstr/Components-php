<?php
/**
 * Anchor HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 * @version 5.0 HTML5
 */

class Anchor extends Element {
	const TARGET_VALUES = array('blank', 'self', 'parent', 'top');

	public $tag = "a";


	/**
	 * Construct Anchor
	 * @param mixed $content	Contents of anchor tag
	 * @param string $href 		Href tag of anchor
	 * @param string $target	Target tag of anchor (without _)
	 *
 	 * @return object 			$this
	 */

	function __construct ($content, $href = "#", $target = NULL) {
		$this->addContent($content);
		if (!is_null($href)) $this->attr("href", $href);
		return $this;
	}

	public function href(string $str) {
		$this->href = $str;
	}

	public function target(string $str) {
		if (in_array($str, TARGET_VALUES)) $str = "_".$str;
		$this->attr("target", $str);
	}

}

?>
