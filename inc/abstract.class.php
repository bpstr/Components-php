<?php  
/**
 * Abstract class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/
 * @bpstr Project Lifera <dev@lifera.hu>
 */



abstract class Component {
	public $id = NULL;
	public $tag;
	public $family;
	public $contextual;
	public $href;
	
	public $style;
	
	public $color_prefix = "bg-";
	
	public $border; // Todo: add support
	
	public $wrap;
	public $before;
	public $after;
	
	protected $contents = array();
	protected $classes = array();
	protected $attributes = array();
	
	/* Define contextual types */
	protected $contextuals = array(
		'primary',
		'secondary',
		'success',
		'danger',
		'warning',
		'info',
		'light',
		'dark'
	);

	protected $empty_elements = array (
		'area', 
		'base', 
		'br', 
		'embed', 
		'img',
		'input', 
		'wbr'
	);

	protected $common_attributes = array (
		'id', 
		'type', 
		'name', 
		'value', 
		'onclick',
		'title',
		'checked',
		'disabled'
	);
	
	/* USED IN BUTTONS
	public $valid_tags = array();
	
	
	/* Set tag of element
	public function tag($tag) {
		if (in_array($tag, $this->valid_tags)) $this->tag = $tag;
		return $this;
	}
	 */
	
	public function addContent($html, $top = false) {
		if (!is_array($html)) $html = array($html);
		foreach($html as $element) {
			if (is_array($element)) {
				$this->addContent($element, $top);
			} else {
				if ($top) {
					array_unshift($this->contents, $element);
				} else {
					array_push($this->contents, $element);
				}
			}
		}
		return $this;
	}
	
	public function addClass($class) {
		$this->classes[] = $class;
		return $this;
	}
	
	public function removeClass($class) {
		$this->classes = explode(" ", $this->getClasses());
		if (($key = array_search($class, $this->classes)) !== false) {
			unset($this->classes[$key]);
		}
		return $this;
	}
	
	public function attr($attr, $val) {
		$this->attributes[$attr] = $val;
		return $this;
	}
	
	public function getClasses($additional = array()) {
		$classes = array();
		if (!empty($this->family)) $classes[] = $this->family;
		if (!empty($this->contextual)) $classes[] = $this->color_prefix.$this->contextual;
		foreach($this->classes as $class) {
			if (strpos($class, " ") !== false || strpos($class, "\t") !== false) {
				preg_match_all('/[a-z0-9\-\_]+/i', $class, $matches);
				foreach($matches[0] as $clear) {
					$classes[] = $clear;
				}
			} else {
				$classes[] = $class;
			}
		}
		return implode(" ", array_unique($classes));
	}
	
	// Adds action to element
	public function action ($href) {
		$this->href = $href;
		return $this;
	}
	
	public function wrap (Component $wrap) {
		$this->wrap = $wrap;
	}
	
	public function before (Component $before) {
		$this->before = $before;
	}
	
	public function after (Component $after) {
		$this->after = $after;
	}
	
	/* Some class magic */
	
	function __toString () {
		// Todo: if element has no closing tag add content to Value attr
		
		foreach($this->common_attributes as $attr) {
			if (property_exists($this, $attr) && !empty($this->$attr)) {
				if (is_bool($this->$attr)) {
					if ($this->$attr) $this->attributes[$attr] = $attr;
				} else {
					$this->attributes[$attr] = $this->$attr;
				}
			}
		}
		
		if (!empty($this->href)) {
			// Should check if $this->contents has <a> tag...
			$this->tag = "a";
			$this->attributes["href"] = $this->href;
		}
		
		$html = array();
		$html["open"] = "<".$this->tag;
		if (!empty($this->attributes)) {
			foreach ($this->attributes as $key => $val) { 
				$html["attr-$key"] = sprintf('%s="%s"', $key, $val);
			}
		}
		$html["attr-class"] = sprintf('class="%s"', $this->getClasses());
		$html["eot"] = '>'; // ADD OUTER WRAPPER
		// $contentHTML = implode("", $this->contents);
		if (!in_array($this->tag, $this->empty_elements)) {
			// $html["content"] = (!empty($this->wrap) && is_subclass_of($this->wrap, 'Component')) ? $this->wrap->addContent($contentHTML) : $contentHTML;
			$html["content"] = implode("", $this->contents);
			$html["close"] = "</".$this->tag.">";
		}
		if (!empty($this->style)) $html["style"] = "<style>".$this->style."</style>";
		
		
		if (!empty($this->before) && is_subclass_of($this->before, 'Component')) {
			array_unshift($html, $this->before);
		}
		if (!empty($this->after) && is_subclass_of($this->after, 'Component')) {
			array_push($html, $this->after);
		}
			
		$display = implode(" ", $html);
			
		if (!empty($this->wrap) && is_subclass_of($this->wrap, 'Component')) {
			$display = (string) $this->wrap->addContent($display);
		}
		
		return $display;
	}
	
    public function __call($name, $arguments) {
		if (in_array($name, $this->contextuals)) {
			$this->contextual = $name;
			return $this;
		}
    }
}

?>
