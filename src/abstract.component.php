<?php
/**
 * Abstract class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 * @version 4.2.0
 */

/**
 * @todo: Add "title" for all elements where name is set. Great for dealing with unset ids, labels and aria tags
 * @todo: Add support for predefined content types (setContent?)
 * @todo: Support adding element attributes with functions based on $this->element_attributes & __call | Example: data.select
*/



abstract class Component extends Element {
	const CONTEXTUALS = array(
		Bootstrap::COLOR_PRIMARY,
		Bootstrap::COLOR_SECONDARY,
		Bootstrap::COLOR_SUCCESS,
		Bootstrap::COLOR_DANGER,
		Bootstrap::COLOR_WARNING,
		Bootstrap::COLOR_INFO,
		Bootstrap::COLOR_LIGHT,
		Bootstrap::COLOR_DARK
	);

	const UTILS = array(
		"shadow",
		"display",
		"float",
		"border",
		"overflow",
		"position",
		"width",
		"height",
		"padding",
		"margin",
		"font",
		"text"
	);

	public $family;					// Base class

	public $contextual;				// Bootstrap color class (added with $color_prefix)
	public $border; 				// Border color class (added with "border-")

	public $color_prefix = "bg-";	// Used to define background color prefix





	function _stringify () {
		if (!empty($this->family)) $this->addClass($this->family);
		if (!empty($this->contextual)) $this->addClass(($this->color_prefix . $this->contextual));
		foreach ($this->utils as $util) {
			if (!empty($util->style)) $this->style = array_merge($this->style, $util->style);
		}
		$this->addClass(implode(" ", $this->utils));

	}

	/**
	 * Magic Management
	 * @todo: Make it compatible with abstract element __call >>> else { return parent::__call($name, $arguments); }
	 */

	public function __call($name, $arguments) {
		if (in_array($name, self::CONTEXTUALS)) {
			if (isset($arguments[0]) && $arguments[0]) {
				$this->border = $name;
			} else {
				$this->contextual = $name;
			}
			return $this;
		} else {
			return $this;
		}
	}

	public function __get($name) {
		// if (in_array($name, array_keys($this->utils))) {
			// return $this->utils[$name];
			// if not defined. $this->$name(); // Wtf jamaan
		// }
	}
}

?>
