<?php

abstract class Utility {

	public $classes = array();		// Classes to stringify
	public $style = array();			// CSS style to stringify


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
				$pieces = preg_split('/\s+/s', $class);
				if (!empty($pieces)) array_push($classes, ...$pieces);
			}
			$this->classes = array_unique($classes);
			return implode(" ", array_unique($classes));
		}

		public function hasClass($class) {
			$this->classes = explode(" ", $this->getClasses());
			return in_array($class, $this->classes);
		}


		public function style($property, $value) {
			$this->style[$property] = $value;
		}


	/**
	 * Smart prefix strings
	 * @param  string $prefix [description]
	 * @param  mixed  $string [description]
	 * @return string         [description]
	 */
	public function sprefix (string $prefix, $string) {

	}

	function __toString () {
		return implode(" ", $this->classes) ?? "";
	}

}

?>
