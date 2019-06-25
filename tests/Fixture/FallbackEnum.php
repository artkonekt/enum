<?php

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class FallbackEnum extends Enum
{
    const __default = self::NO;
    const YES       = 'yes';
    const NO        = 'no';

    protected static $unknownValuesFallbackToDefault = true;
}
