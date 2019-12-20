<?php

namespace Bpstr\Components;

use ReflectionClass;

/**
 * Class Dictionary
 *
 * @package datatypes-php
 */
class Dictionary implements DictionaryInterface {

	const __default = NULL;

	/**
	 * @var \ReflectionClass
	 */
	protected static $reflection_class;

	/**
	 * @var mixed
	 */
	protected $value;

	/**
	 * Dictionary constructor.
	 *
	 * @param null $initial_value
	 */
	public function __construct($initial_value = self::__default) {
		if (constant(sprintf('%s::%s', static::class, strtoupper($initial_value))) !== $initial_value) {
			throw new \UnexpectedValueException(sprintf('Value is not a constant in dict %s', __CLASS__));
		}

		$this->setValue($initial_value);
	}

	/**
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param mixed $value
	 *
	 * @return Dictionary
	 */
	public function setValue($value): Dictionary {
		$this->value = $value;
		return $this;
	}

	public function __toString() {
		return (string) $this->getValue();
	}
}
