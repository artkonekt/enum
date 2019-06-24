<?php
/**
 * Contains the NullableTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Enum;
use Konekt\Enum\Tests\Fixture\NullableEnum;
use PHPUnit\Framework\TestCase;

class NullableTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_null_if_a_null_value_is_explicitly_present()
    {
        $unknown = NullableEnum::create();

        $this->assertInstanceOf(Enum::class, $unknown);
        $this->assertNull($unknown->value());
    }

    /**
     * @test
     */
    public function can_be_created_with_create_method_with_null_as_value_parameter()
    {
        $unknown = NullableEnum::create(null);

        $this->assertInstanceOf(Enum::class, $unknown);
        $this->assertNull($unknown->value());
    }

    /**
     * @test
     */
    public function can_be_created_with_constructor_without_parameter()
    {
        $unknown = new NullableEnum();

        $this->assertInstanceOf(Enum::class, $unknown);
        $this->assertNull($unknown->value());
    }

    /**
     * @test
     */
    public function can_be_created_with_constructor_with_null_as_parameter_value()
    {
        $unknown = new NullableEnum(null);

        $this->assertInstanceOf(Enum::class, $unknown);
        $this->assertNull($unknown->value());
    }

    /**
     * @test
     */
    public function this_case_is_practically_the_same_as_the_one_above()
    {
        $unknown = new NullableEnum(NullableEnum::UNKNOWN);

        $this->assertInstanceOf(Enum::class, $unknown);
        $this->assertNull($unknown->value());
    }

    /**
     * @test
     */
    public function and_of_course_magic_constructor_works_as_well()
    {
        $unknown = NullableEnum::UNKNOWN();

        $this->assertInstanceOf(Enum::class, $unknown);
        $this->assertNull($unknown->value());
    }

    /**
     * @test
     */
    public function it_properly_returns_the_values()
    {
        $values = NullableEnum::values();

        $this->assertCount(3, $values);

        $this->assertNull($values[0]);
        $this->assertEquals(NullableEnum::INITIALIZED, $values[1]);
        $this->assertEquals(NullableEnum::COMPLETED, $values[2]);
    }

    /**
     * @test
     */
    public function it_properly_returns_the_choices()
    {
        $choices = NullableEnum::choices();

        $this->assertCount(3, $choices);

        $this->assertArrayHasKey('', $choices);
        $this->assertArrayHasKey(1, $choices);
        $this->assertArrayHasKey(2, $choices);

        $this->assertEquals('', $choices['']);
        $this->assertEquals('1', $choices[1]);
        $this->assertEquals('2', $choices[2]);
    }

    /**
     * @test
     */
    public function it_properly_converts_to_array()
    {
        $array = NullableEnum::toArray();

        $this->assertCount(3, $array);

        $this->assertArrayHasKey('UNKNOWN', $array);
        $this->assertArrayHasKey('INITIALIZED', $array);
        $this->assertArrayHasKey('COMPLETED', $array);

        $this->assertNull($array['UNKNOWN']);
        $this->assertEquals(1, $array['INITIALIZED']);
        $this->assertEquals(2, $array['COMPLETED']);

        $this->assertIsInt($array['INITIALIZED']);
        $this->assertIsInt($array['COMPLETED']);
    }
}
