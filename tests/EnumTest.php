<?php
/**
 * Contains the EnumTest.php class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-05-30
 *
 */


namespace Konekt\Enum\Tests;


use Konekt\Enum\Tests\Fixture\Sample123;
use Konekt\Enum\Tests\Fixture\SampleOneTwoThree;
use Konekt\Enum\Tests\Fixture\SampleStatus;

class EnumTest extends \PHPUnit_Framework_TestCase
{

    public function testToString()
    {
        $this->assertEquals('one', (string) SampleOneTwoThree::ONE());
        $this->assertEquals('two', (string) SampleOneTwoThree::TWO());

        $three = new SampleOneTwoThree(SampleOneTwoThree::THREE);
        $this->assertEquals('three', (string) $three);
        $this->assertNotEquals('Three', (string) $three);
    }

    public function testToStringNumeric()
    {
        $this->assertEquals('1', (string) Sample123::ONE());
        $this->assertEquals('2', (string) Sample123::TWO());

        $three = new Sample123(Sample123::THREE);
        $this->assertEquals('3', (string) $three);
        $this->assertNotEquals('33', (string) $three);
    }

    public function testStrict()
    {
        $strictOne = new Sample123(Sample123::ONE, true);
        $looseOne  = new Sample123('1', false);

        $this->assertFalse($strictOne->equals($looseOne));
        $this->assertTrue($looseOne->equals($strictOne));
    }

    public function testMagicConstructor()
    {
        $one = new SampleOneTwoThree(SampleOneTwoThree::ONE);

        $this->assertEquals($one, SampleOneTwoThree::ONE());
    }

    public function testMagicConstructorNumeric()
    {
        $one = new Sample123(Sample123::ONE);

        $this->assertEquals($one, Sample123::ONE());
    }

    public function testMagicConstructorByValue()
    {
        $this->assertEquals('one', SampleOneTwoThree::ONE());
        $this->assertEquals('two', SampleOneTwoThree::TWO());
        $this->assertEquals('three', SampleOneTwoThree::THREE());
    }

    public function testMagicConstructorFails()
    {
        $this->setExpectedException(\BadMethodCallException::class);

        $four = SampleOneTwoThree::FOUR();
    }

    public function testToArray()
    {
        $one = new SampleOneTwoThree(SampleOneTwoThree::ONE);

        $arr = $one->toArray();

        $this->assertArrayHasKey('ONE', $arr);
        $this->assertArrayHasKey('TWO', $arr);
        $this->assertArrayHasKey('THREE', $arr);
        $this->assertArrayNotHasKey('__default', $arr);
        $this->assertEquals('one', $arr['ONE']);
        $this->assertEquals('two', $arr['TWO']);
        $this->assertEquals('three', $arr['THREE']);
    }

    public function testToArrayDefault()
    {
        $one = SampleOneTwoThree::ONE();

        $arr = $one->toArray(true);

        $this->assertArrayHasKey('__default', $arr);
        $this->assertArrayHasKey('ONE', $arr);

        $arr = $one->toArray(false);
        $this->assertArrayNotHasKey('__default', $arr);
    }

    public function testToArrayStatic()
    {
        $arr = SampleOneTwoThree::toArray();

        $this->assertArrayHasKey('ONE', $arr);
        $this->assertArrayHasKey('TWO', $arr);
        $this->assertArrayHasKey('THREE', $arr);
        $this->assertEquals('one', $arr['ONE']);
        $this->assertEquals('two', $arr['TWO']);
        $this->assertEquals('three', $arr['THREE']);
    }

    public function testHasValue()
    {
        $one = new SampleOneTwoThree();

        $this->assertTrue($one->hasValue('one'));
        $this->assertFalse($one->hasValue('ONE'));

        $this->assertTrue($one->hasValue('two'));
        $this->assertFalse($one->hasValue('TWO'));

        $this->assertFalse($one->hasValue('four'));

        $this->assertTrue(SampleOneTwoThree::hasValue('one'));
        $this->assertTrue(SampleOneTwoThree::hasValue('one'));
        $this->assertTrue(SampleOneTwoThree::hasValue('one'));
    }

    public function testHasValueStatic()
    {
        $this->assertTrue(SampleOneTwoThree::hasValue('one'));
        $this->assertTrue(SampleOneTwoThree::hasValue('two'));
        $this->assertTrue(SampleOneTwoThree::hasValue('three'));
        $this->assertFalse(SampleOneTwoThree::hasValue('four'));
    }

    public function testHasKey()
    {
        $one = new SampleOneTwoThree();

        $this->assertTrue($one->hasKey('ONE'));
        $this->assertFalse($one->hasKey('one'));

        $this->assertTrue($one->hasKey('TWO'));
        $this->assertFalse($one->hasKey('two'));

        $this->assertTrue($one->hasKey('THREE'));
        $this->assertFalse($one->hasKey('three'));

        $this->assertFalse($one->hasKey('FIVE'));
        $this->assertFalse($one->hasKey('SIX'));
    }

    public function testHasKeyStatic()
    {
        $this->assertTrue(SampleOneTwoThree::hasKey('ONE'));
        $this->assertTrue(SampleOneTwoThree::hasKey('TWO'));
        $this->assertTrue(SampleOneTwoThree::hasKey('THREE'));
        $this->assertFalse(SampleOneTwoThree::hasKey('FOUR'));
        $this->assertFalse(SampleOneTwoThree::hasKey('FIVE'));
        $this->assertFalse(SampleOneTwoThree::hasKey('ONE_TWO_THREE'));
    }

    public function testDefault()
    {
        $def = new SampleOneTwoThree();

        $this->assertEquals($def->getValue(), SampleOneTwoThree::__default);
        $this->assertEquals($def->getValue(), 'one');

        $defn = new Sample123();

        $this->assertEquals($defn->getValue(), Sample123::__default);
        $this->assertEquals($defn->getValue(), 1);
    }

    public function testAha()
    {
        print_r(SampleStatus::toArray(true));
    }


}