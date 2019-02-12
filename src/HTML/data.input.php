<?php
require_once ("inc/abstract.element.php");

/**
 * Input HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 */

/**
 * @todo Support all HTML5 attributes: https://www.w3schools.com/tags/tag_input.asp
 */

 // Types of HTML input @source: https://www.w3schools.com/html/html_form_input_types.asp
define("INPUT_TYPES", array(
	 "text",
	 "password",
	 "submit",
	 "reset",
	 "radio",
	 "checkbox",
	 "button",
	 "color",
	 "date",
	 "datetime-local",
	 "email",
	 "file",
	 "month",
	 "number",
	 "range",
	 "search",
	 "tel",
	 "time",
	 "url",
	 "week"
));

class Input extends Element {
	public $tag = "input";

	public $type = "text";

	public $name;
	public $value;


	/**
	 * Construct Input
	 * @param string $type		Contents of heading tag
	 * @param mixed $name 		Name attribute of element
	 * @param mixed $value		Value attribute of element
	 *
 	 * @return object 			$this
	 */

	function __construct ($type, $name = NULL, $value = NULL) {
		$this->type($type);

		if (!empty($name)) $this->name = (string) $name;
		if (!empty($value)) $this->value = (string) $value;

	}

	public function type ($type) {
		if (in_array($type, $this->inputtypes)) $this->type = $type;
		return $this;
	}

}




?>
