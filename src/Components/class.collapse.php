<?php
/**
 * Collapse class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/collapse/
 * @version 4.2.0
 */

class Collapse extends Component {

	public $tag = "div";
	public $family = "collapse";

	function __construct ($content, $id = NULL) {
		$this->addContent($content);
		$this->id = $id ?? $this->family.rand(110,420);

		return $this;
	}

	public function show () {
		$this->addClass(Bootstrap::CLASS_SHOW);
		return $this;
	}


	public function makeControlButton ($content) {
		$button = new Button ($content);
		return $button->collapse($this->id);
	}


}

?>
