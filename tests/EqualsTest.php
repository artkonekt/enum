<?php
/**
 * Contains the EqualsTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\Another123;
use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\Sample1234;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use PHPUnit\Framework\TestCase;

class EqualsTest extends TestCase
{
    /**
     * @test
     */
    public function equals_returns_true_for_same_values_of_same_type()
    {
        $two  = Sample123::create(2);
        $zwei = Sample123::create(2);

        $this->assertTrue($two->equals($zwei));
        $this->assertTrue($zwei->equals($two));
    }

    /**
     * @test
     */
    public function equals_cant_be_messed_with_identic_const_names()
    {
        $three = Sample123::create(Sample123::THREE);
        $drei  = SampleOneTwoThree::create(SampleOneTwoThree::THREE);

        $this->assertFalse($three->equals($drei));
        $this->assertFalse($drei->equals($three));
    }

    /**
     * @test
     */
    public function different_types_are_not_equal_even_if_their_values_match()
    {
        $twoOfTypeA = new Sample123(Sample123::TWO);
        $twoOfTypeB = new Another123(Another123::TWO);

        $this->assertFalse($twoOfTypeA->equals($twoOfTypeB));
        $this->assertFalse($twoOfTypeB->equals($twoOfTypeA));
    }

    /**
     * @test
     */
    public function descendant_types_are_equal_if_their_values_match()
    {
        $threeA = Sample123::create(3);
        $threeB = Sample1234::create(3);

        $this->assertTrue($threeA->equals($threeB));
        $this->assertTrue($threeB->equals($threeA));
    }
}
