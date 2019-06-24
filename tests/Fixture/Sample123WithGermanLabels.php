<?php
/**
 * Contains the Sample123WithGermanLabels class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests\Fixture;

class Sample123WithGermanLabels extends Sample123
{
    protected static $labels = [
        self::ONE   => 'ein',
        self::TWO   => 'zwei',
        self::THREE => 'drei'
    ];
}
