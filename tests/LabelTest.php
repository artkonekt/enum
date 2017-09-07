<?php
/**
 * Contains the LabelTest class.
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

class LabelTest extends TestCase
{
    /**
     * @test
     */
    public function labels_can_be_set_via_protected_property()
    {
        $foo = SampleWithLabel::FOO();
        $this->assertEquals('Foo Text', $foo->label());

        $bar = SampleWithLabel::BAR();
        $this->assertEquals('Bar Text', $bar->label());

        $baz = SampleWithLabel::BAZ();
        $this->assertEquals('Baz Text', $baz->label());

        $baz2 = new SampleWithLabel(SampleWithLabel::BAZ);
        $this->assertEquals('Baz Text', $baz2->label());
    }

    /**
     * @test
     */
    public function label_returns_value_if_no_label_was_set()
    {
        $foo = SampleNoLabel::FOO();
        $this->assertEquals(SampleNoLabel::FOO, $foo->label());

        $bar = SampleNoLabel::BAR();
        $this->assertEquals(SampleNoLabel::BAR, $bar->label());

        $baz = SampleNoLabel::BAZ();
        $this->assertEquals(SampleNoLabel::BAZ, $baz->label());

        $baz2 = new SampleNoLabel(SampleNoLabel::BAZ);
        $this->assertEquals(SampleNoLabel::BAZ, $baz2->label());

    }

    /**
     * @test
     */
    public function label_method_works_even_when_labels_are_partially_set()
    {
        $foo = SamplePartialLabel::FOO();
        $this->assertEquals('Foo Text', $foo->label());

        $bar = SamplePartialLabel::BAR();
        $this->assertEquals('Bar Text', $bar->label());

        $baz = SamplePartialLabel::BAZ();
        $this->assertEquals(SamplePartialLabel::BAZ, $baz->label());

        $bar2 = new SamplePartialLabel(SamplePartialLabel::BAR);
        $this->assertEquals('Bar Text', $bar2->label());

        $baz2 = new SamplePartialLabel(SamplePartialLabel::BAZ);
        $this->assertEquals(SamplePartialLabel::BAZ, $baz2->label());
    }

    /**
     * @test
     */
    public function labels_are_returned_as_array()
    {
        $this->assertEquals(
            ['Foo Text', 'Bar Text', 'Baz Text'],
            SampleWithLabel::labels()
        );

        $this->assertEquals(
            ['Foo Text', 'Bar Text', 'baz'],
            SamplePartialLabel::labels()
        );

        $this->assertEquals(
            ['fool', 'bars', 'bazzez'],
            SampleNoLabel::labels()
        );
    }

    /**
     * @test
     */
    public function label_can_be_set_via_the_boot_method()
    {
        $foo = SampleLabelViaBootMethod::FOO();
        $this->assertEquals('Foo is good', $foo->label());
        $this->assertEquals('Foo is good', (string)$foo);

        $bar = SampleLabelViaBootMethod::BAR();
        $this->assertEquals('Bar is better', $bar->label());
        $this->assertEquals('Bar is better', (string)$bar);

        $baz = SampleLabelViaBootMethod::BAZ();
        $this->assertEquals('Baz is best', $baz->label());
        $this->assertEquals('Baz is best', (string)$baz);

        // Test empty value
        $zdish = new SampleLabelViaBootMethod();
        $this->assertEquals(SampleLabelViaBootMethod::__default, $zdish->label());
        $this->assertEquals(SampleLabelViaBootMethod::__default, (string)$zdish);

    }

}