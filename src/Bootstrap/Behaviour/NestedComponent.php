<?php

namespace Bpstr\Components\Bootstrap\Behaviour;

use Bpstr\Components\Bootstrap;
use Bpstr\Components\Bootstrap\Component;
use Bpstr\Components\Bootstrap\ComponentInterface;
use Bpstr\Elements\Base\ElementInterface;

class NestedComponent extends Component {

	public function prependItem(ElementInterface $item) {
		array_unshift($this->contents[0], $item);
		return $this;
	}

	public function appendItem(ElementInterface $item) {
		$this->contents[] = $item;
		return $this;
	}

	public function activateItem(ElementInterface $item) {
		if (($key = array_search($item, $this->contents->list())) && $this->contents->has($key)) {
			$this->contents->ref($item)->addClass(Bootstrap::CLASS_ACTIVE);
		}

		return $this;
	}

	public function activateKey($key) {
		if ($this->contents->has($key) && $this->contents->get($key) instanceof ElementInterface) {
			$this->contents->ref($key)->addClass(Bootstrap::CLASS_ACTIVE);
		}

		return $this;
	}

}
