<?php
/**
 * Nested components with Enchanted Content Management for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see class.breadcrumb.php
 * @see class.buttongroup.php
 */

trait Nested {

	public function addItems($list, $active = NULL) {
		if (empty($list)) return $this;
		if (is_array($list)) {
			foreach($list as $key => $item) {
				$this->addItem($key, $item, $active);
			}
		} else {
			$this->addContent($list);
		}

		return $this;
	}

	public function addItem ($key, $item, $active = NULL) {
		$this->addContent($item, $key);
		return $this;
	}

	public function activeItem ($key) {
		if (is_null($key) && !empty($this->contents)) $key = array_shift(array_keys($this->contents));
		if (isset($this->contents[$key]) && $this->contents[$key] instanceof Element) {
			$this->contents[$key]->addClass(Bootstrap::CLASS_ACTIVE);
		}

		return $this;
	}
}

?>
