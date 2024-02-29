<?php

declare(strict_types=1);

/**
 * Contains the IsAnyOfTest class.
 *
 * @copyright   Copyright (c) 2024 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2024-02-29
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\Another123;
use Konekt\Enum\Tests\Fixture\Sample123;
use PHPUnit\Framework\TestCase;

class IsAnyOfTest extends TestCase
{
    /** @test */
    public function is_any_of_returns_true_when_passing_the_same_instance()
    {
        $one = Sample123::create(1);

        $this->assertTrue($one->isAnyOf($one));
    }

    /** @test */
    public function is_any_of_returns_true_when_passing_the_same_value_but_separate_instances()
    {
        $one = Sample123::create(1);

        $this->assertTrue($one->isAnyOf(Sample123::create(1)));
    }

    /** @test */
    public function is_any_of_returns_true_when_passing_multiple_values_of_which_one_equals_the_base_enum()
    {
        $one = Sample123::create(1);

        $this->assertTrue($one->isAnyOf(Sample123::ONE(), Sample123::TWO()));
    }

    /** @test */
    public function is_any_of_returns_false_when_passing_nothing()
    {
        $this->assertFalse(Sample123::THREE()->isAnyOf());
    }

    /** @test */
    public function is_none_of_returns_true_when_passing_nothing()
    {
        $one = Sample123::create(1);

        $this->assertTrue($one->isNoneOf());
    }

    /** @test */
    public function is_none_of_returns_true_when_passing_enums_of_which_none_equals_the_base_enum()
    {
        $three = Sample123::create(3);

        $this->assertTrue($three->isNoneOf(Sample123::ONE(), Sample123::TWO()));
    }

    /** @test */
    public function mixing_separate_enums_with_same_underlying_values_will_not_match()
    {
        $two = Sample123::TWO();

        $this->assertTrue($two->isNoneOf(Another123::TWO()));
    }
}
