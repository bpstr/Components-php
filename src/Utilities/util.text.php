<?php
/**
 * Text util for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <dev@lifera.hu>
 *
 * @see https://getbootstrap.com/docs/4.2/utilities/text/
 */

class Text extends Utility {

	const JUSTIFY 	 = "text-justify";
	const RIGHT 	 = "text-right";
	const CENTER	 = "text-center";
	const LEFT 		 = "text-left";
	const WRAP 		 = "text-wrap";
	const NOWRAP	 = "text-nowrap";
	const TRUNCATE 	 = "text-truncate";
	const LOWERCASE  = "text-lowercase";
	const UPPERCASE  = "text-uppercase";
	const CAPITALIZE = "text-capitalize";
	const MONOSPACE  = "text-monospace";
	const RESET  	 = "text-reset";

	const DECORATION_NONE = "text-decoration-none";

	public function __construct ($style) {
		if (in_array($style, TEXT_UTILS)) {
			$this->addClass("text-".$style);
		}
		return $this;
	}



}


?>
