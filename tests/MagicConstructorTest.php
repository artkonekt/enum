<?php
/**
 * Contains the MagicConstructorTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use PHPUnit\Framework\TestCase;

class MagicConstructorTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_created_with_magic_constructor()
    {
        $one = SampleOneTwoThree::ONE();

        $this->assertInstanceOf(SampleOneTwoThree::class, $one);
    }

    /**
     * @test
     */
    public function magic_constructor_properly_sets_value()
    {
        $one = Sample123::ONE();

        $this->assertSame(1, $one->value());
        $this->assertTrue($one->equals(Sample123::create(1)));

        $two = SampleOneTwoThree::create(SampleOneTwoThree::TWO);

        $this->assertSame('two', $two->value());
        $this->assertTrue(SampleOneTwoThree::create('two')->equals($two));

        $this->assertSame('one', SampleOneTwoThree::ONE()->value());
        $this->assertSame('two', SampleOneTwoThree::TWO()->value());
        $this->assertSame('three', SampleOneTwoThree::THREE()->value());
    }

    /**
     * @test
     */
    public function magic_constructor_throws_exception_when_badly_invoked()
    {
        $this->expectException(\BadMethodCallException::class);

        SampleOneTwoThree::FOUR();
    }
}
