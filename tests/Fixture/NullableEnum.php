<?php
/**
 * Contains the NullableEnum class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-07
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class NullableEnum extends Enum
{
    const UNKNOWN     = null;
    const INITIALIZED = 1;
    const COMPLETED   = 2;
}
