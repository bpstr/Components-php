<?php
/**
 * Abstract HTML element class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 */

/**
 * @todo: __call check element attributes and return/set value if exists
 * @todo: Add HTML Event Attributes: https://www.w3schools.com/tags/ref_eventattributes.asp
 * @todo: Parse HTML element
 */

abstract class Element {
	use Utils;

	public $id = NULL;				// ID attribute (UNIQUE) | If value === true, ID will be generated!
	public $tag;					// HTML tag (must be defined)

    public $title = NULL;

	public $wrap;					// Wrapper (single Component)
	public $before;					// Component to add before this
	public $after;					// Component to add after this


	protected $style = array();			// Style attribute | Array(css-property => value) | String
	protected $contents = array();		// Contents of the HTML element (string|object)
	protected $classes = array();		// Class list of the element (string|array)
	protected $attributes = array();	// Attributes of the element (associative)

	protected $utils = array();			// Bootstrap utility classes


	const EMPTY_ELEMENTS = array('area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'keygen', 'link', 'meta', 'param', 'source', 'track', 'wbr');
	const COMMON_ATTRIBUTES = array("accesskey", "class", "contenteditable", "dir", "draggable", "dropzone", "hidden", "id", "lang", "spellcheck", "style", "tabindex", "title", "translate");


	/**
	 *	ID Management
	 *	Todo: Check if ID already exists
	 *  Todo: Validate ID
	 *  Todo: __set and __get for IDs ($this->id should be protected)
	 *  Todo: Add Element to global scope  with unique ID
	 */

	public function id ($str = NULL) {
		$this->id = $str;
		return $this;
	}


	/**
	 * Enchanted Content Management
	 */

	public function content ($key) {
		if (isset($this->contents[$key]) && $this->contents[$key] instanceof Element) return $this->contents[$key];
	}

	public function addContent ($content, $key = false) {
		if (!is_array($content)) $content = array($content);
		foreach($content as $element) {
			if (is_array($element)) {
				$this->addContent($element);
			} else {
				if ($key === true) {
					array_unshift($this->contents, $element);
				} elseif (!empty($key) && !is_numeric($key)) {
					$this->contents[$key] = $element;
				} else {
					array_push($this->contents, $element);
				}
			}
		}
		return $this;
	}

	public function wrap (Element $wrap) {
		$this->wrap = $wrap;
		return $this;
	}

	public function before (Element $before) {
		$this->before = $before;
		return $this;
	}

	public function after (Element $after) {
		$this->after = $after;
		return $this;
	}

	public function getChildren($tag = NULL, $class = NULL, $skey = NULL) {
		$results = array();
		foreach ($this->contents as $key => $child) {
			if (!($child instanceof Element)) continue;
			if ((!is_null($tag) && $child->tag == $tag) || (!is_null($class) && $chils->hasClass($class)) || (!is_null($skey) && $key == $skey)) $results[$key] = $child;
			if (is_null($tag) && is_null($class) && is_null($skey)) $results[$key] = $child;
		}
		return $results;
	}


	/**
	 * Class Management
	 */

	public function addClass($class) {
		if (is_array($class)) {
			foreach ($class as $cls) {
				$this->addClass($cls);
			}
		} else {
			$classes = preg_split('/[^\w-\s]/i', $class);
			array_push($this->classes, ...$classes);
		}
		return $this;
	}

	public function removeClass($class) {
		$this->classes = explode(" ", $this->getClasses());
		if (($key = array_search($class, $this->classes)) !== false) {
			unset($this->classes[$key]);
		}
		return $this;
	}

	public function getClasses($additional = array()) {
		$classes = array();
		foreach($this->classes as $class) {
			$pieces = preg_split('/\s+/', $class);
			array_push($classes, ...$pieces);
		}
		$this->classes = array_unique($classes);
		return implode(" ", array_unique($classes));
	}

	public function hasClass($class) {
		$this->classes = explode(" ", $this->getClasses());
		return in_array($class, $this->classes);
	}

	/**
	 * Attribute Management
	 */

	public function attr($attr, $val) {
		if ($attr == "id") $this->id($val);
		if ($attr == "title") $this->title = $val;
		$this->attributes[$attr] = $val;
		return $this;
	}

	public function data($attr, $val) {
		if (strpos($attr, "data-") === false) $attr = "data-".$attr;
		$this->attributes[$attr] = $val;
		return $this;
	}

	public function style($property, $value) {
		$this->style[$property] = $value;
	}

	/**
	 * Creating HTML elements
	 */

	public static function create (string $tag, $content = NULL) {
		$element = new class extends Element {};
		$element->tag = $tag;
		if (!empty($content)) $element->addContent($content);
		return $element;
	}

	public static function div($content = NULL) {
		return self::create("div", $content);
	}

	public static function paragraph($content = NULL) {
		return self::create("p", $content);
	}

	public static function span($content = NULL) {
		return self::create("span", $content);
	}

	public static function heading ($content = NULL, int $size = 1) {
		return new Heading($content, $size);
	}

	public static function img ($src, $alt = NULL) {
		return new Image($src, $alt);
	}


	/**
	 * Construct Textarea
	 * @param mixed $content	Content of element
	 * @param mixed $name 		Name attribute of element
	 * @param int $cols			Cols attribute of element
	 * @param int $rows			Rows attribute of element
	 *
 	 * @return object 			$this
	 */

	public static function textarea ($content = "", $name = NULL, int $cols = NULL, int $rows = NULL) {
		$textarea = Element::create("textarea", $content);

		if (!empty($name)) $textarea->name = (string) $name;
		if (!empty($cols)) $textarea->attr("cols", $cols);
		if (!empty($rows)) $textarea->attr("rows", $rows);

		return $textarea;
	}




	/**
	 * Magic Management
	 */

	function _stringify () {
		// Possible methods in subclasses before generating HTML code
	}

	function __toString () {

		$this->_stringify();

		if ($this->id === true) $this->id = $this->tag.mt_rand(100, 420);

		foreach(self::COMMON_ATTRIBUTES as $attr) {
			if (property_exists($this, $attr) && !empty($this->$attr)) {
				if (is_bool($this->$attr)) {
					if ($this->$attr) $this->attributes[$attr] = $attr;
				} else {
					$this->attributes[$attr] = $this->$attr;
				}
			}
		}

		$style = array();
		foreach ($this->style as $prop => $val) {
			$style[] = sprintf("%s: %s;", $prop, $val);
		}
		if (!empty($style)) $this->attributes["style"] = implode("; ", $style);


		$element = array();


		$opening = array();
		$opening["tag"] = "<".$this->tag;

		if (!empty($this->attributes)) {
			foreach ($this->attributes as $key => $val) {
				$escaped = str_replace('"', "'", $val);
				$opening["attr-$key"] = sprintf('%s="%s"', $key, trim($escaped));
			}
		}

		if (in_array($this->tag, self::EMPTY_ELEMENTS)) {
			if (!empty($opening["attr-title"]) || isset($opening["attr-value"])) {
				array_unshift($element, "<!-- Content dismissed in empty element with title/value attribute set (".$this->tag."#".$this->id.") : ".implode("", $this->contents)."-->");
			} else {
				$opening["attr-title"] = 'title="'.strip_tags(implode("", $this->contents)).'"';
			}
		}

		if (!empty($this->classes)) $opening["attr-class"] = sprintf('class="%s"', trim($this->getClasses()));

		$html["opening"] = implode(" ", $opening);
		if (in_array($this->tag, self::EMPTY_ELEMENTS)) $html["slash"] = "/";
		$html["eot"] = '>';

		if (!in_array($this->tag, self::EMPTY_ELEMENTS)) {
			$html["content"] = join($this->contents);
			$html["closing"] = "</".$this->tag.">";
		}

		if (!empty($this->after) && is_subclass_of($this->after, 'Element')) {
			array_unshift($html, $this->before);
		}

		if (!empty($this->after) && is_subclass_of($this->after, 'Element')) {
			array_push($html, $this->after);
		}

		$display = join($html);

		if (!empty($this->wrap) && is_subclass_of($this->wrap, 'Element')) {
			$display = (string) $this->wrap->addContent($display);
		}


		return $display;
	}

}

?>
