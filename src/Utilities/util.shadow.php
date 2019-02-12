<?php
/**
 * Shadow util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 */



/**
 * @todo: Add support to create css box shadows ((materialize shadow sizes?))
 * @todo: $element->shadow->none();
 */

class Shadow extends Utility {

	const NONE   = "none";
	const SMALL  = "sm";
	const NORMAL = "";
	const LARGE  = "lg";

	/**
	 * Add shadow class to element
	 * @param  string $size 	Size of shadow (none|sm|lg) blank will add normal shadow
	 * @return $this      		Current element
	 *
	 * @see https://getbootstrap.com/docs/4.2/utilities/shadows/
	 */

	public function __construct (string $size = NULL) {
		$shadow = (empty($size)) ? "shadow" : sprintf("shadow-%s", $size);
		$this->addClass($shadow);
		echo $shadow;
		return $this;
	}

}


?>
