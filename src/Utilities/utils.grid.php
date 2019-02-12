<?php
class Container extends Div {
	function __construct ($content, $fluid = false) {
		$this->addClass( ($fluid) ? "container-fluid" : "container");
		$this->addContent($content);
	}
}

class Row extends Div {
	function __construct ($content) {
		$this->addClass("row");
		$this->addContent($content);
	}
}

class Col extends Div {
	public $sizes = array(
		'sm' => 'small',
		'md' => 'medium',
		'lg' => 'large',
		'xl' => 'xlarge',
		'' => 'xsmall'
	);

	/* Todo:
	 *	- Vertical alignment
	 *	- Horizontal alignment
	 *	- No gutters
	 *	- Column breaks
	 *	- Order classes
	 *	- Offsetting columns
	*/

	function __construct ($content, int $small = NULL, int $medium = NULL, int $large = NULL, int $xlarge = NULL, int $xsmall = NULL) {
		$this->addContent($content);
		$this->addClass("col");

		foreach ($this->sizes as $prefix => $name) {
			if (empty($$name)) continue;
			if ($$name == 0) $$name = "auto";
			if ($$name > 12) $$name = 12;
			if ($prefix != "") $prefix .= "-";
			$this->addClass("col-$prefix".$$name);
		}
		if (!empty($medium)) $this->addClass("col-md-".$medium);
		if (!empty($large)) $this->addClass("col-lg-".$large);
		if (!empty($xlarge)) $this->addClass("col-xl-".$xlarge);


	}
}
?>
