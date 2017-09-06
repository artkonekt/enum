<?php
/**
 * Contains the DisplayTextsTest.php class.
 *
 * @copyright   Copyright (c) 2016 Storm Storez Srl-D
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-07-06
 *
 */


namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\SampleDisplayText;
use Konekt\Enum\Tests\Fixture\SampleDisplayTextWithMethod;
use Konekt\Enum\Tests\Fixture\SampleNoDisplayText;
use Konekt\Enum\Tests\Fixture\SamplePartialDisplayText;
use PHPUnit\Framework\TestCase;

class DisplayTextsTest extends TestCase
{
    public function testChoices()
    {
        $choices = SampleDisplayText::choices();
        foreach (SampleDisplayText::toArray() as $key => $value) {
            $this->assertArrayHasKey($value, $choices);
        }

        $choices = SampleNoDisplayText::choices();
        foreach (SampleNoDisplayText::toArray() as $key => $value) {
            $this->assertArrayHasKey($value, $choices);
        }

        $choices = SamplePartialDisplayText::choices();
        foreach (SamplePartialDisplayText::toArray() as $key => $value) {
            $this->assertArrayHasKey($value, $choices);
        }
    }

    public function testChoiceTexts()
    {
        $choices = SampleDisplayText::choices();

        $this->assertEquals('Foo Text', $choices[SampleDisplayText::FOO]);
        $this->assertEquals('Bar Text', $choices[SampleDisplayText::BAR]);
        $this->assertEquals('Baz Text', $choices[SampleDisplayText::BAZ]);

        $choices = SampleNoDisplayText::choices();

        $this->assertEquals(SampleNoDisplayText::FOO, $choices[SampleNoDisplayText::FOO]);
        $this->assertEquals(SampleNoDisplayText::BAR, $choices[SampleNoDisplayText::BAR]);
        $this->assertEquals(SampleNoDisplayText::BAZ, $choices[SampleNoDisplayText::BAZ]);

        $choices = SamplePartialDisplayText::choices();

        $this->assertEquals('Foo Text', $choices[SamplePartialDisplayText::FOO]);
        $this->assertEquals('Bar Text', $choices[SamplePartialDisplayText::BAR]);
        $this->assertEquals(SamplePartialDisplayText::BAZ, $choices[SamplePartialDisplayText::BAZ]);

    }

    public function testDisplayText()
    {
        $foo = SampleDisplayText::FOO();
        $this->assertEquals('Foo Text', $foo->getDisplayText());

        $bar = SampleDisplayText::BAR();
        $this->assertEquals('Bar Text', $bar->getDisplayText());

        $baz = SampleDisplayText::BAZ();
        $this->assertEquals('Baz Text', $baz->getDisplayText());

        $baz2 = new SampleDisplayText(SampleDisplayText::BAZ);
        $this->assertEquals('Baz Text', $baz2->getDisplayText());

    }

    public function testNoDisplayText()
    {
        $foo = SampleNoDisplayText::FOO();
        $this->assertEquals(SampleNoDisplayText::FOO, $foo->getDisplayText());

        $bar = SampleNoDisplayText::BAR();
        $this->assertEquals(SampleNoDisplayText::BAR, $bar->getDisplayText());

        $baz = SampleNoDisplayText::BAZ();
        $this->assertEquals(SampleNoDisplayText::BAZ, $baz->getDisplayText());

        $baz2 = new SampleNoDisplayText(SampleNoDisplayText::BAZ);
        $this->assertEquals(SampleNoDisplayText::BAZ, $baz2->getDisplayText());

    }

    public function testPartialDisplayText()
    {
        $foo = SamplePartialDisplayText::FOO();
        $this->assertEquals('Foo Text', $foo->getDisplayText());

        $bar = SamplePartialDisplayText::BAR();
        $this->assertEquals('Bar Text', $bar->getDisplayText());

        $baz = SamplePartialDisplayText::BAZ();
        $this->assertEquals(SamplePartialDisplayText::BAZ, $baz->getDisplayText());

        $bar2 = new SamplePartialDisplayText(SamplePartialDisplayText::BAR);
        $this->assertEquals('Bar Text', $bar2->getDisplayText());

        $baz2 = new SamplePartialDisplayText(SamplePartialDisplayText::BAZ);
        $this->assertEquals(SamplePartialDisplayText::BAZ, $baz2->getDisplayText());

    }

    public function testToStringCasting()
    {
        $foo = SampleDisplayText::FOO();
        $this->assertEquals('Foo Text', (string)$foo);

        $bar = SampleDisplayText::BAR();
        $this->assertEquals('Bar Text', (string)$bar);

        $baz = SampleDisplayText::BAZ();
        $this->assertEquals('Baz Text', (string)$baz);

        $baz2 = new SampleDisplayText(SampleDisplayText::BAZ);
        $this->assertEquals('Baz Text', (string)$baz2);



        $foon = SampleNoDisplayText::FOO();
        $this->assertEquals(SampleNoDisplayText::FOO, (string)$foon);

        $barn = SampleNoDisplayText::BAR();
        $this->assertEquals(SampleNoDisplayText::BAR, (string)$barn);

        $bazn = SampleNoDisplayText::BAZ();
        $this->assertEquals(SampleNoDisplayText::BAZ, (string)$bazn);

        $bazn2 = new SampleNoDisplayText(SampleNoDisplayText::BAZ);
        $this->assertEquals(SampleNoDisplayText::BAZ, (string)$bazn2);



        $foop = SamplePartialDisplayText::FOO();
        $this->assertEquals('Foo Text', (string)$foop);

        $barp = SamplePartialDisplayText::BAR();
        $this->assertEquals('Bar Text', (string)$barp);

        $bazp = SamplePartialDisplayText::BAZ();
        $this->assertEquals(SamplePartialDisplayText::BAZ, (string)$bazp);

        $bazp2 = new SamplePartialDisplayText(SamplePartialDisplayText::BAZ);
        $this->assertEquals(SamplePartialDisplayText::BAZ, (string)$bazp2);
    }

    public function testDisplayTextWithGetterMethod()
    {
        $foo = SampleDisplayTextWithMethod::FOO();
        $this->assertEquals('Foo is good', $foo->getDisplayText());
        $this->assertEquals('Foo is good', (string)$foo);

        $bar = SampleDisplayTextWithMethod::BAR();
        $this->assertEquals('Bar is better', $bar->getDisplayText());
        $this->assertEquals('Bar is better', (string)$bar);

        $baz = SampleDisplayTextWithMethod::BAZ();
        $this->assertEquals('Baz is best', $baz->getDisplayText());
        $this->assertEquals('Baz is best', (string)$baz);

        // Test empty value
        $fooBarBaz = new SampleDisplayTextWithMethod();
        $this->assertEquals('Foo Bar Baz', $fooBarBaz->getDisplayText());
        $this->assertEquals('Foo Bar Baz', (string)$fooBarBaz);

    }

}