<?php
/**
 * Sizing.Width util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class Width extends Utility {

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
	 * @source https://getbootstrap.com/docs/4.2/utilities/sizing/
	 */

	public function __construct ($size) {
		if (!empty($size)) {
			if (is_numeric($size)) {
				if ($size%25 == 0 && $size <= 100) {
					$this->addClass("w-".$size);
				} else {
					$this->style("width", $size."%");
				}
			} else {
				switch ($size) {
					case 'auto':		$class = "w-auto"; break;
					case '100vw':		$class = "vw-100"; break;
					case '100-vw':	 	$class = "vw-100"; break;
					case 'min-100-vw':	$class = "min-vw-100"; break;
					default: $class = $size; break;
				}
				$this->addClass($size);
			}
		} else {
			$this->style("width", 0);
		}
		return $this;
	}


}




?>
