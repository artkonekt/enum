<?php
/**
 * Contains the SecondsAsLabelEnum class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-14
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class SecondsAsLabelEnum extends Enum
{
    public const __DEFAULT = self::CURRENT_SECOND;

    public const CURRENT_SECOND = 'current_second';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::CURRENT_SECOND => date('s') // Current second is the label. Weird huh?
        ];
    }
}
