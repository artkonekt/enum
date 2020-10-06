<?php
/**
 * Contains the SampleWithLabel class.
 *
 * @copyright   Copyright (c) 2016-2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-07-06
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class SampleWithLabel extends Enum
{
    public const FOO   = 'foo';
    public const BAR   = 'bar';
    public const BAZ   = 'baz';

    protected static $labels = [
        self::BAR   => 'Bar Text',
        self::FOO   => 'Foo Text',
        self::BAZ   => 'Baz Text'
    ];
}
