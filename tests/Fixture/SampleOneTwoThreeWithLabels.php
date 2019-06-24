<?php
/**
 * Contains the SampleOneTwoThreeWithLabels class.
 *
 * @copyright   Copyright (c) 2016-2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-05-30
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

final class SampleOneTwoThreeWithLabels extends Enum
{
    const __DEFAULT = self::ONE;

    const ONE       = 'one';
    const TWO       = 'two';
    const THREE     = 'three';

    protected static $labels = [
        self::ONE   => 'One',
        self::TWO   => 'Two',
        self::THREE => 'Three'
    ];
}
