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

use Konekt\Enum\Tests\Fixture\SampleWithLabel;
use Konekt\Enum\Tests\Fixture\SampleNoLabel;
use Konekt\Enum\Tests\Fixture\SamplePartialLabel;
use PHPUnit\Framework\TestCase;

/**
 * @deprecated
 */
class ChoicesTest extends TestCase
{
    public function testChoices()
    {
        $choices = SampleWithLabel::choices();
        foreach (SampleWithLabel::toArray() as $key => $value) {
            $this->assertArrayHasKey($value, $choices);
        }

        $choices = SampleNoLabel::choices();
        foreach (SampleNoLabel::toArray() as $key => $value) {
            $this->assertArrayHasKey($value, $choices);
        }

        $choices = SamplePartialLabel::choices();
        foreach (SamplePartialLabel::toArray() as $key => $value) {
            $this->assertArrayHasKey($value, $choices);
        }
    }

    public function testChoiceTexts()
    {
        $choices = SampleWithLabel::choices();

        $this->assertEquals('Foo Text', $choices[SampleWithLabel::FOO]);
        $this->assertEquals('Bar Text', $choices[SampleWithLabel::BAR]);
        $this->assertEquals('Baz Text', $choices[SampleWithLabel::BAZ]);

        $choices = SampleNoLabel::choices();

        $this->assertEquals(SampleNoLabel::FOO, $choices[SampleNoLabel::FOO]);
        $this->assertEquals(SampleNoLabel::BAR, $choices[SampleNoLabel::BAR]);
        $this->assertEquals(SampleNoLabel::BAZ, $choices[SampleNoLabel::BAZ]);

        $choices = SamplePartialLabel::choices();

        $this->assertEquals('Foo Text', $choices[SamplePartialLabel::FOO]);
        $this->assertEquals('Bar Text', $choices[SamplePartialLabel::BAR]);
        $this->assertEquals(SamplePartialLabel::BAZ, $choices[SamplePartialLabel::BAZ]);

    }


}