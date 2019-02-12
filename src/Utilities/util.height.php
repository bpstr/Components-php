<?php
/**
 * Sizing.Height util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 *
 * @see https://getbootstrap.com/docs/4.2/utilities/sizing/
 */

class Height extends Utility {

	/**
	 * Specify component width 	(the same function for height)
	 * @param  mixed $size 	Width value of element
	 * 							25|50|75|100|auto will add w-{size} class
	 * 							Any other numeric value will set inline style width as percentage
	 * 							To specify width in pixels just pass a string value (ex. 420px)
	 * 							All confusing viewport width settings will be converted and accepted
	 *
 	 * @return $this      	Current element
	 *
	 *
	 */

	public function __construct ($size) {
		if (!empty($size)) {
			if (is_numeric($size)) {
				if ($size%25 == 0 && $size <= 100) {
					$this->addClass("h-".$size);
				} else {
					$this->style("height", $size."%");
				}
			} else {
				switch ($size) {
					case 'auto':		$class = "h-auto"; break;
					case '100vh':		$class = "vh-100"; break;
					case '100-vh':	 	$class = "vh-100"; break;
					case 'min-100-vh':	$class = "min-vh-100"; break;
					default: $class = $size; break;
				}
				$this->addClass($size);
			}
		} else {
			$this->style("height", 0);
		}
		return $this;
	}

	function __toString () {

	}

}


?>
