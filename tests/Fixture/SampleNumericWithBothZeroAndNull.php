<?php

declare(strict_types=1);

/**
 * Contains the SampleNumericWithBothZeroAndNull class.
 *
 * @copyright   Copyright (c) 2022 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2022-03-10
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class SampleNumericWithBothZeroAndNull extends Enum
{
    public const __DEFAULT = self::ANY;
    public const ANY = null;
    public const TRUE_ONLY = 1;
    public const FALSE_ONLY = 0;
}
