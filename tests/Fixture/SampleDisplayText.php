<?php
/**
 * Contains the SampleDisplayText.php class.
 *
 * @copyright   Copyright (c) 2016 Storm Storez Srl-D
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-07-06
 *
 */


namespace Konekt\Enum\Tests\Fixture;


use Konekt\Enum\Enum;

class SampleDisplayText extends Enum
{
    const FOO   = 'foo';
    const BAR   = 'bar';
    const BAZ   = 'baz';

    protected static $displayTexts = [
        self::BAR   => 'Bar Text',
        self::FOO   => 'Foo Text',
        self::BAZ   => 'Baz Text'
    ];

}