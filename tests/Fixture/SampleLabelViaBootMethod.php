<?php
/**
 * Contains the SampleLabelViaBootMethod class.
 *
 * @copyright   Copyright (c) 2016-2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-14
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class SampleLabelViaBootMethod extends Enum
{
    public const __DEFAULT = self::ZSH;
    public const FOO       = 'foo';
    public const BAR       = 'bar';
    public const BAZ       = 'baz';
    public const ZSH       = 'zsh';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::FOO => ucfirst('foo is good'),
            self::BAR => ucfirst('bar is better'),
            self::BAZ => 'Baz is best'
        ];
    }
}
