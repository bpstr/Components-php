<?php

namespace Bpstr\Components\Bootstrap;

use Bpstr\Components\Exception\BootstrapRenderException;
use Bpstr\Elements\Html\Element;

abstract class Component extends Element implements ComponentInterface {

	public const EVENT_PRERENDER = 'prerender';

	protected $family;

	protected $events;

	protected $utils;

	public function getFamily(): string{
		return $this->family;
	}

	public function setFamily(string $family) {
		$this->family = $family;
		return $this;
	}

	public function compare($family): bool {
		return ($this->family === $family);
	}

	public function __construct() {
		parent::__construct($this->tag);
		$this->addClass($this->family);
	}

	public function detach(string $event) {
		unset($this->events[$event]);
		return $this;
	}

	public function attach(string $event, callable $callback) {
		$this->events[$event] = $callback;
		return $this;
	}

	public function launch(string $event, array $attributes = []) {
		if (is_callable($this->events[$event])) {
			return $this->events[$event](...$attributes);
		}
		return NULL;
	}

	public function render(array $element = [], array $additional_attributes = []): string {
		$this->launch(self::EVENT_PRERENDER, $additional_attributes);
		if (empty($this->family)) {
			throw new BootstrapRenderException('Component family must be defined!');
		}

		return parent::render($element, $additional_attributes);
	}

	public function util($name, ... $args) {
		if (empty($args)) {
			return $this->utils[$name] ?? new $name;
		}

		if ($this->utils[$name] === NULL) {
			$this->utils[$name] = new $name($args);
		}

		return $this->utils[$name](...$args);

	}

}
