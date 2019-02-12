<?php
/**
 * Overflow util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class Overflow extends Utility {

	const AUTO   = "auto";
	const HIDDEN = "hidden";

	/**
	 * Overflow specification
	 * @param  mixed $type 		Overflow type boolean or string (auto|hidden)
	 * @return $this      		Current element
	 *
	 * @see https://getbootstrap.com/docs/4.2/utilities/overflow/
	 */

	public function __construct ($type) {
		$overflow = sprintf("overflow-%s", (is_bool($type)) ? (($type) ? "auto" : "hidden") : $type);
		$this->addClass($overflow);
		return $this;
	}


	function __toString () {

	}

}


?>
