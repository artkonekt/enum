<?php
/**
 * Contains the Sample123 class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-05-30
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class Sample123 extends Enum
{
    const __DEFAULT = self::ONE;

    const ONE       = 1;
    const TWO       = 2;
    const THREE     = 3;
}
