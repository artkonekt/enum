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
    public const __DEFAULT = self::ONE;

    public const ONE       = 1;
    public const TWO       = 2;
    public const THREE     = 3;
}
