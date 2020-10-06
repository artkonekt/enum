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
    public const __DEFAULT = self::ONE;

    public const ONE       = 1;
    public const TWO       = 2;
    public const THREE     = 3;
}
