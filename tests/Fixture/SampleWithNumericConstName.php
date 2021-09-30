<?php

declare(strict_types=1);

/**
 * Contains the SampleWithNumericConstName class.
 *
 * @copyright   Copyright (c) 2021 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2021-09-30
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class SampleWithNumericConstName extends Enum
{
    public const UNION_BERLIN = 'union_berlin';
    public const SCHALKE_04 = 'schalke_04';
    public const FC_1899_HOFFENHEIM = 'fc_1899_hoffenheim';
}
