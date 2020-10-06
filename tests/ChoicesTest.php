<?php
/**
 * Contains the ChoicesTest class.
 *
 * @copyright   Copyright (c) 2016-2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-07-06
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\SampleLabelViaBootMethod;
use Konekt\Enum\Tests\Fixture\SampleNoLabel;
use Konekt\Enum\Tests\Fixture\SamplePartialLabel;
use Konekt\Enum\Tests\Fixture\SampleWithLabel;
use PHPUnit\Framework\TestCase;

class ChoicesTest extends TestCase
{
    /**
     * @test
     */
    public function choices_contains_all_the_values_as_keys()
    {
        $choices = SampleWithLabel::choices();
        foreach (SampleWithLabel::values() as $value) {
            $this->assertArrayHasKey($value, $choices);
        }

        $choices = SampleNoLabel::choices();
        foreach (SampleNoLabel::values() as $value) {
            $this->assertArrayHasKey($value, $choices);
        }

        $choices = SamplePartialLabel::choices();
        foreach (SamplePartialLabel::values() as $value) {
            $this->assertArrayHasKey($value, $choices);
        }
    }

    /**
     * @test
     */
    public function choices_contain_exactly_the_same_number_of_entries_as_many_values_we_have()
    {
        $this->assertCount(count(SampleWithLabel::values()), SampleWithLabel::choices());
        $this->assertCount(count(SampleNoLabel::values()), SampleNoLabel::choices());
        $this->assertCount(count(SamplePartialLabel::values()), SamplePartialLabel::choices());
    }

    /**
     * @test
     */
    public function choices_values_match_the_labels()
    {
        $choices = SampleWithLabel::choices();

        $this->assertEquals('Foo Text', $choices[SampleWithLabel::FOO]);
        $this->assertEquals(SampleWithLabel::FOO()->label(), $choices[SampleWithLabel::FOO]);

        $this->assertEquals('Bar Text', $choices[SampleWithLabel::BAR]);
        $this->assertEquals(SampleWithLabel::BAR()->label(), $choices[SampleWithLabel::BAR]);

        $this->assertEquals('Baz Text', $choices[SampleWithLabel::BAZ]);
        $this->assertEquals(SampleWithLabel::BAZ()->label(), $choices[SampleWithLabel::BAZ]);
    }

    /**
     * @test
     */
    public function choices_values_are_falling_back_to_values_when_no_label_was_set()
    {
        $choices = SampleNoLabel::choices();

        $this->assertEquals(SampleNoLabel::FOO, $choices[SampleNoLabel::FOO]);
        $this->assertEquals(SampleNoLabel::BAR, $choices[SampleNoLabel::BAR]);
        $this->assertEquals(SampleNoLabel::BAZ, $choices[SampleNoLabel::BAZ]);
    }

    /**
     * @test
     */
    public function choices_values_are_correct_on_partially_labelled_enums()
    {
        $choices = SamplePartialLabel::choices();

        $this->assertEquals('Foo Text', $choices[SamplePartialLabel::FOO]);
        $this->assertEquals('Bar Text', $choices[SamplePartialLabel::BAR]);
        $this->assertEquals(SamplePartialLabel::BAZ, $choices[SamplePartialLabel::BAZ]);
    }

    /**
     * @test
     */
    public function choices_can_have_labels_initialized_via_boot_method()
    {
        $choices = SampleLabelViaBootMethod::choices();

        $this->assertEquals('Foo is good', $choices[SampleLabelViaBootMethod::FOO]);
        $this->assertEquals('Bar is better', $choices[SampleLabelViaBootMethod::BAR]);
        $this->assertEquals('Baz is best', $choices[SampleLabelViaBootMethod::BAZ]);
    }

    /**
     * @test
     */
    public function choices_can_be_called_on_instance_as_well()
    {
        $choices = SampleLabelViaBootMethod::choices();

        $this->assertEquals('Foo is good', $choices[SampleLabelViaBootMethod::FOO]);
        $this->assertEquals('Bar is better', $choices[SampleLabelViaBootMethod::BAR]);
        $this->assertEquals('Baz is best', $choices[SampleLabelViaBootMethod::BAZ]);
    }
}
