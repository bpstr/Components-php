<?php

namespace Bpstr\Components\Bootstrap\Traits;

trait AnchorableComponentTrait {

	public function href($link, $target = NULL) {
		if ($this->getTag() !== 'a') {
			$this->setTag('a');
		}

		$this->setAttribute('href', $link);

		return $this;
	}

}
