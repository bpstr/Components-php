<?php  
/**
 * Abstract class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/
 * @bpstr Project Lifera <dev@lifera.hu>
 */
 
abstract class Element {
	public $id;
	public $tag;
	public $type;
	public $contextual;
	public $html;
	
	public $style;
	
	public $color_prefix = "bg-";
	
	protected $classes;
	protected $attributes;
	
	function __toString () {
		echo "<".$this->tag;
		$attr = array();
		$def = $this->type;
		if (!empty($this->contextual)) $def .= " ".$this->color_prefix." ".$this->contextual;
		$attr['class'] .= " ".((!empty($attr["class"])) ? "$def ".implode(" ", $this->classes) : $def);
		if (!empty($this->attributes)) { 
			foreach ($this->attributes as $key => $val) {
				$attr[$key] = sprintf('%s="%s"', $key, $val);
			}
		}
		echo implode(" ", $attr);
		echo '>';
		echo $this->html;
		echo "</".$this->tag.">";
		if (!empty($style)) echo "<style>".$this->style."</style>";
	}
}

?>
