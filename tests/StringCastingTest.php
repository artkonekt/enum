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
        $this->assertSame('Foo Text', (string)$foo);

        $bar = SampleWithLabel::BAR();
        $this->assertSame('Bar Text', (string)$bar);

        $baz = SampleWithLabel::BAZ();
        $this->assertSame('Baz Text', (string)$baz);

        $baz2 = new SampleWithLabel(SampleWithLabel::BAZ);
        $this->assertSame('Baz Text', (string)$baz2);

        $foon = SampleNoLabel::FOO();
        $this->assertSame(SampleNoLabel::FOO, (string)$foon);

        $barn = SampleNoLabel::BAR();
        $this->assertSame(SampleNoLabel::BAR, (string)$barn);

        $bazn = SampleNoLabel::BAZ();
        $this->assertSame(SampleNoLabel::BAZ, (string)$bazn);

        $bazn2 = new SampleNoLabel(SampleNoLabel::BAZ);
        $this->assertSame(SampleNoLabel::BAZ, (string)$bazn2);

        $foop = SamplePartialLabel::FOO();
        $this->assertSame('Foo Text', (string)$foop);

        $barp = SamplePartialLabel::BAR();
        $this->assertSame('Bar Text', (string)$barp);

        $bazp = SamplePartialLabel::BAZ();
        $this->assertSame(SamplePartialLabel::BAZ, (string)$bazp);

        $bazp2 = new SamplePartialLabel(SamplePartialLabel::BAZ);
        $this->assertSame(SamplePartialLabel::BAZ, (string)$bazp2);
    }

    /**
     * @test
     */
    public function casting_to_string_always_equals_to_the_label()
    {
        $foo = SampleLabelViaBootMethod::FOO();
        $this->assertSame($foo->label(), (string)$foo);

        $bar = SampleLabelViaBootMethod::BAR();
        $this->assertSame($bar->label(), (string)$bar);

        $baz = SampleLabelViaBootMethod::BAZ();
        $this->assertSame($baz->label(), (string)$baz);

        // Test empty value
        $fooBarBaz = new SampleLabelViaBootMethod();
        $this->assertSame($fooBarBaz->label(), (string)$fooBarBaz);
    }

    /**
     * @test
     */
    public function it_returns_the_value_when_no_label_was_set()
    {
        $this->assertSame('one', (string)SampleOneTwoThree::ONE());
        $this->assertSame('two', (string)SampleOneTwoThree::TWO());

        $three = new SampleOneTwoThree(SampleOneTwoThree::THREE);
        $this->assertSame('three', (string)$three);
    }

    /**
     * @test
     */
    public function numeric_values_are_converted_to_string_dooh()
    {
        $this->assertSame('1', (string)Sample123::ONE());
        $this->assertSame('2', (string)Sample123::TWO());

        $three = new Sample123(Sample123::THREE);
        $this->assertSame('3', (string)$three);
        $this->assertNotSame('33', (string)$three);
    }
}
