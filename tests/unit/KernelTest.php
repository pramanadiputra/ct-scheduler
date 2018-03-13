<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/13/2018
 * Time: 8:39 AM
 */

use App\Scheduler\Kernel;
use App\Scheduler\Event;

class KernelTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function able_to_get_events()
    {
        $kernel = new Kernel;

        $this->assertEquals([], $kernel->getEvents());
    }

    /** @test */
    public function able_to_add_events()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $kernel = new Kernel;
        $kernel->add($event);

        $this->assertCount(1, $kernel->getEvents());
    }

    /** @test */
    public function unable_add_non_event()
    {
        $this->expectException(TypeError::class);

        $kernel = new Kernel;
        $kernel->add('is not event');
    }
}