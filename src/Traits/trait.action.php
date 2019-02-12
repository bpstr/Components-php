<?php
/**
 * Action components (HTML <a> tags with href attribute) for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see class.badge.php
 * @see class.button.php
 */

trait Action {

	public function action ($href, $target = NULL) {
		if ($this->tag != "a") $this->tag = "a";
		$this->attr("href", $href);

		return $this;
	}

}

?>
