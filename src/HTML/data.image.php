<?php
/**
 * Image HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 * @version 5.0 HTML5
 */

/**
 * @todo Support all HTML5 attributes: https://www.w3schools.com/tags/tag_img.asp
 * @todo Possibly add support for mapping (waaay ahead)
 */


class Image extends Element {
	public $tag = "img";

	/**
	 * Construct Div
	 * @param string $src		Specifies the URL of an image
	 * @param string $alt		Alternate text for an image (if not null but empty basename of src is set)
	 *
 	 * @return object 			$this
	 */

	function __construct (string $src, $alt = "") {
		$this->attr("src", $src);
		$alternative = (empty($alt) && $alt !== NULL) ? basename($src) : $alt;
		$this->attr("alt", $alternative);
		return $this;
	}

}

class_alias('Image', 'Img');


?>
