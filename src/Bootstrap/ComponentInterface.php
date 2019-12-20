<?php

namespace Bpstr\Components\Bootstrap;

use Bpstr\Elements\Base\ElementInterface;

interface ComponentInterface extends ElementInterface {

	/**
	 * Get the family property of the component.
	 *
	 * @return string
	 */
	public function getFamily(): string;

	/**
	 * Set the family property.
	 *
	 * @param $family
	 *
	 * @return $this
	 */
	public function setFamily(string $family);

}
