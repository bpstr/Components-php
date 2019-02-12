<?php
require_once ("inc/abstract.element.php");

/**
 * Textarea HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 */

/**
 * @todo Support all HTML5 attributes: https://www.w3schools.com/tags/tag_textarea.asp
 */

class Textarea extends Element {
	public $tag = "textarea";


	/**
	 * Construct Textarea
	 * @param mixed $content	Content of element
	 * @param mixed $name 		Name attribute of element
	 * @param int $cols			Cols attribute of element
	 * @param int $rows			Rows attribute of element
	 *
 	 * @return object 			$this
	 */

	function __construct ($content = "", $name = NULL, int $cols = NULL, int $rows = NULL) {
		$this->addContent($content);

		if (!empty($name)) $this->name = (string) $name;
		if (!empty($cols)) $this->attr("cols", $cols);
		if (!empty($rows)) $this->attr("rows", $rows);

		return $this;
	}

}
?>
