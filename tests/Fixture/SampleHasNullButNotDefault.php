<?php

declare(strict_types=1);

/**
 * Contains the SampleHasNullButNotDefault class.
 *
 * @copyright   Copyright (c) 2022 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2022-03-10
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class SampleHasNullButNotDefault extends Enum
{
    public const __DEFAULT = self::HORSE;
    const HORSE = 'horse';
    const BICYCLE = 'bicycle';
    const NOTHING = null;
}
