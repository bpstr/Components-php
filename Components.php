<?php
/**
 * Bootstrap Components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 * @version 4.2.0
 */


/**
 * Autoload classes
 * @source https://stackoverflow.com/questions/20681689
 */
define ("COMPONENTS_BASE_DIR", "");
spl_autoload_register ( function ($method) {
	$class = strtolower($method);
	$sources = array(
		"src/abstract.$class.php",
		"src/Components/class.$class.php",
		"src/HTML/data.$class.php ",
		"src/Traits/trait.$class.php",
		"src/Utilities/util.$class.php",
		"src/Extensions/ext.$class.php"
	);
    foreach ($sources as $source) {
        if (file_exists(COMPONENTS_BASE_DIR.$source)) {
            return require_once COMPONENTS_BASE_DIR.$source;
        }
    }
	return false;
});

/**
 * @see https://write.as/bpstr/bootstrap-components
 */
class Bootstrap {

	const LABEL_CLOSE = "Close";
	const LABEL_PREVIOUS = "Previous";
	const LABEL_NEXT = "Next";

	/**
	 * Bootstrap BREAKPOINTS
	 * @see https://getbootstrap.com/docs/4.2/layout/grid/#all-breakpoints
	 * @see https://getbootstrap.com/docs/4.2/layout/overview/#responsive-breakpoints
	 *
	 * Used: utils.display,
	 */

	const BREAKPOINT_SM = "sm";
	const BREAKPOINT_MD = "md";
	const BREAKPOINT_LG = "lg";
	const BREAKPOINT_XL = "xl";

	const SIZE_XSMALL = "xs";
	const SIZE_SMALL  = "sm";
	const SIZE_MEDIUM = "md";
	const SIZE_LARGE  = "lg";
	const SIZE_XLARGE = "xl";

	/**
	* Bootstrap COLORS
	* @see https://getbootstrap.com/docs/4.2/utilities/colors/
	* Used: utils.text
	*/

	const COLOR_PRIMARY   = "primary";
	const COLOR_SECONDARY = "secondary";
	const COLOR_SUCCESS   = "success";
	const COLOR_DANGER    = "danger";
	const COLOR_WARNING   = "warning";
	const COLOR_INFO	  = "info";
	const COLOR_LIGHT	  = "light";
	const COLOR_DARK	  = "dark";

	const TEXT_PRIMARY 	 = "text-primary";
	const TEXT_SECONDARY = "text-secondary";
	const TEXT_SUCCESS 	 = "text-success";
	const TEXT_DANGER	 = "text-danger";
	const TEXT_WARNING	 = "text-warning";
	const TEXT_INFO 	 = "text-info";
	const TEXT_LIGHT	 = "text-light";
	const TEXT_DARK 	 = "text-dark";
	const TEXT_BODY 	 = "text-body";
	const TEXT_MUTED 	 = "text-muted";
	const TEXT_WHITE 	 = "text-white";
	const TEXT_WHITE_50	 = "text-white-50";
	const TEXT_BLACK 	 = "text-black";
	const TEXT_BLACK_50	 = "text-black-50";

	const BG_PRIMARY	 = "bg-primary";
	const BG_SECONDARY	 = "bg-secondary";
	const BG_SUCCESS	 = "bg-success";
	const BG_DANGER		 = "bg-danger";
	const BG_WARNING 	 = "bg-warning";
	const BG_INFO 		 = "bg-info";
	const BG_LIGHT 		 = "bg-light";
	const BG_DARK 		 = "bg-dark";
	const BG_WHITE 		 = "bg-white";
	const BG_TRANSPARENT = "bg-transparent";

	const GRADIENT_PRIMARY 	 = "bg-gradient-primary";
	const GRADIENT_SECONDARY = "bg-gradient-secondary";
	const GRADIENT_SUCCESS	 = "bg-gradient-success";
	const GRADIENT_DANGER	 = "bg-gradient-danger";
	const GRADIENT_WARNING	 = "bg-gradient-warning";
	const GRADIENT_INFO		 = "bg-gradient-info";
	const GRADIENT_LIGHT	 = "bg-gradient-light";
	const GRADIENT_DARK 	 = "bg-gradient-dark";

	/**
	* Bootstrap DIRECTIONS
	* @see https://getbootstrap.com/docs/4.2/utilities/borders/
	* @see https://getbootstrap.com/docs/4.2/utilities/spacing/
	*/

	const DIRECTION_TOP = "top";
	const DIRECTION_RIGHT = "right";
	const DIRECTION_BOTTOM = "bottom";
	const DIRECTION_LEFT = "left";

	const SIDE_TOP	  = "t";
	const SIDE_RIGHT  = "r";
	const SIDE_BOTTOM = "b";
	const SIDE_LEFT   = "l";
	const SIDE_X	  = "x";
	const SIDE_Y	  = "y";



	/**
	 * Bootstrap common Classes
	 */

	const CLASS_CLOSE	 = "close";
	
	const CLASS_ACTIVE	 = "active";
	const CLASS_DISABLED = "disabled";

	const CLASS_SHOW	 = "show";

	/**
	 * Bootstrap Animations
	 * @see class.alerts.php
	 */

	const ANIMATE_FADE = "fade";
	const ANIMATE_SHOW = "show";









	public static function ButtonToolbar ($content = NULL) {
		$toolbar = new class extends Component { public $tag = "div"; public $family = "btn-toolbar"; };
		return $toolbar->addContent($content)->attr("role", "toolbar");
	}

	/**
	 * Create Bootstrap Close Icon
	 * Using ASCII Multiplication X by default to properly fit inline
	 * @see https://getbootstrap.com/docs/4.2/utilities/close-icon/
	 */
	public static function CloseIcon ($symbol = "&#x2715;") {
		$btn = Element::create("button")->attr("type", "button")->addClass(self::CLASS_CLOSE)->attr("aria-label", self::LABEL_CLOSE);
		$close = Element::create("span")->attr("aria-hidden", "true")->addContent($symbol)->wrap($btn);
		return $close;
	}



	/* Card Holders *

	class CardGroup extends Div {
		function __construct ($content) {
			$this->addClass("card-group");
			$this->addContent($content);
		}
	}

	class CardDeck extends Div {
		function __construct ($content) {
			$this->addClass("card-deck");
			$this->addContent($content);
		}
	}

	class CardColumns extends Div {
		function __construct ($content) {
			$this->addClass("card-columns");
			$this->addContent($content);
		}
	}



	/**
	 * @todo: smart prefix function sprefix ($prefix, $string, $deliminer = "-") @see cardImage, Anchor, Card::CardTitle, trait.Complex::addChunk,
	 * @todo: add Clearfix() return new Clearfix...
	 * @todo: add grid support
	 * @todo: support embled
	 * @todo: icons support
	 * @todo: blockquote support
	 */


	public static function sprefix ($prefix, $string, $delimiter = "-") {
		if (strpos($string, $prefix.$delimiter) === 0) return $string;
		return $prefix.$delimiter.$string;
	}
}

?>
