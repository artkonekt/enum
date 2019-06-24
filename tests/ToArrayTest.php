<?php
/**
 * Contains the ToArrayTest class.
 *
 * @copyright   Copyright (c) 2016-2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-05-30
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\NullableEnum;
use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThreeWithLabels;
use PHPUnit\Framework\TestCase;

class ToArrayTest extends TestCase
{
    /**
     * @test
     */
    public function to_array_returns_all_consts_and_their_values()
    {
        $one = new SampleOneTwoThree(SampleOneTwoThree::ONE);

        $arr = $one->toArray();

        $this->assertArrayHasKey('ONE', $arr);
        $this->assertArrayHasKey('TWO', $arr);
        $this->assertArrayHasKey('THREE', $arr);

        $this->assertEquals('one', $arr['ONE']);
        $this->assertEquals('two', $arr['TWO']);
        $this->assertEquals('three', $arr['THREE']);
    }

    /**
     * @test
     */
    public function to_array_doesnt_return_the_default_key()
    {
        $this->assertArrayNotHasKey('__DEFAULT', SampleOneTwoThree::toArray());
    }

    /**
     * @test
     */
    public function to_array_count_matches_values()
    {
        $this->assertCount(count(Sample123::values()), Sample123::toArray());
        $this->assertCount(count(SampleOneTwoThree::values()), SampleOneTwoThree::toArray());
        $this->assertCount(count(SampleOneTwoThreeWithLabels::values()), SampleOneTwoThreeWithLabels::toArray());
        $this->assertCount(count(NullableEnum::values()), NullableEnum::toArray());
    }
}
