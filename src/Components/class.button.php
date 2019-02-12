<?php
/**
 * Button class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/buttons/
 * @version 4.2.0
 */

class Button extends Component {
	use Scalable, Action;

	const BUTTON_OUTLINE_COLOR  = "btn-outline-%s";
	const BUTTON_BLOCK 			= "btn-block";
	const BUTTON_LINK 			= "btn-link";

	public $tag = "button";
	public $family = "btn";

	public $valid_tags = array("a", "button", "input");

	public $color_prefix = "btn-";

	protected $size_small = true;
	protected $size_large = true;

	function __construct ($content, $contextual = NULL, $href = NULL) {
		if (!empty($href)) {
			$this->setTag("a");
			$this->href = $href;
		}

		$this->addContent($content);
		$this->contextual = $contextual;


		return $this;
	}

	public function setTag($tag) {
		if (in_array($tag, $this->valid_tags)) {
			if ($tag == "a") {
				$this->attributes["role"] = "button";
			} elseif ($tag == "button") {
				$this->attributes["type"] = "submit";
			} elseif ($tag == "input") {
				$this->attributes["type"] = "button";
				if (!empty($this->contents)) $this->attributes["value"] = strip_tags(implode("", $this->contents));
			}
			$this->tag = $tag;
		}
		return $this;
	}

	public function outline($contextual = NULL) {
		if (!empty($contextual)) $this->contextual = $contextual;
		$this->addClass(sprintf(self::BUTTON_OUTLINE_COLOR, $this->contextual));
		return $this;
	}

	public function block() {
		$this->addClass(self::BUTTON_BLOCK);
		return $this;
	}

	public function active() {
		$this->attributes["aria-pressed"] = "true";
		$this->addClass(Bootstrap::CLASS_ACTIVE);
		return $this;
	}

	public function disable() {
		if ($this->tag == "a") {
			$this->attributes["aria-disabled"] = "true";
			$this->attributes["tabindex"] = "-1";
			$this->addClass(Bootstrap::CLASS_DISABLED);
		} else {
			$this->attributes["disabled"] = "disabled";
		}
		return $this;
	}

	public function btnlink() {
		$this->addClass(self::BUTTON_LINK);
		return $this;
	}


	// Collapses easy setup
	public function collapse($selector) {
		$this->data("toggle", "collapse");
		if (strpos($selector, "#") === false && strpos($selector, ".") === false) $selector = "#".$selector;
		if ($this->tag == "a") {
			$this->attr("href", $selector);
		} else {
			$this->setTag("button");
			$this->data("target", $selector);
		}

		return $this;
	}


}

?>
