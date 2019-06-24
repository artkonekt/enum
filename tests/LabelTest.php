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

use Konekt\Enum\Tests\Fixture\NullableEnum;
use Konekt\Enum\Tests\Fixture\NullableWithLabels;
use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\Sample123WithDutchLabels;
use Konekt\Enum\Tests\Fixture\Sample123WithGermanLabels;
use Konekt\Enum\Tests\Fixture\SampleFooBarNoDefault;
use Konekt\Enum\Tests\Fixture\SampleLabelViaBootMethod;
use Konekt\Enum\Tests\Fixture\SampleNoLabel;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThreeWithLabels;
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
    public function label_always_returns_string()
    {
        $one = Sample123::ONE();

        $this->assertEquals('1', $one->label());
        $this->assertIsString($one->label());
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
        $this->assertEquals('Foo is good', (string) $foo);

        $bar = SampleLabelViaBootMethod::BAR();
        $this->assertEquals('Bar is better', $bar->label());
        $this->assertEquals('Bar is better', (string) $bar);

        $baz = SampleLabelViaBootMethod::BAZ();
        $this->assertEquals('Baz is best', $baz->label());
        $this->assertEquals('Baz is best', (string) $baz);

        // Test empty value
        $zdish = new SampleLabelViaBootMethod();
        $this->assertEquals(SampleLabelViaBootMethod::__DEFAULT, $zdish->label());
        $this->assertEquals(SampleLabelViaBootMethod::__DEFAULT, (string) $zdish);
    }

    /**
     * @test
     */
    public function labels_of_same_values_are_distinct_across_various_classes()
    {
        $oneA = Sample123::ONE();
        $oneB = SampleOneTwoThree::ONE();
        $oneC = Sample123WithGermanLabels::ONE();
        $oneD = Sample123WithDutchLabels::ONE();
        $oneE = SampleOneTwoThreeWithLabels::ONE();

        $this->assertEquals('1', $oneA->label());
        $this->assertEquals('one', $oneB->label());
        $this->assertEquals('ein', $oneC->label());
        $this->assertEquals('een', $oneD->label());
        $this->assertEquals('One', $oneE->label());
    }

    /**
     * @test
     */
    public function labels_of_same_values_are_distinct_across_various_classes_when_are_set_via_boot_method()
    {
        $this->assertEquals('Foo is good', SampleLabelViaBootMethod::FOO()->label());
        $this->assertEquals('foo', SampleFooBarNoDefault::FOO()->label());
    }

    /**
     * @test
     */
    public function label_is_empty_string_if_value_is_null()
    {
        $unknown = NullableEnum::UNKNOWN();

        $this->assertEquals('', $unknown->label());
    }

    /**
     * @test
     */
    public function label_can_be_returned_for_legitimate_null_values_as_well()
    {
        $undefined = NullableWithLabels::UNDEFINED();

        $this->assertEquals('Undefined', $undefined->label());
    }
}
