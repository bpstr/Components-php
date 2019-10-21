<?php
declare(strict_types=1);

use Bpstr\Components\Bootstrap\Component\Badge;
use Bpstr\Components\Bootstrap\Contextual;
use PHPUnit\Framework\TestCase;

final class BadgeTest extends TestCase {

	public function testSimpleSecondaryBadge(): void {
		$badge = new Badge('New', Contextual::secondary());

		$this->assertEquals(
			'<span class="badge badge-secondary">New</span>',
			(string) $badge
		);
	}

	public function testAnchorBadge(): void {
		$badge = new Badge('Success', Contextual::success());
		$badge->href('#');

		$this->assertEquals(
			'<a href="#" class="badge badge-success">Success</a>',
			(string) $badge
		);
	}

}
