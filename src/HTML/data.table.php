<?php
require_once ("inc/abstract.element.php");

/**
 * Table HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 */

class Tabke extends Element {
	public $tag = "table";


	function __construct ($content = NULL, $width = "100%", $cellpadding = 0, $cellspacing = 0, $border = 0, $align = "center", $bgcolor = "#eeeeee") {
		$this->attr("width", $width);
		$this->attr("cellpadding", $cellpadding);
		$this->attr("cellspacing", $cellspacing);
		$this->attr("border", $border);
		$this->attr("align", $align);
		$this->attr("bgcolor", $bgcolor);

		$this->addContent($content);

		return $this;

	}

	public function addRow($id, $columns = 1) {
		$row = Element::create("tr");
		foreach (range(1,$columns) as $key => $value) {
			$td = Element::create("td");
			$row
		}
	}

	public function field ($row, $column) {
		return $this->content
	}

}

?>
