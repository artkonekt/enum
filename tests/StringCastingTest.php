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


use Konekt\Enum\Tests\Fixture\SampleLabelViaBootMethod;
use Konekt\Enum\Tests\Fixture\SampleNoLabel;
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
        $this->assertEquals('Foo Text', (string)$foo);

        $bar = SampleWithLabel::BAR();
        $this->assertEquals('Bar Text', (string)$bar);

        $baz = SampleWithLabel::BAZ();
        $this->assertEquals('Baz Text', (string)$baz);

        $baz2 = new SampleWithLabel(SampleWithLabel::BAZ);
        $this->assertEquals('Baz Text', (string)$baz2);


        $foon = SampleNoLabel::FOO();
        $this->assertEquals(SampleNoLabel::FOO, (string)$foon);

        $barn = SampleNoLabel::BAR();
        $this->assertEquals(SampleNoLabel::BAR, (string)$barn);

        $bazn = SampleNoLabel::BAZ();
        $this->assertEquals(SampleNoLabel::BAZ, (string)$bazn);

        $bazn2 = new SampleNoLabel(SampleNoLabel::BAZ);
        $this->assertEquals(SampleNoLabel::BAZ, (string)$bazn2);


        $foop = SamplePartialLabel::FOO();
        $this->assertEquals('Foo Text', (string)$foop);

        $barp = SamplePartialLabel::BAR();
        $this->assertEquals('Bar Text', (string)$barp);

        $bazp = SamplePartialLabel::BAZ();
        $this->assertEquals(SamplePartialLabel::BAZ, (string)$bazp);

        $bazp2 = new SamplePartialLabel(SamplePartialLabel::BAZ);
        $this->assertEquals(SamplePartialLabel::BAZ, (string)$bazp2);
    }

    /**
     * @test
     */
    public function casting_to_string_always_equals_to_the_label()
    {
        $foo = SampleLabelViaBootMethod::FOO();
        $this->assertEquals($foo->label(), (string)$foo);

        $bar = SampleLabelViaBootMethod::BAR();
        $this->assertEquals($bar->label(), (string)$bar);

        $baz = SampleLabelViaBootMethod::BAZ();
        $this->assertEquals($baz->label(), (string)$baz);

        // Test empty value
        $fooBarBaz = new SampleLabelViaBootMethod();
        $this->assertEquals($fooBarBaz->label(), (string)$fooBarBaz);
    }

}