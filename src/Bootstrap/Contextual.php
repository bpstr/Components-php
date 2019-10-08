<?php

namespace Bpstr\Components\Bootstrap;

use Bpstr\Components\Exception\BootstrapLogicException;

class Contextual {

	const PRIMARY = 'primary';
	const SECONDARY = 'secondary';
	const SUCCESS = 'success';
	const DANGER = 'danger';
	const WARNING = 'warning';
	const INFO = 'info';
	const LIGHT	= 'light';
	const DARK = 'dark';

	public static function primary() {
		return new static(static::PRIMARY);
	}

	public static function secondary() {
		return new static(static::SECONDARY);
	}

	public static function success() {
		return new static(static::SUCCESS);
	}

	public static function danger() {
		return new static(static::DANGER);
	}

	public static function warning() {
		return new static(static::WARNING);
	}

	public static function info() {
		return new static(static::INFO);
	}


	public static function light() {
		return new static(static::LIGHT);
	}


	public static function dark() {
		return new static(static::DARK);
	}

	protected $contextual;

	public function __construct($color = NULL) {
		if (!in_array($color, [
			self::PRIMARY,
			self::SECONDARY,
			self::SUCCESS,
			self::DANGER,
			self::WARNING,
			self::INFO,
			self::LIGHT,
			self::DARK
		])) {
			throw new BootstrapLogicException('No such contextual defined.');
		}
		$this->contextual = $color;
	}

	public function __toString() {
		return $this->contextual;
	}

}
