<?php

namespace Bpstr\Components;

use ReflectionClass;

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

	public function __construct($initial_value = self::__default, $strict = true) {
		if (!in_array($initial_value, static::reflection()->getConstants(), $strict)) {
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

	public static function reflection(): ReflectionClass {
		if (static::$reflection_class === NULL) {
			static::$reflection_class = new ReflectionClass(static::class);
		}

		return static::$reflection_class;
	}

	public function __toString() {
		return (string) $this->getValue();
	}
}
