<?php
/**
 * Contains the SampleOneTwoThree class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-05-30
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

final class SampleOneTwoThree extends Enum
{
    const __DEFAULT = self::ONE;

    const ONE       = 'one';
    const TWO       = 'two';
    const THREE     = 'three';
}
