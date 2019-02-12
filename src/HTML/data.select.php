<?php
require_once ("inc/abstract.element.php");

/**
 * Select HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 */

/**
 * @todo Support all HTML5 attributes: https://www.w3schools.com/tags/tag_select.asp
 */

class Select extends Element {
	public $tag = "select";

	public $name;

	public $selected_value = NULL;


	/**
	 * Construct Select
	 * @param array $options	Array of options to add (associative)
	 * @param mixed $name 		Name attribute of element
	 * @param mixed $value		Value attribute of element
	 *
 	 * @return object 			$this
	 */

	function __construct (array $options = array(), $name = NULL, $value = NULL) {
		foreach ($options as $key => $value) {
			$this->addOption($key, $value);
		}

		if (!empty($name)) $this->name = (string) $name;
		if (!empty($value)) $this->$selected_value = $value;

		return $this;

	}

	/**
	 * Adding options
	 * @param string $value		Value tag of element
	 * @param string $text 		Content of element
	 * @param bool $selected	If the element is selected
	 * @param bool $disabled	If the element is disabled
	 * @param bool $top			If true element will be added on top
	 *
 	 * @return object 			$this
	 *
	 * @todo Support options with ID tags
	 */

	public function addOption($value, $text = NULL, $selected = false, $disabled = false, $top = false) {
		if (empty($text)) $text = $value;
		$opt = (new class extends Element { public $tag = 'option'; })->attr("value", $value)->addContent($text);
		if (!empty($id)) $opt->attr("id", $id);
		if ($selected || $value == $this->$selected_value || $text == $this->$selected_value) $opt->attr("selected", true);
		if ($disabled) $opt->attr("disabled", true);
		$this->addContent($opt, $top);
		return $this;
	}

	public function multiple () {
		$this->attr("multiple", true);
		return $this;
	}
}

?>
