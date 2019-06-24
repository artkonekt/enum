<?php
/**
 * Contains the DefaultTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-26
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\NullableEnum;
use Konekt\Enum\Tests\Fixture\NullableWithLabels;
use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\Sample1234;
use Konekt\Enum\Tests\Fixture\Sample12345With5AsDefault;
use Konekt\Enum\Tests\Fixture\SampleFooBarNoDefault;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use PHPUnit\Framework\TestCase;

class DefaultTest extends TestCase
{
    /**
     * @test
     */
    public function default_method_returns_the_value_of_the_default_const()
    {
        $this->assertEquals(Sample123::__DEFAULT, Sample123::defaultValue());
        $this->assertEquals(SampleOneTwoThree::__DEFAULT, SampleOneTwoThree::defaultValue());
    }

    /**
     * @test
     */
    public function default_method_returns_null_if_there_is_no_explicit_default_defined()
    {
        $this->assertNull(SampleFooBarNoDefault::defaultValue());
    }

    /**
     * @test
     */
    public function default_method_works_on_extended_enum_classes_as_well()
    {
        $this->assertEquals(Sample1234::__DEFAULT, Sample1234::defaultValue());
    }

    /**
     * @test
     */
    public function default_method_works_on_nullable_enums_as_well()
    {
        $this->assertNull(NullableEnum::defaultValue());
        $this->assertNull(NullableWithLabels::defaultValue());
    }

    /**
     * @test
     */
    public function default_method_returns_correct_value_when_default_was_changed_in_a_subclass()
    {
        $this->assertEquals(Sample12345With5AsDefault::__DEFAULT, Sample12345With5AsDefault::defaultValue());
        $this->assertEquals(Sample12345With5AsDefault::FIVE, Sample12345With5AsDefault::defaultValue());
        $this->assertEquals(5, Sample12345With5AsDefault::defaultValue());
    }
}
