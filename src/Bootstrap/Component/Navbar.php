<?php

use Bpstr\Components\Bootstrap\Behaviour\NestedComponent;
use Bpstr\Elements\Base\ElementInterface;
use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Image;

/**
 * Navbar class for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 *
 * @link https://getbootstrap.com/docs/4.4/components/navbar/
 * @version 4.4
 */
class Navbar extends NestedComponent {

	public const CKEY_NAVBAR_BRAND = 0xB0000;

	const NAVBAR_BRAND = 'navbar-brand';

	public $tag = 'nav';

	public $family = 'navbar';

	public static function build() {

	}

	public function buildBrand(string $content, string $href = NULL, $image = NULL) {
		$brand = Element::create('span', $content);
		if ($href !== NULL) {
			$brand->setTag('a');
			$brand->attr('href', $href);
		}


		if ($image !== NULL) {

			if (!$image instanceof ElementInterface) {
				$image = new Image($image, $content);
			}

			$brand->prependContent($image);

		}

		$this->placeContent(self::CKEY_NAVBAR_BRAND, $content);

		return $this;
	}

	public function getBrand(): ElementInterface {
		return $this->getContent(self::CKEY_NAVBAR_BRAND);
	}

	public function setBrand(ElementInterface $element) {
		$this->placeContent(self::CKEY_NAVBAR_BRAND, $element);
		return $this;
	}

}
