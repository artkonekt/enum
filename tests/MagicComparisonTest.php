<?php
/**
 * Contains the MagicComparisonTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-12
 *
 */


namespace Konekt\Enum\Tests;


use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use PHPUnit\Framework\TestCase;

class MagicComparisonTest extends TestCase
{
    /**
     * @test
     */
    public function equals_can_be_tested_via_magic_property()
    {
        $two = SampleOneTwoThree::TWO();

        $this->assertTrue($two->is_two);
        $this->assertFalse($two->is_one);
        $this->assertFalse($two->is_three);
    }

    /**
     * @notest
     */
    public function checking_against_inexistent_const_throws_an_error()
    {
        //$this->confo
        //$this->expectException()
    }

}