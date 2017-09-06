<?php
/**
 * Contains the SamplePartialDisplayText class.
 *
 * @copyright   Copyright (c) 2016 Storm Storez Srl-D
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-07-06
 *
 */


namespace Konekt\Enum\Tests\Fixture;


use Konekt\Enum\Enum;

class SamplePartialDisplayText extends Enum
{
    const FOO   = 'foo';
    const BAR   = 'bar';
    const BAZ   = 'baz';

    protected static $displayTexts = [
        self::FOO   => 'Foo Text',
        self::BAR   => 'Bar Text'
    ];

}