<?php
/**
 * Contains the ConstantsTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\Sample1234;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use PHPUnit\Framework\TestCase;

class ConstantsTest extends TestCase
{
    /**
     * @test
     */
    public function consts_properly_returns_the_constants()
    {
        $this->assertEquals(['ONE', 'TWO', 'THREE'], Sample123::consts());

        $this->assertEquals(['FOUR', 'ONE', 'TWO', 'THREE'], Sample1234::consts());

        $this->assertEquals(['ONE', 'TWO', 'THREE'], SampleOneTwoThree::consts());
    }

    /**
     * @test
     */
    public function has_const_tells_if_an_enum_has_a_specific_constant()
    {
        $this->assertTrue(Sample123::hasConst('ONE'));
        $this->assertTrue(Sample123::hasConst('TWO'));
        $this->assertTrue(Sample123::hasConst('THREE'));
        $this->assertFalse(Sample123::hasConst('FOUR'));
        $this->assertFalse(Sample123::hasConst('FIVE'));

        $this->assertTrue(Sample1234::hasConst('FOUR'));

        $this->assertFalse(SampleOneTwoThree::hasConst('1'));
        $this->assertFalse(SampleOneTwoThree::hasConst('one'));
        $this->assertTrue(SampleOneTwoThree::hasConst('ONE'));
    }

    /**
     * @test
     */
    public function has_const_doesnt_mess_up_with_values()
    {
        $this->assertTrue(SampleOneTwoThree::hasConst('ONE'));
        $this->assertFalse(SampleOneTwoThree::hasConst('one'));

        $this->assertTrue(SampleOneTwoThree::hasConst('TWO'));
        $this->assertFalse(SampleOneTwoThree::hasConst('two'));

        $this->assertTrue(SampleOneTwoThree::hasConst('THREE'));
        $this->assertFalse(SampleOneTwoThree::hasConst('three'));

        $this->assertFalse(SampleOneTwoThree::hasConst('FIVE'));
        $this->assertFalse(SampleOneTwoThree::hasConst('SIX'));
    }
}
