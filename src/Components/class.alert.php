<?php
/**
 * Alert class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see https://getbootstrap.com/docs/4.2/components/alerts/
 * @version 4.2.0
 */

class Alert extends Component {

	const ALERT_DISMISSIBLE = "alert-dismissible";
	const ALERT_HEADING		= "alert-heading";

	public $tag = "div";
	public $family = "alert";

	public $color_prefix = "alert-";

	/**
	 * Creates an Alert component
	 * @param mixed  $content    Content
	 * @param string $contextual Contextual (default: primary)
	 */
	function __construct ($content, string $contextual = "primary") {
		$this->attributes["role"] = "alert";

		$this->contextual = $contextual;
		$this->addContent($content);

		return $this;
	}

	/**
	 * Adds heading to the alert
	 * @param mixed	  $content Content of header tag
	 * @param integer $size    Size of header (<h*>)
	 */
	public function addHeading ($content, $size = 4) {
		$heading = ($content instanceof Heading) ? $content->addClass(self::ALERT_HEADING) : Element::heading($content, $size)->addClass(self::ALERT_HEADING);
		$this->addContent($heading, true);

		return $this;
	}

	/**
	 * Create dismissible alerts
	 * @param  mixed 	 $btn     [description]
	 * @param  boolean	 $animate [description]
	 * @return [type]           [description]
	 *
	 * @see https://getbootstrap.com/docs/4.2/components/alerts/#dismissing
	 */
	public function dismissible($btn = NULL, $animate = true) {
		$this->addClass(self::ALERT_DISMISSIBLE);
		if ($animate) {
			$this->addClass(Bootstrap::ANIMATE_FADE);
			$this->addClass(Bootstrap::ANIMATE_SHOW);
		}

		if (empty($btn)) {
			$this->addContent(Bootstrap::CloseIcon());
		} else {
			if ($btn instanceof Element) $btn->addClass(Bootstrap::CLASS_CLOSE);
			$this->addContent($btn);
		}

		return $this;
	}


}

?>
