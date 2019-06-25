<?php
/**
 * Contains the Sample123WithDutchLabels class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests\Fixture;

class Sample123WithDutchLabels extends Sample123
{
    protected static $labels = [
        self::ONE   => 'een',
        self::TWO   => 'twee',
        self::THREE => 'drie'
    ];
}
