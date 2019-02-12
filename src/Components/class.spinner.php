<?php
require_once ("abstract.class.php");

/**
 * Spinner class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr Project Lifera <dev@lifera.hu>
 */

class Progress extends Component {
	public $tag = "div";
	public $family = "progress";

	function __construct (array $bars) {
		foreach ($bars as $bar) {
			$this->addContent($bar);
		}
	}

}


class ProgressBar extends Component { // Todo: ban style tag -> round width to class utils
	public $tag = "div";
	public $family = "progress-bar";

	function __construct(int $val, $contextual = "", $label = false, $striped = false, $animated = false) {
		$this->attr("role", "progressbar");
		$this->value($val);


		if (!empty($contextual)) $this->contextual = $contextual;
		if ($label) $this->addContent("$val%");

		if ($striped) $this->striped();
		if ($animated) $this->animated();


	}

	public function value (int $val) {
		$value = round(max(0, min(100, $val)));
		$this->attr("aria-valuemin", "0");
		$this->attr("aria-valuemax", "100");
		$this->attr("aria-valuenow", $value);
		$this->attr("style", "width: $value%;");
		return $this;
	}

	public function striped($animated = false) {
		$this->addClass("progress-bar-striped");
		if ($animated) $this->animated();
		return $this;
	}

	public function animated() {
		$this->addClass("progress-bar-animated");
		return $this;
	}


}

?>
