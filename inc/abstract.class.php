<?php  
/**
 * Abstract class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/
 * @bpstr Project Lifera <dev@lifera.hu>
 */
 
abstract class Component {
	public $id = NULL;
	public $tag;
	public $type;
	public $contextual;
	public $href;
	
	public $style;
	
	public $color_prefix = "bg-";
	
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
	
	public function addContent($html) {
		$this->contents[] = $html;
		return $this;
	}
	
	public function addClass($class) {
		$this->classes[] = $class;
		return $this;
	}
	
	public function getClasses($additional = array()) {
		$classes = array();
		$classes[] = $this->type;
		if (!empty($this->contextual)) $classes[] = $this->color_prefix.$this->contextual;
		foreach($this->classes as $class) {
			if (strpos($class, " ") !== false || strpos($class, "\t") !== false) {
				preg_match_all('/[a-z1-9]+/i', $class, $matches);
				foreach($matches as $clear) {
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
	
	
	
	/* Some class magic */
	
	function __toString () {
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
		$html["eot"] = '>';
		$html["content"] = implode("", $this->contents);
		$html["close"] = "</".$this->tag.">";
		if (!empty($style)) $html["style"] = "<style>".$this->style."</style>";
		return implode(" ", $html);
	}
	
    public function __call($name, $arguments) {
		if (in_array($name, $this->contextuals)) {
			$this->contextual = $name;
			return $this;
		}
    }
}

?>
