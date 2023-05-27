<?php
/**
 * Contains the BaseEnumTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Enum;
use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\SampleNumericWithBothZeroAndNull;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

class BaseEnumTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_created_with_normal_constructor()
    {
        $enum = new Sample123();

        $this->assertInstanceOf(Enum::class, $enum);
    }

    /**
     * @test
     */
    public function can_be_created_with_factory_method()
    {
        $enum = Sample123::create();

        $this->assertInstanceOf(Enum::class, $enum);
    }

    /**
     * @test
     */
    public function has_default_value_when_none_was_explicitely_set()
    {
        $enum = Sample123::create();

        $this->assertSame(Sample123::__DEFAULT, $enum->value());

        $def = new SampleOneTwoThree();

        $this->assertSame(SampleOneTwoThree::__DEFAULT, $def->value());
        $this->assertSame('one', $def->value());

        $defn = new Sample123();

        $this->assertSame(Sample123::__DEFAULT, $defn->value());
        $this->assertSame(1, $defn->value());
    }

    /**
     * @test
     */
    public function value_can_be_set_with_constructor()
    {
        $three = new Sample123(Sample123::THREE);

        $this->assertSame(Sample123::THREE, $three->value());
    }

    /**
     * @test
     */
    public function value_can_be_set_with_factory_method()
    {
        $two = Sample123::create(Sample123::TWO);

        $this->assertSame(Sample123::TWO, $two->value());
    }

    /**
     * @test
     */
    public function throws_exception_when_setting_invalid_value_in_factory_method()
    {
        $this->expectException(UnexpectedValueException::class);

        Sample123::create(4);
    }

    /**
     * @test
     */
    public function throws_exception_when_setting_invalid_value_in_constructor()
    {
        $this->expectException(UnexpectedValueException::class);

        new Sample123(4);
    }

    /**
     * @test
     */
    public function the_has_method_tells_whether_a_value_is_present_or_not()
    {
        $this->assertTrue(Sample123::has(1));
        $this->assertTrue(Sample123::has(2));
        $this->assertTrue(Sample123::has(3));
        $this->assertFalse(Sample123::has(4));
        $this->assertFalse(Sample123::has('1234'));
    }

    /**
     * @test
     */
    public function all_values_can_be_returned_as_array()
    {
        $this->assertEquals([1,2,3], Sample123::values());
    }

    /**
     * @test
     */
    public function values_are_type_sensitive()
    {
        $this->assertTrue(Sample123::has(1));
        $this->assertTrue(Sample123::has(2));
        $this->assertTrue(Sample123::has(3));
        $this->assertTrue(Sample123::hasNot("1"));
        $this->assertTrue(Sample123::hasNot("2"));
        $this->assertTrue(Sample123::hasNot("3"));
    }

    public function it_doesnt_allow_to_create_an_enum_if_the_value_is_not_the_same_type()
    {
        $this->expectException(UnexpectedValueException::class);
        Sample123::create("2");
    }

    /**
     * @test
     */
    public function null_is_distinguished_from_zero()
    {
        $any = SampleNumericWithBothZeroAndNull::create(null);
        $false = SampleNumericWithBothZeroAndNull::create(0);

        $this->assertNull($any->value());
        $this->assertIsInt($false->value());
        $this->assertSame(0, $false->value());
        $this->assertTrue($any->notEquals($false));
    }

    /**
     * @test
     */
    public function has_doesnt_mess_up_values_with_const_names()
    {
        $one = new SampleOneTwoThree();

        $this->assertTrue($one->has('one'));
        $this->assertFalse($one->has('ONE'));

        $this->assertTrue($one->has('two'));
        $this->assertFalse($one->has('TWO'));

        $this->assertFalse($one->has('four'));
    }

    /**
     * @test
     */
    public function has_method_can_be_invoked_both_statically_and_on_instance()
    {
        $this->assertTrue(SampleOneTwoThree::has('one'));
        $this->assertFalse(SampleOneTwoThree::has('ONE'));

        $this->assertTrue(SampleOneTwoThree::has('two'));
        $this->assertTrue(SampleOneTwoThree::has('three'));

        $this->assertFalse(SampleOneTwoThree::has('four'));

        $one = SampleOneTwoThree::create();

        $this->assertTrue($one->has('one'));
        $this->assertFalse($one->has('ONE'));

        $this->assertTrue($one->has('two'));
        $this->assertFalse($one->has('TWO'));

        $this->assertFalse($one->has('four'));
    }
}
