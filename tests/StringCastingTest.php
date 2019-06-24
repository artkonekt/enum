<?php
/**
 * Contains the StringCastingTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\SampleLabelViaBootMethod;
use Konekt\Enum\Tests\Fixture\SampleNoLabel;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use Konekt\Enum\Tests\Fixture\SamplePartialLabel;
use Konekt\Enum\Tests\Fixture\SampleWithLabel;
use PHPUnit\Framework\TestCase;

class StringCastingTest extends TestCase
{
    /**
     * @test
     */
    public function casting_to_string_returns_the_label()
    {
        $foo = SampleWithLabel::FOO();
        $this->assertEquals('Foo Text', (string) $foo);

        $bar = SampleWithLabel::BAR();
        $this->assertEquals('Bar Text', (string) $bar);

        $baz = SampleWithLabel::BAZ();
        $this->assertEquals('Baz Text', (string) $baz);

        $baz2 = new SampleWithLabel(SampleWithLabel::BAZ);
        $this->assertEquals('Baz Text', (string) $baz2);

        $foon = SampleNoLabel::FOO();
        $this->assertEquals(SampleNoLabel::FOO, (string) $foon);

        $barn = SampleNoLabel::BAR();
        $this->assertEquals(SampleNoLabel::BAR, (string) $barn);

        $bazn = SampleNoLabel::BAZ();
        $this->assertEquals(SampleNoLabel::BAZ, (string) $bazn);

        $bazn2 = new SampleNoLabel(SampleNoLabel::BAZ);
        $this->assertEquals(SampleNoLabel::BAZ, (string) $bazn2);

        $foop = SamplePartialLabel::FOO();
        $this->assertEquals('Foo Text', (string) $foop);

        $barp = SamplePartialLabel::BAR();
        $this->assertEquals('Bar Text', (string) $barp);

        $bazp = SamplePartialLabel::BAZ();
        $this->assertEquals(SamplePartialLabel::BAZ, (string) $bazp);

        $bazp2 = new SamplePartialLabel(SamplePartialLabel::BAZ);
        $this->assertEquals(SamplePartialLabel::BAZ, (string) $bazp2);
    }

    /**
     * @test
     */
    public function casting_to_string_always_equals_to_the_label()
    {
        $foo = SampleLabelViaBootMethod::FOO();
        $this->assertEquals($foo->label(), (string) $foo);

        $bar = SampleLabelViaBootMethod::BAR();
        $this->assertEquals($bar->label(), (string) $bar);

        $baz = SampleLabelViaBootMethod::BAZ();
        $this->assertEquals($baz->label(), (string) $baz);

        // Test empty value
        $fooBarBaz = new SampleLabelViaBootMethod();
        $this->assertEquals($fooBarBaz->label(), (string) $fooBarBaz);
    }

    /**
     * @test
     */
    public function it_returns_the_value_when_no_label_was_set()
    {
        $this->assertEquals('one', (string) SampleOneTwoThree::ONE());
        $this->assertEquals('two', (string) SampleOneTwoThree::TWO());

        $three = new SampleOneTwoThree(SampleOneTwoThree::THREE);
        $this->assertEquals('three', (string) $three);
    }

    /**
     * @test
     */
    public function numeric_values_are_converted_to_string_dooh()
    {
        $this->assertEquals('1', (string) Sample123::ONE());
        $this->assertEquals('2', (string) Sample123::TWO());

        $three = new Sample123(Sample123::THREE);
        $this->assertEquals('3', (string) $three);
        $this->assertNotEquals('33', (string) $three);
    }
}
