<?php
/**
 * Utils trait for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see abstract.element.php
 */

trait Utils {

	public function shadow($size) {
		$this->utils["shadow"] = new Shadow ($size);
		return $this->utils["shadow"];
	}

	public function display (string $value, string $breakpoint = NULL) {
		$this->utils["display"] = new Display ($value, $breakpoint);
		return $this->utils["display"];
	}

	public function float ($direction, $breakpoint = NULL) {
		$this->utils["float"] = new Float ($direction, $breakpoint);
		return $this->utils["float"];
	}

	public function border () {
		// $this->utils["border"] = new Border ($direction, $breakpoint);
		// return $this->utils["float"];
	}

	public function overflow ($type) {
		$this->utils["overflow"] = new Overflow ($type);
		return $this->utils["overflow"];
	}

	public function position (string $pos) {
		$this->utils["position"] = new Position ($pos);
		return $this->utils["position"];
	}

	public function width ($size) {
		$this->utils["width"] = new Width ($size);
		return $this->utils["width"];
	}

	public function height ($size) {
		$this->utils["height"] = new Height ($size);
		return $this->utils["height"];
	}

	public function padding ($size, string $edge = NULL, string $breakpoint = NULL) {
		$this->utils["padding"] = new Padding ($size, $edge, $breakpoint);
		return $this->utils["padding"];
	}

	public function margin ($size, string $edge = NULL, string $breakpoint = NULL) {
		$this->utils["margin"] = new Margin ($size, $edge, $breakpoint);
		return $this->utils["margin"];
	}

	public function font ($style) {
		$this->utils["font"] = new Font ($style);
		return $this->utils["font"];
	}

	public function text ($style) {
		$this->utils["text"] = new Font ($style);
		return $this->utils["text"];
	}
}
?>
