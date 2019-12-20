<?php
declare(strict_types=1);
require_once '../vendor/autoload.php';

use Bpstr\Components\Bootstrap\Component\Alert;
use Bpstr\Elements\Html\Element;
use PHPUnit\Framework\TestCase;

final class AlertTest extends TestCase {

	public function testSimplePrimaryAlert(): void {
		$alert = new Alert('A simple primary alert—check it out!');

		$this->assertEquals(
			'<div role="alert" class="alert alert-primary">A simple primary alert—check it out!</div>',
			(string) $alert
		);
	}

	public function testAdditionalContentAlert(): void {
		$paragraph = Element::create('p', 'Lorem ipsum.');

		$alert = Alert::success($paragraph);
		$alert->addHeading('Well done!');

		$this->assertEquals(
			'<div role="alert" class="alert alert-success"><h4 class="alert-heading">Well done!</h4><p>Lorem ipsum.</p></div>',
			(string) $alert
		);

	}

	public function testDismissibleAlert() {
		$alert = Alert::warning('Lorem ipsum');
		$alert->dismissible();

		$this->assertEquals(
			'<div role="alert" class="alert alert-warning alert-dismissible fade show">Lorem ipsum<button type="button" aria-label="Close" data-dismiss="alert" class="close"><span aria-hidden="true">&times;</span></button></div>',
			(string) $alert
		);
	}

}
