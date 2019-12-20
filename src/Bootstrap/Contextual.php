<?php

namespace Bpstr\Components\Bootstrap;

use Bpstr\Components\Dictionary;

/**
 * Class Contextual
 *
 * @package Bpstr\Components\Bootstrap
 * @link https://www.php.net/manual/en/class.splenum.php
 */
class Contextual extends Dictionary {

	const __default = 'primary';

	const PRIMARY = 'primary';
	const SECONDARY = 'secondary';
	const SUCCESS = 'success';
	const DANGER = 'danger';
	const WARNING = 'warning';
	const INFO = 'info';
	const LIGHT	= 'light';
	const DARK = 'dark';

	/**
	 * @var string
	 */
	protected $contextual;

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

}
