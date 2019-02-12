<?php

/**
 * Input HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 */

abstract class Textual extends scalableComponent {
	public $name;
	public $type;



	public function label ($text, $placehold = false) {
		$label = (new class extends Component { public $tag = 'label'; })->addContent($text);
		if (!empty($this->id)) $label->attr("for", $this->id);
		if ($placehold) $label->attr("placeholder", (string) $text);

		if ($this->type == "checkbox" || $this->type == "radio" || $this->type == "range") {
			$this->removeClass("position-static");
			$this->removeClass("form-control");
			if ($this->type != "range") $this->after = $label;
		} elseif ($this->type == "textarea") {
			$this->removeClass("position-static");
			$this->attr("aria-label", $text);
			$this->after = $label;
		} else {
			$this->before = $label;
		}
		return $this;
	}

	public function explain ($text, string $id = NULL) {
		$helper = (new class extends Component { public $tag = 'small'; })->addContent($text);
		$helper->addClass("form-text text-muted");
		if (!empty($id)) {
			$helper->attr("id", $id);
			$this->attr("aria-describedby", $id);
		}
		$this->after = $helper;
		return $this;
	}


	public function prepend ($text) {
		$this->before = (new Div($text))->addClass("input-group-text");
		$this->before->wrap = (new Div())->addClass("input-group-prepend");
		$this->wrap((new Div())->addClass("input-group"));
		return $this;
	}

	public function append ($text) {
		$this->after = (new Div($text))->addClass("input-group-text");
		$this->after->wrap = (new Div())->addClass("input-group-prepend");
		$this->wrap((new Div())->addClass("input-group"));
		return $this;
	}
}

class Input extends Textual {
	public $tag = "input";

	public $type = "text";

	public $value;

	/**
	 * Types of HTML input
	 * @Source: https://www.w3schools.com/html/html_form_input_types.asp
	 */
	protected $inputtypes = array(
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
	);


	/**
	 * Common attributes of HTML input
	 * @Source: https://www.w3schools.com/html/html_form_attributes.asp
	 */
	protected $commonattr = array(
		"readonly" => false
	);

	function __construct ($type, $name = NULL, $value = NULL, $id = NULL) {
		$this->type($type);

		if (!empty($name)) $this->name = (string) $name;
		if (!empty($value)) $this->value = (string) $value;
		if (!empty($id)) $this->id = (string) $id;

	}

	public function type ($type) {
		if (in_array($type, $this->inputtypes)) $this->type = $type;
		switch ($this->type) {
			case "file": $this->addClass("form-control-file"); break;
			case "range": $this->addClass("form-control-range"); break;
			case "checkbox": $this->addClass("form-check-input position-static"); break;
			case "radio": $this->addClass("form-check-input position-static"); break;
			// case "range": $this->addClass("form-control-range"); break;
			default: $this->addClass("form-control");
		}
	}

	public function readonly ($plaintext = false) {
		$this->attr("readonly", true);
		if ($plaintext) {
			$this->removeClass("form-control");
			$this->addClass("form-control-plaintext");
		}
		return $this;
	}

}

class Select extends Textual {
	public $tag = "select";
	public $selectedValue = NULL;

	function __construct (array $options = array(), $name = NULL, $value = NULL, $id = NULL) {
		$this->addClass("form-control");
		foreach ($options as $key => $val) {
			$this->addOption($key, $val);
		}


		if (!empty($name)) $this->name = (string) $name;
		if (!empty($value)) $this->selectedValue = $value;
		if (!empty($id)) $this->id = (string) $id;


		return $this;

	}

	public function addOption($value, $text = NULL, $id = NULL, $selected = false, $disabled = false, $top = false) {
		if (empty($text)) $text = $value;
		if (empty($value)) $value = $text;
		$opt = (new class extends Component { public $tag = 'option'; })->attr("value", $value)->addContent($text);
		if (!empty($id)) $opt->attr("id", $id);
		if ($selected || $value == $this->selectedValue || $text == $this->selectedValue) $opt->attr("selected", true);
		if ($disabled) $opt->attr("disabled", true);
		$this->addContent($opt, $top);
		return $this;
	}

	public function readonly ($plaintext = false) {
		$this->attr("multiple", true);
		return $this;
	}
}

class Textarea extends Textual {
	public $tag = "textarea";

	function __construct ($content = "", $name = NULL, $value = NULL, $id = NULL) {
		$this->addClass("form-control");
		$this->addContent($content);
		$this->addContent($value);

		if (!empty($name)) $this->name = (string) $name;
		if (!empty($value)) $this->content = $value;
		if (!empty($id)) $this->id = (string) $id;

		return $this;
	}

	public function addOption($value, $text = NULL, $id = NULL, $selected = false, $disabled = false, $top = false) {
		if (empty($text)) $text = $value;
		if (empty($value)) $value = $text;
		$opt = (new class extends Component { public $tag = 'option'; })->attr("value", $value)->addContent($text);
		if (!empty($id)) $opt->attr("id", $id);
		if ($selected) $opt->attr("selected", true);
		if ($disabled) $opt->attr("disabled", true);
		$this->addContent($opt, $top);
		return $this;
	}

	public function readonly ($plaintext = false) {
		$this->attr("multiple", true);
		return $this;
	}
}



?>
