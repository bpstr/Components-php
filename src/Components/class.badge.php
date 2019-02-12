<?php
/**
 * Badges class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/badge/
 * @version 4.2.0
 */

class Badge extends Component {
	use Action;

	const BADGE_PILL = "badge-pill";

	public $tag = "span";
	public $family = "badge";

	public $color_prefix = "badge-";

	function __construct ($content, string $contextual = NULL) {
		if (!empty($contextual)) $this->contextual = $contextual;
		$this->addContent($content);

		return $this;
	}

	public function pill() {
		$this->addClass(self::BADGE_PILL);
		return $this;
	}

}

?>
