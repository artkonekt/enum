<?php
/**
 * Contains the ResetTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-14
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\SecondsAsLabelEnum;
use PHPUnit\Framework\TestCase;

class ResetTest extends TestCase
{
    /**
     * @test
     */
    public function reset_method_resets_class_metadata()
    {
        $second = SecondsAsLabelEnum::create();
        $label  = $second->label();

        sleep(1);
        // Labels are set at boot() time
        $this->assertEquals($label, $second->label());

        // After reset() the class should be rebooted
        SecondsAsLabelEnum::reset();
        sleep(1);
        $this->assertNotEquals($label, $second->label());
    }
}
