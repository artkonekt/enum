<?php
/**
 * Contains the Another123 class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class Another123 extends Enum
{
    const __DEFAULT = self::ONE;

    const ONE       = 1;
    const TWO       = 2;
    const THREE     = 3;
}
