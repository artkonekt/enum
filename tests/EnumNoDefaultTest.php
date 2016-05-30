<?php
/**
 * Contains the EnumNoDefaultTest.php class.
 *
 * @copyright   Copyright (c) 2016 Storm Storez Srl-D
 * @author      Attila Fulop
 * @license     Proprietary
 * @since       2016-05-30
 *
 */


namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\SampleFooBarNoDefault;

class EnumNoDefaultTest extends \PHPUnit_Framework_TestCase
{
    public function testMagicConstructor()
    {
        $foo = new SampleFooBarNoDefault(SampleFooBarNoDefault::FOO);

        $this->assertEquals($foo, SampleFooBarNoDefault::FOO());
    }

    public function testToString()
    {
        $this->assertEquals('foo', (string) SampleFooBarNoDefault::FOO());
        $this->assertEquals('bar', (string) SampleFooBarNoDefault::BAR());
    }

    public function testToArray()
    {
        $foobar = new SampleFooBarNoDefault();

        $arr = $foobar->toArray();

        $this->assertArrayHasKey('FOO', $arr);
        $this->assertArrayHasKey('BAR', $arr);

        $bar = SampleFooBarNoDefault::BAR();
        $this->assertArrayHasKey('FOO', $bar->toArray());
        $this->assertArrayHasKey('BAR', $bar->toArray());

        $foo = SampleFooBarNoDefault::FOO();
        $this->assertArrayHasKey('FOO', $foo->toArray());
        $this->assertArrayHasKey('BAR', $foo->toArray());
    }

    public function testToArrayDefault()
    {
        $foobar = new SampleFooBarNoDefault();

        $arr = $foobar->toArray(false);

        $this->assertArrayNotHasKey('__default', $arr);
        $this->assertArrayHasKey('FOO', $arr);

        $bar = SampleFooBarNoDefault::BAR();
        $arr = $bar->toArray(true);
        $this->assertArrayHasKey('__default', $arr);
        $this->assertNull($arr['__default']);
    }

    public function testGetValue()
    {
        $foo = SampleFooBarNoDefault::FOO();
        $this->assertEquals('foo', $foo->getValue());

        $bar = SampleFooBarNoDefault::BAR();
        $this->assertEquals('bar', $bar->getValue());

        $foobar = new SampleFooBarNoDefault();
        $this->assertNull($foobar->getValue());
    }

}