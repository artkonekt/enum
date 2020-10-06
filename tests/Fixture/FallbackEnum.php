<?php

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class FallbackEnum extends Enum
{
    public const __DEFAULT = self::NO;
    public const YES       = 'yes';
    public const NO        = 'no';

    protected static $unknownValuesFallbackToDefault = true;
}
