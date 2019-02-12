<?php 
require_once ("abstract.class.php");

/**
 * Form & Input class for Bootstrap components.
 * Source: https://getbootstrap.com/docs/4.1/components/alerts/
 * @bpstr (420&highaf) Project Lifera <dev@lifera.hu> 
 */

class Form extends Component {
	
	public $tag = "form"; 
	
	
	function __construct ($action = NULL, $method = NULL, $target = NULL, $autocomplete = NULL) { 
		
		if (!empty($action)) $this->attr("action", $action);
		if (!empty($method)) $this->attr("method", $method);
		if (!empty($target)) $this->attr("target", $target);
		if (!empty($autocomplete)) $this->attr("autocomplete", $autocomplete);
		
		return $this;
	}
	
	public function addGroup ($content, $classes = NULL) {
		$group = new Div($content); 
		$group->addClass("form-group"); 
		if ($content instanceof Input && ($content->type == "checkbox" || $content->type == "radio")) $group->addClass("form-check");
		
		$this->addContent($group);
		return $this;
	}
	
	public function addRow (array $content, $classes = NULL) {
		if (empty($classes)) $classes = "col";
		$row = (new Div())->addClass("form-row");
		foreach ($content as $key => $element) {
			$group = new Div($element); 
			$group->addClass("form-group"); 
			$class = (is_array($classes) && isset($classes[$key])) ? $classes[$key] : $classes;
			$group->addClass($class); 
			if ($content instanceof Input && ($content->type == "checkbox" || $content->type == "radio")) $group->addClass("form-check");
			$row->addContent($group);
		}
		$this->addContent($row);
		
		return $this;
		
	}
	
}




/* MAKE FORM FROM ARRAY! :) */

?>