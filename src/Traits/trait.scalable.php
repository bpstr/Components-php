<?php
/**
 * Scalable components for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see class.button.php
 */

trait Scalable {

	public function xsmall($force = true) {
		if (isset($this->size_xsmall) && $this->size_xlarge) {
			$this->addClass($this->family."-".Bootstrap::SIZE_XSMALL);
		} else {
			if ($force) $this->small();
		}

		return $this;
	}

	public function small($force = true) {
		if (isset($this->size_small) || $force) {
			$this->addClass($this->family."-".Bootstrap::SIZE_SMALL);
		}

		return $this;
	}

	public function medium($force = true) {
		if (isset($this->size_medium) || $force) {
			$this->addClass($this->family."-".Bootstrap::SIZE_MEDIUM);
		}

		return $this;
	}

	public function large($force = true) {
		if (isset($this->size_large) || $force) {
			$this->addClass($this->family."-".Bootstrap::SIZE_LARGE);
		}

		return $this;
	}

	public function xlarge($force = true) {
		if (isset($this->size_xlarge) && $this->size_xlarge) {
			$this->addClass($this->family."-".Bootstrap::SIZE_XLARGE);
		} else {
			if ($force) $this->large();
		}

		return $this;
	}

}
?>
